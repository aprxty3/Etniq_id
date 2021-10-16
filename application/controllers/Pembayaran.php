<?php
class Pembayaran extends MY_Controller{

    public function index(){
        $this->load->view('header');
        $data['pembayaran'] = $this->Model_Pembayaran->selectPembayaran();
        $this->load->view('pembayaran/pembayaran', $data);
        $this->load->view('footer');
    }

    public function detail($id_keranjang = NULL){
        $this->load->view('header');
        if ($this->Model_Pembayaran->selectDetailPembayaran($id_keranjang)->result()) $data['detail_pembayaran'] = $this->Model_Pembayaran->selectDetailPembayaran($id_keranjang);
        else redirect(base_url('dashboard'));
        $this->load->view('pembayaran/detail', $data);
        $this->load->view('footer');
    }
}