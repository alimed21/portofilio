<?php


class Menu_model extends CI_Model
{
	/** Menu*/
	public function addMenu($data)
	{
		$this->db->insert('menu', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getAllMenu(){
		$this->db->select("id_menu , menu_name, lien_externe, Order_menu, date_saisie, activer_menu");
		$this->db->from("menu as m");
        $this->db->join("administrateur as ad", "ad.id_admin  = m.USER");
		$this->db->where("m.date_delete is null");
		$this->db->order_by('id_menu',"DESC");
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

	public function getNameMenu($active){
		$this->db->select("id_menu, menu_name");
		$this->db->from("menu");
        $this->db->where("activer_menu", $active);
        $this->db->where("date_delete is null");
		$this->db->order_by('id_menu',"ASC");
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

	public function activerMenu($data, $id_menu){
		$this->db->where('id_menu', $id_menu);
		$this->db->update('menu', $data);
		return true;
	}


	public function desactiverMenu($data, $id_menu){
		$this->db->where('id_menu', $id_menu);
		$this->db->update('menu', $data);
		return true;
	}

	public function supprimerMenu($data, $id_menu){
		$this->db->where('id_menu', $id_menu);
		$this->db->update('menu', $data);
		return true;
	}

    public function getDetailMenu($id){
        $this->db->select("id_menu , menu_name, lien_externe, Order_menu");
        $this->db->from("menu as m");
        $this->db->where("id_menu", $id);
        $this->db->where("m.date_delete is null");
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

    public function updateMenu($data, $id){
        $this->db->where('id_menu', $id);
        $this->db->update('menu', $data);
        return true;
    }
	/** Sous-Menu*/

	public function getNameSsMenu(){
		$this->db->select("id_ss_menu, ss_menu");
		$this->db->from("sous-menu");
		$this->db->where("date_delete is null");
		$this->db->order_by('id_ss_menu',"DESC");
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

	public function addSousMenu($data)
	{
		$this->db->insert('sous-menu', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getAllSousMenu(){
		$this->db->select("id_ss_menu, ss_menu, order_ss_menu, username, menu_name, ssm.date_add");
		$this->db->from("sous-menu as ssm");
		$this->db->join("utilisateurs as u", "u.id_user  =ssm.user_add");
		$this->db->join("menu as m", "m.id_menu  = ssm.id_menu");
		$this->db->where("ssm.date_delete is null");
		$this->db->order_by('id_ss_menu',"DESC");
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

    public function getNameSousMenu(){
        $this->db->select("id_ss_menu, ss_menu");
        $this->db->from("sous-menu");
        $this->db->where("date_delete is null");
        $this->db->order_by('id_ss_menu',"DESC");
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


    public function supprimerSousMenu($data, $id_ss_menu){
		$this->db->where('id_ss_menu', $id_ss_menu);
		$this->db->update('sous-menu ', $data);
		return true;
	}

    public function getDetailSousMenu($id){
        $this->db->select("id_ss_menu, ss_menu, lien, order_ss_menu");
        $this->db->from("sous-menu as m");
        $this->db->where("id_ss_menu", $id);
        $this->db->where("m.date_delete is null");
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

    public function updateSousMenu($data, $id){
        $this->db->where('id_ss_menu', $id);
        $this->db->update('sous-menu ', $data);
        return true;
    }

    /** Rubrique */
    public function addRubrique($data)
    {
        $this->db->insert('rubrique', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getAllRubrique(){
        $this->db->select("id_rubrique, rubrique, ss_menu, order, username, rb.date_add");
        $this->db->from("rubrique as rb");
        $this->db->join("utilisateurs as u", "u.id_user = rb.user_add");
        $this->db->join("sous-menu as ss_m", "ss_m.id_ss_menu = rb.id_ss_menu");
        //$this->db->join("pages as p", "p.id_page = rb.id_page");
        $this->db->where("rb.date_delete is null");
        $this->db->order_by('id_rubrique',"DESC");
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

    public function supprimerRubrique($data, $id){
        $this->db->where('id_rubrique', $id);
        $this->db->update('rubrique ', $data);
        return true;
    }

    public function getDetailRubrique($id){
        $this->db->select("id_rubrique, rubrique, order, lien");
        $this->db->from("rubrique");
        $this->db->where("id_rubrique", $id);
        $this->db->where("date_delete is null");
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

    public function updateRubrique($data, $id){
        $this->db->where('id_rubrique', $id);
        $this->db->update('rubrique ', $data);
        return true;
    }
}
