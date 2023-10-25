<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelHistorySurat extends CI_Model{

  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  public function get_data($id){

    $this->db->select('tb_mahasiswa.*,tb_surat.*,tb_jenis_surat.*,tb_surat.status as status_surat,tb_surat.id as id_surat,tb_jenis_surat.jenis_surat as surat_jenis');
		$this->db->from('tb_surat');

		$this->db->where('tb_surat.id_user',$id);

    $this->db->join('tb_mahasiswa','tb_mahasiswa.id = tb_surat.id_user','left');
    $this->db->join('tb_jenis_surat','tb_jenis_surat.id = tb_surat.jenis_surat','left');

    $query=$this->db->get();

		return $query;
  }

  public function get_data_edit($id){
    return $this->db->get_where('tb_surat',array('id'=>$id))->row_array();
  }


}
