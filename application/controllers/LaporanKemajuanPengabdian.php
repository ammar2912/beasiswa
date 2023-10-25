<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanKemajuanPengabdian extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelJurusan");
    $this->load->model("ModelLaporan");
    $this->load->model("ModelPengabdian");
  }

  function laporan($id)
  {
    $kode = substr($id,0,1);
    $idlaporan = substr($id,1);
    $program = "";
    if ($kode == "P") {
      $program = "PNBP";
    }elseif ($kode == "M") {
      $program = "MANDIRI";
    }
    $data = array(
      'body'        => 'LaporanKemajuan/Pengabdian/list',
      'pengabdian'  => BridgeP3M("proposal_pengabdian?id_proposal=".$idlaporan."&program=".$program)[0],
      'laporan'     => $this->ModelLaporan->getall_l_kemajuan_penilitian($id)->result()
     );
    $this->load->view('index', $data);
  }

  public function dataLaporan()
  {
    $tahun = $this->input->post("tahun");
    $id = $this->input->post("id");
    $html = "";
    $no = 1;
    if ($this->ModelPengabdian->getall_l_kemajuan_pengabdian($id, $tahun)->num_rows() > 0) {
      foreach ($this->ModelPengabdian->getall_l_kemajuan_pengabdian($id, $tahun)->result() as $value) {
        $html .= "<tr><td>".$no++."</td>
        <td>".$value->ringkasan."</td>
        <td>".$value->keyword."</td>
        <td>".date('d-m-Y', strtotime($value->tgl_kemajuan))."</td>
        <td><a href=\"".base_url('LaporanKemajuanPengabdian/edit/').$value->idlaporan_kemajuan_pengabdian."\">
              <button type=\"button\" class=\"btn btn-floating btn-info\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Detail\" data-original-title=\"Laporan Akhir\">
                <i class=\"fa fa-search\"></i>
              </button>
              </a></td>";
      }
      echo $html;
    }else {
      echo "<td colspan='10'>Mohon Maaf Data Kosong</td>";
    }

  }

  function input($idMaster)
  {
    $kode = substr($idMaster,0,1);
    $idlaporan = substr($idMaster,1);
    $program = "";
    if ($kode == "P") {
      $program = "PNBP";
    }elseif ($kode == "M") {
      $program = "MANDIRI";
    }
    $data = array(
      'body'    => 'LaporanKemajuan/Pengabdian/input',
      'form'    => 'LaporanKemajuan/Pengabdian/form',
      'pengabdian'  => BridgeP3M("proposal_pengabdian?id_proposal=".$idlaporan."&program=".$program)[0],
      'idMaster'=> $idMaster
     );
    $this->load->view('index', $data);
  }

  function edit($idlaporan)
  {
    $laporan = $this->ModelPengabdian->get_laporan_kemajuan($idlaporan)->row_array();
    $kode = substr($laporan['master_pengabdian_idmaster_pengabdian'],0,1);
    $idlaporan = substr($laporan['master_pengabdian_idmaster_pengabdian'],1);
    $program = "";
    if ($kode == "P") {
      $program = "PNBP";
    }elseif ($kode == "M") {
      $program = "MANDIRI";
    }
    $data = array(
      'body'    => 'LaporanKemajuan/Pengabdian/edit',
      'lapkemajuan' => $laporan,
      'pengabdian'  => BridgeP3M("proposal_pengabdian?id_proposal=".$idlaporan."&program=".$program)[0],
      'luaran'  => $this->ModelPengabdian->get_luaran_pengabdian($laporan['idlaporan_kemajuan_pengabdian'])->row_array()
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
      'file_lp'       => $nama_File_Lk,
      'master_pengabdian_idmaster_pengabdian' => $idMaster
     );
    if ($this->db->insert("laporan_kemajuan_pengabdian", $data)) {
      $id_laporan = $this->db->insert_id();
      $luaran = array(
        'laporan_kemajuan_pengabdian_idlaporan_kemajuan_pengabdian'  => $id_laporan,
        'nama'                                            => $this->input->post("nama"),
        'status_dokumen'                                  => $this->input->post('status_dokumen'),
        'tgl_pengujian'                                   => $this->input->post('tanggal'),
        'link_video'                                      => $this->input->post('link_video'),
        'file_dok_deskripsi'                              => $this->Upload_File("file_dok_deskripsi"),
        'file_dok_ujicoba'                                => $this->Upload_File("file_dok_ujicoba"),
        'file_dok_ujiproduk'                              => $this->Upload_File("file_dok_ujiproduk"),
      );
      if ($this->db->insert("luaran_wajib_pengabdian", $luaran)) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Menyimpan Data","type" => "success" ));
      }else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
      }
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
    }
    redirect('Pengabdian');
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
       $data['file_lp'] = $nama_File_Lk;
     }
     $this->db->where("idlaporan_kemajuan_pengabdian", $idlaporan);
    if ($this->db->update("laporan_kemajuan_pengabdian", $data)) {
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
      $this->db->where("idluaran_wajib_pengabdian", $idluaran);
      if ($this->db->update("luaran_wajib_pengabdian", $luaran)) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Menyimpan Data","type" => "success" ));
      }else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
      }
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
    }
    redirect('Pengabdian');
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
