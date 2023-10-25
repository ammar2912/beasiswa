<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovePrestasiOrmawa extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelApprovePrestasi");
  }

  function index()
  {
    $ormawaass = $this->ModelApprovePrestasi->get_data_ormawa()->result();
    $data = array(
      'body' => 'ApprovePrestasiOrmawa/list',
      'ormawaass' => $ormawaass
     );
    $this->load->view('index', $data);
  }


  function approveprestasi()
  {
    $id = base64_decode($this->uri->segment(3));
      $approvekegiatan = array(
        'status' => 1,
      );
      $this->db->where("id",$id);
      if ($this->db->update("tb_prestasi_mahasiswa",$approvekegiatan)) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Approve Prestasi"));
        redirect(base_url()."ApprovePrestasi");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Approve Prestasi"));
        redirect(base_url()."ApprovePrestasi");

      }
  }
 //  public function cek_prodi(){
 //  $id = $this->input->post('id');
 //  $data = $this->db->get_where('tb_prodi', array('id_jurusan' => $id))->result();
 //   echo json_encode($data);
 // }
 //
 //  function input()
 //  {
 //    $jurusan = $this->ModelJurusan->get_data();
 //    $prodi = $this->ModelProdi->get_data();
 //    $data = array(
 //      'body' => 'Mahasiswa/input',
 //      'form' => 'Mahasiswa/form',
 //      'jurusan' => $jurusan,
 //      'prodi' => $prodi,
 //     );
 //    $this->load->view('index', $data);
 //  }
 //
 //  function edit()
 //  {
 //    $jurusan = $this->ModelJurusan->get_data();
 //    $prodi = $this->ModelProdi->get_data();
 //    $id = base64_decode($this->uri->segment(3));
 //    $mahasiswa = $this->ModelMahasiswa->get_data_edit($id);
 //    $data = array(
 //      'body' => 'Mahasiswa/edit',
 //      'form' => 'Mahasiswa/form',
 //      'mahasiswa' => $mahasiswa,
 //      'jurusan' => $jurusan,
 //      'prodi' => $prodi,
 //     );
 //    $this->load->view('index', $data);
 //  }
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


}
