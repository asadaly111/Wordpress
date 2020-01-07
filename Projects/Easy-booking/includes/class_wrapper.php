<?php 
/**
* Users.php
*
* @package     CI-ACL
* @author      Steve Goodwin
* @copyright   2015 Plumps Creative Limited
*/
class Booking{

static $app_id = '1fa6840893ce651c6114dc531990e42e';
static $secret_key = '2df514923b90f0ba4887d88953483e5c';
static $endpoint = 'http://dev27.onlinetestingserver.com/booking-system';


    /* A curl Helper to perform HTTP POST */
    public static function request($fields, $url=''){
        $headers = array (
            "Connection: keep-alive",
            "User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
            "Accept-Encoding: gzip,deflate,sdch",
            "Accept-Language: en-US,en;q=0.8",
            "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3"
        );
        $fields_string = http_build_query ( $fields );
        $cookie = 'cf6c650fc5361e46b4e6b7d5918692cd=49d369a493e3088837720400c8dba3fa; __utma=148531883.862638000.1335434431.1335434431.1335434431.1; __utmc=148531883; __utmz=148531883.1335434431.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); mcs=698afe33a415257006ed24d33c7d467d; style=default';

        $data_string = json_encode($fields);

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $response = curl_exec ( $ch );
        curl_close ( $ch );
        return $response;
    }

    //create users
        public function create_user($password,$first_name,$email,$last_name,$company,$phone,$phone_verified,$address_1,$address_2,$city,$postcode,$country,$state,$user_type,$latitude,$longitude,$gender,$biodata,$dateofbirth){
            $data = array(
                    'appid' =>  self::$app_id,
                    'secret_key' =>  self::$secret_key,
                    'email'=>$email,
                    'password'=>$password,
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'company'=>$company,
                    'phone'=>$phone,
                    'phone_verified'=>$phone_verified,
                    'address_1'=>$address_1,
                    'address_2'=>$address_2,
                    'city'=>$city,
                    'postcode'=>$postcode,
                    'country'=>$country,
                    'state'=>$state,
                    'user_type'=>$user_type,
                    'latitude'=>$latitude,
                    'longitude'=>$longitude,
                    'gender'=>$gender,
                    'biodata'=>$biodata,
                    'dateofbirth'=>$dateofbirth

                );
                $url = self::$endpoint . '/booking/create_user';
                $response =self::request($data, $url );
            return $response;

        }



    //users
    public function selectusers(){

        $data = array(
            'appid' =>  self::$app_id,
            'secret_key' =>  self::$secret_key
        );  $url = self::$endpoint . '/booking/selectusers';
        $response =self::request($data, $url );

        return $response;

    }


    //All bookings
    public function allreservations()
    {

        $data = array(
            'appid' =>  self::$app_id,
            'secret_key' =>  self::$secret_key
        );

        $url = self::$endpoint . '/booking/reservations';
        $response =self::request($data, $url );
        return $response;
    }


    //resources
    public function selectresources(){
        $data = array(
            'appid' =>  self::$app_id,
            'secret_key' =>  self::$secret_key
        );  $url = self::$endpoint . '/booking/selectresources';
        $response =self::request($data, $url );

        return $response;
    }
  public function selectresourcepackages($id){
        $data = array(
           'appid' =>  self::$app_id,
           'secret_key' =>  self::$secret_key,
           'id'=>$id
        );  $url = self::$endpoint . '/booking/selectresourcepackages';
        $response =self::request($data,$url);
        return $response;
    }


    //create resources

    public function create_resource($resource,$seats,$slots,$buffer,$unavailable,$starttime,$endtime,$services,$resource_id){
        $data = array(
                'appid' =>  self::$app_id,
                'secret_key' =>  self::$secret_key,
                'resource'=>$resource,      //name
                'seats'=>$seats,
                'slots'=>$slots,            // timeframes in mins (eg 30,40,50)
                'buffer'=>$buffer,          // time between slots in mins
                'unavailable'=>$unavailable, //array of unavailable days (int)
                'starttime'=>$starttime,
                'endtime'=>$endtime,
                'services'=>$services,    // array of service id
                'resource_id'=>$resource_id  //optional

            );
            $url = self::$endpoint . '/booking/create_resource';
            $response =self::request($data, $url);
        return $response;

    }

  // slot types of  a resource
   public function slottypes($resource){
          $data = array(
                  'appid' =>  self::$app_id,
                  'secret_key' =>  self::$secret_key,
                  'select_resource'=>$resource,      //id of resource


              );
              $url = self::$endpoint . '/booking/slottypes';
              $response =self::request($data, $url );
          return $response;

      }




        public function bookslot($resource,$slot,$date,$starttime,$services,$name,$email,$phone,$user_id,$subserviceslots){
        $data = array(
            'appid' =>  self::$app_id,
            'secret_key' =>  self::$secret_key,
            'select_resource'=>$resource,           //resource id
            'resource_package'=>$slot,              //timeframe id of main service
            "subserviceslots"=>$subserviceslots,    //array of subservice timeframe ids (if any)
            "starttime"=>$starttime,
            'date'=>$date,
            'email'=>$email,
            'phone'=>$phone,
            'name'=>$name,
            'user_id'=>$user_id,   // user id will be 0 for guest user
            "services"=>$services         //service id
        );
        $url = self::$endpoint . '/booking/bookslot';
        $response =self::request($data, $url);
        return $response;
        }





        //check available slots of a date.
        public function availabilityofslots($resource,$slot,$date,$subserviceslots){
        $data = array(
            'appid' =>  self::$app_id,
            'secret_key' =>  self::$secret_key,
                'select_resource'=>$resource,             //resource id
                'resource_package'=>$slot,                //timeframe id
                'date'=>$date,
                'subserviceslots'=>$subserviceslots       //array of subservice timeframe ids (if any)
            );
        $url = self::$endpoint . '/booking/availabilityofslots';
        $response =self::request($data, $url);
        return $response;
        }

        //services
        public function create_service($name,$type,$image,$slots,$mainservice_id){
                $data = array(
                    'appid' =>  self::$app_id,
                    'secret_key' =>  self::$secret_key,
                    'name'=>$name ,            //name of service
                    'type'=>$type,
                    'image'=>$image,
                    'slots'=>$slots,     // array of timeslots and prices
                    'mainservice_id'=>$mainservice_id  // mention main service id when you're creating a sub service. Otherwise, send an empty value.
                );
                $url = self::$endpoint . '/booking/create_service';
                $response =self::request($data, $url);
            return $response;
        }

         public function allservices($type){
                        $data = array(
                            'appid' =>  self::$app_id,
                            'secret_key' =>  self::$secret_key,'type'=>$type   //   1 for main services and 0 for sub service
                        );
                        $url = self::$endpoint . '/booking/allservices';
                        $response =self::request($data, $url);
                    return $response;
                }

     public function subservices($id){
                        $data = array(
                            'appid' =>  self::$app_id,
                            'secret_key' =>  self::$secret_key,'id'=>$id  //   id of main service
                        );
                        $url = self::$endpoint . '/booking/subservices';
                        $response =self::request($data, $url);
                    return $response;
                }

                public function resource_services($resource_id){
                        $data = array(
                            'appid' =>  self::$app_id,
                            'secret_key' =>  self::$secret_key,
                            'resource_id'=>$resource_id
                        );
                        $url = self::$endpoint . '/booking/resource_services';
                        $response =self::request($data, $url);
                    return $response;
                }

                public function resourcesofservice($service){
                        $data = array(
                            'appid' =>  self::$app_id,
                            'secret_key' =>  self::$secret_key,
                            'service'=>$service
                        );
                        $url = self::$endpoint . '/booking/resourcesofservice';
                        $response =self::request($data, $url);
                    return $response;
                }




}

$bokingobj = new Booking();



