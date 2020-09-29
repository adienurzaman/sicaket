<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pasien extends CI_Controller 
{
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
    
    $data['session'] = $this->session->all_userdata();
    $data['pasien'] = $this->m_pasien->get_data();    
    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
    $data['tampilan'] = 'pasien';
    //new
    
    $this->load->view('template/media', $data);
  }
  

  public function tambah()
  {
    
    $data['session'] = $this->session->all_userdata();
    $data['provinsi'] = $this->m_pasien->getdataProvinsi();

    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
    $data['tampilan'] = 'tambahpasien';
    //new
    $this->load->view('template/media', $data);
    
  }
  //function input data
  public function simpan()
  {
    $data['session'] = $this->session->all_userdata();
    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
  

    //query simpan data staff
    if($this->m_pasien->simpan())
    {
      //load notifikasi sukses
      $this->session->set_flashdata('simpan_berhasil','Data baru berhasil ditambahkan');
      redirect('c_pasien','refresh');
    }else{
      //load notifikasi gagal
      $this->session->set_flashdata('simpan_gagal','Data baru gagal ditambahkan');
      redirect('c_pasien','refresh');
    }
  } 
  //ubah
  public function ubah()
  {
    $nik = $this->uri->segment(3);
    $data['pasien'] = $this->m_pasien->get_dataupdate($nik);
    $data['session'] = $this->session->all_userdata();
    $data['provinsi'] = $this->m_pasien->getdataProvinsi();
    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
    $data['tampilan'] = 'ubahpasien';
    
    //new
    $this->load->view('template/media', $data);
    
  }
  public function prosesubah()
  {
   $data['session'] = $this->session->all_userdata();
    $data['namalengkap'] = strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);

    //Jika update data sukses
    if($this->m_pasien->ubah())
    {
      //load notifikasi sukses
      $this->session->set_flashdata('edit_berhasil','Data tersebut berhasil diperbaharui');
      redirect('c_pasien','refresh');

    }else{
      //load notifikasi gagal
      $this->session->set_flashdata('edit_gagal','Data tersebut gagal diperbaharui');
      redirect('c_pasien','refresh');
    }
  }
  
  //function hapus
  public function hapus()
  {
    $data['session'] = $this->session->all_userdata();
    $nik = $this->uri->segment(3);
    $data['namalengkap'] = strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);

    //panggil query hapus di model
    
    if($this->m_pasien->hapus($nik)){
      $this->session->set_flashdata('hapus_berhasil','Data tersebut berhasil didelete');
      redirect('c_pasien','refresh');

    }else{
      //load notifikasi gagal
      $this->session->set_flashdata('hapus_gagal','Data tersebut gagal didelete');
      redirect('c_pasien','refresh');
    } 
  }

  public function delete()
  {
    $data['session'] = $this->session->all_userdata();
    $nik = $this->input->post('nik');
    $data['namalengkap'] = strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);

    //panggil query hapus di model
    if(empty($nik)){
  //load notifikasi gagal
      $this->session->set_flashdata('hapus_gagal','Tidak ada Data yang terseleksi');
      redirect('c_pasien','refresh');
    }
    if($this->m_pasien->hapusseleksi()){
      $this->session->set_flashdata('hapus_berhasil','Data tersebut berhasil didelete');
      redirect('c_pasien','refresh');
    }else{
      //load notifikasi gagal
      $this->session->set_flashdata('hapus_gagal','Data tersebut gagal didelete');
      redirect('c_pasien','refresh');
    } 
  }


}
