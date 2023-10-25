<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelMahasiswa");
        $this->load->model("ModelNamaOrmawa");
        $this->load->helper('apipolije');
    }

    function index()
    {
        $jurusan = $this->db->get_where('tb_jurusan', array('status' => 1))->result();
        $cek_level = $this->session->userdata('jenis_user');
        if (!empty($cek_level)) {
            if ($cek_level == 'mahasiswa') {
                redirect(base_url("DashboardMahasiswa"));
            } elseif ($cek_level == 'ormawa') {
                redirect(base_url("DashboardOrmawa"));
            } elseif ($cek_level == 'kemahasiswaan') {
                redirect(base_url("DashboardKemahasiswaan"));
            } elseif ($cek_level == 'pimpinan') {
                redirect(base_url("DashboardPimpinan"));
            }
        } else {
            $data['jurusan'] = $jurusan;
            $this->load->view('Auth/login', $data);
        }
        // phpinfo();
    }

    function get_prodi()
    {
        // $id = $this->input->post('id');
        $category_id = $this->input->post('id', TRUE);
        $data =  $this->db->get_where('tb_prodi', array('id_jurusan' => $category_id))->result();
        echo json_encode($data);
    }

    function cek_login()
    {
        $username = $this->input->post("username");
        $akses = $this->input->post("akses");

        // =======================PPROSES LOGIN MAHASISWA==========================
        if ($akses == 'mahasiswa') {

            $angkatan = $this->input->post("angkatan");
            $jurusan = $this->input->post("jurusan");
            $program_studi = $this->input->post("prodi");

            $data_jurusan = $this->db->get_where('tb_jurusan', array('id' => $jurusan))->row();
            $data_prodi = $this->db->get_where('tb_prodi', array('id' => $program_studi))->row();
            if ($angkatan == "" || $jurusan == "" || $program_studi == "") {
                $this->session->set_flashdata("salah_username", "Silahkan isi Angkatan,Jurusan dan Prodi Anda");
                redirect(base_url() . "Login");
            } else {
                $cek_hak_akses =  $this->ModelMahasiswa->login_mahasiswa($username);
                if ($cek_hak_akses->num_rows() > 0) {
                    $user = $cek_hak_akses->row_array();
                    $user['user']      = $user['nama'];
                    $user['id']      = $user['id_mahasiswa'];
                    $user['jenis_user']   = 'mahasiswa';
                    $this->session->set_userdata($user);

                    redirect(base_url("DashboardMahasiswa"));
                } else {
                    $hadil =  tes_api_mahasiswa($angkatan, $data_jurusan->nama_jurusan, $data_prodi->nama_prodi);
                    $cari = array_search($username, array_column($hadil, 'nim'));
                    if ($cari) {
                        $var = $hadil[$cari];
                        $data = array(
                            'nim' => $username,
                            'nama' => $var->nama_lengkap,
                            'jurusan' => $jurusan,
                            'prodi' => $program_studi,
                        );
                        $cek = $this->db->insert('tb_mahasiswa', $data);
                        if ($cek) {

                            $cek_hak_akses =  $this->ModelMahasiswa->login_mahasiswa($username);
                            if ($cek_hak_akses->num_rows() > 0) {
                                $user = $cek_hak_akses->row_array();
                                $user['user']      = $user['nama'];
                                $user['id']      = $user['id_mahasiswa'];
                                $user['jenis_user']   = 'mahasiswa';
                                $this->session->set_userdata($user);
                                redirect(base_url("DashboardMahasiswa"));
                            } else {
                                $this->session->set_flashdata("salah_username", "Login Gagal! Silahkan coba lagi.");
                                redirect(base_url() . "Login");
                            }
                        } else {
                            $this->session->set_flashdata("salah_username", "Login Gagal! Silahkan coba lagi.");
                            redirect(base_url() . "Login");
                        }
                    } else {
                        $this->session->set_flashdata("salah_username", "NIM Tidak Terdaftar ! Mohon masukkan NIM yang benar.");
                        redirect(base_url() . "Login");
                    }
                }
            }
            // =======================PPROSES LOGIN ORMAWA==========================
        } elseif ($akses == 'ormawa') {
            $password = $this->input->post("password");
            $cek_hak_akses =  $this->ModelNamaOrmawa->login_ormawa($username);
            if ($cek_hak_akses->num_rows() > 0) {
                $getdata = $cek_hak_akses->row();
                if ($getdata->status != 1) {
                    $this->session->set_flashdata("salah_username", "Akun Anda NonAktif ! Silahkan hubungi kemahasiswaan.");
                    redirect(base_url() . "Login");
                } else {
                    $user = $cek_hak_akses->row_array();
                    $pw_ormawa = $user['password_ormawa'];
                    if (password_verify($password, $pw_ormawa)) {
                        $user['user']      = $user['nama_ormawa'];
                        $user['id']      = $user['id_ormawa'];
                        $user['jenis_user']   = 'ormawa';
                        $this->session->set_userdata($user);
                        redirect(base_url("DashboardOrmawa"));
                    } else {
                        $this->session->set_flashdata("salah_password", "Password Anda Salah");
                        redirect(base_url() . "Login");
                    }
                }
            } else {
                $this->session->set_flashdata("salah_username", "Username Tidak Ditemukan");
                redirect(base_url() . "Login");
            }
            // ================= PPROSES LOGIN KEMAHASISWAAN ======================
        } elseif ($akses == 'kemahasiswaan') {
            $password = $this->input->post("password");
            $cek = $this->db
                ->join("pegawai", "pegawai.idpegawai=user.pegawai_idpegawai")
                ->get_where("user", array("username" => $username));
            if ($cek->num_rows() > 0) {
                $user = $cek->row_array();
                $pw_valid = $user['password'];
                if (password_verify($password, $pw_valid)) {
                    $user['user']      = $user['nama'];
                    $user['jenis_user']   = 'kemahasiswaan';
                    $this->session->set_userdata($user);
                    redirect(base_url("DashboardKemahasiswaan"));
                } else {
                    $this->session->set_flashdata("salah_password", "Password Anda Salah");
                    redirect(base_url() . "Login/Kemahasiswaan");
                }
            } else {
                $this->session->set_flashdata("salah_username", "Username Tidak Ditemukan");
                redirect(base_url() . "Login/Kemahasiswaan");
            }
            // ================== PPROSES LOGIN PIMPINAN ==========================
        } elseif ($akses == 'pimpinan') {
            $password = $this->input->post("password");
            $cek = $this->db
                ->join("pegawai", "pegawai.idpegawai=user.pegawai_idpegawai")
                ->get_where("user", array("username" => $username));
            if ($cek->num_rows() > 0) {
                $user = $cek->row_array();
                $pw_valid = $user['password'];
                if (password_verify($password, $pw_valid)) {
                    $user['user']      = $user['nama'];
                    $user['jenis_user']   = 'pimpinan';
                    $this->session->set_userdata($user);
                    redirect(base_url("DashboardPimpinan"));
                } else {
                    $this->session->set_flashdata("salah_password", "Password Anda Salah");
                    redirect(base_url() . "Login/Kemahasiswaan");
                }
            } else {
                $this->session->set_flashdata("salah_username", "Username Tidak Ditemukan");
                redirect(base_url() . "Login/Kemahasiswaan");
            }
            // ==================PPROSES LOGIN SUPER ADMIN============
        } else {
            $password = $this->input->post("password");
            $cek = $this->db
                ->join("pegawai", "pegawai.idpegawai=user.pegawai_idpegawai")
                ->get_where("user", array("username" => $username));
            if ($cek->num_rows() > 0) {
                $user = $cek->row_array();
                $pw_valid = $user['password'];
                if (password_verify($password, $pw_valid)) {

                    $user['user']      = $user['nama'];
                    $user['jenis_user']   = 'admin';
                    $this->session->set_userdata($user);
                    redirect(base_url("DashboardKemahasiswaan"));
                } else {
                    $this->session->set_flashdata("salah_password", "Password Anda Salah");
                    redirect(base_url() . "Login/Admin");
                }
            } else {
                $this->session->set_flashdata("salah_username", "Username Tidak Ditemukan");
                redirect(base_url() . "Login/Admin");
            }
        }
        // ========================================================================

    }

    function Kemahasiswaan()
    {
        $id = $this->session->userdata('pegawai_idpegawai');
        if (!empty($id)) {
            $cek_id = $this->db->get_where('user', array('pegawai_idpegawai' => $id))->row();
            if ($cek_id->pegawai_idpegawai == '1') {
                redirect('DashboardKemahasiswaan');
            } elseif ($cek_id->pegawai_idpegawai == '2') {
                redirect('DashboardPimpinan');
            }
        } else {
            $this->load->view('Auth/Login_Kemahasiswaan');
        }
    }

    function Admin()
    {
        $id = $this->session->userdata('pegawai_idpegawai');
        if (!empty($id)) {
            redirect('DashboardMahasiswa');
        } else {
            $this->load->view('Auth/Login_Admin');
        }
    }

    function logout()
    {
        if ($this->session->userdata('jenis_user') == 'pimpinan' || $this->session->userdata('jenis_user') == 'kemahasiswaan') {
            $this->session->sess_destroy();
            redirect(base_url() . "Login/Kemahasiswaan");
        } elseif ($this->session->userdata('jenis_user') == 'admin') {
            $this->session->sess_destroy();
            redirect(base_url() . "Login/Admin");
        } else {
            $this->session->sess_destroy();
            redirect(base_url() . "Login");
        }
    }
}
