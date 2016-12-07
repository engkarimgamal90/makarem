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
add_filter('rwmb_meta_boxes', 'venue_meta_boxes');

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function venue_meta_boxes($meta_boxes) {
    /**
     * prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign
    $prefix = 'venue_';
    // 1st meta box
    $meta_boxes[] = array(
        'id' => 'venue-sections',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __('Fields', 'metabox_venue'),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        'post_types' => array('venue'),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',


        // Auto save: true, false (default). Optional.
        'tabs'=> array(
            'general' => array(
                'label' => __( 'General', 'rwmb' ),
                'icon'  => 'dashicons-admin-site', // Dashicon
            ),

            'media'  => array(
                'label' => __( 'Media', 'rwmb' ),
                'icon'  => 'dashicons-images-alt2', 
            ),

            'winner'  => array(
                'label' => __( 'Is Winner ', 'rwmb' ),
                'icon'  => 'dashicons-smiley', 
            ),
                
        ),
        // Tab style: 'default', 'box' or 'left'. Optional
        'tab_style' => 'default',
        
        // Show meta box wrapper around tabs? true (default) or false. Optional
        'tab_wrapper' => true,
  
        'fields' => array(
            // TEXT
            array(
                // Field name - Will be used as label
                'name' => __('Address Line ', 'metabox_venue'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}addressline",
                'tab'  => 'general',
                // Field description (optional)
                'desc' => '',
                'required'  => true,
                'type' => 'text',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
                'clone' => true,
            ),
            // Map requires at least one address field (with type = text)
            array(
                'id' => "{$prefix}address",
                'name' => __('Address', 'metabox_venue'),
                'type' => 'text',
                'std' => __('Cairo', 'metabox_venue'),
                'tab'  => 'general',
            ),
            array(
                'id' => 'map',
                'name' => __('Location', 'metabox_venue'),
                'type' => 'map',
                // Default location: 'latitude,longitude[,zoom]' (zoom is optional)
                'std' => '30.044420,31.235712',
                // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
                'address_field' => "{$prefix}address",
                'required'  => true,
                'tab'  => 'general',
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Telephone Numbers ', 'metabox_venue'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}phone",
                
                // Field description (optional)
                'desc' => __('Telephone Numbers', 'metabox_venue'),
                'type' => 'number',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
                'clone' => true,
                'required'  => true,
                'tab'  => 'general',
            ),
            // URL
            array(
                'name' => __('Website', 'metabox_venue'),
                'id' => "{$prefix}url",
                'desc' => __('URL description', 'metabox_venue'),
                'type' => 'url',
                'tab'  => 'general',
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Opening Time ', 'metabox_venue'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}opentime",
                // Field description (optional)
                'desc' => '',
                'type' => 'text',
                // Default value (optional)
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
                'clone' => false,
                'tab'  => 'general',
            ),
            // is closed
            array(
                'name' => __('This venue is closed', 'metabox_venue'),
                'id' => "{$prefix}is_closed",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std' => 0,
                'tab'  => 'general',
            ),
            // visa
            array(
                'name' => __('Visa', 'metabox_venue'),
                'id' => "{$prefix}is_visa",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std' => 0,
                'tab'  => 'general',
            ),


            array(
                'name' => __('Discount ', 'metabox_venue'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}discount",
                // Field description (optional)
                'desc' => '',
                'type' => 'text',
                'tab'  => 'general',
            // Default value (optional)
            ),
            // Gellery images (WP 3.3+)
            array(
                'name' => __('Upload Images', 'metabox_venue'),
                'id' => "{$prefix}plupload",
                'type' => 'plupload_image',
                'max_file_uploads' => 8,
                'tab'  => 'media',
            ),
            // is winner
            array(
                'name' => __('Winner', 'metabox_venue'),
                'id' => "{$prefix}winner",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std' => 0,
                'tab'  => 'winner',
            ),
            
        ),
        'validation' => array(
            'rules' => array(
                "post_title" => array(
                    'required' => true,
                ),
                "{$prefix}phone" => array(
                    'required' => true,
                    // 'number' => true,
                ),
            ),
            // optional override of default jquery.validate messages
            'messages' => array(
                "post_title" => array(
                    'required' => __('Venue Name is Required', 'metabox_venue'),
                ),
                "{$prefix}phone" => array(
                    'required' => __('Phone Number is Required', 'metabox_venue'),
                    'number' => __('It should be numbers only', 'metabox_venue'),
                ),
            ),
        ),
    );
    
    /**
     * Review fields
     */
    $starting_year  =date('Y', strtotime('-1 year'));
    $ending_year = date('Y', strtotime('+1 year'));
    $current_year = date('Y');
    for($starting_year; $starting_year <= $ending_year; $starting_year++) {
     $array_years[$starting_year] = $starting_year;
    }

    $meta_boxes[] = array(
        'id' => 'winner-widget',
        'title' => __('Winner fields', 'metabox_venue'),
        'post_types' => array('venue'),
        'context' => 'normal',
        'tab'  => 'winner',
        'priority' => 'low',
        'hidden' => array('venue_winner','=', 1),
        'fields' => array(
            array(
                'id'     => 'winner-widg',
                // Gropu field
                'type'   => 'group',
                'clone'  => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => __( 'Display In Winner Page Only', 'rwmb' ),
                        'id'   => "{$prefix}winnerpage",
                        'type' => 'checkbox',
                        'std' => 1,
                    ),
                    array(
                        'name' => __( 'Year', 'rwmb' ),
                        'id'   => "{$prefix}year",
                        'type' => 'select_advanced',
                        'options'     => $array_years,
                    ),
                    //Categories exclude Top Level
                    array(
                        'name' => __('Category', 'metabox_book'),
                        'id' => "{$prefix}winnercategory",
                        'type' => 'taxonomy',
                        // Taxonomy name
                        'taxonomy' => 'venue_categories',
                        'field_type' => 'select_advanced',
                        // Additional arguments for get_terms() function. Optional
                        
                        // 'query_args' => array(
                        //     'parent !=' => 0,
                        // ),
                    ),
                 
                ),
            ),
        )
    );

    //Showing Times Area
    $meta_boxes[] = array(
        'id' => 'showing-times-widget',
        'title' => __('Default Showing Times fields', 'metabox_venue'),
        'post_types' => array('venue'),
        'context' => 'normal',
        'priority' => 'high',
        'visible' => array('tax_input[main_categories]', 'in', array(60,250)), 
        'fields' => array(
           //Showing Times
            array(
                'name'       => __( 'Default Showing Times', 'metabox_venue' ),
                'id'         => $prefix . 'showingtime',
                'type'       => 'time',

                 'tab'  => 'general',
                 'clone'=>true,
                // jQuery datetime picker options.
                // For date options, see here http://api.jqueryui.com/datepicker
                // For time options, see here http://trentrichardson.com/examples/timepicker/
                'js_options' => array(
                    'stepMinute' => 5,
                    'showSecond' => false,
                    'stepSecond' => 10,
                ),
            ),
        )
    );


    return $meta_boxes;
}
