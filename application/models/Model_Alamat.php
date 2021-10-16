<?php
class Model_Alamat extends CI_Model{
    
    public function selectAlamat($id = NULL){
        $id_user = $this->session->userdata('id_user');
        if($id) return $this->db->get_where('alamat_user', "id_user='$id_user' AND status_alamat=1 AND id_alamat='$id'");
        else return $this->db->get_where('alamat_user', "id_user='$id_user' AND status_alamat=1");
    }

    public function insertAlamat(){
        $id_user = $this->session->userdata('id_user');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $alamat = $this->input->post('alamat');
        $kode_pos = $this->input->post('kode_pos');
        $this->db->insert('alamat_user', array(
            'id_alamat' => '',
            'id_user' => $id_user,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'alamat_pelanggan' => $alamat,
            'status_alamat' => 1,
            'kode_pos' => $kode_pos,
        ));
        if($this->db->affected_rows())return true;
        else return false;
    }

    public function ubahAlamat(){
        $id_alamat = $this->input->post('ubah');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $alamat = $this->input->post('alamat');
        $kode_pos = $this->input->post('kode_pos');
        $this->db->update('alamat_user', array(
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'alamat_pelanggan' => $alamat,
            'kode_pos' => $kode_pos,
        ),"id_alamat='$id_alamat'");
        if($this->db->affected_rows())return true;
        else return false;
    }
}