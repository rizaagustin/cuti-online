<?php 
Class Permohonan extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model(array('M_permohonan','M_pegawai','M_cuti'));
		$this->load->library('session');
		if (empty($this->session->userdata('id_pegawai'))){
			redirect('auth/login');
		}
	}	

	
	function index(){

		$id_pegawai = $this->session->userdata('id_pegawai');
		$id_departemen = $this->session->userdata('id_departemen');
		$user_create = $this->session->userdata('id_pegawai');
		$id_pegawai2 = $this->input->post('id_pegawai');
		$data['record'] = $this->M_permohonan->tampilkan_data_pending_byid($user_create);
		$data['histori'] = $this->M_permohonan->tampilkan_data_setuju_byid($id_pegawai2);
		// 	data di combobox
		if ($this->session->userdata('tipe_user') == 'MANAGER') {
		  $data['pegawai'] = $this->M_pegawai->tampilkan_data_byid($id_pegawai)->result();
		}elseif($this->session->userdata('tipe_user') == 'SPV'){
		  $data['pegawai'] =$this->M_pegawai->tampilkan_data_oprator_spv($id_departemen)->result();			
		}elseif($this->session->userdata('tipe_user') == 'STAFF'){
		  $data['pegawai'] =$this->M_pegawai->tampilkan_data_byid($id_pegawai)->result();		
		}elseif($this->session->userdata('tipe_user') == 'DIREKTUR'){
		  $data['pegawai'] =$this->M_pegawai->tampilkan_data_byid($id_pegawai)->result();		
		}else{
		  $data['pegawai'] =$this->M_pegawai->tampilkan_data()->result();	
		}



		$data['cuti'] = $this->M_cuti->tampilkan_data()->result();
		$this->template->load('template','permohonan/form_input',$data);
	}

	function post(){
		$tgl_permohonan = date('Y-m-d');
		$daftar_hari = array(
		 'Sunday' => 'Minggu',
		 'Monday' => 'Senin',
		 'Tuesday' => 'Selasa',
		 'Wednesday' => 'Rabu',
		 'Thursday' => 'Kamis',
		 'Friday' => 'Jumat',
		 'Saturday' => 'Sabtu'
		);		
		$id_permohonan = $this->M_permohonan->code_otomatis();
		$tgl_mulai = $this->input->post('tgl_mulai');
		$sisacuti = $this->input->post('sisacuti');
		$tgl_selesai = $this->input->post('tgl_selesai');
		$id_pegawai = $this->input->post('id_pegawai');
		$pegawai = $this->M_pegawai->get_data($id_pegawai)->row_array();
		$id_cuti  = $this->input->post('id_cuti');
		$cek_cuti = $this->M_cuti->get_data($id_cuti)->row_array();
		$keterangan = $this->input->post('keterangan');
		$user_create = $this->session->userdata('id_pegawai');
		// echo $pegawai['tipe_user'];
		// die;
		// $tgl_mulai = '2018-10-01';
		// $tgl_selesai = '2018-10-07';
		$hari = 1;
		$jml_hari = 0;
		for ($i=$tgl_mulai; $i <= $tgl_selesai; $i++) { 
			$jml_hari = $hari;
			$namahari = date('l', strtotime($i));
			if ($pegawai['tipe_user'] == 'OPERATOR') {
				if ($daftar_hari[$namahari] != 'Minggu') {
					// echo $hari++.' | '.$daftar_hari[$namahari];		
					// echo "<br>";
					$hari++;
				}
			} else {
				if ($daftar_hari[$namahari] != 'Minggu' AND $daftar_hari[$namahari] != 'Sabtu') {
					// echo $hari++.' | '.$daftar_hari[$namahari];		
					// echo "<br>";
					$hari++;
				}
			}
		}

		if ($cek_cuti['id_cuti'] == 'CT-001') {
			if ($jml_hari > $sisacuti) {
				//alert 
				$message = 'Data Gagal disimpan Jumlah Cuti Melebihi Sisa Cuti';
				$type = 'danger';
				echo $this->alert($message,$type);			

			} else {
				$data = array('id_permohonan' => $id_permohonan ,'id_pegawai' => $id_pegawai,'tgl_mulai' => $tgl_mulai, 'tgl_selesai' => $tgl_selesai, 'id_cuti' => $id_cuti, 'keterangan' => $keterangan,'user_create' => $user_create,'jml_hari' => $jml_hari,'tgl_permohonan' => $tgl_permohonan);
				$this->M_permohonan->simpan($data);
				//alert 
				$message = 'Data Berhasil disimpan...!!!';
				$type = 'success';
				echo $this->alert($message,$type);			
			}
			
		}else{
			$data = array('id_permohonan' => $id_permohonan ,'id_pegawai' => $id_pegawai,'tgl_mulai' => $tgl_mulai, 'tgl_selesai' => $tgl_selesai, 'id_cuti' => $id_cuti, 'keterangan' => $keterangan,'user_create' => $user_create,'jml_hari' => $jml_hari,'tgl_permohonan' => $tgl_permohonan);
			$this->M_permohonan->simpan($data);
			//alert 
			$message = 'Data Berhasil disimpan...!!!';
			$type = 'success';
			echo $this->alert($message,$type);			
		}

	}

	function validasi(){
		$tipe_user = $this->session->userdata('tipe_user');
		// $id_departemen = $this->session->userdata('id_departemen');
			// if($tipe_user == 'SPV') {
			// 	$data['record'] = $this->M_permohonan->tampilkan_data_pending_spv();
			// }elseif ($tipe_user == 'MANAGER') {
			// 	$data['record'] = $this->M_permohonan->tampilkan_data_pending_manager();
			// }elseif ($tipe_user == 'DIREKTUR'){
			// 	$data['record'] = $this->M_permohonan->tampilkan_data_pending_direktur();
			// }elseif($tipe_user == 'STAFF') {
			// 	$data['record'] = $this->M_permohonan->tampilkan_data_pending_spv();
			// }elseif($tipe_user == 'ADMIN') {
			// 	$data['record'] = $this->M_permohonan->tampilkan_data_pending();
			// }						
			if($tipe_user == 'ADMIN') {
			  $data['record'] = $this->M_permohonan->tampilkan_data_pending();
			}elseif($tipe_user == 'SPV') {
			   $data['record'] = $this->M_permohonan->tampilkan_data_pending_spv();
			}elseif($tipe_user == 'DIREKTUR') {
			   $departemen = substr($this->session->userdata('id_departemen'), 0, 3);  // abcd
			   $data['record'] = $this->M_permohonan->tampilkan_data_pending_direktur($departemen);				
			}else{
			  $data['record'] = $this->M_permohonan->tampilkan_data_pending_bydepartemen();				
			}						

		 $this->template->load('template','permohonan/lihat_data',$data);	
	}

	function approve(){
		$tgl_validasi = date('Y-m-d');
		$id = $this->input->post('id');
		$validasi = $this->input->post('validasi');
		$id_pegawai = $this->session->userdata('id_pegawai');
		$data = array('validasi' => $validasi,'user_update' => $id_pegawai,'tgl_validasi' => $tgl_validasi);
		$this->M_permohonan->update($data,$id);
	}

	function data_cuti(){
		$tipe_user = $this->session->userdata('tipe_user');
		$id_pegawai = $this->session->userdata('id_pegawai');
        $jabatan = $this->session->userdata('nama_jabatan');
        $posisi= strpos(strtoupper($jabatan),"HRD");
        if ($posisi == true) {
			$data['record'] = $this->M_permohonan->tampilkan_data_tolak();
			$data['record2'] = $this->M_permohonan->tampilkan_data_setuju();
        } else {        
			if($tipe_user == 'SPV') {
				$data['record'] = $this->M_permohonan->tampilkan_data_tolak_spv();
				$data['record2'] = $this->M_permohonan->tampilkan_data_setuju_spv();
			}elseif ($tipe_user == 'MANAGER') {
				$data['record'] = $this->M_permohonan->tampilkan_data_tolak_manager();
				$data['record2'] = $this->M_permohonan->tampilkan_data_setuju_manager();
			}elseif ($tipe_user == 'DIREKTUR'){
				$data['record'] = $this->M_permohonan->tampilkan_data_tolak_direktur();
				$data['record2'] = $this->M_permohonan->tampilkan_data_setuju_direktur();
				// $data['record'] = $this->M_permohonan->tampilkan_data_tolak_manager();
				// $data['record2'] = $this->M_permohonan->tampilkan_data_setuju_manager();
			}elseif($tipe_user == 'ADMIN') {
				$data['record'] = $this->M_permohonan->tampilkan_data_tolak();
				$data['record2'] = $this->M_permohonan->tampilkan_data_setuju();
			}elseif($tipe_user == 'STAFF') {
				$data['record'] = $this->M_permohonan->tampilkan_data_tolak();
				$data['record2'] = $this->M_permohonan->tampilkan_data_setuju();
			}else{
				redirect('Auth/login');
			}
		}		
		$data['record3'] = $this->M_permohonan->tampilkan_data_byid($id_pegawai);							
		$this->template->load('template','permohonan/data_cuti',$data);
	}

	function hapus(){
	 	$id = $this->input->post('id');
	 	$this->M_permohonan->hapus($id);
		//alert 
		$message = 'Data Berhasil di hapus...!!!';
		$type = 'danger';
		echo $this->alert($message,$type);
	}	

	function alert($message,$type){
		$message = $this->session->set_flashdata('message', '<div class="alert alert-'.$type.'" role="alert">
				'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		return $message;		
	}	

	function laporan(){
		$data['tahun'] = $tahun = $this->input->post('tahun');
		$data['bulan'] = $bulan = $this->input->post('bulan');
		
		if (isset($_POST['submit_tahun'])) {
    	 $data['record'] = $this->M_permohonan->laporan($tahun,$bulan);
    	 $data['record2'] = $this->M_permohonan->laporan_tahunan($tahun);
		 $this->template->load('template','permohonan/laporan_cuti',$data);				
		} elseif(isset($_POST['submit'])) {
    	 $data['record'] = $this->M_permohonan->laporan($tahun,$bulan);
    	 $data['record2'] = $this->M_permohonan->laporan_tahunan($tahun = '');
		 $this->template->load('template','permohonan/laporan_cuti',$data);				
		}else{
    	 $data['record'] = $this->M_permohonan->laporan($tahun,$bulan);
    	 $data['record2'] = $this->M_permohonan->laporan_tahunan($tahun);
		 $this->template->load('template','permohonan/laporan_cuti',$data);				 	
		}

	}

	function cetak_laporan(){
		$data['tahun'] = $tahun = $this->uri->segment(3);
		$bulan = $this->uri->segment(4);	
		 		$data_bulan = array('1' => 'JANUARI', 
 			'2' => 'FEBRUARI',
 			'3' => 'MARET', 
 			'4' => 'APRIL', 
 			'5' => 'MEI', 
 			'6' => 'JUNI', 
 			'7' => 'JULI', 
 			'8' => 'AGUSTUS', 
 			'9' => 'SEPTEMBER', 
 			'10' => 'OKTOBER' , 
 			'11' => 'NOVEMBER', 
 			'12' => 'DESEMBER');
        // die;
    	$data['bulan'] = $data_bulan[$bulan];		
		$data['record'] = $this->M_permohonan->laporan($tahun,$bulan);
		 $this->load->view('permohonan/cetak_laporan_cuti',$data);	
	}

	function cetak_laporan_tahunan(){
		$data['tahun'] = $tahun = $this->uri->segment(3);
		$bulan = $this->uri->segment(4);	
		$data['record'] = $this->M_permohonan->laporan_tahunan($tahun);
		 $this->load->view('permohonan/cetak_laporan_cuti_tahunan',$data);	
	}

	function get_datacuti(){
		$id_pegawai = $this->uri->segment(3);
		$lama_kerja = $this->M_pegawai->tampilkan_data_byid($id_pegawai)->row_array();
		$cuti = $this->M_permohonan->jml_cuti($id_pegawai)->row_array();
		$sisacuti = 0;
		if($lama_kerja['waktu_kerja'] % 7) {
			// echo "12";
		// echo $cuti['jml_cuti'];
		// echo "<br>";
		echo	$sisacuti = 12 - $cuti['jml_cuti'];
			
		} else {
		// echo $cuti['jml_cuti'];	
		// echo "<br>";
			//echo 18;
		echo	$sisacuti = 18 - $cuti['jml_cuti'];

		}		

	}

	function sisacuti(){
		$data['tahun'] = $tahun = date('Y');
		$data['record'] = $this->M_permohonan->sisa_cuti($tahun);
		$this->template->load('template','permohonan/sisacuti',$data);	
	}

	function cetak_sisacuti(){
		$data['tahun'] = $tahun = date('Y');
		$data['record'] = $this->M_permohonan->sisa_cuti($tahun);
		$this->load->view('permohonan/cetak_sisacuti',$data);	
	}

	function cetak(){
		$id_permohonan = $this->uri->segment(3);
		$data['record'] = $this->M_permohonan->cuti_byid($id_permohonan)->result();
		$this->load->view('permohonan/cetak_formcuti',$data);
	}

}
