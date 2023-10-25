<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProdiPimpinan extends CI_Model{

  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  public function get_all(){
    $this->db->select('tb_prodi.*,tb_prodi.nama_prodi as nama_prodi,tb_jurusan.nama_jurusan as nama_jurusan');
    $this->db->from('tb_prodi,tb_jurusan');
    $this->db->where('tb_jurusan.id = tb_prodi.id_jurusan');
    $query=$this->db->get();

    return $query;
  }
  public function get_data_edit($id){
    return $this->db->get_where("tb_prodi",array("id"=>$id))->row_array();
  }


}
