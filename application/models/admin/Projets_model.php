<?php

class Projets_model extends CI_Model
{
    public function addProjet($data){
        $this->db->insert('projet', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getAllProjet(){
        $this->db->select("id_pro, titre_pro, substr(contenu_pro, 1, 150) as slide_descrip, lien, type, image_pro, p.date_add, token");
        $this->db->from("projet as p");
        $this->db->join("administrateur as ad", "ad.id_admin  = p.user_add");
        $this->db->where("p.user_delete is null");
        $this->db->where("p.date_delete is null");
        $this->db->order_by('id_pro',"DESC");
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

    public function getDetailProjet($token){
        $this->db->select("token, titre_pro, type, lien, contenu_pro, date_pro");
        $this->db->from("projet");
        $this->db->where("token", $token);
        $this->db->where("date_delete is null");
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function updateProjet($data, $token){
        $this->db->where('token', $token);
        $this->db->update('projet', $data);
        return true;
    }

    public function suppremierProjet($data, $token){
        $this->db->where('token', $token);
        $this->db->update('projet', $data);
        return true;
    }
}
