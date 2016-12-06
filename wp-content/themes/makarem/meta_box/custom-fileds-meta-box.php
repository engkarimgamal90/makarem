<?php

// Page MetaBox
add_filter('rwmb_meta_boxes', 'cards_assign_meta_boxes');
function cards_assign_meta_boxes($meta_boxes) {

    $prefix = 'cards_';
    /**
     * General fields
     */
    $meta_boxes[] = array(
        'id' => 'cards_pos1',
        'title' => __('Cards Position 1', 'your-prefix'),
        'post_types' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Cards for position 1', 'your-prefix'),
                'id' => $prefix . 'pos1',
                'desc' => __('Cards to be added to position 1', 'your-prefix'),
                'type' => 'text',
                'multiple' => true,
            ),
        ),
        
    );
    
    return $meta_boxes;
}







