<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelPrestasi");
  }

  function index()
  {
    $data = array(
      'data'     => $this->ModelPrestasi->get_all()->result(),
     );
    $this->load->view('Landing/Prestasi/list',$data);
  }

  function detail($id)
  {
    $data = array(
      'data'  => $this->ModelPrestasi->get_data($id)->row_array(),
     );
    $this->load->view('Landing/Prestasi/detail',$data);
  }

  function Prestasi(){
  $data = array(
    'body'  => 'Prestasi/list' ,
    'data'  => $this->ModelPrestasi->get_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'Prestasi/form',
      'body' => 'Prestasi/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'nama_lomba'    => $this->input->post("nama_lomba"),
      'tingkat'       => $this->input->post("tingkat"),
      'prestasi'      => $this->input->post("prestasi"),
      'penyelenggara' => $this->input->post("penyelenggara"),
      'tanggal_lomba' => date("Y-m-d", strtotime($this->input->post("tanggal_lomba"))),
      'nama_mahasiswa'=> $this->input->post("nama_mahasiswa"),
      'prodi'         => $this->input->post("prodi"),
    );
    if ($this->db->insert('prestasi', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
    }
    redirect(base_url().'Prestasi/Prestasi');
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'Prestasi/form',
      'body'          => 'Prestasi/edit' ,
      'data'          => $this->ModelPrestasi->get_data($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $id = $this->input->post("id");
    $data = array(
      'nama_lomba'    => $this->input->post("nama_lomba"),
      'tingkat'       => $this->input->post("tingkat"),
      'prestasi'      => $this->input->post("prestasi"),
      'penyelenggara' => $this->input->post("penyelenggara"),
      'tanggal_lomba' => date("Y-m-d", strtotime($this->input->post("tanggal_lomba"))),
      'nama_mahasiswa'=> $this->input->post("nama_mahasiswa"),
      'prodi'         => $this->input->post("prodi"),
    );
    $this->db->where('idprestasi', $id);
      if ($this->db->update('prestasi', $data)) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
      }
      redirect("Prestasi/Prestasi");
  }

  function hapus($id)
  {
      $this->db->where("idprestasi", $id);
      if ($this->db->delete('prestasi')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'Prestasi/Prestasi');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'Prestasi/Prestasi');
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
