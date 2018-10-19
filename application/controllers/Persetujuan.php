<?php 
Class Persetujuan extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model(array('M_pegawai','M_permohonan'));
	}


}