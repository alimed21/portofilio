<?php


class Services_model extends CI_Model
{
    public function addService($data)
    {
        $this->db->insert('services', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getAllServices(){
        $this->db->select("id_ser, titre_ser, substr(intro_ser, 1, 150) as slide_descrip, image_ser, date_add");
        $this->db->from("services as s");
        $this->db->join("administrateur as ad", "ad.id_admin  = s.user_add");
        $this->db->where("s.user_delete  is null");
        $this->db->where("s.date_delete is null");
        $this->db->order_by('id_ser',"DESC");
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

    public function getDetailArticle($id){
        $this->db->select("idarticle, article_title, article_content, article_date");
        $this->db->from("articles as a");
        $this->db->where("idarticle", $id);
        $this->db->where("a.date_delete is null");
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

    public function getImageArticle($id){
        $this->db->select("idarticle");
        $this->db->from("articles as a");
        $this->db->where("idarticle", $id);
        $this->db->where("a.date_delete is null");
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }
    }
    public function updateArticle($data, $id_article)
    {
        $this->db->where('idarticle', $id_article );
        $this->db->update('articles', $data);
        return true;
    }

    public function updateImageArticle($data, $id_article)
    {
        $this->db->where('idarticle', $id_article );
        $this->db->update('articles', $data);
        return true;
    }


    public function suppremierArticle($data, $id_article)
    {
        $this->db->where('idarticle', $id_article );
        $this->db->update('articles', $data);
        return true;
    }

    /** Article avancee */
    public function addArticleAvancee($data){
        $this->db->insert('articles_avancee', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getAllArticleAvancees(){
        $this->db->select("id, title, image, username, date");
        $this->db->from("articles_avancee as a");
        $this->db->join("utilisateurs as u", "u.id_user = a.user_add");
        $this->db->where("a.date_delete is null");
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

    public function suppremierArticleAvancees($data, $id)
    {
        $this->db->where('id', $id );
        $this->db->update('articles_avancee', $data);
        return true;
    }

    public function getIdeArticleAvancee($id){
        $this->db->select("id");
        $this->db->from("articles_avancee as a");
        $this->db->where("id", $id);
        $this->db->where("a.date_delete is null");
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

    public function updateImageArticleAvancee($data, $id_article)
    {
        $this->db->where('id', $id_article );
        $this->db->update('articles_avancee', $data);
        return true;
    }

    public function getDetailArticleAvancee($id){
        $this->db->select("id, title, contenu, date");
        $this->db->from("articles_avancee as a");
        $this->db->where("id", $id);
        $this->db->where("a.date_delete is null");
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

    public function updateArticleAvancee($data, $id_article)
    {
        $this->db->where('id', $id_article );
        $this->db->update('articles_avancee', $data);
        return true;
    }
}
