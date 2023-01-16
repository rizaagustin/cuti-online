<?php
Class Auth extends CI_Controller{

	function __construct(){
		parent :: __construct();
		$this->load->model(array('M_pegawai'));		
		$this->load->library('session');
	}

	function alert($message,$type){
		$message = $this->session->set_flashdata('message', '<div class="alert alert-'.$type.'" role="alert">
				'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		return $message;		
	}

	function login(){
		//jika button di klik (yg ada di view)
		if(isset($_POST['submit'])){
			//proses login disini
			$id_pegawai	=	$this->input->post('id_pegawai');
			$password	=	$this->input->post('password');

			$hasil =	$this->M_pegawai->login($id_pegawai,md5($password));
			$jabatan=$this->M_pegawai->tampilkan_data_byid($id_pegawai)->row_array();
			
			if ($jabatan['tipe_user'] == 'OPERATOR') {
			redirect('auth/login');				
			}

			if($hasil==1)
			{
				$this->session->set_userdata($jabatan);
				redirect ('home');
			}
			else{

			//alert 
			// $message = 'ID pegawai dan Password Salah...!!!';
			// $type = 'danger';
			// echo $this->alert($message,$type);
			// redirect('auth/login');
			echo "gagal";
			}
		}
		else{

			$this->load->view('form_login');

		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('Auth/login');
	}
}