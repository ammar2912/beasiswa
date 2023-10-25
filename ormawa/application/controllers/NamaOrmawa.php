<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NamaOrmawa extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelNamaOrmawa");
  }

  function index()
  {
    $namaormawa = $this->ModelNamaOrmawa->get_data()->result();
    $data = array(
      'body' => 'NamaOrmawa/list',
      'namaormawa' => $namaormawa
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $jenisormawa = $this->db->get_where('tb_jenis_ormawa',array('status' => 1 ))->result();
    $data = array(
      'body' => 'NamaOrmawa/input',
      'form' => 'NamaOrmawa/form',
      'jenisormawa' => $jenisormawa,
     );
    $this->load->view('index', $data);
  }

  function edit()
  {
    $id = base64_decode($this->uri->segment(3));
    $jenisormawa = $this->db->get_where('tb_jenis_ormawa',array('status' => 1 ))->result();
    $namaormawa = $this->ModelNamaOrmawa->get_data_edit($id);
    $data = array(
      'body' => 'NamaOrmawa/edit',
      'form' => 'NamaOrmawa/form',
      'namaormawa' => $namaormawa,
      'jenisormawa' => $jenisormawa,
     );
    $this->load->view('index', $data);
  }


  function insert(){
    $namaormawa = array(
      'kode_ormawa' => $this->input->post("kode_ormawa"),
      'jenis_ormawa' => $this->input->post("jenis_ormawa"),
      'nama_ormawa' => $this->input->post("nama_ormawa"),
      'password' => password_hash('12345',PASSWORD_DEFAULT,array("cost"=>10)),
      'status' => 1,
      );
    if ($this->db->insert("tb_ormawa",$namaormawa)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."NamaOrmawa");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
      redirect(base_url()."NamaOrmawa");
    }
  }


  function update(){
    $id = base64_decode($this->uri->segment(3));
    $prodi = array(
      'kode_ormawa' => $this->input->post("kode_ormawa"),
      'jenis_ormawa' => $this->input->post("jenis_ormawa"),
      'nama_ormawa' => $this->input->post("nama_ormawa"),
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_ormawa",$prodi)) {
      // code...
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."NamaOrmawa");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
      redirect(base_url()."NamaOrmawa");

    }
  }

  function delete(){
    $id = $this->input->post("id");

    $this->db->where_in("id",$id);
    if ($this->db->delete("tb_ormawa")) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."NamaOrmawa");
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."NamaOrmawa");
    }
  }

  function NonAktif(){
      $id = base64_decode($this->uri->segment(3));

      $jurusan = array(
        'status' => 0,
      );

      $this->db->where("id",$id);
      if ($this->db->update("tb_ormawa",$jurusan)) {
        // code...
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil "));
        redirect(base_url()."NamaOrmawa");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal "));
        redirect(base_url()."NamaOrmawa");

      }
  }

  function Aktif(){
      $id = base64_decode($this->uri->segment(3));

      $jurusan = array(
        'status' => 1,
      );

      $this->db->where("id",$id);
      if ($this->db->update("tb_ormawa",$jurusan)) {
        // code...
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil "));
        redirect(base_url()."NamaOrmawa");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal "));
        redirect(base_url()."NamaOrmawa");

      }
    }

}
