<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function denied(){
    $this->load->view("User/permission");
  }

}
?>
