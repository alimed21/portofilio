<?php


class Articles_model extends CI_Model
{
    public function addArticle($data)
    {
        $this->db->insert('articles', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getAllArticle(){
        $this->db->select("idarticle, article_title, substr(article_content, 1, 100) as slide_descrip, article_image_path, article_date, token");
        $this->db->from("articles as a");
        $this->db->join("administrateur as ad", "ad.id_admin  = a.user_add");
        $this->db->where("a.user_delete  is null");
        $this->db->where("a.date_delete is null");
        $this->db->order_by('idarticle',"DESC");
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

    public function getDetailArticle($token){
        $this->db->select("token, article_title, article_content, article_date");
        $this->db->from("articles as a");
        $this->db->where("token", $token);
        $this->db->where("a.user_delete is null");
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

    public function getImageArticle($token){
        $this->db->select("token");
        $this->db->from("articles as a");
		$this->db->where("token", $token);
		$this->db->where("a.user_delete is null");
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
    public function updateArticle($data, $token)
    {
        $this->db->where('token', $token);
        $this->db->update('articles', $data);
        return true;
    }

    public function updateImageArticle($data, $token)
    {
        $this->db->where('token', $token);
        $this->db->update('articles', $data);
        return true;
    }


    public function suppremierArticle($data, $token)
    {
        $this->db->where('token', $token );
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
