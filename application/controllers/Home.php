<?php 
Class Home extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model(array('M_pegawai','M_permohonan','M_libur'));
		if (empty($this->session->userdata('id_pegawai'))){
			redirect('auth/login');
		}
	}

	function index(){
		// $data['pegawai'] = $this->M_pegawai->tampilkan_data()->result();
		$data['libur'] = $this->M_libur->tampilkan_data();	
		$data['buat_calender'] = $this->M_permohonan->tampilkan_data_setuju();
		$this->template->load('template','home',$data);			
	}
}