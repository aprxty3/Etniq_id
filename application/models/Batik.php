<?php
class Batik extends CI_Model{
    public function getBatik($template = NULL){
        $data = $this->db->get('batik');
        foreach($data->result() as $row){
            echo "<input type='image' name='".$row->Nama_Batik."' onclick='gantiBatik(\"$row->Id_Batik\")' src='../../".$row->Lokasi."' style='width: 100px;height: 100px;'> ";
        }
    }
}
?>