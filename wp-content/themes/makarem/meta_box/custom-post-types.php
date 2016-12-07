<?php
/**
 * Custom  Post Types
 */

//HOTELS
function custom_post_hotels() {
    $labels = array(
        'name' => _x('Hotels', 'post type general name'),
        'singular_name' => _x('Hotel', 'post type singular name'),
        'add_new' => _x('Add New', 'venue'),
        'add_new_item' => __('Add New Hotel'),
        'edit_item' => __('Edit Hotel'),
        'new_item' => __('New Hotel'),
        'all_items' => __('All Hotel'),
        'view_item' => __('View Hotel'),
        'search_items' => __('Search Hotel'),
        'not_found' => __('No Hotels found'),
        'not_found_in_trash' => __('No Hotels found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Hotels'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('hotel', $args);
}
add_action('init', 'custom_post_hotels');
//----------------------------------------------------------------------------------
//ROOMS
function custom_post_rooms() {
    $labels = array(
        'name' => _x('Rooms', 'post type general name'),
        'singular_name' => _x('Room', 'post type singular name'),
        'add_new' => _x('Add New', 'venue'),
        'add_new_item' => __('Add New Room'),
        'edit_item' => __('Edit Room'),
        'new_item' => __('New Room'),
        'all_items' => __('All Room'),
        'view_item' => __('View Room'),
        'search_items' => __('Search Room'),
        'not_found' => __('No Rooms found'),
        'not_found_in_trash' => __('No Rooms found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Rooms'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds data',
        'public' => true,
        'menu_position' => 6,
        'supports' => array('title','editor'),
        'has_archive' => true,
        'hierarchical' => true
    );
    register_post_type('room', $args);
}
add_action('init', 'custom_post_rooms');

//----------------------------------------------------------------------------------
//PACKAGES
function custom_post_packages() {
    $labels = array(
        'name' => _x('Packages', 'post type general name'),
        'singular_name' => _x('Package', 'post type singular name'),
        'add_new' => _x('Add New', 'venue'),
        'add_new_item' => __('Add New Package'),
        'edit_item' => __('Edit Package'),
        'new_item' => __('New Package'),
        'all_items' => __('All Package'),
        'view_item' => __('View Package'),
        'search_items' => __('Search Package'),
        'not_found' => __('No Packages found'),
        'not_found_in_trash' => __('No Packages found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Packages'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds data',
        'public' => true,
        'menu_position' => 7,
        'supports' => array('title','editor'),
        'has_archive' => true,
        'hierarchical' => true
    );
    register_post_type('package', $args);
}
add_action('init', 'custom_post_packages');
//----------------------------------------------------------------------------------
//COUNTRIES & CITITES
function custom_post_regions() {
    $labels = array(
        'name' => _x('Regions', 'post type general name'),
        'singular_name' => _x('Region', 'post type singular name'),
        'add_new' => _x('Add New', 'venue'),
        'add_new_item' => __('Add New Region'),
        'edit_item' => __('Edit Region'),
        'new_item' => __('New Region'),
        'all_items' => __('All Region'),
        'view_item' => __('View Region'),
        'search_items' => __('Search Region'),
        'not_found' => __('No Regions found'),
        'not_found_in_trash' => __('No Regions found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Regions'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds data',
        'public' => true,
        'menu_position' => 8,
        'supports' => array('title','page-attributes'),
        'has_archive' => true,
        'hierarchical' => true
    );
    register_post_type('region', $args);
}
add_action('init', 'custom_post_regions');

//----------------------------------------------------------------------------------
//BRANCHES
function custom_post_branches() {
    $labels = array(
        'name' => _x('Branches', 'post type general name'),
        'singular_name' => _x('Branch', 'post type singular name'),
        'add_new' => _x('Add New', 'venue'),
        'add_new_item' => __('Add New Branch'),
        'edit_item' => __('Edit Branch'),
        'new_item' => __('New Branch'),
        'all_items' => __('All Branch'),
        'view_item' => __('View Branch'),
        'search_items' => __('Search Branch'),
        'not_found' => __('No Branches found'),
        'not_found_in_trash' => __('No Branches found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Branches'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds data',
        'public' => true,
        'menu_position' => 9,
        'supports' => array('title'),
        'has_archive' => true,
        'hierarchical' => true
    );
    register_post_type('branch', $args);
}
add_action('init', 'custom_post_branches');

