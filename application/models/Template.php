<?php
class Template extends CI_Model{
    public function getTemplate(){
        $data = $this->db->get_where('template');
        return $data;
    }
}
?>