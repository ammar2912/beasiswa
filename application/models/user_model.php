<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function authenticate_user($username, $password) {
        // Perform database query to check username and password
        $query = $this->db->get_where('userbeasiswa', array('username' => $username));

        if ($query->num_rows() > 0) {
            $user = $query->row();

            // Verify password
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return false;
    }

    public function getData($id){
        $this->db->where("id", $id);
        $query = $this->db->get('userbeasiswa');  // Gantilah 'nama_tabel' dengan nama tabel yang sesuai
        return $query->result();
    }

    public function updateDataKeluarga($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('userbeasiswa', $data);
    }
}
