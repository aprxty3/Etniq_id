<?php
class Model_Pembelian extends CI_Model{

    public function selectPembelian(){
        $id_user = $this->session->userdata('id_user');
        $this->db->select('payout.*, barang.nama_barang, tracking.status');
        $this->db->from('payout');
        $this->db->join('keranjang', "payout.id_keranjang=keranjang.id_keranjang");
        $this->db->from('detail_keranjang', "keranjang.id_keranjang=detail_keranjang.id_keranjang");
        $this->db->join('barang', "detail_keranjang.id_barang=barang.id_barang");
        $this->db->join('tracking', "payout.id_payout=tracking.id_payout");
        $this->db->order_by('payout.tanggal_payout', 'DESC');
        $this->db->where("keranjang.id_user='$id_user' AND tracking.tanggal=(SELECT MAX(tanggal) FROM tracking WHERE id_payout=payout.id_payout)");
        $this->db->group_by('payout.id_payout');
        return $this->db->get();
    }

    public function selectDetail($id){
        $id_user = $this->session->userdata('id_user');
        $this->db->select('payout.*, barang.nama_barang, tracking.status, alamat_user.*');
        $this->db->from('payout');
        $this->db->join('keranjang', "payout.id_keranjang=keranjang.id_keranjang");
        $this->db->from('detail_keranjang', "keranjang.id_keranjang=detail_keranjang.id_keranjang");
        $this->db->join('barang', "detail_keranjang.id_barang=barang.id_barang");
        $this->db->join('tracking', "payout.id_payout=tracking.id_payout");
        $this->db->join('alamat_user', "payout.id_alamat=alamat_user.id_alamat");
        $this->db->where("keranjang.id_user='$id_user' AND payout.id_payout='$id' AND tracking.tanggal=(SELECT MAX(tanggal) FROM tracking WHERE id_payout=payout.id_payout)");
        return $this->db->get();
    }
}