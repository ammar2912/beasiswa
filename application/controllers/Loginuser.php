<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginuser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model'); // Load the user model
    }

    public function index() {
        $this->load->view('Beasiswa/login');
    }

    public function process_login() {
        print_r('tes');
        var_dump('anu');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Perform authentication
        $user = $this->User_model->authenticate_user($username, $password);

        if ($user) {
            // Set user data in session
            $this->session->set_userdata('id', $user->id);
            $this->session->set_userdata('username', $user->username);
            
            // Redirect to dashboard or desired page
            redirect('Beasiswa/datapribadibeasiswa');
        } else {
            // Failed login attempt
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('Loginuser');
        }
    }

    public function logout() {
        // Destroy the session and redirect to the login page
        $this->session->sess_destroy();
        redirect('Loginuser');
    }
}
