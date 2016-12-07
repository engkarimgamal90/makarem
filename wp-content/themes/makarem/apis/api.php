<?php

class api {

    function __construct() {

        // APIs routes
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v2', '/test/', array(
                'methods' => 'GET',
                'callback' => array($this, 'test_func'),
            ));
        });

        add_action('rest_api_init', function () {
            register_rest_route('webservice/v2', '/editProfile/', array(
                'methods' => 'POST',
                'callback' => array($this, 'edit_profile'),
            ));
        });
        //userLogin
        add_action('rest_api_init', function () {
            register_rest_route('webservice/v1', '/userLogin/', array(
                'methods' => 'GET',
                'callback' => array($this, 'user_login'),
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
     * Test wp rest api
     *
     * @author Karim Gamal
     */

    function test_func(WP_REST_Request $request) {
        // die("here");
        return "hello inside test inside api class" ;
    }


    /**
     * Test wp rest api
     *
     * @param nothing yet
     * @return nothing
     * @author Ahmed Magdy
     */

    function edit_profile(WP_REST_Request $request) {
        // die("here");
        $username = $request->get_param('username');
        $password = $request->get_param('password');
        $age = $request->get_param('age');
        $gender = $request->get_param('gender');

        $result = array(
          "username"=> $username,
          "password"=> $password,
          "age" => $age ,
          "gender" => $gender
        );

        $result = array(
          "status" => true,
          "status_message" => "User data updated successfully",
          "status_code" => 200,
        );

        return $result;

    }


    
    


}
