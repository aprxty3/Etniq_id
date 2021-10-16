<?php
class Pembelian extends MY_Controller{

    public function index(){
        $this->load->view('header');
        $data['pembelian'] = $this->Model_Pembelian->selectPembelian();
        $this->load->view('pembelian/pembelian',$data);
        $this->load->view('footer');
    }

    public function detail($id){
        $this->load->view('header');
        $data['detail'] = $this->Model_Pembelian->selectDetail($id);
        $this->load->view('pembelian/detail',$data);
        $this->load->view('footer');
    }
}
