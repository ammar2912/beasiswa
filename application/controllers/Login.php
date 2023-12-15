<?php
class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('ModelUsers');
		// $this->load->model('ModelMahasiswa');
	}

	function index(){
		$this->session->set_flashdata('item', 'value');
		$this->load->view('Login/Login');
	}

	function coba()
	{
		$result = BridgeP3M("master_dosen");

		echo json_encode($result);
	}

	function aksi_login($user=null,$pass=null){

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// $username = "admin";
			// $password = "asd";

			$data_login = $this->ModelUsers->cek_username($username)->row_array();
			if ($data_login['iduser']==null) {
				$this->session->set_flashdata("message", "Username Tidak Terdaftar");
				// redirect('Login');
				echo "u";
			}else{
				$pw_valid = $data_login['password'];
				if (password_verify($password, $pw_valid)) {
					$id_login = $data_login['iduser'];
					$nik = $data_login['pegawai_nip'];
					$get_data_karyawan = $this->ModelUsers->get_data_login($id_login)->row_array();
					$jabatan = $get_data_karyawan['jabatan'];

					$data_session = array(
						'id_login' => $id_login,
						'nik'      => $nik,
						'username' => $data_login['username'],
						'karyawan' => $get_data_karyawan['nama'],
						'jabatan'  => $get_data_karyawan['jabatan'],
					);
					$this->session->set_userdata($data_session);
					$data_riwayat = array(
						'NIK' 					=> $nik,
						'user_iduser'	=> $id_login,
						'last_login'		=> date('Y-m-d H:i:s'),
						'ip'						=> $this->input->ip_address()
					);
					// $this->db->insert('riwayat_login', $data_riwayat);
					// $this->db->reset_query();
					// $this->db->where($data_riwayat);
					// $data_riwayat_login = $this->db->get('riwayat_login')->row_array();
					// $this->session->set_userdata(array('no_login'=>$data_riwayat_login['no_login']));
					echo base_url("Home/admin");
				}else{
					$this->session->set_flashdata("message", "Password salah");
					// redirect('Login');
					echo "p";
					// die("password salah");
				}
			}
	}

	function logout(){
		// $no_login = $_SESSION['no_login'];
		// $this->db->where('no_login',$no_login);
		// $this->db->update('riwayat_login', array('logout' => date('Y-m-d H:i:s')));
		$this->session->sess_destroy();
		redirect("login");
	}

}
