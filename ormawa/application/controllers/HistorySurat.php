<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistorySurat extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelHistorySurat");
  }

  function index()
  {
    $id = $this->session->userdata("id");
    $historysurat = $this->ModelHistorySurat->get_data($id)->result();
    $data = array(
      'body' => 'HistorySurat/list',
      'historysurat' => $historysurat
     );
    $this->load->view('index', $data);
  }

  function detail_lampiran()
  {
      $id = $this->input->post('id');
      $lampiran = $this->db->get_where('tb_lampiran_surat', array('id_surat' => $id))->result();
      // $syarat_surat = array('ktp','kk','sktm','khs','daful');
      foreach ($lampiran as $value) {
        $label = '';
        if($value->jenis_syarat == 'KTP'){
          $label = 'File KTP';
        }elseif ($value->jenis_syarat == 'SKTM') {
          $label = 'File SKTM';
        }elseif ($value->jenis_syarat == 'DAFUL') {
          $label = 'Bukti Daftar Ulang Semester Terakhir';
        }elseif ($value->jenis_syarat == 'KHS') {
          $label = 'KHS Semester Terakhir';
        }elseif ($value->jenis_syarat == 'KK') {
          $label = 'File KK';
        }else{
          $label = $value->jenis_syarat;
        }
        echo '<b style="text-align:center" >'.$label.'</b> : ';
        echo '<a style="text-align:center" href="'.base_url("file/$value->lampiran").'" target="_blank"> <button class="btn btn-primary btn-sm">Lihat File</button></a><br><br>';
      }
  }

  function download_surat($file){
     force_download('file/'.$file,NULL);
   }

}
