<?php
$tahun=date('Y');
$versionApp = '1.6';
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <title>Login Area | Sistem Pencatatan Kesehatan</title>
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

      }else{

    ?>
    <body onload="new PNotify({

                                      title:'Silahkan Login terlebih dahulu',

                                      type: 'info',

                                      text: 'Session anda belum tersedia. Silahkan Login untuk masuk ke sistem ini',

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

            <form action="<?php echo site_url('c_login'); ?>" method="POST" data-parsley-validate novalidate>
              
              <h1>Login Area</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Nama Pengguna" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi" required="" />
              </div>
              <div>
                <a>
                <button data-toggle="tooltip" data-placement="left" class="btn btn-danger form-control" type="submit" title="Masuk ke Dalam Sistem"><span class="fa fa-sign-in"></span>     Masuk Sistem</button>
                </a>
              </div>
              <div>
                <button class="btn btn-default form-control" id="forgot" type="button" data-toggle="tooltip" data-placement="right" title="Lupa Password"><span class="fa fa-question-circle" id="change"></span>   <d class="" id="lupa">Lupa Password</d>  <c class="hideElement" id="close">Tutup (klik 2x)</c> </button>

                <p>
                  <div class='alert alert-success alert-dismissible fade in hideElement' id="sukses" role='alert'>
                    <i>Password Baru telah dikirimkan ke email anda</i>.
                  </div> 
                  <div class='alert alert-danger alert-dismissible fade in hideElement' id="gagal" role='alert'>
                    <i>Reset Password Gagal, Silahkan coba lagi</i>.
                  </div>
                </p>
                <p>
                  <div class="clearfix"></div>
                  <div class='alert alert-success alert-dismissible fade in hideElement' id="benar" role='alert'>
                    <i>NIK Terdaftar</i>
                  </div>
                  <div class='alert alert-danger alert-dismissible fade in hideElement' id="salah" role='alert'>
                    <i>NIK Tidak Terdaftar</i>
                  </div>
                </p>
                <p>
                  <span class="text-warning" id="nik_val"></span>
                  <input type="text" name="nik" class="form-control hideElement" id="nik" placeholder="Masukkan NIK Terdaftar" />
                  <input type="email" name="email" class="form-control hideElement" id="email" placeholder="Masukkan Email Anda" />
            
                  <button class="btn btn-default form-control hideElement" id="send" type="button" data-toggle="tooltip" data-placement="right" title="Submit"><span class="fa fa-check-circle" ></span> Submit</button>
                </p>

              </div>

              <div class="clearfix"></div>

              <div class="separator">
              <div>
                <a href="<?php echo site_url('c_login/register'); ?>">
                <button class="btn btn-default form-control" type="button" data-toggle="tooltip" data-placement="left" title="Registrasi Akun"><span class=""></span>   <small>Belum punya akun?</small> <b>Daftar disini</b></button>
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
  $(document).ready(function(){
    $("#forgot").click(function(){
    
      $("#nik").show();
      $("#nik").val("");
      $("#email").show(); 
      $("#email").val("");
      $("#send").show();
      $("#benar").hide();
      $("#salah").hide();

      $('#change').removeClass();
      $('#change').addClass('fa fa-times-circle');
      $('#close').show();
      $('#lupa').hide();

    }).dblclick(function(){
      $("#nik").hide();
      $("#nik").val("");
      $("#email").hide(); 
      $("#email").val("");
      $("#send").hide();
      $("#benar").hide();
      $("#salah").hide();
      $('#change').removeClass();
      $('#change').addClass('fa fa-question-circle');
      $('#close').hide();
      $('#lupa').show();


    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {

    setInterval(function () {
        check_nik();
    }, 400);

  function check_nik(){
     var temp_nik = $("#nik").val();
     var len = temp_nik.length;
     if(len>0 && len<16 || len==""){
        $("#email").attr('disabled','disabled');
        $("#benar").hide();
        $("#salah").hide();
        $("#nik_val").text("");
     }else if(len>16 && len!=""){
        $("#nik_val").text("");
        $("#nik_val").text("Inputan anda melebihi jumlah Karakter NIK !");
        $("#email").attr('disabled','disabled');
        $("#benar").hide();
        $("#salah").hide();
     }else{  $.ajax({
          type:'POST',
          url:"<?php echo site_url('c_api/check_nik'); ?>",
          data:"nik=" + temp_nik,
          success: function(data)
          { 
              if(data == 1){
                $("#email").removeAttr("disabled","disabled");
                $("#send").removeAttr("disabled","disabled");
                $("#benar").show();
                $("#salah").hide();
                $("#nik_val").text("");
              }else if(data == 0){
                $("#email").attr("disabled","disabled");
                $("#send").attr("disabled","disabled");
                $("#salah").show();
                $("#benar").hide();
                $("#nik_val").text("");
              }else{
                $("#benar").hide();
                $("#salah").hide();
                $("#nik_val").text("");
              }
          }
        });
      }
    }
  });

</script>

<script type="text/javascript">
  $(document).ready(function () {
    
    $("#send").click(function(){
      $("#benar").hide();
      $("#salah").hide();
      $("#nik").hide();
      $("#email").hide();

      $('#change').removeClass();
      $('#change').addClass('fa fa-question-circle');
      $('#close').hide();
      $('#lupa').show();

      var nik = $("#nik").val();
      var email = $("#email").val();
      $.ajax({
          type:'POST',
          url:"<?php echo site_url('c_api/forgot'); ?>",
          data:{nik:nik, email:email},
          success: function(data)
          { 
              // alert(data);
              $("#nik").val("");
              $("#email").val("");
              if(data == 1){                
                $("#nik").val("");
                $("#email").val("");
                $("#benar").hide();
                $("#salah").hide();
                $("#nik").hide();
                $("#email").hide();
                $("#send").hide();
                $('#sukses').show();
                  setTimeout(function(){
                    $('#sukses').hide();
                  }, 7000);
              }else if(data == 0){
                $("#nik").val("");
                $("#email").val("");
                $("#benar").hide();
                $("#salah").hide();
                $("#nik").hide();
                $("#email").hide();
                $("#send").hide();
                $('#gagal').show();
                  setTimeout(function(){
                    $('#gagal').hide();
                  }, 1000);
              }else{
                $("#nik").val("");
                $("#email").val("");
                $("#benar").hide();
                $("#salah").hide();
                $("#nik").hide();
                $("#email").hide();
                $("#send").hide();
                $('#gagal').show();
                  setTimeout(function(){
                    $('#gagal').hide();
                  }, 1000);
              }
          }
      });

    });

  });

</script>

    <!-- jQuery -->

    

    <?php $this->load->view('template/js_login');?>
   

  </body>

</html>
