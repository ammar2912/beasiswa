<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPribadi_model extends CI_Model {

    public function getDataPribadi() {
        $this->db->get('tb_data_beasiswa')->result();
    }

    public function updateDataPribadi($nama, $data) {
        $this->db->where('nama', $nama);
        $this->db->update('tb_data_beasiswa', $data);
    }
}
