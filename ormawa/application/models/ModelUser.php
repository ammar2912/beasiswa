<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUser extends CI_Model{


  /**

  * @author Fendrik Nurul Jadid <fendrik1311@gmail.com>

  * @since v.1.0

  **/


  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  public function get_role(){
    return $this->db->get_where("menu",array("categories"=>0))->result();
  }
  public function get_data(){
    return $this->db
    ->join("pegawai","pegawai.idpegawai=user.pegawai_idpegawai")
    ->get("user")->result();
  }
  public function get_data_edit($id){
    return $this->db
    ->get_where("user",array("iduser"=>$id))->row_array();

  }


}
