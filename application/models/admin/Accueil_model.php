<?php


class Accueil_model extends CI_Model
{
   public function clientsInscrit(){
       $this->db->select("COUNT(id_client) as totalClient");
       $this->db->from("client");
       $this->db->where("date_delete is null");
       $query = $this->db->get();
       
       if($query->num_rows() > 0)
       {
           return $query->row();
       }
       else {
           return false;
       }
   }

   public function allCategories(){
        $this->db->select('id_cat, nom_cat');
        $this->db->from('categorie as c');
        $this->db->where('c.date_delete is null');
        $this->db->limit(3);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return NULL;
        }
    }

    public function countAllSousCategories(){
        $this->db->select('COUNT(id_ss_cat) as totalSSC, ssc.id_cat');
        $this->db->from('sous_categorie as ssc');
        $this->db->where('date_delete is null');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return NULL;
        }
    }
}