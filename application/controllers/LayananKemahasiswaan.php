<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LayananKemahasiswaan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelLayananKemahasiswaan");
  }

  function index()
  {
    $data = array(
      'data'     => $this->ModelLayananKemahasiswaan->get_all()->result(),
     );
    $this->load->view('Landing/LayananKemahasiswaan/list',$data);
  }

  function detail($id)
  {
    $data = array(
      'data'  => $this->ModelLayananKemahasiswaan->get_data($id)->row_array(),
     );
    $this->load->view('Landing/LayananKemahasiswaan/detail',$data);
  }

  function LayananKemahasiswaan(){
  $data = array(
    'body'  => 'LayananKemahasiswaan/list' ,
    'data'  => $this->ModelLayananKemahasiswaan->get_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'LayananKemahasiswaan/form',
      'body' => 'LayananKemahasiswaan/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'nama_layanan'  => $this->input->post("nama_layanan"),
      'deskripsi'     => $this->input->post("deskripsi"),
      'dokumen'       => $this->upload_file("dokumen")["link"],
    );
    if ($this->db->insert('layanan_kemahasiswaan', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
    }
    redirect(base_url().'LayananKemahasiswaan/LayananKemahasiswaan');
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'LayananKemahasiswaan/form',
      'body'          => 'LayananKemahasiswaan/edit' ,
      'data'          => $this->ModelLayananKemahasiswaan->get_data($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $id = $this->input->post("id");
    $data = array(
      'nama_layanan'  => $this->input->post("nama_layanan"),
      'deskripsi'     => $this->input->post("deskripsi"),
    );
    if ($_FILES["dokumen"]["name"] == null) {
      $this->db->where('idlayanan_kemahasiswaan', $id);
      if ($this->db->update('layanan_kemahasiswaan', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
    }else {
      $LayananKemahasiswaan = $this->ModelLayananKemahasiswaan->get_data($id)->row_array();
      unlink('./'.$LayananKemahasiswaan['dokumen']);
      $data['foto'] = $this->upload_file("dokumen")["link"];
      $this->db->where('idlayanan_kemahasiswaan', $id);
        if ($this->db->update('layanan_kemahasiswaan', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
        }else {
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
        }

    }
        redirect("LayananKemahasiswaan/LayananKemahasiswaan");
  }

  function hapus($id)
  {
      $this->db->where("idlayanan_kemahasiswaan", $id);
      if ($this->db->delete('layanan_kemahasiswaan')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'LayananKemahasiswaan/LayananKemahasiswaan');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'LayananKemahasiswaan/LayananKemahasiswaan');
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


}
