<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iuran extends CI_Controller{
  public $barang = array();
  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url', 'language'));
    $this->load->model('ModelIuran');
    $this->load->library("excel");
  }

  function index()
  {
    $data = array(
      'body' => 'Iuran/list',
      'form_dialog' => 'Iuran/form_dialog',
    );
    $this->load->view('index', $data);
  }

  public function get_iuran(){
    $this->load->model("Datatable");
    $setup = array(
      'table' => 'iuran', //nama tabel dari database
      'column_order' => array(null, 'idiuran','npp'), //field yang ada di table iuran
      'column_search' => array('npp','badan_usaha','pembina','keps_jp'), //field yang diizin untuk pencarian
      'order' => array('npp' => 'asc'), // default order

    );

    $this->Datatable->setup($setup);

    $list = $this->Datatable->get_datatables();
    $data_barang = array();
    $no = $_POST['start'];
    foreach ($list as $data) {
      $id_check = $data->idiuran;
      $no++;
      $row = array();


      $row[] = '<input type="checkbox" class="form-check-input id_checkbox" id="tableMaterialCheck'.$id_check.'" name="id[]" value="'.$id_check.'">
      <label class="form-check-label" for="tableMaterialCheck'.$id_check.' ">';
      $row[] = $data->npp;
      $row[] = $data->badan_usaha;
      $row[] = '<span class="btn-group">
      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="ti-settings"></i>
      </button>
      <span class="dropdown-menu animated flipInY">
      <a class="dropdown-item" href="'.base_url().'Iuran/edit/'.$data->idiuran.'">Edit Data</a>
      <a class="dropdown-item" target="_blank" href="'.base_url().'Iuran/tagihan_iuran/'.base64_encode($data->npp).'">Cetak Tagihan</a>

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
      'form' => 'Iuran/form_baru',
      'body' => 'Iuran/input',
      'pembina' => $this->db->get("pembina")->result()
    );
    $this->load->view('index', $data);
  }

  function input_excel()
  {
    $data = array(
      'form' => 'Iuran/form_excel',
      'body' => 'Iuran/input_excel',
    );
    $this->load->view('index', $data);
  }

  public function insert()
  {
    $data = array(
      'npp' => $this->input->post("npp"),
      'div'=> $this->input->post("div"),
      'badan_usaha'=> $this->input->post("badan_usaha"),
      'pembina'=> $this->input->post("pembina"),
      'keps_awal'=>$this->input->post("keps_awal"),
      'keps_jp'=> $this->input->post("keps_jp"),
      'blth_na'=> $this->input->post("blth_na"),
      'skala'=> $this->input->post("skala"),
      'prog'=> $this->input->post("prog"),
      'rate'=> $this->input->post("rate"),
      'penambahan'=> $this->input->post("penambahan"),
      'pengurangan'=> $this->input->post("pengurangan"),
      'tk_aktif'=> $this->input->post("tk_aktif"),
      'tk_na'=> $this->input->post("tk_na"),
      'total_tk'=> $this->input->post("total_tk"),
      'total_iuran_berjalan'=> $this->input->post("total_iuran_berjalan"),
      'blth_dutk'=> $this->input->post("blth_dutk"),
      'blth_posting'=> $this->input->post("blth_posting"),
      'nilai_posting'=> $this->input->post("nilai_posting"),
      'sipp_prs'=> $this->input->post("sipp_prs"),
    );
    $cek_data = $this->db->get_where("iuran",array("npp"=>$data['npp']));

    if ($data['npp'] != "") {
      if ($cek_data->num_rows() > 0) {
        $this->db->where("npp",$data['npp'])->update("iuran",$data);
      }else{
        $this->db->insert("iuran",$data);
      }
    }
    $this->session->set_flashdata('notif', $this->Notif->berhasil('Berhasil Tersimpan'));
    redirect(base_url().'Iuran');

  }


  public function insert_excel()
  {
    $fileName = $_FILES['file']['name'];
    $config['upload_path'] = './file/excel/'; //path upload
    // $config['file_name'] = $fileName;  // nama file
    $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
    $config['max_size'] = 10000000; // maksimal sizze
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload'); //meload librari upload
    $this->upload->initialize($config);
    if(! $this->upload->do_upload('file') ){
      echo $this->upload->display_errors();exit();
    }else{
      $fileName = $this->upload->data()['file_name'];
    }
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
      $rowData = $sheet->rangeToArray('A'.$i.':U'.$i,
      NULL,
      TRUE,
      FALSE);

      $data = array(
        'npp' => $rowData[0][1],
        'div'=> $rowData[0][2],
        'badan_usaha'=> $rowData[0][3],
        'pembina'=> $rowData[0][4],
        'keps_awal'=>$rowData[0][5],
        'keps_jp'=> $rowData[0][6],
        'blth_na'=> $rowData[0][7],
        'skala'=> $rowData[0][8],
        'prog'=> $rowData[0][9],
        'rate'=> $rowData[0][10],
        'penambahan'=> $rowData[0][11],
        'pengurangan'=> $rowData[0][12],
        'tk_aktif'=> $rowData[0][13],
        'tk_na'=> $rowData[0][14],
        'total_tk'=> $rowData[0][15],
        'total_iuran_berjalan'=> $rowData[0][16],
        'blth_dutk'=> $rowData[0][17],
        'blth_posting'=> $rowData[0][18],
        'nilai_posting'=> $rowData[0][19],
        'sipp_prs'=> $rowData[0][20],
        'va'=> $rowData[0][21],
      );

      $cek_data = $this->db->get_where("iuran",array("npp"=>$data['npp']));

      if ($data['npp'] != "") {
        $cell_keps_awal = $objPHPExcel->getActiveSheet()->getCell('F'.$i);
        $keps_awal= $cell_keps_awal->getFormattedValue();;
        $keps_awal = explode("-",$keps_awal);
        $keps_awal = $keps_awal[1]."-".$keps_awal[0]."-1";
        $data['keps_awal'] = $keps_awal;

        $cell_blth_dutk = $objPHPExcel->getActiveSheet()->getCell('R'.$i);
        $blth_dutk= $cell_blth_dutk->getFormattedValue();;
        $blth_dutk = explode("-",$blth_dutk);
        $blth_dutk = $blth_dutk[1]."-".$blth_dutk[0]."-1";
        $data['blth_dutk'] = $blth_dutk;

        $cell_blth_posting = $objPHPExcel->getActiveSheet()->getCell('S'.$i);
        $blth_posting= $cell_blth_posting->getFormattedValue();;
        $blth_posting= explode("-",$blth_posting);
        $blth_posting = $blth_posting[1]."-".$blth_posting[0]."-1";
        $data['blth_posting'] = $blth_posting;



        if ($cek_data->num_rows() > 0) {
          $this->db->where("npp",$data['npp'])->update("iuran",$data);
        }else{
          $this->db->insert("iuran",$data);
        }
      }


      $column_b = $rowData[0][1];
      $i++;
    } while ($column_b!="");
    unlink('./file/excel/'.$fileName);
    $this->session->set_flashdata('notif', $this->Notif->berhasil('Berhasil Tersimpan'));
    redirect(base_url().'Iuran');

  }



  function edit()
  {
    $id = $this->uri->segment(3);
    $data = array(
      'form' => 'Iuran/form_edit',
      'body' => 'Iuran/edit',
      'iuran' => $this->ModelIuran->get_data_edit($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  public function update()
  {
    $idiuran = $this->input->post('idiuran');

    $data = array(
      'nik' => $this->input->post("nik"),
      'npwp'=> $this->input->post("npwp"),
      'email' => $this->input->post("email"),
      'telepon' => $this->input->post("telepon")
    );
    $patch = "./file/iuran/";
    $config['upload_path']          = $patch;
    $config['allowed_types']        = 'docx|pdf|gif|jpg|png|jpeg';
    $config['max_size']             = 8000000000;
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload');
    $this->upload->initialize($config);
    if ($this->upload->do_upload('file')) {
      $data['file'] = $this->upload->data()['file_name'];
    }

    $this->db->where('idiuran',$idiuran);
    if ($this->db->update('iuran', $data)) {
      $this->session->set_flashdata('notif', $this->Notif->berhasil('Berhasil Tersimpan'));
      redirect(base_url().'Iuran');
    } else {
      $this->session->set_flashdata('notif', $this->Notif->gagal('Gagal Tersimpan'));
      redirect(base_url().'Iuran');
    }

  }

  public function delete()
  {
    $id = $this->input->post('id');
    $data = $this->db->where_in('idiuran', $id)->get("iuran")->result();
    foreach ($data as $value) {
      unlink("./file/iuran/".$value->file);
    }

    $this->db->where_in('idiuran', $id);
    $delete = $this->db->delete('iuran');
    if ($delete) {
      $this->session->set_flashdata('notif', $this->Notif->berhasil('Berhasil Hapus Data Iuran'));
    }else{
      $this->session->set_flashdata('notif', $this->Notif->gagal('Gagal Hapus Data Iuran'));
    };
    redirect(base_url().'Iuran');
  }



  function tagihan_iuran($npp,$bank=NULL){
    $npp = base64_decode($npp);
    $data_tagihan = $this->ModelIuran->get_tagihan($npp);
    $bank = $this->input->post("bank");
    $bank = $this->db->get_where("bank",array("idbank"=>$bank))->row();

    $data = array(
      'data' => $data_tagihan,
      'tgl' => date("d-m-Y"),
      'bank_bayar' => $bank,
      'bank_va' => $this->db->get_where("bank",array("kode !="=>NULL))->result()
    );
    // die(var_dump($data));
    $this->load->view('Beranda/cetak_tagihan',$data);

  }



}
?>
