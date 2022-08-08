<?php


class Formations_model extends CI_Model
{
    public function addFormation($data){
        $this->db->insert('formations', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getAllFormation(){
        $this->db->select("id, titre, intro, annee, f.date_add");
        $this->db->from("formations as f");
        $this->db->join("administrateur as ad", "ad.id_admin  = f.admin_add");
        $this->db->where("f.admin_delete is null");
        $this->db->where("f.date_delete is null");
        $this->db->order_by('id',"DESC");
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
