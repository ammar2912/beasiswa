<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengajuanLPJ extends E_Controller{

  function index()
  {
    $this->db->where('status',1);
    $id = $this->session->userdata('id');
    $proker = $this->db->get_where('tb_proker',array('id_ormawa' => $id ))->result();
    $data = array(
      'body' => 'PengajuanLPJ/input',
      'form' => 'PengajuanLPJ/form',
      'proker' => $proker,
     );
    $this->load->view('index', $data);
  }

  function insert(){
    $date = date('Y-m-d H:i:s');
    $cek_proker = $this->db->get_where('tb_lpj',array('id' => $this->input->post("id_proker")))->num_rows();
    if($cek_proker  == 0){
    $datas = array(
      'id_ormawa' => $this->input->post("id_ormawa"),
      'id_proker' => $this->input->post("id_proker"),
      'date' => $date,
      'status' => 0,
    );

    if ($this->db->insert("tb_lpj",$datas)) {

      $getid = $this->db->get_where('tb_lpj', array('date' => $date))->row();
      $id = $getid->id;
      $files = '';
      if(isset($_FILES["lampiran"]["name"]))
  		{
        $uploadPath = 'file/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf|doc|docx|PDF|DOC|DOCX';
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
  			}
  		}

      $data_x = array(
        'id_lpj' => $id,
        'lampiran' => $files,
      );

      $this->db->insert('tb_lampiran_lpj',$data_x);

      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."DataLPJ");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
      redirect(base_url()."DataLPJ ");

    }
  }else{
    $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data. Proker Sudah terdaftar !"));
    redirect(base_url()."DataLPJ ");
  }
}


}
