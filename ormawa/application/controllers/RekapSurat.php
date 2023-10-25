<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RekapSurat extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelDataSurat");
  }

  function index()
  {
    $rekapsurat = $this->ModelDataSurat->get_data();
    $data = array(
      'body' => 'RekapSurat/list',
      'rekapsurat' => $rekapsurat
     );
    $this->load->view('index', $data);
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
      //   echo '<a style="text-align:center" href="'.base_url("file/$value->lampiran").'" target="_blank"> <button class="btn btn-primary btn-sm">Lihat File</button></a><br><br>';
      // }
  }

  // function edit()
  // {
  //   $id = base64_decode($this->uri->segment(3));
  //   $jenissurat = $this->ModelJenisSurat->get_data_edit($id);
  //   $data = array(
  //     'body' => 'JenisSurat/edit',
  //     'form' => 'JenisSurat/form',
  //     'jenissurat' => $jenissurat,
  //    );
  //   $this->load->view('index', $data);
  // }
  //
  // function insert(){
  //   $jenissurat = array(
  //     'jenis_surat' => $this->input->post("jenis_surat"),
  //     'status' => 1,
  //   );
  //   if ($this->db->insert("tb_jenis_surat",$jenissurat)) {
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."JenisSurat");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
  //     redirect(base_url()."JenisSurat ");
  //
  //   }
  // }
  //
  // function update(){
  //   $id = base64_decode($this->uri->segment(3));
  //   $prodi = array(
  //     'jenis_surat' => $this->input->post("jenis_surat"),
  //   );
  //   $this->db->where("id",$id);
  //   if ($this->db->update("tb_jenis_surat",$prodi)) {
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."JenisSurat");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
  //     redirect(base_url()."JenisSurat");
  //
  //   }
  // }
  //
  // function delete(){
  //   $id = $this->input->post("id");
  //
  //   $this->db->where_in("idprodi",$id);
  //   if ($this->db->delete("prodi")) {
  //       $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
  //       redirect(base_url()."Prodi");
  //   }else{
  //       $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Hapus Data"));
  //       redirect(base_url()."Prodi");
  //   }
  // }


}
