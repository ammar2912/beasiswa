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
    echo "string";
    // $curl = curl_init();
    //
    // $token = [
    // "act" => "GetToken",
    // "username" => "005019e1",
    // "password" => "mastrip"
    // ];
    //
    // curl_setopt_array($curl, array(
    // CURLOPT_URL => "http://pdpt.polije.ac.id:8100/ws/live2.php",
    // CURLOPT_RETURNTRANSFER => true,
    // CURLOPT_ENCODING => "",
    // CURLOPT_MAXREDIRS => 10,
    // CURLOPT_TIMEOUT => 0,
    // CURLOPT_FOLLOWLOCATION => true,
    // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    // CURLOPT_CUSTOMREQUEST => "POST",
    // CURLOPT_POSTFIELDS => json_encode($token),
    // CURLOPT_HTTPHEADER => array(
    // "Content-Type: application/json"
    // ),
    // ));
    //
    // $response = curl_exec($curl);
    // curl_close($curl);
    //
    // $data_response = json_decode($response);
    // // $token = $data_response->data->token;
    // echo json_encode($data_response);

    // echo $token;
    //
    // $data = array(
    //   "act" => "GetListMahasiswa",
    //   'token' => "$token",
    //   'filter' => " ",
    //   'order' => " ",
    //   'limit' => "10",
    //   'offset' => "10",
    // );
    // $curl = curl_init();
    //
    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => "http://pdpt.polije.ac.id:8100/ws/live2.php",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "POST",
    //     CURLOPT_POSTFIELDS => json_encode($data),
    //     CURLOPT_HTTPHEADER => array(
    //         "Content-Type: application/json"
    //     ),
    // ));
    //
    // $response = curl_exec($curl);
    // curl_close($curl);
    //
    // $data_response = json_decode($response);
    // echo json_encode($data_response);

  }

}
