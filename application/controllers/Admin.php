<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct(){
		parent::__construct();
		$this->load->model('ModelUsers');
		// $this->load->model('ModelMahasiswa');
	}

    function index(){
      $this->load->view('login/admin');
    }

    public function login(){
        $username = $this->input->post('username');
		$password = $this->input->post('password');

        $data_login = $this->ModelUsers->cek_username($username)->row_array();

        if ($data_login['id_user']==null) {
            $this->session->set_flashdata("message", "Username Tidak Terdaftar");
            redirect('admin');
        }else{
            $pw_valid = $data_login['password'];
            if (password_verify($password, $pw_valid)) {
                $id_login = $data_login['id_user'];

                $data_session = array(
                    'id_login' => $id_login,
                    'username' => $data_login['username'],
                );
                $this->session->set_userdata($data_session);
                $this->load->view("beasiswa/dashboardAdmin");
            }else{
                $this->session->set_flashdata("message", "Password salah");
                redirect('admin');
            }
        }
    }
    
    function logout(){
		$this->session->sess_destroy();
		redirect("admin");
	}
}