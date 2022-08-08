<?php


class Services_model extends CI_Model
{
    public function getAllServices(){
        $this->db->select("id_ser, titre_ser, image_ser, token_ser");
        $this->db->from("services");
        $this->db->where("user_delete  is null");
        $this->db->where("date_delete is null");
        $this->db->limit(3);
        $this->db->order_by('id_ser',"ASC");
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

    public function getDetailService($token){
        $this->db->select("titre_ser, intro_ser, token_ser");
        $this->db->from("services");
        $this->db->where("token_ser", $token);
		$this->db->where("user_delete  is null");
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

   

}
