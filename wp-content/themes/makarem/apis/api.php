<?php

class api {

    function __construct() {

        // APIs routes
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/test/', array(
                'methods' => 'GET',
                'callback' => array($this, 'test_func'),
            )); 
            // ---------------------- Hotels ----------------------
            register_rest_route('webservice/v1', '/hotels/', array(
                'methods' => 'POST',
                'callback' => array($this, 'hotels_list'),
            ));
            register_rest_route('webservice/v1', '/hotel_data/', array(
                'methods' => 'POST',
                'callback' => array($this, 'hotel_data'),
            ));

            register_rest_route('webservice/v1', '/countries_cities/', array(
                'methods' => 'POST',
                'callback' => array($this, 'countries_cities'),
            ));
            register_rest_route('webservice/v1', '/cities/', array(
                'methods' => 'POST',
                'callback' => array($this, 'cities'),
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
    
    function send_response($data,$msg){
        return array("data"=>$data,"message"=>$msg);
    }

    function send_error($error_code,$msg){
        // The server throws an error (500)
        // Authentication failure (401)
        // The resource requested was not found (404)
        // Validation errors when saving data (422)
        // Empty data (414)
        return array("error"=>$error_code,"message"=>$msg);
    }

    function _switch_lang($cur_lang) {

        global $sitepress;
        $default = $sitepress->get_default_language(); //get the default language.
        $langs = array_keys(icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str')); 
        if (!in_array($cur_lang, $langs)) {
            $cur_lang = $default; 
        }
        $sitepress->switch_lang($cur_lang);
    }

    function get_single_image($post_id,$custom_key,$single=false){
        if($single){
            $attachment_id = get_post_meta($post_id,$custom_key,true);
            $image_object = wp_get_attachment_image_src($attachment_id,'full');
            return $image_object[0];
        }else{
            $result = array();
            $attachment_ids = get_post_meta($post_id,$custom_key);
            foreach ($attachment_ids as $key => $attachment_id) {
                $image_object = wp_get_attachment_image_src($attachment_id,'full');
                $result[]=$image_object[0];
            }
            return $result;
        }
        return false;
    }
//************************************************************************************************************************
//************************************************************************************************************************

    /**
     * Test wp rest api
     * @author Karim Gamal
     */

    function test_func(WP_REST_Request $request) {
        // die("here");
        return "hello inside test inside api class" ;
    }

    /**
     * Hotels list
     * @author Karim Gamal
     */
    function hotels_list(WP_REST_Request $request) {

        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);
        $args = array(
            'post_type' => 'hotel',
            'posts_per_page' => -1,
            'orderby' => 'post_date',
            'order' => 'ASC',
            'post_status' => 'publish',
            'suppress_filters' => 0,
        );
        if(!empty($request->get_param('city_id'))){
            $city_id = $request->get_param('city_id');
            $args['meta_query']= array(array(
                'key'     => 'hotel_city',
                'value'   => $city_id,
            ));
        }
        $hotels_posts = get_posts($args);

        if(empty($hotels_posts)){
            return $this->send_error(414,__('Empty data','mk_api'));
        }else{
            $hotels = array();
            foreach ($hotels_posts as $key => $value) {
                
                $hotels[] = array(
                            "id"        => $value->ID,
                            "title"     => $value->post_title,
                            "content"   => $value->post_content,
                            "date"      => $value->post_date,
                            "image"      => $this->get_single_image($value->ID,"hotel_logo",true),
                            );
            }
            $hotels_list['hotels'] = $hotels;
            return $this->send_response($hotels_list,__('Hotels retrieved successfully','mk_api'));
        }
        return $this->send_error(500,__('Unexpected error','mk_api'));
    }

    /**
     * Hotel data
     * @author Karim Gamal
     */
    function hotel_data(WP_REST_Request $request) {

        if(empty($request->get_param('hotel_id'))){
            return $this->send_error(422,__('You must send a hotel id','mk_api'));
        }else{
            $hotel_data = get_post($request->get_param('hotel_id'));
            if($hotel_data->post_type == "hotel"){
                $hotel = array(
                                "id"        => $hotel_data->ID,
                                "title"     => $hotel_data->post_title,
                                "content"   => $hotel_data->post_content,
                                "date"      => $hotel_data->post_date,
                                "logo"      => $this->get_single_image($hotel_data->ID,"hotel_logo",true),
                                "banner"    => $this->get_single_image($hotel_data->ID,"hotel_banner",true),
                                "gallery"   => $this->get_single_image($hotel_data->ID,"hotel_gallery"),
                                "checkin"   => get_post_meta($hotel_data->ID,'hotel_check_in',true),
                                "checkout"  => get_post_meta($hotel_data->ID,'hotel_check_out',true),
                                "address"   => get_post_meta($hotel_data->ID,'hotel_address',true),
                                "latitude"  => get_post_meta($hotel_data->ID,'hotel_latitude',true),
                                "longitude" => get_post_meta($hotel_data->ID,'hotel_longitude',true),
                                "phone"     => get_post_meta($hotel_data->ID,'hotel_phone',true),
                                "fax"       => get_post_meta($hotel_data->ID,'hotel_fax',true),
                                "email"     => get_post_meta($hotel_data->ID,'hotel_email',true),
                                "details"   => get_post_meta($hotel_data->ID,'hotel_details',true),
                                );
                                
                                $city_id    = get_post_meta($hotel_data->ID,'hotel_city',true);
                                $hotel['city'] = array("id"=>$city_id,'title'=>get_the_title($city_id));

                                $branch_args = array(
                                        'post_type' => 'branch',
                                        'posts_per_page' => -1,
                                        'orderby' => 'post_date',
                                        'order' => 'ASC',
                                        'post_status' => 'publish',
                                        'suppress_filters' => 0,
                                        'meta_query'=>array(array(
                                            'key'     => 'branch_hotel',
                                            'value'   => $hotel_data->ID,
                                        ))
                                    );
                                $branches_posts = get_posts($branch_args);
                                // print_r($branches_posts);
                                foreach ($branches_posts as $key => $branch) {
                                    $branch_data[] = array(
                                            "id"        => $branch->ID,
                                            "title"     => $branch->post_title,
                                            "address"   => get_post_meta($branch->ID,'branch_address',true),
                                            "latitude"  => get_post_meta($branch->ID,'branch_latitude',true),
                                            "longitude" => get_post_meta($branch->ID,'branch_longitude',true),
                                            "city"      => array("id"=>get_post_meta($branch->ID,'branch_city',true),
                                                                'title'=>get_the_title(get_post_meta($branch->ID,'branch_city',true))),
                                        ); 
                                }
                                if(!empty($branch_data)){
                                    $hotel['branches'] = $branch_data;
                                }

                return $this->send_response($hotel,__('Hotel data retrieved successfully','mk_api'));

            }else{
                return $this->send_error(422,__('You must send a hotel id','mk_api'));
            }
        }
        return $this->send_error(500,__('Unexpected error','mk_api'));
    }

    function countries_cities(WP_REST_Request $request) {
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);
        $args = array(
            'post_type' => 'region',
            'posts_per_page' => -1,
            'orderby' => 'post_date',
            'order' => 'ASC',
            'post_status' => 'publish',
            'post_parent' => 0,
            'suppress_filters' => 0,
        );
        $countries = get_posts($args);
        if(!empty($countries)){
            $result = array();
            foreach ($countries as $key => $value) {
                $args = array(
                    'post_parent' => $value->ID,
                    'post_type'   => 'region', 
                    'numberposts' => -1,
                    'post_status' => 'publish' 
                );
                $cities = get_children( $args );
                $country_data = array("id"=>$value->ID,"title"=>$value->post_title);
                foreach ($cities as $k => $v) {
                    $country_data['cities'][] = array("id"=>$v->ID,"title"=>$v->post_title);
                }
                $result[]=$country_data;
            }
            return $this->send_response($result,__('Cities data retrieved successfully','mk_api'));
        }else{
            return $this->send_error(414,__('Empty data','mk_api'));
        }
    }

    function cities(WP_REST_Request $request) {
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);
        $args = array(
            'post_type' => 'region',
            'posts_per_page' => -1,
            'orderby' => 'post_date',
            'order' => 'ASC',
            'post_status' => 'publish',
            'post_parent__not_in' => array(0),
            'suppress_filters' => 0,
        );
        $cities = get_posts($args);
        if(!empty($cities)){
            $result = array();
            foreach ($cities as $key => $value) {
               $result[]=array("id"=>$value->ID,"title"=>$value->post_title);
            }
            $all_cities['cities'] = $result;
            return $this->send_response($all_cities,__('Cities data retrieved successfully','mk_api'));
        }else{
            return $this->send_error(414,__('Empty data','mk_api'));
        }
    }

    



    
    


}
