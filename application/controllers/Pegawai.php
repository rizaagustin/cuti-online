<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Pegawai extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model(array('M_pegawai','M_jabatan','M_departemen'));
		$this->load->library('session');
		if (empty($this->session->userdata('id_pegawai'))){
			redirect('auth/login');
		}
	}

	function index(){
		$data['record'] = $this->M_pegawai->tampilkan_data();
		$this->template->load('template','pegawai/lihat_data',$data);
	}

	function alert($message,$type){
		$message = $this->session->set_flashdata('message', '<div class="alert alert-'.$type.'" role="alert">
				'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		return $message;		
	}

	function simpan(){
		if(isset($_POST['submit'])) {
			$nama = $this->input->post('nama');
			$id_jabatan = $this->input->post('id_jabatan');
			$id_pegawai = $this->M_pegawai->code_otomatis($id_jabatan);
			$alamat = $this->input->post('alamat');
			$tmk = $this->input->post('tmk');
			$no_tlp = $this->input->post('no_tlp');
			$tipe_user = $this->input->post('tipe_user');
			$password = md5('1234');
			$data = array('id_pegawai' => $id_pegawai , 'nama_pegawai' => $nama, 'id_jabatan' => $id_jabatan, 'alamat' => $alamat, 'tmk' => $tmk,'password' => $password,'no_tlp' => $no_tlp,'tipe_user' => $tipe_user);
			$this->M_pegawai->simpan($data);
			//alert 
			$message = 'anda berhasil menginput data...!!!';
			$type = 'success';
			echo $this->alert($message,$type);
			redirect('pegawai');
		}else{
			$data['departemen'] = $this->M_departemen->tampilkan_data();
			$data['jabatan'] = $this->M_jabatan->tampilkan_data();
			$this->template->load('template','pegawai/form_input',$data);			
		}

	}

	function hapus(){
	 	$id = $this->input->post('id');
	 	$this->M_pegawai->hapus($id);
		//alert 
		$message = 'Data Berhasil di hapus...!!!';
		$type = 'danger';
		echo $this->alert($message,$type);
	}

	function reset(){
		$id = $this->input->post('id_pegawai');
		$password = md5('1234');		
		$data = array('password' => $password);
		$this->M_pegawai->update($data,$id);
		//alert 
		$message = 'anda berhasil mereset password...!!!';
		$type = 'success';
		echo $this->alert($message,$type);
	}
	function ubah(){
		if (isset($_POST['submit'])) {
			$id = $this->input->post('id_pegawai');
			$nama = $this->input->post('nama');
			$id_jabatan = $this->input->post('id_jabatan');
			$alamat = $this->input->post('alamat');
			$tmk = $this->input->post('tmk');
			$no_tlp = $this->input->post('no_tlp');
			$password = md5('1234');
			$tipe_user = $this->input->post('tipe_user');
			$data = array('nama_pegawai' => $nama, 'id_jabatan' => $id_jabatan, 'alamat' => $alamat, 'tmk' => $tmk,'password' => $password,'no_tlp' => $no_tlp,'tipe_user' => $tipe_user);
			$this->M_pegawai->update($data,$id);
			//alert 
			$message = 'anda berhasil mengubah data...!!!';
			$type = 'success';
			echo $this->alert($message,$type);

			redirect('pegawai');
		} else {		
			$id = $this->uri->segment(3);
			$data['record'] = $this->M_pegawai->get_data($id)->row_array();

			$data['jabatan'] = $this->M_jabatan->tampilkan_data();	
			$this->template->load('template', 'pegawai/form_edit',$data);
		}

	}

	function ubah_password(){
		$id = $this->session->userdata('id_pegawai');
		$cek = $this->M_pegawai->get_data($id)->row_array();
		$newpass = md5($this->input->post('newpass'));
		$oldpass = md5($this->input->post('oldpass')); 
		// echo $cek['password'];
		// die;
		if (isset($_POST['submit'])) {
			if ($cek['password'] == $oldpass) {
				$data = array('password' => $newpass);
				$this->M_pegawai->update($data,$id);				
				$message = 'password berhasil mengubah data...!!!';
				$type = 'success';
				echo $this->alert($message,$type);
			} else {
				$message = 'password lama salah ...!!!';
				$type = 'danger';
				echo $this->alert($message,$type);
			}
			redirect('pegawai/ubah_password');			
		} else {
			$this->template->load('template', 'pegawai/ubah_password');		
		}
		

	}

}