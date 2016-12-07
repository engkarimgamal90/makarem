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
add_filter('rwmb_meta_boxes', 'competition_meta_boxes');

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function competition_meta_boxes($meta_boxes) {
    /**
     * prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign
    $prefix = 'film_';


    /**
     * General fields
     */
    $meta_boxes[] = array(
        'id' => 'competition_data',
        'title' => __('Competition data', 'metabox_competition'),
        'post_types' => array('competition'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            // DATETIME
            array(
                'name' => __('Start Date Time', 'metabox_competition'),
                'id' => "{$prefix}startdatetime",
                'type' => 'datetime',
                'required'  => true,
                // jQuery datetime picker options.
                // For date options, see here http://api.jqueryui.com/datepicker
                // For time options, see here http://trentrichardson.com/examples/timepicker/
                'js_options' => array(
                    'stepMinute' => 15,
                    'showTimepicker' => true,
                ),
            ),
            // DATETIME
            array(
                'name' => __('End Date Time', 'metabox_competition'),
                'id' => "{$prefix}enddatetime",
                'type' => 'datetime',
                'required'  => true,
                // jQuery datetime picker options.
                // For date options, see here http://api.jqueryui.com/datepicker
                // For time options, see here http://trentrichardson.com/examples/timepicker/
                'js_options' => array(
                    'stepMinute' => 15,
                    'showTimepicker' => true,
                ),
            ),
            //Categories
            array(
                'name' => __('Categories', 'metabox_competition'),
                'id' => "{$prefix}category",
                'multiple' => true,
                'type' => 'taxonomy',
                'required'  => true,
                // Taxonomy name
                'taxonomy' => 'main_categories',
                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                // Additional arguments for get_terms() function. Optional
                'query_args' => array(
                    'parent' => 0,
                ),
            ),
            // Sponsor
            array(
                // Field name - Will be used as label
                'name' => __('Sponsor', 'metabox_competition'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}text",
                'required'  => true,
                // Field description (optional)
                'type' => 'text',
            ),
            // Gellery images (WP 3.3+)
            array(
                'name' => __('Upload Images', 'metabox_dvd'),
                'id' => "{$prefix}plupload",
                'type' => 'plupload_image',
                'max_file_uploads' => 8,
            ),
        )
    );








    return $meta_boxes;
}
