<?php


class Usuario extends CI_Model {

    public function login($username, $password) {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get("usuario")->result();
    }
    
    public function login2($username, $password){
        $this->db->select("*");
        $this->db->from("usuario");
        $this->db->where("username", $username);
        $this->db-where("password", $password);
        return $this->db->get()->result();
    }

}
