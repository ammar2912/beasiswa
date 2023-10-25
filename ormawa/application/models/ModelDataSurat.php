<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDataSurat extends CI_Model{

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

    $this->db->select('tb_mahasiswa.*,tb_surat.*,tb_jenis_surat.*,tb_surat.status as status_surat,tb_surat.id as id_surat');
		$this->db->from('tb_mahasiswa,tb_surat');

		// $this->db->where('tb_surat.status',0);
		$this->db->where('tb_surat.id_user = tb_mahasiswa.id');

    $this->db->join('tb_jenis_surat','tb_jenis_surat.id = tb_surat.jenis_surat','left');

    $query=$this->db->get();

		return $query->result();
  }

  public function get_data_edit($id){
    return $this->db->get_where("surat",array("id"=>$id))->row_array();
  }


}
