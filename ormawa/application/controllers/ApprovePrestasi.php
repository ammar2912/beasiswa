<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovePrestasi extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelApprovePrestasi");
  }

  function index()
  {
    $approveprestasi = $this->ModelApprovePrestasi->get_data()->result();
    $data = array(
      'body' => 'ApprovePrestasi/list',
      'approveprestasi' => $approveprestasi
     );
    $this->load->view('index', $data);
  }
  function approveprestasi()
  {
    $id = base64_decode($this->uri->segment(3));
      $approvekegiatan = array(
        'status' => 1,
      );
      $this->db->where("id",$id);
      if ($this->db->update("tb_prestasi_mahasiswa",$approvekegiatan)) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Approve Prestasi"));
        redirect(base_url()."ApprovePrestasi");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Approve Prestasi"));
        redirect(base_url()."ApprovePrestasi");

      }
  }
  function data_foto(){
    $id = base64_decode($this->uri->segment(3));
    $cek = $this->db->get_where('tb_prestasi_mahasiswa',array('id' => $id ))->row();
    $data_foto = $this->db->get_where('tb_foto_prestasi', array('id_prestasi' => $id))->result();
    // var_dump($data_foto);
    // die;
    if(!empty($cek)){
    $data = array(
      'body' => 'ApprovePrestasi/data_foto',
      'id_prestasi' => $id,
      'data_foto' => $data_foto,
     );
    $this->load->view('index', $data);
  }else{
    // $this->session->set_flashdata("notif",$this->Notif->berhasil("Gagal Input Data"));
    redirect(base_url()."ApprovePrestasi");
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
