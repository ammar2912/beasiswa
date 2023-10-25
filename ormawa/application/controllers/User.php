<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends E_Controller{



  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelUser");
    $this->load->model("ModelPegawai");

  }

  function index()
  {
    $user = $this->ModelUser->get_data();
    $data = array(
      'body' => 'User/list',
      'user' => $user
    );
    $this->load->view('index', $data);
  }

  function input()
  {
    $pegawai = $this->ModelPegawai->get_data();
    $data = array(
      'form'    => 'User/form',
      'body'    => 'User/input',
      'role' => $this->Core->get_menu(),
      'pegawai' => $pegawai,
      // 'wilayah' => $this->ModelWilayah->get_data()
    );
    $this->load->view('index', $data);
  }

  function insert()
  {

    $username = $this->input->post("username");
    $pass = $this->input->post('password');
    $roles = $this->input->post('roles');
    $wilayah = $this->input->post("wilayah");
    $data = array(
      'username'    => $username,
      'password'=> password_hash($pass,PASSWORD_DEFAULT,array("cost"=>10)),
      'pegawai_idpegawai'=> $this->input->post('nopeg'),
      'roles'   => json_encode($roles),
      // 'wilayah'=> json_encode($wilayah)
    );
    if ($this->db->insert('user',$data )){
      // $this->session->set_flashdata('notif', $this->Notif->Berhasil('Berhasil Tersimpan'));
      redirect('User');
    }else{
      $this->session->set_flashdata('notif', $this->Notif->gagal('Gagal Tersimpan'));
      redirect('User/input');
    }

  }

  function edit(){
    $id = $this->uri->segment(3);
    $user = $this->ModelUser->get_data_edit($id);
    $pegawai = $this->ModelPegawai->get_data();
    $data = array(
      'form'    => 'User/form_edit',
      'body'    => 'User/edit',
      'pegawai' => $pegawai,
      'role' => $this->Core->get_menu(),
      'user' => $user,
      'role_user' => json_decode($user['roles']),
      // 'wilayah_user' => json_decode($user['wilayah']),
      // 'wilayah' => $this->ModelWilayah->get_data(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $id = $this->uri->segment(3);
    $username = $this->input->post("username");
    $pass = $this->input->post('password');
    $roles = $this->input->post('roles');
    $wilayah = $this->input->post("wilayah");
    $data = array(
      'username'    => $username,
      'pegawai_idpegawai'=> $this->input->post('nopeg'),
      'roles'   => json_encode($roles),
      // 'wilayah'=> json_encode($wilayah)
    );
    if (!empty($pass)) {
      $data['password']=password_hash($pass,PASSWORD_DEFAULT,array("cost"=>10));
    }
    $this->db->where('iduser',$id);
    if ($this->db->update('user',$data )){
      $this->session->set_flashdata('notif', $this->Notif->Berhasil('Berhasil Tersimpan'));
      redirect('User');
    }else{
      $this->session->set_flashdata('notif', $this->Notif->gagal('Gagal Tersimpan'));
      redirect('User/input');
    }

  }

  function delete()
  {
    $id = $this->input->post('id');

      $this->db->where_in('iduser', $id);

      if ($delete = $this->db->delete('user')) {
        $this->session->set_flashdata('notif', $this->Notif->berhasil('Berhasil Hapus User'));
      }else{
        $this->session->set_flashdata('notif', $this->Notif->gagal('Gagal Hapus Data!!!'));
      };
      redirect('User');
  }

}
