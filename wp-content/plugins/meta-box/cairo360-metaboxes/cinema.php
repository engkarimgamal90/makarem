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
add_filter('rwmb_meta_boxes', 'cinema_meta_boxes');

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function cinema_meta_boxes($meta_boxes) {
   /**
    * prefix of meta keys (optional)
    * Use underscore (_) at the beginning to make keys hidden
    * Alt.: You also can make prefix empty to disable it
    */
   // Better has an underscore as last sign
   $prefix = 'cinema_';
   // 1st meta box
   $meta_boxes[] = array(
       // Meta box id, UNIQUE per meta box. Optional since 4.1.5
       'id' => 'cinema-sections',
       // Meta box title - Will appear at the drag and drop handle bar. Required.
       'title' => __('Fields', 'metabox_venue'),
       // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
       'post_types' => array('cinema'),
       // Where the meta box appear: normal (default), advanced, side. Optional.
       'context' => 'normal',
       // Order of meta box: high (default), low. Optional.
       'priority' => 'high',
       'tabs'=> array(
            'general' => array(
                'label' => __( 'General', 'rwmb' ),
                'icon'  => 'dashicons-admin-site', // Dashicon
            ),

            'times'  => array(
                'label' => __( 'Default Showing Times', 'rwmb' ),
                'icon'  => 'dashicons-video-alt', 
            ),

         
                
        ),
        // Tab style: 'default', 'box' or 'left'. Optional
        'tab_style' => 'default',
        
        // Show meta box wrapper around tabs? true (default) or false. Optional
        'tab_wrapper' => true,
  
       // List of meta fields
       'fields' => array(
           // Map requires at least one address field (with type = text)
           array(
               'id' => "{$prefix}address",
               'name' => __('Address', 'metabox_cinema'),
               'type' => 'text',
               'tab'  => 'general',
           ),
           array(
               'id' => 'map',
               'name' => __('Location', 'metabox_cinema'),
               'type' => 'map',
               // Default location: 'latitude,longitude[,zoom]' (zoom is optional)
               // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
               'address_field' => "{$prefix}address",
               'tab'  => 'general',
           ),
           // Shwoing TIME
			array(
				'name'       => __( 'Showing Time', 'metabox_cinema' ),
				'id'         => $prefix . 'time',
				'type'       => 'time',
				'tab'  => 'times',
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
       ),
       'validation' => array(
           'rules' => array(
               "post_title" => array(
                   'required' => true,
               ),
           ),
       ),
   );



   return $meta_boxes;
}
