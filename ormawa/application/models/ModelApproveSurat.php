<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelApproveSurat extends CI_Model{

  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  public function get_data(){

    $this->db->select('tb_mahasiswa.*,tb_surat.*,tb_jenis_surat.*,tb_data_beasiswa.*,tb_surat.status as status_surat,tb_surat.id as id_surat,tb_jenis_surat.jenis_surat as surat_jenis,
    tb_jurusan.nama_jurusan as nama_jurusan,tb_prodi.nama_prodi as nama_prodi');
		$this->db->from('tb_surat');

		$this->db->where('tb_surat.status',0);
		// $this->db->where('tb_surat.id_user = tb_mahasiswa.id');

    $this->db->join('tb_mahasiswa','tb_mahasiswa.id = tb_surat.id_user','left');
    $this->db->join('tb_data_beasiswa','tb_data_beasiswa.id_mahasiswa = tb_mahasiswa.id','left');
    $this->db->join('tb_jurusan','tb_jurusan.id = tb_mahasiswa.jurusan','left');
    $this->db->join('tb_prodi','tb_prodi.id = tb_mahasiswa.prodi','left');
    $this->db->join('tb_jenis_surat','tb_jenis_surat.id = tb_surat.jenis_surat','left');

    $query=$this->db->get();

		return $query;
  }

  public function get_data_detail($id){

    $this->db->select('tb_mahasiswa.*,tb_surat.*,tb_jenis_surat.*,tb_data_beasiswa.*,tb_surat.status as status_surat,tb_surat.id as id_surat,tb_surat.jenis_surat as j_surat,tb_jenis_surat.jenis_surat as surat_jenis,
    tb_jurusan.nama_jurusan as nama_jurusan,tb_prodi.nama_prodi as nama_prodi');
		$this->db->from('tb_surat');

		$this->db->where('tb_surat.status',0);
    $this->db->where('tb_surat.id', $id);
		// $this->db->where('tb_surat.id_user = tb_mahasiswa.id');

    $this->db->join('tb_mahasiswa','tb_mahasiswa.id = tb_surat.id_user','left');
    $this->db->join('tb_data_beasiswa','tb_data_beasiswa.id_mahasiswa = tb_mahasiswa.id','left');
    $this->db->join('tb_jurusan','tb_jurusan.id = tb_mahasiswa.jurusan','left');
    $this->db->join('tb_prodi','tb_prodi.id = tb_mahasiswa.prodi','left');
    $this->db->join('tb_jenis_surat','tb_jenis_surat.id = tb_surat.jenis_surat','left');

    $query=$this->db->get();

		return $query;
  }

  public function get_data_edit($id){
    return $this->db->get_where('tb_surat',array('id'=>$id))->row_array();
  }


}
