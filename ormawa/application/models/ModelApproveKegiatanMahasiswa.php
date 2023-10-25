<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelApproveKegiatanMahasiswa extends CI_Model{

  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  public function get_data(){

    $this->db->select('tb_kegiatan_mahasiswa.*,tb_mahasiswa.nama as nama_mahasiswa,tb_lampiran_kegiatan.*,tb_kegiatan_mahasiswa.id as id_kegiatan,tb_kegiatan_mahasiswa.date as tgl_pengajuan');
		$this->db->from('tb_kegiatan_mahasiswa');

		$this->db->where('tb_kegiatan_mahasiswa.status_kegiatan',0);
		// $this->db->where('tb_kegiatan_ormawa.status_revisi',0);

		// $this->db->join('tb_proker','tb_proker.id = tb_kegiatan_ormawa.id_proker','left');
		$this->db->join('tb_mahasiswa','tb_mahasiswa.id = tb_kegiatan_mahasiswa.id_mahasiswa','left');
		$this->db->join('tb_lampiran_kegiatan','tb_lampiran_kegiatan.id_kegiatan = tb_kegiatan_mahasiswa.id AND tb_lampiran_kegiatan.status = 2','left');

    $query=$this->db->get();

		return $query;
  }

  public function get_data_edit($id){
    return $this->db->get_where('tb_kegiatan_mahasiswa',array('id'=>$id))->row_array();
  }


}
