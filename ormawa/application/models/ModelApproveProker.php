<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelApproveProker extends CI_Model{

  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  public function get_data(){

    $this->db->select('tb_proker.*,tb_lampiran_proker.*,tb_proker.id as id_proker,tb_proker.status as status_proker,tb_ormawa.*,tb_ormawa.nama_ormawa as nama_ormawa');
		$this->db->from('tb_proker');

		$this->db->where('tb_proker.status',0);

		$this->db->join('tb_ormawa','tb_ormawa.id = tb_proker.id_ormawa','left');
		$this->db->join('tb_lampiran_proker','tb_lampiran_proker.id_proker = tb_proker.id','left');

    $query=$this->db->get();

		return $query;
  }

}
