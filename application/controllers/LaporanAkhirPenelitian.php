<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanAkhirPenelitian extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelJurusan");
    $this->load->model("ModelLaporan");
    $this->load->model("ModelPenelitian");
  }

  function input($idMaster)
  {
    $data = array(
      'body'    => 'LaporanAkhir/Penelitian/input',
      'form'    => 'LaporanAkhir/Penelitian/form',
      'idMaster'=> $idMaster
     );
    $this->load->view('index', $data);
  }

  function edit($idlaporan)
  {
    $laporan = $this->ModelPenelitian->get_laporan_akhir($idlaporan)->row_array();
    $data = array(
      'body'    => 'LaporanAkhir/Penelitian/edit',
      'lapkemajuan' => $laporan,
      'luaran'  => $this->ModelPenelitian->get_luaran_penelitian($laporan['idlaporan_kemajuan'])->row_array()
     );
    $this->load->view('index', $data);
  }

  function insert(){
    $idMaster = $this->input->post("idMaster");
    $nama_File_Lk = $this->Upload_File("file_lk");
    $data = array(
      'ringkasan'     => $this->input->post("ringkasan"),
      'keyword'       => $this->input->post("keyword"),
      'tgl_kemajuan'  => $this->input->post("tgl_kemajuan"),
      'file_lk'       => $nama_File_Lk,
      'tipe_laporan'  => 2,
      'master_penelitian_idprop_penelitian' => $idMaster
     );
    if ($this->db->insert("laporan_kemajuan_penelitian", $data)) {
      $id_laporan = $this->db->insert_id();
      $luaran = array(
        'nama'                                            => $this->input->post('nama'),
        'laporan_kemajuan_penelitian_idlaporan_kemajuan'  => $id_laporan,
        'status_dokumen'                                  => $this->input->post('status_dokumen'),
        'tgl_pengujian'                                   => $this->input->post('tanggal'),
        'link_video'                                      => $this->input->post('link_video'),
        'file_dok_deskripsi'                              => $this->Upload_File("file_dok_deskripsi"),
        'file_dok_ujicoba'                                => $this->Upload_File("file_dok_ujicoba"),
        'file_dok_ujiproduk'                              => $this->Upload_File("file_dok_ujiproduk"),
      );
      if ($this->db->insert("luaran_wajib_penelitian", $luaran)) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Menyimpan Data","type" => "success" ));
      }else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
      }
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
    }
    redirect('Penelitian');
  }

  function update(){
    $idlaporan = $this->input->post("idlaporan");
    $idluaran = $this->input->post("idluaran");
    $nama_File_Lk = $this->Upload_File("file_lk");
    $data = array(
      'ringkasan'     => $this->input->post("ringkasan"),
      'keyword'       => $this->input->post("keyword"),
      'tgl_kemajuan'  => $this->input->post("tgl_kemajuan"),
     );
     if ($nama_File_Lk != "" || $nama_File_Lk != null) {
       $data['file_lk'] = $nama_File_Lk;
     }
     $this->db->where("idlaporan_kemajuan", $idlaporan);
    if ($this->db->update("laporan_kemajuan_penelitian", $data)) {
      $nama_dok_deskripsi = $this->Upload_File("file_dok_deskripsi");
      $nama_dok_ujicoba = $this->Upload_File("file_dok_ujicoba");
      $nama_dok_ujiproduk = $this->Upload_File("file_dok_ujiproduk");
      $luaran = array(
        'nama'                                            => $this->input->post('nama'),
        'status_dokumen'                                  => $this->input->post('status_dokumen'),
        'tgl_pengujian'                                   => $this->input->post('tanggal'),
        'link_video'                                      => $this->input->post('link_video'),
      );
      if ($nama_dok_deskripsi != "" || $nama_dok_deskripsi != null) {
        $luaran['file_dok_deskripsi'] = $nama_dok_deskripsi;
      }
      if ($nama_dok_ujicoba != "" || $nama_dok_ujicoba != null) {
        $luaran['file_dok_ujicoba'] = $nama_dok_ujicoba;
      }
      if ($nama_dok_ujiproduk != "" || $nama_dok_ujiproduk != null) {
        $luaran['file_dok_ujiproduk'] = $nama_dok_ujiproduk;
      }
      $this->db->where("idluaran_wajib", $idluaran);
      if ($this->db->update("luaran_wajib_penelitian", $luaran)) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Menyimpan Data","type" => "success" ));
      }else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
      }
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
    }
    redirect('Penelitian');
  }


  public function Upload_File($name)
  {
    $nama_File_Lk = "";
    $config['upload_path']          = './desain/prop_penelitian';
    $config['allowed_types']        = '*';
    $config['max_size']             = 10000;
    $this->load->library('upload', $config);
    if ( !$this->upload->do_upload($name))
    {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>$this->upload->display_errors(),"type" => "danger" ));
      // redirect('Penelitian');
      // echo $this->upload->display_errors();
      // break;
    }else{
      $upload = $this->upload->data();
      $nama_File_Lk ="desain/prop_penelitian/".$upload["file_name"];
    }
    return $nama_File_Lk;
  }

}
