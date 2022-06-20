<?php

class Articles_model extends CI_Model
{
    function getThreeLastArticles() {
        $this->db->select("idarticle, article_title, substr(article_content, 1, 100) as slide_descrip, article_image_path, article_date, token");
        $this->db->from("articles");
        $this->db->where('user_delete  is null');
		$this->db->where('date_delete is null');
		$this->db->limit(3);
        $this->db->ORDER_BY('article_date desc');
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
        $this->db->select("idarticle, article_title, article_content, article_image_path, article_date");
        $this->db->from("articles");
        $this->db->where('token', $token);
		$this->db->where('user_delete  is null');
		$this->db->where('date_delete is null');
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


    public function record_count()
    {
        $this->db->select ( 'COUNT(*) AS `numrows`' );
        $this->db->where('articles.date_delete is null');
        $query = $this->db->get ( 'articles' );
        return $query->row ()->numrows;
    }


    public function fetch_article($limit, $start)
    {
        $this->db->select("idarticle, article_title, substr(article_content, 1, 100) as slide_descrip, article_image_path, article_date, token");
        $this->db->limit($limit, $start);
		$this->db->where('articles.user_delete is null');
		$this->db->where('articles.date_delete is null');
        $this->db->order_by('article_date', 'desc');
        $query = $this->db->get("articles");



        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;
    }

    public function getDetailArticleAvancee($id){
        $this->db->select("id, title, contenu, image, date");
        $this->db->from("articles_avancee");
        $this->db->where('id', $id);
        $this->db->where('date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }


    public function getTitreArticleAvancee($id){
        $this->db->select("title");
        $this->db->from("articles_avancee");
        $this->db->where('id', $id);
        $this->db->where('date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }

    public function record_count_avancees()
    {
        $this->db->select ( 'COUNT(*) AS `numrows`' );
        $this->db->where('articles_avancee.date_delete is null');
        $query = $this->db->get ( 'articles_avancee' );
        return $query->row ()->numrows;
    }

    public function fetch_article_avancees($limit, $start)
    {
        $this->db->select("id, title, image, date");
        $this->db->limit($limit, $start);
        $this->db->where('user_delete is null');
        $this->db->order_by('date', 'desc');
        $query = $this->db->get("articles_avancee");



        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;
    }
}
