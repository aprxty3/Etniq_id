<?php
class Dashboard extends My_Controller{
    public function index(){
        $hasil = $this->Template->getTemplate();
        $data['data'] = $hasil;
        $this->load->view('header');
        $this->load->view('dashboard',$data);
        $this->load->view('footer');
    }
}
?>