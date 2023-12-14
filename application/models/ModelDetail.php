<?php
class ModelDetail extends CI_Model
{
    function get_all()
    {
        return $this->db->get("detailbeasiswa")->result();
    }
}