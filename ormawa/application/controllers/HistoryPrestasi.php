<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryPrestasi extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelHistoryPrestasi");
  }

  function index()
  {
    $id = $this->session->userdata("id");
    $historyprestasi = $this->ModelHistoryPrestasi->get_data($id);
    $data = array(
      'body' => 'HistoryPrestasi/list',
      'historyprestasi' => $historyprestasi
     );
    $this->load->view('index', $data);
  }

  function tambah_foto(){
    $id = base64_decode($this->uri->segment(3));
    $cek = $this->db->get_where('tb_prestasi_mahasiswa',array('id' => $id ))->row();
    $data_foto = $this->db->get_where('tb_foto_prestasi', array('id_prestasi' => $id))->result();
    // var_dump($data_foto);
    // die;
    if(!empty($cek)){
    $data = array(
      'body' => 'HistoryPrestasi/tambah_foto',
      'judul' => $cek->nama_kegiatan,
      'id_prestasi' => $id,
      'data_foto' => $data_foto,
      'status_prestasi' => $cek->status
     );
    $this->load->view('index', $data);
  }else{
    // $this->session->set_flashdata("notif",$this->Notif->berhasil("Gagal Input Data"));
    redirect(base_url()."HistoryPrestasi");
  }
 }

 function tambah_foto_proses(){

   $id_prestasi = $this->input->post("id_prestasi") ;

   if($_FILES['foto_prestasi']['name']){
     // File upload configuration
     // $uploadPath = 'file/';
     $uploadPath = realpath(FCPATH.'file/');

     $config['upload_path'] = $uploadPath;
     $config['allowed_types'] = 'png|jpg|PNG|JPG|jpeg|JPEG';
     // $config['encrypt_name'] = TRUE;
     //die(var_dump($config));

     $this->load->library('upload', $config);
     $this->upload->initialize($config);

     if($this->upload->do_upload('foto_prestasi')){
       $fileData = $this->upload->data();
       $nama_file = $fileData['file_name'];

       $cek_status = $this->db->get_where('tb_prestasi_mahasiswa', array('id' => $id_prestasi ))->row();
       if ($cek_status->status == 3) {
         $data_status = array('status' => 0 );
         $this->db->where('id',$id_prestasi);
         $this->db->update('tb_prestasi_mahasiswa',$data_status);
       }

       $datas  = array(
         'id_prestasi' => $id_prestasi,
         'foto' => $nama_file
       );
       $this->db->insert('tb_foto_prestasi',$datas);

       $this->session->set_flashdata("notif",$this->Notif->berhasil("Input Foto Dokumentasi Berhasil"));
       redirect(base_url()."HistoryPrestasi/tambah_foto/".base64_encode($id_prestasi));
     }else{
       $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Foto Dokumentasi, File tidak sesuai ketentuan"));
       redirect(base_url()."HistoryPrestasi/tambah_foto/".base64_encode($id_prestasi));
     }
     }
 }

  function delete(){
    $id = base64_decode($this->uri->segment(3));
    $getfile = $this->db->get_where('tb_lampiran_prestasi', array('id_prestasi' => $id))->row();

    if(!empty($getfile->lampiran)){
    $path = 'file/'.$getfile->lampiran;
    unlink($path);
    }

    $cek_status = $this->db->get_where('tb_foto_prestasi', array('id_prestasi' => $id ))->result();
    // var_dump($cek_status);
    // die;
    if ($cek_status != null) {
      foreach ($cek_status as $value) {
        $path = 'file/'.$cek_status->foto;
        unlink($path);

        $this->db->where_in("id",$value->id);
        $this->db->delete("tb_foto_prestasi");

      }
    }

    $this->db->where_in("id",$id);
    if ($this->db->delete("tb_prestasi_mahasiswa")) {
      $this->db->where_in("id_prestasi",$id);
      $this->db->delete("tb_lampiran_prestasi");

        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."HistoryPrestasi");
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."HistoryPrestasi");
    }
  }

  function delete_foto(){
    $id = base64_decode($this->uri->segment(3));
    $id_prestasi = base64_decode($this->uri->segment(4));
    $getfile = $this->db->get_where('tb_foto_prestasi', array('id' => $id))->row();

    if(!empty($getfile->foto)){
    $path = 'file/'.$getfile->foto;
    unlink($path);
    }
    $this->db->where_in("id",$id);
    if ($this->db->delete("tb_foto_prestasi")) {

      $cek_status = $this->db->get_where('tb_foto_prestasi', array('id_prestasi' => $id_prestasi ))->num_rows();
      if ($cek_status <= 0 ) {
        $data_status = array('status' => 3 );
        $this->db->where('id',$id_prestasi);
        $this->db->update('tb_prestasi_mahasiswa',$data_status);
      }

        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."HistoryPrestasi/tambah_foto/".base64_encode($id_prestasi));
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."HistoryPrestasi/tambah_foto/".base64_encode($id_prestasi));
    }
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
