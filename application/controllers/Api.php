<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $userBridge = BridgeP3M("https://layanan-p3m.polije.ac.id/api/master_dosen?nip=195504061987031001");
    // $userBridge[0]['nip']
    // echo $userBridge[0]->nip;
    echo sizeof($userBridge);
  }

}
