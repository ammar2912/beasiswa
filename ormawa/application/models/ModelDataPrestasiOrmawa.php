<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDataPrestasiOrmawa extends CI_Model{

  public function __construct()
  {
      parent::__construct();
  }

  public function get_data(){
    $this->db->select('tb_prestasi_mahasiswa.*,tb_prestasi_mahasiswa.id as id_prestasi,tb_prestasi_mahasiswa.status as status_prestasi,tb_ormawa.*,tb_ormawa.nama_ormawa as nama_mahasiswa, tb_ormawa.kode_ormawa as nim');
		$this->db->from('tb_prestasi_mahasiswa');

		// $this->db->where('tb_prestasi_mahasiswa.status',0);
		$this->db->where('tb_prestasi_mahasiswa.jenis_user',2);

		$this->db->join('tb_ormawa','tb_ormawa.id = tb_prestasi_mahasiswa.id_user','left');
		// $this->db->join('tb_lampiran_prestasi','tb_lampiran_prestasi.id_prestasi = tb_prestasi_mahasiswa.id','left');

    $query=$this->db->get();

		return $query->result();
  }

}
