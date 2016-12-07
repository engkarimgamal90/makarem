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
add_filter('rwmb_meta_boxes', 'film_meta_boxes');

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function film_meta_boxes($meta_boxes) {
    /**
     * prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign
    $prefix = 'film_';

    
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

    /**
     * General fields
     */
    $meta_boxes[] = array(
        'id' => 'film_data',
        'title' => __('Film data', 'metabox_film'),
        'post_types' => array('film'),
        'context' => 'normal',
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

            'cinema'  => array(
                'label' => __( 'Showing times', 'rwmb' ),
                'icon'  => 'dashicons-video-alt', 
            ),
                
        ),
        // Tab style: 'default', 'box' or 'left'. Optional
        'tab_style' => 'default',
        
        // Show meta box wrapper around tabs? true (default) or false. Optional
        'tab_wrapper' => true,
  
        'fields' => array(
            array(
                'name' => __('Synopsis ', 'metabox_film'),
                'tab'  => 'general',
                'id' => "{$prefix}synopsis",
                'type' => 'textarea',
            ),
            array(
                'name' => __('Release Date ', 'metabox_film'),
                'tab'  => 'general',
                'id' => "{$prefix}release_date",
                'type' => 'date',
            ),

            //Crew "Directors"
            array(
                'name' => __('Directors ', 'metabox_film'),
                'id' => "{$prefix}director",
                'type' => 'post',
                'post_type'   => 'crew',
                'tab'  => 'general',
                'field_type'  => 'select_advanced',
                'placeholder' => __( 'Select a director', 'metabox_film' ),
                'query_args'  => array(
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'crew_role',
                          'field' => 'term_id',
                          'terms' => $director_term_id, // Where term_id of Term 1 is "1".
                          'include_children' => false
                        )
                    )
                ),
                'multiple'=>true,
                'suppress_filters' => false
            ),
            array(
                'name' => __('Producers ', 'metabox_film'),
                'id' => "{$prefix}producer",
                'type' => 'post',
                'post_type'   => 'crew',
                'tab'  => 'general',
                'field_type'  => 'select_advanced',
                'placeholder' => __( 'Select a producer', 'metabox_film' ),
                'query_args'  => array(
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'crew_role',
                          'field' => 'term_id',
                          'terms' => $producer_term_id, // Where term_id of Term 1 is "1".
                          'include_children' => false
                        )
                    )
                ),
                'multiple'=>true,
            ),
            array(
                'name' => __('Starring ', 'metabox_film'),
                'id' => "{$prefix}actor",
                'tab'  => 'general',
                'type' => 'post',
                'post_type'   => 'crew',
                'field_type'  => 'select_advanced',
                'placeholder' => __( 'Select an actor', 'metabox_film' ),
                'query_args'  => array(
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'crew_role',
                          'field' => 'term_id',
                          'terms' => $starring_term_id, // Where term_id of Term 1 is "1".
                          'include_children' => false
                        )
                    )
                ),
                'multiple'=>true,
            ),
            array(
                'name' => __('Screenwriters ', 'metabox_film'),
                'id' => "{$prefix}screenwriter",
                'type' => 'post',
                'post_type'   => 'crew',
                'field_type'  => 'select_advanced',
                'tab'  => 'general',
                'placeholder' => __( 'Select a writer', 'metabox_film' ),
                'query_args'  => array(
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'crew_role',
                          'field' => 'term_id',
                          'terms' => $screenwriter_term_id, // Where term_id of Term 1 is "1".
                          'include_children' => false
                        )
                    )
                ),
                'multiple'=>true,
            ),
            //Language
            array(
                'name' => __('Language', 'metabox_film'),
                'id' => "{$prefix}taxonomy",
                'multiple' => true,
                'type' => 'taxonomy',
                'required'  => true,
                'tab'  => 'general',
                // Taxonomy name
                'taxonomy' => 'cairo_language',
                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                // Additional arguments for get_terms() function. Optional
                'query_args' => array(),
            ),
            //Film Genre
            array(
                'name' => __('Genre', 'metabox_film'),
                'id' => "{$prefix}filmgenre",
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
                    'parent' => 60,
                ),
            ),
            array(
                'name' => __('Rating', 'metabox_film'),
                'id' => "{$prefix}film_rating",
                'type' => 'select',
                'options' => array("1" => "U", "2" => "PG", "3" => "12A", "4" => "12", "5" => "15", "6" => "18"),
                'tab'  => 'general',
            ),
            array(
                'name' => __('Trailer Links', 'metabox_film'),
                'id' => "{$prefix}trailer_links",
                'type' => 'url',
                'clone' => true,
                'tab'  => 'media',
            ),
            
            // Gellery images (WP 3.3+)
            array(
                'name' => __('Upload Images', 'metabox_film'),
                'id' => "{$prefix}plupload",
                'type' => 'plupload_image',
                'max_file_uploads' => 8,
                'tab'  => 'media',
            ),

            //Crew "Directors"
            array(
                'name' => __('Cinemas ', 'metabox_film'),
                'id' => "{$prefix}cinemas",
                'type' => 'post',
                'clone'=>true,
                'post_type'   => 'venue',
                'tab'  => 'cinema',
                'field_type'  => 'select_advanced',
                'placeholder' => __( 'Select cinema', 'metabox_film' ),
                'query_args'  => array(
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'main_categories',
                          'field' => 'term_id',
                          'terms' => 60, // Where term_id of Term 1 is "1".
                          'include_children' => false
                        )
                    )
                ),
            ),

                  
            
        ),

        'validation' => array(
            'rules' => array(
                "post_title" => array(
                    'required' => true,
                ),
                "{$prefix}synopsis" => array(
                    'required' => true,
                ),
                "{$prefix}release_date" => array(
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
