<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputProker extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelInputProker");
 }

  function index()
  {
    $data = array(
      'body' => 'InputProker/input',
      'form' => 'InputProker/form',
     );
    $this->load->view('index', $data);
  }

  function insert(){
    $date = date('Y-m-d H:i:s');

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

          $datas = array(
            'id_ormawa' => $this->input->post("id_ormawa"),
            'nama_proker' => $this->input->post("nama_proker"),
            'tanggung_jawab' => $this->input->post("jwb"),
            'uraian' => $this->input->post("uraian"),
            'periode' => $this->input->post("periode"),
            'date' => $date,
            'status' => 0,
          );

          if ($this->db->insert("tb_proker",$datas)) {

            $getid = $this->db->get_where('tb_proker', array('date' => $date))->row();
            $id = $getid->id;
            $data_x = array(
              'id_proker' => $id,
              'lampiran' => $files,
            );
            $this->db->insert('tb_lampiran_proker',$data_x);
            $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
            redirect(base_url()."DataProker");

          }else{
            $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, Pastikan Data yang dimasukkan Benar !"));
            redirect(base_url()."InputProker");
          }

  			}else{
          $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Proker , File Harus Bertipe PDF / WORD"));
          redirect(base_url()."InputProker");
        }

    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, Wajib Mengisi File Proker !"));
      redirect(base_url()."InputProker");

    }
  }


}
