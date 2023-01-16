<?php 
class Libur extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model(array('M_libur'));
		$this->load->library('session');
		if (empty($this->session->userdata('id_pegawai'))){
			redirect('auth/login');
		}
	}

	function index(){
		$data['record'] = $this->M_libur->tampilkan_data()->result();	
		$this->template->load('template','libur/lihat_data',$data);
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
			$tgl_libur = $this->input->post('tgl_libur');
			$keterangan_libur = $this->input->post('keterangan_libur');
			$data = array('tgl_libur' => $tgl_libur , 'keterangan_libur' => $keterangan_libur);
			$this->M_libur->simpan($data);
			//alert 
			$message = 'anda berhasil menginput data...!!!';
			$type = 'success';
			echo $this->alert($message,$type);
			redirect('libur');
		}else{
			$this->template->load('template','libur/form_input');			
		}

	}

	function ubah(){
		if (isset($_POST['submit'])) {
			$id = $this->input->post('id_libur');
			$tgl_libur = $this->input->post('tgl_libur');
			$keterangan_libur = $this->input->post('keterangan_libur');
			$data = array('keterangan_libur' => $keterangan_libur,'tgl_libur' => $tgl_libur);
			$this->M_libur->update($data,$id);
			redirect('libur');
		} else {		
			$id = $this->uri->segment(3);
			$data['record'] = $this->M_libur->get_data($id)->row_array();
			$this->template->load('template', 'libur/form_edit',$data);
		}

	}
	
	function hapus(){
	 	$id = $this->input->post('id');
	 	$this->M_libur->hapus($id);
		//alert 
		$message = 'Data Berhasil di hapus...!!!';
		$type = 'danger';
		echo $this->alert($message,$type);
	}

}