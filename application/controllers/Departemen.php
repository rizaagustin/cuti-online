<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Departemen extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->model(array('M_departemen'));
		if (empty($this->session->userdata('id_pegawai'))){
			redirect('auth/login');
		}
	}

	function index(){
	$data['record'] = $this->M_departemen->tampilkan_data()->result();	
	$this->template->load('template','departemen/lihat_data',$data);
	}

	function cetak(){
	$data['record'] = $this->M_departemen->tampilkan_data()->result();	
	$this->load->view('departemen/cetak_data',$data);		
	}

	function data_departemen(){
		$data['record'] = $this->M_departemen->tampilkan_data()->result();	
		json_encode($data);
	}

	function simpan (){
		if (isset($_POST['submit'])) {
			$id_departemen = $this->input->post('id_departemen');
			$nama = $this->input->post('nama');
			$data = array('id_departemen' => $id_departemen, 'nama_departemen' => $nama);
			$this->M_departemen->simpan($data);
			redirect('departemen');
		}else{
			$this->template->load('template','departemen/form_input');			
		}

	}

	function hapus(){
	 	$id = $this->input->post('id');
	 	$this->M_departemen->hapus($id);
	 	redirect('departemen');	
	}

	function ubah(){
		if (isset($_POST['submit'])) {
			$id = $this->input->post('id_departemen');
			$nama = $this->input->post('nama');
			$data = array('nama_departemen' => $nama);
			$this->M_departemen->update($data,$id);
			redirect('departemen');
		} else {		
			$id = $this->uri->segment(3);
			$data['record'] = $this->M_departemen->get_data($id)->row_array();
			$this->template->load('template', 'departemen/form_edit',$data);
		}

	}

}