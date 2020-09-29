<?php
$tahun=date('Y');
$versionApp = '1.6';
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <title>Register Area | Sistem Pencatatan Kesehatan</title>
    <?php $this->load->view('template/head_login'); ?>
    <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js');?>"></script>

  </head>


<body style="background-color:#eaeaea;" class="login">

    <?php

    if($this->session->flashdata('error_login')==TRUE){
    ?>

    <body onload="new PNotify({

                                      title:'Gagal Login',

                                      type: 'error',

                                      text: 'Akun anda belum terdaftar atau Nonaktif, segera hubungi Admin Sistem.',

                                      nonblock: {

                                          nonblock: true

                                      },

                                      styling: 'bootstrap3',

                                      addclass: 'dark'

                                  });">

    </body>

    <?php
      }elseif($this->session->flashdata('sql_injection_attack')==TRUE){
    ?>
    <body onload="new PNotify({

                                      title:'SQL Injection Attack',

                                      type: 'error',

                                      text: 'Serangan SQL Injection terdeteksi, Website ini tidak dapat diinjeksi.',

                                      nonblock: {

                                          nonblock: true

                                      },

                                      styling: 'bootstrap3',

                                      addclass: 'dark'

                                  });">

    </body>
    <?php
      }elseif($this->session->flashdata('password_salah')==TRUE){
    ?>
    <body onload="new PNotify({

                                      title:'Password Tidak Tepat',

                                      type: 'error',

                                      text: 'Segera Hubungi Admin Sistem. PASSWORD yang anda masukan TIDAK TEPAT',

                                      nonblock: {

                                          nonblock: true

                                      },

                                      styling: 'bootstrap3',

                                      addclass: 'dark'

                                  });">

    </body>
    <?php     
    }elseif(@$suksesLogout){

    ?>

    <body onload="new PNotify({

                                      title:'Berhasil Logout',

                                      type: 'success',

                                      text: 'Anda telah keluar dari sistem. Session anda otomatis terhapus',

                                      nonblock: {

                                          nonblock: true

                                      },

                                      styling: 'bootstrap3',

                                      addclass: 'dark'

                                  });">

    </body>

    <?php
      }elseif(@$register_sukses == '1'){

    ?>

    <body onload="new PNotify({

                                      title:'Register Berhasil',

                                      type: 'success',

                                      text: 'Akun anda telah berhasil didaftarkan',

                                      nonblock: {

                                          nonblock: true

                                      },

                                      styling: 'bootstrap3',

                                      addclass: 'dark'

                                  });">

    </body>

    <?php
      }elseif(@$register_sukses == '0'){

    ?>

    <body onload="new PNotify({

                                      title:'Register Tidak Berhasil',

                                      type: 'warning',

                                      text: 'Akun anda tidak berhasil didaftarkan',

                                      nonblock: {

                                          nonblock: true

                                      },

                                      styling: 'bootstrap3',

                                      addclass: 'dark'

                                  });">

    </body>

    <?php
      }elseif(@$daftar == 'ok'){

    ?>

    <body onload="new PNotify({

                                      title:'Register Akun Baru',

                                      type: 'info',

                                      text: 'Silahkan untuk mengisi form register, untuk membuat akun baru',

                                      nonblock: {

                                          nonblock: true

                                      },

                                      styling: 'bootstrap3',

                                      addclass: 'dark'

                                  });">

    </body>

    <?php
      }

    ?>
    
    <div class="login_wrapper">
        <div class="animate form login_form">
            <div>
                <center><img src="<?php echo base_url('build/images/ulala.png');?>" height="" class="img img-rounded">
            </div>
        <div class="x_panel">
          <section class="login_content">

            <form action="<?php echo site_url('c_login/register'); ?>" method="POST" data-parsley-validate novalidate>
              
              <h1>Register Area</h1>
              <p>
                <div class="clearfix"></div>
                  <div class='alert alert-warning alert-dismissible fade in hideElement' id="terdaftar" role='alert'>
                    <i>NIK sudah didaftarkan.</i> Anda sudah dapat masuk ke sistem ini.
                  </div>
                  <div class='alert alert-success alert-dismissible fade in hideElement' id="tidakterdaftar" role='alert'>
                    <i>NIK belum terdaftar.</i> Silahkan untuk melanjutkan proses registrasi akun.
                  </div>
              </p>
              <div>
                <span class="text-warning" id="nik_val"></span>
                <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK anda sesuai KK/KTP" required="" />
                <i class="form-control-feedback"></i>
                    <span class="text-warning" ></span>
              </div>
              <div>
                <input type="text" name="nama_pasien" id="nama" class="form-control hideElement" placeholder="Masukkan Nama anda sesuai KK/KTP" required="" />
              </div>
              <div>
                <input type="text" id="myDatepicker" data-date-format="DD-MM-YYYY" class="form-control hideElement" name="tgllahir" required="" placeholder="Tanggal lahir anda (DD-MM-YYYY)" />
              </div>

              <div>
                <SELECT  name="jk" class="form-control hideElement" id="jk" required="" >
                  <OPTION value="">-- Pilih Jenis Kelamin --</OPTION>
                  <OPTION value="L">Laki-laki</OPTION>
                  <OPTION value="P">Perempuan</OPTION>
                </SELECT>
              </div>

              <br>

              <div>
                <input id="blok" class="form-control hideElement" name="blok" type="text" required="" placeholder="Masukan Blok/Dusun">
              </div>

              <div>
                <input id="rt" class="form-control hideElement" name="rt" type="text" placeholder="RT" required="">
                <input id="rw" class="form-control hideElement" name="rw" type="text" placeholder="RW" required="">
              </div>

              <div>
                <SELECT  name="provinsi" onChange="loadKabupaten()" class="form-control hideElement" id="provinsi" required="">
                  <OPTION value="">-- Pilih Provinsi --</OPTION>
                  <?php foreach ($provinsi as $data) {
                  ?>
                  <OPTION value="<?php echo $data['id_prov']; ?>"><?php echo $data['nama']; ?></OPTION>
                <?php } ?>
                </SELECT>
              </div>
              <br>

              <div id="kabupatenArea">
              </div>

              <div id="kecamatanArea">
              </div>

              <div id="kelurahanArea">
              </div>

              <div>
                <input id="notelp" class="form-control hideElement" name="notelp" type="text" placeholder="Masukkan Nomor Telepon">
              </div>

              <div class="separator"></div>
              <div>
                <span class="text-warning" id="email_val"></span>
                <input type="email" name="email" id="email" class="form-control hideElement" placeholder="Masukkan Email" required="" />
              </div>
              <div>
                <input type="password" name="password" id="password" class="form-control hideElement" placeholder="Masukkan Kata Sandi" required="" />
              </div>
              <div>
                <input type="checkbox" id="ok" class="hideElement" required="" /> <c id="text" class="hideElement">Checklist jika input data telah selesai.</c>
              </div>
              <br>
              <div>
                <a>
                <button data-toggle="tooltip" data-placement="left" class="btn btn-default form-control" type="submit" id="daftar" title="Masuk ke Dalam Sistem" disabled=""><span class="fa fa-check-circle"></span>     Daftar</button>
                </a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
              <div>
                <a href="<?php echo site_url('c_login'); ?>">
                <button class="btn btn-default form-control" type="button" data-toggle="tooltip" data-placement="left" title="Login Page"><span class=""></span>   <small>Sudah punya akun?</small> <b>Login disini</b></button>
                </a>
                <div class="separator"></div>
                <a href="<?php echo site_url('landing_page'); ?>">
                <button class="btn btn-default form-control" type="button" data-toggle="tooltip" data-placement="left" title="Kembali ke Landing Page"><span class="glyphicon glyphicon-modal-window"></span>   Halaman Utama</button>
                </a>
              </div>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>© <?php echo $tahun; ?> All Rights Reserved. Version <?php echo $versionApp;?></p>
                </div>
              </div>
            </form>
          </section>
        </div>
    </div>
</div>


<script type="text/javascript">
  $(document).ready(function () {
    $('#myDatepicker').datetimepicker();

    setInterval(function () {
        check_nik();
        check_email();
    }, 400);

  function check_nik(){
     var temp_nik = $("#nik").val();
     var len = temp_nik.length;
     if(len>0 && len<16 || len==""){
        $("#nama").hide();
        $("#myDatepicker").hide();
        $("#jk").hide();
        $("#blok").hide();
        $("#rt").hide();
        $("#rw").hide();
        $("#provinsi").hide();
        $("#notelp").hide();
        $("#email").hide();
        $("#password").hide();
        $("#ok").hide();
        $("#text").hide();
        $("#terdaftar").hide();
        $("#tidakterdaftar").hide();
        $('#nik_val').text("");
     }else if(len>16 && len!=""){
        $("#nik_val").text("");
        $("#nik_val").text("Inputan anda melebihi jumlah Karakter NIK !");
        $("#nama").hide();
        $("#myDatepicker").hide();
        $("#jk").hide();
        $("#blok").hide();
        $("#rt").hide();
        $("#rw").hide();
        $("#provinsi").hide();
        $("#notelp").hide();
        $("#email").hide();
        $("#password").hide();
        $("#ok").hide();
        $("#text").hide();
        $("#terdaftar").hide();
        $("#tidakterdaftar").hide();
     }else{
        $.ajax({
          type:'POST',
          url:"<?php echo site_url('c_api/check_nik'); ?>",
          data:"nik=" + temp_nik,
          success: function(data)
          { 
              if(data == 1){
                $("#terdaftar").show();
                $("#tidakterdaftar").hide();

                $("#nama").hide();
                $("#myDatepicker").hide();
                $("#jk").hide();
                $("#blok").hide();
                $("#rt").hide();
                $("#rw").hide();
                $("#provinsi").hide();
                $("#notelp").hide();
                $("#email").hide();
                $("#password").hide();
                $("#ok").hide();
                $("#text").hide();


              }else if(data == 0){
                $("#terdaftar").hide();
                $("#tidakterdaftar").show();
                $('#nik_val').text("");

                $("#nama").show();
                $("#myDatepicker").show();
                $("#jk").show();
                $("#blok").show();
                $("#rt").show();
                $("#rw").show();
                $("#provinsi").show();
                $("#notelp").show();
                $("#email").show();
                $("#password").show();
                $("#ok").show();
                $("#text").show();

              }else{
                $("#terdaftar").hide();
                $("#tidakterdaftar").show();
                $('#nik_val').text("");

                $("#nama").show();
                $("#myDatepicker").show();
                $("#jk").show();
                $("#blok").show();
                $("#rt").show();
                $("#rw").show();
                $("#provinsi").show();
                $("#notelp").show();
                $("#email").show();
                $("#password").show();
                $("#ok").show();
                $("#text").show();

              }
          }
        });
      }
    }
    function valid_email($email) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      return emailReg.test( $email );
    }

    function check_email()
    {
      var email= $("#email").val();
      var len= email.length;
      if(len>0){ 
          if(!valid_email(email)){ 
              $("#email_val").text("");
              $("#email_val").text("E-mail Tidak Valid (ex: aaaa@gmail.com)");
              return apply_feedback_error('#email_val');
          } else {
              if (len>30){ 
                  $("#email_val").text("");
                  $("#email_val").text("Maximal Karakter 30");
                  return apply_feedback_error('#email_val');
              } else {
                  $.ajax({
                         url: "<?php echo site_url('c_api/check_email'); ?>",
                         type: "POST",
                         data: "email="+email,
                         success: function(data){
                            if (data==1){ 
                                $('#email_val').text("");
                                $('#email_val').text("Email sudah ada. Silahkan masukan email lain.");
                                $('#password').attr("disabled","disabled");
                                return apply_feedback_error('#email_val');

                            }else{
                                $('#email_val').text("");
                                $('#password').removeAttr("disabled","disabled");
                                return apply_feedback_error('#email_val');
                            }
                          }
                  });
              }
          }
      } 
    }


  });

</script>

<script>
$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
  $("#ok").click(function(){
    if($(this).is(":checked")){ 
      $("#daftar").removeAttr("disabled", "disabled");
      $("#daftar").removeClass("btn-default"); 
      $("#daftar").addClass("btn-danger"); 
    }else{ // Jika checkbox all tidak diceklis
      $("#daftar").attr("disabled", "disabled"); // un-ceklis semua checkbox siswa dengan class "check-item"
      $("#daftar").addClass("btn-default"); 
      $("#daftar").removeClass("btn-danger"); 
    }
  });
  
});
</script>

<script type="text/javascript">
  function loadKabupaten()
  {
      var provinsi = $("#provinsi").val();
      $.ajax({
          type:'POST',
          url:"<?php echo site_url('c_api/kabupaten'); ?>",
          data:"id_prov=" + provinsi,
          success: function(html)
          { 
             $("#kabupatenArea").html(html);
          }
      }); 
  }
  function loadKecamatan()
  {
      var kabupaten = $("#kabupaten").val();
      $.ajax({
          type:'POST',
          url:"<?php echo site_url('c_api/kecamatan'); ?>",
          data:"id_kab=" + kabupaten,
          success: function(html)
          { 
              $("#kecamatanArea").html(html);
          }
      }); 
  }
  function loadKelurahan()
  {
      var kecamatan = $("#kecamatan").val();
      $.ajax({
          type:'POST',
          url:"<?php echo site_url('c_api/kelurahan'); ?>",
          data:"id_kec=" + kecamatan,
          success: function(html)
          { 
              $("#kelurahanArea").html(html);
          }
      }); 
  }
</script>

    <!-- jQuery -->

  
    <?php $this->load->view('template/js_login');?>
   

  </body>

</html>
