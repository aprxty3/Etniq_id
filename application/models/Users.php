<?php
class Users extends CI_Model{
    public function login($username, $password){
        $data = $this->db->get_where("user", array("email" => $username, "password" => $password));
        return $data;
    }

    public function get_alamat(){
        $id_user = $this->session->userdata('id_user');
        return $this->db->get_where('alamat_user', "id_user='$id_user'");
    }
}
?>