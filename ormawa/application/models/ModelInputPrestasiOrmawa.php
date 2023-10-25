<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelInputPrestasiOrmawa extends CI_Model{

  /**

  * @author Fendrik Nurul Jadid <fendrik1311@gmail.com>

  * @since v.1.0

  **/


  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  public function get_data(){
    $this->db->select('tb_prestasi_mahasiswa.*,tb_lampiran_prestasi.*,tb_prestasi_mahasiswa.id as id_prestasi,tb_prestasi_mahasiswa.status as status_prestasi,tb_mahasiswa.*,tb_mahasiswa.nama as nama_mahasiswa');
		$this->db->from('tb_prestasi_mahasiswa');

		$this->db->where('tb_prestasi_mahasiswa.status',0);

		$this->db->join('tb_mahasiswa','tb_mahasiswa.id = tb_prestasi_mahasiswa.id_user','left');
		$this->db->join('tb_lampiran_prestasi','tb_lampiran_prestasi.id_prestasi = tb_prestasi_mahasiswa.id','left');

    $query=$this->db->get();

		return $query->result();
  }
  public function get_data_edit($id){
    return $this->db->get_where("surat",array("id"=>$id))->row_array();
  }


}
