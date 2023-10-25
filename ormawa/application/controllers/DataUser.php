<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataUser extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelDataUser");
  }

  function index()
  {
    $datauser = $this->ModelDataUser->get_data()->result();
    $data = array(
      'body' => 'DataUser/list',
      'datauser' => $datauser
     );
    $this->load->view('index', $data);
  }

  function input()
  {

    $data = array(
      'body' => 'DataUser/input',
      'form' => 'DataUser/form'
     );
    $this->load->view('index', $data);
  }

  function edit()
  {
    $id =base64_decode($this->uri->segment(3));
    $datauser = $this->ModelDataUser->get_data_edit($id)->row();
    $data = array(
      'body' => 'DataUser/edit',
      'form' => 'DataUser/form',
      'datauser' => $datauser,
     );
    $this->load->view('index', $data);
  }

  function insert(){
    $pegawai = array(
      'nama' => $this->input->post("nama"),
      'jabatan' => $this->input->post("jabatan"),
    );
    $ceklagi =  $this->db->get_where('user', array('username' => $this->input->post("username") ))->num_rows();
    $cek = $this->db->get_where('pegawai', array('nama' => $this->input->post("nama") ))->num_rows();
    if($cek > 0 || $ceklagi > 0){
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Data Gagal diinput, Nama / Username telah terdaftar !"));
      redirect(base_url()."DataUser/input");

    }else{
    if ($this->db->insert("pegawai",$pegawai)) {
      $get = $this->db->get_where('pegawai', array('nama' => $this->input->post("nama") ))->row();
      $idnya = $get->idpegawai;
      $roles = '';

      if($this->input->post("jabatan") == 2){
        $roles = ["8","98","99","100","101","102","103","104","105","118","119","137","153","165","107","108","110","113","114","120","116","117","161","167"];
      }else{
        $roles = ["138","140","144","146","147","148","149","150","151","152","164"];
      }

      $user = array(
      'username' => $this->input->post("username"),
      'password' => password_hash('12345',PASSWORD_DEFAULT,array("cost"=>10)),
      'roles' => json_encode($roles),
      'pegawai_idpegawai' => $idnya );

      $this->db->insert("user",$user);

      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."DataUser");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Input Data"));
      redirect(base_url()."DataUser");

    }
    }
  }

  function update(){
    $id = base64_decode($this->uri->segment(3));
    $pegawai = array(
      'nama' => $this->input->post("nama"),
      'jabatan' => $this->input->post("jabatan"),
    );
    $this->db->where('idpegawai',$id);
    if ($this->db->update("pegawai",$pegawai)) {

      if($this->input->post("jabatan") == 2){
        $roles = ["8","98","99","100","101","102","103","104","105","118","119","137","153","165","107","108","110","113","114","120","116","117","161","167"];
      }else{
        $roles = ["138","140","144","146","147","148","149","150","151","152","164"];
      }

      $user = array(
      'username' => $this->input->post("username"),
      'roles' => json_encode($roles),
      );

      $this->db->where('pegawai_idpegawai',$id);
      $this->db->update("user",$user);

      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Ubah Data"));
      redirect(base_url()."DataUser");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Ubah Data"));
      redirect(base_url()."DataUser");

    }
  }

  function delete(){
    $id = base64_decode($this->uri->segment(3));

    $this->db->where_in("pegawai_idpegawai",$id);
    if ($this->db->delete("user")) {

      $this->db->where_in("idpegawai",$id);
      $this->db->delete("pegawai");

        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."DataUser");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."DataUser");
    }
  }


}
