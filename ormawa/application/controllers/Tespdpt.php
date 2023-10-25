<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tespdpt extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    echo "string";
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
            'client_id'     => "26",
            'client_secret' => "PQijJezbHEl9i0Cq1m25aH46UNGTUp7AcZaxrYFy",
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

    function tes_token()
    {
      // echo "string";
      $curl = curl_init();

      $token = [
          "act" => "GetToken",
          "username" => "005019e1",
          "password" => "mastrip"
      ];

      curl_setopt_array($curl, array(
          CURLOPT_URL => "http://pdpt.polije.ac.id:8100/ws/live2.php",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($token),
          CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json"
          ),
      ));

      $response = curl_exec($curl);
      curl_close($curl);

      $data_response = json_decode($response);
      echo json_encode($data_response);
      // return $data_response->data->token;
    }

    function tes_mahasiswa()
    {
      $curl = curl_init();

      $token = [
          "act" => "GetToken",
          "username" => "005019e1",
          "password" => "mastrip"
      ];

      curl_setopt_array($curl, array(
          CURLOPT_URL => "http://pdpt.polije.ac.id:8100/ws/live2.php",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($token),
          CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json"
          ),
      ));

      $response = curl_exec($curl);
      curl_close($curl);

      $data_response = json_decode($response);
      // echo json_encode($data_response);
      $token = $data_response->data->token;
      // echo $token;

      $data = array(
        "act" => "GetListMahasiswa",
        'token' => "$token",
        'filter' => "",
        'order' => "",
        'limit' => "10",
        'offset' => "10",
      );
      $curl = curl_init();

      curl_setopt_array($curl, array(
          CURLOPT_URL => "http://pdpt.polije.ac.id:8100/ws/live2.php",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($data),
          CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json"
          ),
      ));

      $response = curl_exec($curl);
      curl_close($curl);

      $data_response = json_decode($response);
      echo json_encode($data_response);

    }

  }
