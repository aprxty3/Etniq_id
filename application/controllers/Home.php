<?php
class Home extends CI_Controller{
	public function index(){
		$hasil = $this->Template->getTemplate();
		$data['data'] = $hasil;
		$this->load->view('home/header');
		$this->load->view('home/home', $data);
		
		if ($this->session->userdata('status')) redirect(base_url('dashboard'));
		if ($_POST){
			if ($_POST['action'] == 'login'){
				$email = $this->input->post('email_login');
				$password = $this->input->post('password_login');
				$hasil = $this->Users->login($email, $password);

				if ($hasil->num_rows() > 0){
					$data = $hasil->row();
					$this->session->set_userdata(
						array(
							'status' => 'login',
							'id_user' => $data->Id_User,
							'nama_pelanggan' => $data->Nama_Pelanggan
						)
					);
					redirect(base_url('dashboard'));
				}else{
					$data['msg'] = $this->Msg->show('Username atau password salah');
				}
			}else{
				$nama = $this->input->post('nama-user');
				$jenis_kelamin = $this->input->post('jenis-kelamin');
				$tanggal_lahir = $this->input->post('tanggal-lahir');
				$tanggal_lahir = str_replace('/','-',$tanggal_lahir);
				list($bulan,$tahun,$tanggal) = explode('/',$tanggal_lahir);
				$tanggal_lahir = $tahun.'-'.$bulan.'-'.$tanggal;
				$telepon = $this->input->post('no-hp');;
				$email = $this->input->post('email_daftar');
				$password = $this->input->post('password_daftar');
				$this->db->insert('user', array(
					'id_user' => '',
					'nama_pelanggan' => $nama,
					'jenis_kelamin' => $jenis_kelamin,
					'tanggal_lahir' => $tanggal_lahir,
					'telepon' => $telepon,
					'email' => $email,
					'password' => $password
				));
				$hasil = $this->Users->login($email, $password);	
				if ($hasil->num_rows() > 0){
					$data = $hasil->row();
					$this->session->set_userdata(
						array(
							'status' => 'login',
							'id_user' => $data->Id_User,
							'nama_pelanggan' => $data->Nama_Pelanggan
						)
					);
				}
				redirect(base_url('dashboard'));
			}
		}
		$this->load->view('home/footer',$data);
	}

	public function login(){
		$hasil = $this->Template->getTemplate();
		$data['data'] = $hasil;
		$data['scripts'] = '<script language="javascript">$(document).ready(function(){$("#login").modal("show");});</script>';
		$this->load->view('home/header');
		$this->load->view('home/home', $data);
		$this->load->view('home/footer',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
?>