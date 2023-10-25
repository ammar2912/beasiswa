<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JurusanPimpinan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelJurusan");

  }

  function index()
  {
    $jurusanpimpinan = $this->ModelJurusan->get_data();
    $data = array(
      'body' => 'JurusanPimpinan/list',
      'jurusanpimpinan' => $jurusanpimpinan
     );
    $this->load->view('index', $data);
  }

  // function input()
  // {
  //   $data = array(
  //     'body' => 'Jurusan/input',
  //     'form' => 'Jurusan/form',
  //    );
  //   $this->load->view('index', $data);
  // }
  //
  // function edit()
  // {
  //   $id = base64_decode($this->uri->segment(3));
  //   $jurusan = $this->ModelJurusan->get_data_edit($id);
  //   $data = array(
  //     'body' => 'Jurusan/edit',
  //     'form' => 'Jurusan/form',
  //     'jurusan' => $jurusan,
  //    );
  //   $this->load->view('index', $data);
  // }
  //
  //
  // function insert(){
  //   $jurusan = array(
  //     'kode_jur' => $this->input->post("kode_jur"),
  //     'nama_jurusan' => $this->input->post("nama_jurusan"),
  //     'status' => 1,
  //   );
  //   $cek = $this->db->get_where('tb_jurusan',array('kode_jur' => $this->input->post("kode_jur")))->num_rows();
  //   if($cek <= 0){
  //   if ($this->db->insert("tb_jurusan",$jurusan)) {
  //     // code...
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."Jurusan");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Input Data"));
  //     redirect(base_url()."Jurusan");
  //   }
  // }else{
  //   $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, Jurusan sudah terdaftar"));
  //   redirect(base_url()."Jurusan");
  // }
  // }
  // function update(){
  //   $id = base64_decode($this->uri->segment(3));
  //   $prodi = array(
  //     'kode_jur' => $this->input->post("kode_jur"),
  //     'nama_jurusan' => $this->input->post("nama_jurusan"),
  //   );
  //
  //   $this->db->where("id",$id);
  //   if ($this->db->update("tb_jurusan",$prodi)) {
  //     // code...
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."Jurusan");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
  //     redirect(base_url()."Jurusan");
  //
  //   }
  // }
  //
  // function delete(){
  //   $id = $this->input->post("id");
  //
  //   $this->db->where_in("id",$id);
  //   if ($this->db->delete("tb_jurusan")) {
  //       $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
  //       redirect(base_url()."Jurusan");
  //   }else{
  //       $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
  //       redirect(base_url()."Jurusan");
  //   }
  // }
  //
  // function NonAktif(){
  //     $id = base64_decode($this->uri->segment(3));
  //
  //     $jurusan = array(
  //       'status' => 0,
  //     );
  //
  //     $this->db->where("id",$id);
  //     if ($this->db->update("tb_jurusan",$jurusan)) {
  //       // code...
  //       $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil "));
  //       redirect(base_url()."Jurusan");
  //     }else{
  //       $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal "));
  //       redirect(base_url()."Jurusan");
  //
  //     }
  // }
  //
  // function Aktif(){
  //     $id = base64_decode($this->uri->segment(3));
  //
  //     $jurusan = array(
  //       'status' => 1,
  //     );
  //
  //     $this->db->where("id",$id);
  //     if ($this->db->update("tb_jurusan",$jurusan)) {
  //       // code...
  //       $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil "));
  //       redirect(base_url()."Jurusan");
  //     }else{
  //       $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal "));
  //       redirect(base_url()."Jurusan");
  //
  //     }
  // }

}
