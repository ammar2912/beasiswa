<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPengajuanLPJ extends CI_Model{


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
    $this->db->select('tb_proker.*,tb_ormawa.nama_ormawa as nama_ormawa,tb_proker.status as status_proker,tb_proker.id as id_proker,tb_lampiran_proker.*');
		$this->db->from('tb_proker');

		$this->db->join('tb_ormawa','tb_ormawa.id = tb_proker.id_ormawa','left');
		$this->db->join('tb_lampiran_proker','tb_lampiran_proker.id_proker = tb_proker.id','left');

    $query=$this->db->get();

		return $query->result();
  }
  public function get_data_edit($id){
    return $this->db->get_where("tb_proker",array("id"=>$id))->row_array();
  }


}
