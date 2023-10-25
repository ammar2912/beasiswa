<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RekapPrestasi extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelDataPrestasi");
  }

  function index()
  {
    $rekapprestasi = $this->ModelDataPrestasi->get_data();
    $data = array(
      'body' => 'RekapPrestasi/list',
      'rekapprestasi' => $rekapprestasi
     );
    $this->load->view('index', $data);
  }

  function data_foto(){
    $id = base64_decode($this->uri->segment(3));
    $cek = $this->db->get_where('tb_prestasi_mahasiswa',array('id' => $id ))->row();
    $data_foto = $this->db->get_where('tb_foto_prestasi', array('id_prestasi' => $id))->result();
    // var_dump($data_foto);
    // die;
    if(!empty($cek)){
    $data = array(
      'body' => 'RekapPrestasi/data_foto',
      'id_prestasi' => $id,
      'data_foto' => $data_foto,
     );
    $this->load->view('index', $data);
  }else{
    // $this->session->set_flashdata("notif",$this->Notif->berhasil("Gagal Input Data"));
    redirect(base_url()."RekapPrestasi");
  }
 }

 function download_gambar($file){
    force_download('file/'.$file,NULL);
  }

  function detail_lampiran()
  {
      $id = $this->input->post('id');
      $lampiran = $this->db->get_where('tb_lampiran_prestasi', array('id_prestasi' => $id))->result();
      // $syarat_surat = array('ktp','kk','sktm','khs','daful');
      $no = 1;
      foreach ($lampiran as $value) {
        echo '<a style="text-align:center" href="'.base_url("file/$value->lampiran").'" target="_blank"> <button class="btn btn-primary btn-sm">Sertifikat '.$no++.'</button></a><br><br>';
      }
  }

}
