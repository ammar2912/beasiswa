<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tespdpt extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
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

  function tes_api_mahasiswa()
  {
    $credentials = $this->getAccess();
    $param = array(
      "limit" => 1000,
      "offset" => 1800,
      // "nim" => "E31181709",
      "angkatan" => "2018",
      );
      $curl = curl_init("http://api.polije.ac.id/resources/akademik/mahasiswa"."?".http_build_query($param));
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$credentials['accessToken'], "User-Agent: ".strtolower($_SERVER['HTTP_USER_AGENT'])));

      $json_response = curl_exec($curl);
      curl_close($curl);
      echo "<pre>";
        print_r(json_decode($json_response));
        echo "</pre>";
        // echo $json_response;
      }

      function tes_neo()
      {
        $post = [
        'username' => '005019e1',
        'password' => 'mastrip',
        ];
        $ch = curl_init('http://pdpt.polije.ac.id:8100/ws/live2.php/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        // do anything you want with your response
        var_dump($response);
      }

    }
