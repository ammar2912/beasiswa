<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelPengumuman");
  }

  function index()
  {
    redirect("Pengumuman/page/0");
  }

  function page($page = 0)
  {
    $limit_page = ceil($this->ModelPengumuman->get_pengumuman_all()->num_rows() / 10) - 1;
    $data = array(
      'data'  => $this->ModelPengumuman->get_page($page)->result(),
      'limit_page' => $limit_page
     );
     // echo json_encode($data);
    $this->load->view("Landing/Pengumuman/pengumuman", $data);
  }

  function detail($id)
  {
    $data = array(
      'data'  => $this->ModelPengumuman->get_data($id)->row_array(),
      'terbaru'  => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
     );
    $this->load->view('Landing/Pengumuman/detail',$data);
  }

  function Pengumuman(){
  $data = array(
    'body'  => 'Pengumuman/list' ,
    'data'  => $this->ModelPengumuman->get_Pengumuman_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'Pengumuman/form',
      'body' => 'Pengumuman/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'judul'   => $this->input->post("judul"),
      'keterangan'   => $this->input->post("keterangan"),
      'tanggal' => date("Y-m-d"),
      'foto'    => $this->upload_file("foto")["link"],
    );
    if ($this->db->insert('pengumuman', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      redirect(base_url().'Pengumuman/Pengumuman');
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      redirect(base_url().'Pengumuman/Pengumuman');
    }
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'Pengumuman/form',
      'body'          => 'Pengumuman/edit' ,
      'data'          => $this->ModelPengumuman->get_data($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $patch = "desain/foto/pengumuman/";
    // echo $patch;
    $config['upload_path']          = "./".$patch;
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 11240;
    $id = $this->input->post("id");
    $data = array(
      'judul'   => $this->input->post("judul"),
      'keterangan'   => $this->input->post("keterangan"),
    );
    if ($_FILES["foto"]["name"] == null) {
      $this->db->where('idpengumuman', $id);
      if ($this->db->update('pengumuman', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
    }else {
      $Pengumuman = $this->ModelPengumuman->get_data($id)->row_array();
      unlink('./'.$Pengumuman['foto']);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $data['foto'] = $patch.$this->upload->data()['file_name'];
        $this->db->where('idpengumuman', $id);
        if ($this->db->update('pengumuman', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
        }else {
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
        }
      }
    }
        redirect("Pengumuman/Pengumuman");
  }

  function hapus($idgallary)
  {
      $this->db->where("idpengumuman", $idgallary);
      if ($this->db->delete('pengumuman')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'Pengumuman/Pengumuman');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'Pengumuman/Pengumuman');
      }
  }

  function upload_file($file){
    $msg="";
    $nama="";
    $config['upload_path']          = './desain/foto/pengumuman';
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
                  'link' => "desain/foto/pengumuman/".$nama);
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
