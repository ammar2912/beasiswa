<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAnggaran extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelDataAnggaran");

  }

  function index()
  {
    $dataanggaran = $this->ModelDataAnggaran->get_data()->result();
    $data = array(
      'body' => 'DataAnggaran/list',
      'dataanggaran' => $dataanggaran
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $ormawa = $this->ModelDataAnggaran->get_ormawa();
    $data = array(
      'body' => 'DataAnggaran/input',
      'form' => 'DataAnggaran/form',
      'getormawa' => $ormawa,
     );
    $this->load->view('index', $data);
  }

  function edit()
  {
    $id = base64_decode($this->uri->segment(3));
    $ormawa = $this->ModelDataAnggaran->get_ormawa();
    $dataanggaran = $this->ModelDataAnggaran->get_data_edit($id);
    $data = array(
      'body' => 'DataAnggaran/edit',
      'form' => 'DataAnggaran/form',
      'ormawa' => $dataanggaran,
      'getormawa' => $ormawa,
     );
    $this->load->view('index', $data);
  }


  function insert(){
    $dataanggaran = array(
      'id_ormawa' => $this->input->post("id_ormawa"),
      'anggaran_awal' => $this->input->post("anggaran_awal"),
      'anggaran_sisa' => $this->input->post("anggaran_awal"),
      'status_anggaran' => 1,
      'periode' => $this->input->post("periode"),
    );

    $id = $this->input->post("id_ormawa");
    $periode = $this->input->post("periode");

    $cek = $this->ModelDataAnggaran->cek_anggaran($id,$periode)->num_rows();
    if($cek == 0){
    if ($this->db->insert("tb_anggaran_ormawa",$dataanggaran)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."DataAnggaran");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
      redirect(base_url()."DataAnggaran");
    }
    }else{
    $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, Data Sudah Terdaftar"));
    redirect(base_url()."DataAnggaran");
    }
  }
  function update(){
    $id = base64_decode($this->uri->segment(3));

    // $getData = $this->db->get_where('tb_anggaran_ormawa', array('id' => $id))->result_array();


    $dana_awal = $this->input->post("anggaran_awal");
    $anggaran_terpakai = $this->input->post("anggaran_terpakai");
    // var_dump($anggaran_terpakai);
    // die;

    $dana_sisa = $dana_awal - $anggaran_terpakai;

    $dataanggaran = array(
      'id_ormawa' => $this->input->post("id_ormawa"),
      'anggaran_awal' => $dana_awal,
      'anggaran_sisa' => $dana_sisa,
      'periode' => $this->input->post("periode"),
    );

    // var_dump($dataanggaran);
    // die;

    $this->db->where("id",$id);
    if ($this->db->update("tb_anggaran_ormawa",$dataanggaran)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Edit Data"));
      redirect(base_url()."DataAnggaran");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Edit Data"));
      redirect(base_url()."DataAnggaran");

    }
  }

  function delete(){
    $id = $this->input->post("id");

    $this->db->where_in("id",$id);
    if ($this->db->delete("tb_anggaran_ormawa")) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."DataAnggaran");
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."DataAnggaran");
    }
  }

  function NonAktif(){
    $id = base64_decode($this->uri->segment(3));
    $dataanggaran = array(
      'status_anggaran' => 0
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_anggaran_ormawa",$dataanggaran)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil"));
      redirect(base_url()."DataAnggaran");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal"));
      redirect(base_url()."DataAnggaran");

    }
  }

}
