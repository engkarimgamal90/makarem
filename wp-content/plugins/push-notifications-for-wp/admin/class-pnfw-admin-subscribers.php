<?php

if (!defined('ABSPATH')) {
 exit; // Exit if accessed directly
}

class PNFW_Admin_Subscribers {
 public static function output() { ?>
  <div class="wrap">
   <div id="icon-options-general" class="icon32"></div>
   <h2><?php _e('App Subscribers', 'push-notifications-for-wp'); ?>



   </h2>
   <?php
   if (isset($_REQUEST['action']) && 'delete' === $_REQUEST['action']) {
    if (!isset($_REQUEST['_wpnonce']) || !wp_verify_nonce($_REQUEST['_wpnonce'], 'delete' . $_REQUEST['id'])) {
     _e('Are you sure you want to do this?', 'push-notifications-for-wp');
     die;
    }

    pnfw_log(PNFW_ALERT_LOG, sprintf(__("Removed from the App Subscribers page the user with ID %s.", 'push-notifications-for-wp'), $_REQUEST['id']));

    if (is_multisite()) {
     $blog_id = get_current_blog_id();

     if (pnfw_is_exclusive_user_member_of_blog($_REQUEST['id'], $blog_id)) {
      require_once(ABSPATH . 'wp-admin/includes/ms.php');

      // If the user is linked only to this site it will be completely removed
      wpmu_delete_user($_REQUEST['id']);

      pnfw_log(PNFW_SYSTEM_LOG, sprintf(__("Completely deleted the user %s.", 'push-notifications-for-wp'), $_REQUEST['id']));
     }
     else {
      // If the user is also linked to other sites it will be removed only from this
      remove_user_from_blog($_REQUEST['id'], $blog_id);
      pnfw_log(PNFW_SYSTEM_LOG, sprintf(__("Disassociated the user %s from blog %s", 'push-notifications-for-wp'), $_REQUEST['id'], $blog_id));
     }
    }
    else {
     wp_delete_user($_REQUEST['id']);
    }?>

    <div class="updated below-h2" id="message"><p><?php _e('User deleted', 'push-notifications-for-wp'); ?></p></div>

    <?php $_SERVER['REQUEST_URI'] = remove_query_arg(array('action', 'id', '_wpnonce')); // "consumes" the used parameters
   } ?>





   <?php $app_subscribers = new App_Subscribers_Table();
   $app_subscribers->prepare_items();
   $app_subscribers->display(); ?>



  </div>
 <?php }
}

if (!class_exists( 'WP_List_Table')) {
  require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class App_Subscribers_Table extends WP_List_Table {
 public function __construct() {
  parent::__construct(array(
   'singular' => __('App Subscriber', 'push-notifications-for-wp'),
   'plural' => __('App Subscribers', 'push-notifications-for-wp'),
   'ajax' => false
  ));
 }

 function get_columns() {
  $columns = array(



   'username' => __('Username', 'push-notifications-for-wp'),
   'email' => __('E-mail', 'push-notifications-for-wp'),





   'devices' => __('Devices', 'push-notifications-for-wp'),
   'excluded_categories' => __('Excluded Categories', 'push-notifications-for-wp'),
  );
  return $columns;
 }

 function prepare_items() {
  $columns = $this->get_columns();
  $hidden = array();
  $sortable = $this->get_sortable_columns();

  $this->_column_headers = array($columns, $hidden, $sortable);





  $per_page = 40;

  $paged = $this->get_pagenum();

  $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'id';
  $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

  $args = array(
   'number' => $per_page,
   'offset' => ($paged - 1) * $per_page,
   'role' => PNFW_Push_Notifications_for_WordPress_Lite::USER_ROLE,
   'fields' => 'all_with_meta',
   'order' => $order,
   'orderby' => $orderby
  );

  $user_query = new WP_User_Query($args);

  $this->items = $user_query->get_results();

  $this->set_pagination_args(array(
   'total_items' => $user_query->get_total(),
   'per_page' => $per_page,
   'total_pages' => ceil($user_query->get_total() / $per_page)
  ));
 }

 function column_default($item, $column_name) {
  switch ($column_name) {
   case 'username':
    return $item->display_name;

   case 'email':
    return $item->user_email;
   case 'devices':
    global $wpdb;
    $push_tokens = $wpdb->get_blog_prefix() . 'push_tokens';

    $devices = $wpdb->get_col($wpdb->prepare("SELECT os FROM $push_tokens WHERE user_id=%s", $item->ID));

    return implode(', ', $devices);

   case 'excluded_categories':
    $object_taxonomies = get_option('pnfw_enabled_object_taxonomies', array());

    if (empty($object_taxonomies)) {
     return '';
       }

    $terms = get_terms($object_taxonomies, array('hide_empty' => false));
    $excluded_categories = array();

    foreach ($terms as $term) {
     $is_category_excluded = $this->is_category_excluded($item->ID, pnfw_get_normalized_term_id((int)$term->term_id));

     if ($is_category_excluded) {
      $excluded_categories[] = $term->name;
     }
    }

    return implode(", ", $excluded_categories);

   default: // custom parameters



    return '';

  }
 }
 public function get_sortable_columns() {
  $sortable_columns = array(
   'username' => array('login', false),
   'email' => array('email', false),
  );

  return $sortable_columns;
 }

 function column_username($item) {
  $paged = isset($_REQUEST['paged']) ? (int)$_REQUEST['paged'] : 1;

  $actions = array(
   'delete' => sprintf('<a href="?page=%s&paged=%d&action=%s&id=%s&_wpnonce=%s">%s</a>', $_REQUEST['page'], $paged, 'delete', $item->ID, wp_create_nonce('delete' . $item->ID), __('Delete', 'push-notifications-for-wp')),
  );

  return sprintf('%1$s %2$s', $item->display_name, $this->row_actions($actions));
 }
 public function no_items() {
  _e('No app subscribers were found.', 'push-notifications-for-wp');
 }

 private function is_category_excluded($user_id, $category_id) {
  global $wpdb;
  $push_excluded_categories = $wpdb->get_blog_prefix().'push_excluded_categories';
  return (boolean)$wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $push_excluded_categories WHERE category_id=%d AND user_id=%d", $category_id, $user_id));
 }
}
