<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PPH extends CI_Controller{
  public $barang = array();
  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url', 'language'));
    $this->load->model('ModelPPH');
    $this->load->library("excel");
  }

  function index()
  {
    $data = array(
      'body' => 'PPH/list',
      'form_dialog' => 'PPH/form_dialog',
    );
    $this->load->view('index', $data);
  }

  public function get_pph(){
    $this->load->model("Datatable");
    $setup = array(
      'table' => 'pph', //nama tabel dari database
      'column_order' => array(null, 'idpph','nik','npwp'), //field yang ada di table pph
      'column_search' => array('nik','npwp','email','telepon'), //field yang diizin untuk pencarian
      'order' => array('nik' => 'asc'), // default order

    );

    $this->Datatable->setup($setup);

    $list = $this->Datatable->get_datatables();
    $data_barang = array();
    $no = $_POST['start'];
    foreach ($list as $data) {
      $id_check = $data->idpph;
      $no++;
      $row = array();


      $row[] = '<input type="checkbox" class="form-check-input id_checkbox" id="tableMaterialCheck'.$id_check.'" name="id[]" value="'.$id_check.'">
      <label class="form-check-label" for="tableMaterialCheck'.$id_check.' ">';
      $row[] = $data->nomor;
      $row[] = $data->nama;
      $row[] = $data->nik;
      $row[] = $data->npwp;
      $row[] = date("d-m-Y",strtotime($data->tanggal));
      $row[] = $data->pajak;
      $row[] = "Rp.".number_format($data->bruto);
      $row[] =$data->email;
      $row[] =  $data->telepon;
      $row[] =  '<button link="'.base_url("file/pph/".$data->file).'" class="file btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#scrollmodal">lihat file</button>';
      $row[] = '<span class="btn-group">
      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="ti-settings"></i>
      </button>
      <span class="dropdown-menu animated flipInY">
      <a class="dropdown-item" href="'.base_url().'PPH/edit/'.$data->idpph.'">Edit Data</a>
      <a target="_blank" class="dropdown-item" href="https://api.whatsapp.com/send?phone=+62'.$data->telepon.'&amp;text=Hallo,%0AKami%20dari pihak BPJS%20berikut ini link tagihan PPH Anda%20'.base_url("Beranda/index/$data->nik/").'%23features%20">Kirim Whatsapp</a>
      <a class="dropdown-item" href="'.base_url().'PPH/kirim_ulang/'.$data->idpph.'">Kirim Email</a>

      </span>';
      $data_barang[] = $row;
    }
    // die(var_dump($data_barang));

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Datatable->count_all(),
      "recordsFiltered" => $this->Datatable->count_filtered(),
      "data" => $data_barang,
    );
    //output dalam format JSON
    echo json_encode($output);

  }

  function input()
  {
    $data = array(
      'form' => 'PPH/form_baru',
      'body' => 'PPH/input',
    );
    $this->load->view('index', $data);
  }

  function input_baru()
  {
    $data = array(
      'form' => 'PPH/form',
      'body' => 'PPH/input_baru',
    );
    $this->load->view('index', $data);
  }

  public function insert()
  {
    $data = array(
      'nik' => $this->input->post("nik"),
      'npwp'=> $this->input->post("npwp"),
      'email' => $this->input->post("email"),
      'telepon' => $this->input->post("telepon"),
      'nomor' => $this->input->post("nomor"),
      'nama' => $this->input->post("nama"),
      'tanggal' => $this->input->post("tanggal"),
      'pajak' => $this->input->post("pajak"),
      'bruto' => $this->input->post("bruto"),
      'pph_dipotong' => $this->input->post("pph_dipotong"),
    );
    $patch = "./file/pph/";
    $config['upload_path']          = $patch;
    $config['allowed_types']        = 'docx|pdf|gif|jpg|png|jpeg';
    $config['max_size']             = 8000000000;
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload');
    $this->upload->initialize($config);
    if ($this->upload->do_upload('file')) {
      $data['file'] = $this->upload->data()['file_name'];
    }
    if ($this->db->insert('pph', $data)) {
        $idpph = $this->db->insert_id();
        $this->kirim_email($idpph);
        $this->session->set_flashdata('notif', $this->Notif->berhasil('Berhasil Tersimpan'));
        redirect(base_url().'PPH');
    } else {
        $this->session->set_flashdata('notif', $this->Notif->gagal('Gagal Tersimpan'));
        redirect(base_url().'PPH');
    }


  }


  public function insert_baru()
  {


    if (!empty($_FILES['file']['name'])) {
      $fileName = $_FILES['file']['name'];
      $config['upload_path'] = './file/excel/'; //path upload
      // $config['file_name'] = $fileName;  // nama file
      $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
      $config['max_size'] = 10000000; // maksimal sizze
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload'); //meload librari upload
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('file') ){
        // echo $this->upload->display_errors();exit();
        $this->proses2();
      }else{
        $fileName = $this->upload->data()['file_name'];
        $inputFileName = './file/excel/'.$fileName;
        try {
          $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
          $objReader = PHPExcel_IOFactory::createReader($inputFileType);
          $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
          die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        $sheet = $objPHPExcel->getSheet(0);
        $i = 2;
        $column_b = "DATA";
        do {
          $rowData = $sheet->rangeToArray('A'.$i.':I'.$i,
          NULL,
          TRUE,
          FALSE);

          $data = array(
            'nik' => $rowData[0][1],
            'npwp'=> str_replace(".","",str_replace("-","",$rowData[0][2])),
            'nama'=> $rowData[0][3],
            'nomor'=> $rowData[0][4],
            'tanggal'=>date("Y-m-d",strtotime($rowData[0][5])),
            'pajak'=> $rowData[0][6],
            'bruto'=> str_replace(".","",$rowData[0][7]),
            'pph_dipotong'=> str_replace(".","",$rowData[0][8]),

          );

          $cek_data = $this->db->get_where("pph",array("nomor"=>$data['nomor']));

          if ($data['nomor'] != "") {
            if ($cek_data->num_rows() > 0) {
              $this->db->where("nomor",$data['nomor'])->update("pph",$data);
            }else{
              $this->db->insert("pph",$data);
            }
          }


          $column_b = $rowData[0][1];
          $i++;
        } while ($column_b!="");
        unlink('./file/excel/'.$fileName);
        $this->proses2();
      }

    }else{
      $this->proses2();
    }



  }


  function proses2(){
    $gagal = 0;
    $count = count($_FILES['files']['name']);
    for($i=0;$i<$count;$i++){
      // echo "lalala<br>";
      if(!empty($_FILES['files']['name'][$i])){
        $_FILES['file']['name'] = $_FILES['files']['name'][$i];
        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
        $_FILES['file']['size'] = $_FILES['files']['size'][$i];

        $patch = "./file/pph/";
        $config['upload_path']          = $patch;
        $config['allowed_types']        = 'docx|pdf|gif|jpg|png|jpeg';
        $config['max_size']             = 8000000000;
        $config['file_name'] = $_FILES['files']['name'][$i];
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
          $namafile = $this->upload->data()['file_name'];
          $namafile1 = explode("_",$namafile);
          $nomor = explode("-",$namafile1[1]);
          $nomor = $nomor[0].".".$nomor[1]."-".$nomor[2].".".$nomor[3]."-".$nomor[4];
          // var_dump($nomor);
          $cek = $this->db->get_where("pph",array("nomor"=>$nomor))->num_rows();
          if ($cek > 0) {

            $this->db->where("nomor",$nomor);
            $this->db->update("pph",array("file"=>$namafile));
          }else{
            unlink($patch.$namafile);
            $gagal += 1;
          }
        }
      }

    }
    if ($gagal > 0) {
      $this->session->set_flashdata('notif', $this->Notif->gagal($gagal.' File Gagal Terupload'));
    }else{
      $this->session->set_flashdata('notif', $this->Notif->berhasil('Berhasil Upload Data'));
    }
    redirect(base_url().'PPH');
  }


  function edit()
  {
    $id = $this->uri->segment(3);
    $data = array(
      'form' => 'PPH/form_edit',
      'body' => 'PPH/edit',
      'pph' => $this->ModelPPH->get_data_edit($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  public function update()
  {
    $idpph = $this->input->post('idpph');

    $data = array(
      'nik' => $this->input->post("nik"),
      'npwp'=> $this->input->post("npwp"),
      'email' => $this->input->post("email"),
      'telepon' => $this->input->post("telepon")
    );
    $patch = "./file/pph/";
    $config['upload_path']          = $patch;
    $config['allowed_types']        = 'docx|pdf|gif|jpg|png|jpeg';
    $config['max_size']             = 8000000000;
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload');
    $this->upload->initialize($config);
    if ($this->upload->do_upload('file')) {
      $data['file'] = $this->upload->data()['file_name'];
    }

    $this->db->where('idpph',$idpph);
    if ($this->db->update('pph', $data)) {
      $this->session->set_flashdata('notif', $this->Notif->berhasil('Berhasil Tersimpan'));
      redirect(base_url().'PPH');
    } else {
      $this->session->set_flashdata('notif', $this->Notif->gagal('Gagal Tersimpan'));
      redirect(base_url().'PPH');
    }

  }

  public function delete()
  {
    $id = $this->input->post('id');
    $data = $this->db->where_in('idpph', $id)->get("pph")->result();
    foreach ($data as $value) {
      	unlink("./file/pph/".$value->file);
    }

    $this->db->where_in('idpph', $id);
    $delete = $this->db->delete('pph');
    if ($delete) {
      $this->session->set_flashdata('notif', $this->Notif->berhasil('Berhasil Hapus Data PPH'));
    }else{
      $this->session->set_flashdata('notif', $this->Notif->gagal('Gagal Hapus Data PPH'));
    };
    redirect(base_url().'PPH');
  }

  function generate_id(){
    $pre = str_replace(".","",$this->barang['idpph']);
    $data = $this->db
    ->order_by("idpph","DESC")
    ->like("idpph",$pre,"left")
    ->get("barang")->row();
    if (empty($data)) {
      $pre = $pre."000001";
    }else{
      // var_dump($data);
      $kode = substr($data->idpph,10,6);
      $kode = (int)$kode;
      $kode++;
      $pre = $pre.str_pad($kode,6,"0",STR_PAD_LEFT);
      // var_dump($pre);
      // die();
    }
    return $pre;
  }
  public function get_kelompok_2(){
    $kode = $this->input->post("kode");
    // $kode = "1.02";
    $kelompok = $this->db->like("idkelompok",$kode,"after")
    // ->or_where("LENGTH(idkelompok)",6)
    ->get_where("kelompok",array("LENGTH(idkelompok)"=>4))->result();
    $html = "";
    foreach ($kelompok as $value) {
      $html .= " <option value=".substr($value->idkelompok,2,2).">".substr($value->idkelompok,2,2)." - ".$value->nama_kelompok."</option>";
    }
    echo json_encode(array("html"=>$html));
  }


  public function get_kelompok_3(){
    $kode = $this->input->post("kode");
    // $kode = "1.02";
    $kelompok = $this->db->like("idkelompok",$kode,"after")->get_where("kelompok",array("LENGTH(idkelompok)"=>7))->result();
    $html = "";
    foreach ($kelompok as $value) {
      $html .= " <option value=".substr($value->idkelompok,5,2).">".substr($value->idkelompok,5,2)." - ".$value->nama_kelompok."</option>";
    }
    echo json_encode(array("html"=>$html));
  }

  public function get_kelompok_4(){
    $kode = $this->input->post("kode");
    // $kode = "1.02";
    $kelompok = $this->db->like("idkelompok",$kode,"after")->get_where("kelompok",array("LENGTH(idkelompok)"=>10))->result();
    $html = "";
    foreach ($kelompok as $value) {
      $html .= " <option value=".substr($value->idkelompok,8,2).">".substr($value->idkelompok,8,2)." - ".$value->nama_kelompok."</option>";
    }
    echo json_encode(array("html"=>$html));
  }

  public function get_kelompok_5(){
    $kode = $this->input->post("kode");
    // $kode = "1.02";
    $kelompok = $this->db->like("idkelompok",$kode,"after")->get_where("kelompok",array("LENGTH(idkelompok)"=>14))->result();
    $html = "";
    foreach ($kelompok as $value) {
      $html .= " <option value=".substr($value->idkelompok,11,3).">".substr($value->idkelompok,11,3)." - ".$value->nama_kelompok."</option>";
    }
    echo json_encode(array("html"=>$html));
  }


  public function cetak_qrcode(){
    $idpph = $this->uri->segment(3);
    $data_edit = $this->db->get_where("barang",array("idpph"=>$idpph))->row_array();
    if($data_edit['qrcode']==null){
      $config['cacheable']    = true; //boolean, the default is true
      $config['cachedir']     = './foto/qrcode'; //string, the default is application/cache/
      $config['errorlog']     = './foto/qrcode'; //string, the default is application/logs/
      $config['imagedir']     = './foto/qrcode/'; //direktori penyimpanan qr code
      $config['quality']      = true; //boolean, the default is true
      $config['size']         = '1024'; //interger, the default is 1024
      $config['black']        = array(224,255,255); // array, default is array(255,255,255)
      $config['white']        = array(70,130,180); // array, default is array(0,0,0)
      $this->ciqrcode->initialize($config);
      $image_name=$idpph.'.png'; //buat name dari qr code sesuai dengan nim
      $params['data'] = $idpph; //data yang akan di jadikan QR CODE
      $params['level'] = 'H'; //H=High
      $params['size'] = 10;
      $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
      $this->ciqrcode->generate($params);
      $this->db->where('idpph',$idpph);
      $this->db->update('barang',array('qrcode'=>$image_name));
    }
    $data = array(
      'barang' => $this->db->get_where("barang",array("idpph"=>$idpph))->row_array(),
     );
    $this->load->view('PPH/qrcode',$data);
  }


  function get_satu_barang(){
    $idpph = $this->input->post("idpph");
    $data = $this->db->where("idpph",$idpph)->get("barang")->row();
    echo json_encode($data);
  }

  public function get_kelompok(){
    // Fetch pphs
        // Search term
    $searchTerm = $this->input->post('searchTerm');
      // Fetch pphs
    $this->db->select('*');
    if ($this->session->jabatan=='administrasi_artk') {
      $this->db->like("idkelompok",1,"after");
    }else{
      $this->db->like("idkelompok",3,"after");
    }
    $this->db->where("LENGTH(idkelompok)",14);
    $this->db->where("nama_kelompok like '%".$searchTerm."%' ");
    $fetched_records = $this->db->get('kelompok');
    $pphs = $fetched_records->result_array();

      // Initialize Array with fetched data
    $data = array();
      foreach($pphs as $pph){
         $data[] = array("id"=>$pph['idkelompok'], "text"=>$pph['idkelompok']." - ".$pph['nama_kelompok']);
    }
    echo json_encode($data);

  }

  function kirim_ulang($idpph){
    $res = $this->kirim_email($idpph);
    if ($res==1) {
        $this->session->set_flashdata('notif', $this->Notif->berhasil('Berhasil Terkirim'));
        redirect(base_url().'PPH');
    } else {
        $this->session->set_flashdata('notif', $this->Notif->gagal('Gagal Terkirim'));
        redirect(base_url().'PPH');
    }
  }

  function kirim_email($idpph){
      $data_pph = $this->db->get_where("pph",array("idpph"=>$idpph))->row();
      // die(var_dump($data_pph));
      $this->load->library('email');
      $this->email->mailtype = 'html';
      $this->email->from('cv.esolusindo@gmail.com', 'CV Esolusindo');
      $this->email->to($data_pph->email);
      $url = base_url("Beranda/index/".$data_pph->nik)."#features" ;
      $this->email->subject('Tagihan PPH');
      $pesan = 'Hallo, Kami Dari Pihak BPJS!!<br><br> Berikut link tagihan PPH anda '.$url."<br> untuk melakukan pembayaran dapat mengikuti panduan berikut ".base_url()."#panduan";
      // die($pesan);
      $this->email->message($pesan);
      if ($this->email->send()) {
        // die("berhasil");
        return 1;
      }else{
        return 0;
      }
    }



}
?>
