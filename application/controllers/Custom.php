<?php
class Custom extends CI_Controller{
    
    public function index(){
        redirect(base_url());
    }
    
    public function template($template = NULL){
        if ($template == NULL){
            redirect(base_url());
        }else{
            $data['template'] = $template;
            $data['js'] = 'assets/js/custom.js';
            $this->load->view('header');
            $this->load->view('custom', $data);
            if($_POST){
                if(!$this->session->userdata('status')) redirect(base_url('home/login'));
                else{
                    if($this->Model_Keranjang->insert()) redirect(base_url('keranjang'));
                    else $data['msg'] = $this->Msg->show('Gagal');
                }
            }
            $this->load->view('footer',$data);
        }
    }

    public function hasil(){
        if($_POST){
            $template = $this->input->post('template');
            $batik = $this->input->post('batik');
            $data =  $this->Barang->getLokasi($template, $batik);
            $row = $data->unbuffered_row('array');
            // echo base_url($row['Lokasi']);
            $gambar['gambar'] =  explode(';',$row['Lokasi']);
            $this->load->view('hasil', $gambar);
        }
    }

    public function harga(){
        if($_POST){
            $template = $this->input->post('template');
            $batik = $this->input->post('batik');
        }
        $data = $this->Barang->getLokasi(1, 1);
        $row = $data->unbuffered_row('array');
        echo json_encode($row);
    }
}
?>