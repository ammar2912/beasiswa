<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KomiteEtik extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelKomiteEtik");
    $this->load->model("ModelPengumuman");
  }

  function index()
  {
    $data = array(
      'data'  => $this->ModelKomiteEtik->get_komite_etik_all()->result(),
      'terbaru'   => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
     );
    $this->load->view('Landing/KomiteEtik/list',$data);
  }

  function detail($id)
  {
    $data = array(
      'data'      => $this->ModelKomiteEtik->get_edit($id)->row_array(),
      'terbaru'   => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
     );
    $this->load->view('Landing/KomiteEtik/detail.php',$data);
  }

  function KomiteEtik(){
  $data = array(
    'body'  => 'KomiteEtik/list' ,
    'data'  => $this->ModelKomiteEtik->get_komite_etik_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'KomiteEtik/form',
      'body' => 'KomiteEtik/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'judul'   => $this->input->post("judul"),
      'tanggal' => date("Y-m-d"),
      'foto'    => $this->upload_file("foto")["link"],
    );
    if ($this->db->insert('komite_etik', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      redirect(base_url().'KomiteEtik/KomiteEtik');
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      redirect(base_url().'KomiteEtik/KomiteEtik');
    }
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'KomiteEtik/form',
      'body'          => 'KomiteEtik/edit' ,
      'data'          => $this->ModelKomiteEtik->get_edit($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $patch = "desain/foto/komite_etik/";
    // echo $patch;
    $config['upload_path']          = "./".$patch;
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 11240;
    $id = $this->input->post("id");
    $data = array(
      'judul'   => $this->input->post("judul"),
    );
    if ($_FILES["foto"]["name"] == null) {
      $this->db->where('idkomite_etik', $id);
      if ($this->db->update('komite_etik', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
    }else {
      $komite_etik = $this->ModelKomiteEtik->get_edit($id)->row_array();
      unlink('./'.$komite_etik['foto']);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $data['foto'] = $patch.$this->upload->data()['file_name'];
        $this->db->where('idkomite_etik', $id);
        if ($this->db->update('komite_etik', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
        }else {
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
        }
      }
    }
        redirect("KomiteEtik/KomiteEtik");
  }

  function hapus($id)
  {
      $this->db->where("idkomite_etik", $id);
      if ($this->db->delete('komite_etik')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'KomiteEtik/KomiteEtik');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'KomiteEtik/KomiteEtik');
      }
  }

  function upload_file($file){
    $msg="";
    $nama="";
    $config['upload_path']          = './desain/foto/komite_etik';
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
                  'link' => "desain/foto/Agenda/".$nama);
    }

  // function tentangkami()
  // {
  //   $data = array(
  //     'aboutus'  => $this->ModelAboutus->get_aboutus()->result(),
  //     'tim'  => $this->ModelTim->get_tim()->result(),
  //    );
  //   $this->load->view('LandingPage/Home/tentangkami.php',$data);
  // }

}
