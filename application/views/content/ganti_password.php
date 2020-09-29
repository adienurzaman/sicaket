<?php
if($this->session->flashdata('ubah_berhasil') == TRUE){
?>
<body onload="new PNotify({
                                  title:'Password Berhasil diperbaharui',
                                  type: 'success',
                                  text: '<?php echo $this->session->flashdata('ubah_berhasil');?>',
                                  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3',
                                  addclass: 'dark'
                              });">
</body>
<?php
}elseif($this->session->flashdata('ubah_gagal') == TRUE){
?>
<body onload="new PNotify({
                                  title:'Password Gagal diperbaharui',
                                  type: 'error',
                                  text: '<?php echo $this->session->flashdata('ubah_gagal');?>',
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

<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
       <h3>Ganti Password <small>Laman Ganti Password</small></h3>
    </div>
    <div class="title_right">
        <div>
           <label class="control-label col-sm-4 col-sm-12 col-xs-12"></label>
            <div class="col-sm-8 col-sm-12 col-xs-12">
        </div>
      </div>
    </div>
  </div>  
<!-- content -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                      <h2>Form <small>Ganti Password</small></h2>
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
                    <form method="post" action="<?php echo site_url('c_akun/gantiPassword');?>" class="form-horizontal form-label-left" id="demo-form" data-parsley-validate novalidate>

                      <p>Form ini untuk menambahkan mengubah password akun</a>
                      </p>
                     <hr/>

                      <!-- <div id='Area'></div> -->
                      
                    <div class='alert alert-success alert-dismissible fade in hideElement' id='benar' role='alert'>
                             <strong>Password Lama Benar!</strong> Silahkan untuk mengisi <i>field</i> password baru.
                           </div>
            
                   <div class='alert alert-danger alert-dismissible fade in hideElement' id='salah' role='alert'>
                             <strong>Password Lama Tidak Benar!</strong> Cek kembali Password Lama yang anda masukan.
                            </div>
               <!--    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="temp_password">Password Lama
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="temp_password" class="form-control col-md-7 col-xs-12" name="temp_password" placeholder="Masukan Password Lama Anda" type="password" required="required">
                        </div>
                      </div> -->

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="temp_password">Password Lama
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        <div class='input-group' id="keyup">
                            <input type='password' id="temp_password" class="form-control" name="temp_password" required placeholder="Masukan Password Lama Anda" required="required" />
                            <span class="input-group-addon">
                               <span class="fa fa-eye-slash" id="keyup_temp_password"></span>
                            </span>
                        </div>
                      </div>
                        </div>
                      </div>


                <!--       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">Password Baru
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="new_password" class="form-control col-md-7 col-xs-12" name="new_password" placeholder="Masukkan Password Baru Anda" type="password" required="required">
                        </div>
                      </div> -->

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">Password Baru
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        <div class='input-group' id="keyup">
                            <input type='password' id="new_password" class="form-control" name="new_password" required placeholder="Masukan Password Baru Anda" required="required" />
                            <span class="input-group-addon">
                               <span class="fa fa-eye-slash" id="keyup_new_password"></span>
                            </span>
                        </div>
                      </div>
                        </div>
                      </div>

               <!--       <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Ulangi Password Baru</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-linked="new_password" class="form-control col-md-7 col-xs-12" required="required" placeholder="**************************">
                        </div>
                      </div> -->

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="temp_password">Konfirmasi Password Baru
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        <div class='input-group' id="keyup">
                            <input id="password" type="password" name="password" data-validate-linked="new_password" class="form-control col-md-7 col-xs-12" required="required" placeholder="**************************">
                            <span class="input-group-addon">
                               <span class="fa fa-eye-slash" id="keyup_password"></span>
                            </span>
                        </div>
                      </div>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">                        
                          <button id="simpan" type="submit" onclick="simpan()" class="btn btn-success submit"><span class="glyphicon glyphicon-ok-circle"></span> Ganti</button>|
                          <button id="reset" class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
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
  $(document).ready(function () {
    setInterval(function () {
        check_temp_pass();
    }, 400);

    function check_temp_pass(){
     var temp_password = $("#temp_password").val();
     if(temp_password == ""){
        $(".alert").hide();
        $("#new_password").attr("disabled","disabled")
        $("#password").attr("disabled","disabled")
     }else{
      $.ajax({
          type:'POST',
          url:"<?php echo site_url('c_ajax/temp_password'); ?>",
          data:"temp_password=" + temp_password,
          success: function(html)
          { 
              // $("#Area").html(html);
              var status = html;
              if(status == "benar"){
                $("#benar").show();
                $("#salah").hide();
                $("#new_password").removeAttr("disabled","disabled")
                $("#password").removeAttr("disabled","disabled")
              }else{
                $("#salah").show()
                $("#benar").hide();
                $("#new_password").attr("disabled","disabled")
                $("#password").attr("disabled","disabled")
              }
          }
      }); 

      };
    };

    $("#keyup_temp_password").click(function(){
        $("#temp_password").attr('type','text');
    }).mouseup(function(){
        $("#temp_password").attr('type','password');
        $("#keyup_temp_password").removeClass('fa-eye-slash');
        $("#keyup_temp_password").addClass('fa-eye');
    }).mouseout(function(){
        $("#temp_password").attr('type','password');
        $("#keyup_temp_password").addClass('fa-eye-slash');
        $("#keyup_temp_password").removeClass('fa-eye');
    });

    $("#keyup_new_password").click(function(){
        $("#new_password").attr('type','text');
    }).mouseup(function(){
        $("#new_password").attr('type','password');
        $("#keyup_new_password").removeClass('fa-eye-slash');
        $("#keyup_new_password").addClass('fa-eye');
    }).mouseout(function(){
        $("#new_password").attr('type','password');
        $("#keyup_new_password").addClass('fa-eye-slash');
        $("#keyup_new_password").removeClass('fa-eye');
    });

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