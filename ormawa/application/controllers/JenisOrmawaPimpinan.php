<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisOrmawaPimpinan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelJenisOrmawa");

  }

  function index()
  {
    $jenisormawapimpinan = $this->ModelJenisOrmawa->get_data();
    $data = array(
      'body' => 'JenisOrmawaPimpinan/list',
      'jenisormawapimpinan' => $jenisormawapimpinan
     );
    $this->load->view('index', $data);
  }

  // function input()
  // {
  //   $data = array(
  //     'body' => 'JenisOrmawa/input',
  //     'form' => 'JenisOrmawa/form',
  //    );
  //   $this->load->view('index', $data);
  // }
  //
  // function edit()
  // {
  //   $id =base64_decode($this->uri->segment(3));
  //   $jenisormawa = $this->ModelJenisOrmawa->get_data_edit($id);
  //   $data = array(
  //     'body' => 'JenisOrmawa/edit',
  //     'form' => 'JenisOrmawa/form',
  //     'jenisormawa' => $jenisormawa,
  //    );
  //   $this->load->view('index', $data);
  // }
  //
  //
  // function insert(){
  //   $jenisormawa = array(
  //     'jenis' => $this->input->post("jenis"),
  //     'status' => 1
  //   );
  //   $cek = $this->db->get_where('tb_jenis_ormawa', array('jenis' => $this->input->post('jenis')))->num_rows();
  //   if($cek == 0){
  //   if ($this->db->insert("tb_jenis_ormawa",$jenisormawa)) {
  //     // code...
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."JenisOrmawa");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
  //     redirect(base_url()."JenisOrmawa");
  //   }
  // }else{
  //   $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, Jenis Sudah Terdaftar !"));
  //   redirect(base_url()."JenisOrmawa");
  // }
  // }
  //
  //
  // function update(){
  //   $id = base64_decode($this->uri->segment(3));
  //   $prodi = array(
  //     'jenis' => $this->input->post("jenis"),
  //   );
  //
  //   $this->db->where("id",$id);
  //   if ($this->db->update("tb_jenis_ormawa",$prodi)) {
  //     // code...
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."JenisOrmawa");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
  //     redirect(base_url()."JenisOrmawa");
  //
  //   }
  // }
  //
  // function delete(){
  //   $id = $this->input->post("id");
  //
  //   $this->db->where_in("id",$id);
  //   if ($this->db->delete("tb_jenis_ormawa")) {
  //       $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
  //       redirect(base_url()."JenisOrmawa");
  //     }else{
  //       $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
  //       redirect(base_url()."JenisOrmawa");
  //   }
  // }
  //
  function NonAktif(){
    $id = base64_decode($this->uri->segment(3));
    $prodi = array(
      'status' => 0,
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_jenis_ormawa",$prodi)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil"));
      redirect(base_url()."JenisOrmawa");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal"));
      redirect(base_url()."JenisOrmawa");
    }
  }

  function Aktif(){
    $id = base64_decode($this->uri->segment(3));
    $prodi = array(
      'status' => 1,
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_jenis_ormawa",$prodi)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil"));
      redirect(base_url()."JenisOrmawa");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal"));
      redirect(base_url()."JenisOrmawa");
    }
  }


}
