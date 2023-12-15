<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKeluarga_model extends CI_Model {

    public function getDataKeluarga() {
        return $this->db->get('tb_data_beasiswa');
    }

    public function updateDataKeluarga($nama, $data) {
        $this->db->where('nama', $nama);
        $this->db->update('tb_data_beasiswa', $data);
    }
}
