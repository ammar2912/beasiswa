<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSurat extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelDataSurat");
  }

  function index()
  {
    $datasurat = $this->ModelDataSurat->get_data();
    $data = array(
      'body' => 'DataSurat/list',
      'datasurat' => $datasurat
     );
    $this->load->view('index', $data);
  }

  function cek()
  {
    $datasurat = $this->ModelDataSurat->get_data();

    echo json_encode($datasurat);
  }

  function detail_lampiran()
  {
      $id = $this->input->post('id');
      $lampiran = $this->db->get_where('tb_lampiran_surat', array('id_surat' => $id))->result();
      $file_surat = $this->db->get_where('tb_surat', array('id' => $id))->result();
      $result = array_merge($lampiran, $file_surat);
      echo json_encode($result);
      // $syarat_surat = array('ktp','kk','sktm','khs','daful');
      // foreach ($lampiran as $value) {
      //   echo '<b style="text-align:center" >File '.$value->jenis_syarat.'</b> : ';
      //   echo '<a style="text-align:center" href="file/'.$value->lampiran.'" target="_blank"> <button class="btn btn-primary btn-sm">Lihat File</button></a><br><br>';
      // }
  }

}
