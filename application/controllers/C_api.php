<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_api extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function temp()
    {
        
       if ($this->input->server('REQUEST_METHOD') == 'POST') {
            
            $tinggi = $this->input->post('tinggi');
            $berat = $this->input->post('berat');
            $suhu = $this->input->post('suhu');
            $detakjantung = $this->input->post('detakjantung');
            if(!empty($tinggi)){
                $query = "INSERT INTO temp(berat,tinggi,suhu,detakjantung) VALUES ('$berat','$tinggi','$suhu','$detakjantung')";
                $this->db->query($query);
            }
        }else{
            $result['success'] = "0";
            $result['message'] = "error";
        
            echo json_encode($result);
            redirect('c_login','refresh');
        }
              
    }

    public function tampil_kondisi()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $id = "id_kondisi";
            $this->db->from('kondisi');
            $this->db->where('id_kondisi',$id_kondisi);
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
               echo $array['status'].',';
            }else{
               echo "Tidak Ada Data Pada DB";
            }

        }else{
            $result['success'] = "0";
            $result['message'] = "error";
        
            echo json_encode($result);
            redirect('c_login','refresh');
        }
    }

    public function check_nik(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $temp_nik = $this->input->post('nik');
            $this->db->from('akun');
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

        }else{
            $result['success'] = "0";
            $result['message'] = "error";
        
            echo json_encode($result);
            redirect('c_login','refresh');
        }

    }

    public function check_email(){
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

        }else{
            $result['success'] = "0";
            $result['message'] = "error";
        
            echo json_encode($result);
            redirect('c_login','refresh');
        }

    }

    public function mail($email, $nik){
        if (!empty($email)) {
            
            // Konfigurasi email
            $config = [
                   'mailtype'  => 'html',
                   'charset'   => 'utf-8',
                   'protocol'  => 'smtp',
                   'smtp_host' => 'ssl://mail.windstandrobotic.org',
                   'smtp_user' => 'sicaket@windstandrobotic.org',    
                   'smtp_pass' => 'adie@181097',                  
                   'smtp_port' => '465',
                   'crlf'      => "\r\n",
                   'newline'   => "\r\n"
               ];

            // Load library email dan konfigurasinya
            $this->load->library('email',$config);

            // $this->email->initialize($config);

            // Email dan nama pengirim
            $this->email->from('sicaket@windstandrobotic.org', '[no-reply] Developer | SICAKET');

            // Email penerima
            $this->email->to($email); 

            // Lampiran email, isi dengan url/path file
            // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

            // Subject email
            $this->email->subject('RESET PASSWORD | SICAKET');

            $this->email->message("NIK Anda : ".$nik.", Password Baru Anda : <b>admin12345</b>. <br> Setelah berhasil Login segera lakukan Perubahan Password Kembali. Password yang dikirimkan adalah password Default. <br><br> Terimakasih. Hormat Kami Dev SICAKET.");

            if ($this->email->send()) {
                return true;
            } else {
                return false;
            }
        }else{
            $result['success'] = "0";
            $result['message'] = "error";
        
            echo json_encode($result);
            redirect('c_login','refresh');
        }
    }


    public function send_sms($nohp){
        if (!empty($nohp)) {

            $fields_string  =   "";
            $fields     =   array(
                                'api_key'       =>  'a87f465c',
                                'api_secret'    =>  'l9uUrWMrFPnyNPlv',
                                'to'            =>  ''.$nohp.'',
                                'from'          =>  "SICAKET",
                                'text'          =>  "Password Baru/Default Anda : admin12345"
            );

            $url        =   "https://rest.nexmo.com/sms/json";

            //url-ify the data for the POST
            foreach($fields as $key=>$value) { 
                    $fields_string .= $key.'='.$value.'&'; 
                    }
            rtrim($fields_string, '&');
         
                //open connection
            $ch = curl_init();
         
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, count($fields));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
         
            //execute post
            curl_exec($ch);
            //close connection
            curl_close($ch);

            // echo "<pre>";
            // print_r($result); 
            // echo "</pre>";

            return true;

        }else{
            $respon['success'] = "0";
            $respon['message'] = "error";
        
            echo json_encode($respon);
            redirect('c_login','refresh');
        }
    }

    public function forgot(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $nik = $this->input->post('nik');
            // $nohp = $this->input->post('nohp');
            $email = $this->input->post('email');
            
            if($this->mail($email, $nik) == true){

                if($nik!=''){
                  $passwordBaru = md5("admin12345");
                  $query = "UPDATE akun SET 
                  password = '$passwordBaru'
                  WHERE nik='$nik'"; 
                  if($this->db->query($query)){
                    $respon = 1;
                    echo json_encode($respon);
                  }else{
                    $respon = 0;
                    echo json_encode($respon); 
                  }
                }

            }else{
              $respon = 0;
               echo json_encode($respon); 
            }
        }else{
            $result['success'] = "0";
            $result['message'] = "error";
        
            echo json_encode($result);
            redirect('c_login','refresh');
        }

    }

    function kabupaten(){
        $id_prov = $this->input->post('id_prov');
        $kabupaten   = $this->db->get_where('kabupaten',array('id_prov'=>$id_prov));
        
        echo "<div id='kab'>";
        echo "<select id='kabupaten' onChange='loadKecamatan()' class='form-control'  name='kabupaten'>";
        echo "<OPTION value=''>-- Pilih Kabupaten --</OPTION>";
        foreach ($kabupaten->result() as $k)
        {
            $str= strtolower($k->nama);
            $str2=ucwords($str);
            echo "<option value='$k->id_kab'>$str2</option>";
        }
        echo "</select></div><br>";
    }
    
    function kecamatan(){
        $id_kab = $this->input->post('id_kab');
        $kecamatan   = $this->db->get_where('kecamatan',array('id_kab'=>$id_kab));
        echo "<div id='kec'>";
        echo "<select id='kecamatan' onChange='loadKelurahan()' class='form-control'  name='kecamatan'>";
        echo "<OPTION value=''>-- Pilih Kecamatan --</OPTION>";
        foreach ($kecamatan->result() as $k)
        {
            echo "<option value='$k->id_kec'>$k->nama</option>";
        }
        echo "</select></div><br>";
    }
    
    function kelurahan(){
        $id_kec  = $this->input->post('id_kec');
        $kelurahan = $this->db->get_where('kelurahan',array('id_kec'=>$id_kec));

        echo "<div id='kel'>";
        echo "<select id='kelurahan' class='form-control'  name='kelurahan'>";
        echo "<OPTION value=''>-- Pilih Kelurahan --</OPTION>";
        foreach ($kelurahan->result() as $k)
        {
            echo "<option value='$k->id_kel'>$k->nama</option>";
        }
        echo "</select></div><br>";
    }

}