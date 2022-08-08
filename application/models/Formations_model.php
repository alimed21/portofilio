<?php


class Formations_model extends CI_Model
{
    public function getAllFormation(){
        $this->db->select("id, titre, intro, annee");
        $this->db->from("formations");
        $this->db->where("admin_delete is null");
        $this->db->where("date_delete is null");
        $this->db->limit(4);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}
