<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kesehatan extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_kesehatan');
    $this->load->model('m_stunting');
    if(!$this->session->userdata('nik'))
    {
      redirect('c_login');
    }
  }

  public function index()
  {

    $level = $this->session->userdata('level');
    $nik = $this->session->userdata('nik');
    if($level == 'pasien'){
      $data['kesehatan'] = $this->m_kesehatan->get_data_pasien($nik);
      $data['stunting'] = $this->m_stunting->get_data_pasien($nik);      
    }else{
      $data['kesehatan'] = $this->m_kesehatan->get_data();
    }
    $data['session'] = $this->session->all_userdata();
    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
    $data['tampilan'] = 'kesehatan';
    //new
    
    $this->load->view('template/media', $data);
  }
  
  public function detail_kesehatan()
  {
    $data['session'] = $this->session->all_userdata();
    $id_hasil = $this->uri->segment(3);
    $data['detail'] = $this->m_kesehatan->get_data_detail($id_hasil); 
    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
    $data['tampilan'] = 'detailkesehatan';
    
    $this->load->view('template/media', $data);
  }

  public function tambah()
  {
    
    $data['session'] = $this->session->all_userdata();
    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
    $data['tampilan'] = 'tambahkesehatan';
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
    if($this->m_kesehatan->simpan())
    {
      //load notifikasi sukses
      $this->session->set_flashdata('simpan_berhasil','Data baru berhasil ditambahkan');
      redirect('c_kesehatan','refresh');
    }else{
      //load notifikasi gagal
      $this->session->set_flashdata('simpan_gagal','Data baru gagal ditambahkan');
      redirect('c_kesehatan','refresh');
    }
  } 
  
  //function hapus
  public function hapus()
  {
    $data['session'] = $this->session->all_userdata();
    $id_hasil = $this->uri->segment(3);
    $data['namalengkap'] = strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);

    //panggil query hapus di model
    
    if($this->m_kesehatan->hapus($id_hasil)){
      $this->session->set_flashdata('hapus_berhasil','Data tersebut berhasil didelete');
      redirect('c_kesehatan','refresh');

    }else{
      //load notifikasi gagal
      $this->session->set_flashdata('hapus_gagal','Data tersebut gagal didelete');
      redirect('c_kesehatan','refresh');
    } 
  }

  public function delete()
  {
    $data['session'] = $this->session->all_userdata();
    $id_hasil = $this->input->post('id_hasil');
    $data['namalengkap'] = strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);

    //panggil query hapus di model
    if(empty($id_hasil)){
  //load notifikasi gagal
      $this->session->set_flashdata('hapus_gagal','Tidak ada Data yang terseleksi');
      redirect('c_kesehatan','refresh');
    }
    if($this->m_kesehatan->hapusseleksi()){
      $this->session->set_flashdata('hapus_berhasil','Data tersebut berhasil didelete');
      redirect('c_kesehatan','refresh');
    }else{
      //load notifikasi gagal
      $this->session->set_flashdata('hapus_gagal','Data tersebut gagal didelete');
      redirect('c_kesehatan','refresh');
    } 
  }

  public function stunting()
  {
    $data['session'] = $this->session->all_userdata();
    $data['stunting'] = $this->m_stunting->get_data();    
    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
    $data['tampilan'] = 'stunting';
    //new
    
    $this->load->view('template/media', $data);
  }

  public function add_stunting()
  {
    $data['session'] = $this->session->all_userdata();
    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
    $data['tampilan'] = 'tambahstunting';
    //new
    $this->load->view('template/media', $data);
  }

  public function detail_stunting()
  {
    $data['session'] = $this->session->all_userdata();
    $id_stunting = $this->uri->segment(3);
    $data['detail'] = $this->m_stunting->get_data_detail($id_stunting); 
    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
    $data['tampilan'] = 'detailstunting';
    
    $this->load->view('template/media', $data);
  }

  public function save_stunting()
  {
    $data['session'] = $this->session->all_userdata();
    $data['namalengkap'] =strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);
  

    if($this->m_stunting->simpan())
    {
      //load notifikasi sukses
      $this->session->set_flashdata('simpan_berhasil','Data baru berhasil ditambahkan');
      redirect('c_kesehatan/stunting','refresh');
    }else{
      //load notifikasi gagal
      $this->session->set_flashdata('simpan_gagal','Data baru gagal ditambahkan');
      redirect('c_kesehatan/stunting','refresh');
    }
  } 
  
  public function hapus_stunting()
  {
    $data['session'] = $this->session->all_userdata();
    $id_stunting = $this->uri->segment(3);
    $data['namalengkap'] = strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);

    //panggil query hapus di model
    
    if($this->m_stunting->hapus($id_stunting)){
      $this->session->set_flashdata('hapus_berhasil','Data tersebut berhasil didelete');
      redirect('c_kesehatan/stunting','refresh');

    }else{
      //load notifikasi gagal
      $this->session->set_flashdata('hapus_gagal','Data tersebut gagal didelete');
      redirect('c_kesehatan/stunting','refresh');
    } 
  }

  public function delete_stunting()
  {
    $data['session'] = $this->session->all_userdata();
    $id_stunting = $this->input->post('id_stunting');
    $data['namalengkap'] = strtoupper($this->session->userdata('nama'));
    $data['namadepan'] = explode(' ',$this->session->userdata('nama'));
    $data['firstname'] = strtoupper($data['namadepan'][0]);

    //panggil query hapus di model
    if(empty($id_stunting)){
  //load notifikasi gagal
      $this->session->set_flashdata('hapus_gagal','Tidak ada Data yang terseleksi');
      redirect('c_kesehatan/stunting','refresh');
    }
    if($this->m_stunting->hapusseleksi()){
      $this->session->set_flashdata('hapus_berhasil','Data tersebut berhasil didelete');
      redirect('c_kesehatan/stunting','refresh');
    }else{
      //load notifikasi gagal
      $this->session->set_flashdata('hapus_gagal','Data tersebut gagal didelete');
      redirect('c_kesehatan/stunting','refresh');
    } 
  }


}
