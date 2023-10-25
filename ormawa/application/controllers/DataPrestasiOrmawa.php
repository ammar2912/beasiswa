<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPrestasiOrmawa extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelDataPrestasiOrmawa");
    $this->load->model("ModelDataPrestasi");
  }

  function index()
  {
    $idormawa = $this->input->post('id_ormawa');

    $dataprestasiormawa = $this->ModelDataPrestasiOrmawa->get_data();
    $jenisormawa = $this->db->get_where('tb_jenis_ormawa', array('status' => 1 ))->result();
    $data = array(
      'body' => 'DataPrestasiOrmawa/list',
      'dataprestasiormawa' => $dataprestasiormawa,
      'jenisormawa' => $jenisormawa
     );
    $this->load->view('index', $data);
  }

  function export_data(){

      $id = $this->input->post('id');
      $this->db->where('status',1);
      $this->db->where('jenis_user',2);
      if($id != 'all'){
      $prestasi_ormawa = $this->db->get_where('tb_prestasi_mahasiswa',array('id_user'=>$id))->result();
      }else{
      $prestasi_ormawa = $this->db->get('tb_prestasi_mahasiswa')->result();
      }

      if($prestasi_ormawa == null){
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Export Data, Tidak Ada Data Prestasi Ormawa !!"));
        redirect(base_url()."DataPrestasiOrmawa");
      }

      $this->load->library("excel");
      $object = new PHPExcel();
      $object->setActiveSheetIndex(0);
      $table_columns = array("No. ","Nama Ormawa", "Nama Kegiatan","Tanggal Kegiatan","Prestasi","Lingkup Prestasi","Penyelenggara");

      $column = 0;
      foreach($table_columns as $field){
        $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
        $column++;
      }

      $employee_data = $prestasi_ormawa;
      $no = 1;
      $excel_row = 2;
      foreach($employee_data as $row){
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $no++);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nama_user);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->nama_kegiatan);
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->tanggal_kegiatan);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->prestasi);
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->lingkup_prestasi);
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->penyelenggara);
        $excel_row++;
      }

      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="Data Prestasi Ormawa.xls"');
      $object_writer->save('php://output');
    }

  function get_ormawa(){
        $id_jenis = $this->input->post('id',TRUE);
        $this->db->where('status',1);
        $data = $this->db->get_where('tb_ormawa',array('jenis_ormawa' => $id_jenis))->result();
        if($data == null){
          $data = 'null';
        }
        echo json_encode($data);
    }

  function edit()
  {
    $id = base64_decode($this->uri->segment(3));
    $dataprestasi = $this->ModelDataPrestasi->get_data_edit($id);
    $data = array(
      'body' => 'DataPrestasiOrmawa/edit',
      'form' => 'DataPrestasiOrmawa/form',
      'dataprestasi' => $dataprestasi,
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
      'body' => 'DataPrestasiOrmawa/data_foto_ormawa',
      'id_prestasi' => $id,
      'data_foto' => $data_foto,
     );
    $this->load->view('index', $data);
  }else{
    // $this->session->set_flashdata("notif",$this->Notif->berhasil("Gagal Input Data"));
    redirect(base_url()."DataPrestasiOrmawa");
  }
 }

 function download_gambar($file){
    force_download('file/'.$file,NULL);
  }

  function update(){
    $id = $this->input->post('id_user');
    $nama_kegiatan = $this->input->post('nama_kegiatan');
    $kategori = $this->input->post('kategori');
    $tanggal_kegiatan = $this->input->post('tanggal_kegiatan');
    $prestasi = $this->input->post('prestasi');
    $lingkup_prestasi = $this->input->post('lingkup_prestasi');
    $penyelenggara = $this->input->post('penyelenggara');

    $prodi = array(
      'nama_kegiatan' => $nama_kegiatan,
      'kategori' => $kategori,
      'tanggal_kegiatan' => $tanggal_kegiatan,
      'prestasi' => $prestasi,
      'lingkup_prestasi' => $lingkup_prestasi,
      'penyelenggara' => $penyelenggara,
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_prestasi_mahasiswa",$prodi)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Edit Data"));
      redirect(base_url()."DataPrestasiOrmawa");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Edit Data"));
      redirect(base_url()."DataPrestasiOrmawa");

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
