<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UbahPasswordOrmawa extends E_Controller{

  function index()
  {
    $data = array(
      'body' => 'UbahPasswordOrmawa/input',
      'form' => 'UbahPasswordOrmawa/form',
     );
    $this->load->view('index', $data);
  }

  function ubah(){
    $data = array(
      'password' => password_hash($this->input->post("passwordbaru"),PASSWORD_DEFAULT,array("cost"=>10))
    );

    $id = $this->input->post("id_user");
    $pass = $this->input->post("passwordlama");

    $cek = $this->db->get_where('tb_ormawa', array('id' => $id));
    if($cek->num_rows() > 0){
      $pw_ormawa = $cek->row();
      $cek_pass = password_verify($pass, $pw_ormawa->password);
    if ($cek_pass) {

        $this->db->where("id",$id);
        $this->db->update("tb_ormawa",$data);

        $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Password Berhasil"));
        redirect(base_url()."UbahPasswordOrmawa");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Password Gagal, Password Lama Tidak Sesuai !"));
      redirect(base_url()."UbahPasswordOrmawa");
    }
    }else{
    $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Ubah Password"));
    redirect(base_url()."UbahPasswordOrmawa");
    }
  }

}
