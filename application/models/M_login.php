<?php
class M_login extends CI_Model 
{
    private $ci;
    private $error = array();

	
	function get_datauser($username)
    {
		
		$sql="SELECT * FROM akun as a LEFT JOIN pasien as p ON p.nik = a.nik WHERE a.nik='$username' LIMIT 1";
		$query = $this->db->query($sql);
		// var_dump($query->result_array());die;
		foreach ($query->result_array() as $row) {
			$array = $row;
		}
		if (!isset($array)) 
		{ 
			$array='';
		}
		// var_dump($array);die;

		$query->free_result();
		return $array;
    }
    
    function check_data_user($username)
    {

		// $query = $this->db->get_where('akun', array('email' => $email));
		$this->db->from('akun');
		$this->db->where('nik',$username);

		$query = $this->db->get();

		foreach ($query->result_array() as $row) {
			$array = $row;
		}
		if (!isset($array)) 
		{ 
			$array='';
		}
		// var_dump($array);die;

		$query->free_result();
		return $array;
    }

    function check_data($username,$password)
    {
		$password = md5($password);

		$this->db->from('akun');
		$this->db->where('nik',$username);
		$this->db->where('password',$password);

		$query = $this->db->get();

		foreach ($query->result_array() as $row) {
			$array = $row;
		}
		if (!isset($array)) 
		{ 
			$array='';
		}

		$query->free_result();
		return $array;
    }

    function register()
    {
    	$CI =& get_instance();

	    $CI->load->database('default');


	    $nik = $this->input->post('nik');

	    $this->db->from('pasien');

	    $this->db->where('nik',$nik);

	    $cekData = $this->db->get()->result();

	    if(!empty($nik) && count($cekData)<1)

	    {

	    
	      $nik = $this->input->post('nik');

	      $nama_pasien = $this->input->post('nama_pasien');

	      #konversi date
	      $tgl = date_create($this->input->post('tgllahir'));
	      $tgllahir = date_format($tgl, "Y-m-d");

	      $jk = $this->input->post('jk');

	      $rt = $this->input->post('rt');  
	      $rw = $this->input->post('rw');  
	      $rtrw = "$rt/$rw";

	      $blok = $this->input->post('blok'); 

	      $provinsi = $this->input->post('provinsi'); 

	      $kabupaten = $this->input->post('kabupaten'); 

	      $kecamatan = $this->input->post('kecamatan'); 

	      $kelurahan = $this->input->post('kelurahan'); 

	      $notelp = $this->input->post('notelp'); 

	      #SEND DATA KE DATA AKUN

	      if(empty($this->input->post('email'))){
	        $email = "-";
	      }else{
	        $email = $this->input->post('email');
	      }

	      $password = md5($this->input->post('password')); 

	      $level = 'pasien'; 

	    //insert

	      $sql1 = "INSERT INTO akun (email, nik, password, level) VALUES ('$email', '$nik', '$password', '$level')";

	      $sql2 = "INSERT INTO pasien (nik, nama_pasien, tgllahir, jk, rtrw, blok, provinsi, kabupaten, kecamatan, kelurahan, notelp) VALUES ('$nik', '$nama_pasien', '$tgllahir', '$jk', '$rtrw', '$blok', '$provinsi', '$kabupaten', '$kecamatan', '$kelurahan', '$notelp')";

	      $this->db->query($sql1); $this->db->query($sql2);

	    return true;

	    }

	    else

	    {

	    return false; 

	    }
    }

    function getdataProvinsi()  {

    $query = $this->db->query("SELECT * FROM provinsi");

    foreach ($query->result_array() as $row) {

      $array[] = $row;

    }

    if (!isset($array)) { 

      $array='';

    }

    $query->free_result();

    return $array;

  }
       
}
?>
