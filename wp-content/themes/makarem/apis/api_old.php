<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class api {

    private static $enumArticleTypes = array('1' => "Venue", '2' => "Release", '3' => "Content", '4' => "List");

    public function toString($ordinal) {
        return self::$enumArticleTypes[$ordinal];
    }

//api tut
    function __construct() {
//make the WPML query change happen before WP API runs the query.
        add_action('wp_json_server_before_serve', array($this, 'wpml_json_api_init'));

//getCategoriesList
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getCategoriesList/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_category_list'),
            ));
        });

//getCategoryByName
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getCategoryByName/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_category_by_name'),
            ));
        });

//getArticlesByCategory
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getArticlesByCategory/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_articles_by_category'),
            ));
        });
//getFilms
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getFilms/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_films'),
            ));
        });
//getCinemas
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getCinemas/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_cinemas'),
            ));
        });

//getFilmById
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getFilmById/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_film_by_id'),
            ));
        });

//getMovieById
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getMovieById/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_movie_by_id'),
            ));
        });

//getBookById
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getBookById/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_book_by_id'),
            ));
        });

//getCurrentWeekLatestEvents
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getCurrentWeekLatestEvents/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_current_week_latest_events'),
            ));
        });
//getEventById
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getEventById/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_event_by_id'),
            ));
        });
//getVenueById
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getVenueById/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_venue_by_id'),
            ));
        });

//getAreasList
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getAreasList/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_areas_list'),
            ));
        });
//get_events_by_date
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getEventsByDate/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_events_by_date'),
            ));
        });

//get_music_by_id
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getMusicById/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_music_by_id'),
            ));
        });

//get_article_by_id
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getArticleById/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_article_by_id'),
            ));
        });
//getDVDById
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getDVDById/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_dvd_by_id'),
            ));
        });
//getCinemaById
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getCinemaById/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_cinema_by_id'),
            ));
        });
//get_films_latest
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getFilmsLatest/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_films_latest'),
            ));
        });
//getWeekEventByDate
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getWeekEventByDate/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_week_event_by_date'),
            ));
        });



//getVenueCategoryById
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getVenueCategoryById/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_venue_category_by_Id'),
            ));
        });


//GetDirectoriesItems
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/GetDirectoriesItems/', array(
                'methods' => 'GET',
                'callback' => array($this, 'Get_directories_items'),
            ));
        });


//getHighlightsListAll
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getHighlightsListAll/', array(
                'methods' => 'GET',
                'callback' => array($this, 'Get_highlights_all'),
            ));
        });

//userRegister
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userRegister/', array(
                'methods' => 'POST',
                'callback' => array($this, 'user_register'),
            ));
        });

//userLogin
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userLogin/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_login'),
            ));
        });


//userProfileView
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userProfileView/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_profile_view'),
            ));
        });


//userProfileUpdate
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userProfileUpdate/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_profile_update'),
            ));
        });


//userValidateEmail
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userValidateEmail/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_validate_email'),
            ));
        });


//userReviewsList
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userReviewsList/', array(
                'methods' => 'POST',
                'callback' => array($this, 'user_reviews_list'),
            ));
        });


//userReviewsAll
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userReviewsAll/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_reviews_all'),
            ));
        });

//userReview
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userReview/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_review'),
            ));
        });

//userReviewsDelete
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userReviewsDelete/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_reviews_delete'),
            ));
        });

//userFavoritesList
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userFavoritesList/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_favorites_list'),
            ));
        });

//getItemReviews
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getItemReviews/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_item_reviews'),
            ));
        });

//userRatesList
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userRatesList/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_rates_list'),
            ));
        });

//userRate
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userRate/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_rate'),
            ));
        });

//userRatesDelete
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userRatesDelete/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_rates_delete'),
            ));
        });

//userLogout
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userLogout/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_logout'),
            ));
        });

//appVersionStatus
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/appVersionStatus/', array(
                'methods' => 'GET',
                'callback' => array($this, 'app_version_status'),
            ));
        });

//userForgetPassword
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userForgetPassword/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_forget_password'),
            ));
        });

//userLoginSocial
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userLoginSocial/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_login_social'),
            ));
        });

//userLanguageUpdate
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userLanguageUpdate/', array(
                'methods' => 'POST',
                'callback' => array($this, 'user_language_update'),
            ));
        });

//userFavorite
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userFavorite/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_favorite'),
            ));
        });

//userUnfavoriteItem
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userUnfavoriteItem/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_unfavorite_Item'),
            ));
        });

//userFavoritesDelete
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userFavoritesDelete/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_favorites_delete'),
            ));
        });

//getItemsByCategoryId
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getItemsByCategoryId/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_items_by_category_id'),
            ));
        });

//search
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/search/', array(
                'methods' => 'GET',
                'callback' => array($this, 'search'),
            ));
        });

//searchNearbyVenueAll
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/searchNearbyVenueAll/', array(
                'methods' => 'GET',
                'callback' => array($this, 'search_near_by_venue_all'),
            ));
        });

//userPictureUpdate
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userPictureUpdate/', array(
                'methods' => 'POST',
                'callback' => array($this, 'user_picture_update'),
            ));
        });
//get_mall_of_arabia_films
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getMoaFilms/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_mall_of_arabia_films'),
            ));
        });
//get_article_by_film_id
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/getArticleByFilmId/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_article_by_film_id'),
            ));
        });
//user_link_social
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userLinkSocial/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_link_social'),
            ));
        });
//user_unlink_social
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userUnlinkSocial/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_unlink_social'),
            ));
        });
    }

    public static function init() {
        static $instance = false;
        if (!$instance) {
            $instance = new api();
        }
        return $instance;
    }

    /**
     * Grab All Categories By Language
     *
     * @param lang [en-ar]
     * @return array|null list of all categories
     * @author Muhammad Saied
     */
    function get_category_list(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $terms = get_terms('category', array(
            'taxonomy' => 'category',
            'hide_empty' => false,
            'parent' => 0,
                )
        );

        if (empty($terms)) {
            return new WP_Error('invalid_category', 'Invalide Category', array('status' => 200));
        }

//Build your Object
        foreach ($terms as $key => $term) {
            $result[$key]['name'] = str_replace('&amp;', '&', $term->name);
            $result[$key]['urlParam'] = $term->slug;
            $result[$key]['id'] = $term->term_id;
        }

        return $result;
    }

    /**
     * Grab Category By slug
     *
     * @param lang [en-ar] , slug
     * @return object|null category
     * @author Muhammad Saied
     */
    function get_category_by_name(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);


        if ($request->get_param('slug') == null) {
            return new WP_Error('invalid_category', 'Invalide Category', array('status' => 200));
        }
        $slug = $request->get_param('slug');


        $category = get_term_by('slug', $slug, 'category');


        if (empty($category)) {
            return new WP_Error('invalid_category', 'Invalide Category', array('status' => 200));
        }
//custom fields
        $type_id = get_term_meta($category->term_id, 'category_type', true);
        $type = ($type_id != '') ? self::toString($type_id) : '';

        if ($type == '') {
            return new WP_Error('invalid_article_type', 'Invalide Type', array('status' => 200));
        }

//rebuild resonse
        $result = array(
            'category_id' => $category->term_id,
            'type' => $type,
            'version' => '',
            'name' => global_cairo360::filter_words(array('content' => $category->name, 'api' => true)),
            'description' => global_cairo360::filter_words(array('content' => $category->description, 'api' => true)),
            'orderNo' => '',
            'highlights' => '',
            'published' => '1',
            'enabled' => '',
            'fixed_type' => null,
            "last_updated" => "",
            "created" => "",
            "updated_by" => "",
            "created_by" => "",
            'language' => $cur_lang,
            'urlParam' => $category->slug,
            'id' => $category->term_id,
        );

        return $result;
    }

    /**
     * Grab Articles By Category Slug
     *
     * @param lang [en-ar] , slug
     * @return object|null category
     */
    function get_articles_by_category(WP_REST_Request $request) {


        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);


        if ($request->get_param('slug') == null) {
            return null;
        }

        $slug = $request->get_param('slug');
        $limit = ($request->get_param('limit') == null) ? 5 : $request->get_param('limit');
        $offset = ($request->get_param('limit') == null) ? 0 : $request->get_param('offset');

//$mystring = 'abc';
        $findme = 'and';
// $pos = strpos($slug, $findme);
// print_r($pos);die;

        $replaced_slug = str_replace("and", "-", $slug);
//echo $replaced_slug ; die;

        if (strpos($slug, '&') !== false) {
            $replaced_slug = str_replace("&", "-", $slug);
        }
        if (strpos($slug, 'and') !== false) {
            $replaced_slug = str_replace("and", "-", $slug);
        }
        if (strpos($slug, 'citylife') !== false) {
            $replaced_slug = str_replace("citylife", "city-life", $slug);
        }

        $args = array(
            'posts_per_page' => $limit,
            'offset' => $offset,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'article',
            'author' => '',
            'author_name' => '',
            'post_status' => 'publish',
            'suppress_filters' => 0,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $replaced_slug,
                ),
            ),
        );
        $articles = get_posts($args);


        if (empty($articles)) {
//this line was commented because the mobile team wanted a response pf an empty array
//return new WP_Error('empty_posts', 'No Articles Found', array('status' => 200));
            return $articles;
        }

//loop to get custom fields and build strucutre
        foreach ($articles as $key => $article) {
//get custom fields
            $type_id = get_post_meta($article->ID, 'article_type', true);

            $sponsored = (get_post_meta($article->ID, 'article_sponsored', true) == null) ? 0 : get_post_meta($article->ID, 'article_sponsored', true);
            $recommended = (get_post_meta($article->ID, 'article_recommended', true) == null) ? 0 : get_post_meta($article->ID, 'article_recommended', true);
            $article_rating = (get_post_meta($article->ID, 'article_rating', true) == null) ? 0 : get_post_meta($article->ID, 'article_rating', true);
            $tips = array();
            if ($type_id == 1) {
                $retrieve_tips = articles::cairo_reviews_api(array('article_id' => $article->ID, 'cur_lang' => $cur_lang));
                $tips['cairo360_tip'] = $retrieve_tips['cairo360_tip'];
                $tips['best_bit'] = $retrieve_tips['best_bit'];
                $tips['worst_bit'] = $retrieve_tips['worst_bit'];
            }
            if ($type_id == 1) { //Review
                $articled_item_id = (int) get_post_meta($article->ID, 'article_item_reviewed', true);
                $item_type = get_post_meta($article->ID, 'article_item_type', true);
                $section_arr = array();
                $section_arr = wp_get_object_terms($articled_item_id, 'category');
                $section = array_map(function($e) {
                    return is_object($e) ? global_cairo360::filter_words(array('content' => $e->name, 'api' => true)) : global_cairo360::filter_words(array('content' => $e['name'], 'api' => true));
                }, $section_arr);
                $article_type = 'Review';
            } elseif ($type_id == 2) {
                $item_type = '';
                $articled_item_id = null;
                $section = array();
                $article_type = 'Feature';
            }
            $id = $article->ID;
            $item_id = $articled_item_id;


            $article_obj = new articles();
            $user_rating = $article_obj->get_avg_user_rating(array('post_id' => $article->ID, 'api' => true));
            $extra = array();
            $venue_obj = new venues();
            if (!empty($articled_item_id)) {
                $address = $venue_obj->get_venue_location(array('venue_id' => $articled_item_id, 'api' => true));
                $venue_telephone = get_post_meta($articled_item_id, 'venue_phone', true);
                $extra = array(array(
                        'key' => 'name',
                        'value' => global_cairo360::filter_words(array('content' => get_the_title($articled_item_id), 'api' => true)),
                        "icon" => ""
                    ),
                    array(
                        "key" => "telephone",
                        "value" => (!empty($venue_telephone)) ? implode(',', $venue_telephone) : 0,
                        "icon" => ""
                    ),
                    array(
                        "key" => "address",
                        "value" => $address,
                        "icon" => ""
                ));
            }
            $category_info = wp_get_object_terms($article->ID, 'category');
            $category = array();
            if ($category_info[0]->name == "TV &amp; DVD") {
                $category_info[0]->name = "tvanddvd";
            }
            if ($category_info[0]->name == "Arts &amp; Culture") {
                $category_info[0]->name = "artsandculture";
            }
            if ($category_info[0]->name == "Health &amp; Fitness") {
                $category_info[0]->name = "healthandfitness";
            }

            if ($category_info[0]->name == "Restaurants") {
                $category_info[0]->name = "restaurants";
            }
            if ($category_info[0]->name == "Cafés") {
                $category_info[0]->name = "cafes";
            }
            if ($category_info[0]->name == "Shopping") {
                $category_info[0]->name = "shopping";
            }
            if ($category_info[0]->name == "Nightlife") {
                $category_info[0]->name = "nightlife";
            }
            if (!empty($category_info[0])) {
                $category_types = array(0 => '', 1 => "Venue", 2 => "Release", 3 => "Content", 4 => "List");
                $type_index = !empty(get_term_meta($category_info[0]->term_id, 'category_type', true)) ? get_term_meta($category_info[0]->term_id, 'category_type', true) : 0;
                $category = array(
                    'id' => (string) $category_info[0]->term_id,
                    'name' => global_cairo360::filter_words(array('content' => $category_info[0]->name, 'api' => true, 'lang' => $cur_lang)),
                    'urlParam' => $category_info[0]->slug,
                );
            }

            $article->post_title = str_replace("&amp;", "and", $article->post_title);


//Build Your Object
            $result[$key] = array(
                'articled_item_id' => $articled_item_id,
                'image_id' => (!empty(get_post_thumbnail_id($article->ID))) ? (int) get_post_thumbnail_id($article->ID) : '',
                'body' => global_cairo360::filter_words(array('content' => $article->post_content, 'api' => true)),
                'published_date' => $article->post_date,
                'type' => $article_type,
                'viewed' => '',
                'recommended' => (float) $recommended,
                'id' => $id,
                'user_rating' => $user_rating,
                'name' => global_cairo360::filter_words(array('content' => $article->post_title, 'api' => true, 'lang' => $cur_lang)),
                'sponsor' => $sponsored,
                'images' => array(
                    'original_url' => (!empty(wp_get_attachment_url(get_post_thumbnail_id($article->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($article->ID)) : '',
                    'accordion_url' => '',
                    'squeezed_url' => '',
                    'standard_rect_url' => '',
                    'thumb_rect_url' => '',
                    'list_rect_url' => '',
                    'medium_square_url' => '',
                    'small_square_url' => ''
                ),
                "item_id" => $item_id,
                "item_type" => $item_type,
                "sections" => $section,
                'Category' => $category,
                'url' => get_permalink($article->ID),
                'tips' => (object) $tips,
                'rating' => (float) $article_rating,
                'reviews' => array(),
                'extra' => $extra,
            );
        }//endforeach


        return $result;
    }

    /**

     * Grab Films By Category Slug
     *  @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , slug
     * @return object|null film
     */
    function get_films(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);



        $limit = ($request->get_param('limit') == null) ? 5 : $request->get_param('limit');
        $offset = ($request->get_param('limit') == null) ? 0 : $request->get_param('offset');

        $args = array(
            'posts_per_page' => $limit,
            'offset' => $offset,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'film',
            'author' => '',
            'author_name' => '',
            'post_status' => 'publish',
            'suppress_filters' => 0,
        );

        $films = get_posts($args);

        if (empty($films)) {
            return new WP_Error('empty_posts', 'No Films Found', array('status' => 200));
        }
        foreach ($films as $key => $film) {
            $cinemas_obj = new cinemas();
            $cinema_info = array();
            // get Films that have cinemas
            $cinemas = $cinemas_obj->get_film_cinemas(array('movie_id' => $film->ID, 'args' => '', 'api' => true));

            $genrearr = array();
            $genres = wp_get_object_terms($film->ID, 'category');
            foreach ($genres as $genre) {
                $genrearr[] = global_cairo360::filter_words(array('content' => $genre->name, 'api' => true, 'lang' => $cur_lang));
            }
            $direcarr = array();
            $directors = wp_get_post_terms($film->ID, 'directors');
            foreach ($directors as $director) {
                $direcarr[] = global_cairo360::filter_words(array('content' => $director->name, 'api' => true, 'lang' => $cur_lang));
                ;
            }
            $producerarr = array();
            $producers = wp_get_post_terms($film->ID, 'producers');
            foreach ($producers as $producer) {
                $producerarr[] = global_cairo360::filter_words(array('content' => $producer->name, 'api' => true, 'lang' => $cur_lang));
                ;
            }
            $stararr = array();
            $starrings = wp_get_post_terms($film->ID, 'starrings');
            foreach ($starrings as $star) {
                $stararr[] = global_cairo360::filter_words(array('content' => $star->name, 'api' => true, 'lang' => $cur_lang));
                ;
            }
            $writerarr = array();
            $screenwriters = wp_get_post_terms($film->ID, 'screenwriters');
            foreach ($screenwriters as $screenwriter) {
                $writerarr[] = $screenwriter->name;
            }
//get custom fields
            $feat_image = wp_get_attachment_url(get_post_thumbnail_id($film->ID));
            if (empty($feat_image)) {
                $feat_image = "";
            }
            $thumbnail_id = get_post_meta($film->ID, '_thumbnail_id', true);
            $film_trailer = get_post_meta($film->ID, 'film_trailer_links', true);
            $release_date = get_post_meta($film->ID, 'film_release_date', true);
//cinemas
            $venue_obj = new venues();
            if (!empty($cinemas)) {
                foreach ($cinemas as $ckey => $cinema) {
//phones
                    $phones = get_post_meta($cinema->ID, "venue_phone", true);
//cities
                    $cities = wp_get_object_terms($cinema->ID, 'cities');
                    $area = '';
                    $city = array();
                    foreach ($cities as $city_key => $city_val) {
                        if ($city_val->parent == 0) {
                            $city[$city_key]['id'] = $city_val->term_id;
                            $city[$city_key]['name'] = $city_val->name;
                        }
                        if ($city_val->parent == $city[0]['id']) {
                            $area = $city_val->name;
                        }
                    }
//showing time
                    $showing_times = $cinemas_obj->get_film_showing_times(array('movie_id' => $film->ID, 'cinema_id' => $cinema->ID, 'api' => true));
                    $cinema_info[$ckey]['id'] = $cinema->ID;
                    $cinema_info[$ckey]['name'] = global_cairo360::filter_words(array('content' => $cinema->post_title, 'api' => true, 'lang' => $cur_lang));
                    $cinema_info[$ckey]['area'] = $area; //pending
                    $cinema_info[$ckey]['city'] = !empty($city) ? $city[0]['name'] : ''; //pending
                    $cinema_info[$ckey]['image'] = (!empty(wp_get_attachment_url(get_post_thumbnail_id($cinema->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($cinema->ID)) : '';
                    $cinema_info[$ckey]['telephones'] = implode(',', $phones);
                    $cinema_info[$ckey]['showtimes'] = $showing_times;
                    $cinema_info[$ckey]['address'] = $venue_obj->get_venue_location(array('venue_id' => $cinema->ID, 'api' => true));
                }
            }
//end of cinemas
//get articles reviewed on film
            $articleargs = array(
                'posts_per_page' => 1,
                'post_type' => 'article',
                'meta_query' => array(array(
                        'key' => 'article_item_reviewed',
                        'value' => $film->ID,
                    ),
                    array(
                        'key' => 'article_type',
                        'value' => 1,
                    ),
                ),
            );
            $article_obj = new articles();
            $artile_reviewed = $article_obj->get_list_of_articles($articleargs);
//print_r($artile_reviewed);die;
            $article_id = $artile_reviewed[$key]->ID;
            $article_rating = get_post_meta($article_id, 'article_rating', true);
//Build Your Object

            $article = $article_obj->get_articles_by_item_reviewed(array('post_id' => $film->ID, 'api' => true));
//print_r($article);die;
            if (empty($article)) {
                $artcile = "";
            }

            if (!empty($youtube_url)) {
                $imploded_youtube_url = implode(',', $youtube_url);
                $youtube_url = $imploded_youtube_url;
            } else {
                $youtube_url = '';
            }
            $result[$key] = array(
                'id' => $film->ID,
                'article_id' => $artile_reviewed[$key]->ID,
                'image_id' => $thumbnail_id,
                'rating' => $article_rating,
                'genre' => implode(',', $genrearr),
                'name' => global_cairo360::filter_words(array('content' => $film->post_title, 'api' => true, 'lang' => $cur_lang)),
                'starring' => implode(',', $stararr),
                'new' => '',
                'director' => implode(',', $direcarr),
                'writer' => implode(',', $writerarr),
                'youtube_url' => $youtube_url,
                'URI' => '',
                'release' => $release_date,
                'cinemas' => $cinema_info,
                'images' => array(
                    'original_url' => $feat_image,
                    'standard_rect_url' => '',
                    'thumb_rect_url' => '',
                    'list_rect_url' => '',
                    'small_square_url' => ''
                ),
            );
        }

        return $result;
    }

    /* Get Cinemas
     *
     * @param lang [en-ar], Offset, Limit
     * @return object|null Cinemas
     */

    function get_cinemas(WP_REST_Request $request) {
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $limit = ($request->get_param('limit') == null) ? 5 : $request->get_param('limit');
        $offset = ($request->get_param('limit') == null) ? 0 : $request->get_param('offset');

        $cinemas_obj = new cinemas();

        $venue_obj = new venues();
        $cinemas = $cinemas_obj->get_cinemas(array('args' => array('posts_per_page' => $limit, 'offset' => $offset)));

        foreach ($cinemas['cinemas'] as $key => $cinema) {
            $lat = $lng = '';
            $map = get_post_meta($cinema->ID, 'map', true);
            if (!empty($map)) {
                $lat_lang = explode(',', $map);
                $lat = $lat_lang[0];
                $lng = $lat_lang[1];
            }
            $address = $venue_obj->get_venue_location(array('venue_id' => $cinema->ID, 'api' => true));
            $venue_telephone = get_post_meta($cinema->ID, 'venue_phone', true);


            $films_in_cinema = $cinemas_obj->get_films_in_cinema(array('posts_per_page' => -1, 'cinema_id' => $cinema->ID, 'api' => true));

            $showing_times = '';
            $showing_times = $cinemas_obj->get_cinema_times(array('cinema_id' => $cinema->ID, 'api' => true));

            $films = array();
            if (!empty($films_in_cinema)) {
                foreach ($films_in_cinema as $key_film => $film) {
                    $genre_obj = wp_get_object_terms($film->ID, 'category');

                    $genre_arr = array();
                    foreach ($genre_obj as $genre) {
                        $genre_arr[$key_film] = global_cairo360::filter_words(array('content' => $genre->name, 'api' => true, 'lang' => $cur_lang));
                    }
                    $starring_arr = array();
                    $starring_obj = wp_get_object_terms($film->ID, 'starrings');
                    foreach ($starring_obj as $starring) {
                        $starring_arr[$key_film] = global_cairo360::filter_words(array('content' => $starring->name, 'api' => true, 'lang' => $cur_lang));
                    }


                    $films[$key_film] = array(
                        'id' => $film->ID,
                        'name' => global_cairo360::filter_words(array('content' => $film->post_title, 'api' => true, 'lang' => $cur_lang)),
                        "image" => (!empty(wp_get_attachment_url(get_post_thumbnail_id($film->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($film->ID)) : '',
                        "film_id" => $film->ID,
                        "genre" => !empty($genre_arr) ? implode(',', $genre_arr) : '',
                        "starring" => !empty($starring_arr) ? implode(',', $starring_arr) : '',
                    );
                }
            }
            $img_id = (!empty(get_post_thumbnail_id($cinema->ID))) ? (int) get_post_thumbnail_id($cinema->ID) : '';
            if (empty($address)) {
                $address = "";
            }
            $result[$key] = array(
                'id' => (string) $cinema->ID,
                'name' => global_cairo360::filter_words(array('content' => $cinema->post_title, 'api' => true, 'lang' => $cur_lang)),
                'lng' => $lng,
                'lat' => $lat,
                'venue_id' => (string) $cinema->ID,
                'address' => $address,
                'image' => (string) $img_id,
                'phoneNumbers' => (!empty($venue_telephone)) ? implode('-', $venue_telephone) : 0,
                "showingTimes" => $showing_times,
                "films" => $films,
                "location" => '',
                "url" => get_permalink($cinema->ID),
                "images" => array(
                    "original_url" => (!empty(wp_get_attachment_url(get_post_thumbnail_id($cinema->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($cinema->ID)) : '',
                    "standard_rect_url" => "",
                    "thumb_rect_url" => "",
                    "list_rect_url" => "",
                ),
            );
        }
        return $result;
    }

    /**
     *
     * @desc Get Film By ID
     * @param Item_id
     *  */
    function get_film_by_id(WP_REST_Request $request) {
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        if ($request->get_param('Item_id') == null) {
            return new WP_Error('invalid_film', 'Invalide Film', array('status' => 200));
        }
        $film_id = $request->get_param('Item_id');
        $user_token = $request->get_param('user_token');
        $glopal = new global_cairo360();
        $countUsersReviews = $glopal->get_count_user_reviews(array('post_id' => $film_id));
        $film = get_post($film_id);
        $status = $is_reviewed = $is_favorite = false;
        $cinemas_obj = new cinemas();
        $article_obj = new articles();
        $venue_obj = new venues();
        $film_info = array();

        if ($user_token) {
            $check = $this->check_user_reviews_and_favourites($user_token, $film_id);
            $is_favorite = $check['is_favorited'];
            $is_reviewed = $check['is_reviewed'];
            $is_rated = $check['is_rated'];
            $my_rate = (float) $check['my_rate'];
        }
        if (!$user_token) {
            $is_favorite = false;
            $is_reviewed = false;
            $is_rated = false;
            $my_rate = 0;
        }

        if (!empty($film)) {
            $status = true;
            $film_taxonomy = $cinemas_obj->get_film_taxonomy(array('film_id' => $film->ID, "api" => true));
// user rating count
            $comments_count = wp_count_comments($film->ID);
            $comments_count = $comments_count->approved;
// post language
            $language = apply_filters('wpml_post_language_details', NULL, $film->ID);

// cairo 360 reviews
            $cairo360_reviews_args = array(
                'post_id' => $film_id,
                'api' => true,
                'orderby' => 'post_date',
                'posts_per_page' => 1,
                'meta_query' => array(array(
                        'key' => 'article_item_reviewed',
                        'value' => $film_id,
                        'compare' => '='
                    ))
            );
            $cairo360 = $sections = array();

            $article_obj = new articles();
            $article = $article_obj->get_articles_by_item_reviewed(array('post_id' => $film->ID, 'api' => true));

// user rating count
            $article_info = array();
            if (!empty($article)) {
                if ($article['review_type'] == 1) {
                    $retrieve_tips = articles::cairo_reviews_api(array('article_id' => $article['id'], 'cur_lang' => $cur_lang));
                    $article_info = array(
                        'title' => (string) global_cairo360::filter_words(array('content' => $article['title'], 'api' => true)),
                        'body' => (string) global_cairo360::filter_words(array('content' => $article['body'], 'api' => true)),
                        'image' => (string) $article['image'],
                        'date' => (string) $article['date'],
                        'rate' => (string) $article['rate'],
                        'best_bit' => (string) $retrieve_tips['best_bit'],
                        'worst_bit' => (string) $retrieve_tips['worst_bit'],
                        'cairo_tip' => (string) $retrieve_tips['cairo360_tip'],
                    );
                }
            }
// sections ids

            foreach ($film_taxonomy['gernes'] as $gkey => $genre) {
                $term = get_term_by('name', $genre->name, "category");
                $sections[$gkey]['id'] = (string) $term->term_id;
                $sections[$gkey]['name'] = global_cairo360::filter_words(array('content' => $genre->name, 'api' => true, 'lang' => $cur_lang));
                $sections[$gkey]['name'] = global_cairo360::filter_words(array('content' => str_replace("&amp;", "and", $sections[$gkey]['name']), 'api' => true, 'lang' => $cur_lang));
            }
//cinemas
            $cinema_info = array();
            $cinemas = $cinemas_obj->get_film_cinemas(array('movie_id' => $film->ID, 'args' => '', 'api' => true));
            foreach ($cinemas as $ckey => $cinema) {
//phones
                $phones = get_post_meta($cinema->ID, "venue_phone", true);
//cities
                $cities = wp_get_object_terms($cinema->ID, 'cities');
                $area = '';
                $city = array();
                foreach ($cities as $city_key => $city_val) {
                    if ($city_val->parent == 0) {
                        $city[$city_key]['id'] = $city_val->term_id;
                        $city[$city_key]['name'] = $city_val->name;
                    }
                    if ($city_val->parent == $city[0]['id']) {
                        $area = $city_val->name;
                    }
                }
//showing time
                $showing_times = $cinemas_obj->get_film_showing_times(array('movie_id' => $film->ID, 'cinema_id' => $cinema->ID, 'api' => true));
                $cinema_info[$ckey]['id'] = $cinema->ID;
                $cinema_info[$ckey]['name'] = global_cairo360::filter_words(array('content' => $cinema->post_title, 'api' => true, 'lang' => $cur_lang));
                $cinema_info[$ckey]['area'] = $area; //pending
                $cinema_info[$ckey]['city'] = !empty($city[0]) ? $city[0]['name'] : ''; //pending
                $cinema_info[$ckey]['image'] = (!empty(wp_get_attachment_url(get_post_thumbnail_id($cinema->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($cinema->ID)) : '';
                $cinema_info[$ckey]['telephones'] = implode(',', $phones);
                $cinema_info[$ckey]['showtimes'] = $showing_times;
                $cinema_info[$ckey]['address'] = $venue_obj->get_venue_location(array('venue_id' => $cinema->ID, 'api' => true));

                if (empty($cinema_info[$ckey]['address'])) {
                    $cinema_info[$ckey]['address'] = "";
                }
            }
//end of cinemas
// genere
            $gernes = array_map(function($e) {
                return is_object($e) ? global_cairo360::filter_words(array('content' => $e->name, 'api' => true, 'lang' => $cur_lang)) : global_cairo360::filter_words(array('content' => $e['name'], 'api' => true, 'lang' => $cur_lang));
            }, $film_taxonomy['gernes']);
//starrings
            $starrings = array_map(function($e) {
                return is_object($e) ? global_cairo360::filter_words(array('content' => $e->name, 'api' => true, 'lang' => $cur_lang)) : global_cairo360::filter_words(array('content' => $e['name'], 'api' => true, 'lang' => $cur_lang));
            }, $film_taxonomy['starrings']);
//directors
            $directors = array_map(function($e) {
                return is_object($e) ? global_cairo360::filter_words(array('content' => $e->name, 'api' => true, 'lang' => $cur_lang)) : global_cairo360::filter_words(array('content' => $e['name'], 'api' => true, 'lang' => $cur_lang));
            }, $film_taxonomy['directors']);
//screenwriters
            $screenwriters = array_map(function($e) {
                return is_object($e) ? global_cairo360::filter_words(array('content' => $e->name, 'api' => true, 'lang' => $cur_lang)) : global_cairo360::filter_words(array('content' => $e['name'], 'api' => true, 'lang' => $cur_lang));
            }, $film_taxonomy['screenwriters']);
            $get_film_lang = wp_get_object_terms($film->ID, 'cairo_language');
            //film language
            $language_film = array_map(function($e) {
                return is_object($e) ? global_cairo360::filter_words(array('content' => $e->name, 'api' => true, 'lang' => $cur_lang)) : global_cairo360::filter_words(array('content' => $e['name'], 'api' => true, 'lang' => $cur_lang));
            }, $get_film_lang);

            $youtube_url = get_post_meta($film->ID, 'film_trailer_links', true);

            if (!empty($youtube_url)) {
                $imploded_youtube_url = implode(',', $youtube_url);
                $youtube_url = $imploded_youtube_url;
            } else {
                $youtube_url = '';
            }
            $film_rating = get_post_meta($film->ID, 'film_rating', true);

//            $gernes = str_replace("&amp;", "and", $gernes);

            $release_date = get_post_meta($film->ID, 'film_release_date', true);
            if ($release_date <= date('Y-m-d')) {
                $release_date = 'Out now'; //__('Out now', 'cairo360');
            }

            $film_info = array(
                'id' => $film->ID,
                'name' => $film->post_title,
                'description' => global_cairo360::filter_words(array('content' => get_post_meta($film->ID, 'film_synopsis', true), 'api' => true)),
                "language" => implode(',', $language_film),
                "genre" => implode(',', $gernes),
                "release" => $release_date,
                "starring" => implode(',', $starrings),
                "director" => implode(',', $directors),
                "writer" => implode(',', $screenwriters),
                "image" => (!empty(wp_get_attachment_url(get_post_thumbnail_id($film->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($film->ID)) : '',
                "youtube_url" => $youtube_url,
                "url" => get_permalink($film->ID),
                "rating_average" => $article_obj->get_avg_user_rating(array('post_id' => $film->ID, 'api' => true)), // pending
                "rating_users_count" => $comments_count, // pending
                "user_reviews_count" => $countUsersReviews, // pending
                "is_favorited" => $is_favorite, // pending
                "is_reviewed" => $is_reviewed, // pending
                "is_rated" => $is_rated, // pending
                "my_rate" => $my_rate, // pending
                "rating" => $film_rating, // pending
                "item_type" => "film",
                "cairo_reviews" => empty($article_info) ? $article_info : array($article_info),
                "sections_ids" => $sections,
                "cinemas" => $cinema_info
            );
        }
        $result = array(
            "status" => $status,
            "film" => $film_info
        );

        return $result;
    }

    /**
     * Grab Movie By id
     * @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , id
     * @return object|null movie
     */
    function get_book_by_id(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $user_token = $request->get_param('user_token');


        if ($request->get_param('id') == null) {
            return new WP_Error('invalid_book', 'Invalide Book', array('status' => 200));
        }
        $id = $request->get_param('id');
        $glopal = new global_cairo360();
        $countUsersReviews = $glopal->get_count_user_reviews(array('post_id' => $id));
        $book = get_post($id);

        if (empty($book)) {
            return new WP_Error('invalid_book', 'Invalide Book', array('status' => 200));
        }

        $sections = array();
        $sections_ids = array();
        $authorsarr = array();
        $article_details = array();

//Authors - Genre
        $authors = wp_get_object_terms($book->ID, 'book_authors');
        foreach ($authors as $author) {
            $authorsarr[] = global_cairo360::filter_words(array('content' => $author->name, 'api' => true, 'lang' => $cur_lang));
        }

        $genres = wp_get_object_terms($book->ID, 'category'); // 'taxonomy' field doesn't store term IDs in the custom fields, instead, it sets post terms
//print_r($genres);die;
        foreach ($genres as $key => $genre) {
            $sections[] = global_cairo360::filter_words(array('content' => $genre->name, 'api' => true, 'lang' => $cur_lang));
            $sections_ids[$key]['id'] = (string) $genre->term_id;
            $sections_ids[$key]['name'] = global_cairo360::filter_words(array('content' => $genre->name, 'api' => true, 'lang' => $cur_lang));
        }

        $book_lang = apply_filters('wpml_post_language_details', NULL, $book->ID);


//Book Custom Fields
        $obj = new articles();
        $langs = [];
        $book_lang = apply_filters('wpml_post_language_details', NULL, $book->ID);
        $price = (get_post_meta($book->ID, 'book_price', true) == false) ? '' : get_post_meta($book->ID, 'book_price', true);
        $avaliable_at = (get_post_meta($book->ID, 'book_avaliableat', true) == false) ? '' : get_post_meta($book->ID, 'book_avaliableat', true);
        $currency = (get_post_meta($book->ID, 'book_currency', true) == false) ? '' : get_post_meta($book->ID, 'book_currency', true);

        $languages = wp_get_object_terms($book->ID, 'cairo_language'); // 'taxonomy' field doesn't store term IDs in the custom fields, instead, it sets post terms
        foreach ($languages as $key => $language) {
            $langs[] = $language->name;
        }

        $release = (get_post_meta($book->ID, 'book_releasedate', true) == false) ? '' : get_post_meta($book->ID, 'book_releasedate', true);

        if ($release <= date('Y-m-d')) {
            $release = 'Out now'; //__('Out now', 'cairo360');
        }

        $article = $obj->get_articles_by_item_reviewed(array('post_id' => $book->ID, 'api' => true));
        $rating = '';
        $article_details = array();
        if (!empty($article)) {
            if ($article['review_type'] == 1) {
                $rating = $article['rate'];


                $retrieve_tips = articles::cairo_reviews_api(array('article_id' => $article['id'], 'cur_lang' => $cur_lang));
                $article_details = array(
                    'title' => global_cairo360::filter_words(array('content' => $article['title'], 'api' => true, 'lang' => $cur_lang)),
                    'body' => global_cairo360::filter_words(array('content' => $article['body'], 'api' => true)),
                    'image' => $article['image'],
                    'date' => $article['date'],
                    'rate' => $article['rate'],
                    'best_bit' => $retrieve_tips['best_bit'],
                    'worst_bit' => $retrieve_tips['worst_bit'],
                    'cairo_tip' => $retrieve_tips['cairo360_tip'],
                );
            }
        }
        $comments_count = wp_count_comments($book->ID);
        $comments_count = $comments_count->approved;

        $rating_average = $obj->get_avg_user_rating(array('post_id' => $book->ID, 'api' => true));
//print_r($rating_average);die;

        if ($user_token) {
            $check = $this->check_user_reviews_and_favourites($user_token, $id);

            $is_favorite = $check['is_favorited'];
            $is_reviewed = $check['is_reviewed'];
            $is_rated = $check['is_rated'];
            $my_rate = (float) $check['my_rate'];
        }
        if (!$user_token) {
            $is_favorite = false;
            $is_reviewed = false;
            $is_rated = false;
            $my_rate = 0;
        }



        $result['status'] = true;
        $result['book'] = array(
            'id' => $book->ID,
            'name' => global_cairo360::filter_words(array('content' => $book->post_title, 'api' => true)),
            'language' => $book_lang['language_code'],
            'rating_average' => $rating_average,
            'rating_users_count' => (float) $comments_count,
            "user_reviews_count" => $countUsersReviews,
            'is_favorited' => $is_favorite,
            'is_reviewed' => $is_reviewed,
            'is_rated' => $is_rated,
            'my_rate' => $my_rate,
            'item_type' => 'book',
            'image' => (!empty(wp_get_attachment_url(get_post_thumbnail_id($book->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($book->ID)) : '',
            'sections' => $sections,
            'sections_ids' => $sections_ids,
            'rating' => (float) $rating,
            'cairo_reviews' => empty($article_details) ? $article_details : array($article_details),
            'author' => $authorsarr,
            'release' => $release,
            'release_languages' => $langs,
            'price' => $price . ' ' . $currency,
            'available_at' => $avaliable_at,
        );

        return $result;
    }

    /**
     * Grab current week latest events
     * @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , id
     * @return object|null events
     */
    function get_current_week_latest_events(WP_REST_Request $request) {
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);
        $limit = ($request->get_param('limit') == null) ? 5 : $request->get_param('limit');
        $area = ($request->get_param('area') == null) ? 0 : $request->get_param('area');
        $newEventObj = new events();
        $dateOfCurrentWeek = $newEventObj->get_dates_for_this_week(array('api' => true));
        $week_start = $dateOfCurrentWeek[0];
        $week_end = $dateOfCurrentWeek[6];
        $result = array();
        foreach ($dateOfCurrentWeek as $day => $date) {
            $args = array(
                'posts_per_page' => $limit,
                'orderby' => 'post_date',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'event_start_datetime',
                        'value' => $date,
                        'compare' => '<=',
                        'type' => 'DATE'
                    ),
                    array(
                        'key' => 'event_end_datetime',
                        'value' => $date,
                        'compare' => '>=',
                        'type' => 'DATE'
                    ),
                ),
            );
            $latestEvents = $newEventObj->get_latest_events_list($args);
            foreach ($latestEvents as $key => $event) {
                $event_id = $event->ID;
                $brief = global_cairo360::filter_words(array('content' => $event->post_excerpt, 'api' => true));
                $name = global_cairo360::filter_words(array('content' => $event->post_title, 'api' => true));
                $thisday = date('d', strtotime($date));
                $start_date = get_post_meta($event_id, 'event_start_datetime', true);
                $end_date = get_post_meta($event_id, 'event_end_datetime', true);
                $start_time = date("H:i:s", strtotime($start_date));
                $end_time = date("H:i:s", strtotime($end_date));
                $event_venue_id = get_post_meta($event_id, 'event_venue', true);


                $venueArgs = array(
                    'posts_per_page' => 1,
                    'post_in' => $event_venue_id,
                    'post_type' => 'venue',
                    'post_status' => 'publish',
                    'suppress_filters' => 0,
                );
                $venue = get_post($event_venue_id);

//here you can add Veue Information easily
                if (!empty($venue)) {
                    $venue_name = global_cairo360::filter_words(array('content' => $venue->post_title, 'api' => true));
                    $venue_city = get_post_meta($event_venue_id, 'venue_addressline', true);
                    $venue_location = get_post_meta($event_venue_id, 'venue_address', true);
                } else {
                    $venue_name = "";
                    $venue_city = "";
                    $venue_location = "";
                }

                $img_id = (!empty(get_post_thumbnail_id($event_id))) ? (int) get_post_thumbnail_id($event_id) : '';
                $result[date('D', strtotime($date))][$key] = array(
                    'event_id' => $event_id,
                    'image_id' => (string) $img_id,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'brief' => $brief,
                    'location' => $venue_location,
                    'name' => $name,
                    'venue_id' => $event_venue_id,
                    'id' => $event_id,
                    'thisday' => $thisday,
                    'venue_name' => $venue_name,
                    'venue_city' => $venue_city,
                    'images' => array(
                        'event_image_id' => '',
                        'standard_rect_url' => '',
                        'thumb_rect_url' => '',
                        'thumb_square_url' => '',
                        'original_url' => (!empty(wp_get_attachment_url(get_post_thumbnail_id($event_id)))) ? wp_get_attachment_url(get_post_thumbnail_id($event_id)) : '',
                        'list_rect_url' => '',
                    ),
                );
            }
        }
        return $result;
    }

    /**
     *
     * Grab Event By id
     * @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , id
     * @return object|null Event
     */
    function get_event_by_id(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);


        if ($request->get_param('id') == null) {
            return new WP_Error('invalid_event', 'Invalide Event', array('status' => 200));
        }
        $id = $request->get_param('id');
        $glopal = new global_cairo360();
        $countUsersReviews = $glopal->get_count_user_reviews(array('post_id' => $id));
        $event = get_post($id);
//print_r($event);
        $event_id = $event->ID;
        $event_name = global_cairo360::filter_words(array('content' => $event->post_title, 'api' => true));
        $start_date = get_post_meta($event_id, 'event_start_datetime', true);
        $end_date = get_post_meta($event_id, 'event_end_datetime', true);
        $published_date = $event->post_date;
        $updated_date = $event->post_modified;
        $post_status = $event->post_status;
        $post_author = $event->post_author;
        $post_brief = global_cairo360::filter_words(array('content' => $event->post_content, 'api' => true));
        $my_post_language_details = apply_filters('wpml_post_language_details', NULL, $event_id);
        $language = $my_post_language_details['language_code'];
        $event_recomended = get_post_meta($event_id, 'event_recommended', true);
        $sectionarr = array();
        $sections = wp_get_object_terms($event_id, 'category');
        foreach ($sections as $key => $section) {
            if ($section->parent == 0) {
                continue;
            } else {
                $sectionarr[$key]['id'] = $section->term_id;
                $sectionarr[$key]['name'] = global_cairo360::filter_words(array('content' => $section->name, 'api' => true));
            }
        }
        if (!empty($sectionarr)) {
            $sectionarr = array_values($sectionarr);
        }

        $event_venue_id = get_post_meta($event_id, 'event_venue', true);

        $venue = get_post($event_venue_id);
//here you can add Veue Information easily
        $venue_info = array();
        if (!empty($venue)) {
            $venue_name = global_cairo360::filter_words(array('content' => $venue->post_title, 'api' => true));
            $venue_location = global_cairo360::filter_words(array('content' => $venue->post_title, 'api' => true));
            $venue_info['venue_name'] = global_cairo360::filter_words(array('content' => $venue->post_title, 'api' => true));
            $venue_info['venue_city'] = global_cairo360::filter_words(array('content' => $venue->post_title, 'api' => true));

            $venue_info['latitude'] = get_post_meta($venue->ID, 'map_latitude', true);
            $venue_info['longitude'] = get_post_meta($venue->ID, 'map_longitude', true);
            $venue_info['image'] = (!empty(wp_get_attachment_url(get_post_thumbnail_id($venue->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($venue->ID)) : '';
            $venue_info['telephones'] = (!empty(get_post_meta($venue->ID, 'venue_phone', true))) ? get_post_meta($venue->ID, 'venue_phone', true) : array();
        } else {
            $venue_name = "";
            $venue_location = get_post_meta($event_id, 'event_other_location', true);
        }

        $article_obj = new articles();
        $rating_average = $article_obj->get_avg_user_rating(array('post_id' => $event_id, 'api' => true));

        $img_id = (!empty(get_post_thumbnail_id($event_id))) ? (int) get_post_thumbnail_id($event_id) : '';
        $result = array(
            'event_id' => (string) $event_id,
            'version' => 0,
            'image_id' => (string) $img_id,
            'name' => $event_name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'published_date' => $published_date,
            'last_updated' => $updated_date,
            'created' => $published_date,
            'updated_by' => $post_author,
            'created_by' => $post_author,
            'retro_image_id' => '',
            'disqus_thread_id' => '',
            'rating_average' => $rating_average,
            "rating_users_count" => $countUsersReviews,
            'language' => $language,
            'venue_id' => $event_venue_id,
            'id' => (string) $event_id,
            'tazkarty_id' => '',
            'brief' => global_cairo360::filter_words(array('content' => $post_brief, 'api' => true)),
            'home_page' => '',
            'recommended' => $event_recomended,
            'enabled' => 1,
            'other_info' => '',
            'location' => (string) $venue_location,
            'status' => (string) $post_status,
            'url' => get_permalink($event_id),
            'viewed' => "0",
            'images' => array(
                'standard_rect_url' => '',
                'thumb_rect_url' => '',
                'thumb_square_url' => '',
                'original_url' => (!empty(wp_get_attachment_url(get_post_thumbnail_id($event_id)))) ? wp_get_attachment_url(get_post_thumbnail_id($event_id)) : '',
                'list_rect_url' => '',
            ),
            "venue" => (!empty($venue_info)) ? $venue_info : (object) $venue_info,
            "sections_ids" => $sectionarr
        );

        return $result;
    }

    public function check_user_reviews_and_favourites($user_token, $post_id) {
//create obj from validator class
        $validator_obj = new validator();

//create obj from user class
        $user_obj = new user();

        $status = $is_reviewed = $is_favorite = false;

//user variables
        $user = $user_obj->get_user_data_by_token($user_token);
        $user_id = $user[0]->data->ID;

        $validate = $validator_obj->validate_user_token($user_token);

        $expire_date = get_user_meta($user_id, 'expire_date', true);

        $check_expire_date = $validator_obj->validate_expire_date($expire_date);

        if ($validate == true && $check_expire_date == true) {
//$user_fav_arr =get_users_who_favorited_post($post_id);
            $user_fav_arr = get_user_favorites($user_id);
            if (in_array($post_id, $user_fav_arr)) {
                $is_favorite = true;
            }
            $args = array(
                'ID' => $user_id,
                "post_id" => $post_id
            );

            $reviews = get_comments($args);
            $comment_id = $reviews[0]->comment_ID;
            if (sizeof($reviews) >= 1) {
                $is_reviewed = true;
            }
            $rating = get_comment_meta($comment_id, 'pixrating', true);
            $result = array(
                "is_favorited" => $is_favorite,
                "is_reviewed" => $is_reviewed,
                "is_rated" => $is_reviewed,
                "my_rate" => $rating,
            );
            return $result;
        } else {

            $result = array(
                "is_favorited" => false,
                "is_reviewed" => false,
                "is_rated" => false,
                "my_rate" => 0,
            );
            return $result;
        }
    }

    /**
     * Grab Venue By id
     * @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , id
     * @return object|null Venue
     */
    function get_venue_by_id(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $id = $request->get_param('id');
        $user_token = $request->get_param('user_token');

        if ($request->get_param('id') == null) {
            return new WP_Error('invalid_venue', 'Invalide Venue', array('status' => 200));
        }
        if ($user_token) {
            $check = $this->check_user_reviews_and_favourites($user_token, $id);

            $is_favorite = $check['is_favorited'];
            $is_reviewed = $check['is_reviewed'];
            $is_rated = $check['is_rated'];
            $my_rate = (float) $check['my_rate'];
        }
        if (!$user_token) {
            $status = $is_reviewed = $is_favorite = false;
            $my_rate = 0;
        }
        $glopal = new global_cairo360();
        $countUsersReviews = $glopal->get_count_user_reviews(array('post_id' => $id));
        $venue = get_post($id);
//print_r($venue);
        if (empty($venue)) {
            $result_arr = array(
                "status" => false,
                "status_msg" => "No item found!"
            );
            return $result_arr;
        }

        $venue_id = $venue->ID;
        $venue_name = global_cairo360::filter_words(array('content' => $venue->post_title, 'api' => true));
        $my_post_language_details = apply_filters('wpml_post_language_details', NULL, $venue_id);
        $language = $my_post_language_details['language_code'];
        $opening_times = get_post_meta($venue_id, 'venue_opentime', true);
        $closing_times = get_post_meta($venue_id, 'venue_closetime', true);
        $map = get_post_meta($venue_id, 'map', true);
        if (!empty($map)) {
            $lat_lang = explode(',', $map);
            $lat = $lat_lang[0];
            $lng = $lat_lang[1];
        } else {
            $lat = '';
            $lng = '';
        }
        $type = $venue->post_type;
        $url = get_permalink($venue_id);
        $image = (!empty(wp_get_attachment_url(get_post_thumbnail_id($venue_id)))) ? wp_get_attachment_url(get_post_thumbnail_id($venue_id)) : '';
        $telephones = get_post_meta($venue_id, 'venue_phone', true);
        $sectionarr = array();
        $tagarr = array();
        $sections = wp_get_object_terms($venue_id, 'category');
        foreach ($sections as $key => $section) {
            if ($section->parent == 0) {
                continue;
            } else {
                $sectionarr[$key]['id'] = (string) $section->term_id;
                $sectionarr[$key]['name'] = global_cairo360::filter_words(array('content' => $section->name, 'api' => true));
                $tagarr[] = global_cairo360::filter_words(array('content' => $section->name, 'api' => true));
            }
        }
        if (!empty($sectionarr)) {
            $sectionarr = array_values($sectionarr);
        }

//        $tags = wp_get_object_terms($venue_id, 'post_tag');
//        foreach ($tags as $tag) {
//            $tagarr[] = $tag->name;
//        }

        $article_obj = new articles();
        $article = $article_obj->get_articles_by_item_reviewed(array('post_id' => $id, 'api' => true));

// user rating count
        $comments_count = wp_count_comments($venue->ID);
        $comments_count = $comments_count->approved;
        $article_info = array();
        if (!empty($article)) {
            if ($article['review_type'] == 1) {

                $retrieve_tips = articles::cairo_reviews_api(array('article_id' => $article['id'], 'cur_lang' => $cur_lang));

                $article_info = array(
                    'title' => (string) global_cairo360::filter_words(array('content' => $article['title'], 'api' => true)),
                    'body' => (string) global_cairo360::filter_words(array('content' => $article['body'], 'api' => true)),
                    'image' => (string) $article['image'],
                    'date' => (string) $article['date'],
                    'rate' => (float) $article['rate'],
                    'best_bit' => (string) $retrieve_tips['best_bit'],
                    'worst_bit' => (string) $retrieve_tips['worst_bit'],
                    'cairo_tip' => (string) $retrieve_tips['cairo360_tip'],
                );
            }
        }
        $website = get_post_meta($venue_id, 'venue_url', true);


        if (empty($telephones)) {
            $telephones = array();
        }
        $venue_arr = array(
            "id" => $venue_id,
            "name" => $venue_name,
            "language" => $language,
            "opening_times" => $opening_times,
            "closing_times" => $closing_times,
            "lat" => $lat,
            "lng" => $lng,
            "rating_average" => $article_obj->get_avg_user_rating(array('post_id' => $venue_id, 'api' => true)), // pending
            "rating_users_count" => $comments_count,
            "user_reviews_count" => $countUsersReviews,
            "is_favorited" => $is_favorite,
            "is_reviewed" => $is_reviewed,
            "is_rated" => $is_reviewed,
            "my_rate" => $my_rate,
            "item_type" => $type,
            "url" => $url,
            "website" => $website,
            "image" => $image,
            "tags" => $tagarr,
            "sections_ids" => $sectionarr,
            "telephones" => $telephones,
            "cairo_rate" => (float) $article_info['rate'],
            "cairo_reviews" => empty($article_info) ? $article_info : array($article_info),
        );

        $result = array(
            "status" => true,
            "venue" => $venue_arr,
        );

        return $result;
    }

    /**
     * Grab Events By date
     * @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , date
     * @return object|null Events
     */
    function get_events_by_date(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);


        if ($request->get_param('date') == null) {
            return new WP_Error('invalid_event', 'Invalide Event', array('status' => 200));
        }
        $limit = ($request->get_param('limit') == null) ? 5 : $request->get_param('limit');
        $offset = ($request->get_param('offset') == null) ? 0 : $request->get_param('offset');
        $area = ($request->get_param('area') == null) ? '' : $request->get_param('area');
//check date
        $date = $request->get_param('date');

        if ($date == 'today') {
            $date = date('Y-m-d');
        } else {
            $date = date('Y-m-d', strtotime($date));
        }
        if (!empty($area) || $area != 'all') {
            $args['tax_query'] = array(array('taxonomy' => 'cities',
                    'field' => 'name',
                    'terms' => $area,
                    'include_children' => true,
                    'operator' => 'IN'));
        }
        $args = array(
            'posts_per_page' => $limit,
            'suppress_filters' => 0,
            'post_type' => 'event',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'event_start_datetime',
                    'value' => $date,
                    'compare' => '<=',
                    'type' => 'DATE'
                ),
                array(
                    'key' => 'event_end_datetime',
                    'value' => $date,
                    'compare' => '>=',
                    'type' => 'DATE'
                ),
            ),
            'offset' => $offset,
        );

        $events = get_posts($args);
        $result = array();
        if (!empty($events)) {
            foreach ($events as $key => $event) {
                $event_id = $event->ID;
                $brief = global_cairo360::filter_words(array('content' => $event->post_excerpt, 'api' => true));
                $name = $event->post_title;
                $thisday = date('d');
                $start_date = !empty(get_post_meta($event_id, 'event_start_datetime', true)) ? date('Y-m-d', strtotime(get_post_meta($event_id, 'event_start_datetime', true))) : '';
                $end_date = !empty(get_post_meta($event_id, 'event_start_datetime', true)) ? date('Y-m-d', strtotime(get_post_meta($event_id, 'event_end_datetime', true))) : '';
                $start_time = !empty($start_date) ? date("H:i:s", strtotime($start_date)) : '';
                $end_time = !empty($end_date) ? date("H:i:s", strtotime($end_date)) : '';
                $event_venue_id = get_post_meta($event_id, 'event_venue', true);



                $venue = get_post($event_venue_id);

//here you can add Veue Information easily
                if (!empty($venue)) {
                    $venue_name = $venue->post_title;
                    $venue_city = get_post_meta($event_venue_id, 'venue_addressline', true);
                    $venue_location = get_post_meta($event_venue_id, 'venue_address', true);
                } else {
                    $venue_name = "";
                    $venue_city = "";
                    $venue_location = "";
                }
                $img_id = (!empty(get_post_thumbnail_id($event->ID))) ? (int) get_post_thumbnail_id($event->ID) : '';
                if (!empty($venue_city)) {
                    $imploded_venue_city = implode(',', $venue_city);
                    $venue_city = $imploded_venue_city;
                }
                $result[$key] = array(
                    'event_id' => (string) $event_id,
                    //'image_id' => (!empty(wp_get_attachment_url(get_post_thumbnail_id($event_id)))) ? wp_get_attachment_url(get_post_thumbnail_id($event_id)) : '',
                    'image_id' => (string) $img_id,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'brief' => $brief,
                    'location' => $venue_location,
                    'name' => $name,
                    'venue_id' => $event_venue_id,
                    'venue_name' => $venue_name,
                    'venue_city' => $venue_city,
                    'images' => array(
                        'event_image_id' => '',
                        'standard_rect_url' => '',
                        'thumb_rect_url' => '',
                        'thumb_square_url' => '',
                        'original_url' => (!empty(wp_get_attachment_url(get_post_thumbnail_id($event_id)))) ? wp_get_attachment_url(get_post_thumbnail_id($event_id)) : '',
                        'list_rect_url' => '',
                    ),
                );
            }

            return $result;
        } else {
            $result = array();
            return $result;
        }
    }

    /**
     * Grab Music By id
     * @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , id
     * @return object|null Music
     */
    function get_music_by_id(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);


        if ($request->get_param('id') == null) {
            return new WP_Error('invalid_music', 'Invalide Music', array('status' => 200));
        }
        $id = $request->get_param('id');
        $user_token = $request->get_param('user_token');
        $glopal = new global_cairo360();
        $countUsersReviews = $glopal->get_count_user_reviews(array('post_id' => $id));

        $music = get_post($id);
        if (!$music) {
            $result = array(
                "status" => false,
                "status_msg" => "No item found!"
            );
            return $result;
        }
        $music_label = get_post_meta($id, 'music_label', true);
        $music_artist = get_post_meta($id, 'music_artist', true);
        $avaliable = get_post_meta($id, 'music_avaliableat', true);
        $youtube_url = get_post_meta($id, 'music_youtubeurl', true);
        $rating = get_post_meta($id, 'venue_rating', true);
        $albums = get_post_meta($id, 'discs-and-tracks', true);

        $release_date = get_post_meta($id, 'music_releasedate', true);
        if ($release_date <= date('Y-m-d')) {
            $release_date = 'Out now'; //__('Out now', 'cairo360');
        }
        foreach ($albums as $album) {
            $albumname[] = $album['disc-name'];
        }
//var_dump($album);
        $my_post_language_details = apply_filters('wpml_post_language_details', NULL, $id);
        $language = $my_post_language_details['language_code'];
        $url = get_permalink($id);
        $image = (!empty(wp_get_attachment_url(get_post_thumbnail_id($id)))) ? wp_get_attachment_url(get_post_thumbnail_id($id)) : '';
        $type = $music->post_type;
//var_dump($music);
// echo $id ;
        $sections = wp_get_object_terms($id, 'category');
        foreach ($sections as $section) {
            $section_name[] = global_cairo360::filter_words(array('content' => $section->name, 'api' => true, 'lang' => $cur_lang));
            $section_id[] = $section->term_id;
        }

        $obj = new articles();

        $article = $obj->get_articles_by_item_reviewed(array('post_id' => $id, 'api' => true));
        $article_info = array();
        if (!empty($article)) {
            if ($article['review_type'] == 1) {
                if (empty($article['title'])) {
                    $article['title'] = "";
                }
                if (empty($article['body'])) {
                    $article['body'] = "";
                }
                if (empty($article['date'])) {
                    $article['date'] = "";
                }
                if (empty($article['best_bit'])) {
                    $article['best_bit'] = "";
                }
                if (empty($article['worst_bit'])) {
                    $article['worst_bit'] = "";
                }
                if (empty($article['cairo_tip'])) {
                    $article['cairo_tip'] = "";
                }
                if (empty($article['image'])) {
                    $article['image'] = "";
                }
                $retrieve_tips = articles::cairo_reviews_api(array('article_id' => $article['id'], 'cur_lang' => $cur_lang));

                $article_info = array(
                    'title' => global_cairo360::filter_words(array('content' => $article['title'], 'api' => true)),
                    'body' => global_cairo360::filter_words(array('content' => htmlspecialchars_decode($article['body']), 'api' => true)),
                    'image' => $article['image'],
                    'date' => $article['date'],
                    'rate' => (float) $article['rate'],
                    'best_bit' => $retrieve_tips['best_bit'],
                    'worst_bit' => $retrieve_tips['worst_bit'],
                    'cairo_tip' => $retrieve_tips['cairo360_tip'],
                );
            }
        }
        if ($user_token) {
            $check = $this->check_user_reviews_and_favourites($user_token, $id);
            $is_favorite = $check['is_favorited'];
            $is_reviewed = $check['is_reviewed'];
            $is_rated = $check['is_rated'];
            $my_rate = (float) $check['my_rate'];
        }
        if (!$user_token) {
            $is_favorite = false;
            $is_reviewed = false;
            $is_rated = false;
            $my_rate = 0;
        }
        $article_obj = new articles();
        $rating_average = $article_obj->get_avg_user_rating(array('post_id' => $id, 'api' => true));

        $section_name = str_replace("&amp;", "and", $section_name);
//echo $replaced_slug ; die;


        $result = array(
            "status" => true,
            "music" => array(
                "id" => $id,
                "music_label" => $music_label,
                "artist" => $music_artist,
                "album" => global_cairo360::filter_words(array('content' => $music->post_title, 'api' => true, 'lang' => $cur_lang)),
                "language" => $language,
                "release" => $release_date,
                "available_at" => $avaliable,
                "image" => $image,
                "rating_average" => $rating_average,
                "user_reviews_count" => $countUsersReviews,
                "is_favorited" => $is_favorite,
                "is_reviewed" => $is_reviewed,
                "is_rated" => $is_rated,
                "my_rate" => $my_rate,
                "rating" => (float) $rating,
                "item_type" => $type,
                "url" => $url,
                "sections" => $section_name,
                "sections_ids" => array(array(
                        'id' => implode($section_id),
                        'name' => implode($section_name),
                    )),
                "cairo_reviews" => empty($article_info) ? $article_info : array($article_info),
                "youtube_url" => empty($youtube_url) ? '' : implode(',', $youtube_url),
            )
        );
        return $result;
    }

    /**
     * Get Article By id
     * @author Ereny Gamal <ereny.gamal@brightcreations.com>
     * @param id
     * @return object|null Article
     */
    function get_article_by_id(WP_REST_Request $request) {
        if ($request->get_param('id') == null) {
            return new WP_Error('invalid_article', 'Invalide Article', array('status' => 200));
        }
        $result = array();
        $id = $request->get_param('id');
        $glopal = new global_cairo360();
        $countUsersReviews = $glopal->get_count_user_reviews(array('post_id' => $id));
        $article = get_post($id);
        if (!empty($article)) {
            $language = apply_filters('wpml_post_language_details', NULL, $id);

            $article_type = get_post_meta($id, 'article_type', true);

            $tips_info = array();
            if ($article_type == 1) {
                $retrieve_tips = articles::cairo_reviews_api(array('article_id' => $id, 'cur_lang' => 'en'));
                $type = "Review";
                $tips_info['best_bit'] = $retrieve_tips['best_bit'];
                $tips_info['worst_bit'] = $retrieve_tips['worst_bit'];
                $tips_info['cairo360_tip'] = $retrieve_tips['cairo360_tip'];
                $articled_item_id = get_post_meta($id, 'article_item_reviewed', true);
            } else {
                $articled_item_id = 0;
                $type = "Feature";
                $best_bit = $worst_bit = $cairo360_tip = '';
            }
            $sponsored = (get_post_meta($id, 'article_sponsored', true) == null) ? 0 : get_post_meta($id, 'article_sponsored', true);
            $recommended = (get_post_meta($id, 'article_recommended', true) == null) ? 0 : get_post_meta($id, 'article_recommended', true);
            $writer_id = get_post_meta($id, 'article_writer', true);
            $article_item_id = get_post_meta($id, 'article_item_reviewed', true);
            $category_info = wp_get_object_terms($id, 'category');
            $category = array();
            if (!empty($category_info[0])) {
                $category = array(
                    'name' => global_cairo360::filter_words(array('content' => $category_info[0]->name, 'api' => true)),
                    'urlParam' => $category_info[0]->slug,
                    'id' => (string) $category_info[0]->term_id,
                );
            }


            $ReviewerInfo = $RelatedReviews = array();
            $extra = array();
            if (!empty($articled_item_id)) {

                $venue_obj = new venues();
                $address = $venue_obj->get_venue_location(array('venue_id' => $articled_item_id, 'api' => true));
                $venue_telephone = get_post_meta($articled_item_id, 'venue_phone', true);
                $extra = array(array(
                        'key' => 'name',
                        'value' => get_the_title($articled_item_id),
                        "icon" => ""
                    ),
                    array(
                        "key" => "telephone",
                        "value" => (!empty($venue_telephone)) ? implode(',', $venue_telephone) : 0,
                        "icon" => ""
                    ),
                    array(
                        "key" => "address",
                        "value" => $address,
                        "icon" => ""
                ));
            }

            $article_obj = new articles();
            $user_rating = $article_obj->get_avg_user_rating(array('post_id' => $id, 'api' => true));

            $result = array(
                array(
                    "article_id" => $id,
                    "type" => $type,
                    "version" => 0, //pending
                    "title" => global_cairo360::filter_words(array('content' => $article->post_title, 'api' => true)),
                    "body" => global_cairo360::filter_words(array('content' => $article->post_content, 'api' => true)),
                    "status" => ($article->post_status == 'publish')? 'PUBLISHED' :$article->post_status,
                    "enabled" => 1, //pending
                    "recommended" => $recommended,
                    "published_date" => date('Y-m-d', strtotime($article->post_date)),
                    "last_updated" => $article->post_modified,
                    "created" => $article->post_date,
                    "updated_by" => $article->post_author, //pending
                    "created_by" => $article->post_author,
                    "writer_id" => $writer_id,
                    "image_id" => get_post_thumbnail_id($id),
                    "default_video_id" => '', //pending
                    "articled_item_id" => $article_item_id,
                    "disqus_thread_id" => '', //pending
                    "rating_average" => $user_rating, //pending
                    "user_reviews_count" => $countUsersReviews,
                    "sponsored" => $sponsored,
                    "language" => $language['language_code'],
                    "viewed" => "", //pending
                    "rating_php" => "", //pending
                    "url_php" => "", //pending
                    "id" => $id,
                    "user_rating" => "", //pending
                    "name" => global_cairo360::filter_words(array('content' => $article->post_title, 'api' => true)),
                    "sponsor" => $sponsored,
                    "image" => (!empty(wp_get_attachment_url(get_post_thumbnail_id($id)))) ? wp_get_attachment_url(get_post_thumbnail_id($id)) : '',
                    "other_image" => array(),
                    "Category" => $category,
                    "ReviewerInfo" => $ReviewerInfo, //pending
                    "tips" => (object) $tips_info,
                    "stuff_rating" => "", //pending
                    "extra" => $extra,
                    "RelatedReviews" => $RelatedReviews, //pending
                    "UserReviews" => "", //pending
                    'images' => array(
                        'original_url' => (!empty(wp_get_attachment_url(get_post_thumbnail_id($id)))) ? wp_get_attachment_url(get_post_thumbnail_id($id)) : '',
                        'accordion_url' => '',
                        'squeezed_url' => '',
                        'standard_rect_url' => '',
                        'thumb_rect_url' => '',
                        'list_rect_url' => '',
                        'medium_square_url' => '',
                        'small_square_url' => ''
                    ),
                    "url" => get_permalink($id),
                )
            );
        } else {
            $result = array(
                "status" => false,
                "status_msg" => "No item found!"
            );
        }
        return $result;
    }

    /**
     * Grab DVD By id
     * @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , id
     * @return object|null DVD
     */
    function get_dvd_by_id(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $user_token = $request->get_param('user_token');


        if ($request->get_param('id') == null) {
            return new WP_Error('invalid_dvd', 'Invalide DVD', array('status' => 200));
        }
        $id = $request->get_param('id');
        $glopal = new global_cairo360();
        $countUsersReviews = $glopal->get_count_user_reviews(array('post_id' => $id));

        $dvd = get_post($id);
        if (!$dvd) {
            $result = array(
                "status" => false,
                "status_msg" => "No item found!"
            );
            return $result;
        }
        $name = global_cairo360::filter_words(array('content' => $dvd->post_title, 'api' => true));
//print_r($dvd);

        $description = get_post_meta($id, 'dvd_synopsis', true);

        $music_artist = get_post_meta($id, 'music_artist', true);
        $avaliable = get_post_meta($id, 'dvd_avaliableat', true);
        $youtube_url = get_post_meta($id, 'dvd_trailers', true);
        $rating = get_post_meta($id, 'dvd_rating', true);
        $release_date = get_post_meta($id, 'dvd_releasedate', true);
        if ($release_date <= date('Y-m-d')) {
            $release_date = 'Out now'; //__('Out now', 'cairo360');
        }

        $my_post_language_details = apply_filters('wpml_post_language_details', NULL, $id);
        $language = $my_post_language_details['language_code'];
        $url = get_permalink($id);
        $image = (!empty(wp_get_attachment_url(get_post_thumbnail_id($id)))) ? wp_get_attachment_url(get_post_thumbnail_id($id)) : '';
        $type = $dvd->post_type;

        $sections = wp_get_object_terms($id, 'category');
        foreach ($sections as $section) {
            $section_name[] = global_cairo360::filter_words(array('content' => $section->name, 'api' => true));
            $section_id[] = $section->term_id;
        }
//var_dump($sections);
        $directors = wp_get_post_terms($id, 'directors');
        $direcarr = array();
        foreach ($directors as $director) {
            $direcarr[] = global_cairo360::filter_words(array('content' => $director->name, 'api' => true));
        }

        $stararr = array();
        $starrings = wp_get_post_terms($id, 'starrings');

        foreach ($starrings as $star) {
            $stararr[] = global_cairo360::filter_words(array('content' => $star->name, 'api' => true));
        }
        $release_langarr = array();
        $release_langs = wp_get_post_terms($id, 'cairo_language');
        foreach ($release_langs as $release_lang) {
            $release_langarr[] = global_cairo360::filter_words(array('content' => $release_lang->name, 'api' => true));
        }

        $article_obj = new articles();
        $article = $article_obj->get_articles_by_item_reviewed(array('post_id' => $id, 'api' => true));
        $article_info = array();
        if (!empty($article)) {
            if ($article['review_type'] == 1) {

                $retrieve_tips = articles::cairo_reviews_api(array('article_id' => $article['id'], 'cur_lang' => $cur_lang));

                $article_info = array(
//'id'  => $article['id'],
                    'title' => (string) global_cairo360::filter_words(array('content' => $article['title'], 'api' => true)),
                    'body' => (string) global_cairo360::filter_words(array('content' => $article['body'], 'api' => true)),
                    'image' => (string) $article['image'],
                    'date' => (string) $article['date'],
                    'rate' => (float) $article['rate'],
                    'best_bit' => (string) $retrieve_tips['best_bit'],
                    'worst_bit' => (string) $retrieve_tips['worst_bit'],
                    'cairo_tip' => (string) $retrieve_tips['cairo360_tip'],
                );
            }
        }
// user rating count
        $comments_count = wp_count_comments($id);
        $comments_count = $comments_count->approved;
        $rating_average = $article_obj->get_avg_user_rating(array('post_id' => $id, 'api' => true));


        $args = array(
            'post_id' => $id,
        );
        $reviews = get_comments($args);
        $rate_counter = 0;
        foreach ($reviews as $key => $review) {
            $content = $review->comment_content;
            if (empty($content)) {
                $rate_counter ++;
            }
            $user_reviews_count = sizeof($reviews) - $rate_counter;
        }


        if ($user_token) {
            $check = $this->check_user_reviews_and_favourites($user_token, $id);
            $is_favorite = $check['is_favorited'];
            $is_reviewed = $check['is_reviewed'];
            $is_rated = $check['is_rated'];
            $my_rate = (float) $check['my_rate'];
        }
        if (!$user_token) {
            $is_favorite = false;
            $is_reviewed = false;
            $is_rated = false;
            $my_rate = 0;
        }

        $rating = get_post_meta($id, 'venue_rating', true);

        $section_name = str_replace("&amp;", "and", $section_name);


        $sections_ids_arr = array(
            'id' => implode(',', $section_id),
            'name' => implode(',', $section_name),
        );
        $result = array(
            "status" => true,
            "dvd" => array(
                "id" => (float) $id,
                "name" => $name,
                "description" => global_cairo360::filter_words(array('content' => $description, 'api' => true)),
                "language" => $language,
                "rating_average" => $rating_average,
                "rating_users_count" => (float) sizeof($reviews),
                "user_reviews_count" => (float) $user_reviews_count,
                "available_at" => $avaliable,
                "is_favorited" => $is_favorite,
                "is_reviewed" => $is_reviewed,
                "is_rated" => $is_rated,
                "my_rate" => $my_rate,
                "item_type" => $type,
                "url" => $url,
                "image" => $image,
                "sections" => $section_name,
                "sections_ids" => array($sections_ids_arr),
                "rating" => (float) $rating,
                "cairo_reviews" => empty($article_info) ? $article_info : array($article_info),
                "starring" => implode(',', $stararr),
                "director" => implode(',', $direcarr),
                "release" => $release_date,
                "release_languages" => $release_langarr
            )
        );
        return $result;
    }

    /**
     * Grab Cinema By id
     * @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , id
     * @return object|null Cinema
     */
    function get_cinema_by_id(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);


        if ($request->get_param('id') == null) {
            return new WP_Error('invalid_cinema', 'Invalide Cinema', array('status' => 200));
        }
        $id = $request->get_param('id');
        $glopal = new global_cairo360();
        $countUsersReviews = $glopal->get_count_user_reviews(array('post_id' => $id));
        $cinema = get_post($id);
//print_r($cinema);

        $cinema_name = global_cairo360::filter_words(array('content' => $cinema->post_title, 'api' => true));
        $my_post_language_details = apply_filters('wpml_post_language_details', NULL, $id);
        $language = $my_post_language_details['language_code'];

        $map = get_post_meta($id, 'map', true);
        if (!empty($map)) {
            $lat_lang = explode(',', $map);
            $lat = $lat_lang[0];
            $lng = $lat_lang[1];
        } else {
            $lat = '';
            $lng = '';
        }

        $url = get_permalink($id);
        $image = (!empty(wp_get_attachment_url(get_post_thumbnail_id($id)))) ? wp_get_attachment_url(get_post_thumbnail_id($id)) : '';
        $telephonearr = array();
        $telephones = get_post_meta($id, 'venue_phone', true);
        foreach ($telephones as $telephone) {
            $telephonearr[] = $telephone;
        }
        $locationarr = array();
        $locations = get_post_meta($id, 'venue_addressline', true);
        foreach ($locations as $location) {
            $locationarr[] = $location;
        }
// print_r($locationarr);
        $address = get_post_meta($id, 'venue_address', true);
        $img_id = (!empty(get_post_thumbnail_id($id))) ? (int) get_post_thumbnail_id($id) : '';

        $cinema_obj = new cinemas();
        $cinema_times = $cinema_obj->get_cinema_times(array('cinema_id' => $id, 'api' => true));
        $cinema_image = (!empty(wp_get_attachment_url(get_post_thumbnail_id($id)))) ? wp_get_attachment_url(get_post_thumbnail_id($id)) : '';


        $films = $cinema_obj->get_films_in_cinema(array('cinema_id' => $id, 'api' => true));

        foreach ($films as $key => $film) {
# code...
            $film_id = $film->ID;
            $film_name = global_cairo360::filter_words(array('content' => $film->post_title, 'api' => true));
            $film_image = (!empty(wp_get_attachment_url(get_post_thumbnail_id($film_id)))) ? wp_get_attachment_url(get_post_thumbnail_id($film_id)) : '';
            $showing_times = $cinema_obj->get_film_showing_times(array('movie_id' => $film->ID, 'cinema_id' => $id, 'api' => true));
            $genre_arr = array();
            $genres = wp_get_object_terms($film->ID, 'category');
//print_r($genres);die;
            if (!empty($genres)) {
                foreach ($genres as $genre) {
                    $genre_arr[] = global_cairo360::filter_words(array('content' => $genre->name, 'api' => true));
                }
            }
            $starring_arr = array();
            $starrings = wp_get_post_terms($film->ID, 'starrings');
            if (!empty($starrings)) {
                foreach ($starrings as $star) {
                    $starring_arr[] = global_cairo360::filter_words(array('content' => $star->name, 'api' => true));
                }
            }

            $articleobj = new articles();

            $article = $articleobj->get_articles_by_item_reviewed(array('post_id' => $film->ID, 'api' => true));
            if (empty($article)) {
                $artcile = "";
            }
//print_r($article);die;
            $cinema_count = $cinema_obj->count_cinemas(array('movie_id' => $film->ID, 'api' => true));
            $youtube_url = get_post_meta($film->ID, 'film_trailer_links', true);
            if (!empty($youtube_url)) {
                $imploded_youtube_url = implode(',', $youtube_url);
                $youtube_url = $imploded_youtube_url;
            }
            if (empty($youtube_url)) {
                $youtube_url = "";
            }

            if (!empty($genre_arr)) {
                $imploded_genre_arr = implode(',', $genre_arr);
                $genre_arr = $imploded_genre_arr;
            }

            if (empty($genre_arr)) {
                $genre_arr = "";
            }


            if (!empty($starring_arr)) {
                $imploded_starring_arr = implode(',', $starring_arr);
                $starring_arr = $imploded_starring_arr;
            }

// if(empty($starring_arr)){
//   $starring_arr = array();
// }


            $films_arr[] = array(
                "id" => (string) $article['id'],
                "name" => $film_name,
                "image" => $film_image,
                "film_id" => (string) $film_id,
                "genre" => $genre_arr,
                "starring" => $starring_arr,
                "showing_cinemas" => $cinema_count,
                "showtimes" => $showing_times,
                "youtube_url" => $youtube_url,
                "url" => get_permalink($film->ID)
            );
        }
        if (empty($films_arr)) {
            $films_arr = array();
        }
        $result = array(
            "id" => $id,
            "name" => $cinema_name,
            "lng" => $lng,
            "lat" => $lat,
            "venue_id" => $id,
            "address" => $address,
            "image" => $img_id,
            "phoneNumbers" => implode(',', $telephonearr),
            "films" => $films_arr,
            "showingTimes" => $cinema_times,
            "location" => implode(',', $locationarr),
            "url" => $url,
            "images" => array(
                "original_url" => $cinema_image,
                "standard_rect_url" => "",
                "thumb_rect_url" => "",
                "list_rect_url" => ""
            ),
        );





        return $result;
    }

    /**
     * getAreasList
     * @author Muhammad Saied
     * @return object|null Areas
     * @url http://webservice.cairo360.com/apiws/getAreasList/
     */
    function get_areas_list(WP_REST_Request $request) {

        $childs = [];
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $terms = get_terms(
                array(
                    'taxonomy' => 'cities',
                    'hide_empty' => false,
                    'parent' => 0,
                )
        );

        foreach ($terms as $key => $term) {
            $termchildren = get_term_children($term->term_id, 'cities');
            foreach ($termchildren as $k => $v) {
                $child = get_term_by('id', $v, 'cities');

                $childs[] = array(
                    'id' => $child->term_id,
                    'value' => global_cairo360::filter_words(array('content' => $child->name, 'api' => true))
                );
            }

            $result[$key] = array(
                'id' => $term->term_id,
                'name' => global_cairo360::filter_words(array('content' => $term->name, 'api' => true)),
                'areas' => $childs,
            );
        }
        return $result;
    }

    /**

     * Grab Films By Category Slug
     *  @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , slug
     * @return object|null film
     */
    function get_films_latest(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);



        $limit = ($request->get_param('limit') == null) ? 5 : $request->get_param('limit');
        $offset = ($request->get_param('limit') == null) ? 0 : $request->get_param('offset');

        $args = array(
            'posts_per_page' => $limit,
            'offset' => $offset,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'film',
            'author' => '',
            'author_name' => '',
            'post_status' => 'publish',
            'suppress_filters' => 0,
            'meta_query' => array(array(
                    'key' => 'cinema-times',
                    'value' => '',
                    'compare' => '!='
                ))
        );

        $films = get_posts($args);
//        if (isset($_GET['test']) && $_GET['test'] == 'ereny') {
//            print_r($films);
//        }
        if (empty($films)) {

            return new WP_Error('empty_posts', 'No Films Found', array('status' => 200));
        }
//loop to get custom fields and build strucutre
        foreach ($films as $key => $film) {
            $cinemas_obj = new cinemas();
            $cinema_info = array();
            $cinemas = $cinemas_obj->get_film_cinemas(array('movie_id' => $film->ID, 'args' => '', 'api' => true));
            if (empty($cinemas)) {

                continue;
            }
//get taxonomy
            $genrearr = array();
            $genres = wp_get_object_terms($film->ID, 'category');
            foreach ($genres as $genre) {
                $genrearr[] = global_cairo360::filter_words(array('content' => $genre->name, 'api' => true));
            }
            $direcarr = array();
            $directors = wp_get_post_terms($film->ID, 'directors');
            foreach ($directors as $director) {
                $direcarr[] = global_cairo360::filter_words(array('content' => $director->name, 'api' => true));
            }
            $producerarr = array();
            $producers = wp_get_post_terms($film->ID, 'producers');
            foreach ($producers as $producer) {
                $producerarr[] = global_cairo360::filter_words(array('content' => $producer->name, 'api' => true));
            }
            $stararr = array();
            $starrings = wp_get_post_terms($film->ID, 'starrings');
            foreach ($starrings as $star) {
                $stararr[] = global_cairo360::filter_words(array('content' => $star->name, 'api' => true));
            }
            $writerarr = array();
            $screenwriters = wp_get_post_terms($film->ID, 'screenwriters');
            foreach ($screenwriters as $screenwriter) {
                $writerarr[] = global_cairo360::filter_words(array('content' => $screenwriter->name, 'api' => true));
            }
//get custom fields
            $feat_image = wp_get_attachment_url(get_post_thumbnail_id($film->ID));
            if (empty($feat_image)) {
                $feat_image = "";
            }
            $thumbnail_id = get_post_meta($film->ID, '_thumbnail_id', true);
            $film_trailer = get_post_meta($film->ID, 'film_trailer_links', true);
            $release_date = get_post_meta($film->ID, 'film_release_date', true);
//cinemas
            $venue_obj = new venues();

            foreach ($cinemas as $ckey => $cinema) {
//phones
                $phones = get_post_meta($cinema->ID, "venue_phone", true);
//cities
                $cities = wp_get_object_terms($cinema->ID, 'cities');
                $area = '';
                $city = array();
                foreach ($cities as $city_key => $city_val) {
                    if ($city_val->parent == 0) {
                        $city[$city_key]['id'] = $city_val->term_id;
                        $city[$city_key]['name'] = $city_val->name;
                    }
                    if ($city_val->parent == $city[0]['id']) {
                        $area = $city_val->name;
                    }
                }
//showing time
                $showing_times = $cinemas_obj->get_film_showing_times(array('movie_id' => $film->ID, 'cinema_id' => $cinema->ID, 'api' => true));
                $cinema_info[$ckey]['id'] = $cinema->ID;
                $cinema_info[$ckey]['name'] = global_cairo360::filter_words(array('content' => $cinema->post_title, 'api' => true));
                $cinema_info[$ckey]['area'] = $area; //pending
                $cinema_info[$ckey]['city'] = !empty($city) ? $city[0]['name'] : ''; //pending
                $cinema_info[$ckey]['image'] = (!empty(wp_get_attachment_url(get_post_thumbnail_id($cinema->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($cinema->ID)) : '';
                $cinema_info[$ckey]['telephones'] = implode(',', $phones);
                $cinema_info[$ckey]['showtimes'] = $showing_times;
                $cinema_info[$ckey]['address'] = $venue_obj->get_venue_location(array('venue_id' => $cinema->ID, 'api' => true));
            }

//get articles reviewed on film
            $articleargs = array(
                'posts_per_page' => 1,
                'post_type' => 'article',
                'meta_query' => array(array(
                        'key' => 'article_item_reviewed',
                        'value' => $film->ID,
                    ),
                    array(
                        'key' => 'article_type',
                        'value' => 1,
                    ),
                ),
            );
            $article_obj = new articles();
            $artile_reviewed = $article_obj->get_list_of_articles($articleargs);
            $article_id = $artile_reviewed[$key]->ID;
            $article_rating = get_post_meta($article_id, 'article_rating', true);

//Build Your Object
            $result[$key] = array(
                'id' => $film->ID,
                'article_id' => $artile_reviewed[$key]->ID,
                'article_item_id' => $film->ID,
                'name' => global_cairo360::filter_words(array('content' => $film->post_title, 'api' => true)),
                'image_id' => $thumbnail_id,
                'rating' => $article_rating,
                'genre' => implode(',', $genrearr),
                'starring' => implode(',', $stararr),
                'new' => '',
                'director' => implode(',', $direcarr),
                'writer' => implode(',', $writerarr),
                'youtube_url' => $film_trailer,
                'url' => get_permalink($film->ID),
                'release' => $release_date,
                'cinemas' => $cinema_info,
                'images' => array(
                    'original_url' => $feat_image,
                    'standard_rect_url' => '',
                    'thumb_rect_url' => '',
                    'list_rect_url' => '',
                    'small_square_url' => ''
                ),
            );
        }
        $result = array_values($result);

        return $result;
    }

    /*
     * Grab Eventss By date Slug
     *  @author Dina Reda <dina.reda@brightcreations.com>
     * @param lang [en-ar] , date
     * @return object|null events
     */

    function get_week_event_by_date(WP_REST_Request $request) {
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);


        if ($request->get_param('date') == null) {
            return new WP_Error('invalid_event', 'Invalide Event', array('status' => 200));
        }

        $limit = ($request->get_param('limit') == null) ? 5 : $request->get_param('limit');
        $offset = ($request->get_param('offset') == null) ? 0 : $request->get_param('offset');
        $date = date('Y-m-d', strtotime($request->get_param('date')));
        $after_week = date('Y-m-d', strtotime('+6 day', strtotime($date)));

        $aDays[] = $date;

        $sCurrentDate = $date;
        while ($sCurrentDate < $after_week) {
            $sCurrentDate = gmdate("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));
            $aDays[] = $sCurrentDate;
        }
        $result = array();
        foreach ($aDays as $dayKey => $day) {
            $info = [];
            $thisday = date('d', strtotime($day));
            $args = array(
                'posts_per_page' => $limit,
                'post_type' => 'event',
                'post_status' => 'publish',
                'suppress_filters' => 0,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'event_start_datetime',
                        'value' => $day,
                        'compare' => '<=',
                        'type' => 'DATE'
                    ),
                    array(
                        'key' => 'event_end_datetime',
                        'value' => $day,
                        'compare' => '>=',
                        'type' => 'DATE'
                    ),
                ),
                'offset' => $offset,
            );

            $events = get_posts($args);
            if (!empty($events)) {
                foreach ($events as $key => $event) {

                    $event_id = $event->ID;
                    $brief = global_cairo360::filter_words(array('content' => $event->post_excerpt, 'api' => true));
                    $name = $event->post_title;

                    $start_date = get_post_meta($event_id, 'event_start_datetime', true);
                    $end_date = get_post_meta($event_id, 'event_end_datetime', true);
                    $start_time = date("H:i:s", strtotime($start_date));
                    $end_time = date("H:i:s", strtotime($end_date));
                    $event_venue_id = get_post_meta($event_id, 'event_venue', true);



                    $venue = get_post($event_venue_id);

//here you can add Veue Information easily
                    if (!empty($venue)) {
                        $venue_name = $venue->post_title;
                        $venue_location = get_post_meta($event_venue_id, 'venue_address', true);
                        $cities = wp_get_object_terms($event_venue_id, 'cities');
                        $cit = array();
                        foreach ($cities as $city_key => $city_val) {
                            if ($city_val->parent == 0) {
                                $cit[] = $city_val->name;
                            }
                        }
                        $venue_city = !empty($cit) ? implode(',', $cit) : '';
                    } else {
                        $venue_name = "";
                        $venue_city = "";
                        $venue_location = "";
                    }
                    $info[$key] = array(
                        'event_id' => (string) $event_id,
                        'image_id' => (!empty(get_post_thumbnail_id($event_id))) ? get_post_thumbnail_id($event_id) : '',
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                        'brief' => $brief,
                        'location' => $venue_location,
                        'name' => $name,
                        'venue_id' => $event_venue_id,
                        'thisday' => $thisday,
                        'venue_name' => $venue_name,
                        'venue_city' => $venue_city,
                        'images' => array(
                            'event_image_id' => (!empty(get_post_thumbnail_id($event_id))) ? get_post_thumbnail_id($event_id) : '',
                            'standard_rect_url' => '',
                            'thumb_rect_url' => '',
                            'thumb_square_url' => '',
                            'original_url' => (!empty(wp_get_attachment_url(get_post_thumbnail_id($event_id)))) ? wp_get_attachment_url(get_post_thumbnail_id($event_id)) : '',
                            'list_rect_url' => '',
                        ),
                    );
                }
            } else {
//                continue;
            }
            $result[date('D', strtotime($day))] = $info;
        }
        if (!empty($result))
            return($result);
        else
            return (object) $result;
    }

//Figured out a way to make WPAPI work with WPML.  Just gotta modify the stupid query beforehand.
    function _switch_lang($cur_lang) {

        global $sitepress;
        $default = $sitepress->get_default_language(); //get the default language.
        $langs = array_keys(icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str')); //Get all available langauges (only the keys, en,ja,fr, etc).
//Get the set lang variable.  set default against it if it doesn't exist.
//See if the current langauge is NOT part of the available langauges.
        if (!in_array($cur_lang, $langs)) {
            $cur_lang = $default; //If not, set it against the default.
        }
//finally, set the language to modify the WP-API query.
        $sitepress->switch_lang($cur_lang);
    }

    function get_venue_category_by_Id(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        if ($request->get_param('id') == null) {
            return new WP_Error('missing_venue_id', 'Missing venue id', array('status' => 0));
        }

        $venue_id = $request->get_param('id');
        $venue = get_post($venue_id);
        if (!empty($venue)) {

            $cats = get_the_terms($venue_id, 'category');
            $result['venue'] = array(
                'venue_id' => $venue->ID,
                'categories' => $cats,
            );

            return $result;
        } else {
            return new WP_Error('no_result', 'No result', array('status' => 0));
        }
    }

    function is_timestamp($timestamp) {
        $check = (is_int($timestamp) OR is_float($timestamp)) ? $timestamp : (string) (int) $timestamp;
        return ($check === $timestamp)
                AND ( (int) $timestamp <= PHP_INT_MAX)
                AND ( (int) $timestamp >= ~PHP_INT_MAX);
    }

    function Get_directories_items(WP_REST_Request $request) {
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $category_type_venue = get_categories_type(array('type' => 1)); // type = venue // parent only
        $limit = ($request->get_param('limit') == null) ? 50 : $request->get_param('limit');
        $offset = ($request->get_param('start') == null) ? 0 : $request->get_param('start');
        $modified = $request->get_param('modified');
        $datetime = gmdate("Y-m-d H:i:s", $modified);
        if ($this->is_timestamp($modified) == true) {
            $items_update = [];
            $items_length = 0;
            $last_modified[] = $datetime;
            foreach ($category_type_venue as $key => $category) {

//                $args = array(
//                    'posts_per_page' => -1,
//                    'offset' => $offset,
//                    'post_type' => 'venue',
//                    'orderby' => 'modified',
//                    'post_status' => array('publish', 'trash'),
//                    'suppress_filters' => 0,
//                    'tax_query' => array(
//                        array(
//                            'taxonomy' => 'category',
//                            'field' => 'slug',
//                            'terms' => $category['slug'],
//                        ),
//                    ),
//                    'date_query' => array(
//                        'column' => 'post_modified',
//                        'after' => $datetime,
//                        'compare'	=> '=',
//                    ),
//                );
                global $wpdb;
                $sql = "SELECT wp_posts.*
                FROM wp_posts
                LEFT JOIN wp_icl_translations ON wp_posts.ID = wp_icl_translations.element_id
	        LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
                LEFT JOIN  wp_term_taxonomy ON ( wp_term_relationships.term_taxonomy_id =  wp_term_taxonomy.term_taxonomy_id)
                WHERE
                wp_posts.post_status IN ('publish','trash')
                AND wp_posts.post_type IN ('venue')
                And wp_posts.post_modified > '" . $datetime . "'
                AND wp_term_taxonomy.taxonomy = 'category'
	        AND wp_term_taxonomy.term_id IN ('" . $category['id'] . "')
                AND wp_icl_translations.language_code = '" . $cur_lang . "'
                Order by wp_posts.post_modified DESC";
                //limit ".$offset.",".$limit."";
                $items = [];

                $items = $wpdb->get_results($sql, OBJECT);
//                $items = get_posts($args);

                foreach ($items as $key => $item) {
                    if (strtotime($item->post_modified) > strtotime($last_modified[0])) {
                        $last_modified[0] = $item->post_modified;
                    }
                    $phonesarr = [];
//get area
                    $terms = wp_get_post_terms($item->ID, 'cities');

//get phones
                    $phones = get_post_meta($item->ID, 'venue_phone', true);

//get items length
                    $items_length += count($items);
                    $area = '';
                    foreach ($terms as $k => $term) {
                        if ($term->parent != 0) {
                            $area = $term->name;
                            break;
                        }
                    }

                    foreach ($phones as $key => $phone) {
                        $phonesarr[] = $phone;
                    }

                    if (empty($area)) {
                        $area = "";
                    }




                    if ($category[name] == "فن وثقافة") {
                        $category[name] = "artsandculture";
                    }
                    if ($category[name] == "أفلام") {
                        $category[name] = "films";
                    }

                    if ($category[name] == "Arts &amp; Culture") {
                        $category[name] = "artsandculture";
                    }
                    if ($category[name] == "Health &amp; Fitness") {
                        $category[name] = "healthandfitness";
                    }
                    if ($category[name] == "صحة ولياقة") {
                        $category[name] = "healthandfitness";
                    }

                    if ($category[name] == "Restaurants") {
                        $category[name] = "restaurants";
                    }
                    if ($category[name] == "مطاعم") {
                        $category[name] = "restaurants";
                    }
                    if ($category[name] == "Cafés") {
                        $category[name] = "cafes";
                    }
                    if ($category[name] == "كافيهات") {
                        $category[name] = "cafes";
                    }
                    if ($category[name] == "Shopping") {
                        $category[name] = "shopping";
                    }
                    if ($category[name] == "تسوق") {
                        $category[name] = "shopping";
                    }
                    if ($category[name] == "Nightlife") {
                        $category[name] = "nightlife";
                    }
                    if ($category[name] == "القاهرة بالليل") {
                        $category[name] = "nightlife";
                    }


                    $items_update[$category[name]][] = array(
                        "id" => (int) $item->ID,
                        "name" => $item->post_title,
                        "name1" => $item->post_modified,
                        "enabled" => (get_post_status($item->ID) == 'publish') ? 1 : 0,
                        "status" => (get_post_status($item->ID) == 'publish') ? "PUBLISHED" : "TRASHED",
                        "area" => $area,
                        "image" => (!empty(wp_get_attachment_url(get_post_thumbnail_id($item->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($item->ID)) : '',
                        "telephones" => $phonesarr,
                    );
                }


                $result = array(
                    'modified' => strtotime($last_modified[0]), // $modified, // pending on mobile team's response
                    'status' => true,
                    'total' => $items_length,
                    'items' => empty($items_update) ? (object) $items_update : $items_update,
                );
            }//end foreach

            return $result;
        } else {
            return new WP_Error('false timestamp', 'false timestamp');
        }
    }

    function Get_highlights_all(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $args = array(
            'numberposts' => 8,
            'offset' => 0,
            'orderby' => 'post_date',
            'order' => 'DESC',
//            'post_type' => array('venue', 'film', 'music', 'dvd', 'book', 'event', 'article', 'competition'),
            'post_type' => array('article'),
        );

        $highlights = query_posts($args);


//print_r($highlights);

        foreach ($highlights as $key => $highlight) {

//get url
            $url = get_permalink($highlight->ID);

//get sponsored
            $sponsored = (get_post_meta($highlight->ID, 'article_sponsored', true) == null) ? 0 : get_post_meta($highlight->ID, 'article_sponsored', true);

//get recommended
            $recommended = (get_post_meta($highlight->ID, 'article_recommended', true) == null) ? 0 : get_post_meta($highlight->ID, 'article_recommended', true);

//get rating
            $rating = (get_post_meta($highlight->ID, 'article_rating', true) == null) ? 0 : get_post_meta($highlight->ID, 'article_rating', true);

//get language
            $lang = apply_filters('wpml_post_language_details', NULL, $highlight->ID);

//get dates
            $published_date = $highlight->post_date;
            $last_updated = $highlight->post_modified;
            $created = $published_date;

//image id
            $image_id = get_post_thumbnail_id($highlight->ID);

// get the category
            $category_info = get_the_terms($highlight->ID, "category");
            $category = array(
                'name' => global_cairo360::filter_words(array('content' => $category_info[0]->name, 'api' => true)),
                'urlParam' => $category_info[0]->slug,
                'id' => (string) $category_info[0]->term_id,
            );
            $category_id = $category_info[0]->term_id;

//tips'
            $tips = array();
            if (get_post_meta($highlight->ID, 'article_type', true) == 1) { // article type review
                $articled_item_id = (int) get_post_meta($highlight->ID, 'article_item_reviewed', true);
                $item_type = get_post_meta($highlight->ID, 'article_item_type', true);
                $retrieve_tips = articles::cairo_reviews_api(array('article_id' => $highlight->ID, 'cur_lang' => $cur_lang));

                $tips['cairo360_tip'] = $retrieve_tips['cairo360_tip'];
                $tips['best_bit'] = $retrieve_tips['best_bit'];
                $tips['worst_bit'] = $retrieve_tips['worst_bit'];
            } else { // feature
                $item_type = '';
                $articled_item_id = 0;
            }
//            $id = $highlight->ID;
            $item_id = $articled_item_id;
//extras
            $extra = array();
            $venue_obj = new venues();
            if (!empty($highlight->ID)) {
                $address = $venue_obj->get_venue_location(array('venue_id' => $highlight->ID, 'api' => true));
                $venue_telephone = get_post_meta($highlight->ID, 'venue_phone', true);
                if (empty($address)) {
                    $address = "";
                }
                $extra = array(array(
                        'key' => 'name',
                        'value' => get_the_title($highlight->ID),
                        "icon" => ""
                    ),
                    array(
                        "key" => "telephone",
                        "value" => (!empty($venue_telephone)) ? implode(',', $venue_telephone) : 0,
                        "icon" => ""
                    ),
                    array(
                        "key" => "address",
                        "value" => $address,
                        "icon" => ""
                ));
            }


            $result[$key] = array(
                "squeezed_url" => $url,
                "category_id" => "$category_id",
                "article_id" => "$highlight->ID",
                "articled_item_id" => "$articled_item_id",
                "language" => $lang['language_code'],
                "name" => global_cairo360::filter_words(array('content' => $highlight->post_title, 'api' => true)),
                "body" => global_cairo360::filter_words(array('content' => $highlight->post_content, 'api' => true)),
                "image_id" => "25146",
                "rating" => $rating,
                "recommended" => $recommended,
                "sponsored" => $sponsored,
                "published_date" => $published_date,
                "last_updated" => $last_updated,
                "created" => $created,
                "ArticleImage" => (!empty(wp_get_attachment_url(get_post_thumbnail_id($highlight->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($highlight->ID)) : '',
                "id" => "$highlight->ID",
                "item_id" => $item_id,
                "item_type" => (string) $item_type,
                "url" => $url,
                "Category" => (object) $category,
                "tips" => (object) $tips,
                "images" => array(
                    "original_url" => (!empty(wp_get_attachment_url(get_post_thumbnail_id($highlight->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($highlight->ID)) : '',
                    "accordion_url" => "",
                    "squeezed_url" => "",
                    "standard_rect_url" => "",
                    "thumb_rect_url" => "",
                    "thumb_square_url" => "",
                    "list_rect_url" => "",
                    "medium_square_url" => "",
                    "small_square_url" => "",
                ),
                "reviews" => [], //pending
                "extra" => $extra,
            );
        }

        return $result;
    }

    /**
     * user register
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param  email , password , device id , device_token , device_platform , parse_id
     * @return object of the user data with the new access token
     */
    function user_register(WP_REST_Request $request) {



        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

//variables
//$username       = $request->get_param('username');

        $email = $request->get_param('email');
        $password = $request->get_param('pawd');
        $first_name = $request->get_param('first_name');
        $last_name = $request->get_param('last_name');
        $birthdate = $request->get_param('birthdate');
        $gender = $request->get_param('gender');
        $newsletter = $request->get_param('newsletter');
        $privacy = $request->get_param('privacy');
        $device_id = $request->get_param('device_id');
        $device_token = $request->get_param('device_token');
        $device_platform = $request->get_param('device_platform');
        $parse_id = $request->get_param('parse_id');
//$username       = $first_name+$last_name;
//hash the pawd
        $hashed_password = wp_hash_password($password);

//exit();
//errors array
        $errors_arr = array();

// Required validations
        if ($email == '' || empty($email)) {

            $errors_arr [] = 'required email';
        }

        if ($password == '' || empty($password)) {

            $errors_arr [] = 'required password';
        }

        if ($first_name == '' || empty($first_name)) {
            $errors_arr [] = 'Required first name';
        }
        if ($last_name == '' || empty($last_name)) {
            $errors_arr [] = 'Required last name';
        }
        if ($device_id == '' || empty($device_id)) {
            $errors_arr [] = 'Required mobile device id';
        }
        if ($birthdate) {
            if (($rawData = strptime($birthdate, '%d/%m/%G')) !== false) {
                $birthdate = DateTime::createFromFormat('d/m/Y', $birthdate)->format('Y-m-d');
            } else {
                $errors_arr [] = 'Invalid birthdate format ex:25/11/1990';
            }
        } else {
            $birthdate = '0000-00-00';
        }

//Check if mail exists
        $validator_obj = new validator();
        $check_exist = $validator_obj->check_email_exist($email);
        if ($check_exist == false) {
//when check = false it means thta the user exist
            $errors_arr [] = 'email exists';
        }

//check if valid email format
        $check_valid = $validator_obj->check_valid_email_address($email);
        if ($check_valid == false) {
            $errors_arr [] = 'invalid email format';
        }



        if (sizeof($errors_arr) > 0) {
            $result_errors = array(
                "status" => false,
                "status_message" => implode(',', $errors_arr)
            );
            return $result_errors;
        } else {

            $user = array(
                'user_email' => $email,
                'user_pass' => $password,
                'user_login' => $first_name . $last_name,
                'display_name' => $first_name . " " . $last_name,
            );

            $user_id = wp_insert_user($user);

//On success
            if (!is_wp_error($user_id)) {
                update_user_meta($user_id, 'first_name', $first_name);
                update_user_meta($user_id, 'last_name', $last_name);
                add_user_meta($user_id, 'birthdate', $birthdate);
                add_user_meta($user_id, 'gender', $gender);
                add_user_meta($user_id, 'newsletter', $newsletter);
                add_user_meta($user_id, 'privacy', $privacy);
                add_user_meta($user_id, 'device_id', $device_id);
                add_user_meta($user_id, 'device_token', $device_token);
                add_user_meta($user_id, 'device_platform', $device_platform);
                add_user_meta($user_id, 'parse_id', $parse_id);
                add_user_meta($user_id, 'user_lang', $cur_lang);
                add_user_meta($user_id, 'social', 0);
                add_user_meta($user_id, 'linked_id', 0);


                $activation_code = wp_generate_password(12, false);

                update_user_meta($user_id, 'upme_activation_code', $activation_code);


                $upme_obj = new UPME_Register();
                $upme_obj->upme_user_activation_handler();
                upme_new_user_notification();

//upme_new_user_notification($user_id, $plaintext_pass = '', $activation_status = '', $activation_code = '')

                $code = sha1($user_id . time());
                $activation_link = add_query_arg(array('key' => $code, 'user' => $user_id), get_permalink($user_id));
                add_user_meta($user_id, 'has_to_be_activated', $code, true);


                $link = home_url() . "/?upme_action=upme_activate&upme_id=" . $user_id . "&upme_activation_code=" . $code;
//$link = site_url()."/edit-profile/?upme_action=upme_activate&upme_id=".$user_id."&upme_activation_code=".$code ;
//$this->baseurl.'users/verify/'.$verify_code

                $to[] = $email;
//$to[] = 'amagdy529@gmail.com';
                $subject = 'test activation link ';
                $body = 'Someone (hopefully you) has used this email to register at Cairo 360 Guide to Cairo, Egypt :

                    Please click the link below to verify your ownership of this email:

                    You will not be able to log in to use your account until you do so:';

                $headers[] = 'Content-Type: text/html; charset=UTF-8';
                wp_mail($to, $subject, $body . '<a href="' . $link . '">' . $link . '</a>' . '<br/><br/>', $headers);


//create obj from user class
                $user_obj = new user();

                $access_token = $user_obj->generate_access_token();

                $expire_date = time() + (2 * 24 * 60 * 60);

                update_user_meta($user_id, 'access_token', $access_token);

                update_user_meta($user_id, 'expire_date', $expire_date);


                $result = array(
                    "status" => true,
                    "status_message" => "Your account is created successfully & email with verification link sent to your email",
                    "user_token" => $access_token
                );

                return $result;
            } else {
//print_r(is_wp_error( $user_id ));

                $error_result = array(
                    "status" => false,
                    "status_message" => $user_id->get_error_message(),
                    "status_code" => 1056
                );
                return $error_result;
            }
        }
    }

    /**
     * user register
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param  email , password , device id , device_token , device_platform , parse_id
     * @return object of the user data with the new access token
     */
    function user_login(WP_REST_Request $request) {

        function generate_access_token() {
            if (function_exists('com_create_guid')) {
                return com_create_guid();
            } else {
                mt_srand((double) microtime() * 10000);
                $charid = strtoupper(md5(uniqid(rand(), true)));
                $hyphen = chr(45); // "-"
                $uuid = chr(123)// "{"
                        . substr($charid, 0, 8) . $hyphen
                        . substr($charid, 8, 4) . $hyphen
                        . substr($charid, 12, 4) . $hyphen
                        . substr($charid, 16, 4) . $hyphen
                        . substr($charid, 20, 12)
                        . chr(125); // "}"

                return sha1($email . time() . $uuid);

//return $uuid;
            }
        }

//variables
//$username       = $request->get_param('username');

        $email = $request->get_param('email');
        $password = $request->get_param('pawd');
        $device_id = $request->get_param('device_id');
        $device_token = $request->get_param('device_token');
        $device_platform = $request->get_param('device_platform');
        $parse_id = $request->get_param('parse_id');


//errors array
        $errors_arr = array();

// Required validations
        if ($email == '' || empty($email)) {

            $errors_arr += array('required email');
        }

        if ($password == '' || empty($password)) {

            $errors_arr += array('required password');
        }

        if ($device_id == '' || empty($device_id)) {
            $errors_arr += array('Required mobile device id');
        }

        if (sizeof($errors_arr) > 0) {
            return $errors_arr;
        } else {


            $user = get_user_by('email', $email);

            if ($user && wp_check_password($password, $user->data->user_pass, $user->ID)) {

                $user_id = $user->data->ID;


//variables to add to user meta
                $access_token = generate_access_token();
                $expire_date = time() + (2 * 24 * 60 * 60);

//add user meta .. we used update in order to prevent redundancy
                update_user_meta($user_id, 'access_token', $access_token);
                update_user_meta($user_id, 'expire_date', $expire_date);

//update user meta (device_id , device_token , device_platform , parse_id)
                update_user_meta($user_id, 'device_id', $device_id);
                update_user_meta($user_id, 'device_token', $device_token);
                update_user_meta($user_id, 'device_platform', $device_platform);
                update_user_meta($user_id, 'parse_id', $parse_id);


                /*
                  get_user_meta($user_id, $key, $single);
                  if $single = true it returns true
                  if $single = false it returns array
                 */

//get user meta data
                $first_name = get_user_meta($user_id, 'first_name', true);
                $last_name = get_user_meta($user_id, 'last_name', true);
                $birthdate = get_user_meta($user_id, 'birthdate', true);
                $gender = get_user_meta($user_id, 'gender', true);
                $privacy = get_user_meta($user_id, 'privacy', true);
                $social = get_user_meta($user_id, 'social', true);
                $linked_id = get_user_meta($user_id, 'linked_id', true);
                $newsletter = get_user_meta($user_id, 'newsletter', true);
                $arg = array('id' => $user_id);

                $user_img = get_avatar_url($user_id);
                $user_img2 = $this->get_user_image($user_id);

                $args = array(
                    'meta_key' => 'linked_id',
                    'meta_value' => $user_id,
                );

                $users = get_users($args);
                foreach ($users as $key => $user) {

                    $uid = $user->data->ID;
                    $social_provider = get_user_meta($uid, 'social_provider', true);
                    $social_id = get_user_meta($uid, 'social_id', true);

                    $users_arr[] = array(
                        "uid" => (int) $uid,
                        "user_type" => "social",
                        "social_provider" => $social_provider,
                        "social_id" => $social_id
                    );
                }

                if (empty($users_arr)) {
                    $users_arr = array();
                }
                if (!empty($birthdate)) {
                    if ($birthdate == '0000-00-00') {
                        $birthdate = '00/00/0000';
                    } else {
                        $birthdate = date('d/m/Y', strtotime($birthdate));
                    }
                } else {
                    $birthdate = '';
                }
                $result = array(
                    "status" => true,
                    "status_msg" => "User logged in successfully",
                    "status_code" => 1102,
                    "user_token" => $access_token,
                    "profile" => array(
                        "uid" => $user_id,
                        "email" => $user->data->user_email,
                        "display_name" => $user->data->display_name,
                        "first_name" => $first_name,
                        "last_name" => $last_name,
                        "birthdate" => $birthdate,
                        "gender" => $gender,
                        "newsletter" => $newsletter,
                        "created" => $user->data->user_registered,
                        "status" => (float) abs($user->data->user_status),
                        "privacy" => (float) $privacy,
                        "picture" => $user_img2,
                        "social" => empty($social) ? 0 : (int) $social,
                        "linked_id" => $linked_id,
                        "linked_socials" => $users_arr
                    ),
                        //"user_data"=>$user
                );

                return $result;
            } else {
                $false_arr = array(
                    "status" => false,
                    "status_code" => 1006,
                    "status_msg" => "Invalid email or password"
                );
                return $false_arr;
            }
        }
    }

    /**
     * view user profile
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token
     * @return object of the user data
     */
    function user_profile_view(WP_REST_Request $request) {

//variables
        $user_token = $request->get_param('user_token');

//create obj from validator class
        $validator_obj = new validator();

        function get_user_data_by_token($user_token) {
            $args = array(
                'meta_key' => 'access_token',
                'meta_value' => $user_token,
            );

            $user = get_users($args);

            return $user;
        }

        $validate = $validator_obj->validate_user_token($user_token);

        if ($validate == true) {

//set variables
            $user = get_user_data_by_token($user_token);
            $user_id = $user[0]->data->ID;
            $email = $user[0]->data->user_email;
            $display_name = $user[0]->data->display_name;
            $created = $user[0]->data->user_registered;
            $status = $user[0]->data->user_status;

//get user meta data
            $first_name = get_user_meta($user_id, 'first_name', true);
            $last_name = get_user_meta($user_id, 'last_name', true);
            $birthdate = get_user_meta($user_id, 'birthdate', true);
            if (!empty($birthdate)) {
                if ($birthdate == '0000-00-00') {
                    $birthdate = "00/00/0000";
                } else {
                    $birthdate = date('d/m/Y', strtotime($birthdate));
                }
            } else {
                $birthdate = "";
            }

            $gender = get_user_meta($user_id, 'gender', true);
            $privacy = get_user_meta($user_id, 'privacy', true);
            $expire_date = get_user_meta($user_id, 'expire_date', true);
            $user_img = $this->get_user_image($user_id);

            $check_expire_date = $validator_obj->validate_expire_date($expire_date);

            $social = get_user_meta($user_id, 'social', true);
            $newsletter = get_user_meta($user_id, 'newsletter', true);
            $linked_id = get_user_meta($user_id, 'linked_id', true);
            $args = array(
                'meta_key' => 'linked_id',
                'meta_value' => $user_id,
            );

            $users = get_users($args);
            foreach ($users as $key => $user) {

                $uid = $user->data->ID;
                $social_provider = get_user_meta($uid, 'social_provider', true);
                $social_id = get_user_meta($uid, 'social_id', true);

                $users_arr[] = array(
                    "uid" => (int) $uid,
                    "user_type" => "social",
                    "social_provider" => $social_provider,
                    "social_id" => $social_id
                );
            }

            if (empty($users_arr)) {
                $users_arr = array();
            }

            if ($check_expire_date == true) {
                $result = array(
                    "status" => true,
                    "status_message" => "User found successfully",
                    "status_code" => 1108,
                    "user_token" => $user_token,
                    "profile" => array(
                        "uid" => $user_id,
                        "email" => $email,
                        "display_name" => $display_name,
                        "first_name" => $first_name,
                        "last_name" => $last_name,
                        "birthdate" => (string) $birthdate,
                        "gender" => $gender,
                        "newsletter" => empty($newsletter) ? 0 : $newsletter,
                        "created" => $created,
                        "status" => empty($status) ? 0 : $status,
                        "privacy" => $privacy,
                        "picture" => $user_img,
                        "social" => empty($social) ? 0 : (int) $social,
                        "linked_id" => empty($linked_id) ? 0 : (int) $linked_id,
                        "linked_socials" => $users_arr,
                    )
                );

                return $result;
            } else {
                echo "expired";
                $false_arr = array(
                    "status" => false,
                    "status_message" => "Invalid user token or expired",
                    "status_code" => 1003
                );
                return $false_arr;
            }
        } else {
            $false_arr = array(
                "status" => false,
                "status_message" => "Invalid user token or expired",
                "status_code" => 1003
            );
            return $false_arr;
        }
    }

    /**
     * update user profile
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param
     * required params : user_token
     * optional params : password , firstname , lastname , birthdate , gender , newsletter ,privacy
     * @return object of the user
     */
    function user_profile_update(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

// params variables
        $user_token = $request->get_param('user_token');
        $password = $request->get_param('pawd');
        $first_name = $request->get_param('first_name');
        $last_name = $request->get_param('last_name');
        $birthdate = $request->get_param('birthdate');
        $gender = $request->get_param('gender');
        $newsletter = $request->get_param('newsletter');
        $privacy = $request->get_param('privacy');

        if ($user_token == '' || empty($user_token)) {

            $false_arr = array(
                "status" => false,
                "status_msg" => "Required user token",
                "status_code" => 1021
            );
            return $false_arr;
        }




//create obj from validator class
        $validator_obj = new validator();

//create obj from user class
        $user_obj = new user();

//user variables
        $user = $user_obj->get_user_data_by_token($user_token);
        $user_id = $user[0]->data->ID;


        $validate = $validator_obj->validate_user_token($user_token);

        $expire_date = get_user_meta($user_id, 'expire_date', true);

        $check_expire_date = $validator_obj->validate_expire_date($expire_date);


        if ($validate == true && $check_expire_date == true) {


            if ($first_name != '' || !empty($first_name)) {
                update_user_meta($user_id, 'first_name', $first_name);
            }

            if ($last_name != '' || !empty($last_name)) {
                update_user_meta($user_id, 'last_name', $last_name);
            }

            if ($password != '' || !empty($password)) {
                wp_update_user(array('ID' => $user_id, 'user_pass' => $password));
            }

            if ($birthdate != '' || !empty($birthdate)) {
                if (($rawData = strptime($birthdate, '%d/%m/%G')) !== false) {
                    $birthdate = DateTime::createFromFormat('d/m/Y', $birthdate)->format('Y-m-d');
                    update_user_meta($user_id, 'birthdate', $birthdate);
                } else {
                    $false_arr = array(
                        "status" => false,
                        "status_message" => "Invalid birthdate format ex:25/11/1990",
                        "status_code" => 1003
                    );
                    return $false_arr;
                }
            }

            if ($gender != '' || !empty($gender)) {
                update_user_meta($user_id, 'gender', $gender);
            }

            if ($privacy != '' || !empty($privacy)) {
                update_user_meta($user_id, 'privacy', $privacy);
            }

            if ($newsletter != '' || !empty($newsletter)) {
                update_user_meta($user_id, 'newsletter', $newsletter);
            }


//set variables
            $email = $user[0]->data->user_email;
            $display_name = $user[0]->data->display_name;
            $created = $user[0]->data->user_registered;
            $status = $user[0]->data->user_status;

//get user meta data
            $first_name = get_user_meta($user_id, 'first_name', true);
            $last_name = get_user_meta($user_id, 'last_name', true);
            $birthdate = get_user_meta($user_id, 'birthdate', true);
            $gender = get_user_meta($user_id, 'gender', true);
            $privacy = get_user_meta($user_id, 'privacy', true);
            $social = get_user_meta($user_id, 'social', true);
            $user_img = $this->get_user_image($user_id);

            $social_provider = get_user_meta($user_id, 'social_provider', true);
            $social_id = get_user_meta($user_id, 'social_id', true);

            $linked_id = get_user_meta($user_id, 'linked_id', true);
            $args = array(
                'meta_key' => 'linked_id',
                'meta_value' => $user_id,
            );

            $users = get_users($args);
            foreach ($users as $key => $user) {

                $uid = $user->data->ID;
                $social_provider = get_user_meta($uid, 'social_provider', true);
                $social_id = get_user_meta($uid, 'social_id', true);

                $users_arr[] = array(
                    "uid" => (int) $uid,
                    "user_type" => "social",
                    "social_provider" => $social_provider,
                    "social_id" => $social_id
                );
            }

            if (empty($users_arr)) {
                $users_arr = array();
            }
            $result = array(
                "status" => true,
                "status_message" => "User data updated successfully",
                "status_code" => 1104,
                "user_token" => $user_token,
                "profile" => array(
                    "uid" => $user_id,
                    "email" => $email,
                    "social_provider" => $social_provider,
                    "social_id" => $social_id,
                    "display_name" => $display_name,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "birthdate" => $birthdate,
                    "gender" => $gender,
                    "newsletter" => $newsletter,
                    "created" => $created,
                    "status" => $status,
                    "privacy" => $privacy,
                    "picture" => $user_img,
                    "social" => empty($social) ? 0 : (int) $social,
                    "linked_id" => empty($linked_id) ? 0 : (int) $linked_id,
                    "linked_socials" => $users_arr,
                )
            );

            return $result;
        } else {

            $false_arr = array(
                "status" => false,
                "status_message" => "Invalid user token or expired",
                "status_code" => 1003
            );
            return $false_arr;
        }
    }

    /**
     * check if email exist in the database or not
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param email
     * @return true or false
     */
    function user_validate_email(WP_REST_Request $request) {
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $email = $request->get_param('email');

        if ($email == '' || empty($email)) {
            $false_arr = array(
                "status" => false,
                "status_msg" => "Email is required",
            );
            return $false_arr;
        } else {
            $exists = email_exists($email);
            if ($exists) {
                $result = array(
                    "status" => false,
                    "status_msg" => "This email already exists",
                    "status_code" => 1052
                );
                return $result;
            } else {
                $validator_obj = new validator();
                $check_valid = $validator_obj->check_valid_email_address($email);
                if ($check_valid) {
                    $result = array(
                        "status" => true,
                        "status_msg" => "Valid email"
                    );
                    return $result;
                } else {
                    $result = array(
                        "status" => false,
                        "status_msg" => "Invalid email address"
                    );
                    return $result;
                }
            }
        }
    }

    /**
     * retrieve reviews of specific user
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token , limit , start , sort
     * @return objects of all reviews of the specefic user
     */
    function user_reviews_list(WP_REST_Request $request) {



        $user_token = $request->get_param('user_token');
        $start = ($request->get_param('start') == null) ? 0 : $request->get_param('start');
        $limit = ($request->get_param('limit') == null) ? '' : ' limit ' . $start . ',' . $request->get_param('limit');

        $sort = ($request->get_param('sort') == null) ? 'ASC' : $request->get_param('sort');

        if ($user_token == '' || empty($user_token)) {

            $false_arr = array(
                "status" => false,
                "status_msg" => "Required user token",
                "status_code" => 1021
            );
            return $false_arr;
        }


//create obj from validator class
        $validator_obj = new validator();

//create obj from user class
        $user_obj = new user();

//user variables
        $user = $user_obj->get_user_data_by_token($user_token);
        $user_id = $user[0]->data->ID;


        $validate = $validator_obj->validate_user_token($user_token);

        $expire_date = get_user_meta($user_id, 'expire_date', true);

        $check_expire_date = $validator_obj->validate_expire_date($expire_date);


        if ($validate == true && $check_expire_date == true) {

//set variables
            $email = $user[0]->data->user_email;
            $display_name = $user[0]->data->display_name;
            $nice_name = $user[0]->data->user_nicename;
            $created = $user[0]->data->user_registered;
            $status = $user[0]->data->user_status;

//get user meta data
            $first_name = get_user_meta($user_id, 'first_name', true);
            $last_name = get_user_meta($user_id, 'last_name', true);
            $birthdate = get_user_meta($user_id, 'birthdate', true);
            $gender = get_user_meta($user_id, 'gender', true);
            $privacy = get_user_meta($user_id, 'privacy', true);
            $expire_date = get_user_meta($user_id, 'expire_date', true);
            $user_img = $this->get_user_image($user_id);

            $args_users_linked = array(
                'meta_key' => 'linked_id',
                'meta_value' => $user_id,
            );
            $users_ids_arr = array($user_id);
            $users_linked = get_users($args_users_linked);
            if (!empty($users_linked)) {
                foreach ($users_linked as $key => $user) {
                    $uid[] = $user->data->ID;
                }
                $users_ids_arr = array_merge($uid, $users_ids_arr);
            }
//            $args = array(
//                'author_email' => $email,
//                'ID' => $user_id,
//                'offset' => $start,
//                'order' => $sort,
//                'number' => $limit,
//            );
//            $reviews = get_comments($args);
            global $wpdb;
            $sql = "SELECT wp_comments.*
                FROM wp_comments
                LEFT JOIN wp_icl_translations
                ON wp_comments.comment_ID = wp_icl_translations.element_id
                WHERE
                 wp_comments.user_id IN (" . implode(',', $users_ids_arr) . ")
                " . $limit . "";

            $reviews = $wpdb->get_results($sql, OBJECT);
            if (empty($reviews)) {
                $false_arr = array(
                    "status" => false,
                    "status_msg" => "No reviews found",
                    "status_code" => 1083
                );
                return $false_arr;
            }


            foreach ($reviews as $key => $review) {

                $review_id = $review->comment_ID;
                $review_body = $review->comment_content;
                $rating = get_comment_meta($review_id, 'pixrating', true);
                $date = $review->comment_date;
                $post_id = $review->comment_post_ID;
                $post_type = get_post_type($post_id);
                $post_name = get_the_title($post_id);
                $post_image = get_the_post_thumbnail($post_id);

//categories
                $category_info = wp_get_object_terms($post_id, 'category');
                $category_id = $category_info[0]->term_id;

//book of eli id 87387
                $reviews_arr[$key] = array(
                    "id" => (int) $review_id,
                    "title" => $post_name . "  " . "review",
                    "body" => global_cairo360::filter_words(array('content' => $review_body, 'api' => true)),
                    "rating" => (int) $rating,
                    "created" => $date,
                    "uid" => (int) $user_id,
                    "item_id" => (int) $post_id,
                    "item_type" => $post_type,
                    "item_name" => $post_name,
                    "item_image" => $post_image,
                    "item_category_id" => (int) $category_id
                );
            }


            $result = array(
                "status" => true,
                "user_name" => $nice_name,
                "user_picture" => $user_img,
                "total_reviews" => sizeof($reviews_arr),
                "reviews" => $reviews_arr
            );

            return $result;
        } else {

            $false_arr = array(
                "status" => false,
                "status_message" => "Invalid user token or expired",
                "status_code" => 1003
            );
            return $false_arr;
        }
    }

    /**
     * retrieve all reviews
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token , limit , start , sort
     * @return objects of all reviews
     */
    function user_reviews_all(WP_REST_Request $request) {
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $user_token = $request->get_param('user_token');
        $limit = ($request->get_param('limit') == null) ? 5 : $request->get_param('limit');
        $start = ($request->get_param('start') == null) ? 0 : $request->get_param('start');
        $sort = ($request->get_param('sort') == null) ? 'ASC' : $request->get_param('sort');

        $args = array(
            'offset' => $start,
            'order' => $sort,
            'number' => $limit,
        );

        $reviews = get_comments($args);

        if (empty($reviews)) {
            $false_arr = array(
                "status" => false,
                "status_msg" => "No reviews found",
                "status_code" => 1083
            );
            return $false_arr;
        } else {

            foreach ($reviews as $key => $review) {

                $user_id = $review->user_id;
                $review_id = $review->comment_ID;
                $review_body = $review->comment_content;
                $rating = get_comment_meta($review_id, 'pixrating', true);
                $date = $review->comment_date;
                $post_id = $review->comment_post_ID;
                $post_type = get_post_type($post_id);
                $post_name = get_the_title($post_id);
                $post_image = get_the_post_thumbnail($post_id);

//categories
                $category_info = wp_get_object_terms($post_id, 'category');
                $category_id = $category_info[0]->term_id;

//book of eli id 87387
                $reviews_arr[$key] = array(
                    "id" => $review_id,
                    "title" => $post_name . "  " . "review",
                    "body" => global_cairo360::filter_words(array('content' => $review_body, 'api' => true)),
                    "rating" => $rating,
                    "created" => $date,
                    "uid" => $user_id,
                    "item_id" => $post_id,
                    "item_type" => $post_type,
                    "item_name" => $post_name,
                    "item_image" => $post_image,
                    "item_category_id" => $category_id
                );
            }

            $result = array(
                "status" => true,
                "total" => sizeof($reviews_arr),
                "reviews" => $reviews_arr
            );

            return $result;
        }
    }

    /**
     * add user review
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token , post_id , post_type , rate , title , body
     * @return object|review
     */
    function user_review(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);


        $user_token = $request->get_param('user_token');
        $item_id = $request->get_param('item_id');
        $item_type = strtolower($request->get_param('item_type'));
        $rate = $request->get_param('rate');
        $title = $request->get_param('title');
        $body = $request->get_param('body');
//$rate_lang  = $this->lang;
//errors array
        $errors_arr = array();


// Required validations
        if ($user_token == '' || empty($user_token)) {

            $errors_arr += array('Required user token');
        }
        if ($rate == '' || empty($rate)) {

            $errors_arr += array('Required rate number');
        }
        if (isset($rate) && $rate != '' && ( $rate < 0 || $rate > 5)) {
            $errors_arr += array('Invalid rate number');
        }
        if ($title == '' || empty($title)) {

            $errors_arr += array('Required review title');
        }
        if ($body == '' || empty($body)) {

            $errors_arr += array('Required review body');
        }
        if ($item_id == '' || empty($item_id)) {

            $errors_arr += array('Required item id');
        }
        if ($item_type == '' || empty($item_type)) {

            $errors_arr += array('Required item type');
        }


        if (sizeof($errors_arr) > 0) {

            $false_arr = array(
                "status" => false,
                "status_msg" => implode(',', $errors_arr),
            );

            return $false_arr;
        } else {

//create obj from validator class
            $validator_obj = new validator();

//create obj from user class
            $user_obj = new user();

//user variables
            $user = $user_obj->get_user_data_by_token($user_token);
            $user_id = $user[0]->data->ID;

//set variables
            $email = $user[0]->data->user_email;
            $display_name = $user[0]->data->display_name;
            $nice_name = $user[0]->data->user_nicename;
            $created = $user[0]->data->user_registered;
            $status = $user[0]->data->user_status;

//get user meta data
            $first_name = get_user_meta($user_id, 'first_name', true);
            $last_name = get_user_meta($user_id, 'last_name', true);
            $birthdate = get_user_meta($user_id, 'birthdate', true);
            $gender = get_user_meta($user_id, 'gender', true);
            $privacy = get_user_meta($user_id, 'privacy', true);
            $expire_date = get_user_meta($user_id, 'expire_date', true);
            $user_img = $this->get_user_image($user_id);


            $validate = $validator_obj->validate_user_token($user_token);

            $expire_date = get_user_meta($user_id, 'expire_date', true);

            $check_expire_date = $validator_obj->validate_expire_date($expire_date);

            if ($validate == true && $check_expire_date == true) {

//lets validate the post
                $check_post_exist = get_post($item_id);
                if ($check_post_exist) {


                    $args = array(
                        'author_email' => $email,
                        'post_id' => $item_id,
                        'user_id' => $user_id,
                    );
                    $check_comment_exist = get_comments($args);

                    if (!empty($check_comment_exist)) {
                        $comment_id = $check_comment_exist[0]->comment_ID;
//update
                        $time = current_time('mysql');
                        $data = array(
                            'comment_ID' => $comment_id,
                            'comment_post_ID' => $item_id,
                            'comment_author' => $display_name,
                            'comment_author_email' => $email,
                            'comment_content' => global_cairo360::filter_words(array('content' => $body, 'api' => true)),
                            'user_id' => $user_id,
                            'comment_date' => $time,
                            'comment_approved' => 0,
                        );


                        $updated_comment = wp_update_comment($data);
                        update_comment_meta($comment_id, 'pixrating', $rate);

                        $comments_count = wp_count_comments($item_id);
                        $comments_count = $comments_count->approved;

                        $item_rate = array(
                            "id" => $item_id,
                            "type" => $item_type,
                            "rate" => $rate,
                            "count" => $comments_count
                        );

                        $result = array(
                            "status" => true,
                            "status_msg" => "Item reviewed successfully",
                            "review_id" => 882,
                            "item_rate" => $item_rate
                        );


                        return $result;
                    } else {
                        $time = current_time('mysql');
                        $data = array(
                            'comment_post_ID' => $item_id,
                            'comment_author' => $display_name,
                            'comment_author_email' => $email,
                            'comment_content' => global_cairo360::filter_words(array('content' => $body, 'api' => true)),
                            'user_id' => $user_id,
                            'comment_date' => $time,
                            'comment_approved' => 0,
                        );

                        $comment = wp_insert_comment($data);
                        update_comment_meta($comment, 'pixrating', $rate);
//print_r($comment);

                        $comments_count = wp_count_comments($item_id);
                        $comments_count = $comments_count->approved;


                        $item_rate = array(
                            "id" => $item_id,
                            "type" => $item_type,
                            "rate" => $rate,
                            "count" => $comments_count
                        );

                        $result = array(
                            "status" => true,
                            "status_msg" => "Item reviewed successfully",
                            "review_id" => 882,
                            "item_rate" => $item_rate
                        );


                        return $result;

                        if ($comment) {

                            return $data;
                        } else {
                            $false_arr = array(
                                "status" => false,
                                "status_msg" => "Error reviewing item",
                                "status_code" => 1049
                            );
                            return $false_arr;
                        }
                    }
                } else {
                    $false_arr = array(
                        "status" => false,
                        "status_message" => "Item not exist",
                        "status_code" => 1057
                    );
                    return $false_arr;
                }
            } else {

                $false_arr = array(
                    "status" => false,
                    "status_message" => "Invalid user token or expired",
                    "status_code" => 1003
                );
                return $false_arr;
            }
        }


        return "inside";
    }

    /**
     * delete user reviews
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token , reviews ids
     * @return object|true review deleted
     */
    function user_reviews_delete(WP_REST_Request $request) {


        $user_token = $request->get_param('user_token');
        $ids = $request->get_param('ids');


//errors array
        $errors_arr = array();

// Required validations
        if ($user_token == '' || empty($user_token)) {

            $errors_arr += array('Required user token');
        }

        if ($ids == '' || empty($ids)) {
            $errors_arr += array('Required at least one id');
        }


        if (sizeof($errors_arr) > 0) {

            $false_arr = array(
                "status" => false,
                "status_msg" => $errors_arr,
            );

            return $false_arr;
        } else {

//create obj from validator class
            $validator_obj = new validator();

//create obj from user class
            $user_obj = new user();

//user variables
            $user = $user_obj->get_user_data_by_token($user_token);
            $user_id = $user[0]->data->ID;

            $validate = $validator_obj->validate_user_token($user_token);

            $expire_date = get_user_meta($user_id, 'expire_date', true);

            $check_expire_date = $validator_obj->validate_expire_date($expire_date);

            if ($validate == true && $check_expire_date == true) {

                $reviews_ids = explode(',', $ids);

                $affected_rows_arr = array();

                foreach ($reviews_ids as $key => $value) {
                    $get_comment = get_comment($value);

                    if ($get_comment) {
                        $affected_rows_arr [$value] = array($value);
                    }

                    $deleted_review = wp_delete_comment($value);
                }

                $result = array(
                    "status" => true,
                    "status_msg" => sizeof($affected_rows_arr) . "item/s deleted",
                    "status_code" => 1117
                );
                return $result;
            } else {

                $false_arr = array(
                    "status" => false,
                    "status_message" => "Invalid user token or expired",
                    "status_code" => 1003
                );
                return $false_arr;
            }
        }
    }

    /**
     * retrieve user favourite list
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token
     * @return objets of the favourites
     */
    function user_favorites_list(WP_REST_Request $request) {

        $user_token = $request->get_param('user_token');
        $sort = $request->get_param('sort');

//errors array
        $errors_arr = array();

// Required validations
        if ($user_token == '' || empty($user_token)) {

            $errors_arr += array('Required user token');
        }

        if (sizeof($errors_arr) > 0) {

            $false_arr = array(
                "status" => false,
                "status_msg" => $errors_arr,
            );

            return $false_arr;
        } else {

//create obj from validator class
            $validator_obj = new validator();

//create obj from user class
            $user_obj = new user();

//user variables
            $user = $user_obj->get_user_data_by_token($user_token);
            $user_id = $user[0]->data->ID;
            $validate = $validator_obj->validate_user_token($user_token);

            $expire_date = get_user_meta($user_id, 'expire_date', true);

            $check_expire_date = $validator_obj->validate_expire_date($expire_date);

            if ($validate == true && $check_expire_date == true) {

                $args_users_linked = array(
                    'meta_key' => 'linked_id',
                    'meta_value' => $user_id,
                );
                $users_ids_arr = array($user_id);
                $users_linked = get_users($args_users_linked);
                if (!empty($users_linked)) {
                    foreach ($users_linked as $key => $user) {
                        $uid[] = $user->data->ID;
                    }
                    $users_ids_arr = array_merge($uid, $users_ids_arr);
                }
                $favorites = array();
                foreach ($users_ids_arr as $uid_info) {
                    $favorites = array_merge(get_user_favorites($uid_info), $favorites);
                }
                if (empty($favorites)) {
                    $false_arr = array(
                        "status" => false,
                        "status_message" => "No favorites found",
                        "status_code" => 1085
                    );
                    return $false_arr;
                }

                foreach ($favorites as $val) {
                    $string .= "'" . $val . "'" . ', ';
                }
                $string = substr($string, 0, -2);
                global $wpdb;
                $sql = "SELECT wp_posts.*
                FROM wp_posts
                LEFT JOIN wp_icl_translations
                ON wp_posts.ID = wp_icl_translations.element_id
                WHERE
                wp_posts.post_status = 'publish'
                AND wp_posts.post_type IN ('venue', 'film', 'music', 'dvd', 'book', 'event', 'article', 'competition')

                AND wp_posts.ID IN (" . $string . ")
                limit 100";

                $posts = $wpdb->get_results($sql, OBJECT);
//return $posts ;

                foreach ($posts as $key => $value) {

                    $item_id = $posts[$key]->ID;
                    $ids_arr[] = $posts[$key]->ID;
                    $item_type = $posts[$key]->post_type;
                    $item_title = $posts[$key]->post_title;
                    $item_img = (!empty(wp_get_attachment_url(get_post_thumbnail_id($item_id)))) ? wp_get_attachment_url(get_post_thumbnail_id($item_id)) : '';

//get categories
//                    $cats = get_the_category(87388);
                    $category_info = wp_get_object_terms($item_id, 'category');

                    foreach ($category_info as $key => $value) {
                        $category_name = $category_info[$key]->name;
                        $category_id = $category_info[$key]->term_id;
                        $names_arr[] = $category_name;
                        $ids_arr[] = $category_id;
                    }


                    $items[] = array(
                        "id" => (int) $item_id,
                        "item_id" => (int) $item_id,
                        "item_type" => $item_type,
                        "title" => $item_title,
                        "subtitle" => empty($category_name) ? '' : $category_name, //"Action & Adventure, Thriller", // categories
                        "image" => $item_img,
                        "uid" => (int) $user_id, //user who fav the post
                        "item_category_id" => (int) $category_id,
                    );
                }

                $results = array(
                    "status" => true,
                    "items" => $items
                );
                return $results;
            } else {

                $false_arr = array(
                    "status" => false,
                    "status_message" => "Invalid user token or expired",
                    "status_code" => 1003
                );
                return $false_arr;
            }
        }
    }

    /**
     * retrieve item reviews (comments of posts )
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param
     * required : item_id , item_type
     * optional : start , limit
     * @return objects of reviews
     */
    function get_item_reviews(WP_REST_Request $request) {

        $start = $request->get_param('start') ? $request->get_param('start') : 0;
        $limit = $request->get_param('limit') ? $request->get_param('limit') : 5;
        $item_id = $request->get_param('item_id');
        $item_type = strtolower($request->get_param('item_type'));

//errors array
        $errors_arr = array();

// Required validations
        if ($item_id == '' || empty($item_id)) {

            $errors_arr += array('Required item id');
        }

        if ($item_type == '' || empty($item_type)) {

            $errors_arr += array('Required item type');
        }

        if (sizeof($errors_arr) > 0) {

            $false_arr = array(
                "status" => false,
                "status_msg" => $errors_arr,
            );

            return $false_arr;
        } else {

            $args = array(
                'number' => $limit,
                'offset' => $start,
                'post_id' => $item_id,
            );
            $reviews = get_comments($args);
//print_r($reviews);die;

            $reviews_arr = array();
            foreach ($reviews as $key => $review) {

                $review_id = $review->comment_ID;
                $review_body = $review->comment_content;
                $rating = get_comment_meta($review_id, 'pixrating', true);
                $date = $review->comment_date;
                $post_id = $review->comment_post_ID;
                $post_type = get_post_type($post_id);
                $post_name = get_the_title($post_id);
                $post_image = get_the_post_thumbnail($post_id);
                $user_id = $review->user_id;
                $comment_author = $review->comment_author;

//get user data
//$user_data = get_user_by('ID', $user_id);
//$username = $user_data->user_login;
                $user_img = $this->get_user_image($user_id);

//print_r($name);die;
//print_r($user_data);die;
//categories
                $category_info = wp_get_object_terms($post_id, 'category');
                $category_id = $category_info[0]->term_id;

//book of eli id  87387
                $reviews_arr[$key] = array(
                    "id" => $review_id,
                    "rate" => $rating,
                    "title" => $post_name . " " . "review",
                    "body" => global_cairo360::filter_words(array('content' => $review_body, 'api' => true)),
                    "created" => $date,
                    "uid" => $user_id,
                    "user_name" => $comment_author,
                    "user_picture" => $user_img,
                );
            }


            $result = array(
                "status" => true,
                "reviews" => $reviews_arr
            );



            return $result;
        }
    }

    /**
     * retrieve specific user rates
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param
     * required : user_token
     * optional : start , limit , sort
     * @return objects of reviews
     */
    function user_rates_list(WP_REST_Request $request) {

        $user_token = $request->get_param('user_token');
        $start = ($request->get_param('start') == null) ? 0 : $request->get_param('start');
        $limit = ($request->get_param('limit') == null) ? '' : " limit " . $start . "," . $request->get_param('limit');

        $sort = ($request->get_param('sort') == null) ? 'ASC' : $request->get_param('sort');

        if ($user_token == '' || empty($user_token)) {

            $false_arr = array(
                "status" => false,
                "status_msg" => "Empty user token",
            );
            return $false_arr;
        }

//create obj from validator class
        $validator_obj = new validator();

//create obj from user class
        $user_obj = new user();

//user variables
        $user = $user_obj->get_user_data_by_token($user_token);
        $user_id = $user[0]->data->ID;


        $validate = $validator_obj->validate_user_token($user_token);

        $expire_date = get_user_meta($user_id, 'expire_date', true);

        $check_expire_date = $validator_obj->validate_expire_date($expire_date);


        if ($validate == true && $check_expire_date == true) {

//set variables
            $email = $user[0]->data->user_email;
            $display_name = $user[0]->data->display_name;
            $nice_name = $user[0]->data->user_nicename;
            $created = $user[0]->data->user_registered;
            $status = $user[0]->data->user_status;

            $args_users_linked = array(
                'meta_key' => 'linked_id',
                'meta_value' => $user_id,
            );
            $users_ids_arr = array($user_id);
            $users_linked = get_users($args_users_linked);
            if (!empty($users_linked)) {
                foreach ($users_linked as $key => $user) {
                    $uid[] = $user->data->ID;
                }
                $users_ids_arr = array_merge($uid, $users_ids_arr);
            }

//            $args = array(
//                'author_email' => $email,
//                'ID' => $user_id,
//                'offset' => $start,
//                'order' => $sort,
//                'number' => $limit,
//            );
//            $reviews = get_comments($args);
            global $wpdb;
            $sql = "SELECT wp_comments.*
                FROM wp_comments
                LEFT JOIN wp_icl_translations
                ON wp_comments.comment_ID = wp_icl_translations.element_id
                WHERE
                 wp_comments.user_id IN (" . implode(',', $users_ids_arr) . ")
                " . $limit . "";


            $reviews = $wpdb->get_results($sql, OBJECT);

            if (empty($reviews)) {
                $false_arr = array(
                    "status" => false,
                    "status_msg" => "No reviews found",
                    "status_code" => 1083
                );
                return $false_arr;
            }


            foreach ($reviews as $key => $review) {

                $review_id = $review->comment_ID;
                $review_body = $review->comment_content;
                $rating = get_comment_meta($review_id, 'pixrating', true);
                $date = $review->comment_date;
                $post_id = $review->comment_post_ID;
                $post_type = get_post_type($post_id);
                $post_name = get_the_title($post_id);
                $post_image = get_the_post_thumbnail($post_id);

//categories
                $category_info = wp_get_object_terms($post_id, 'category');
                $category_id = $category_info[0]->term_id;



//book of eli id 87387
                $reviews_arr[$key] = array(
                    "id" => (int) $review_id,
                    "item_name" => $post_name . "  " . "review",
                    "item_image" => $post_image,
                    "item_id" => (int) $post_id,
                    "item_type" => $post_type,
                    "item_category_id" => (int) $category_id,
                    "subtitle" => 'pending',
                    "rate" => (int) $rating,
                    "uid" => (int) $user_id,
                );
            }


            $result = array(
                "status" => true,
                "total_reviews" => sizeof($reviews_arr),
                "reviews" => $reviews_arr
            );

            return $result;


            return "validated user";
        } else {

            $false_arr = array(
                "status" => false,
                "status_message" => "Invalid user token or expired",
                "status_code" => 1003
            );
            return $false_arr;
        }


        return "inside";
    }

    /**
     * add user rateto a specific post
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token , item_id , item_type , rate
     * @return object of the new rate
     */
    function user_rate(WP_REST_Request $request) {

        $user_token = $request->get_param('user_token');
        $item_id = $request->get_param('item_id');
        $item_type = strtolower($request->get_param('item_type'));
        $rate = $request->get_param('rate');

//errors array
        $errors_arr = array();


// Required validations
        if ($user_token == '' || empty($user_token)) {

            $errors_arr += array('Required user token');
        }

        if ($rate == '' || empty($rate)) {

            $errors_arr += array('Required rate number');
        }

        if (isset($rate) && $rate != '' && ( $rate < 0 || $rate > 5)) {
            $errors_arr += array('Invalid rate number');
        }

        if ($item_id == '' || empty($item_id)) {

            $errors_arr += array('Required item id');
        }

        if ($item_type == '' || empty($item_type)) {

            $errors_arr += array('Required item type');
        }


        if (sizeof($errors_arr) > 0) {

            $false_arr = array(
                "status" => false,
                "status_msg" => $errors_arr,
            );

            return $false_arr;
        } else {

//create obj from validator class
            $validator_obj = new validator();

//create obj from user class
            $user_obj = new user();

//user variables
            $user = $user_obj->get_user_data_by_token($user_token);
            $user_id = $user[0]->data->ID;

//set variables
            $email = $user[0]->data->user_email;
            $display_name = $user[0]->data->display_name;
            $nice_name = $user[0]->data->user_nicename;
            $created = $user[0]->data->user_registered;
            $status = $user[0]->data->user_status;

//get user meta data
            $first_name = get_user_meta($user_id, 'first_name', true);
            $last_name = get_user_meta($user_id, 'last_name', true);
            $birthdate = get_user_meta($user_id, 'birthdate', true);
            $gender = get_user_meta($user_id, 'gender', true);
            $privacy = get_user_meta($user_id, 'privacy', true);
            $expire_date = get_user_meta($user_id, 'expire_date', true);
            $user_img = $this->get_user_image($user_id);


            $validate = $validator_obj->validate_user_token($user_token);

            $expire_date = get_user_meta($user_id, 'expire_date', true);

            $check_expire_date = $validator_obj->validate_expire_date($expire_date);
            if ($validate == true && $check_expire_date == true) {


// lets validate the post
                $check_post_exist = get_post($item_id);

// 87528 hubbly bubbly
                if ($check_post_exist) {


                    $args = array(
                        'author_email' => $email,
                        'post_id' => $item_id,
                        'user_id' => $user_id,
                    );

                    $check_comment_exist = get_comments($args);

                    if (!empty($check_comment_exist)) {
                        $comment_id = $check_comment_exist[0]->comment_ID;
//update
                        $time = current_time('mysql');
                        $data = array(
                            'comment_ID' => $comment_id,
                            'comment_post_ID' => $item_id,
                            'comment_author' => $display_name,
                            'comment_author_email' => $email,
                            'user_id' => $user_id,
                            'comment_date' => $time,
                            'comment_approved' => 0,
                        );


                        $updated_comment = wp_update_comment($data);
                        update_comment_meta($comment_id, 'pixrating', $rate);

                        $comments_count = wp_count_comments($item_id);
                        $comments_count = $comments_count->approved;

                        $item_rate = array(
                            "type" => $item_type,
                            "id" => (float) $item_id,
                            "rate" => (float) $rate,
                            "count" => (float) $comments_count
                        );

                        $result = array(
                            "status" => true,
                            "status_msg" => "Item rated successfully",
                            "status_code" => 1110,
                            //"review_id" => (float)$comment_id,
                            "item_rated" => $item_rate
                        );


                        return $result;
                    } else {
                        $time = current_time('mysql');
                        $data = array(
                            'comment_post_ID' => $item_id,
                            'comment_author' => $display_name,
                            'comment_author_email' => $email,
                            'user_id' => $user_id,
                            'comment_date' => $time,
                            'comment_approved' => 0,
                        );

                        $comment = wp_insert_comment($data);
                        update_comment_meta($comment, 'pixrating', $rate);
//print_r($comment);die;

                        $comments_count = wp_count_comments($item_id);
                        $comments_count = $comments_count->approved;


                        $item_rate = array(
                            "type" => $item_type,
                            "id" => (float) $item_id,
                            "rate" => (float) $rate,
                            "count" => (float) $comments_count
                        );

                        $result = array(
                            "status" => true,
                            "status_msg" => "Item rated successfully",
                            "status_code" => 1110,
                            //"review_id" => $comment,
                            "item_rated" => $item_rate
                        );



                        return $result;

                        if ($comment) {

                            return $data;
                        } else {
                            $false_arr = array(
                                "status" => false,
                                "status_msg" => "Error reviewing item",
                                "status_code" => 1049
                            );
                            return $false_arr;
                        }
                    }



                    return "exists";
                } else {
                    $false_arr = array(
                        "status" => false,
                        "status_msg" => "Invalid item type.",
                        "status_code" => 1057
                    );
                    return $false_arr;
                }
            } else {

                $false_arr = array(
                    "status" => false,
                    "status_msg" => "Invalid user token or expired",
                    "status_code" => 1003
                );
                return $false_arr;
            }

            return "no erros ";
        }
    }

    /**
     * delete user rates
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token , reviews ids
     * @return object and number of reviews deleted
     */
    function user_rates_delete(WP_REST_Request $request) {

        $user_token = $request->get_param('user_token');
        $ids = $request->get_param('ids');

//errors array
        $errors_arr = array();

// Required validations
        if ($user_token == '' || empty($user_token)) {

            $errors_arr += array('Required user token');
        }

        if ($ids == '' || empty($ids)) {
            $errors_arr += array('Required at least one id');
        }


        if (sizeof($errors_arr) > 0) {

            $false_arr = array(
                "status" => false,
                "status_msg" => $errors_arr,
            );

            return $false_arr;
        } else {

//create obj from validator class
            $validator_obj = new validator();

//create obj from user class
            $user_obj = new user();

//user variables
            $user = $user_obj->get_user_data_by_token($user_token);
            $user_id = $user[0]->data->ID;

            $validate = $validator_obj->validate_user_token($user_token);

            $expire_date = get_user_meta($user_id, 'expire_date', true);

            $check_expire_date = $validator_obj->validate_expire_date($expire_date);

            if ($validate == true && $check_expire_date == true) {

                $rates_ids = explode(',', $ids);

                $affected_rows_arr = array();

                foreach ($rates_ids as $key => $value) {
                    $get_comment = get_comment($value);

                    if ($get_comment) {
                        $affected_rows_arr [$value] = array($value);
                    }

                    $deleted_review = wp_delete_comment($value);
                }

                $result = array(
                    "status" => true,
                    "status_msg" => sizeof($affected_rows_arr) . "item/s deleted",
                    "status_code" => 1117,
                    "deleted_ids" => $rates_ids
                );
                return $result;
            } else {

                $false_arr = array(
                    "status" => false,
                    "status_message" => "Invalid user token or expired",
                    "status_code" => 1003
                );
                return $false_arr;
            }

            return "no erors";
        }
    }

    /**
     * user logout
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token
     * @return object says user logged out successfully
     */
    function user_logout(WP_REST_Request $request) {

        $user_token = $request->get_param('user_token');

//create obj from validator class
        $validator_obj = new validator();

//create obj from user class
        $user_obj = new user();

//user variables
        $user = $user_obj->get_user_data_by_token($user_token);
        $user_id = $user[0]->data->ID;

        $validate = $validator_obj->validate_user_token($user_token);

        $expire_date = get_user_meta($user_id, 'expire_date', true);

        $check_expire_date = $validator_obj->validate_expire_date($expire_date);

        if ($validate == true && $check_expire_date == true) {

            try {

//variables to add to user meta
                $access_token = '';
                $expire_date = 0;

//add user meta .. we used update in order to prevent redundancy
                update_user_meta($user_id, 'access_token', $access_token);
                update_user_meta($user_id, 'expire_date', $expire_date);

                $result = array(
                    "status" => true,
                    "status_message" => "User logged out successfully",
                    "status_code" => 1103
                );
                return $result;
            } catch (Exception $e) {

                $result = array(
                    "status" => false,
                    "status_message" => $e->getMessage(),
                    "status_code" => 1072
                );
                return $result;
            }
        } else {

            $false_arr = array(
                "status" => false,
                "status_message" => "Invalid user token or expired",
                "status_code" => 1003
            );
            return $false_arr;
        }
    }

    /**
     * checks if app version needs update or not
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param installed_version , device_type
     * @return boolean true if it needs update and false if it doesn't need update
     */
    function app_version_status(WP_REST_Request $request) {

        $app_version_ios = '2.1.3';
        $app_version_android = '2.3';
        $force_update_ios = false;
        $force_update_android = false;
        $should_update = 0;

        $installed_version = $request->get_param('installed_version');
        $device_type = $request->get_param('device_type');

        if (!$installed_version) {
            $false_arr = array(
                "status" => false,
                "status_msg" => "Required installed version of the app",
            );
            return $false_arr;
        } else {
            switch (strtolower($device_type)) {
                case 'ios':
                    $app_version = $app_version_ios;
                    break;
                case 'android':
                    $app_version = $app_version_android;
                    break;
                default:
                    $app_version = 0;
                    break;
            }

//return $app_version ;

            if ($app_version_ios > $installed_version) {

                if (strtolower($device_type) == 'ios') {
                    $should_update = 1;
                    $app_version = $app_version_ios;
                    if ($force_update_ios == true)
                        $should_update = 2;
                }
            }
            if ($app_version_android > $installed_version) {

                if (strtolower($device_type) == 'android') {
                    $should_update = 1;
                    $app_version = $app_version_android;
                    if ($force_update_android == true)
                        $should_update = 2;
                }
            }

            $result = array(
                "latest_version" => $app_version,
                "installed_version" => $installed_version,
                "should_update" => $should_update
            );
            return $result;
        }
    }

    /**
     * sends the new password to the user
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param email
     * @return boolean true if it email sent and false if mail is not sent
     */
    function user_forget_password(WP_REST_Request $request) {

        $email = $request->get_param('email');
        $sitename = __("Cairo360");


        $user = get_user_by('email', $email);
        if ($user) {

//user variables
            $first_name = $user->first_name;
            $last_name = $user->last_name;
            $user_id = $user->ID;

//create obj from user class
            $user_obj = new user();

//new password
            $new_pass = $user_obj->generate_password(8);

//print_r($new_pass);die;
//hash the pawd
//$hashed_password=wp_hash_password( $password );


            wp_update_user(array('ID' => $user_id, 'user_pass' => $new_pass));

//email variables
            $to[] = $email;
            $subject = 'Reset your password' . ' -- ' . $sitename;

            $message = $first_name . ' ' . $last_name . ", <br/><br/>";
            $message.= "A request to reset the password for your account has been made at $sitename <br/>";
            $message.= "Your new password is: <strong>$new_pass</strong> <br/>";
            $message.= "Notice: this new password will be expired in 24 hours, ";
            $message.= "If you didn’t request this change, please disregard this email
                 and no change will occur to your account.";

            $body = 'this is a test mail to forget password api ';
            $headers[] = 'Content-Type: text/html; charset=UTF-8';

//wp_mail( $to , $subject, $body . '<a href="'.$activation_link.'">'.$activation_link.'</a>'.'<br/><br/>' . $activation_link , $headers );
            $sent = wp_mail($to, $subject, $message, $headers);

            if ($sent) {

                $result = array(
                    "status" => true,
                    "status_msg" => "Email with forget password instruction infromation sent to your email"
                );
                return $result;
            } else {
                $result = array(
                    "status" => false,
                    "status_msg" => "Error sending the mail"
                );
                return $result;
            }
            return "user exists";
        } else {

            $false_arr = array(
                "status" => false,
                "status_message" => "This email doesn't exist",
                "status_code" => 1051
            );
            return $false_arr;

            return "user not found";
        }



        return "inside";
    }

    /**
     * login with social media
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param device_id , device_token , device_platform , parse_id,email
     *        social_id , social_provider , display_name , first_name , last_name
     *        birthdate , gender , newsletter , privacy , user_agent
     * @return if the user already have an account
     * he logs in if he is new then we create a new account for him
     */
    function user_login_social(WP_REST_Request $request) {

        $device_id = $request->get_param('device_id');
        $device_token = $request->get_param('device_token');
        $device_platform = $request->get_param('device_platform');
        $parse_id = $request->get_param('parse_id');
        $email = $request->get_param('email');
        $social_id = $request->get_param('social_id');
        $social_provider = $request->get_param('social_provider');
        $display_name = $request->get_param('display_name');
        $first_name = $request->get_param('first_name');
        $last_name = $request->get_param('last_name');
        $birthdate = $request->get_param('birthdate');
        $gender = $request->get_param('gender');
        $newsletter = $request->get_param('newsletter');
        $privacy = $request->get_param('privacy');
        $profile_img_url = $request->get_param('profile_img_url');
        $device_token = $device_token;

        $errors = array();

        $validator_obj = new validator();
        $check_email = $validator_obj->check_valid_email_address($email);
//  if($email=='' || empty($email)){
//      $errors[]= __('Required email address');
//  }
//        if ($email == '' && !$check_email) {
//            $errors[] = __('Invalid email address');
//        }
        if ($social_provider == '' || empty($social_provider)) {
            $errors[] = __('Required social provider');
        }
        if ($social_id == '' || empty($social_id)) {
            $errors[] = __('Required social id');
        }
        if ($first_name == '' || empty($first_name)) {
            $errors[] = __('Required first name');
        }
        if ($last_name == '' || empty($last_name)) {
            $errors[] = __('Required last name');
        }
        if ($device_id == '' || empty($device_id)) {
            $errors[] = __('Required mobile device id');
        }
        if ($birthdate != null) {
            if (($rawData = strptime($birthdate, '%d/%m/%G')) !== false) {
                $birthdate = DateTime::createFromFormat('d/m/Y', $birthdate)->format('Y-m-d');
            } else {
                $errors[] = __('Invalid birthdate format ex:25/11/1990');
            }
        } else {
            $birthdate = '0000-00-00';
        }


        if (sizeof($errors) > 0) {

            $false_arr = array(
                "status" => false,
                "status_msg" => $errors,
            );

            return $false_arr;
        } else {

            $gender = ($gender != null) ? $gender : 0;
            $newsletter = ($newsletter == null) ? 0 : $newsletter;
            $privacy = ($privacy != null) ? $privacy : 0;
            $status = 1;
            $social = 1;

            $user_check = user::get_user_data_by_social_id($social_id);
            if (empty($user_check)) {
// Create new user
                $user = array(
                    'user_pass' => '',
                    'user_login' => $first_name . '.' . $last_name . date('Y', strtotime($birthdate)),
                    'display_name' => $display_name,
                );
                if (!empty($email)) {
                    $user = array_merge(array('user_email' => $email), $user);
                }
                $user_id = wp_insert_user($user);
//On success
                if (!is_wp_error($user_id)) {
                    update_user_meta($user_id, 'first_name', $first_name);
                    update_user_meta($user_id, 'last_name', $last_name);
                    add_user_meta($user_id, 'birthdate', $birthdate);
                    add_user_meta($user_id, 'gender', $gender);
//                    add_user_meta($user_id, 'newsletter', $newsletter);
                    add_user_meta($user_id, 'privacy', $privacy);
                    add_user_meta($user_id, 'device_id', $device_id);
                    add_user_meta($user_id, 'device_token', $device_token);
                    add_user_meta($user_id, 'device_platform', $device_platform);
                    add_user_meta($user_id, 'parse_id', $parse_id);

// adding the new social id
                    add_user_meta($user_id, 'social_id', $social_id);
                    add_user_meta($user_id, 'social', 1);
                    add_user_meta($user_id, 'social_provider', $social_provider);

//variables to add to user meta
                    $access_token = user::generate_access_token();
                    $expire_date = time() + (2 * 24 * 60 * 60);


//add user meta .. we used update in order to prevent redundancy
                    update_user_meta($user_id, 'access_token', $access_token);
                    update_user_meta($user_id, 'expire_date', $expire_date);
                    update_user_meta($user_id, 'user_pic', $profile_img_url);


// get user data
                    $user = get_user_by('ID', $user_id);
                    $user_img = $this->get_user_image($user_id);
                    $user_registered = $user->data->user_registered;
                    $user_status = $user->data->user_status;

                    $social = get_user_meta($user_id, 'social', true);
                    $newsletter = get_user_meta($user_id, 'newsletter', true);
                    $linked_id = get_user_meta($user_id, 'linked_id', true);

                    $args = array(
                        'meta_key' => 'linked_id',
                        'meta_value' => $user_id,
                    );

                    $users = get_users($args);
                    foreach ($users as $key => $user_val) {

                        $uid = $user_val->data->ID;
                        $social_provider = get_user_meta($uid, 'social_provider', true);
                        $social_id = get_user_meta($uid, 'social_id', true);

                        $users_arr[] = array(
                            "uid" => (int) $uid,
                            "user_type" => "social",
                            "social_provider" => $social_provider,
                            "social_id" => $social_id
                        );
                    }

                    if (empty($users_arr)) {
                        $users_arr = array();
                    }

                    if (!empty($birthdate)) {
                        if ($birthdate == '0000-00-00') {
                            $birthdate = '00/00/0000';
                        } else {
                            $birthdate = date('d/m/Y', strtotime($birthdate));
                        }
                    } else {
                        $birthdate = '';
                    }
                    $result = array(
                        "status" => true,
                        "status_msg" => "User logged in successfully",
                        "status_code" => 1102,
                        "user_token" => $access_token,
                        "profile" => array(
                            "uid" => $user_id,
                            "email" => $email,
                            "social_provider" => $social_provider,
                            "social_id" => $social_id,
                            "display_name" => $display_name,
                            "first_name" => $first_name,
                            "last_name" => $last_name,
                            "birthdate" => (string) $birthdate,
                            "gender" => $gender,
                            "newsletter" => $newsletter,
                            "created" => $user_registered,
                            "status" => $user_status,
                            "privacy" => (int) !empty($privacy) ? $privacy : 0,
                            "picture" => $user_img,
                            "social" => empty($social) ? 0 : (int) $social,
                            "linked_id" => $linked_id,
                            "linked_socials" => $users_arr
                        ),
                            //"user_data"=>$user
                    );

                    return $result;

//return "user created ";
                } else {

                    $error_result = array(
                        "status" => false,
                        "status_message" => $user_id->get_error_message(),
                        "status_code" => 1056
                    );
                    return $error_result;
                }
            } else {
                $user = user::get_user_data_by_social_id($social_id);

                if (!empty($user)) {
                    $user_id = $user[0]->data->ID;

//variables to add to user meta
                    $access_token = user::generate_access_token();
                    $expire_date = time() + (2 * 24 * 60 * 60);

//add user meta .. we used update in order to prevent redundancy
                    update_user_meta($user_id, 'access_token', $access_token);
                    update_user_meta($user_id, 'expire_date', $expire_date);

//update user meta (device_id , device_token , device_platform , parse_id)
                    update_user_meta($user_id, 'device_id', $device_id);
                    update_user_meta($user_id, 'device_token', $device_token);
                    update_user_meta($user_id, 'device_platform', $device_platform);
                    update_user_meta($user_id, 'parse_id', $parse_id);
//get user meta data
                    $first_name = get_user_meta($user_id, 'first_name', true);
                    $last_name = get_user_meta($user_id, 'last_name', true);
                    $birthdate = get_user_meta($user_id, 'birthdate', true);
                    $gender = get_user_meta($user_id, 'gender', true);
                    $privacy = get_user_meta($user_id, 'privacy', true);
//                    $user_img = get_avatar_url($user_id);

                    $user_img = $this->get_user_image($user_id);


                    $social = get_user_meta($user_id, 'social', true);
                    $newsletter = get_user_meta($user_id, 'newsletter', true);
                    $linked_id = get_user_meta($user_id, 'linked_id', true);


                    $args = array(
                        'meta_key' => 'linked_id',
                        'meta_value' => $user_id,
                    );

                    $users = get_users($args);

                    $users_arr = array();

                    if (!empty($users)) {

                        foreach ($users as $key => $user_val) {

                            $uid = $user_val->data->ID;
                            $social_provider = get_user_meta($uid, 'social_provider', true);
                            $social_id = get_user_meta($uid, 'social_id', true);

                            $users_arr[] = array(
                                "uid" => (int) $uid,
                                "user_type" => "social",
                                "social_provider" => $social_provider,
                                "social_id" => $social_id
                            );
                        }
                    }

                    if (!empty($birthdate)) {
                        if ($birthdate == '0000-00-00') {
                            $birthdate = '00/00/0000';
                        } else {
                            $birthdate = date('d/m/Y', strtotime($birthdate));
                        }
                    } else {
                        $birthdate = '';
                    }


                    $result = array(
                        "status" => true,
                        "status_msg" => "User logged in successfully",
                        "status_code" => 1102,
                        "user_token" => $access_token,
                        "profile" => array(
                            "uid" => $user_id,
                            "email" => $user[0]->data->user_email,
                            "social_provider" => $social_provider,
                            "social_id" => (int) $social_id,
                            "display_name" => $user[0]->data->display_name,
                            "first_name" => $first_name,
                            "last_name" => $last_name,
                            "birthdate" => (string) $birthdate,
                            "gender" => !empty($gender) ? $gender : '',
                            "newsletter" => !empty($newsletter) ? $newsletter : '',
                            "created" => $user[0]->data->user_registered,
                            "status" => $user[0]->data->user_status,
                            "privacy" => (int) !empty($privacy) ? $privacy : 0,
                            "picture" => $user_img,
                            "social" => empty($social) ? 0 : (int) $social,
                            "linked_id" => $linked_id,
                            "linked_socials" => $users_arr
                        ),
                            //"user_data"=>$user
                    );


                    return $result;
                } else {
                    $response['status'] = false;
                    $response['status_message'] = __('Error login user');
                    $response['status_code'] = 1056;

                    $error_result = array(
                        "status" => false,
                        "status_message" => "Error login user",
                        "status_code" => 1056
                    );
                    return $error_result;
                }
            }

//return "no errors";
        }
    }

    /**
     * update user language which is stored in the user meta
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token , user_lang
     * @return object of user profile
     */
    function user_language_update(WP_REST_Request $request) {

        $user_token = $request->get_param('user_token');
        $user_lang = $request->get_param('user_lang');

        if (empty($user_token)) {
            $errors[] = __('Required user token');
        }
        if (empty($user_lang)) {
            $errors[] = __('Required user language');
        }
        if (strlen($user_lang) > 2) {
            $errors[] = __('Language must be 2 digits');
        }
        if (count($errors) > 0) {
            $result = array(
                "status" => false,
                "status_msg" => implode("\n", $errors),
            );
            return $result;
        } else {

//create obj from validator class
            $validator_obj = new validator();

//create obj from user class
            $user_obj = new user();

//user variables
            $user = $user_obj->get_user_data_by_token($user_token);
            $user_id = $user[0]->data->ID;

            $validate = $validator_obj->validate_user_token($user_token);

            $expire_date = get_user_meta($user_id, 'expire_date', true);

            $check_expire_date = $validator_obj->validate_expire_date($expire_date);

            if ($validate == true && $check_expire_date == true) {
                $update_lang = update_user_meta($user_id, 'user_lang', $user_lang);
//                if (isset($_GET['test'])) {
//                    print_r('after update user language');
//                }
//get user meta data
                $first_name = get_user_meta($user_id, 'first_name', true);
                $last_name = get_user_meta($user_id, 'last_name', true);
                $birthdate = get_user_meta($user_id, 'birthdate', true);
                $gender = get_user_meta($user_id, 'gender', true);
                $privacy = get_user_meta($user_id, 'privacy', true);
//                if (isset($_GET['test'])) {
//                    print_r('before image');
//                }
                $user_img = $this->get_user_image($user_id);
//                if (isset($_GET['test'])) {
//                    print_r('after image');
//                }
                $social = get_user_meta($user_id, 'social', true);

                $newsletter = get_user_meta($user_id, 'newsletter', true);
                $linked_id = get_user_meta($user_id, 'linked_id', true);
                $args = array(
                    'meta_key' => 'linked_id',
                    'meta_value' => $user_id,
                );

                $users = get_users($args);
//                if (isset($_GET['test'])) {
//                    print_r('users');
//                    print_r($users);
//                }
                $users_arr = array();
                if (!empty($users)) {
                    foreach ($users as $key => $user_info) {
                        $uid = $user_info->data->ID;
                        $social_provider = get_user_meta($uid, 'social_provider', true);
                        $social_id = get_user_meta($uid, 'social_id', true);

                        $users_arr[] = array(
                            "uid" => (int) $uid,
                            "user_type" => "social",
                            "social_provider" => $social_provider,
                            "social_id" => $social_id
                        );
                    }
                }
//                if (isset($_GET['test'])) {
//                    print_r('before result');
//                }
                $result = array(
                    "status" => true,
                    "status_message" => "Language updated successfully",
                    "status_code" => 1121,
                    "user_token" => $user_token,
                    "profile" => array(
                        "uid" => $user_id,
                        "email" => $user[0]->data->user_email,
                        "display_name" => $user[0]->data->display_name,
                        "first_name" => $first_name,
                        "last_name" => $last_name,
                        "birthdate" => $birthdate,
                        "gender" => $gender,
                        "newsletter" => $newsletter,
                        "created" => $user[0]->data->user_registered,
                        "status" => $user[0]->data->user_status,
                        "privacy" => $privacy,
                        "picture" => $user_img,
                        "social" => (int) $social,
                        "linked_id" => $linked_id,
                        "linked_socials" => $users_arr
                    )
                );
//                if (isset($_GET['test'])) {
//                    print_r('after result');
//                }
                return $result;
            } else {
                $false_arr = array(
                    "status" => false,
                    "status_message" => "Invalid user token or expired",
                    "status_code" => 1003
                );
                return $false_arr;
            }
        }
    }

    /**
     * add an item to the user favorite list in the user meta table ..
     * by the way all items are posts and stored in the posts table in database
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token , item_id , item_type
     * @return true
     */
    function user_favorite(WP_REST_Request $request) {

        $valid_types = array('venue', 'film', 'music', 'book', 'dvd', 'event', 'section', 'category');

        $user_token = $request->get_param('user_token');

        $item_id = $request->get_param('item_id');
        $item_type = strtolower($request->get_param('item_type'));

        if ($user_token == '') {
            $errors[] = __('Required user token');
        }
        if ($item_id == '') {
            $errors[] = __('Required item id');
        }
        if ($item_type == '') {
            $errors[] = __('Required item type');
        }
        if (!in_array($item_type, $valid_types)) {
            $errors[] = __('Invalid item type');
        }
        if (count($errors) > 0) {
            $result = array(
                "status" => false,
                "status_msg" => implode("\n", $errors),
            );
            return $result;
        } else {


//create obj from validator class
            $validator_obj = new validator();

//create obj from user class
            $user_obj = new user();

//user variables
            $user = $user_obj->get_user_data_by_token($user_token);
            $user_id = $user[0]->data->ID;

            $validate = $validator_obj->validate_user_token($user_token);

            $expire_date = get_user_meta($user_id, 'expire_date', true);

            $check_expire_date = $validator_obj->validate_expire_date($expire_date);

            if ($validate == true && $check_expire_date == true) {

                $favorites = get_user_favorites($user_id);

// checks if posts exists or not
                $check_post_exist = get_post($item_id);
                if (!$check_post_exist) {
                    $result = array(
                        "status" => false,
                        "status_message" => "Item not exist",
                        "status_code" => 1081
                    );
                    return $result;
                }

//checks if the post is already in favorites or not
                $check_in_array = in_array($item_id, $favorites);
                if ($check_in_array) {
                    $false_arr = array(
                        "status" => false,
                        "status_message" => "This item is added to favorites before",
                        "status_code" => 1074
                    );
                    return $false_arr;
                } else {
                    $favorites[] = $item_id;
                    update_user_meta($user_id, 'simplefavorites', $favorites);
                    $result = array(
                        "status" => true,
                        "status_msg" => "Item added to favorite successfully",
                        "status_code" => 1114
                    );
                    return $result;
                }
            } else {
                $false_arr = array(
                    "status" => false,
                    "status_message" => "Invalid user token or expired",
                    "status_code" => 1003
                );
                return $false_arr;
            }
        }
    }

    /**
     * remove an item from the user favorite list in the user meta table ..
     * by the way all items are posts and stored in the posts table in database
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token , item_id , item_type
     * @return true
     */
    function user_unfavorite_Item(WP_REST_Request $request) {
        $valid_types = array('venue', 'film', 'music', 'book', 'dvd', 'event', 'section', 'category');

        $user_token = $request->get_param('user_token');

        $item_id = $request->get_param('item_id');
        $item_type = strtolower($request->get_param('item_type'));

        if ($user_token == '') {
            $errors[] = __('Required user token');
        }
        if ($item_id == '') {
            $errors[] = __('Required item id');
        }
        if ($item_type == '') {
            $errors[] = __('Required item type');
        }
        if (!in_array($item_type, $valid_types)) {
            $errors[] = __('Invalid item type');
        }
        if (count($errors) > 0) {
            $result = array(
                "status" => false,
                "status_msg" => implode("\n", $errors),
            );
            return $result;
        } else {
//create obj from validator class
            $validator_obj = new validator();

//create obj from user class
            $user_obj = new user();

//user variables
            $user = $user_obj->get_user_data_by_token($user_token);
            $user_id = $user[0]->data->ID;

            $validate = $validator_obj->validate_user_token($user_token);

            $expire_date = get_user_meta($user_id, 'expire_date', true);

            $check_expire_date = $validator_obj->validate_expire_date($expire_date);

            if ($validate == true && $check_expire_date == true) {

                $favorites = get_user_favorites($user_id);

// checks if posts exists or not
                $check_post_exist = get_post($item_id);
                if (!$check_post_exist) {
                    $result = array(
                        "status" => false,
                        "status_message" => "Item doesn't exist",
                        "status_code" => 1081
                    );
                    return $result;
                }


//checks if the post is already in favorites or not
                $check_in_array = in_array($item_id, $favorites);
                if ($check_in_array) {

                    $index = array_search($item_id, $favorites);
//return $index ;die;

                    unset($favorites[$index]);
                    update_user_meta($user_id, 'simplefavorites', $favorites);
//return $favorites ; die;

                    $result = array(
                        "status" => true,
                        "status_message" => "Item removed from favorites successfully",
                    );
                    return $result;
                } else {
//$favorites[] = $item_id ;
//update_user_meta( $user_id, 'simplefavorites', $favorites );
                    $result = array(
                        "status" => false,
                        "status_msg" => "Item not found .. item isnt in your favorites",
                        "status_code" => 1114
                    );
                    return $result;
                }

                return "validated";
            } else {
                $false_arr = array(
                    "status" => false,
                    "status_message" => "Invalid user token or expired",
                    "status_code" => 1003
                );
                return $false_arr;
            }

            return "no err";
        }
    }

    /**
     * remove multiple items from the user favorite list in the user meta table ..
     * by the way all items are posts and stored in the posts table in database
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param user_token , ids
     * @return true
     */
    function user_favorites_delete(WP_REST_Request $request) {
        $user_token = $request->get_param('user_token');
        $ids = $request->get_param('ids');

//errors array
        $errors_arr = array();

// Required validations
        if ($user_token == '' || empty($user_token)) {

            $errors_arr += array('Required user token');
        }

        if ($ids == '' || empty($ids)) {
            $errors_arr += array('Required at least one id');
        }
        if (sizeof($errors_arr) > 0) {

            $false_arr = array(
                "status" => false,
                "status_msg" => $errors_arr,
            );

            return $false_arr;
        } else {

//create obj from validator class
            $validator_obj = new validator();

//create obj from user class
            $user_obj = new user();

//user variables
            $user = $user_obj->get_user_data_by_token($user_token);
            $user_id = $user[0]->data->ID;

            $validate = $validator_obj->validate_user_token($user_token);

            $expire_date = get_user_meta($user_id, 'expire_date', true);

            $check_expire_date = $validator_obj->validate_expire_date($expire_date);

            if ($validate == true && $check_expire_date == true) {
                $favorites_ids = explode(',', $ids);
                $affected_rows_arr = array();

//return $favorites_ids ;


                $favorites = get_user_favorites($user_id);

//  $index = array_search($item_id, $favorites);
//  unset($favorites[$index]);
//  update_user_meta( $user_id, 'simplefavorites', $favorites );

                foreach ($favorites_ids as $key => $value) {
                    $index = array_search($value, $favorites);
                    unset($favorites[$index]);
//add the id to the affected array
                    $affected_rows_arr [$value] = array($value);
//update the favorites in the usermeta table
                    update_user_meta($user_id, 'simplefavorites', $favorites);
                }
                $result = array(
                    "status" => true,
                    "status_msg" => sizeof($affected_rows_arr) . "item/s deleted",
                    "status_code" => 1117,
                    "deleted_ids" => $favorites_ids
                );
                return $result;
            } else {
                $false_arr = array(
                    "status" => false,
                    "status_message" => "Invalid user token or expired",
                    "status_code" => 1003
                );
                return $false_arr;
            }
        }
    }

    /**
     * get posts with category id
     * get first letter of each item and count number of each letter in posts if grouped=1
     * also search posts with keyword in post title and post body
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param category , limit , start , orderby , sort , start_with , keyword , grouped
     * @return objects of items
     */
    function get_items_by_category_id(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $category_id = $request->get_param('category');
        $limit = ($request->get_param('limit') == null) ? 5 : $request->get_param('limit');
        $offset = ($request->get_param('start') == null) ? 0 : $request->get_param('start');
        $orderby = $request->get_param('orderby') ? $request->get_param('orderby') : 'title'; // name or created
        $orderby = ($orderby == 'name') ? 'title' : $orderby;
//$orderby    = ($orderby=='created')? /*'published_date'*/ 'foreign_key':$orderby;
        $sort = ($request->get_param('sort') == null) ? 'ASC' : $request->get_param('sort');
        $start_with = ($request->get_param('start_with') == null) ? '' : $request->get_param('start_with');
        $keyword = ($request->get_param('keyword') == null) ? '' : $request->get_param('keyword');
        $grouped = ($request->get_param('grouped') == null) ? 0 : $request->get_param('grouped');

        $args = array(
            'posts_per_page' => $limit,
            'offset' => $offset,
            //'category'         => '',
//'category_name'    => '',
//'posts_per_page'=>-1,
            's' => $keyword,
            'orderby' => $orderby,
            'order' => $sort,
            'post_type' => array('venue', 'film', 'music', 'dvd', 'book', 'event', 'article', 'competition', 'post'),
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category_id,
                ),
            ),
        );

        $items = get_posts($args);
//return $items ;

        if ($grouped == 1) {
            foreach ($items as $key => $item) {
                $item_id = $item->ID;
                $name = $item->post_title;
                $item_image = get_the_post_thumbnail($item_id);

                $ltr_group[] = substr($name, 0, 1);

                $items_arr[] = array(
                    "id" => $item_id,
                    "name" => $name,
                    "image" => $item_image
                );
            }

            foreach ($ltr_group as $key => $value) {
                $letter_arr[] = array(
                    "letter" => $value,
                    "total" => count($value)
                );
//echo $value;
            }
//return $ltr_group;
            $new_arr = array_count_values($ltr_group);
            foreach ($new_arr as $key => $value) {
                $letters_Arr_X[] = array(
                    "letter" => $key,
                    "total" => $value
                );
            }
//return $letters_Arr_X ;
            $result = array(
                "status" => true,
                "total" => count($ltr_group),
                "items" => $letters_Arr_X
            );
            return $result;
        } else {
            foreach ($items as $key => $item) {
                $item_id = $item->ID;
                $name = $item->post_title;
                $item_image = get_the_post_thumbnail($item_id);
                $items_arr[] = array(
                    "id" => $item_id,
                    "name" => $name,
                    "image" => $item_image
                );
            }
            $category = get_category($category_id);
//echo "here" ;die;
//print_r($category);die;
            $category_name = $category->name;
            $result = array(
                "status" => true,
                "category_name" => global_cairo360::filter_words(array('content' => $category_name, 'api' => true)),
                "total_items" => sizeof($items),
                "items" => $items_arr
            );
            return $result;
        }
    }

    /**
     * get posts with categories ids
     * get posts with cities ids
     * filter by post type
     * get posts with keyword in title or body of post
     * sort posts asc or desc
     * @author ahmed magdy <ahmed.magdi@brightcreations.com>
     * @param category , sort , city  , keyword
     * @return objects of items
     */
    function search(WP_REST_Request $request) {
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $keyword = ($request->get_param('keyword') == null) ? '' : $request->get_param('keyword');
        $filter = ($request->get_param('filter') == null) ? '' : $request->get_param('filter');
        $articles_url = ($request->get_param('articles') == null) ? '' : $request->get_param('articles');
        $category_ids = ($request->get_param('category') == null || $request->get_param('category') == '(null)') ? '' : $request->get_param('category');
//$limit = ($request->get_param('limit') == null) ? 5 : $request->get_param('limit');
//        $offset = ($request->get_param('page') == null ||  $request->get_param('page') == 0) ? 0 : $request->get_param('page');
        $sort = ($request->get_param('sort') == null) ? 'ASC' : $request->get_param('sort');
        $limit = 8;
        $section_ids = (!isset($_GET['section'])) ? '' : $_GET['section'];
        $cities_ids = (!isset($_GET['city'])) ? '' : $_GET['city'];
        $areas_ids = (!isset($_GET['area'])) ? '' : $_GET['area'];
        foreach ($areas_ids as $key => $area_id) {
            $areas_arr = $area_id;
            $cities_arr = array_merge($cities_ids, $areas_arr);
        }
        $offset = ($request->get_param('page') == null || $request->get_param('page') == 0) ? 0 : (( $request->get_param('page') == 1) ? 12 : ($request->get_param('page') * $limit + 4 ) );
        if ($offset == 0) {
            $limit = 12;
        }

        switch ($filter) {
            case 'film':
                $filter = "film";
                break;
            case 'venues':
                $filter = "venue";
                break;
            case 'music':
                $filter = "music";
                break;
            case 'dvd':
                $filter = "dvd";
                break;
            case 'book':
                $filter = "dvd";
                break;
            case 'event':
                $filter = "event";
                break;
            case 'article':
                $filter = "article";
                break;
            case 'competetion':
                $filter = "competetion";
                break;
            case 'post':
                $filter = "post";
                break;
            case 'everything':
            case '':
            default:
                $filter = array('venue', 'film', 'music', 'dvd', 'book', 'event', 'article');
                break;
        }

        if ((count(array_filter($category_ids)) == count($category_ids))) {
//            print_r($articles_url);
            if ($articles_url != '' && $articles_url != 1) {
                unset($filter);
                $filter = array('venue');
            } else if ($articles_url == 1) {
                unset($filter);
                $filter = array('venue', 'article');
            }
        }

        $args = array(
            'posts_per_page' => $limit,
            'offset' => $offset,
            's' => $keyword,
            'order' => $sort,
            'post_type' => $filter,
            'suppress_filters' => 0,
            'orderby' => 'post_title',
        );

        if ((count(array_filter($category_ids)) == count($category_ids)) ||
//                (count(array_filter($section_ids)) == count($section_ids)) ||
                (count(array_filter($cities_ids)) == count($cities_ids))
        ) {
            $args['tax_query'] = array('relation' => 'OR');
        }

        //if (!empty($category_ids)) {
// check if array not empty values
        if ((count(array_filter($category_ids)) == count($category_ids))) {
            // if there is section
            if ((count(array_filter($section_ids[$category_ids[0]])) == count($section_ids[$category_ids[0]]))) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
//                    'terms' => array_merge($category_ids, $section_ids[$category_ids[0]]),
                    'terms' => $section_ids[$category_ids[0]],
                );
            } else {

                $args['tax_query'][] = array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category_ids,
                );
            }
        }
//        if (!empty($cities_ids)) {

        if ((count(array_filter($cities_ids)) == count($cities_ids))) {
            $args['tax_query'][] = array(
                'taxonomy' => 'cities',
                'field' => 'term_id',
                'terms' => $cities_arr
            );
        }
//        print_r($args);

        $items = get_posts($args);
        $total = 0;
        foreach ($items as $key => $item) {
            $item_id = $item->ID;
            $name = $item->post_title;
            $item_image = !empty(wp_get_attachment_url(get_post_thumbnail_id($item_id))) ? wp_get_attachment_url(get_post_thumbnail_id($item_id)) : '';
            $rating = get_post_meta($item_id, 'film_rating', true);
            $images_arr = array(
                "original_url" => $item_image,
                "standard_rect_url" => '',
                "thumb_rect_url" => '',
                "list_rect_url" => ''
            );
            $is_cinema = 0;
            $categories = wp_get_object_terms($item_id, 'category');
            $category_item = $categories_id_array = array();
            if (!empty($categories)) {
                foreach ($categories as $k => $cat) {
                    $categories_id_array[] = $cat->term_id;
                    $category_item[$k]['id'] = $cat->term_id;
                    $category_item[$k]['name'] = global_cairo360::filter_words(array('content' => $cat->name, 'api' => true));
                }
            }


            if (get_post_type($item_id) == 'venue') {
                if (in_array(60, $categories_id_array) || in_array(250, $categories_id_array)) {
                    $is_cinema = 1;
                }
            }
            $items_arr[$key] = array(
                "id" => $item_id,
                "name" => global_cairo360::filter_words(array('content' => $name, 'api' => true)),
                "Images" => $images_arr,
                "Type" => $item->post_type,
                "Rating" => $rating,
                "item_id" => $item_id,
                "language" => $cur_lang,
                "is_cinema" => $is_cinema,
                "item_categories" => $category_item,
            );
            if (get_post_type($item_id) == 'event') {
                if (!empty(get_post_meta($item_id, 'event_start_datetime', true))) {
                    $start_date = get_post_meta($item_id, 'event_start_datetime', true);
                    $items_arr2 = array(
                        "start_date" => date('Y-m-d', strtotime($start_date)),
                        "start_time" => date('H:i:s', strtotime($start_date)),
                    );
                    $items_arr[$key] = array_merge($items_arr[$key], $items_arr2);
                }
            } else if (get_post_type($item_id) == 'article') {
                $items_arr_2 = array(
                    "description" => global_cairo360::filter_words(array('content' => $item->post_content, 'api' => true)),
                );
                $items_arr[$key] = array_merge($items_arr[$key], $items_arr_2);
            }
            $total ++;
        }

        if (empty($items_arr)) {
            $items_arr = array();
        }

        $result = array(
            "items" => $items_arr,
            "total" => $total,
        );
        return $result;
    }

    /**
     * Override the default upload path.
     *
     * @param   array   $dir
     * @return  array
     */
    function wpse_141088_upload_dirX($dir) {
        return array(
            'path' => $dir['basedir'] . '/mycustomdir',
            'url' => $dir['baseurl'] . '/mycustomdir',
            'subdir' => '/mycustomdir',
                ) + $dir;
    }

    /**
     * @desc Get Venues near by specific venue by latitude and longitude
     * @params [latitude,longitude,limit,offset,lang,keyword,categories_ids]
     * @return obj
     * @author Ereny Gamal <ereny.gamal@brightcreations.com>
     * * */
    function search_near_by_venue_all(WP_REST_Request $request) {
        //lat and lang default cairo
        $lat = ($request->get_param('latitude') == null) ? 30.0500 : $request->get_param('latitude');
        $lng = ($request->get_param('longitude') == null) ? 31.2333 : $request->get_param('longitude');
        $keyword = ($request->get_param('keyword') == null) ? '' : ' and p.post_title LIKE "%' . $request->get_param('keyword') . '%" ';
        $category_ids = ($request->get_param('categories_ids') == null) ? '' : $request->get_param('categories_ids'); //$request->get_param('category');
        $limit = ($request->get_param('limit') == null) ? 150 : $request->get_param('limit');
        $offset = ($request->get_param('offset') == null) ? 0 : $request->get_param('offset');

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');

        global $wpdb;
        $sql = "

                select p.ID, p.post_title, p.post_type, ((ACOS(SIN('$lat' * PI() / 180) * SIN(latitude.meta_value * PI() / 180) +
                COS('$lat' * PI() / 180) * COS(latitude.meta_value * PI() /180) * COS(('$lng' - longitude.meta_value) * PI() / 180))
                * 180 / PI()) * 60 * 1.1515) AS distance

                from wp_posts p
                left join wp_postmeta latitude on latitude.post_id = p.ID and latitude.meta_key = 'map_latitude'
                left join wp_postmeta longitude on longitude.post_id = p.ID and longitude.meta_key = 'map_longitude'
                LEFT JOIN wp_icl_translations ON p.ID = wp_icl_translations.element_id";

        if (!empty($category_ids)) {

            $sql .=" JOIN wp_term_relationships tr ON (p.ID = tr.object_id)
                     JOIN wp_term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)
                     JOIN wp_terms t ON (tt.term_id = t.term_id)";

            $and_sql = " AND tt.taxonomy = 'category'
                         AND t.term_id = '$category_ids' ";
        }
        $sql .= " where
                 p.post_type = 'venue'
                 AND
                 p.post_status = 'publish' " . $and_sql . "
                 AND
                 wp_icl_translations.language_code = '" . $cur_lang . "'"
                . "$keyword";
        $sql .= "  having
                   distance < 10 " . " Order by distance ASC  LIMIT $offset,$limit";

        $results = $wpdb->get_results($sql, OBJECT);

        foreach ($results as $key => $ven) {
            $id = $ven->ID;
            $name = $ven->post_title;
            $type = $ven->post_type;
            $venue_image = (!empty(wp_get_attachment_url(get_post_thumbnail_id($id)))) ? wp_get_attachment_url(get_post_thumbnail_id($id)) : '';
            $category_info = wp_get_object_terms($id, 'category');
            foreach ($category_info as $key => $value) {
                $category[$key]['name'] = $category_info[$key]->name;
                $category[$key]['id'] = $category_info[$key]->term_id;
            }
            $address_arr = get_post_meta($id, 'venue_addressline', true);
            $address = $address_arr[0];
            $venues_arr[] = array(
                "id" => $id,
                "name" => $name,
                "image" => $venue_image,
                "latitude" => get_post_meta($id, 'map_latitude', true),
                "longitude" => get_post_meta($id, 'map_longitude', true),
                "distance" => $ven->distance . ' KM',
                "branch" => $address,
                "type" => $type,
                "category" => $category,
            );
        }
        return empty($venues_arr) ? array(
            "status" => false,
            "status_msg" => 'No items found',
            "status_code" => 1021
                ) : $venues_arr;
    }

    function user_picture_update(WP_REST_Request $request) {


        $user_token = $request->get_param('user_token');
        $binary_img = $request->get_param('user_picture');

        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        require_once( ABSPATH . 'wp-admin/includes/admin.php' );



//return $binary_img ;

        if ($user_token == '' || empty($user_token)) {

            $false_arr = array(
                "status" => false,
                "status_msg" => "Required user token",
                "status_code" => 1021
            );
            return $false_arr;
        }

        if ($binary_img) {
            $binary_img = base64_decode(trim($binary_img));
        } else {
            $binary_img = @file_get_contents('php://input');
        }

        $map = array('image/png' => '.png', 'image/jpeg' => '.jpg', 'image/gif' => '.gif');

        $wp_upload_dir = wp_upload_dir();



//create obj from validator class
        $validator_obj = new validator();

//create obj from user class
        $user_obj = new user();

//user variables
        $user = $user_obj->get_user_data_by_token($user_token);
        $user_id = $user[0]->data->ID;

        $validate = $validator_obj->validate_user_token($user_token);

        $expire_date = get_user_meta($user_id, 'expire_date', true);

        $check_expire_date = $validator_obj->validate_expire_date($expire_date);


        if ($validate == true && $check_expire_date == true) {
            //$img_dir = $wp_upload_dir['path'] ;
            $img_dir = getcwd() . "/app/uploads/upme/";
            $img_name = md5(uniqid(mt_rand(), true));

            $img_info = new \finfo(FILEINFO_MIME_TYPE);
            $mtype = $img_info->buffer($binary_img);
            if ($map[$mtype] != '') {
                $img_format = $map[$mtype];
                $img_filename = $img_name . $img_format;
                $upload_url = get_home_url() . "/app/uploads/upme/" . $img_filename;


                //print_r($upload_url);die;
                file_put_contents($img_dir . $img_filename, $binary_img);
                update_user_meta($user_id, 'user_pic', $upload_url);
                update_user_meta($user_id, 'wsl_current_user_image', $upload_url);
            }

            $img_path = $img_dir . $img_filename;

            $first_name = get_user_meta($user_id, 'first_name', true);
            $last_name = get_user_meta($user_id, 'last_name', true);
            $birthdate = !empty(get_user_meta($user_id, 'birthdate', true)) ? get_user_meta($user_id, 'birthdate', true) : '0000-00-00';
            $gender = !empty(get_user_meta($user_id, 'gender', true)) ? get_user_meta($user_id, 'gender', true) : '';
            $privacy = get_user_meta($user_id, 'privacy', true);
            $newsletter = !empty(get_user_meta($user_id, 'newsletter', true)) ? get_user_meta($user_id, 'newsletter', true) : 0;
            $social = get_user_meta($user_id, 'social', true);
            $user_img = $this->get_user_image($user_id);


            if (empty($privacy)) {
                $privacy = "";
            }

            if (empty($social)) {
                $social = 0;
            }

            $linked_id = get_user_meta($user_id, 'linked_id', true);
            $social_provider = get_user_meta($user_id, 'social_provider', true);
            $social_id = get_user_meta($user_id, 'social_id', true);

            $args = array(
                'meta_key' => 'linked_id',
                'meta_value' => $user_id,
            );

            $users = get_users($args);
            foreach ($users as $key => $user) {

                $uid = $user->data->ID;
                $social_provider = get_user_meta($uid, 'social_provider', true);
                $social_id = get_user_meta($uid, 'social_id', true);

                $users_arr[] = array(
                    "uid" => (int) $uid,
                    "user_type" => "social",
                    "social_provider" => $social_provider,
                    "social_id" => $social_id
                );
            }

            if (empty($users_arr)) {
                $users_arr = array();
            }
            $user_arr = array(
                'uid' => $user[0]->data->ID,
                'email' => $user[0]->data->user_email,
                'display_name' => $user[0]->data->display_name,
                'first_name' => (string) $first_name,
                'last_name' => (string) $last_name,
                'birthdate' => $birthdate,
                'gender' => $gender,
                'newsletter' => (int) $newsletter,
                'created' => $user[0]->data->user_registered,
                'status' => $user[0]->data->user_status,
                'privacy' => $privacy,
                'picture' => $user_img,
                "social" => empty($social) ? 0 : (int) $social,
                'linked_id' => (int) $linked_id,
                'linked_socials' => $users_arr,
                'social_provider' => $social_provider,
                'social_id' => (int) $social_id,
            );

            $result = array(
                "status" => true,
                "status_message" => "Picture updated successfully",
                "status_code" => 1105,
                "user_token" => $user_token,
                "profile" => $user_arr
            );

            return $result;
        } else {

            $false_arr = array(
                "status" => false,
                "status_message" => "Invalid user token or expired",
                "status_code" => 1003
            );
            return $false_arr;
        }

        //uploads path
        // /opt/lampp/htdocs/workspaceX/cairo360_revamp/web/app/uploads/upme/1471870035_photo.jpg
    }

    /**
     * Get Mall Of Arabia Films Arabic and English from Cinema Venue ids 118160 - 124535
     */
    function get_mall_of_arabia_films(WP_REST_Request $request) {
        $id_en = '118789';
        $id_ar = '125401';
        $cinemaobj = new cinemas();

        if ($request->get_param('appKey') !== 'MOA'):
            $false_arr = array(
                "status" => false,
                "status_message" => "Invalid App Key",
                "status_code" => '400'
            );
            return $false_arr;
        endif;

        $enFilms = $cinemaobj->get_films_in_cinema(array('cinema_id' => $id_en, 'api' => true));

        $arFilms = $cinemaobj->get_films_in_cinema(array('cinema_id' => $id_ar, 'api' => true));

        $films = array_merge($enFilms, $arFilms);

        //get films in cinema

        $filmupdated = array();

        foreach ($films as $key => $film) {
            $lang = null;
            $related = null;
            $language = apply_filters('wpml_post_language_details', NULL, $film->ID);
            if ($language['language_code'] == 'en') {
                $related = icl_object_id($film->ID, 'film', false, 'ar');
                $lang = $language['language_code'] . '-US';
            } else {

                $lang = $language['language_code'] . '-AR';
            }
            $filmupdated[$key]['id'] = $film->ID;
            $filmupdated[$key]['name'] = $film->post_title;
            $filmupdated[$key]['image'] = (!empty(wp_get_attachment_url(get_post_thumbnail_id($film->ID)))) ? wp_get_attachment_url(get_post_thumbnail_id($film->ID)) : '';
           /// switch lang to get category in arabic
            $this->_switch_lang($language['language_code']);
            ////
            $filmupdated[$key]['film_id'] = $film->ID;
            $genres = wp_get_object_terms($film->ID, 'category');
            $genrearr = array();
            foreach ($genres as $genre) {
                $genrearr[] = global_cairo360::filter_words(array('content' => $genre->name, 'api' => true, 'lang' => $language['language_code']));
            }

            $filmupdated[$key]['genre'] = $genrearr;
            $starrings = wp_get_post_terms($film->ID, 'starrings');
            $stararr = array();
            foreach ($starrings as $star) {
                $stararr[] = $star->name;
            }
            $filmupdated[$key]['starring'] = $stararr;
            $directors = wp_get_post_terms($film->ID, 'directors');
            $dirarr = array();
            foreach ($directors as $director) {
                $dirarr[] = $director->name;
            }
            $filmupdated[$key]['directors'] = $dirarr;
            $writers = wp_get_post_terms($film->ID, 'screenwriters');
            $writerarr = array();
            foreach ($writers as $writer) {
                $writerarr[] = $writer->name;
            }
            $filmupdated[$key]['writers'] = $writerarr;

            $cinema_count = $cinemaobj->count_cinemas(array('movie_id' => $film->ID, 'api' => true));

            $filmupdated[$key]['showing_cinemas'] = $cinema_count;

            $en_showing_times = $cinemaobj->get_film_showing_times(array('movie_id' => $film->ID, 'cinema_id' => $id_en, 'api' => true));
            $ar_showing_times = $cinemaobj->get_film_showing_times(array('movie_id' => $film->ID, 'cinema_id' => $id_ar, 'api' => true));
            $films = array_merge($enFilms, $arFilms);

            if ($lang == 'en-US') {
                $filmupdated[$key]['showing_times'] = $en_showing_times;
            } else {
                $filmupdated[$key]['showing_times'] = $ar_showing_times;
            }

            $film_trailer = get_post_meta($film->ID, 'film_trailer_links', true);
            $filmupdated[$key]['youtube_url'] = $film_trailer;
            $filmupdated[$key]['url'] = get_permalink($film->ID);
            $filmupdated[$key]['about'] = get_post_meta($film->ID, 'film_synopsis', true);
            $filmupdated[$key]['image'] = (!empty(wp_get_attachment_url(get_post_thumbnail_id($film->ID)))) ? str_replace("//app", "/app", wp_get_attachment_url(get_post_thumbnail_id($film->ID))) : '';
            $filmupdated[$key]['related'] = $related;
            $filmupdated[$key]['lang'] = $lang;
            $filmupdated[$key]['created_at'] = $film->post_date;
            $filmupdated[$key]['updated_at'] = $film->post_modified;
        }

        return $result = $filmupdated;

//end get films
    }

    function get_article_by_film_id(WP_REST_Request $request) {
        $film_id = $request->get_param('id');

        if ($film_id == null && get_post_status($film_id) === false && get_post_status($film_id) != 'publish') {
            return null;
        } else {
            $articleobj = new articles();
            $article = $articleobj->get_articles_by_item_reviewed(array('post_id' => $film_id, 'api' => true));

            $article_details = null;
            if (!empty($article)) {
                $language = apply_filters('wpml_post_language_details', NULL, $film_id);

                if ($language['language_code'] == 'en') {
                    $related = icl_object_id($film_id, 'film', false, 'ar');
                    $lang = $language['language_code'] . '-US';
                } else {
                    $lang = $language['language_code'] . '-AR';
                }

//article_like_this_and_try
                $retrieve_tips = articles::cairo_reviews_api(array('article_id' => $article['id'], 'cur_lang' => $cur_lang));

                $article_details = array(
                    'film_id' => $film_id,
                    'title' => global_cairo360::filter_words(array('content' => $article['title'], 'api' => true)),
                    'body' => global_cairo360::filter_words(array('content' => $article['body'], 'api' => true)),
                    'image' => $article['image'],
                    'date' => $article['date'],
                    'rate' => (float) $article['rate'],
                    'best_bit' => (string) $retrieve_tips['best_bit'],
                    'worst_bit' => (string) $retrieve_tips['worst_bit'],
                    'cairo_tip' => (string) $retrieve_tips['cairo360_tip'],
                    'like_this' => (string) global_cairo360::filter_words(array('content' => $article['like_this'], 'api' => true)),
                    'created_at' => $article['created_at'],
                    'updated_at' => $article['updated_at'],
                    'lang' => $lang,
                );
            }
            return $article_details;
        }
    }

    function get_user_image($user_id) {
        $size = 60;
        $link = "";
        if (!empty(get_user_meta($user_id, 'user_pic', true))) {
            $link = get_user_meta($user_id, 'user_pic', true);
        } elseif (!empty(get_user_meta($user_id, 'wsl_current_user_image', true))) {
            $link = get_user_meta($user_id, 'wsl_current_user_image', true);
        } elseif (empty(get_user_meta($user_id, 'user_pic', true)) && empty(get_user_meta($user_id, 'wsl_current_user_image', true))) {
            $defaults = array(
// get_avatar_data() args.
                'size' => $size,
                'height' => "'.$size.'",
                'width' => "'.$size.'",
                'default' => get_option('avatar_default', 'mystery'),
                'force_default' => false,
                'rating' => get_option('avatar_rating'),
                'scheme' => null,
                'alt' => '',
                'class' => 'media-object',
                'force_display' => false,
                'extra_attr' => '',
            );
// $link = $user_id;

            $link = get_wp_user_avatar_src($user_id);
        }
        return $link;
    }

    function user_link_social(WP_REST_Request $request) {

        $user_token = $request->get_param('user_token');
//print_r($user_token);die;
        $social_provider = $request->get_param('social_provider');
        $social_id = $request->get_param('social_id');

        $email = $request->get_param('email');
        $display_name = $request->get_param('display_name');
        $first_name = $request->get_param('first_name');
        $last_name = $request->get_param('last_name');
        $birthdate = $request->get_param('birthdate');
        $gender = $request->get_param('gender');
        $newsletter = $request->get_param('newsletter');
        $privacy = $request->get_param('privacy');
        $profile_img_url = $request->get_param('profile_img_url');



        //create obj from validator class
        $validator_obj = new validator();

        //create obj from user class
        $user_obj = new user();

        //user variables
        $user = $user_obj->get_user_data_by_token($user_token);
        //print_r($user);die;
        $user_id = $user[0]->data->ID;
        //print_r($user_id);die;
        $validate = $validator_obj->validate_user_token($user_token);

        $expire_date = get_user_meta($user_id, 'expire_date', true);

        $check_expire_date = $validator_obj->validate_expire_date($expire_date);

        if ($validate == true && $check_expire_date == true) {

            $social = get_user_meta($user_id, 'social', true);

            //$social = get_user_meta($user_id, 'social', true);
            if ($social == 1) {

                $false_arr = array(
                    "status" => false,
                    "status_msg" => "Can't link between 2 social accounts",
                    "status_code" => 1069
                );

                return $false_arr;
            } else {


                $social_user = $user_obj->get_user_data_by_social_id($social_id);
                if ($social_user) {

                    //return "user exists" ;
                    $social_user_id = $social_user[0]->data->ID;
                    update_user_meta($social_user_id, 'linked_id', $user_id);
                } else {
                    // if link with the same email
                    $args_get_user = array('user_email' => $email);
                    $get_user = get_user_by('email', $email);
                    if (!empty($get_user)) {
                        update_user_meta($get_user->ID, 'first_name', $first_name);
                        update_user_meta($get_user->ID, 'last_name', $last_name);
                        update_user_meta($get_user->ID, 'birthdate', $birthdate);
                        update_user_meta($get_user->ID, 'gender', $gender);
                        update_user_meta($get_user->ID, 'newsletter', $newsletter);
                        update_user_meta($get_user->ID, 'privacy', $privacy);

                        add_user_meta($get_user->ID, 'social_id', $social_id);
                        update_user_meta($get_user->ID, 'social', 1);
                        add_user_meta($get_user->ID, 'social_provider', $social_provider);
                        update_user_meta($get_user->ID, 'linked_id', $user_id);
                    } else {
                        $new_user = array(
                            'user_email' => $email,
                            'user_login' => $first_name . $last_name,
                            'display_name' => $display_name,
                        );

                        $new_user_id = wp_insert_user($new_user);
                        //On success
                        if (!is_wp_error($new_user_id)) {
                            update_user_meta($new_user_id, 'first_name', $first_name);
                            update_user_meta($new_user_id, 'last_name', $last_name);
                            add_user_meta($new_user_id, 'birthdate', $birthdate);
                            add_user_meta($new_user_id, 'gender', $gender);
                            add_user_meta($new_user_id, 'newsletter', $newsletter);
                            add_user_meta($new_user_id, 'privacy', $privacy);

                            add_user_meta($new_user_id, 'social_id', $social_id);
                            add_user_meta($new_user_id, 'social', 1);
                            add_user_meta($new_user_id, 'social_provider', $social_provider);
                            update_user_meta($new_user_id, 'linked_id', $user_id);
                        } else {
                            $error_result = array(
                                "status" => false,
                                "status_message" => $new_user_id->get_error_message(),
                                "status_code" => 1056
                            );
                            return $error_result;
                            //return is_wp_error($user_id);
                        }
                    }
                }
            }

            $user_data = $user_obj->get_user_data_by_token($user_token);
            $user_id = $user_data[0]->data->ID;

            $email = $user_data[0]->data->user_email;
            $display_name = $user_data[0]->data->display_name;
            $created = $user_data[0]->data->user_registered;
            $status = $user_data[0]->data->user_status;

            //get user meta data
            $first_name = get_user_meta($user_id, 'first_name', true);
            $last_name = get_user_meta($user_id, 'last_name', true);
            $birthdate = get_user_meta($user_id, 'birthdate', true);
            $gender = get_user_meta($user_id, 'gender', true);
            $privacy = get_user_meta($user_id, 'privacy', true);
            $social = get_user_meta($user_id, 'social', true);
            $user_img = $this->get_user_image($user_id);

            $social_provider = get_user_meta($user_id, 'social_provider', true);
            $social_id = get_user_meta($user_id, 'social_id', true);

            $newsletter = get_user_meta($user_id, 'newsletter', true);
            $linked_id = get_user_meta($user_id, 'linked_id', true);

            if (empty($newsletter)) {
                $newsletter = "";
            }
            if (empty($privacy)) {
                $privacy = "";
            }
            if (empty($gender)) {
                $gender = "";
            }
            if (empty($first_name)) {
                $first_name = "";
            }
            if (empty($last_name)) {
                $last_name = "";
            }

            $args = array(
                'meta_key' => 'linked_id',
                'meta_value' => $user_id,
            );

            $users = get_users($args);
            foreach ($users as $key => $user) {

                $uid = $user->data->ID;
                $social_provider = get_user_meta($uid, 'social_provider', true);
                $social_id = get_user_meta($uid, 'social_id', true);


                $users_arr[] = array(
                    "uid" => (int) $uid,
                    "user_type" => "social",
                    "social_provider" => $social_provider,
                    "social_id" => $social_id
                );
            }

            if (empty($users_arr)) {
                $users_arr = array();
            }

            $result = array(
                "status" => true,
                "status_msg" => "User linked successfully",
                "status_code" => 1106,
                "user_token" => $user_token,
                "profile" => array(
                    "uid" => $user_id,
                    "email" => $email,
                    "display_name" => $display_name,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "birthdate" => $birthdate,
                    "gender" => $gender,
                    "newsletter" => (int) $newsletter,
                    "created" => $created,
                    "status" => (int) $status,
                    "privacy" => (int) $privacy,
                    "picture" => $user_img,
                    "social" => (int) $social,
                    "linked_id" => (int) $linked_id,
                    "linked_socials" => $users_arr
                )
            );

            return $result;
        } else {
            $false_arr = array(
                "status" => false,
                "status_message" => "Invalid user token or expired",
                "status_code" => 1003
            );
            return $false_arr;
        }
    }

    function user_unlink_social(WP_REST_Request $request) {
        $user_token = $request->get_param('user_token');

        //print_r($user_token);die;
        //$social_provider = $request->get_param('social_provider');
        $social_id = $request->get_param('social_id');
        $social_provider = $request->get_param('social_provider');

        //print_r($request->get_param('social_provider'));die;
        //create obj from validator class
// ($user_token == '' || empty($user_token))
        // if (empty($social_id)) {
        //   print_r("spcial emty");die;
        // }



        if (empty($social_id)) {
            $false_arr = array(
                "status" => false,
                "status_message" => "User not exist ",
                "status_code" => 1066
            );
            return $false_arr;
        }


        if (empty($social_provider)) {
            $false_arr = array(
                "status" => false,
                "status_message" => "User not exist ",
                "status_code" => 1066
            );
            return $false_arr;
        }

        $validator_obj = new validator();

        //create obj from user class
        $user_obj = new user();

        //user variables
        $user = $user_obj->get_user_data_by_token($user_token);
        //print_r($user);die;
        $user_id = $user[0]->data->ID;
        //print_r($user_id);die;
        $validate = $validator_obj->validate_user_token($user_token);

        $expire_date = get_user_meta($user_id, 'expire_date', true);

        $check_expire_date = $validator_obj->validate_expire_date($expire_date);

        if ($validate == true && $check_expire_date == true) {
            $social_user = $user_obj->get_user_data_by_social_id($social_id);

            //print_r($social_user);die;
            if ($social_user) {
                $social_user_id = $social_user[0]->data->ID;
                //print_r($social_user_id);die;
                update_user_meta($social_user_id, 'linked_id', 0);

                $user_data = $user_obj->get_user_data_by_token($user_token);
//print_r($user_data[0]->data->ID);die;
//print_r($user_data);die;

                $user_id = $user_data[0]->data->ID;

                $email = $user_data[0]->data->user_email;
                $display_name = $user_data[0]->data->display_name;
                $created = $user_data[0]->data->user_registered;
                $status = $user_data[0]->data->user_status;

//get user meta data
                $first_name = get_user_meta($user_id, 'first_name', true);
                $last_name = get_user_meta($user_id, 'last_name', true);
                $birthdate = get_user_meta($user_id, 'birthdate', true);
                $gender = get_user_meta($user_id, 'gender', true);
                $privacy = get_user_meta($user_id, 'privacy', true);
                $social = get_user_meta($user_id, 'social', true);
                $user_img = $this->get_user_image($user_id);

                $social_provider = get_user_meta($user_id, 'social_provider', true);
                $social_id = get_user_meta($user_id, 'social_id', true);

                $newsletter = get_user_meta($user_id, 'newsletter', true);
                $linked_id = get_user_meta($user_id, 'linked_id', true);

                if (empty($newsletter)) {
                    $newsletter = "";
                }
                if (empty($privacy)) {
                    $privacy = "";
                }
                if (empty($gender)) {
                    $gender = "";
                }
                if (empty($first_name)) {
                    $first_name = "";
                }
                if (empty($last_name)) {
                    $last_name = "";
                }

                $args = array(
                    'meta_key' => 'linked_id',
                    'meta_value' => $user_id,
                );

                $users = get_users($args);

                //print_r($users);die;
                //  print_r($users[0]->data->ID);die;


                foreach ($users as $key => $user) {

                    $uid = $user->data->ID;
//print_r($uid);die;
                    $social_provider = get_user_meta($uid, 'social_provider', true);
                    $social_id = get_user_meta($uid, 'social_id', true);


                    $users_arr[] = array(
                        "uid" => (int) $uid,
                        "user_type" => "social",
                        "social_provider" => $social_provider,
                        "social_id" => $social_id
                    );
                }

                if (empty($users_arr)) {
                    $users_arr = array();
                }


                $result = array(
                    "status" => true,
                    "status_msg" => "User unlinked successfully",
                    "status_code" => 1107,
                    "profile" => array(
                        "uid" => $user_id,
                        "email" => $email,
                        "display_name" => $display_name,
                        "first_name" => $first_name,
                        "last_name" => $last_name,
                        "birthdate" => $birthdate,
                        "gender" => $gender,
                        "newsletter" => (int) $newsletter,
                        "created" => $created,
                        "status" => (int) $status,
                        "privacy" => (int) $privacy,
                        "picture" => $user_img,
                        "social" => (int) $social,
                        "linked_id" => (int) $linked_id,
                        "linked_socials" => $users_arr
                    )
                );

                return $result;
            }
            //if (!$social_user || empty($social_id ) || $social_provider == ""){
            else {
                $false_arr = array(
                    "status" => false,
                    "status_message" => "User not exist",
                    "status_code" => 1066
                );
                return $false_arr;
                //print_r("not exist");die;
            }
        } else {
            $false_arr = array(
                "status" => false,
                "status_message" => "Invalid user token or expired",
                "status_code" => 1003
            );
            return $false_arr;
        }

        //return $user_token ;
    }

//end api
}
