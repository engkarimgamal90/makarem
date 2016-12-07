<?php
add_action( 'rwmb_meta_boxes', 'main_categories_register_taxonomy_meta_boxes' );
function main_categories_register_taxonomy_meta_boxes( $meta_boxes )
{
	$meta_boxes[] = array(
		'title'      => 'Additional Fields',
		'taxonomies' => 'main_categories', // List of taxonomies. Array or string
		'fields' => array(
			array(
				'name' => __( 'Type', 'main_categories' ),
				'id'   => 'category_type',
				'type' => 'select',
				'options' => array(''=>'Select type',1=>"Venue",2=>"Release",3=>"Content",4=>"List"),
			),
			array(
				'name' => __('Post Type', 'main_categories' ),
				'id'   => 'category_post_type',
				'type' => 'select',
				// 'multiple' => true,
				'options' => array( ''=>'Select type',
									'venue'=>'Venue',
                                    'cinema'=>'Cinema',
                                    'film'=>'Film',
                                    'music'=>'Music',
                                    'dvd'=>'DVD',
                                    'book'=>'Book',
                                    ),
			),
		),
	);
	return $meta_boxes;
}
