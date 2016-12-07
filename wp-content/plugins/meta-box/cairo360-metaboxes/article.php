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
add_filter('rwmb_meta_boxes', 'article_meta_boxes');

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function article_meta_boxes($meta_boxes) {
    /**
     * prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign
    $prefix = 'article_';


    /**
     * General fields
     */
    $meta_boxes[] = array(
        'id' => 'article_general',
        'title' => __('Articles fields', 'metabox_article'),
        'post_types' => array('article'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Article type ', 'metabox_article'),
                'id' => "{$prefix}type",
                'type' => 'select',
                'options' => array("1" => "Review", "2" => "Feature", "3" => "Interview", "4" => "Preview"),
            ),
            array(
                'name' => __('Writer ', 'metabox_article'),
                'id' => "{$prefix}writer",
                'type' => 'user',
                'query_args' => array('role' => array('freelance')),
                'admin_columns' => true,
            ),
            array(
                'name' => __('Video links ', 'metabox_article'),
                'id' => "{$prefix}video_links",
                'type' => 'url',
                'clone' => true,
            ),
            array(
                'name' => __('Article images ', 'metabox_article'),
                'id' => "{$prefix}article_images",
                'type' => 'plupload_image',
                'max_file_uploads' => 8,
            ),
            array(
                'name' => __('Editor choise ', 'metabox_article'),
                'id' => "{$prefix}editor_choise",
                'type' => 'checkbox',
            ),

            array(
                'type' => 'heading',
                'name' => __( 'Item Reviewed', 'metabox_article' ),
            ),
            // array(
            //     'name' => __('Type', 'metabox_article'),
            //     'id' => "{$prefix}item_reviewed_type",
            //     'type' => 'select',
            //     'options' => array( 'venue'=>'Venue',
            //                         'cinema'=>'Cinema',
            //                         'film'=>'Film',
            //                         'music'=>'Music',
            //                         'dvd'=>'DVD',
            //                         'book'=>'Book',
            //                         ),
                
            // ),
            array(
                'name' => __('Category', 'metabox_article'),
                'id' => "{$prefix}main_categories",
                'type' => 'taxonomy',
                'taxonomy' => 'main_categories',
                'field_type' => 'select_advanced',
                'query_args' => array('parent'=>0),
            ),
            array(
                'name' => __('Search item', 'metabox_article'),
                'id' => "{$prefix}item_reviewed_text",
                'type' => 'text',
            ),
            array(
                'name' => __('Search item', 'metabox_article'),
                'id' => "{$prefix}search_item_btn",
                'type' => 'button',
            ),
            array(
                'name' => __('Item review', 'metabox_article'),
                'id' => "{$prefix}item_reviewed",
                'type' => 'select',
                'required' => true,

            ),
            
        ),
        'validation' => array(
            'rules' => array(
                "post_title" => array(
                    'required' => true,
                ),
                "{$prefix}writer" => array(
                    'required' => true,
                ),
                "{$prefix}type" => array(
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

    /**
     * Review,feature and preview fields
     */
    $meta_boxes[] = array(
        'id' => 'article_bit',
        'title' => __('Articles fields', 'metabox_article'),
        'post_types' => array('article'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'visible' => array('article_type', 'in', array(1,2,4)),
        'fields' => array(
            array(
                'name' => __('Best bit', 'metabox_article'),
                'id' => "{$prefix}best_bit",
                'type' => 'wysiwyg',
                'class' => 'review_articles feature_articles preview_articles',
            ),
            array(
                'name' => __('Worst Bit', 'metabox_article'),
                'id' => "{$prefix}worst_bit",
                'type' => 'wysiwyg',
                'class' => 'review_articles feature_articles preview_articles',
            ),
            array(
                'name' => __('360 Tip', 'metabox_article'),
                'id' => "{$prefix}360_tip",
                'type' => 'wysiwyg',
                'class' => 'review_articles feature_articles preview_articles',
            ),
        )
    );

    /**
     * Review fields
     */
    $meta_boxes[] = array(
        'id' => 'article_review',
        'title' => __('Articles fields', 'metabox_article'),
        'post_types' => array('article'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'visible' => array('article_type', 'in', array(1)),
        'fields' => array(
            array(
                'name' => __('Rating', 'metabox_article'),
                'id' => "{$prefix}rating",
                'type' => 'select',
                'options' => array("1.0" => "1.0", "1.5" => "1.5", "2.0" => "2.0", "2.5" => "2.5", "3.0" => "3.0", "3.5" => "3.5", "4.0" => "4.0",
                    "4.5" => "4.5", "5.0" => "5.0"),
                'class' => 'review_articles',
            ),
        ),
        'validation' => array(
            'rules' => array(
                "{$prefix}rating" => array(
                    'required' => true,
                ),
            ),
            'messages' => array(
            ),
        ),
    );

    /**
     * Feature fields
     */
    $meta_boxes[] = array(
        'id' => 'article_feature',
        'title' => __('Articles fields', 'metabox_article'),
        'post_types' => array('article'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'visible' => array('article_type', 'in', array(2)),
        'fields' => array(
            array(
                'name' => __('Recommended', 'metabox_article'),
                'id' => "{$prefix}recommended",
                'type' => 'checkbox',
                'class' => 'feature_articles',
            ),
            array(
                'name' => __('Sponsored', 'metabox_article'),
                'id' => "{$prefix}sponsored",
                'type' => 'checkbox',
                'class' => 'feature_articles',
            ),
        )
    );

    /**
     * Interview fields
     */
    $meta_boxes[] = array(
        'id' => 'article_interview',
        'title' => __('Articles fields', 'metabox_article'),
        'post_types' => array('article'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'visible' => array('article_type', 'in', array(3)),
        'fields' => array(
            array(
                'name' => __('Interviewee Name', 'metabox_article'),
                'id' => "{$prefix}interviewee_name",
                'type' => 'text',
                'class' => 'interview_articles',
            ),
            array(
                'name' => __('Interviewee Position', 'metabox_article'),
                'id' => "{$prefix}interviewee_position",
                'type' => 'text',
                'class' => 'interview_articles',
            ),
        ),
        'validation' => array(
            'rules' => array(
                "{$prefix}interviewee_name" => array(
                    'required' => true,
                ),
                "{$prefix}interviewee_position" => array(
                    'required' => true,
                ),
            ),
            'messages' => array(
            ),
        ),
    );






    return $meta_boxes;
}
