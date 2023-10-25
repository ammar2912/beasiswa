<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanDosen extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelLaporanDosen");
    $this->load->model("ModelPegawai");
    $this->load->model("ModelPenelitian");

  }

  function LaporanPenelitian()
  {
    $data = array(
      'body'    => 'LaporanDosen/LaporanPenelitian',
     );
    $this->load->view('index', $data);
  }

  public function getLaporanPenelitian()
  {
    $awal = date("Y-m-d", strtotime($this->input->post("awal")));
    $akhir = date("Y-m-d", strtotime($this->input->post("akhir")));
    $dosen = BridgeP3M("proposal_penelitian");
    $html = "";
    $no = 1;
    foreach ($dosen as $value) {
      $id_check = 1;
      if ($value->program == "PNBP") {
        $id_check = "P".$value->id_proposal;
      }elseif ($value->program == "MANDIRI") {
        $id_check = "M".$value->id_proposal;
      }
      $status = $this->ModelLaporanDosen->get_laporan_penelitian($awal,$akhir,$id_check)->num_rows();
      if ($status == 0) {
        $html .= "<tr><td>".$no++."</td>
        <td>$value->nip_ketua</td>
        <td>$value->nama_ketua</td>
        <td>$value->judul</td>
        <td>Belum Upload Laporan Penelitian</td>
        </tr>";
      }
    }
    echo $html;
  }
  public function getRekapLaporanPenelitian()
  {
    $awal = date("Y-m-d", strtotime($this->input->post("awal")));
    $akhir = date("Y-m-d", strtotime($this->input->post("akhir")));
    $dosen = BridgeP3M("proposal_penelitian");
    $html = "";
    $no = 1;
    foreach ($dosen as $value) {
      $id_check = 1;
      if ($value->program == "PNBP") {
        $id_check = "P".$value->id_proposal;
      }elseif ($value->program == "MANDIRI") {
        $id_check = "M".$value->id_proposal;
      }
      $status = $this->ModelLaporanDosen->get_laporan_penelitian($awal,$akhir,$id_check)->num_rows();
      $laporan = $this->ModelLaporanDosen->get_laporan_penelitian($awal,$akhir,$id_check)->row_array();
      if ($status > 0) {
        $tgl_kemajuan = date("d-m-Y", strtotime($laporan['tgl_kemajuan']));
      }else {
        $tgl_kemajuan = "Belum Upload";
      }
        $html .= "<tr><td>".$no++."</td>
        <td>$value->nip_ketua</td>
        <td>$value->nama_ketua</td>
        <td>$value->judul</td>
        <td>$value->program</td>
        <td>".$tgl_kemajuan."</td>
        <td>$status</td>
        </tr>";
    }
    echo $html;
  }

  function LaporanPenelitianAkhir()
  {
    $data = array(
      'body'    => 'LaporanDosen/LaporanPenelitianAkhir',
     );
    $this->load->view('index', $data);
  }

  public function getLaporanPenelitianakAkhir()
  {
    $awal = date("Y-m-d", strtotime($this->input->post("awal")));
    $akhir = date("Y-m-d", strtotime($this->input->post("akhir")));
    $dosen = BridgeP3M("proposal_penelitian");
    $html = "";
    $no = 1;
    foreach ($dosen as $value) {
      $id_check = 1;
      if ($value->program == "PNBP") {
        $id_check = "P".$value->id_proposal;
      }elseif ($value->program == "MANDIRI") {
        $id_check = "M".$value->id_proposal;
      }
      $status = $this->ModelLaporanDosen->get_laporan_penelitian_akhir($awal,$akhir,$id_check)->num_rows();
      if ($status == 0) {
        $html .= "<tr><td>".$no++."</td>
        <td>$value->nip_ketua</td>
        <td>$value->nama_ketua</td>
        <td>$value->judul</td>
        <td>Belum Upload Laporan Penelitian Akhir</td>
        </tr>";
      }
    }
    echo $html;
  }
  public function getRekapLaporanPenelitianAkhir()
  {
    $awal = date("Y-m-d", strtotime($this->input->post("awal")));
    $akhir = date("Y-m-d", strtotime($this->input->post("akhir")));
    $dosen = BridgeP3M("proposal_penelitian");
    $html = "";
    $no = 1;
    foreach ($dosen as $value) {
      $id_check = 1;
      if ($value->program == "PNBP") {
        $id_check = "P".$value->id_proposal;
      }elseif ($value->program == "MANDIRI") {
        $id_check = "M".$value->id_proposal;
      }
      $status = $this->ModelLaporanDosen->get_laporan_penelitian_akhir($awal,$akhir,$id_check)->num_rows();
      $laporan = $this->ModelLaporanDosen->get_laporan_penelitian_akhir($awal,$akhir,$id_check)->row_array();
      if ($status > 0) {
        $tgl_kemajuan = date("d-m-Y", strtotime($laporan['tgl_kemajuan']));
      }else {
        $tgl_kemajuan = "Belum Upload";
      }
        $html .= "<tr><td>".$no++."</td>
        <td>$value->nip_ketua</td>
        <td>$value->nama_ketua</td>
        <td>$value->judul</td>
        <td>$value->program</td>
        <td>".$tgl_kemajuan."</td>
        <td>$status</td>
        </tr>";
    }
    echo $html;
  }


  // -------PENGABDIAN

  function LaporanPengabdian()
  {
    $data = array(
      'body'    => 'LaporanDosen/LaporanPengabdian',
     );
    $this->load->view('index', $data);
  }

  public function getLaporanPengabdian()
  {
    $awal = date("Y-m-d", strtotime($this->input->post("awal")));
    $akhir = date("Y-m-d", strtotime($this->input->post("akhir")));
    $dosen = BridgeP3M("proposal_pengabdian");
    $html = "";
    $no = 1;
    foreach ($dosen as $value) {
      $id_check = 1;
      if ($value->program == "PNBP") {
        $id_check = "P".$value->id_proposal;
      }elseif ($value->program == "MANDIRI") {
        $id_check = "M".$value->id_proposal;
      }
      $status = $this->ModelLaporanDosen->get_laporan_pengabdian($awal,$akhir,$id_check)->num_rows();
      if ($status == 0) {
        $html .= "<tr><td>".$no++."</td>
        <td>$value->nip_ketua</td>
        <td>$value->nama_ketua</td>
        <td>$value->judul</td>
        <td>Belum Upload Laporan Pengabdian</td>
        </tr>";
      }
    }
    echo $html;
  }
  public function getRekapLaporanPengabdian()
  {
    $awal = date("Y-m-d", strtotime($this->input->post("awal")));
    $akhir = date("Y-m-d", strtotime($this->input->post("akhir")));
    $dosen = BridgeP3M("proposal_pengabdian");
    $html = "";
    $no = 1;
    foreach ($dosen as $value) {
      $id_check = 1;
      if ($value->program == "PNBP") {
        $id_check = "P".$value->id_proposal;
      }elseif ($value->program == "MANDIRI") {
        $id_check = "M".$value->id_proposal;
      }
      $status = $this->ModelLaporanDosen->get_laporan_pengabdian($awal,$akhir,$id_check)->num_rows();
      $laporan = $this->ModelLaporanDosen->get_laporan_pengabdian($awal,$akhir,$id_check)->row_array();
      if ($status > 0) {
        $tgl_kemajuan = date("d-m-Y", strtotime($laporan['tgl_kemajuan']));
      }else {
        $tgl_kemajuan = "Belum Upload";
      }
        $html .= "<tr><td>".$no++."</td>
        <td>$value->nip_ketua</td>
        <td>$value->nama_ketua</td>
        <td>$value->judul</td>
        <td>$value->program</td>
        <td>".$tgl_kemajuan."</td>
        <td>$status</td>
        </tr>";
    }
    echo $html;
  }

  function LaporanPengabdianAkhir()
  {
    $data = array(
      'body'    => 'LaporanDosen/LaporanPengabdianAkhir',
     );
    $this->load->view('index', $data);
  }

  public function getLaporanPengabdianAkhir()
  {
    $awal = date("Y-m-d", strtotime($this->input->post("awal")));
    $akhir = date("Y-m-d", strtotime($this->input->post("akhir")));
    $dosen = BridgeP3M("proposal_pengabdian");
    $html = "";
    $no = 1;
    foreach ($dosen as $value) {
      $id_check = 1;
      if ($value->program == "PNBP") {
        $id_check = "P".$value->id_proposal;
      }elseif ($value->program == "MANDIRI") {
        $id_check = "M".$value->id_proposal;
      }
      $status = $this->ModelLaporanDosen->get_laporan_pengabdian_akhir($awal,$akhir,$id_check)->num_rows();
      if ($status == 0) {
        $html .= "<tr><td>".$no++."</td>
        <td>$value->nip_ketua</td>
        <td>$value->nama_ketua</td>
        <td>$value->judul</td>
        <td>Belum Upload Laporan Pengabdian Akhir</td>
        </tr>";
      }
    }
    echo $html;
  }
  public function getRekapLaporanPengabdianAkhir()
  {
    $awal = date("Y-m-d", strtotime($this->input->post("awal")));
    $akhir = date("Y-m-d", strtotime($this->input->post("akhir")));
    $dosen = BridgeP3M("proposal_pengabdian");
    $html = "";
    $no = 1;
    foreach ($dosen as $value) {
      $id_check = 1;
      if ($value->program == "PNBP") {
        $id_check = "P".$value->id_proposal;
      }elseif ($value->program == "MANDIRI") {
        $id_check = "M".$value->id_proposal;
      }
      $status = $this->ModelLaporanDosen->get_laporan_pengabdian_akhir($awal,$akhir,$id_check)->num_rows();
      $laporan = $this->ModelLaporanDosen->get_laporan_pengabdian_akhir($awal,$akhir,$id_check)->row_array();
      if ($status > 0) {
        $tgl_kemajuan = date("d-m-Y", strtotime($laporan['tgl_kemajuan']));
      }else {
        $tgl_kemajuan = "Belum Upload";
      }
        $html .= "<tr><td>".$no++."</td>
        <td>$value->nip_ketua</td>
        <td>$value->nama_ketua</td>
        <td>$value->judul</td>
        <td>$value->program</td>
        <td>".$tgl_kemajuan."</td>
        <td>$status</td>
        </tr>";
    }
    echo $html;
  }

}
