<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelHistoryKegiatanMahasiswa extends CI_Model{

  public function __construct()
  {
      parent::__construct();
  }

  public function get_data($id){
    $this->db->select('tb_kegiatan_ormawa.*,tb_proker.nama_proker as nama_proker,tb_ormawa.nama_ormawa as nama_ormawa,tb_kegiatan_ormawa.id as id_kegiatan, tb_lampiran_kegiatan.*');
		$this->db->from('tb_kegiatan_ormawa');

    $this->db->where('tb_kegiatan_ormawa.id_ormawa',$id);

		$this->db->join('tb_proker','tb_proker.id = tb_kegiatan_ormawa.id_proker','left');
		$this->db->join('tb_ormawa','tb_ormawa.id = tb_kegiatan_ormawa.id_ormawa','left');
		$this->db->join('tb_lampiran_kegiatan','tb_lampiran_kegiatan.id_kegiatan = tb_kegiatan_ormawa.id','left');

    $query=$this->db->get();

		return $query->result();
  }
  public function get_data_edit($id){
    return $this->db->get_where("tb_kegiatan_ormawa",array("id"=>$id))->row_array();
  }


}
