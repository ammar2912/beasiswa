<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelAgenda");
    $this->load->model("ModelPengumuman");
  }

  function index()
  {
    $data = array(
      'data'  => $this->ModelAgenda->get_Agenda_all()->result(),
      'terbaru'   => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
     );
    $this->load->view('Landing/Agenda/list',$data);
  }

  function detail($id)
  {
    $data = array(
      'data'      => $this->ModelAgenda->get_edit($id)->row_array(),
      'terbaru'   => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
     );
    $this->load->view('Landing/Agenda/detail',$data);
  }

  function Agenda(){
  $data = array(
    'body'  => 'Agenda/list' ,
    'data'  => $this->ModelAgenda->get_Agenda_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'Agenda/form',
      'body' => 'Agenda/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'judul'     => $this->input->post("judul"),
      'keterangan'=> $this->input->post("keterangan"),
      'tanggal' => date("Y-m-d"),
      'foto'    => $this->upload_file("foto")["link"],
    );
    if ($this->db->insert('agenda', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      redirect(base_url().'Agenda/Agenda');
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      redirect(base_url().'Agenda/Agenda');
    }
  }

  function edit($Agenda)
  {
    $data = array(
      'form'          => 'Agenda/form',
      'body'          => 'Agenda/edit' ,
      'data'  => $this->ModelAgenda->get_edit($Agenda)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $patch = "desain/foto/agenda/";
    // echo $patch;
    $config['upload_path']          = "./".$patch;
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 11240;
    $idagenda = $this->input->post("id");
    $data = array(
      'judul'   => $this->input->post("judul"),
      'keterangan'=> $this->input->post("keterangan"),
    );
    if ($_FILES["foto"]["name"] == null) {
      $this->db->where('idagenda', $idagenda);
      if ($this->db->update('agenda', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
    }else {
      $Agenda = $this->ModelAgenda->get_edit($idagenda)->row_array();
      unlink('./'.$Agenda['foto']);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $data['foto'] = $patch.$this->upload->data()['file_name'];
        $this->db->where('idagenda', $idagenda);
        if ($this->db->update('agenda', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
        }else {
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
        }
      }
    }
        redirect("Agenda/Agenda");
  }

  function hapus($id)
  {
      $this->db->where("idagenda", $id);
      if ($this->db->delete('agenda')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'Agenda/Agenda');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'Agenda/Agenda');
      }
  }

  function upload_file($file){
    $msg="";
    $nama="";
    $config['upload_path']          = './desain/foto/Agenda';
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
