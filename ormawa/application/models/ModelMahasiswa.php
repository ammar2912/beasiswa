<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMahasiswa extends CI_Model{

  public function __construct()
  {
      parent::__construct();
  }

  public function get_data(){

    $this->db->select('tb_mahasiswa.*,tb_jurusan.nama_jurusan as jurusan,tb_prodi.nama_prodi as prodi,tb_mahasiswa.id as id_mahasiswa,tb_mahasiswa.status as status_mahasiswa,');
		$this->db->from('tb_mahasiswa');

		$this->db->join('tb_jurusan','tb_jurusan.id = tb_mahasiswa.jurusan','left');
		$this->db->join('tb_prodi','tb_prodi.id = tb_mahasiswa.prodi','left');

    $query=$this->db->get();

		return $query;
  }

  public function get_data_login($params){

    $this->db->select('tb_mahasiswa.*,tb_jurusan.nama_jurusan as jurusan,tb_prodi.nama_prodi as prodi,tb_mahasiswa.id as id_mahasiswa,tb_mahasiswa.status as status_mahasiswa,');
		$this->db->from('tb_mahasiswa');

		$this->db->join('tb_jurusan','tb_jurusan.id = tb_mahasiswa.jurusan','left');
		$this->db->join('tb_prodi','tb_prodi.id = tb_mahasiswa.prodi','left');
    $this->db->where('tb_mahasiswa.id', $params);

    $query=$this->db->get();

		return $query;
  }

  public function get_rekap_batang(){
    
    return $this->db->select('tb_anggaran_ormawa.periode,
                        SUM(IF(tb_ormawa.jenis_ormawa = 1, tb_kegiatan_ormawa.dana_acc, 0)) AS UKM,
                        SUM(IF(tb_ormawa.jenis_ormawa = 2, tb_kegiatan_ormawa.dana_acc, 0)) AS BEM,
                        SUM(IF(tb_ormawa.jenis_ormawa = 3, tb_kegiatan_ormawa.dana_acc, 0)) AS HMJ,
                        SUM(IF(tb_ormawa.jenis_ormawa = 4, tb_kegiatan_ormawa.dana_acc, 0)) AS MPM,
                        ')
                     ->from('tb_ormawa')
                     ->join('tb_anggaran_ormawa','tb_anggaran_ormawa.id_ormawa = tb_ormawa.id','left')
                     ->join('tb_kegiatan_ormawa','tb_kegiatan_ormawa.id_ormawa = tb_ormawa.id')
                     ->group_by('tb_anggaran_ormawa.periode')
                     ->where('tb_kegiatan_ormawa.status_kegiatan', 6)
                     ->get();

    // $this->db->select('tb_anggaran_ormawa.periode,
    // SUM(IF(tb_ormawa.jenis_ormawa = 1, tb_anggaran_ormawa.anggaran_terpakai, 0)) AS UKM,
    // SUM(IF(tb_ormawa.jenis_ormawa = 2, tb_anggaran_ormawa.anggaran_terpakai, 0)) AS BEM,
    // SUM(IF(tb_ormawa.jenis_ormawa = 3, tb_anggaran_ormawa.anggaran_terpakai, 0)) AS HMJ,
    // SUM(IF(tb_ormawa.jenis_ormawa = 4, tb_anggaran_ormawa.anggaran_terpakai, 0)) AS MPM,
    // ');
    // $this->db->from('tb_ormawa');
    // $this->db->join('tb_anggaran_ormawa','tb_anggaran_ormawa.id_ormawa = tb_ormawa.id','left');
    // $this->db->group_by('tb_anggaran_ormawa.periode');
    // $query=$this->db->get();
    //
    // return $query;
  }

  public function get_rekap_pie(){

    $this->db->select('
    SUM(tb_anggaran_ormawa.anggaran_terpakai) AS terpakai,
    SUM(tb_anggaran_ormawa.anggaran_sisa) AS tidak_terpakai,
    SUM(tb_anggaran_ormawa.anggaran_awal) AS total,
    ');
    $this->db->from('tb_anggaran_ormawa');
    $query=$this->db->get();

    return $query;
  }

  public function get_rekap_kegiatan_mahasiswa(){

    $this->db->select('
    SUM(tb_kegiatan_mahasiswa.dana_acc) AS acc,
    ');
    $this->db->from('tb_kegiatan_mahasiswa')
             ->where('tb_kegiatan_mahasiswa.status_kegiatan', 6);
    $query=$this->db->get();

    return $query;
  }

  public function login_mahasiswa($nim){

    $this->db->select('tb_mahasiswa.id as id_mahasiswa,tb_mahasiswa.*,user.*');
    $this->db->from('tb_mahasiswa,user');
    $this->db->where('tb_mahasiswa.nim',$nim);
    $this->db->where('user.pegawai_idpegawai',1);
    $query=$this->db->get();

    return $query;
  }

  public function get_data_edit($id){
    return $this->db->get_where('tb_mahasiswa',array('id'=>$id))->row_array();
  }


}
