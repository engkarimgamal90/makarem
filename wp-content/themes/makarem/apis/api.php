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

            // ---------------------- Cities & countries  ----------------------
            register_rest_route('webservice/v1', '/countries_cities/', array(
                'methods' => 'POST',
                'callback' => array($this, 'countries_cities'),
            ));
            register_rest_route('webservice/v1', '/cities/', array(
                'methods' => 'POST',
                'callback' => array($this, 'cities'),
            ));
            // ------------------- Rooms & reservations  -------------------
            register_rest_route('webservice/v1', '/rooms_search/', array(
                'methods' => 'POST',
                'callback' => array($this, 'rooms_search'),
            ));
            // ---------------------- Reservation  ----------------------
            register_rest_route('webservice/v1', '/reservation/', array(
                'methods' => 'POST',
                'callback' => array($this, 'reservation'),
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
    function check_time_available($hotel_id,$checkin_time,$checkout_time){
        $hotel_checkin  = get_post_meta($hotel_id,'hotel_check_in',true);
        $hotel_checkout = get_post_meta($hotel_id,'hotel_check_out',true);
        
        if(strtotime($checkin_time) >= strtotime($hotel_checkin) && 
            strtotime($checkin_time) <= strtotime($hotel_checkout) && 
            strtotime($checkout_time) <= strtotime($hotel_checkout) &&
            strtotime($checkout_time) >= strtotime($hotel_checkin)
            ){
            return true;
        }
        return false;
    }
//**********************************************************************************************************************
//**********************************************************************************************************************

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
            echo $city_id;
            // get branches by city
            $branch_args = array(
                'post_type' => 'branch',
                'posts_per_page' => -1,
                'orderby' => 'post_date',
                'order' => 'ASC',
                'post_status' => 'publish',
                'suppress_filters' => 0,
                'meta_query'=>array(array(
                    'key'     => 'branch_city',
                    'value'   => $city_id,
                ))
            );
            $branches_posts = get_posts($branch_args);
            $city_hotel_ids = array(0);
            foreach ($branches_posts as  $branch) {
                $city_hotel_ids[] = get_post_meta($branch->ID,'branch_hotel',true);
            }
            $args['post__in']= $city_hotel_ids;
            
            
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
            return $this->send_response($result,__('Countries data retrieved successfully','mk_api'));
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

    function rooms_search(WP_REST_Request $request){
        $cur_lang = ($request->get_param('lang') == null) ? 'en' : $request->get_param('lang');
        $this->_switch_lang($cur_lang);

        $city_id        = $request->get_param('city_id');
        $hotel_id       = $request->get_param('hotel_id');
        $checkin_time   = $request->get_param('checkin_time');
        $checkout_time  = $request->get_param('checkout_time');
        $num_of_adults    = $request->get_param('num_of_adults');
        if(empty($hotel_id)){
            return $this->send_error(422,__('You must send a hotel id','mk_api'));
        }
        $hotel_data = get_post($hotel_id);
        if($hotel_data->post_type!='hotel'){
            return $this->send_error(422,__('You must send a hotel id','mk_api'));
        }
        if(empty($checkin_time)){
            return $this->send_error(422,__('You must send Check in time','mk_api'));
        }
        if(empty($checkout_time)){
            return $this->send_error(422,__('You must send Check out time','mk_api'));
        }
        if(empty($num_of_adults)){
            return $this->send_error(422,__('You must send number of adults','mk_api'));
        }

        if(!$this->check_time_available($hotel_id,$checkin_time,$checkout_time)){
            return $this->send_error(422,__('Your checkin/checkout time does not on the hotel times','mk_api'));
        }

        $room_args = array(
            'post_type' => 'room',
            'posts_per_page' => -1,
            'orderby' => 'post_date',
            'order' => 'ASC',
            'post_status' => 'publish',
            'suppress_filters' => 0,
            'meta_query'=>array(
                'relation' => 'AND',
                array(
                    'key'     => 'room_hotel',
                    'value'   => $hotel_id,
                    'compare' => '='
                ),
                array(
                    'key'     => 'room_num_of_beds',
                    'value'   => $num_of_adults,
                    'compare' => '='
                )
            )
        );
        $rooms_posts = get_posts($room_args);
        $result = array();
        foreach ($rooms_posts as  $room_data) {
            $room = array(
                        "id"        => $room_data->ID,
                        "title"     => $room_data->post_title,
                        "content"   => $room_data->post_content,
                        "image"     => $this->get_single_image($room_data->ID,"room_image",true),
                        );
            $room_packages = get_post_meta($room_data->ID,"room_package");
            $packages = array();
            foreach ($room_packages as $room_package) {
                $package_data = get_post($room_package);
                $packages[]=array(
                            "id"        => $package_data->ID,
                            "title"     => $package_data->post_title,
                            "content"   => $package_data->post_content,
                            "price"     => get_post_meta($package_data->ID,'package_price',true),
                             );
            }
            if(!empty($packages)){
                $room["packages"]=$packages;
            }
            $result[]=$room;           
        }
        $rooms_list['rooms'] = $result;
        return $this->send_response($rooms_list,__('Rooms retrieved successfully','mk_api'));
        
    }

    //----
    function reservation(WP_REST_Request $request){
        $room_id        = $request->get_param('room_id');
        $package_id     = $request->get_param('package_id');
        
        if(empty($room_id)){
            return $this->send_error(422,__('You must send a room','mk_api'));
        }
        $room_data = get_post($room_id);
        if($room_data->post_type!='room'){
            return $this->send_error(422,__('You must send a room','mk_api'));
        }

        if(empty($package_id)){
            return $this->send_error(422,__('You must send a package','mk_api'));
        }
        $package_data = get_post($package_id);
        if($package_data->post_type!='package'){
            return $this->send_error(422,__('You must send a package','mk_api'));
        }

        
        $room_hotel  = get_post_meta($room_id,'room_hotel',true);
        $hotel_email = get_post_meta($room_hotel,'hotel_email',true);
        if(empty($hotel_email)){
            return $this->send_error(422,__('The hotel must have an email.','mk_api'));
        }

        $to = 'eng.karimgamal90@gmail.com';
        $subject = 'New reservation';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        
        $body = 'Room title: ' .$room_data->post_title.'<br>';
        $body .= 'Room description: '.$room_data->post_content.'<br>';
        $body .= 'Room beds: '.get_post_meta($room_data->ID,'room_num_of_beds',true).'<br>';
        $body .= 'Hotel: '.get_the_title(get_post_meta($room_data->ID,'room_hotel',true)).'<br>';
        $body .= 'Package name: '.$package_data->post_title.'<br>';
        $body .= 'Package description: '.$package_data->post_content.'<br>';
        $body .= 'Package price: '.get_post_meta($package_data->ID,'package_price',true).'<br>';
        
        $all_parameters = $request->get_params(); 
        foreach ($all_parameters as $key => $value) {
            if(!in_array($key, array('room_id','package_id'))){
                $handled_key = ucwords(str_replace("_", " ", $key) );
                $body .= $handled_key.': '.$value.'<br>';
            }
        }
        wp_mail( $to, $subject, $body, $headers );
        return $this->send_response(true,__('The reservation has been succeed','mk_api'));

    }

    



    
    


}
