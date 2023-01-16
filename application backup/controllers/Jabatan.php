<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->model(array('M_jabatan','M_departemen'));
		$this->load->library('session');
		if (empty($this->session->userdata('id_pegawai'))){
			redirect('auth/login');
		}
	}

	function index(){
		// echo "test";
	$data['record'] = $this->M_jabatan->tampilkan_data();	
	$this->template->load('template','jabatan/lihat_data',$data);

	}

	function alert($message,$type){
		$message = $this->session->set_flashdata('message', '<div class="alert alert-'.$type.'" role="alert">
				'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		return $message;		
	}

	function simpan (){
		if (isset($_POST['submit'])) {
			$id_departemen = $this->input->post('id_departemen');
			$nama = $this->input->post('nama');
			$id_jabatan = $this->M_jabatan->code_otomatis($id_departemen);
			$data = array('id_jabatan' => $id_jabatan, 'nama_jabatan' => $nama,'id_departemen' => $id_departemen);
			$simpan = $this->M_jabatan->simpan($data);
			//alert 
			$message = 'anda berhasil menginput data...!!!';
			$type = 'success';
			echo $this->alert($message,$type);
			redirect('jabatan');

		}else{
			$data['departemen'] = $this->M_departemen->tampilkan_data();	
			$this->template->load('template','jabatan/form_input',$data);			
		}

	}

	function hapus(){
	 	$id = $this->input->post('id');
	 	$this->M_jabatan->hapus($id);
		//alert 
		$message = 'Data Berhasil di hapus...!!!';
		$type = 'danger';
		echo $this->alert($message,$type);
	}

	function ubah(){
		if (isset($_POST['submit'])) {
			$id = $this->input->post('id_jabatan');
			$id_departemen = $this->input->post('id_departemen');
			$nama = $this->input->post('nama');
			$data = array('nama_jabatan' => $nama,'id_departemen' => $id_departemen);

			//alert 
			$message = 'anda berhasil mengubah data...!!!';
			$type = 'success';
			echo $this->alert($message,$type);

			$this->M_jabatan->update($data,$id);
			redirect('jabatan');
		} else {		
			$id = $this->uri->segment(3);
			$data['record'] = $this->M_jabatan->get_data($id)->row_array();
			$data['departemen'] = $this->M_departemen->tampilkan_data();	
			$this->template->load('template', 'jabatan/form_edit',$data);
		}

	}

}