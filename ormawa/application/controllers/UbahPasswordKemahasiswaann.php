<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UbahPasswordKemahasiswaann extends E_Controller{

  // public function __construct()
  // {
  //   parent::__construct();
  //   $this->load->model("ModelProfilOrmawa");
  // }

  function index()
  {
    // $approveproker = $this->ModelApproveProker->get_data()->result();
    $data = array(
      'body' => 'UbahPasswordKemahasiswaann/input',
      'form' => 'UbahPasswordKemahasiswaann/form',
     );
    $this->load->view('index', $data);
  }

  function ubah(){
    $data = array(
      'password' => password_hash($this->input->post("passwordbaru"),PASSWORD_DEFAULT,array("cost"=>10))
    );

    $id = $this->input->post("id_user");
    $pass = $this->input->post("passwordlama");

    $cek = $this->db->get_where("user",array("iduser"=>$id));
    if ($cek->num_rows()>0) {
      $user = $cek->row_array();
      $pw_valid = $user['password'];
      if (password_verify($pass, $pw_valid)) {

        $this->db->where("iduser",$id);
        $this->db->update("user",$data);

        $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Password Berhasil"));
        redirect(base_url()."UbahPasswordKemahasiswaann");

    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Password Gagal, Password Lama Tidak Sesuai !"));
      redirect(base_url()."UbahPasswordKemahasiswaann");
    }
    }else{
    $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Ubah Password"));
    redirect(base_url()."UbahPasswordKemahasiswaann");
    }
  }

}
