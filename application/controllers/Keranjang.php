<?php
class Keranjang extends My_Controller{

    public function index(){
        $data['scripts'] = 'keranjang/keranjang_js';
        $data['keranjang'] = $this->Model_Keranjang->getKeranjang();
        $this->load->view('header');
        $data['qty'] = $this->Model_Keranjang->selectTotal()->row()->qty;
        $data['total'] = $this->Model_Keranjang->selectTotal()->row()->total;
        $data['alamat'] = $this->Users->get_alamat();
        if($_POST) {
            if($this->input->post('hapus')){
                $this->Model_Keranjang->delete();
                redirect('keranjang');
            }
            if($this->input->post('submit') == 'diskon'){
                $kd_diskon = $this->input->post('kd_diskon');
                if($this->Model_Keranjang->selectDiskon()->num_rows() == 1) {
                    $data['kd_diskon'] = $kd_diskon;
                    $data['diskon'] = $this->Model_Keranjang->selectDiskon()->row()->Diskon;
                }else $data['diskon'] = 0;
                $data['total'] = $data['total']-($data['total']*($data['diskon']/100));
            }else{
                $this->Model_Keranjang->insertPembayaran();
                redirect(base_url('pembayaran'));
            }
        }
        $this->load->view('keranjang/keranjang', $data);
        $this->load->view('footer', $data);
    }
}