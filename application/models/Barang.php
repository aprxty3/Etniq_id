<?php
class Barang extends CI_Model{
    public function getLokasi($template, $batik){
        $data = $this->db->get_where("barang", array(
            "id_template" => $template, 
            "id_batik" => $batik));
        return $data;
    }

    public function getId_Barang($id_template, $id_batik){
        $result = $this->db->get_where('barang', array(
            'id_template' => $id_template,
            'id_batik' => $id_batik
        ));
        return $result->row()->Id_Barang;
    }

    public function getTotal_Harga($id_template, $id_batik){
        $result = $this->db->get_where('barang', array(
            'id_template' => $id_template,
            'id_batik' => $id_batik
        ));
        return $result->row()->Total_Harga;
    }
}
?>