<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengajuanKegiatan extends E_Controller{

 //  public function __construct()
 //  {
 //    parent::__construct();
 //    $this->load->model("ModelInputProker");
 // }

  function index()
  {
    $id = $this->session->userdata('id');
    $this->db->where('status',1);
    $proker = $this->db->get_where('tb_proker',array('id_ormawa' => $id))->result();
    $data = array(
      'body' => 'PengajuanKegiatan/input',
      'form' => 'PengajuanKegiatan/form',
      'proker' => $proker
     );
    $this->load->view('index', $data);
  }

  function insert(){
    $date = date('Y-m-d H:i:s');
    // die;
    $this->db->where('status_anggaran',1);
    $getdana = $this->db->get_where('tb_anggaran_ormawa', array('id_ormawa' => $this->input->post("id_ormawa") ))->row();
    $dana = $getdana->anggaran_sisa;
    if($dana){
    if($this->input->post("dana_pengajuan") <= $dana){

      $files = '';
      if(isset($_FILES["lampiran"]["name"]))
      {
        $uploadPath = 'file/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf|PDF';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $_FILES["file"]["name"] = $_FILES["lampiran"]["name"];
        $_FILES["file"]["type"] = $_FILES["lampiran"]["type"];
        $_FILES["file"]["tmp_name"] = $_FILES["lampiran"]["tmp_name"];
        $_FILES["file"]["error"] = $_FILES["lampiran"]["error"];
        $_FILES["file"]["size"] = $_FILES["lampiran"]["size"];

        if($this->upload->do_upload('file'))
        {
          $data = $this->upload->data();
          $files = $data['file_name'];

          $datas = array(
            'id_ormawa' => $this->input->post('id_ormawa'),
            'id_proker' => $this->input->post('proker'),
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'tanggung_jawab' => $this->input->post('pwb'),
            'dana_pengajuan' => $this->input->post('dana_pengajuan'),
            'dana_acc' => 0,
            'periode' => $this->input->post('periode'),
            'date' => $date,
            'status_kegiatan' => 0,
          );

          if ($this->db->insert("tb_kegiatan_ormawa",$datas)) {

            $getid = $this->db->get_where('tb_kegiatan_ormawa', array('date' => $date))->row();
            $id = $getid->id;
            $data_x = array(
              'id_kegiatan' => $id,
              'lampiran' => $files,
            );

            $this->db->insert('tb_lampiran_kegiatan',$data_x);

            $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
            redirect(base_url()."DataKegiatan");
        }else{
          $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
          redirect(base_url()."PengajuanKegiatan ");
        }
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, File Proposal Pengajuan Harus Bertipe PDF"));
        redirect(base_url()."PengajuanKegiatan ");
      }
  }else{
    $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, File Proposal Harus Diisi ! "));
    redirect(base_url()."PengajuanKegiatan ");
  }
}else{
    $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, Dana Pengajuan lebih besar dari Dana Anggaran Ormawa!"));
    redirect(base_url()."PengajuanKegiatan ");
  }
}else{
  $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, Anggaran Ormawa Tidak Tersedia  !"));
  redirect(base_url()."PengajuanKegiatan ");
}
}


}
