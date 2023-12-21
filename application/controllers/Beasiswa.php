<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelBeasiswa");
    $this->load->model("ModelDetail");
    $this->load->model("user_model");
  }

  function index()
  {

    $this->load->library('pagination');
    $config['base_url'] = base_url('beasiswa/index');
    $config['total_rows'] = $this->ModelDetail->count_all();
    $config['per_page'] = 10; // Jumlah data per halaman

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['all_data'] = $this->ModelDetail->get_all($config['per_page'], $page);

    $this->load->view('Landing/Beasiswa/list', $data);
  }

  function detail($id)
  {
    $data['detail_beasiswa'] = $this->ModelDetail->get_data($id)->row(); 
    $this->load->view('Beasiswa/detail', $data);
  }

  function search()
{
    $keyword = $this->input->get('keyword');
    echo "Keyword: " . $keyword; // Cek apakah keyword telah diterima dengan benar

    $this->load->model('ModelDetail');
    $data['beasiswa'] = $this->ModelDetail->searchBeasiswa($keyword);
    $this->load->view('Landing/Beasiswa/list', $data);
}

  function Beasiswa(){
  $data = array(
    'body'  => 'Beasiswa/list' ,
    'data'  => $this->ModelBeasiswa->get_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'Beasiswa/form',
      'body' => 'Beasiswa/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'nama_beasiswa'  => $this->input->post("nama_beasiswa"),
      'penyelenggara'     => $this->input->post("penyelenggara"),
      'deskripsi'     => $this->input->post("deskripsi"),
      'tgl_pendaftaran'     => $this->input->post("tgl_pendaftaran"),
      'tgl_penutupan'     => $this->input->post("tgl_penutupan"),
      'berkas'       => $this->upload_file("berkas")["link"],
    );
    if ($this->db->insert('beasiswa', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
    }
    redirect(base_url().'Beasiswa/Beasiswa');
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'Beasiswa/form',
      'body'          => 'Beasiswa/edit' ,
      'data'          => $this->ModelBeasiswa->get_data($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $id = $this->input->post("id");
    $data = array(
      'nama_beasiswa'  => $this->input->post("nama_beasiswa"),
      'penyelenggara'     => $this->input->post("penyelenggara"),
      'deskripsi'  => $this->input->post("deskripsi"),
      'tgl_pendaftaran'     => $this->input->post("tgl_pendaftaran"),
      'tgl_penutupan'  => $this->input->post("tgl_penutupan"),
    );
    if ($_FILES["berkas"]["name"] == null) {
      $this->db->where('id_beasiswa', $id);
      if ($this->db->update('beasiswa', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
    }else {
      $LayananKemahasiswaan = $this->ModelBeasiswa->get_data($id)->row_array();
      unlink('./'.$LayananKemahasiswaan['berkas']);
      $data['berkas'] = $this->upload_file("berkas")["link"];
      $this->db->where('id_beasiswa', $id);
        if ($this->db->update('beasiswa', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
        }else {
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
        }

    }
      redirect("Beasiswa/Beasiswa");
  }



  function hapus($id)
  {
      $this->db->where("id_beasiswa", $id);
      if ($this->db->delete('beasiswa')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'Beasiswa/Beasiswa');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'Beasiswa/Beasiswa');
      }
  }

  function upload_file($file){
    $msg="";
    $nama="";
    $config['upload_path']          = './Dokumen';
    $config['allowed_types']        = '*';
    $config['max_size']             = 11240;
    echo $_FILES[$file]["name"];
    if ($_FILES[$file]["name"]){
                $this->load->library('upload', $config);
                if ( !$this->upload->do_upload($file))
                {
                        $msg= $this->upload->display_errors();
                }
                else
                {
                        $upload = $this->upload->data();
                        $nama = $upload['file_name'];
                        $msg = "Berhasil Upload ".$nama;
                }
              } else {
                $msg="File Kosong";
              }
    return  array('pesan' => $msg,
                  'nama' => $nama,
                  'link' => "Dokumen/".$nama);
    }


    // public function detailbeasiswa()
    // {
    //   $this->load->view('Beasiswa/detail');
    // }

    public function loginbeasiswa()
    {
      $this->load->view('Beasiswa/login');
    }

    public function datapribadibeasiswa()
    {
      $this->load->view('Beasiswa/datapribadi');
    }
    public function dataakademikbeasiswa()
    {
      $this->load->view('Beasiswa/dataakademik');
    } 
    public function datakeluargabeasiswa()
    {
      $id=1;
      $data['user'] = $this->user_model->getdata($id);
      $this->load->view('Beasiswa/datakeluarga', $data);
    }
    public function editdatakeluargabeasiswa()
    {
      $id=1;
      $data['user'] = $this->user_model->getdata($id);
      $this->load->view('Beasiswa/editdatakeluarga', $data);
    }
    public function editdatakeluarga(){
      $id=1;

      $data = array(
        'nama_ayah' => $this->input->post('namaAyah'),
        'nama_ibu' => $this->input->post('namaIbu'),
        'pekerjaan_ayah' => $this->input->post('pekerjaanayah'),
        'pekerjaan_ibu' => $this->input->post('pekerjaanIbu'),
        'penghasilan_ayah' => $this->input->post('penghasilanayah'),
        'penghasilan_ibu' => $this->input->post('penghasilanIbu'),
        'status_ayah' => $this->input->post('statusAyah'),
        'status_ibu' => $this->input->post('statusIbu'),
        'tanggungan_anak' => $this->input->post('tanggungan')
    );

    $this->user_model->updateDataKeluarga($id, $data);
    redirect('/Beasiswa/datakeluargabeasiswa');
    }
    public function datarekeningbeasiswa()
    {
      $id=1;
      $data['user'] = $this->user_model->getdata($id);
      $this->load->view('Beasiswa/datarekening', $data);
    }
    public function editdatarekeningbeasiswa()
    {
      $id=1;
      $data['user'] = $this->user_model->getdata($id);
      $this->load->view('Beasiswa/editdatarekening', $data);
    }
    public function editdatarekening(){
      $id=1;
        $data = array(
            'nama_bank' => $this->input->post('namaBank'),
            'no_rekening' => $this->input->post('noRek')
        );

    $this->user_model->updateDataKeluarga($id, $data);
    redirect('/Beasiswa/datarekeningbeasiswa');
    }
    public function dokumenbeasiswa()
    {
      $this->load->view('Beasiswa/dokumen');
    }
    public function statusbeasiswa()
    {
      $this->load->view('Beasiswa/statusbeasiswa');
    } 
    public function historybeasiswa()
    {
      $this->load->view('Beasiswa/history');
    }



}
