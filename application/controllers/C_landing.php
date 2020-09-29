<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_landing extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['session'] = $this->session->all_userdata();
		$data['namalengkap'] =strtoupper($this->session->userdata('nama'));
		$data['namadepan'] = explode(' ',$this->session->userdata('nama'));
		$data['firstname'] = strtoupper($data['namadepan'][0]);

		$this->load->view('landing');
	}
}

