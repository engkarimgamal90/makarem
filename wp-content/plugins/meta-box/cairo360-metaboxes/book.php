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
add_filter('rwmb_meta_boxes', 'book_meta_boxes');

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function book_meta_boxes($meta_boxes) {
    /**
     * prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign
    $prefix = 'book_';

    
    if(ICL_LANGUAGE_CODE == "ar"){
        $author_term_id = 278;
    }else{
        $author_term_id = 205;
    }

    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'book-sections',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __('Fields', 'metabox_book'),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        'post_types' => array('book'),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',
        // Auto save: true, false (default). Optional.
        'autosave' => true,
        // List of meta fields
        'fields' => array(
            array(
                'name' => __('Authors', 'metabox_book'),
                'id' => "{$prefix}author",
                'type' => 'post',
                'required'  => true,
                // 'clone'       => true,
                'multiple' => true,
                // Post type: string (for single post type) or array (for multiple post types)
                'post_type' => array('crew'),
                // Default selected value (post ID)
//                'std' => '',
                // Field type, either 'select' or 'select_advanced' (default)
                'field_type' => 'select_advanced',
                // Placeholder
                'placeholder' => __('Select an Author', 'metabox_book'),
                // Query arguments (optional). No settings means get all published posts
                // @see https://codex.wordpress.org/Class_Reference/WP_Query
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'crew_role',
                            'field' => 'term_id',
                            'terms' => $author_term_id,
                        )
                    )
                )
            ),
            // DATE
            array(
                'name' => __('Release Date', 'metabox_book'),
                'id' => "{$prefix}releasedate",
                'type' => 'date',
                'required'  => true,
                'desc' => __('A date of today or before today will show as  Out Now', 'metabox_book'),
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText' => __('(dd/mm/yy)', 'metabox_book'),
                    'dateFormat' => __('dd/mm/yy', 'metabox_book'),
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                ),
            ),
            //Language
            array(
                'name' => __('Language', 'metabox_book'),
                'id' => "{$prefix}taxonomy",
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
            //Price
            array(
                'name' => __('Price', 'metabox_book'),
                'id' => "{$prefix}price",
                'multiple' => false,
                'required'  => true,
                'type' => 'text',
            ),
            //Currency
            array(
                'name' => __('Currency', 'metabox_book'),
                'id' => "{$prefix}currency",
                'type' => 'select_advanced',
                'options' => array(
                    'EGP' => __('EGP', 'metabox_book'),
                    'EUR' => __('EUR', 'metabox_book'),
                    'GBP' => __('GBP', 'metabox_book'),
                    'USD' => __('USD', 'metabox_book'),
                ),
                'std' => 'EGP',
                'required'  => true,
            ),
            //Book Genre
            array(
                'name' => __('Book Genre', 'metabox_book'),
                'id' => "{$prefix}bookgenre",
                'multiple' => true,
                'type' => 'taxonomy',
                'required'  => true,                // Taxonomy name
                'taxonomy' => 'main_categories',
                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                // Additional arguments for get_terms() function. Optional
                'query_args' => array(
                    'parent' => 12,
                ),
            ),
            //Available at
            array(
                // Field name - Will be used as label
                'name' => __('Available at', 'metabox_book'),
                'id' => "{$prefix}avaliableat",
                'type' => 'text',
            ),
            // Gellery images (WP 3.3+)
            array(
                'name' => __('Upload Images', 'metabox_venue'),
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
                "{$prefix}author" => array(
                    'required' => true,
                ),
                "{$prefix}price" => array(
                    'required' => true,
                ),
            ),
            // optional override of default jquery.validate messages
            'messages' => array(
                "post_title" => array(
                    'required' => __('Book Name is Required', 'metabox_book'),
                ),
                "{$prefix}author" => array(
                    'required' => __('Author  is Required', 'metabox_book'),
                ),
            ),
        ),
    );



    return $meta_boxes;
}
