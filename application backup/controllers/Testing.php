<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {


	function index(){
		// echo "test";
	$this->template->load('template','welcome_message');

	}

}