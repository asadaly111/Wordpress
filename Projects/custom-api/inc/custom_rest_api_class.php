<?php
class Custom_customapi extends WP_REST_Controller {

      function __construct(){
            add_action( 'rest_api_init', array($this , 'register_routes') );
      }
      
      /**
      * Register the routes for the objects of the controller.
      */
      public function register_routes() {
            $version = '1';
            $namespace = 'custom/v' . $version;

            register_rest_route( $namespace, '/general-data',  array(
                  'methods'             => WP_REST_Server::READABLE,
                  'callback'            => array( $this, 'get_app_data_' ),
                  'permission_callback' => '',
                  'args'                => array()
            )
            );


            register_rest_route( $namespace, '/donation',  array(
                  'methods'             => WP_REST_Server::EDITABLE,
                  'callback'            => array( $this, 'donation_func' ),
                  'permission_callback' => '',
                  'args'                => array(
                        'email' => array('required' => true),
                  )
            )
            );

          register_rest_route( $namespace, '/prayer-category',  array(
                  'methods'             => WP_REST_Server::READABLE,
                  'callback'            => array( $this, 'prayer_category' ),
                  'permission_callback' => '',
                  'args'                => array()
              )
          );

          register_rest_route( $namespace, '/prayer-request',  array(
                  'methods'             => WP_REST_Server::EDITABLE,
                  'callback'            => array( $this, 'prayer_request' ),
                  'permission_callback' => '',
                  'args'                => array(
                  )
              )
          );


          register_rest_route( $namespace, '/get-filtered-product',  array(
                  'methods'             => WP_REST_Server::READABLE,
                  'callback'            => array( $this, 'get_filtered_product' ),
                  'permission_callback' => '',
                  'args'                => array(
                      'email' => array('required' => true),
                  )
              )
          );


          register_rest_route( $namespace, '/order-payment',  array(
                  'methods'             => WP_REST_Server::EDITABLE,
                  'callback'            => array( $this, 'order_payment' ),
                  'permission_callback' => '',
                  'args'                => array(
                      'email' => array('required' => true),
                  )
              )
          );

      }

      public function get_app_data_(){
          global $controler;
          $giving_levels       = dgx_donate_get_giving_levels ();
          $data['donation_level'] = $giving_levels;
          $pages = $controler->get_app_data();
          $data['data'] = $pages->data;
         return new WP_REST_Response($data, 200 );
      }
      public function donation_func(){

      }
      public function prayer_category(){
          $data = unserialize(get_option( '_wpe_prayer_engine_settings' ));
          $chck = (! empty( $data['wpe_categorylist'] )) ? $data['wpe_categorylist'] : 'Deliverance,Generational Healing,Inner Healing,Physical Healing,Protection,Relationships,Salvation,Spiritual Healing';
          $chck = explode(',', $chck);
          return new WP_REST_Response($chck, 200 );
      }
      public function prayer_request($request){

          $prayer_author_name = $request['prayer_author_name'];
          $prayer_author_email = $request['prayer_author_email'];
          $request_type = $request['request_type'];
          $prayer_category = $request['prayer_category'];
          $prayer_country = $request['prayer_country'];
          $prayer_title = $request['prayer_title'];
          $prayer_messages = $request['prayer_messages'];

              if (isset($prayer_messages)) {
                  $data['prayer_messages'] = wp_unslash($prayer_messages);
              }

              $data['prayer_title'] = sanitize_text_field(wp_unslash($prayer_title));
              $data['prayer_author'] = get_current_user_id();
              $data['prayer_status'] = 'approved';
              $lxt_options = get_option('_wpe_prayer_engine_settings');
              $lxt_options = unserialize($lxt_options);
              if ( ! empty($lxt_options) && array_key_exists('wpe_disapprove_prayer_default', $lxt_options)) {
                  $data['prayer_status'] = (filter_var($lxt_options['wpe_disapprove_prayer_default'],
                      FILTER_VALIDATE_BOOLEAN)) ? 'pending' : 'approved';
              }
              $data['prayer_author_email'] = (isset($prayer_author_email)) ? sanitize_text_field(wp_unslash($prayer_author_email)) : '';
              $data['prayer_author_name'] = sanitize_text_field(wp_unslash($prayer_author_name));

              if (isset($prayer_country)) {
                  $data['prayer_country'] = wp_unslash($prayer_country);
              }

              if (isset($prayer_category)) {
                  $categorykey = sanitize_text_field(wp_unslash($prayer_category));
                  $categorylist = (isset($lxt_options['wpe_categorylist']) and ! empty($lxt_options['wpe_categorylist'])) ? $lxt_options['wpe_categorylist'] : 'Deliverance,Generational Healing,Inner Healing,Physical Healing,Protection,Relationships,Salvation,Spiritual Healing';

                  $select_category = explode(",", $categorylist);
                  $data['prayer_category'] = $select_category[$categorykey];
              }

              $data['prayer_time'] = date('Y-m-d H:i:s');
              $data['request_type'] = sanitize_text_field(wp_unslash($request_type));
              if ($entityID > 0) {
                  $where[$this->unique] = $entityID;
              } else {
                  $where = '';
              }
              global $wpdb;
              $result = FlipperCode_Database::insert_or_update($wpdb->prefix."prayer_engine", $data, $where);
              if (false === $result) {
                  return new WP_Error( 'error', __( 'Something went wrong. Please try again.'));
              } elseif ($entityID > 0) {
                  return new WP_REST_Response( 'Prayer updated successfully', 200 );
              } else {
                  $settings = unserialize(get_option('_wpe_prayer_engine_settings'));
                  if ($settings['wpe_send_email'] == 'true') {
                      $headers = array('Content-Type: text/html; charset=UTF-8');
                      if ($data['prayer_author_email'] != '') {
                          $to = $data['prayer_author_email'];
                      } elseif ($data['prayer_author'] != '') {
                          $prayer_author_info = get_userdata($data['prayer_author']);
                          $to = $prayer_author_info->user_email;
                      }
                      if ( ! empty($to)) {
                          $email_settings = unserialize(get_option('_wpe_prayer_engine_email_settings'));
                          add_filter('wp_mail_from', array($this, 'website_email'));
                          add_filter('wp_mail_from_name', array($this, 'website_name'));
                          //return $response['success']=$this->website_name('');
                          $body = '';
                          if ($data['request_type'] == 'prayer_request') {
                              $subject = (isset($email_settings['wpe_email_req_subject']) and ! empty($email_settings['wpe_email_req_subject'])) ? $email_settings['wpe_email_req_subject'] : 'Prayer request confirmation';
                              if (isset($email_settings['wpe_email_req_messages']) AND ! empty($email_settings['wpe_email_req_messages'])) {
                                  $body = $email_settings['wpe_email_req_messages'];
                                  $body = str_replace(array(
                                      '{prayer_author_name}',
                                  ), array(
                                      $data['prayer_author_name'],
                                  ), $body);
                              } else {
                                  $body = 'Hello '.$data['prayer_author_name'].', <br> <p>Thank you for submitting your ';
                                  $body .= 'prayer request';
                                  $body .= '. We welcome all requests and we delight in lifting you and your requests up to God in prayer. God Bless you, and remember, God knows the prayers that are coming and hears them even before they are spoken.<br /><br />Blessings,<br/ >Prayer Team</p>';
                              }
                          } else {
                              $subject = (isset($email_settings['wpe_email_praise_subject']) and ! empty($email_settings['wpe_email_praise_subject'])) ? $email_settings['wpe_email_praise_subject'] : 'Praise report confirmation';
                              if (isset($email_settings['wpe_email_praise_messages']) AND ! empty($email_settings['wpe_email_praise_messages'])) {
                                  $body = $email_settings['wpe_email_praise_messages'];
                                  $body = str_replace(array(
                                      '{prayer_author_name}',
                                  ), array(
                                      $data['prayer_author_name'],
                                  ), $body);
                              } else {
                                  $body = 'Hello '.$data['prayer_author_name'].', <br> <p>Thank you for submitting your ';
                                  $body .= 'praise report';
                                  $body .= '. We welcome all requests and we delight in lifting you and your requests up to God in prayer. God Bless you, and remember, God knows the prayers that are coming and hears them even before they are spoken.<br /><br />Blessings,<br/ >Prayer Team</p>';
                              }
                          }
                          wp_mail($email_settings['prayer_req_admin_email'], $subject, $body, $headers);
                      }
                  }
                  if ($settings['wpe_send_admin_email'] == 'true') {
                      if ($settings['wpe_send_email'] == 'false') {
                          add_filter('wp_mail_from', array($this, 'website_email'));
                      }
                      add_filter('wp_mail_from_name', array($this, 'website_name'));
                      $email_settings = unserialize(get_option('_wpe_prayer_engine_email_settings'));
                      $headers = array('Content-Type: text/html; charset=UTF-8');
                      $to_admin = (isset($email_settings['prayer_req_admin_email']) and ! empty($email_settings['prayer_req_admin_email'])) ? $email_settings['prayer_req_admin_email'] : get_option('admin_email');
                      $to_cc = $to_admin.','.$email_settings['wpe_email_cc'];
                      $to = $to_cc;

                      $subject = (isset($email_settings['wpe_email_admin_subject']) and ! empty($email_settings['wpe_email_admin_subject'])) ? $email_settings['wpe_email_admin_subject'] : 'New {request_type} received';
                      $subject = str_replace(array(
                          '{request_type}',
                      ), array(
                          $data['request_type'],
                      ), $subject);
                      if (isset($email_settings['wpe_email_admin_messages']) AND ! empty($email_settings['wpe_email_admin_messages'])) {
                          $body = $email_settings['wpe_email_admin_messages'];
                          $body = str_replace(array(
                              '{prayer_author_name}',
                              '{prayer_author_email}',
                              '{prayer_title}',
                              '{prayer_messages}',
                              '{prayer_author_info}',
                              '{request_type}',
                          ), array(
                              $data['prayer_author_name'],
                              $data['prayer_author_email'],
                              $data['prayer_title'],
                              $data['prayer_messages'],
                              $prayer_author_info->user_login,
                              $data['request_type'],
                          ), $body);
                      } else {
                          $subject = ($data['request_type'] == "prayer_request") ? 'New Prayer Request Recieved To Moderate' : 'New Praise Report Recieved To Moderate';
                          $body = 'Hello, <br> <p>You have recieved a new ';
                          $body .= ($data['request_type'] == "prayer_request") ? 'prayer request' : 'praise report';
                          $body .= ' to moderate with following details :</p>';
                          $body .= '<b>Name :</b> '.$data['prayer_author_name'].'<br>';
                          if ($data['prayer_author_email'] != '') {
                              $body .= '<b>Email :</b> '.$data['prayer_author_email'].'<br>';
                          }
                          $body .= '<b>Title :</b> '.$data['prayer_title'].'<br>';
                          $body .= '<b>Message :</b> '.$data['prayer_messages'].'<br>';

                          if ($data['prayer_author'] != '') {
                              $prayer_author_info = get_userdata($data['prayer_author']);
                              $body .= '<b>User Login :</b> '.$prayer_author_info->user_login.'<br>';
                          }
                          $body .= '<br>Thank you';
                      }
                      wp_mail($to, $subject, $body, $headers);
                  }
                  return new WP_REST_Response( 'Thank you. Your form has been received', 200 );
              }
      }
      public function get_filtered_product(){

      }
      public function order_payment(){

      }


    public function website_email($sender)
    {
        $email_settings = unserialize(get_option('_wpe_prayer_engine_email_settings'));
        $sitename = strtolower($_SERVER['SERVER_NAME']);
        if (substr($sitename, 0, 4) == 'www.') {
            $sitename = substr($sitename, 4);
        }
        $illegal_chars_username = array('(', ')', '<', '>', ',', ';', ':', '\\', '"', '[', ']', '@', "'", ' ');
        $username = str_replace($illegal_chars_username, "", get_option('blogname'));
        $sender_emailuser = (isset($email_settings['wpe_email_user']) and ! empty($email_settings['wpe_email_user'])) ? $email_settings['wpe_email_user'] : $username.'@'.$sitename;
        $sender_email = $sender_emailuser;

        return $sender_email;
    }

    public function website_name($name)
    {
        $email_settings = unserialize(get_option('_wpe_prayer_engine_email_settings'));
        $site_name = (isset($email_settings['wpe_email_from']) and ! empty($email_settings['wpe_email_from'])) ? $email_settings['wpe_email_from'] : get_option('blogname');

        return $site_name;
    }



}
$controler = new Custom_customapi();
