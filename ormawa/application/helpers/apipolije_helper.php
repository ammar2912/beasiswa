<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

  function tes_api_mahasiswa($angkatan,$jurusan,$program_studi)
    {
        $CI =& get_instance();
        $credentials = getAccess();
        $param = array(
          // "limit" => 1000,
          // "offset" => 1800,
          "angkatan" => $angkatan,
          "jurusan" => $jurusan,
          "program_studi" => $program_studi,
        );
        $curl = curl_init("http://api.polije.ac.id/resources/akademik/mahasiswa"."?".http_build_query($param));
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$credentials['accessToken'], "User-Agent: ".strtolower($_SERVER['HTTP_USER_AGENT'])));

        $json_response = curl_exec($curl);
        curl_close($curl);
        // echo "<pre>";
        return json_decode($json_response);
        // echo "</pre>";
        // return $json_response;
    }
