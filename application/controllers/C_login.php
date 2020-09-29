<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller
 {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}
	
	public function index()
	{
		if(!$this->session->userdata('nik'))
		{
			 $this->load->view('login');
		}
		else
		{
			redirect('c_dashboard','refresh');	
		}

		if(!empty($this->input->post('username')) && !empty($this->input->post('password'))){

			$username = $this->input->post('username');
			$password = $this->input->post('password');

        		$check_user = $this->m_login->check_data_user($username);
        		if (!empty($check_user)) {
        		    $check = $this->m_login->check_data($username, $password);
        		    if(!empty($check)){
        			// create session
        			$userdata = $this->m_login->get_datauser($username);
        			$this->session->set_userdata($userdata);
        			$nama = $this->session->userdata('nama_pasien');
        			$this->session->set_flashdata('login_berhasil','Selamat Datang '.$nama.'. Anda berhasil Log-in');
        			redirect('c_dashboard','refresh');
        		    }else{
        		        $this->session->set_flashdata('password_salah','Segera Hubungi Admin Sistem. PASSWORD yang anda masukan TIDAK TEPAT');
        			    redirect('c_login','refresh');
        		    }
        		}else{
        		    //Jika tidak berhasil Login
                    $this->session->set_flashdata('error_login','Login Gagal');
        		    redirect('c_login','refresh');    
        		}
    	}
	}

	public function register(){
	    $data['provinsi'] = $this->m_login->getdataProvinsi();

	    if ($this->input->server('REQUEST_METHOD') == 'POST') {
	    	if($this->m_login->register()){
	    		$data['register_sukses'] = '1'; 	
				$this->load->view('register',$data);
	    	}elseif(!$this->m_login->register()){
	    		$data['register_sukses'] = '0'; 	
				$this->load->view('register',$data);
	    	}
		}else{
		    	$data['daftar'] = 'ok'; 	
				$this->load->view('register',$data);
		}
		 
	}

	
	public function logout(){
        /** HAPUS SESSION **/
		$this->session->sess_destroy();

		$data['suksesLogout'] = 'Logout Berhasil'; 	
		$this->load->view('login',$data);
        
	}
}

?>
