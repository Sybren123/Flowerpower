<?php
class Examentest extends CI_Model
{

public function insert($data) {
    $this->db->insert('examentest', $data);
}

public function can_login($username, $password){
    $this->db->where('gebruikersnaam', $username);
    $this->db->where('wachtwoord', $password);
    $query = $this->db->get('examentest');

    if($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}

public function getUserLevel($username, $password){
    $this->db->select('*');
    $this->db->from('examentest');
    $this->db->where('gebruikersnaam', $username);
    $this->db->where('wachtwoord', $password);
    $query = $this->db->get();
    return $query;
}


public function getUsers(){
    $this->db->select('*');
    $this->db->from('examentest');
    $query = $this->db->get();
    return $query;
}

public function receiveUsername($username){
    $this->db->select('*');
    $this->db->where('gebruikersnaam', $username);
    $query = $this->db->get('examentest');
    if($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}


}
