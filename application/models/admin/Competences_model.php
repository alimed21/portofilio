<?php


class Competences_model extends CI_Model
{
    public function getAllCompetences(){
        $this->db->select("id_cmp, titre_cmp, taille_cmp");
        $this->db->from("competence as c");
        $this->db->join("administrateur as ad", "ad.id_admin  = c.id_admin_add");
        $this->db->where("c.id_admin_delete  is null");
        $this->db->where("c.date_delete is null");
        $this->db->order_by('id_cmp',"DESC");
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

    public function addCompetence($data){
        $this->db->insert('competence', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
