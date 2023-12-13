<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelBeasiswa");
  }

  function index()
  {
    $data = array(
      'data'     => $this->ModelBeasiswa->get_all()->result(),
     );
    $this->load->view('Landing/Beasiswa/list',$data);
  }

  function detail($id)
  {
    $data = array(
      'data'  => $this->ModelBeasiswa->get_data($id)->row_array(),
     );
    $this->load->view('Beasiswa/detail',$data);
  }

  function Beasiswa(){
  $data = array(
    'body'  => 'Beasiswa/list' ,
    'data'  => $this->ModelBeasiswa->get_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'Beasiswa/form',
      'body' => 'Beasiswa/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'nama_beasiswa'  => $this->input->post("nama_beasiswa"),
      'penyelenggara'     => $this->input->post("penyelenggara"),
      'deskripsi'     => $this->input->post("deskripsi"),
      'tgl_pendaftaran'     => $this->input->post("tgl_pendaftaran"),
      'tgl_penutupan'     => $this->input->post("tgl_penutupan"),
      'berkas'       => $this->upload_file("berkas")["link"],
    );
    if ($this->db->insert('beasiswa', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
    }
    redirect(base_url().'Beasiswa/Beasiswa');
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'Beasiswa/form',
      'body'          => 'Beasiswa/edit' ,
      'data'          => $this->ModelBeasiswa->get_data($id)->row_array(),
    );
    $this->load->view('index', $data);
  }



  function update()
  {
    $id = $this->input->post("id");
    $data = array(
      'nama_beasiswa'  => $this->input->post("nama_beasiswa"),
      'penyelenggara'     => $this->input->post("penyelenggara"),
      'deskripsi'  => $this->input->post("deskripsi"),
      'tgl_pendaftaran'     => $this->input->post("tgl_pendaftaran"),
      'tgl_penutupan'  => $this->input->post("tgl_penutupan"),
    );
    if ($_FILES["berkas"]["name"] == null) {
      $this->db->where('id_beasiswa', $id);
      if ($this->db->update('beasiswa', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
    }else {
      $LayananKemahasiswaan = $this->ModelBeasiswa->get_data($id)->row_array();
      unlink('./'.$LayananKemahasiswaan['berkas']);
      $data['berkas'] = $this->upload_file("berkas")["link"];
      $this->db->where('id_beasiswa', $id);
        if ($this->db->update('beasiswa', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
        }else {
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
        }

    }
      redirect("Beasiswa/Beasiswa");
  }



  function hapus($id)
  {
      $this->db->where("id_beasiswa", $id);
      if ($this->db->delete('beasiswa')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'Beasiswa/Beasiswa');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'Beasiswa/Beasiswa');
      }
  }

  function upload_file($file){
    $msg="";
    $nama="";
    $config['upload_path']          = './Dokumen';
    $config['allowed_types']        = '*';
    $config['max_size']             = 11240;
    echo $_FILES[$file]["name"];
    if ($_FILES[$file]["name"]){
                $this->load->library('upload', $config);
                if ( !$this->upload->do_upload($file))
                {
                        $msg= $this->upload->display_errors();
                }
                else
                {
                        $upload = $this->upload->data();
                        $nama = $upload['file_name'];
                        $msg = "Berhasil Upload ".$nama;
                }
              } else {
                $msg="File Kosong";
              }
    return  array('pesan' => $msg,
                  'nama' => $nama,
                  'link' => "Dokumen/".$nama);
    }


    public function detailbeasiswa()
    {
      $this->load->view('Beasiswa/detail');
    }

    public function loginbeasiswa()
    {
      $this->load->view('Beasiswa/login');
    }

    public function datapribadibeasiswa()
    {
      $this->load->view('Beasiswa/datapribadi');
    }



}
