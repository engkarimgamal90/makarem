<?php
/**
 * Custom  Post Types
 */

//VENUES
function custom_post_venues() {
    $labels = array(
        'name' => _x('Venues', 'post type general name'),
        'singular_name' => _x('Venue', 'post type singular name'),
        'add_new' => _x('Add New', 'venue'),
        'add_new_item' => __('Add New Venue'),
        'edit_item' => __('Edit Venue'),
        'new_item' => __('New Venue'),
        'all_items' => __('All Venues'),
        'view_item' => __('View Venue'),
        'search_items' => __('Search Venue'),
        'not_found' => __('No Venues found'),
        'not_found_in_trash' => __('No Venues found in the Trash'),
        'taxonomies' => array('main_categories','cities'),
        'parent_item_colon' => '',
        'menu_name' => 'Venues'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our products and product specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
        'taxonomies' => array('main_categories','cities'),
        'hierarchical' => true,
    );
    register_post_type('venue', $args);
}

add_action('init', 'custom_post_venues');

