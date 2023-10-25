<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDataLPJ extends CI_Model{

  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  public function get_data($id){
    $this->db->select('tb_lpj.*,tb_proker.*,tb_ormawa.nama_ormawa as nama_ormawa,tb_lpj.status as status_lpj,tb_lpj.id as id_lpjs,tb_lampiran_lpj.*');
		$this->db->from('tb_lpj');

    $this->db->where('tb_lpj.id_ormawa',$id);

    $this->db->join('tb_proker','tb_proker.id = tb_lpj.id_proker','left');
		$this->db->join('tb_ormawa','tb_ormawa.id = tb_proker.id_ormawa','left');
		$this->db->join('tb_lampiran_lpj','tb_lampiran_lpj.id_lpj = tb_lpj.id','left');

    $query=$this->db->get();

		return $query->result();
  }
  public function get_data_edit($id){
    return $this->db->get_where("tb_proker",array("id"=>$id))->row_array();
  }


}
