<?php

/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter('rwmb_meta_boxes', 'event_meta_boxes');

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function event_meta_boxes($meta_boxes) {
    /**
     * prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign
    $prefix = 'event_';


    /**
     * General fields
     */
    $meta_boxes[] = array(
        'id' => 'event_general',
        'title' => __('Events fields', 'metabox_event'),
        'post_types' => array('event'),
        'context' => 'normal',
        'priority' => 'high',
        'tabs'=> array(
            'general' => array(
                'label' => __( 'General', 'rwmb' ),
                'icon'  => 'dashicons-admin-site', // Dashicon
            ),
            'promoters'  => array(
                'label' => __( 'Promoters', 'rwmb' ),
                'icon'  => 'dashicons-image-filter', 
            ),
            'media'  => array(
                'label' => __( 'Media', 'rwmb' ),
                'icon'  => 'dashicons-images-alt2', 
            ),
        ),
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Start datetime', 'metabox_event'),
                'id' => "{$prefix}start_datetime",
                'type' => 'datetime',
                'required'  => true,
                'tab'  => 'general',
            ),
            array(
                'name' => __('End datetime', 'metabox_event'),
                'id' => "{$prefix}end_datetime",
                'type' => 'datetime',
                'required'  => true,
                'tab'  => 'general',
            ),
            //Categories
            array(
                'name' => __('Categories', 'metabox_event'),
                'id' => "{$prefix}category",
                'multiple' => true,
                'type' => 'taxonomy',
                'required'  => true,
                'tab'  => 'general',
                // Taxonomy name
                'taxonomy' => 'main_categories',
                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                // Additional arguments for get_terms() function. Optional
                'query_args' => array(
                    'parent' => 0,
                ),
            ),
            array(
                'name'      => __('Location / Venue', 'metabox_event'),
                'id'        => "{$prefix}venue",
                'type'      => 'post',
                'tab'  => 'general',
                'required'  => true,
                'post_type' => 'venue',
                'field_type' => 'select',
                'query_args' => array('post_status'=>'publish'),
            ),
            array(
                'name' => __('Other Location', 'metabox_event'),
                'id' => '{$prefix}other_location',
                'type' => 'text',
                'tab'  => 'general',
                    ),
             // HEADING
            array(
                'type' => 'heading',
                 'tab' => 'promoters',
                'name' => __( 'Promoters', 'your-prefix' ),
            ),
            array(
                'id' => "{$prefix}promoters",
                'type' => 'group',
                'tab'  => 'promoters',
                'fields' => array(
                    array(
                        'name' => __('Promoter name', 'metabox_event'),
                        'id' => '{$prefix}promoter_name',
                        'type' => 'text',
                    ),
                    array(
                        'name' => __('Promoter telephone', 'metabox_event'),
                        'id' => '{$prefix}promoter_tel',
                        'type' => 'text',
                        // 'clone' => true,
                    ),
                ),
                'clone'=>true
            ),
            array(
                'name' => __('Telephone number', 'metabox_event'),
                'id' => "{$prefix}telephone_number",
                'type' => 'text',
                'clone' => true,
                'tab'  => 'general',
            ),
            array(
                'name' => __('Other Information', 'metabox_event'),
                'id' => "{$prefix}other_information",
                'type' => 'textarea',
                'tab'  => 'general',
            ),
           
            array(
                'name' => __('Photos', 'metabox_event'),
                'id' => "{$prefix}photos",
                'type' => 'plupload_image',
                'max_file_uploads' => 8,
                'tab'  => 'media',

            ),
            array(
                'name' => __('Recommended', 'metabox_event'),
                'id' => "{$prefix}recommended",
                'type' => 'checkbox',
                'tab'  => 'general',
            ),
            array(
                'name' => __('Show on homepage', 'metabox_event'),
                'id' => "{$prefix}show_home",
                'type' => 'checkbox',
                'tab'  => 'general',
            ),
            array(
                'name' => __('User event', 'metabox_event'),
                'id' => "{$prefix}user_event",
                'type' => 'checkbox',
                'tab'  => 'general',
            ),

            
            
        ),
        'validation' => array(
            'rules' => array(
                "post_title" => array(
                    'required' => true,
                ),
                "{$prefix}start_datetime" => array(
                    'required' => true,
                ),
                "{$prefix}end_datetime" => array(
                    'required' => true,
                ),
            ),
            'messages' => array(
                "post_title" => array(
                    'required' => __('Article Title is Required', 'metabox_article'),
                ),
            ),
        ),
    );

    






    return $meta_boxes;
}
