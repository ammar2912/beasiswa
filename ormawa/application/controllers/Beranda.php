<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelIuran");

  }

  function index($key=null)
  {
    // die($key);
    $data_pph = $this->db
    ->where("nik",$key)
    ->or_where("npwp",$key)
    ->get("pph")->result();
    $bank = $this->db->get("bank")->result();
    $data = array(
      'body' => 'Beranda/home',
      'pph' => $data_pph,
      'bank' => $bank
    );
    $this->load->view('Beranda/index', $data);
  }

  function get_data(){
    $key = $this->input->post("key");
    // $key = "34380948390";
    $data_pph = $this->db
    ->where("nik",$key)
    ->or_where("npwp",$key)
    ->get("pph")->result();
    $html = "";
    if (!empty($data_pph)) {
      $html .= '<div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>Tagihan/NIK/NPWP</th>
                    <th>format</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>';
      foreach ($data_pph as $data) {
        $id_check = $data->idpph;
        $html .= '<tr>
            <td>'.$data->nik.'/ '.$data->npwp.'</td>
            <td>PDF</td>
            <td><a target="_blank" href="'.base_url().'file/pph/'.$data->file.'">
              <button type="button" class="btn btn-primary btn-sm btn-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download File">
                <i class="fa fa-download"> Download</i>
              </button>
            </a></td>
        </tr>';
      }
      $html.='</tbody></table></div>';

      $this->db
      ->where("nik",$key)
      ->or_where("npwp",$key)
      ->update("pph",array("telepon"=>$this->input->post("telepon")));
    }else{
      $html .= "<h2>Data Tidak Ditemukan</h2>";
    }
    echo json_encode(array("html"=>$html));
  }

  function get_data_tagihan(){
    $key = $this->input->post("key");
    // $key = "20140406";
    $data_pph = $this->db
    ->where("npp",$key)
    ->get("iuran")->result();
    $html = "";
    if (!empty($data_pph)) {
      $html .= '<div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>NPP</th>
                    <th>format</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>';
      foreach ($data_pph as $data) {
        $id_check = $data->idiuran;
        $html .= '<tr>
            <td>'.$data->npp.'</td>
            <td>PDF</td>
            <td><a data-target="#scrollmodal" class="pilih_tagihan" data-toggle="modal" kode="'.base64_encode($data->npp).'">
              <button type="button" class="btn btn-primary btn-sm btn-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download File">
                <i class="fa fa-download"> Download</i>
              </button>
            </a></td>
        </tr>';
      }
      $html.='</tbody></table></div>';
      $this->db
      ->where("npp",$key)
      ->update("iuran",array("telepon"=>$this->input->post("telepon")));
    }else{
      $html .= "<h2>Data Tidak Ditemukan</h2>";
    }
    echo json_encode(array("html"=>$html));
  }

  function tagihan_iuran($npp,$bank=NULL){
    // die($bank);
    $npp = base64_decode($npp);
    $data_tagihan = $this->ModelIuran->get_tagihan($npp);
    $data = array(
      'data' => $data_tagihan,
      'tgl' => date("d-m-Y"),
      // 'bank_bayar' => $bank
    );
    // die(var_dump($data));
    $this->load->view('Beranda/cetak_tagihan',$data);

  }
}
