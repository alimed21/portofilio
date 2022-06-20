<?php


class Projets_model extends CI_Model
{
	function getThreeLastProjets() {
		$this->db->select("titre_pro, substr(contenu_pro, 1, 100) as slide_descrip, image_pro, date_pro, token, type, lien");
		$this->db->from("projet");
		$this->db->where('user_delete  is null');
		$this->db->where('date_delete is null');
		$this->db->limit(3);
		$this->db->ORDER_BY('date_pro desc');
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
		$this->db->select("titre_pro, contenu_pro, image_pro, date_pro, token, type, lien");
		$this->db->from("projet");
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
		$this->db->where('date_delete is null');
		$query = $this->db->get ( 'projet' );
		return $query->row ()->numrows;
	}

	public function fetch_article($limit, $start)
	{
		$this->db->select("id_pro, titre_pro, substr(contenu_pro, 1, 100) as slide_descrip, image_pro, date_pro, type, token");
		$this->db->limit($limit, $start);
		$this->db->where('user_delete is null');
		$this->db->where('date_delete is null');
		$this->db->order_by('article_date', 'desc');
		$query = $this->db->get("projet");



		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {

				$data[] = $row;

			}

			return $data;

		}

		return false;
	}

}
