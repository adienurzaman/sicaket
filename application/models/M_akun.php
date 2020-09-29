<?php
class M_akun extends CI_Model 
{
  function __construct()
  {
      parent::__construct();
  }

  
  function get_data()
  {
    $query = $this->db->query("SELECT A.*, B.nama_pasien as nama_pasien  FROM akun as A LEFT JOIN pasien as B on B.nik = A.nik ORDER BY id_akun asc");

    foreach ($query->result_array() as $row) {

      $array[] = $row;

    }

    if (!isset($array)) { 

      $array='';

    }

    $query->free_result();

    return $array;
  }

  function gantiPassword($nik)
  {
    $CI =& get_instance();
    $CI->load->database('default');
    if($nik!=''){
      $passwordBaru = md5($this->input->post('password'));
      $query = "UPDATE akun SET 
      password = '$passwordBaru'
      WHERE nik='$nik'"; 
      $this->db->query($query);
      return true;
    }else{
        return false; 
    }
  }

  function reset_pass($nik)
  {
    $CI =& get_instance();
    $CI->load->database('default');
    if($nik!=''){
      $passwordBaru = md5("admin12345");
      $query = "UPDATE akun SET 
      password = '$passwordBaru'
      WHERE nik='$nik'"; 
      $this->db->query($query);
      return true;
    }else{
        return false; 
    }
  }


}