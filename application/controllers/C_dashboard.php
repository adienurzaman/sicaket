<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_pasien');
		if(!$this->session->userdata('nik'))
		{
			redirect('c_login');
		}
	}

	public function index()
	{
		#VIEW JML DATA PASIEN
		$this->db->from('pasien');
    	$cekDataPasien = $this->db->get()->result();
    	$data['jml_pasien'] = count($cekDataPasien);

    	#VIEW JML DATA KESEHATAN
    	$this->db->from('hasil');
    	$cekDataPasien = $this->db->get()->result();
    	$data['jml_kesehatan'] = count($cekDataPasien);


    	#VIEW JML DATA KESEHATAN
    	$this->db->from('stunting');
    	$cekDataPasien = $this->db->get()->result();
    	$data['jml_stunting'] = count($cekDataPasien);

    	
		$data['session'] = $this->session->all_userdata();
		$data['namalengkap'] =strtoupper($this->session->userdata('nama'));
		$data['namadepan'] = explode(' ',$this->session->userdata('nama'));
		$data['firstname'] = strtoupper($data['namadepan'][0]);
		$data['tampilan'] = 'dashboard';

		$this->load->view('template/media', $data);
	}
}

