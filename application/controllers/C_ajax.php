<?php
class C_ajax extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('nik'))
    {
      redirect('c_login');
    }
  }
    
    function kabupaten(){
        $id_prov = $this->input->post('id_prov');
        $kabupaten   = $this->db->get_where('kabupaten',array('id_prov'=>$id_prov));
        
        echo "<div class='item form-group' id='kab'>";
        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'>*Kabupaten </label>";
        echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
        echo "<select id='kabupaten' onChange='loadKecamatan()' class='form-control'  name='kabupaten'>";
        echo "<OPTION value=''>-- Pilih Kabupaten --</OPTION>";
        foreach ($kabupaten->result() as $k)
        {
            $str= strtolower($k->nama);
            $str2=ucwords($str);
            echo "<option value='$k->id_kab'>$str2</option>";
        }
        echo "</select></div></div>";
    }
    
    function kecamatan(){
        $id_kab = $this->input->post('id_kab');
        $kecamatan   = $this->db->get_where('kecamatan',array('id_kab'=>$id_kab));
        echo "<div class='item form-group' id='kec'>";
        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'>*Kecamatan </label>";
        echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
        echo "<select id='kecamatan' onChange='loadKelurahan()' class='form-control'  name='kecamatan'>";
        echo "<OPTION value=''>-- Pilih Kecamatan --</OPTION>";
        foreach ($kecamatan->result() as $k)
        {
            echo "<option value='$k->id_kec'>$k->nama</option>";
        }
        echo "</select></div></div>";
    }
    
    function kelurahan(){
        $id_kec  = $this->input->post('id_kec');
        $kelurahan = $this->db->get_where('kelurahan',array('id_kec'=>$id_kec));

        echo "<div class='item form-group' id='kel'>";
        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'>*Kelurahan </label>";
        echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
        echo "<select id='kelurahan' class='form-control'  name='kelurahan'>";
        echo "<OPTION value=''>-- Pilih Kelurahan --</OPTION>";
        foreach ($kelurahan->result() as $k)
        {
            echo "<option value='$k->id_kel'>$k->nama</option>";
        }
        echo "</select></div></div>";
    }

    function temp_password(){
        $nik = $this->session->userdata('nik');
        $temp_password = md5($this->input->post('temp_password'));

        $this->db->from('akun');
        $this->db->where('nik',$nik);
        $this->db->where('password',$temp_password);
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $array = $row;
        }
        if (!isset($array)) 
        { 
            $array='';
        }

        if(!empty($array)){
            echo "benar";
        }else{
           echo "salah";
        }
    }

    function get_nama(){
        $temp_nik = $this->input->post('nik');
        $this->db->from('pasien');
        $this->db->where('nik',$temp_nik);
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $array = $row;
        }
        if (!isset($array)) 
        { 
            $array='';
        }

        if(!empty($array)){
            echo $array['nama_pasien'].'/'.$array['jk'].'/'.$array['tgllahir'];
        }else{
           echo "Tidak ada data pada database";
        }
    }

    function get_temp(){
        $temp = $this->input->post('id_temp');

        $this->db->from('temp');
        $this->db->order_by($temp.' desc');
        $this->db->limit(1);
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $array = $row;
        }
        if (!isset($array)) 
        { 
            $array='';
        }

        if(!empty($array)){
            echo $array['id_temp'].'/'.$array['berat'].'/'.$array['tinggi'].'/'.$array['suhu'].'/'.$array['detakjantung'];
        }else{
           echo "Tidak ada data pada database";
        }
    }

    function check_nik(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $temp_nik = $this->input->post('nik');
            $this->db->from('pasien');
            $this->db->where('nik',$temp_nik);
            $this->db->limit(1);
            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $array = $row;
            }
            if (!isset($array)) 
            { 
                $array='';
            }

            if($array != ''){
               $respon = 1;
               echo json_encode($respon);
            }else{
               $respon = 0;
               echo json_encode($respon);
            }

        }

    }

    function check_email(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $temp_email = $this->input->post('email');
            $this->db->from('akun');
            $this->db->where('email',$temp_email);
            $this->db->limit(1);
            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $array = $row;
            }
            if (!isset($array)) 
            { 
                $array='';
            }

            if($array != ''){
               $respon = 1;
               echo json_encode($respon);
            }else{
               $respon = 0;
               echo json_encode($respon);
            }

        }

    }

    function simpan_kondisi()
    {
        
        $id_kondisi = $this->input->post('id_kondisi');
        $status = $this->input->post('status');
        
        $this->db->from('kondisi');
        $this->db->where('id_kondisi',$id_kondisi);
        
        //cek data ganda
        $cekData = $this->db->get()->result();
        
        if($status == 1 || $status == 0)
        {
            if( count($cekData) < 1 ){
                $sql = " INSERT INTO kondisi (status) VALUES ('$status') ";
                $this->db->query($sql);
                return true;
              
            }else if( count($cekData) > 0 ){
                $sql = "UPDATE kondisi SET 
                        status = '$status'
                        WHERE id_kondisi='$id_kondisi'";
                $this->db->query($sql);
                return true;
            }
        }else{
          return false; 
        }
    }

    function get_data_kondisi()
    {
        if(!empty($this->input->post('id_kondisi'))){

            $id = $this->input->post('id_kondisi');

            $this->db->from('kondisi');
            $this->db->order_by($id.' desc');
            $this->db->limit(1);
            $query = $this->db->get();

            foreach ($query->result_array() as $row) {
              $array = $row;
            }
            if (!isset($array)) { 
              $array='';
            }

            if(!empty($array)){
                echo $array['id_kondisi'];
            }else{
               echo "Tidak ada data pada database";
            }
        }else{
            echo "error, NOT POST";
        }
    }

}