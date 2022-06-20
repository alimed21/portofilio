<?php


class Parametres_model extends CI_Model
{
  public function getLastePasswordUser($idUser){
    $this->db->select('password');
    $this->db->from('utilisateurs');
    $this->db->where('id_user', $idUser);
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

  public function changePassword($idUser, $data){
    $this->db->where('id_user', $idUser );
    $this->db->update('utilisateurs', $data);
    return true;
  }
}