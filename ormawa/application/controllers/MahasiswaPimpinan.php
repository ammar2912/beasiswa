<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaPimpinan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelMahasiswa");
  }

  function index()
  {
    $mahasiswapimpinan = $this->ModelMahasiswa->get_data()->result();
    $data = array(
      'body' => 'MahasiswaPimpinan/list',
      'mahasiswapimpinan' => $mahasiswapimpinan
     );
    $this->load->view('index', $data);
  }

  public function cek_prodi(){
  $id = $this->input->post('id');
  $data = $this->db->get_where('tb_prodi', array('id_jurusan' => $id))->result();
   echo json_encode($data);
 }

  // function input()
  // {
  //   $jurusan = $this->db->get_where('tb_jurusan',array('status' => 1))->result();
  //   $prodi = $this->db->get_where('tb_prodi',array('status' => 1))->result();
  //   $data = array(
  //     'body' => 'Mahasiswa/input',
  //     'form' => 'Mahasiswa/form',
  //     'jurusan' => $jurusan,
  //     'prodi' => $prodi,
  //    );
  //   $this->load->view('index', $data);
  // }
  //
  // function edit()
  // {
  //   $jurusan = $this->db->get_where('tb_jurusan',array('status' => 1))->result();
  //   $prodi = $this->db->get_where('tb_prodi',array('status' => 1))->result();
  //   $id = base64_decode($this->uri->segment(3));
  //   $mahasiswa = $this->ModelMahasiswa->get_data_edit($id);
  //   $data = array(
  //     'body' => 'Mahasiswa/edit',
  //     'form' => 'Mahasiswa/form',
  //     'mahasiswa' => $mahasiswa,
  //     'jurusan' => $jurusan,
  //     'prodi' => $prodi,
  //    );
  //   $this->load->view('index', $data);
  // }
  //
  //
  // function insert(){
  //   $mahasiswa = array(
  //     'nim' => $this->input->post("nim"),
  //     'nama' => $this->input->post("nama"),
  //     'jurusan' => $this->input->post("jurusan"),
  //     'prodi' => $this->input->post("prodi"),
  //     'status' => 0,
  //   );
  //
  //   $cek = $this->db->get_where('tb_mahasiswa',array('nim' => $this->input->post("nim")))->num_rows();
  //   if($cek <= 0){
  //   if ($this->db->insert("tb_mahasiswa",$mahasiswa)) {
  //     // code...
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."Mahasiswa");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
  //     redirect(base_url()."Mahasiswa");
  //
  //   }
  // }else{
  //   $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, NIM sudah terdaftar"));
  //   redirect(base_url()."Mahasiswa");
  // }
  // }
  // function update(){
  //   $id = base64_decode($this->uri->segment(3));
  //   $prodi = array(
  //     'nim' => $this->input->post("nim"),
  //     'nama' => $this->input->post("nama"),
  //     'jurusan' => $this->input->post("jurusan"),
  //     'prodi' => $this->input->post("prodi"),
  //   );
  //
  //   $this->db->where("id",$id);
  //   if ($this->db->update("tb_mahasiswa",$prodi)) {
  //     // code...
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."Mahasiswa");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
  //     redirect(base_url()."Mahasiswa");
  //
  //   }
  // }
  //
  // function delete(){
  //   $id = $this->input->post("id");
  //
  //   $this->db->where_in("id",$id);
  //   if ($this->db->delete("tb_mahasiswa")) {
  //       $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
  //       redirect(base_url()."Mahasiswa");
  //   }else{
  //       $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
  //       redirect(base_url()."Mahasiswa");
  //   }
  // }
  //

}
