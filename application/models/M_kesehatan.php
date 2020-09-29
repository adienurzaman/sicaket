<?php

class M_kesehatan extends CI_Model 

{

    function __construct()

    {

        parent::__construct();

    }


  function get_data()

    {

    $query = $this->db->query("SELECT A.id_hasil as id_hasil, A.id_temp as id_temp, A.nik as nik, B.nama_pasien as nama_pasien, A.tgl as tgl FROM hasil as A
      LEFT JOIN pasien as B on B.nik = A.nik LEFT JOIN temp as C on C.id_temp = A.id_temp");

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
    $query = $this->db->query("SELECT A.id_hasil as id_hasil, A.id_temp as id_temp, A.nik as nik, B.nama_pasien as nama_pasien, A.tgl as tgl FROM hasil as A
      LEFT JOIN pasien as B on B.nik = A.nik LEFT JOIN temp as C on C.id_temp = A.id_temp WHERE A.nik = '$nik' ");

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
     
     $id_hasil = $this->input->post('id_hasil');
     $this->db->where_in('id_hasil', $id_hasil);
     $this->db->delete('hasil');

     return true;

    }

  
  function hapus($id_hasil)

    {
     
     $this->db->where_in('id_hasil', $id_hasil);
     $this->db->delete('hasil');

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

      $id_temp = $this->input->post('id_temp');

      #konversi date
      $tgltemp = date_create($this->input->post('tgl'));
      $tgl = date_format($tgltemp, "Y-m-d");

      $keterangan = $this->input->post('keterangan'); 

    //insert

      $sql1 = "INSERT INTO hasil (nik, id_temp, tgl, keterangan) VALUES ('$nik', '$id_temp', '$tgl', '$keterangan')";

      $this->db->query($sql1);

    return true;

    }

    else

    {

    return false; 

    }

    }

  function get_data_detail($id_hasil)
  {

    $query = $this->db->query("SELECT A.*, B.*, C.*, D.nama as provinsi, E.nama as kabupaten, F.nama as kecamatan, G.nama as kelurahan
      FROM hasil as A
      LEFT JOIN pasien as B on B.nik = A.nik 
      LEFT JOIN temp as C on C.id_temp = A.id_temp
      LEFT JOIN provinsi as D on D.id_prov=B.provinsi
      LEFT JOIN kabupaten as E on E.id_kab=B.kabupaten
      LEFT JOIN kecamatan as F on F.id_kec=B.kecamatan
      LEFT JOIN kelurahan as G on G.id_kel=B.kelurahan 
      WHERE A.id_hasil = $id_hasil");

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