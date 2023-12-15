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
    
}