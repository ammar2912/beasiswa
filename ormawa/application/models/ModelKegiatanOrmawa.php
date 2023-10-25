<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKegiatanOrmawa extends CI_Model{


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
    $this->db->select('tb_kegiatan_ormawa.*,tb_kegiatan_ormawa.id,tb_proker.nama_proker as nama_proker,tb_ormawa.nama_ormawa as nama_ormawa,tb_kegiatan_ormawa.id as id_kegiatan, tb_lampiran_kegiatan.*');
		$this->db->from('tb_kegiatan_ormawa');

    $this->db->join('tb_proker','tb_proker.id = tb_kegiatan_ormawa.id_proker','left');
		$this->db->join('tb_ormawa','tb_ormawa.id = tb_kegiatan_ormawa.id_ormawa','left');
		$this->db->join('tb_lampiran_kegiatan','tb_lampiran_kegiatan.id_kegiatan = tb_kegiatan_ormawa.id AND tb_lampiran_kegiatan.status = 0','left');

    $query=$this->db->get();

		return $query->result();
  }
  public function get_data_edit($id){
    return $this->db->get_where("tb_kegiatan_ormawa",array("id"=>$id))->row_array();
  }


}
