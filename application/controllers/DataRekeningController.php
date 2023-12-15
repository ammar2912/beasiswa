<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataRekeningController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DataRekening_model');
    }

    public function updateData() {
        $nama = "Zahra Aulia Maulidina";
        $data = array(
            'nama_bank' => $this->input->post('namaBank'),
            'no_rekening' => $this->input->post('noRek')
        );

        $this->DataRekening_model->updateDataRekening($nama, $data); // Panggil method updateData pada model dengan parameter name dan data
        redirect('/Page/edr'); // Redirect ke halaman yang sesuai
    }
}
