<?php
class Model_Pembayaran extends CI_Model{

    public function selectPembayaran(){
        $id_user = $this->session->userdata('id_user');
        $this->db->select('payout.*');
        $this->db->from('payout');
        $this->db->join('keranjang','payout.id_keranjang=keranjang.id_keranjang');
        $this->db->join('tracking', 'payout.id_payout=tracking.id_payout');
        $this->db->order_by('payout.tanggal_payout','DESC');
        $this->db->where("id_user='$id_user' AND tracking.status <> 'Dibatalkan' AND tracking.tanggal=(SELECT MAX(tanggal) FROM tracking WHERE id_payout=payout.id_payout)");
        return $this->db->get();
    }

    public function selectDetailPembayaran($id_pembayaran = NULL){
        $this->db->select('payout.*, detail_keranjang.qty, detail_keranjang.harga_satuan, barang.nama_barang, alamat_user.*, user.nama_pelanggan, diskon.diskon, (detail_keranjang.qty*detail_keranjang.harga_satuan) as total');
        $this->db->from('payout');
        $this->db->join('alamat_user', 'payout.id_alamat=alamat_user.id_alamat');
        $this->db->join('user','alamat_user.id_user=user.id_user');
        $this->db->join('detail_keranjang', 'payout.id_keranjang=detail_keranjang.id_keranjang');
        $this->db->join('diskon', 'payout.kd_diskon=diskon.kd_diskon');
        $this->db->join('barang', 'detail_keranjang.id_barang=barang.id_barang');
        $this->db->where("payout.id_payout='$id_pembayaran'");
        return $this->db->get();
    }

}