<?php

class M_pasien extends CI_Model 

{

    function __construct()

    {

        parent::__construct();

    }


  function get_data()

    {

    $query = $this->db->query("SELECT P.nik as nik, 
      P.nama_pasien as nama_pasien, 
      P.tgllahir as tgllahir, 
      P.jk as jk, 
      P.rtrw as rtrw, 
      P.blok as blok, 
      A.nama as provinsi, 
      B.nama as kabupaten, 
      C.nama as kecamatan, 
      D.nama as kelurahan, 
      P.notelp as notelp FROM pasien as P 
      LEFT JOIN provinsi as A on A.id_prov=P.provinsi
      LEFT JOIN kabupaten as B on B.id_kab=P.kabupaten
      LEFT JOIN kecamatan as C on C.id_kec=P.kecamatan
      LEFT JOIN kelurahan as D on D.id_kel=P.kelurahan");

    foreach ($query->result_array() as $row) {

      $array[] = $row;

    }

    if (!isset($array)) { 

      $array='';

    }

    $query->free_result();

    return $array;

  }


  function get_dataupdate($nik)

    {

      $query = $this->db->query("SELECT P.nik as nik, 
      P.nama_pasien as nama_pasien, 
      P.tgllahir as tgllahir, 
      P.jk as jk, 
      P.rtrw as rtrw, 
      P.blok as blok, 
      A.id_prov as id_prov, 
      A.nama as provinsi, 
      B.id_kab as id_kab,
      B.nama as kabupaten, 
      C.id_kec as id_kec, 
      C.nama as kecamatan, 
      D.id_kel as id_kel, 
      D.nama as kelurahan, 
      P.notelp as notelp FROM pasien as P 
      LEFT JOIN provinsi as A on A.id_prov=P.provinsi
      LEFT JOIN kabupaten as B on B.id_kab=P.kabupaten
      LEFT JOIN kecamatan as C on C.id_kec=P.kecamatan
      LEFT JOIN kelurahan as D on D.id_kel=P.kelurahan WHERE P.nik=$nik");

    foreach ($query->result_array() as $row) {$array[] = $row;}

    if (!isset($array)) { $array='';}

    $query->free_result();

    return $array;

  }


  function hapusseleksi()

    {
     
     $nik = $this->input->post('nik');
     $this->db->where_in('nik', $nik);
     $this->db->delete('pasien');

     $this->db->where_in('nik', $nik);
     $this->db->delete('akun');

     return true;

    }

  
  function hapus($nik)

    {
     
     $this->db->where_in('nik', $nik);
     $this->db->delete('pasien');

     $this->db->where_in('nik', $nik);
     $this->db->delete('akun');

     return true;

    }


  function simpan()

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

      $level = $this->input->post('level'); 

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

  function ubah()

    {

    $CI =& get_instance();

    $CI->load->database('default');





    //ubah

    $nik = $this->input->post('nik');

    if($nik!=''){

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

    

    $sql1 = "UPDATE pasien SET 

    nik = '$nik',

    nama_pasien = '$nama_pasien',

    tgllahir = '$tgllahir',

    jk = '$jk',

    rtrw  = '$rtrw', 

    blok  = '$blok',

    provinsi  = '$provinsi',

    kabupaten = '$kabupaten',

    kecamatan = '$kecamatan',

    kelurahan = '$kelurahan', 

    notelp = '$notelp'

    WHERE nik='$nik'"; 

    $this->db->query($sql1);

    return true;

    }

    else

    {

      return false; 

    }

    }

function getdataKelurahan()  {

    //$query=$this->db->query("SELECT * FROM dosen");

    $query = $this->db->query("SELECT * FROM kelurahan");

    foreach ($query->result_array() as $row) {

      $array[] = $row;

    }

    if (!isset($array)) { 

      $array='';

    }

    $query->free_result();

    return $array;

  }

  function getdataKecamatan()  {

    //$query=$this->db->query("SELECT * FROM dosen");

    $query = $this->db->query("SELECT * FROM kecamatan");

    foreach ($query->result_array() as $row) {

      $array[] = $row;

    }

    if (!isset($array)) { 

      $array='';

    }

    $query->free_result();

    return $array;

  }

  function getdataKabupaten()  {

    //$query=$this->db->query("SELECT * FROM dosen");

    $query = $this->db->query("SELECT * FROM kabupaten");

    foreach ($query->result_array() as $row) {

      $array[] = $row;

    }

    if (!isset($array)) { 

      $array='';

    }

    $query->free_result();

    return $array;

  }

function getdataProvinsi()  {

    //$query=$this->db->query("SELECT * FROM dosen");

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