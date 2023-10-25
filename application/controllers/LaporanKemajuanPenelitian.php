<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanKemajuanPenelitian extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelJurusan");
    $this->load->model("ModelLaporan");
    $this->load->model("ModelPenelitian");
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
      'body'      => 'LaporanKemajuan/Penelitian/list',
      'penelitian'=> BridgeP3M("proposal_penelitian?id_proposal=".$idlaporan."&program=".$program)[0],
      'laporan'   => $this->ModelLaporan->getall_l_kemajuan_penilitian($id)->result()
     );
    $this->load->view('index', $data);
  }

  function laporanLama($id)
  {
    $data = array(
      'body'      => 'LaporanKemajuan/Penelitian/list',
      'penelitian'=>  $this->ModelPenelitian->get_data($id)->row_array(),
      'laporan'   => $this->ModelLaporan->getall_l_kemajuan_penilitian($id)->result()
     );
    $this->load->view('index', $data);
  }

  public function dataLaporan()
  {
    $tahun = $this->input->post("tahun");
    $id = $this->input->post("id");
    $html = "";
    $no = 1;
    if ($this->ModelLaporan->getall_l_kemajuan_penilitian($id, $tahun)->num_rows() > 0) {
      foreach ($this->ModelLaporan->getall_l_kemajuan_penilitian($id, $tahun)->result() as $value) {
        $html .= "<tr><td>".$no++."</td>
        <td>".$value->ringkasan."</td>
        <td>".$value->keyword."</td>
        <td>".date('d-m-Y', strtotime($value->tgl_kemajuan))."</td>
        <td><a href=\"".base_url('LaporanKemajuanPenelitian/edit/').$value->idlaporan_kemajuan."\">
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
      'body'    => 'LaporanKemajuan/Penelitian/input',
      'form'    => 'LaporanKemajuan/Penelitian/form',
      'penelitian'=> BridgeP3M("proposal_penelitian?id_proposal=".$idlaporan."&program=".$program)[0],
      'idMaster'=> $idMaster
     );
    $this->load->view('index', $data);
  }

  function edit($id)
  {
    $laporan = $this->ModelLaporan->get_laporan_kemajuan($id)->row_array();
    $kode = substr($laporan['master_penelitian_idprop_penelitian'],0,1);
    $idlaporan = substr($laporan['master_penelitian_idprop_penelitian'],1);
    $program = "";
    if ($kode == "P") {
      $program = "PNBP";
    }elseif ($kode == "M") {
      $program = "MANDIRI";
    }
    $data = array(
      'body'    => 'LaporanKemajuan/Penelitian/edit',
      'lapkemajuan' => $laporan,
      'penelitian'=> BridgeP3M("proposal_penelitian?id_proposal=".$idlaporan."&program=".$program)[0],
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
      'master_penelitian_idprop_penelitian' => $idMaster
     );
    if ($this->db->insert("laporan_kemajuan_penelitian", $data)) {
      $id_laporan = $this->db->insert_id();
      $luaran = array(
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
