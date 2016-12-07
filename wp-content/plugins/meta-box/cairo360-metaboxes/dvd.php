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
add_filter('rwmb_meta_boxes', 'dvd_meta_boxes');

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function dvd_meta_boxes($meta_boxes) {
    /**
     * prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign

    if(ICL_LANGUAGE_CODE == "ar"){
        $director_term_id = 267;
        $producer_term_id = 279;
        $starring_term_id = 281;
        $screenwriter_term_id = 280;
    }else{
        $director_term_id = 201;
        $producer_term_id = 202;
        $starring_term_id = 222;
        $screenwriter_term_id = 204;
    }
    
    $prefix = 'dvd_';
    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'dvd-sections',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __('Fields', 'metabox_dvd'),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        'post_types' => array('dvd'),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',
        // Auto save: true, false (default). Optional.
        'autosave' => true,
        // List of meta fields
        'fields' => array(
            array(
                'name' => __('Synopsis', 'metabox_dvd'),
                'id' => "{$prefix}synopsis",
                'type' => 'textarea',
                'cols' => 20,
                'rows' => 3,
                'required'  => true,
            ),
            // DATE
            array(
                'name' => __('Release Date', 'metabox_dvd'),
                'id' => "{$prefix}releasedate",
                'type' => 'date',
                'required'  => true,
                'desc' => __('A date of today or before today will show as  Out Now', 'metabox_dvd'),
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText' => __('(dd/mm/yy)', 'metabox_dvd'),
                    'dateFormat' => __('dd/mm/yy', 'metabox_dvd'),
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                ),
            ),
            //Directors
            array(
                'name' => __('Directors', 'metabox_dvd'),
                'id' => "{$prefix}directors",
                'type' => 'post',
                // Post type
                'post_type' => 'crew',
                'multiple' => true,
                // Field type, either 'select' or 'select_advanced' (default)
                'field_type' => 'select_advanced',
                'placeholder' => __('Select a directors', 'metabox_dvd'),
                // Query arguments (optional). No settings means get all published posts
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'crew_role',
                            'terms' => $director_term_id,
                            'field' => 'term_id',
                        )
                    ),
                ),
            ),
            //Producers
            array(
                'name' => __('Producers', 'metabox_dvd'),
                'id' => "{$prefix}producers",
                'type' => 'post',
                // Post type
                'post_type' => 'crew',
                'multiple' => true,
                // Field type, either 'select' or 'select_advanced' (default)
                'field_type' => 'select_advanced',
                'placeholder' => __('Select producers', 'metabox_dvd'),
                // Query arguments (optional). No settings means get all published posts
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'crew_role',
                            'terms' => $producer_term_id,
                            'field' => 'term_id',
                        )
                    ),
                ),
            ),
            //Starring
            array(
                'name' => __('Starring', 'metabox_dvd'),
                'id' => "{$prefix}starring",
                'type' => 'post',
                // Post type
                'post_type' => 'crew',
                'multiple' => true,
                // Field type, either 'select' or 'select_advanced' (default)
                'field_type' => 'select_advanced',
                'placeholder' => __('Select a starring', 'metabox_dvd'),
                // Query arguments (optional). No settings means get all published posts
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'crew_role',
                            'terms' => $starring_term_id,
                            'field' => 'term_id',
                        )
                    ),
                ),
            ),
            //Screenwriters
            array(
                'name' => __('Screenwriters', 'metabox_dvd'),
                'id' => "{$prefix}screenwriters",
                'type' => 'post',
                // Post type
                'post_type' => 'crew',
                'multiple' => true,
                // Field type, either 'select' or 'select_advanced' (default)
                'field_type' => 'select_advanced',
                'placeholder' => __('Select Screenwriters', 'metabox_dvd'),
                // Query arguments (optional). No settings means get all published posts
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'crew_role',
                            'terms' => $screenwriter_term_id,
                            'field' => 'term_id',
                        )
                    ),
                ),
            ),
            //Language
            array(
                'name' => __('Language', 'metabox_dvd'),
                'id' => "{$prefix}language",
                'multiple' => true,
                'type' => 'taxonomy',
                'required'  => true,
                // Taxonomy name
                'taxonomy' => 'cairo_language',
                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                // Additional arguments for get_terms() function. Optional
                'query_args' => array(),
            ),
            //Format
            array(
                'name' => __('Format', 'metabox_dvd'),
                'id' => "{$prefix}format",
                'multiple' => true,
                'required'  => true,
                'type' => 'select_advanced',
                'options' => array(
                    'Blu Ray' => __('Blu Ray', 'metabox_dvd'),
                    'DVD' => __('DVD', 'metabox_dvd'),
                    'HD' => __('HD', 'metabox_dvd'),
                )
            ),
            //DVD Genre
            array(
                'name' => __('DVD Genre', 'metabox_dvd'),
                'id' => "{$prefix}dvdgenre",
                'multiple' => true,
                'type' => 'taxonomy',
                'required'  => true,
                // Taxonomy name
                'taxonomy' => 'main_categories',
                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                // Additional arguments for get_terms() function. Optional
                'query_args' => array(
                    'parent' => 11,
                ),
            ),
            //Rating
            array(
                'name' => __('Rating', 'metabox_dvd'),
                'id' => "{$prefix}rating",
                'type' => 'select_advanced',
                'options' => array(
                    '12' => '12',
                    '12A' => '12A',
                    '15' => '15',
                    '18' => '18',
                    'PG' => 'PG',
                    'U' => 'U',
                )
            ),
            //Available at
            array(
                // Field name - Will be used as label
                'name' => __('Available at', 'metabox_dvd'),
                'id' => "{$prefix}avaliableat",
                'type' => 'text',
            ),
            //Trailer Links
            array(
                // Field name - Will be used as label
                'name' => __('Trailer Links', 'metabox_dvd'),
                'id' => "{$prefix}trailers",
                'type' => 'url',
                'clone' => true
            ),
            // Gellery images (WP 3.3+)
            array(
                'name' => __('Upload Images', 'metabox_dvd'),
                'id' => "{$prefix}plupload",
                'type' => 'plupload_image',
                'max_file_uploads' => 8,
            ),
        ),
        'validation' => array(
            'rules' => array(
                "post_title" => array(
                    'required' => true,
                ),
            ),
            // optional override of default jquery.validate messages
            'messages' => array(
                "post_title" => array(
                    'required' => __('Book Name is Required', 'metabox_dvd'),
                ),
            ),
        ),
    );



    return $meta_boxes;
}
