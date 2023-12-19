<?php
class ModelDetail extends CI_Model
{
    function get_all($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('tanggalpenutupan >', date('Y-m-d')); 
        $this->db->order_by('id', 'DESC'); 
        return $this->db->get("detailbeasiswa")->result();
    }

        function get_data($id)
    {
        $this->db->where("id",$id);
        return $this->db->get("detailbeasiswa");
    }
    
    function countAllTodaysDeadline()
    {
        $this->db->where('tanggalpenutupan >', date('Y-m-d')); 
        return $this->db->count_all("detailbeasiswa");
    }


    public function insertBeasiswa( $data) {
        $this->db->insert('detailbeasiswa', $data);
    }

    public function get_by_id($id) {
        $query = $this->db->get_where('detailbeasiswa', array('id' => $id));
        return $query->row();
    }

    function searchBeasiswa($keyword)
    {
        $this->db->like('namabeasiswa', $keyword); 
        $this->db->where('tanggalpenutupan >=', date('Y-m-d')); 
        return $this->db->get('detailbeasiswa')->result();
    }

    public function updateBeasiswa($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('detailbeasiswa', $data);
    }
    function count_all()
    {
        return $this->db->count_all("detailbeasiswa");
    }
}