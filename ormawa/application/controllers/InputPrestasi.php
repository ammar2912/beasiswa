<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputPrestasi extends E_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelInputPrestasi");
  }

  function index()
  {
    $data = array(
      'body' => 'InputPrestasi/input',
      'form' => 'InputPrestasi/form',
    );
    $this->load->view('index', $data);
  }
  function insert()
  {

    $output = array();
    $input = array();

    $id_user = $this->input->post("id_user");
    $jenis_user = $this->input->post("jenis_user");
    $nama_user = $this->input->post("nama_user");
    $nama_kegiatan = $this->input->post("nama_kegiatan");
    $kategori = $this->input->post("kategori");
    $tanggal_kegiatan = $this->input->post("tanggal_kegiatan");
    $prestasi = $this->input->post("prestasi");
    $lingkup_prestasi = $this->input->post("lingkup_prestasi");
    $penyelenggara = $this->input->post("penyelenggara");
    $date = date('Y-m-d H:i:s');
    // $nama_file = '';

    // if($_FILES['lampiran_prestasi']['name']){
    //   // File upload configuration
    //   $uploadPath = 'file/';
    //   $config['upload_path'] = $uploadPath;
    //   $config['allowed_types'] = 'pdf|png|jpg|PDF|PNG|JPG|jpeg|JPEG';
    //   $config['encrypt_name'] = TRUE;
    //
    //   $this->load->library('upload', $config);
    //   $this->upload->initialize($config);
    //
    //   if($this->upload->do_upload('lampiran_prestasi')){
    //     $fileData = $this->upload->data();
    //     $nama_file = $fileData['file_name'];
    //   }else{
    //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Prestasi, File tidak sesuai ketentuan"));
    //     redirect(base_url()."InputPrestasi");
    //   }
    //   }

    //
    // for($count = 0; $count<count($_FILES["lampiran_prestasi"]["name"]); $count++)
    // {
    // 	$_FILES["file"]["name"] = $_FILES["lampiran_prestasi"]["name"][$count];
    // 	$_FILES["file"]["type"] = $_FILES["lampiran_prestasi"]["type"][$count];
    // 	$_FILES["file"]["tmp_name"] = $_FILES["lampiran_prestasi"]["tmp_name"][$count];
    // 	$_FILES["file"]["error"] = $_FILES["lampiran_prestasi"]["error"][$count];
    // 	// $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
    //
    // 	if($this->upload->do_upload('file'))
    // 	{
    // 		$data = $this->upload->data();
    // 		array_push($output,$data['file_name']);
    // 	}else{
    //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Prestasi, Terdapat File yang tidak sesuai ketentuan"));
    //     redirect(base_url()."InputPrestasi");
    //   }
    // }


    if (@$_FILES["lampiran_prestasi_1"]["name"] != '') {
      $config["upload_path"] = 'file/';
      $config["allowed_types"] = 'pdf|PDF|JPG|jpg|PNG|png|JPEG|jpeg';
      $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ($this->upload->do_upload('lampiran_prestasi_1')) {
        $data = $this->upload->data();
        array_push($output, $data['file_name']);
      } else {
        $this->session->set_flashdata("notif", $this->Notif->gagal("Gagal Input Prestasi, File tidak sesuai ketentuan"));
        redirect(base_url() . "InputPrestasi");
      }
    }

    if (@$_FILES["lampiran_prestasi_2"]["name"] != '') {
      $config["upload_path"] = 'file/';
      $config["allowed_types"] = 'pdf|PDF|JPG|jpg|PNG|png|JPEG|jpeg';
      $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ($this->upload->do_upload('lampiran_prestasi_2')) {
        $data = $this->upload->data();
        array_push($output, $data['file_name']);
      } else {
        $this->session->set_flashdata("notif", $this->Notif->gagal("Gagal Input Prestasi, File tidak sesuai ketentuan"));
        redirect(base_url() . "InputPrestasi");
      }
    }

    if (@$_FILES["lampiran_prestasi_3"]["name"] != '') {
      $config["upload_path"] = 'file/';
      $config["allowed_types"] = 'pdf|PDF|JPG|jpg|PNG|png|JPEG|jpeg';
      $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ($this->upload->do_upload('lampiran_prestasi_3')) {
        $data = $this->upload->data();
        array_push($output, $data['file_name']);
      } else {
        $this->session->set_flashdata("notif", $this->Notif->gagal("Gagal Input Prestasi, File tidak sesuai ketentuan"));
        redirect(base_url() . "InputPrestasi");
      }
    }

    $datas  = array(
      'id_user' => $id_user,
      'jenis_user' => $jenis_user,
      'nama_user' =>  $nama_user,
      'nama_kegiatan' =>  $nama_kegiatan,
      'kategori' =>  $kategori,
      'tanggal_kegiatan' =>  $tanggal_kegiatan,
      'prestasi' =>  $prestasi,
      'lingkup_prestasi' =>  $lingkup_prestasi,
      'penyelenggara' =>  $penyelenggara,
      'status' =>  3,
      'lingkup_prestasi' =>  $lingkup_prestasi,
      'date' =>  $date,
    );
    $cek = $this->db->insert('tb_prestasi_mahasiswa', $datas);

    if ($cek) {

      $getid = $this->db->get_where('tb_prestasi_mahasiswa', array('date' => $date))->row();
      $id_prestasi = $getid->id;

      // $input = $this->db->insert('tb_lampiran_prestasi',$datas2);

      if (!empty($output)) {
        foreach ($output as $value) {
          $datas2  = array(
            'id_prestasi' => $id_prestasi,
            'lampiran' => $value,
          );
          $this->db->insert('tb_lampiran_prestasi', $datas2);
          $idx = $id_prestasi;
          array_push($input, $idx);
        }
      }


      $this->session->set_flashdata("notif", $this->Notif->berhasil("Berhasil Input Prestasi"));
      redirect(base_url() . "HistoryPrestasi");
    } else {
      $this->session->set_flashdata("notif", $this->Notif->gagal("Gagal Input Prestasi"));
      redirect(base_url() . "HistoryPrestasi");
    }
  }
}
