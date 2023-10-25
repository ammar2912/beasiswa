<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryAnggaran extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelHistoryAnggaran");

  }

  function index()
  {
    $historyanggaran = $this->ModelHistoryAnggaran->get_data()->result();
    $data = array(
      'body' => 'HistoryAnggaran/list',
      'historyanggaran' => $historyanggaran
     );
    $this->load->view('index', $data);
  }

  function detail()
  {
   $id = base64_decode($this->uri->segment(3));
   $historyanggaran = $this->ModelHistoryAnggaran->get_detail($id);
   $data = array(
     'body' => 'DataAnggaran/detail',
     'history' => $historyanggaran,
    );
   $this->load->view('index', $data);
 }

 function Aktif(){
   $id = base64_decode($this->uri->segment(3));
   $dataanggaran = array(
     'status_anggaran' => 1
   );

   $this->db->where("id",$id);
   if ($this->db->update("tb_anggaran_ormawa",$dataanggaran)) {
     $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil"));
     redirect(base_url()."HistoryAnggaran");
   }else{
     $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal"));
     redirect(base_url()."HistoryAnggaran");

   }
 }

  // function input()
  // {
  //   $data = array(
  //     'body' => 'HistoryAnggaran/input',
  //     'form' => 'HistoryAnggaran/form',
  //    );
  //   $this->load->view('index', $data);
  // }
  //
  // function edit()
  // {
  //   // $id = $this->uri->segment(3);
  //   // $dataanggaran = $this->ModelDataAnggaran->get_data_edit($id);
  //   $data = array(
  //     'body' => 'DataAnggaran/edit',
  //     'form' => 'DataAnggaran/form_edit',
  //     'dataanggaran' => $dataanggaran,
  //    );
  //   $this->load->view('index', $data);
  // }


  // function insert(){
  //   $pegawai = array(
  //     'nama' => $this->input->post("nama"),
  //     'alamat' => $this->input->post("alamat"),
  //     'telepon' => $this->input->post("telepon"),
  //     'jabatan' => $this->input->post("jabatan"),
  //     'nip' => $this->input->post("nip"),
  //   );
  //
  //   if ($this->db->insert("pegawai",$pegawai)) {
  //     // code...
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."Pegawai");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Input Data"));
  //     redirect(base_url()."Pegawai");
  //
  //   }
  // }
  // function update(){
  //   $id = $this->uri->segment(3);
  //   $pegawai = array(
  //     'nama' => $this->input->post("nama"),
  //     'alamat' => $this->input->post("alamat"),
  //     'telepon' => $this->input->post("telepon"),
  //     'jabatan' => $this->input->post("jabatan"),
  //     'nip' => $this->input->post("nip"),
  //   );
  //
  //   $this->db->where("idpegawai",$id);
  //   if ($this->db->update("pegawai",$pegawai)) {
  //     // code...
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."Pegawai");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Input Data"));
  //     redirect(base_url()."Pegawai");
  //
  //   }
  // }
  //
  // function delete(){
  //   $id = $this->input->post("id");
  //
  //   $this->db->where_in("pegawai_idpegawai",$id);
  //   if ($this->db->delete("user")) {
  //     $this->db->where_in("idpegawai",$id);
  //     if ($this->db->delete("pegawai")) {
  //       $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
  //       redirect(base_url()."Pegawai");
  //     }else{
  //       $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Hapus Data"));
  //       redirect(base_url()."Pegawai");
  //     }
  //
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Hapus Data"));
  //     redirect(base_url()."Pegawai");
  //   }
  //
  // }


}
