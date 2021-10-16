<?php
class Alamat extends MY_Controller{

    public function index(){
        $this->load->view('header');
        $data['scripts'] = 'akun/alamat_js';
        $data['alamat'] = $this->Model_Alamat->selectAlamat();
        if($_POST){
            if($this->input->post('simpan')){
                $this->Model_Alamat->insertAlamat();
                redirect(base_url('akun/alamat'));
            }
            if($this->input->post('ubah')){

            }
            if($this->input->post('hapus')){

            }
        }
        $this->load->view('akun/alamat',$data);
        $this->load->view('footer');
    }

    public function ubah($id = NULL){
        $this->load->view('header');
        $data['id'] = $id;
        $data['scripts'] = 'akun/alamat_js';
        $data['alamat'] = $this->Model_Alamat->selectAlamat();
        $data['ubah'] = $this->Model_Alamat->selectAlamat($id)->row();
        if($_POST){
            if($this->input->post('simpan')){
                $this->Model_alamat->insertAlamat();
                redirect(base_url('akun/alamat'));
            }
            if($this->input->post('ubah')){

            }
            if($this->input->post('hapus')){

            }
        }
        $this->load->view('akun/alamat',$data);
        $this->load->view('footer');
    }
}