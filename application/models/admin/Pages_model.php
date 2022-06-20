<?php


class Pages_model extends CI_Model
{
	public function addPage($data)
	{
		$this->db->insert('pages', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

    public function getAllPages(){
        $this->db->select("id_page , PageTitre, page_lien, userfile, date_add");
        $this->db->from("pages as p");
        $this->db->join("administrateur as ad", "ad.id_admin  = p.user_add");
        $this->db->where("p.user_delete is null");
        $this->db->order_by('id_page',"DESC");
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

    public function getNomPage(){
        $this->db->select("id_page , PageTitre");
        $this->db->from("pages");
        $this->db->where("user_delete is null");
        $this->db->order_by('id_page',"DESC");
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

    public function getDetailPage($id){
        $this->db->select("id_page , PageTitre, CompletText");
        $this->db->from("pages as p");
        $this->db->where("id_page", $id);
        $this->db->where("p.user_delete is null");
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

    public function getImagePage($id){
        $this->db->select("id_page , userfile");
        $this->db->from("pages as p");
        $this->db->where("id_page", $id);
        $this->db->where("p.user_delete is null");
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

    public function updatePages($data, $id){
        $this->db->where('id_page', $id);
        $this->db->update('pages', $data);
        return true;
    }

    public function supprimerPages($data, $id){
        $this->db->where('id_page', $id);
        $this->db->update('pages', $data);
        return true;
    }

}
