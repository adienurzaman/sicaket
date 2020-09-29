<?php

class M_stunting extends CI_Model 

{

    function __construct()

    {

        parent::__construct();

    }


  function get_data()

    {

    $query = $this->db->query("SELECT A.*, A.nik as nik, B.nama_pasien  as nama_pasien, B.tgllahir as tgllahir FROM stunting as A LEFT JOIN pasien as B on B.nik = A.nik");

    foreach ($query->result_array() as $row) {

      $array[] = $row;

    }

    if (!isset($array)) { 

      $array='';

    }

    $query->free_result();

    return $array;

  }

  function get_data_pasien($nik)

    {

    $query = $this->db->query("SELECT A.*, A.nik as nik, B.nama_pasien  as nama_pasien, B.tgllahir as tgllahir FROM stunting as A LEFT JOIN pasien as B on B.nik = A.nik WHERE A.nik = '$nik'");

    foreach ($query->result_array() as $row) {

      $array[] = $row;

    }

    if (!isset($array)) { 

      $array='';

    }

    $query->free_result();

    return $array;

  }


  function hapusseleksi()

    {
     
     $id_stunting = $this->input->post('id_stunting');
     $this->db->where_in('id_stunting', $id_stunting);
     $this->db->delete('stunting');

     return true;

    }

  
  function hapus($id_stunting)

    {
     
     $this->db->where_in('id_stunting', $id_stunting);
     $this->db->delete('stunting');

     return true;

    }


  function simpan()

    {

    $CI =& get_instance();

    $CI->load->database('default');

    $nik = $this->input->post('nik');

    if(!empty($nik))

    {

        $nik = $this->input->post('nik');
        
        $umur = $this->input->post('umur');

        #konversi date
        $tgl = $this->input->post('tgllahir');

        $tinggi_badan = $this->input->post('tinggi_badan');

        $keterangan = $this->input->post('keterangan');

      //insert

        $sql1 = "INSERT INTO stunting (nik, umur, tinggi_badan, tgl, keterangan) VALUES ('$nik','$umur','$tinggi_badan','$tgl', '$keterangan')";

        $this->db->query($sql1);

        return true;

    }

    else

    {

    return false; 

    }

    }

  function get_data_detail($id_stunting)
  {

    $query = $this->db->query("SELECT A.*, A.nik as nik, B.* FROM stunting as A LEFT JOIN pasien as B ON B.nik = A.nik WHERE A.id_stunting = '$id_stunting' ");

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