<?php

class Login_model extends CI_Model {

    public function verificationDonnees($username, $pass){
        $this->db->select('id_admin, login_admin, email_admin');
        $this->db->from('administrateur');
        $this->db->where('login_admin', $username);
        $this->db->where('password_admin', $pass);
        $this->db->where('date_delete is null');
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() == 1){
            //Si les données sont corrects on retourne ses informations
            return $query->result();
        }
        else{
            //Sinon on retourne null
            return NULL;
        }
    }
}