<?php

// All MetaBox
add_filter('rwmb_meta_boxes', 'makarem_custom_fields');
function makarem_custom_fields($meta_boxes) {

    $prefix = 'hotel_';
    $meta_boxes[] = array(
        'id' => 'hotels_data',
        'title' => __('Hotel data', 'mk_admin'),
        'post_types' => array('hotel'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Banner image', 'mk_admin'),
                'id' => $prefix . 'banner',
                'type' => 'plupload_image',
                'max_file_uploads' => 1,
            ),
            array(
                'name' => __('Logo image', 'mk_admin'),
                'id' => $prefix . 'logo',
                'type' => 'plupload_image',
                'max_file_uploads' => 1,
            ),
            array(
                'name' => __('Gallery(add/select multiple images)', 'mk_admin'),
                'id' => $prefix . 'gallery',
                'type' => 'plupload_image',
                'max_file_uploads' => 100,
            ),
            array(
                'name' => __('Check in time', 'mk_admin'),
                'id' => $prefix . 'check_in',
                'type' => 'time',
            ),
            array(
                'name' => __('Check out time', 'mk_admin'),
                'id' => $prefix . 'check_out',
                'type' => 'time',
            ),
            array(
                'name' => __('Address', 'mk_admin'),
                'id' => $prefix . 'address',
                'type' => 'text',
            ),
            array(
                'name' => __('Latitude', 'mk_admin'),
                'id' => $prefix . 'latitude',
                'type' => 'text',
            ),
            array(
                'name' => __('Longitude', 'mk_admin'),
                'id' => $prefix . 'longitude',
                'type' => 'text',
            ),
            array(
                'name' => __('Phone', 'mk_admin'),
                'id' => $prefix . 'phone',
                'type' => 'text',
            ),
            array(
                'name' => __('Fax', 'mk_admin'),
                'id' => $prefix . 'fax',
                'type' => 'text',
            ),
            array(
                'name' => __('Email', 'mk_admin'),
                'id' => $prefix . 'email',
                'type' => 'email',
            ),
            /*array(
                'name' => __('City', 'mk_admin'),
                'id' => $prefix . 'city',
                'type'        => 'post',
                'post_type'   => 'region',
                'field_type'  => 'select_advanced',
                'placeholder' => esc_html__( 'Select a city', 'mk_admin' ),
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'post_parent__not_in' => array(0),
                ),
            ),*/
            array(
                'id'     => $prefix.'details',
                'type'   => 'group',
                'clone'  => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => __( 'Details title', 'rwmb' ),
                        'id'   => 'details_title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => __( 'Details content', 'rwmb' ),
                        'id'   => 'details_content',
                        'type' => 'wysiwyg',
                    ),
                    
                ),
            ),
        ),
        
    );
    
    // Branches
    $prefix = 'branch_';
    $meta_boxes[] = array(
        'id' => 'branches_data',
        'title' => __('Branch data', 'mk_admin'),
        'post_types' => array('branch'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Address', 'mk_admin'),
                'id' => $prefix . 'address',
                'type' => 'text',
            ),
            array(
                'name' => __('Latitude', 'mk_admin'),
                'id' => $prefix . 'latitude',
                'type' => 'text',
            ),
            array(
                'name' => __('Longitude', 'mk_admin'),
                'id' => $prefix . 'longitude',
                'type' => 'text',
            ),
            
            array(
                'name' => __('City', 'mk_admin'),
                'id' => $prefix . 'city',
                'type'        => 'post',
                'post_type'   => 'region',
                'field_type'  => 'select_advanced',
                'placeholder' => esc_html__( 'Select a city', 'mk_admin' ),
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'post_parent__not_in' => array(0),
                ),
            ),
            array(
                'name' => __('Hotel', 'mk_admin'),
                'id' => $prefix . 'hotel',
                'type'        => 'post',
                'post_type'   => 'hotel',
                'field_type'  => 'select_advanced',
                'placeholder' => esc_html__( 'Select a hotel', 'mk_admin' ),
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
            ),
        ),
        
    );

    // Rooms
    $prefix = 'room_';
    $meta_boxes[] = array(
        'id' => 'rooms_data',
        'title' => __('Room data', 'mk_admin'),
        'post_types' => array('room'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Room image', 'mk_admin'),
                'id' => $prefix . 'image',
                'type' => 'plupload_image',
                'max_file_uploads' => 1,
            ),
            array(
                'name' => __('Number of beds', 'mk_admin'),
                'id' => $prefix . 'num_of_beds',
                'type' => 'number',
                'min'  => 1,
            ),
            array(
                'name' => __('Hotel', 'mk_admin'),
                'id' => $prefix . 'hotel',
                'type'        => 'post',
                'post_type'   => 'hotel',
                'field_type'  => 'select_advanced',
                'placeholder' => esc_html__( 'Select a hotel', 'mk_admin' ),
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
            ),
            array(
                'name' => __('Packages', 'mk_admin'),
                'id' => $prefix . 'package',
                'type'        => 'post',
                'post_type'   => 'package',
                'field_type'  => 'select_advanced',
                'placeholder' => esc_html__( 'Select package(s)', 'mk_admin' ),
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
                'multiple'    => true,
            ),
        ),
        
    );
    
    // Packages
    $prefix = 'package_';
    $meta_boxes[] = array(
        'id' => 'packages_data',
        'title' => __('Package data', 'mk_admin'),
        'post_types' => array('package'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Average price', 'mk_admin'),
                'id' => $prefix . 'price',
                'type' => 'text',
            ),
            
        ),
        
    );
    return $meta_boxes;
}







