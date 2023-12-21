<?php
class ModelDetail extends CI_Model
{
    function get_all()
    {
        return $this->db->get("detailbeasiswa")->result();
    }

        function get_data($id)
    {
        $this->db->where("id",$id);
        return $this->db->get("detailbeasiswa");
    }
    
    public function insertBeasiswa( $data) {
        $this->db->insert('detailbeasiswa', $data);
    }

    public function get_by_id($id) {
        $query = $this->db->get_where('detailbeasiswa', array('id' => $id));
        return $query->row();
    }

    public function updateBeasiswa($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('detailbeasiswa', $data);
    }
}