<?php


class Competences_model extends CI_Model
{
    public function getAllCompetences(){
        $this->db->select("id_cmp, titre_cmp, taille_cmp");
        $this->db->from("competence as c");
        $this->db->where("c.id_admin_delete  is null");
        $this->db->where("c.date_delete is null");
        $this->db->limit(6);
        $this->db->order_by('id_cmp',"ASC");
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
