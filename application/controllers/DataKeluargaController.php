<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKeluargaController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DataKeluarga_model');
    }
    public function index() {
        $this->load->view('edit-data-keluarga');
    }

    public function updateData() {
        $nama = 'Zahra Aulia Maulidina';
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

        $this->DataKeluarga_model->updateDataKeluarga($nama, $data); // Panggil method updateData pada model dengan parameter name dan data
        redirect('/Page/viewEdk'); // Redirect ke halaman yang sesuai
    }
}
