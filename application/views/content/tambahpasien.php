
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
       <h3>Pasien <small>Laman Tambah Data Pasien</small></h3>
    </div>
    <div class="title_right">
        <div>
           <label class="control-label col-sm-4 col-sm-12 col-xs-12"></label>
            <div class="col-sm-8 col-sm-12 col-xs-12">
         <?php 
          //Jika Tambah Data Sukses tampilkan Notifikasi sukses
          if(@$sukses):
          echo @$sukses;
          //Jika Tambah Data gagal tampilkan Notifikasi error
          else:  
          if(@$error){
           echo @$error;
          ;} 

            endif;
              //Tampilkan Error Validasi
              echo validation_errors();
        ?>
        </div>
      </div>
    </div>
  </div>  
<!-- content -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                      <h2>Form <small>Tambah Data</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        
                        <li><a class="collapse-link"></i></a></li>
                        <li><a class="collapse-link"></i></a></li>
                        <li><a class="collapse-link"></i></a></li>
                        <li><button type="button" class="btn btn-sm btn-warning" onclick="window.history.go(-1)";><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>
                        </li>
                        <li>
                        
                        </li>
              
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                    <div class="clearfix"></div>
                  </div>
            <div class="x_content">
                    <form method="post" action="<?php echo site_url('c_pasien/simpan');?>" class="form-horizontal form-label-left" id="demo-form" data-parsley-validate novalidate>

                      <p>Form ini untuk set data Akun Pasien</a>
                      </p>
                     <hr/>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email Anda
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" class="form-control col-md-7 col-xs-12" name="email" placeholder="Masukan Email Pasien" type="email" required="">
                          <span class="text-warning" id="email_val"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">*Password Akun
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                            <div class='input-group' id="keyup">
                                <input type='password' id="password" class="form-control" name="password" required placeholder="Masukan Password Akun" value="admin12345" />
                                <span class="input-group-addon">
                                   <span class="fa fa-eye" id="keyup_password"></span>
                                </span>
                            </div>
                            <i> Password Default</i>
                          </div>
                        </div>
                      </div>

                      <div class='item form-group'>
                      <label class='control-label col-md-3 col-sm-3 col-xs-12'>*Level Akun </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <SELECT  name="level" class="form-control" id="level" required="">
                            <OPTION value="">-- Pilih Level Akun --</OPTION>
                            <OPTION value="admin">Admin</OPTION>
                            <OPTION value="pasien">Pasien</OPTION>
                          </SELECT>
                        </div>
                      </div>

                      <br>
                      <br>
                      <p>Form ini untuk menambahkan data Pasien</a>
                      </p>
                     <hr/>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">*NIK Pasien
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nik" class="form-control col-md-7 col-xs-12" name="nik" placeholder="Masukan NIK Pasien" type="text" required="required">
                          <span class="text-warning" id="nik_val"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pasien">*Nama Pasien
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_pasien" class="form-control col-md-7 col-xs-12" name="nama_pasien" placeholder="Masukan Nama Pasien" type="text" required="required">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgllahir">*Tanggal Lahir
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="myDatepicker" data-date-format="DD-MM-YYYY" class="form-control" name="tgllahir" required="" placeholder="DD-MM-YYYY" />
                        </div>
                      </div>

                      <div class='item form-group'>
                      <label class='control-label col-md-3 col-sm-3 col-xs-12'>*Jenis Kelamin </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <SELECT  name="jk" class="form-control" id="jk" required="">
                            <OPTION value="">-- Pilih Jenis Kelamin --</OPTION>
                            <OPTION value="L">Laki-laki</OPTION>
                            <OPTION value="P">Perempuan</OPTION>
                          </SELECT>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blok">*Blok/Dusun
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="blok" class="form-control col-md-7 col-xs-12" name="blok" type="text" required="" placeholder="Masukan Blok/Dusun">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rtrw">*RT/RW
                        </label>
                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <input id="rt" class="form-control col-md-7 col-xs-12" name="rt" type="text" placeholder="RT" required="">
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <input id="rw" class="form-control col-md-7 col-xs-12" name="rw" type="text" placeholder="RW" required="">
                        </div>
                      </div>

                      <div class='item form-group'>
                      <label class='control-label col-md-3 col-sm-3 col-xs-12'>*Provinsi </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <SELECT  name="provinsi" onChange="loadKabupaten()" class="form-control" id="provinsi" required="">
                            <OPTION value="">-- Pilih Provinsi --</OPTION>
                            <?php foreach ($provinsi as $data) {
                            ?>
                            <OPTION value="<?php echo $data['id_prov']; ?>"><?php echo $data['nama']; ?></OPTION>
                          <?php } ?>
                          </SELECT>
                        </div>
                      </div>

                       <div id="kabupatenArea">
                       </div>

                        <div id="kecamatanArea">
                       </div>

                        <div id="kelurahanArea">
                       </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="notelp">No. Telepon
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="notelp" class="form-control col-md-7 col-xs-12" name="notelp" type="text" placeholder="Masukkan Nomor Telepon">
                        </div>
                      </div>                       

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">                        
                          <button id="simpan" type="submit" class="btn btn-success submit"><span class="glyphicon glyphicon-ok-circle"></span> Simpan</button>|
                          <button id="reset" class="btn btn-danger" type="button"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
                        </div>
                      </div>
                      </form>
                      </div>
                     </div> 
                  </div>
                </div>
              </div>
               <div class="clearfix"></div>
                <div class="clearfix"></div>
                 <div class="clearfix"></div>
            
        <!-- /page content -->


<script type="text/javascript">
  function loadKabupaten()
  {
      var provinsi = $("#provinsi").val();
      $.ajax({
          type:'POST',
          url:"<?php echo site_url('c_ajax/kabupaten'); ?>",
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
          url:"<?php echo site_url('c_ajax/kecamatan'); ?>",
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
          url:"<?php echo site_url('c_ajax/kelurahan'); ?>",
          data:"id_kec=" + kecamatan,
          success: function(html)
          { 
              $("#kelurahanArea").html(html);
          }
      }); 
  }

</script>
<script type="text/javascript">
  $(function(){
    $('#myDatepicker').datetimepicker();

    $("#keyup_password").click(function(){
        $("#password").attr('type','text');
    }).mouseup(function(){
        $("#password").attr('type','password');
        $("#keyup_password").removeClass('fa-eye-slash');
        $("#keyup_password").addClass('fa-eye')
    }).mouseout(function(){
        $("#password").attr('type','password');
        $("#keyup_password").addClass('fa-eye-slash');
        $("#keyup_password").removeClass('fa-eye');
    });

  });
</script>

<script type="text/javascript">
  $(function(){

  setInterval(function () {
        check_nik();
        check_email();
    }, 400);

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
            $("#level").attr('disabled','disabled');
            return apply_feedback_error('#email_val');
        } else {
            if (len>30){ 
                $("#email_val").text("");
                $("#email_val").text("Maximal Karakter 30");
                $("#level").attr('disabled','disabled');
                return apply_feedback_error('#email_val');
            } else {
                $.ajax({
                       url: "<?php echo site_url('c_ajax/check_email'); ?>",
                       type: "POST",
                       data: "email="+email,
                       success: function(data){
                          if (data==1){ 
                              $('#email_val').text("");
                              $('#email_val').text("Email sudah ada. Silahkan masukan email lain.");
                              $("#level").attr('disabled','disabled');
                              return apply_feedback_error('#email_val');

                          }else{
                              $('#email_val').text("");
                              $("#level").removeAttr('disabled','disabled');
                              return apply_feedback_error('#email_val');
                          }
                        }
                });
            }
        }
    } 
  }

  function check_nik(){
   var temp_nik = $("#nik").val();
   var len = temp_nik.length;
   if(len>0 && len<16 || len==""){
      $("#nama_pasien").attr('disabled','disabled');
      $("#myDatepicker").attr('disabled','disabled');
      $("#jk").attr('disabled','disabled');
      $("#blok").attr('disabled','disabled');
      $("#rt").attr('disabled','disabled');
      $("#rw").attr('disabled','disabled');
      $("#provinsi").attr('disabled','disabled');
      $("#notelp").attr('disabled','disabled');
      $("#simpan").attr('disabled','disabled');
   }else if(len>16 && len!=""){
      $("#nik_val").text("");
      $("#nik_val").text("Inputan anda melebihi jumlah Karakter NIK !");
      $("#nama_pasien").attr('disabled','disabled');
      $("#myDatepicker").attr('disabled','disabled');
      $("#jk").attr('disabled','disabled');
      $("#blok").attr('disabled','disabled');
      $("#rt").attr('disabled','disabled');
      $("#rw").attr('disabled','disabled');
      $("#provinsi").attr('disabled','disabled');
      $("#notelp").attr('disabled','disabled');
      $("#simpan").attr('disabled','disabled');
   }else{
      $.ajax({
        type:'POST',
        url:"<?php echo site_url('c_api/check_nik'); ?>",
        data:"nik=" + temp_nik,
        success: function(data)
        { 
            if(data == 1){
             $("#nik_val").text("");
             $("#nik_val").text("NIK telah terdaftar !");
             $("#nama_pasien").attr('disabled','disabled');
             $("#myDatepicker").attr('disabled','disabled');
             $("#jk").attr('disabled','disabled');
             $("#blok").attr('disabled','disabled');
             $("#rt").attr('disabled','disabled');
             $("#rw").attr('disabled','disabled');
             $("#provinsi").attr('disabled','disabled');
             $("#notelp").attr('disabled','disabled');
             $("#simpan").attr('disabled','disabled');

            }else if(data == 0){
              $("#nik_val").text("");

              $("#nama_pasien").removeAttr('disabled','disabled');
              $("#myDatepicker").removeAttr('disabled','disabled');
              $("#jk").removeAttr('disabled','disabled');
              $("#blok").removeAttr('disabled','disabled');
              $("#rt").removeAttr('disabled','disabled');
              $("#rw").removeAttr('disabled','disabled');
              $("#provinsi").removeAttr('disabled','disabled');
              $("#notelp").removeAttr('disabled','disabled');
              $("#simpan").removeAttr('disabled','disabled');

            }else{
              $("#nik_val").text("");

              $("#nama_pasien").removeAttr('disabled','disabled');
              $("#myDatepicker").removeAttr('disabled','disabled');
              $("#jk").removeAttr('disabled','disabled');
              $("#blok").removeAttr('disabled','disabled');
              $("#rt").removeAttr('disabled','disabled');
              $("#rw").removeAttr('disabled','disabled');
              $("#provinsi").removeAttr('disabled','disabled');
              $("#notelp").removeAttr('disabled','disabled');
              $("#simpan").removeAttr('disabled','disabled');

            }
        }
      });
    }
  }

  

  });
</script>
