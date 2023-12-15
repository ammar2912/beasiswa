<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataRekening_model extends CI_Model {

    public function getDataRekening() {
        $this->db->get('tb_data_beasiswa')->result();
    }

    public function updateDataRekening($nama, $data) {
        $this->db->where('nama', $nama);
        $this->db->update('tb_data_beasiswa', $data);
    }
}
