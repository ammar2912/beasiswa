<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDataPrestasi extends CI_Model{

  public function __construct()
  {
      parent::__construct();
  }

  public function get_data(){
    $this->db->select('tb_prestasi_mahasiswa.*,tb_prestasi_mahasiswa.id as id_prestasi,tb_prestasi_mahasiswa.status as status_prestasi,tb_mahasiswa.*,tb_mahasiswa.nama as nama_mahasiswa');
		$this->db->from('tb_prestasi_mahasiswa');

		$this->db->where('tb_prestasi_mahasiswa.jenis_user',1);

		$this->db->join('tb_mahasiswa','tb_mahasiswa.id = tb_prestasi_mahasiswa.id_user','left');
		// $this->db->join('tb_lampiran_prestasi','tb_lampiran_prestasi.id_prestasi = tb_prestasi_mahasiswa.id','left');

    $query=$this->db->get();

		return $query->result();
  }

  public function get_export($id){
    $this->db->select('tb_prestasi_mahasiswa.*,tb_prestasi_mahasiswa.id as id_prestasi,tb_prestasi_mahasiswa.status as status_prestasi,tb_mahasiswa.*,tb_mahasiswa.nama as nama_mahasiswa');
    $this->db->from('tb_prestasi_mahasiswa');

    $this->db->where('tb_prestasi_mahasiswa.jenis_user',1);
    $this->db->where('tb_prestasi_mahasiswa.status',1);

    if($id != 'all'){
    $this->db->where('tb_prestasi_mahasiswa.prestasi',$id);
    }

    $this->db->join('tb_mahasiswa','tb_mahasiswa.id = tb_prestasi_mahasiswa.id_user','left');
    // $this->db->join('tb_lampiran_prestasi','tb_lampiran_prestasi.id_prestasi = tb_prestasi_mahasiswa.id','left');

    $query=$this->db->get();

    return $query->result();
  }

  public function get_data_edit($id){
    return $this->db->get_where("tb_prestasi_mahasiswa",array("id"=>$id))->row_array();
  }


}
