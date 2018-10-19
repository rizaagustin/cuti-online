<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Cuti extends CI_Controller{
	function __construct(){
		parent :: __construct();
		$this->load->model(array('M_cuti'));		
		if (empty($this->session->userdata('id_pegawai'))){
			redirect('auth/login');
		}
	}

	function index(){
		$data['record'] = $this->M_cuti->tampilkan_data();
		$this->template->load('template','cuti/lihat_data',$data);

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
			$id_cuti = $this->input->post('id_cuti');
			$nama = $this->input->post('nama');
			$jml_hari = $this->input->post('jml_hari');
			$data = array('id_cuti' => $id_cuti, 'cuti_kpd' => $nama,'jml_hari' => $jml_hari);
			$this->M_cuti->simpan($data);
			//alert 
			$message = 'anda berhasil menginput data...!!!';
			$type = 'success';
			echo $this->alert($message,$type);
			redirect('cuti');
		}else{
			$data['code'] = $this->M_cuti->code_otomatis();
			$this->template->load('template','cuti/form_input',$data);			
		}

	}

	function hapus(){
	 	$id = $this->input->post('id');
	 	$this->M_cuti->hapus($id);
		//alert 
		$message = 'Data Berhasil di hapus...!!!';
		$type = 'danger';
		echo $this->alert($message,$type);
	}

	function ubah(){
		if (isset($_POST['submit'])) {
			$id = $this->input->post('id_cuti');
			$nama = $this->input->post('nama');
			$jml_hari = $this->input->post('jml_hari');
			$data = array('cuti_kpd' => $nama,'jml_hari' => $jml_hari);

			//alert 
			$message = 'anda berhasil mengubah data...!!!';
			$type = 'success';
			echo $this->alert($message,$type);

			$this->M_cuti->update($data,$id);
			redirect('cuti');
		} else {		
			$id = $this->uri->segment(3);
			$data['record'] = $this->M_cuti->get_data($id)->row_array();
			$this->template->load('template', 'cuti/form_edit',$data);
		}

	}

}