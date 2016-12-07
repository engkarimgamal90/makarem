<?php
add_filter( 'rwmb_meta_boxes', 'music_meta_boxes' );
/**
 * Register meta boxes
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function music_meta_boxes( $meta_boxes )
{
	if(ICL_LANGUAGE_CODE == "ar"){
        $artist_term_id = 262;
    }else{
        $artist_term_id = 225;
    }

	// 1st Meta Box
	$meta_boxes[] = array(
		'title'     => __( 'Music Tabs', 'rwmb' ),
		'post_types' => array('music'),
		'tabs'=> array(
		'general' => array(
			'label' => __( 'General', 'rwmb' ),
			'icon'  => 'dashicons-admin-site', // Dashicon
		),
		'tracks'  => array(
			'label' => __( 'Disc & Tracks', 'rwmb' ),
			'icon'  => 'dashicons dashicons-format-audio', 
		),
		'media'  => array(
			'label' => __( 'Media', 'rwmb' ),
			'icon'  => 'dashicons-images-alt2', 
		),
			
		),
		// Tab style: 'default', 'box' or 'left'. Optional
		'tab_style' => 'default',
		
		// Show meta box wrapper around tabs? true (default) or false. Optional
		'tab_wrapper' => true,
		'fields'    => array(
			 array(
                'name' => __('Artist', 'metabox_music'),
                'id' => "{$prefix}artist",
                'type' => 'text',
                'tab'  => 'general',
                'required'  => true,
            ),
            // Release DATE
            array(
                'name' => __('Release Date', 'metabox_music'),
                'id' => "{$prefix}releasedate",
                'type' => 'date',
                'tab'  => 'general',
                'required'  => true,
                'desc' => __('A date of today or before today will show as  Out Now', 'metabox_music'),
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText' => __('(dd/mm/yy)', 'metabox_music'),
                    'dateFormat' => __('dd/mm/yy', 'metabox_music'),
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                ),
            ),
            //Music Genre
            array(
                'name' => __('Music Genre', 'metabox_music'),
                'id' => "{$prefix}musicgenre",
                'multiple' => true,
                'tab'  => 'general',
                'type' => 'taxonomy',
                'required'  => true,
                // Taxonomy name
                'taxonomy' => 'main_categories',
                'field_type' => 'select_advanced',
                'query_args' => array(
                    'parent' => 226,
                ),
            ),
            // Music Label
            array(
            'name'  =>__( 'Music Label', 'metabox_music' ),
            'id'    => "{$prefix}label",
            'type'  => 'text',
            'tab'  => 'general',
            'required'  => true,
            ),
            
            
            //Available at
            array(
                // Field name - Will be used as label
                'name' => __('Available at', 'metabox_music'),
                'id' => "{$prefix}avaliableat",
                'type' => 'text',
                'tab'  => 'general',
            ),


            array(
                'name' => __('Venue', 'metabox_music'),
                'id' => "{$prefix}venue",
                'type' => 'post',
                'multiple' => true,
                'tab'  => 'general',
                'post_type' => array('venue'),
                'field_type' => 'select_advanced',
                'placeholder' => __('Select Venue', 'metabox_music'),
               //get all crew where role is ARTIST
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                )
            ),
            // Music Videos (Youtube)
            array(
            'name' => __( 'Videos (Youtube)', 'metabox_music' ),
            'id'   => "{$prefix}youtubeurl",
            'desc' => __( 'Music Videos (Youtube)', 'metabox_music' ),
            'type' => 'url',
            'tab'  => 'media',
            'clone'=>true
            ),
            // Gellery images (WP 3.3+)
            array(
            'name' => __('Upload Images', 'metabox_music'),
            'id' => "{$prefix}plupload",
            'tab'  => 'general',
            'type' => 'plupload_image',
            'max_file_uploads' => 8,
            'tab'=>'media'
            ),

            //Discs&Tracks Group Field
			 // Group

            // HEADING
			array(
				'type' => 'heading',
				 'tab' => 'tracks',
				'name' => __( 'Disc1', 'your-prefix' ),
			),
	        array(
	            'id' => 'group_id',
	            'type' => 'group',

	            'tab' => 'tracks',
	            // List of sub-fields
	            'fields' => array(
	                array(
	                    'name' => 'Disc1',
	                    'id' => 'text',
	                    'type' => 'text',
	                    'std'=>'Disc1'
	                ),
	                 array(
	                    'name' => 'Tel',
	                    'id' => '{$prefix}tel',
	                    'type' => 'number',
	                    'clone'=>true
	                ),
	                // Other sub-fields here
	            ),
	        ),
	        // HEADING 2
			array(
				'type' => 'heading',
				 'tab' => 'tracks',
				'name' => __( 'Disc2', 'your-prefix' ),
			),
	        array(
	            'id' => 'group_id_2',
	            'type' => 'group',
	            'tab' => 'tracks',

	            // List of sub-fields
	            'fields' => array(
	                array(
	                    'name' => 'Disc2',
	                    'id' => 'text',
	                    'type' => 'text',
	                    'std'=>'Disc2'
	                ),
	                 array(
	                    'name' => 'Tel',
	                    'id' => '{$prefix}tel2',
	                    'type' => 'number',
	                    'clone'=>true
	                ),
	                // Other sub-fields here
	            ),
	        ),
	        // HEADING3
			array(
				'type' => 'heading',
				 'tab' => 'tracks',
				'name' => __( 'Disc3', 'your-prefix' ),
				
			),
	        array(
	            'id' => 'group_id_3',
	            'type' => 'group',
	            'tab' => 'tracks',
	            // List of sub-fields
	            'fields' => array(
	                array(
	                    'name' => 'Disc3',
	                    'id' => 'text',
	                    'type' => 'text',
	                    'std'=>'Disc3'
	                ),
	                 array(
	                    'name' => 'Tel',
	                    'id' => '{$prefix}tel3',
	                    'type' => 'number',
	                    'clone'=>true
	                ),
	                // Other sub-fields here
	            ),
	        ),
	        // HEADING4
			array(
				'type' => 'heading',
				 'tab' => 'tracks',
				'name' => __( 'Disc4', 'your-prefix' ),
			),
	        array(
	            'id' => 'group_id_4',
	            'type' => 'group',
	            'tab' => 'tracks',
	            // List of sub-fields
	            'fields' => array(
	                array(
	                    'name' => 'Disc4',
	                    'id' => 'text',
	                    'type' => 'text',
	                    'std'=>'Disc4'
	                ),
	                 array(
	                    'name' => 'Tel',
	                    'id' => '{$prefix}tel4',
	                    'type' => 'number',
	                    'clone'=>true
	                ),
	                // Other sub-fields here
	            ),
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
                    'required' => __('Album Name is Required', 'metabox_music'),
                ),
              
            ),
        ),
	);
	
	return $meta_boxes;
}