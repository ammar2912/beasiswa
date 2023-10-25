<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryKegiatanMahasiswa extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelKegiatanMahasiswa");
  }

  function index()
  {
    $id = $this->session->userdata('id');
    $datakegiatan = $this->ModelKegiatanMahasiswa->get_data($id)->result();
    // var_dump($datakegiatan);
    // die;
    $data = array(
      'body' => 'HistoryKegiatanMahasiswa/list',
      'datakegiatan' => $datakegiatan,
     );
    $this->load->view('index', $data);
  }


  function delete(){
    $id = base64_decode($this->uri->segment(3));

    $cekstatus = $this->db->get_where('tb_kegiatan_mahasiswa', array('id' => $id))->row();
    $status = $cekstatus->status;

    if($status == 1){
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
      redirect(base_url()."HistoryKegiatanMahasiswa");
    }else{
    $this->db->where_in("id",$id);
    if ($this->db->delete("tb_kegiatan_mahasiswa")) {

      $this->db->where('status',2);
      $getfile = $this->db->get_where('tb_lampiran_kegiatan', array('id_kegiatan' => $id))->row();

      if(!empty($getfile->lampiran)){
      $path = 'file/'.$getfile->lampiran;
      unlink($path);
      }

      $this->db->where("status",2);
      $this->db->where_in("id_kegiatan",$id);
      $this->db->delete("tb_lampiran_kegiatan");

        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."HistoryKegiatanMahasiswa");
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."HistoryKegiatanMahasiswa");
    }
    }
  }

  function revisikegiatan()
  {
    $id = $this->input->post('id_kegiatan');

    $nama_file = '';

    if($_FILES['file_revisi']['name']){
      // File upload configuration
      $uploadPath = 'file/';
      $config['upload_path'] = $uploadPath;
      $config['allowed_types'] = 'pdf|PDF';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($this->upload->do_upload('file_revisi')){
        $fileData = $this->upload->data();
        $nama_file = $fileData['file_name'];

        $rev_file = array('lampiran' => $nama_file);
        $this->db->where("status",2);
        $this->db->where("id_kegiatan",$id);
        $this->db->update("tb_lampiran_kegiatan",$rev_file);

      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input File Revisi, File tidak sesuai ketentuan"));
        redirect(base_url()."HistoryKegiatanMahasiswa");
      }
      }


      $revisikegiatan = array(
        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
        'tanggung_jawab' => $this->input->post('tanggung_jawab'),
        'dana_pengajuan' => $this->input->post('dana_pengajuan'),
        'status_revisi' => 2,
      );

      $this->db->where("id",$id);
      if ($this->db->update("tb_kegiatan_mahasiswa",$revisikegiatan)) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Kegiatan Berhasil di Revisi"));
        redirect(base_url()."HistoryKegiatanMahasiswa");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Kegiatan Gagal di Revisi"));
        redirect(base_url()."HistoryKegiatanMahasiswa");

      }
  }


}
