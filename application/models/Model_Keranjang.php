<?php
class Model_Keranjang extends CI_Model{
    public function insert(){
        $id_user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->where("id_user='$id_user' AND NOT EXISTS (SELECT * FROM payout WHERE id_keranjang=keranjang.id_keranjang)", NULL, false);
        $result = $this->db->get();
        if($result->num_rows() == 0){
            $this->db->insert('keranjang',array(
                'Id_Keranjang' => $this->db->insert_id(),
                'Id_User' => $id_user
            ));
        }
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->where("id_user='$id_user' AND NOT EXISTS (SELECT * FROM payout WHERE id_keranjang=keranjang.id_keranjang)", NULL, false);
        $result = $this->db->get();
        $id_keranjang = $result->row()->Id_Keranjang;
        $harga_satuan = $this->Barang->getTotal_Harga($this->input->post('template'),$this->input->post('batik'));
        if($this->input->post('potongan') == "Lengan Panjang") $harga_satuan += 20000;
        $this->db->insert('detail_keranjang', array(
            "Id" => $this->db->insert_id(),
            "Id_Keranjang" => $id_keranjang,
            "Id_Barang" => $this->Barang->getId_Barang($this->input->post('template'),$this->input->post('batik')),
            "Qty" => 1,
            "Harga_Satuan" => $harga_satuan,
            "Potongan" => $this->input->post('potongan'),
            "Lingkar_Dada" => $this->input->post('lingkar_dada'),
            "Lebar_Bahu" => $this->input->post('lebar_bahu'),
            "Leher" => $this->input->post('leher'),
            "Ketiak" => $this->input->post('ketiak'),
            "Perut" => $this->input->post('perut'),
            "Pinggul_Atas" => $this->input->post('pinggul_atas'),
            "Panjang_Baju" => $this->input->post('panjang_baju'),
            "Panjang_Tangan_Pjg" => $this->input->post('panjang_tangan_pjg'),
            "Panjang_Tangan" => $this->input->post('panjang_tangan'),
            "Pergelangan" => $this->input->post('pergelangan'),
            "Ukuran" => $this->input->post('ukuranstandar')
        ));
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function insertPembayaran(){
        $kurir = $this->input->post('kurir');
        $pelayanan = $this->input->post('pelayanan');
        $alamat = explode('-',$this->input->post('alamat'));
        if($this->input->post('kd_diskon'))$kd_diskon = $this->input->post('kd_diskon');
        else $kd_diskon = 'null';
        $id_keranjang = $this->getId_Keranjang();
        $tgl = date('Y-m-d', now('Asia/Jakarta'));
        $result = $this->db->get_where('payout',"tanggal_payout='$tgl'");
        $total = $this->selectTotal()->row()->total;
        if($this->selectDiskon()->num_rows() == 1) $diskon = $this->selectDiskon()->row()->Diskon;
        else $diskon = 0;
        $rajaongkir = new RajaOngkir;
        $total = $total-($total*($diskon/100));
        $ongkir = $rajaongkir->get_ongkir($alamat[0],$kurir)['rajaongkir']['results'][0]['costs'][$pelayanan]['cost'][0]['value'];
        $total = $total+$ongkir;
        $total = $total+(100+$result->num_rows());
        if($this->getKeranjang()->num_rows() == 1){
            $this->db->insert('payout', array(
                'id_payout' => '',
                'kd_diskon' => $kd_diskon,
                'id_keranjang' => $id_keranjang,
                'id_alamat' => $alamat[1],
                'ongkir' => $ongkir,
                'total_bayar' => $total,
                'tanggal_payout' => date('Y-m-d H:i:s', now('Asia/Jakarta')),
                'expired_payout' => date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s', now('Asia/Jakarta')) . "+1 days"))
            ));
            $result = $this->db->get_where('payout', "id_keranjang='$id_keranjang'");
            $this->db->insert('tracking', array(
                'id_tracking' => '',
                'id_payout' => $result->row(0)->Id_Payout,
                'status' => 'Menunggu Pembayaran',
                'tanggal' => date('Y-m-d H:i:s', now('Asia/Jakarta'))
            ));
        }
    }

    public function delete(){
        $id = $this->input->post('hapus');
        $this->db->delete('detail_keranjang', "id='$id'");
    }

    public function getKeranjang(){
        $id_keranjang = $this->getId_Keranjang();
        $this->db->select('detail_keranjang.*, barang.Nama_Barang, barang.Lokasi');
        $this->db->from('detail_keranjang');
        $this->db->join('keranjang', 'detail_keranjang.id_keranjang=keranjang.id_keranjang');
        $this->db->join('barang', 'detail_keranjang.id_barang=barang.id_barang');
        $this->db->where("keranjang.id_keranjang='$id_keranjang'");
        return $this->db->get();
    }

    public function getId_Keranjang(){
        $id_user = $this->session->userdata('id_user');
        $this->db->select('keranjang.id_user, detail_keranjang.*');
        $this->db->from('keranjang');
        $this->db->join('detail_keranjang', 'keranjang.id_keranjang=detail_keranjang.id_keranjang');
        $this->db->where("keranjang.id_user='$id_user' AND NOT EXISTS (SELECT * FROM payout where payout.id_keranjang = detail_keranjang.id_keranjang)",null,false);
        $result = $this->db->get();
        if($result->num_rows() > 0) return $result->row()->Id_Keranjang;
        else return 0;
    }

    public function selectTotal(){
        $id_keranjang = $this->getId_Keranjang();
        $this->db->select('sum(qty) as qty, sum(qty*harga_satuan) as total');
        $this->db->from('detail_keranjang');
        $this->db->join('keranjang', 'detail_keranjang.id_keranjang=keranjang.id_keranjang');
        $this->db->where("keranjang.id_keranjang='$id_keranjang'");
        return $this->db->get();
    }

    public function selectDiskon(){
        $kd_diskon = $this->input->post('kd_diskon');
        return $this->db->get_where('diskon', "kd_diskon='$kd_diskon' AND status=1");
    }
}