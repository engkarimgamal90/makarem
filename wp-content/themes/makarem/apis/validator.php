<?php

/**
 *
 */
class validator
{

  function __construct()
  {

  }


  public static function init() {
      static $instance = false;
      if (!$instance) {
          $instance = new validator();
      }
      return $instance;
  }

  public static function check_email_exist($email){

      $args = array(
          // Search for email address
          'search' => $email,
          // Search the `email` field only.
          'search_columns' => array( 'user_email' ),
          // Return the `email` field only.
          'fields' => 'user_email'
      );

      $user_query = new WP_User_Query( $args );
      // User Loop
      if ( empty( $user_query->results ) ) {
            //user doesnt exist
            return true ;
      } else {
            //user exist
            return false ;
      }

  }


  //check if valid email address
  public function check_valid_email_address($email) {

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //echo "Invalid email format";
      return false ;
    }else{
      //echo "valid";
      return true ;
    }
  }

  //check if user sent token is right or wrong
  public function validate_user_token($user_token){

    $args = array(
      'meta_key'     => 'access_token' ,
      'meta_value'   => $user_token ,
    );

    $user = get_users($args);

    if($user){
      return true ;
    }else {
      return false ;
    }

  }


  function validate_expire_date($input_time){  
      if ($input_time > time()){
         // still valid not expired
         return true ;
      }else {
        // expired
        return false ;
      }
  }


}
