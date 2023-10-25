<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelHistoryAnggaran extends CI_Model{


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
    $this->db->select('tb_anggaran_ormawa.*,tb_ormawa.*,tb_anggaran_ormawa.id as id_anggaran');
    $this->db->from('tb_anggaran_ormawa');
    $this->db->where('tb_anggaran_ormawa.status_anggaran',0);
      $this->db->order_by('tb_anggaran_ormawa.periode','DESC');

    $this->db->join('tb_ormawa','tb_ormawa.id = tb_anggaran_ormawa.id_ormawa','left');

    $query=$this->db->get();

    return $query;
  }

  public function get_all(){
      $this->db->select('tb_anggaran_ormawa.*,tb_ormawa.*,tb_anggaran_ormawa.id as id_anggaran');
      $this->db->from('tb_anggaran_ormawa');
      $this->db->order_by('tb_anggaran_ormawa.periode','DESC');

      $this->db->join('tb_ormawa','tb_ormawa.id = tb_anggaran_ormawa.id_ormawa','left');


      $query=$this->db->get();

      return $query;
  }

  public function get_detail($id){
    return $this->db->get_where("tb_anggaran_ormawa",array("id"=>$id))->row_array();
  }

}
