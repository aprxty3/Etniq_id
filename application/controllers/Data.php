<?php
class Data extends MY_Controller{
    public function kabupaten(){
        if($this->input->post('provinsi')) $provinsi = $this->input->post('provinsi');
        else $provinsi = NULL;
        $rajaongkir = new RajaOngkir;
        $data = $rajaongkir->get_kabupaten($provinsi);
        echo "<option value='' selected disabled>Pilih Kabupaten</option>";
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
		    echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."-".$data['rajaongkir']['results'][$i]['city_name']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
		}
    }

    public function provinsi(){
        $rajaongkir = new RajaOngkir;
        $data = $rajaongkir->get_provinsi();
        echo "<option value='' selected disabled>Pilih Provinsi</option>";
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
            echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
        }
    }

    public function pelayanan(){
        $rajaongkir = new RajaOngkir;
        $id_kabupaten = $this->input->post('id_kabupaten');
        $kurir = $this->input->post('kurir');
        $data = $rajaongkir->get_ongkir($id_kabupaten, $kurir);
        echo "<option value='' selected disabled>Pilih Pelayanan</option>";
        for($i=0; $i < count($data['rajaongkir']['results'][0]['costs']); $i++){
            $pelayanan = $data['rajaongkir']['results'][0]['costs'][$i]['service'];
            echo "<option value='$i'>$pelayanan</option>";
        }
    }

    public function ongkir(){
        $rajaongkir = new RajaOngkir;
        $id_kabupaten = $this->input->post('id_kabupaten');
        $kurir = $this->input->post('kurir');
        $pelayanan = $this->input->post('pelayanan');
        $data = $rajaongkir->get_ongkir($id_kabupaten, $kurir);
        print_r($data['rajaongkir']['results'][0]['costs'][$pelayanan]['cost'][0]['value']);
    }
}