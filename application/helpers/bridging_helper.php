<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  function coba()
  {
    return "string";
  }

  function BridgeP3M($link="", $method="GET", $POST="")
  {
    date_default_timezone_set('UTC');
    $TimeStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://layanan-p3m.polije.ac.id/api/".$link,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_POSTFIELDS => $POST,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => $method,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #: <br><br>" . $err;
    } else {
      return json_decode($response);
    }
  }

  function getAccess()
   {
     $curl = curl_init();
         curl_setopt_array(
             $curl,
             array(
                 CURLOPT_RETURNTRANSFER => TRUE,
                 CURLOPT_URL            => "http://api.polije.ac.id/oauth/token",
                 CURLOPT_POST           => TRUE,
                 CURLOPT_POSTFIELDS     => http_build_query(
                     array(
                         'grant_type'    => "client_credentials",
                         'client_id'     => "19",
                         'client_secret' => "iyVroX7wE0yBJehDUdBAj1W6nFoPEq19RxylOciQ",
                     )
                 )
             )
         );

         $response = json_decode(curl_exec($curl));
         curl_close($curl);

         $access_token = (isset($response->access_token) && $response->access_token != "") ? $response->access_token : die("Error - access token missing from response!");
         // $instance_url = (isset($response->instance_url) && $response->instance_url != "") ? $response->instance_url : die("Error - instance URL missing from response!");

         return array(
             "accessToken" => $access_token,
             // "instanceUrl" => $instance_url
         );
   }

   function Bridge($url, $param)
   {
     $credentials = getAccess();
     $curl = curl_init("http://api.polije.ac.id/resources/".$url."?".http_build_query($param));
     curl_setopt($curl, CURLOPT_HEADER, false);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$credentials['accessToken'], "User-Agent: ".strtolower($_SERVER['HTTP_USER_AGENT'])));
     $json_response = curl_exec($curl);
     curl_close($curl);

     return $json_response;
   }


?>
