<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Pegawai extends CI_Controller{

    public $data_pegawai = array();

    public function __construct()
    {
      parent::__construct();
      $this->load->model("ModelJabatan");
      $this->load->model("ModelPegawai");
      $this->load->model("ModelUsers");
      $this->load->model("ModelAlamat");
    }

    function index()
    {
      $data = array(
        'body' => 'Pegawai/list',
        'pegawai'=> $this->ModelPegawai->get_data()->result()
       );
      $this->load->view('index', $data);
    }

    function input()
    {
      $data = array(
        'form' => 'Pegawai/form',
        'body' => 'Pegawai/input',
        'jabatan'=> $this->ModelJabatan->get_data()->result(),
        "kota"          => $this->ModelAlamat->get_kota()->result(),
        "provinsi"      => $this->ModelAlamat->get_provinsi()->result(),
       );
      $this->load->view('index', $data);
    }

    public function insert()
    {
      $data_pegawai = array(
        'nik'         => $this->input->post("nik"),
        'nama'        => $this->input->post("nama"),
        'provinsi'        => $this->input->post("provinsi"),
        'kabupaten'        => $this->input->post("kabupaten"),
        'alamat'        => $this->input->post("alamat"),
        'telepon'        => $this->input->post("telepon"),
        'status_pegawai'        => 1,
        'tgl_lahir'        => $this->input->post("tgl_lahir"),
        'tgl_mulai_kerja'        => $this->input->post("tgl_mulai_kerja"),
        'jk'          => $this->input->post("jk"),
        'unsur'       => $this->input->post("unsur"),
        'kode_desa'   => $this->input->post("kode_desa"),
        'idkecamatan'       =>  $this->input->post("kecamatan_proker"),
        'aktif'       =>  $this->input->post("aktif"),
        'create_on'        => date("Y-m-d H:i:s"),
       );
       if ($this->ModelPegawai->get_hitung($this->input->post("nik"))->num_rows() <= 0) {
         if ($this->db->insert('pegawai', $data_pegawai)) {
           $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Menyimpan Data","type" => "success" ));
         } else {
           $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
         }
         redirect('Pegawai');
       }else{
         $this->session->set_flashdata('form',$data);
         $this->session->set_flashdata('notifJS', array('heading' => "Peringatan",'text'=>"NIK sudah digunakan, Mohon Untuk Menggunakan NIK Lain","type" => "warning" ));
         redirect("Pegawai/input");
       }
    }

    public function detail()
    {
      $nik = $this->uri->segment(3);
      $data = array(
        'form'      => 'Pegawai/form',
        'body'      => 'Pegawai/edit',
        'pegawai'   => $this->ModelPegawai->get_data_edit($nik),
        'user'      => $this->ModelUsers->get_account($nik)->result(),
        'jabatan'   => $this->ModelJabatan->get_data()->result(),
        "kota"          => $this->ModelAlamat->get_kota()->result(),
        "provinsi"      => $this->ModelAlamat->get_provinsi()->result(),
       );
      $this->load->view('index', $data);
    }


    public function update()
    {
      $nik = $this->input->post('id');
      $data_pegawai = array(
        // 'nik'         => $this->input->post("nik"),
        'nama'        => $this->input->post("nama"),
        'provinsi'        => $this->input->post("provinsi"),
        'kabupaten'        => $this->input->post("kabupaten"),
        'alamat'        => $this->input->post("alamat"),
        'telepon'        => $this->input->post("telepon"),
        'status_pegawai'        => 1,
        'tgl_lahir'        => $this->input->post("tgl_lahir"),
        'tgl_mulai_kerja'        => $this->input->post("tgl_mulai_kerja"),
        'jk'          => $this->input->post("jk"),
        'unsur'       => $this->input->post("unsur"),
        'kode_desa'   => $this->input->post("kode_desa"),
        'idkecamatan'       =>  $this->input->post("kecamatan_proker"),
        'aktif'       =>  $this->input->post("aktif"),
        'update_on'        => date("Y-m-d H:i:s"),
       );
      $this->db->where('nik',$nik);
      if ($this->db->update('pegawai', $data_pegawai)) {
        $this->session->set_flashdata('alert', $this->Core->alert_succcess('Berhasil Tersimpan'));
        redirect('Pegawai');
      } else {
        $this->session->set_flashdata('alert', $this->Core->alert_danger('Gagal Tersimpan'));
      }

    }

    function delete()
    {
      $id = $this->input->post('id');
      $cek = $this->db->where_in('pegawai_NIK', $id)->get('user')->num_rows();
      if ($cek>0) {
          $this->session->set_flashdata('alert', $this->Core->alert_succcess('Gagal Hapus Data Pegawai, Data masih Terrelasi!!!'));

              // $this->session->set_flashdata('alert', $this->Core->alert_succcess('Gagal Hapus Data Pegawai, Data masih Terrelasi!!!'));
        redirect('Pegawai');
      }else{
        $this->db->where_in('NIK', $id);
        if ($delete = $this->db->delete('pegawai')) {
            $this->session->set_flashdata('alert', $this->Core->alert_succcess('Berhasil Hapus Data Pegawai'));
        }else{
            $this->session->set_flashdata('alert', $this->Core->alert_succcess('Gagal Hapus Data Pegawai, Data masih Terrelasi!!!'));
        };
        redirect('Pegawai');
      }

    }

    function input_riwayat_pendidikan()
      {
        $data = array(
          'form'                   => 'Pegawai/form_riwayat_pendidikan',
          'body'                   => 'Pegawai/input_riwayat_pendidikan',

         );
        $this->load->view('index', $data);
      }

    public function insert_riwayat_pendidikan(){

        $data = array(
        'jenjang_pendidikan'       => $this->input->post("jenjang_pendidikan"),
        'kode_pt'                  => $this->input->post("kode_pt"),
        'program_studi'            => $this->input->post("program_studi"),
        'tgl_lulus'                => $this->input->post("tgl_lulus"),
        'no_ijazah'                => $this->input->post("no_ijazah"),
        'nama_sekolah'             => $this->input->post("nama_sekolah"),
        'pegawai_nik'              => $this->input->post("pegawai_nik")
        );
       if ($this->db->insert('riwayat_pendidikan', $data)) {
         echo "berhasil";
           redirect(base_url().'Pegawai/detail/'.$this->input->post("pegawai_nik"));
       } else {
         echo "gagal";
         // redirect(base_url().'');
       }
      }
      function input_riwayat_jabatan()
      {
        $data = array(
          'form'       =>  'Pegawai/form_riwayat_jabatan',
          'body'       =>  'Pegawai/input_riwayat_jabatan',
        );
        $this->load->view('index', $data);
      }

      public function insert_riwayat_jabatan()
      {
        $data = array(
        'jabatan_akademik'   => $this->input->post("jabatan_akademik"),
        'tgl_sk'             => $this->input->post("tgl_sk"),
        'no_sk'              => $this->input->post("no_sk"),
        'angka_kredit'       => $this->input->post("angka_kredit"),
        'pegawai_nik'        => $this->input->post("pegawai_nik")
        );
       if ($this->db->insert('riwayat_jabatan', $data)) {
         echo "berhasil";
        redirect(base_url().'Pegawai/detail/'.$this->input->post("pegawai_nik"));
       } else {
         echo "gagal";
         // redirect(base_url().'');
       }
      }

      function hapus_riwayat_pendidikan()
      {

        $id = $this->uri->segment(3);
        $this->db->where('idriwayat_pendidikan', $id);
        $delete = $this->db->delete('riwayat_pendidikan');
        if ($delete == true) {
          redirect(base_url().'Pegawai/detail/'.$this->uri->segment(4));
        }else {
            echo "gagal";
        };
      }

      function hapus_riwayat_jabatan()
      {
        $id = $this->uri->segment(3);
        $this->db->where('idriwayat_jabatan', $id);
        $delete = $this->db->delete('riwayat_jabatan');
        if ($delete == true ){
          redirect(base_url().'Pegawai/detail/'.$this->uri->segment(4));
        } else {
          echo "gagal";
        };
      }
  }
?>
