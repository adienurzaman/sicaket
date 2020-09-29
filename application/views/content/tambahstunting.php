
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
       <h3>Stunting <small>Laman Tambah Data Stunting Pasien</small></h3>
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
                    <form method="post" action="<?php echo site_url('c_kesehatan/save_stunting');?>" class="form-horizontal form-label-left" id="demo-form" data-parsley-validate novalidate>
                      <br>
                      <p>Form ini untuk Cek NIK Pasien</a>
                      </p>
                     <hr/>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK Pasien
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nik" class="form-control col-md-7 col-xs-12" name="nik" placeholder="Masukan NIK Pasien" type="text" required="required">
                          <span class="text-warning" id="nik_val"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pasien">Nama Pasien
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_pasien" class="form-control col-md-7 col-xs-12" name="nama_pasien" placeholder="Get Nama Pasien" type="text" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk">Jenis Kelamin
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="jk" class="form-control col-md-7 col-xs-12" name="jk" placeholder="Get JK Pasien" type="text" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgllahir">Tanggal Lahir
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tgllahir" class="form-control col-md-7 col-xs-12" name="tgllahir" placeholder="Get Tanggal Lahir Pasien" type="text" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="umur">Umur Pasien
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="umur" class="form-control col-md-7 col-xs-12" name="umur" placeholder="Get Umur Pasien" type="text" readonly>
                          <span class="text-info" id="info"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl">Tanggal <i>Checkup</i>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="myDatepicker" data-date-format="DD-MM-YYYY" class="form-control" name="tgl" required="" placeholder="DD-MM-YYYY" />
                        </div>
                      </div>

                      <br>
                      <p>Form get data sensor</a>
                      </p>
                     <hr/>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinggi">Tinggi Badan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tinggi" class="form-control col-md-7 col-xs-12" name="tinggi_badan" placeholder="Masukan NIK terlebih dahulu" type="text" readonly="">
                          <span class="text-info" id="info_ukuran"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="keterangan" class="form-control col-md-7 col-xs-12" name="keterangan" placeholder="Masukan NIK terlebih dahulu" type="text" required=""></textarea>
                          <span class="text-info" id="info_keterangan"></span>
                        </div>
                      </div>
                                  

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">                        
                          <button id="simpan" type="submit" class="btn btn-success submit"><span class="glyphicon glyphicon-ok-circle"></span> Simpan</button>|
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
    $('#myDatepicker').datetimepicker();
    setInterval(function () {
        check_nik();
        get_umur();
        check_temp();
    }, 500);

    function check_nik(){
      var temp_nik = $("#nik").val();
      var len = temp_nik.length;
      if(len>0 && len<16 || len==""){
        $("#myDatepicker").attr("disabled","disabled");
        $("#simpan").attr("disabled","disabled");
        $("#nik_val").text("");
        $("#nama_pasien").val("");
        $("#jk").val("");
        $("#tgllahir").val("");
        $("#keterangan").html("");
      }else if(len>16 && len!=""){
        $("#nik_val").text("");
        $("#nik_val").text("Inputan anda melebihi jumlah Karakter NIK !");
        $("#myDatepicker").attr("disabled","disabled");
        $("#simpan").attr("disabled","disabled");
        $("#nama_pasien").val("");
        $("#jk").val("");
        $("#tgllahir").val("");
        $("#keterangan").html("");
      }else{
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('c_ajax/get_nama'); ?>",
            data:"nik=" + temp_nik,
            success: function(html)
            { 
                // $("#Area").html(html);
                var status = html;
                var str = status;
                var res = str.split("/");
                if(status != "Tidak ada data pada database"){
                  $("#nik_val").text("");
                  $("#nama_pasien").val(res[0]);
                  $("#jk").val(res[1]);
                  $("#tgllahir").val(res[2]);
                  $("#myDatepicker").removeAttr("disabled","disabled");
                  $("#simpan").removeAttr("disabled","disabled");
                }else{
                  $("#nama_pasien").val(status);
                  $("#jk").val(status);
                  $("#myDatepicker").attr("disabled","disabled");
                  $("#keterangan").html("");
                }
            }
        }); 

      };
    };

    function check_temp(){
      $.ajax({
          type:'POST',
          url:"<?php echo site_url('c_ajax/get_temp'); ?>",
          data:"id_temp=id_temp",
          success: function(html)
          { 
              // $("#Area").html(html);
              var status = html;
              var str = status;
              var res = str.split("/");
              var jk = $("#jk").val();
              var temp_nik = $("#nik").val();
              var nama = $("#nama_pasien").val();
              if(temp_nik == ""){
                $("#nama_pasien").val("");
                $("#jk").val("");
                $("#info_ukuran").text("");
                $("#info").text("");
              }

              if(status != "Tidak ada data pada database" && nama != ""){
                $("#id_temp").val(res[0]);
                $("#tinggi").val(res[2]);
                $("#info_ukuran").text("Cm (Centimeter)");

                if(jk=='L' || jk=='P'){
                  var umur = $("#umur").val();
                  var tinggi = $("#tinggi").val();
                  var ket;
                  if((umur == 3) && (tinggi >= 57) && (tinggi <= 61)){
                    ket = "Normal";
                  }else if((umur == 3) && (tinggi >= 55) && (tinggi < 57)){
                    ket = "Kurang";
                  }else if((umur == 3) && (tinggi < 55)){
                    ket = "Stunting";
                  }else if((umur == 3) && (tinggi > 61)){
                    ket = "Over";
                  }

                  if((umur == 4) && (tinggi >= 61) && (tinggi <= 63)){
                    ket = "Normal";
                  }else if((umur == 4) && (tinggi >= 58) && (tinggi < 61)){
                    ket = "Kurang";
                  }else if((umur == 4) && (tinggi < 58)){
                    ket = "Stunting"; 
                  }else if((umur == 4) && (tinggi > 63)){
                    ket = "Over";
                  }

                  if((umur == 5) && (tinggi >= 63) && (tinggi <= 66)){
                    ket = "Normal";
                  }else if((umur == 5) && (tinggi >= 60) && (tinggi < 63)){
                    ket = "Kurang";
                  }else if((umur == 5) && (tinggi < 60)){
                    ket = "Stunting";
                  }else if((umur == 5) && (tinggi > 66)){
                    ket = "Over";
                  }

                  if((umur == 6) && (tinggi >= 66) && (tinggi <= 68)){
                    ket = "Normal";
                  }else if((umur == 6) && (tinggi >= 61) && (tinggi < 66)){
                    ket = "Kurang";
                  }else if((umur == 6) && (tinggi < 61)){
                    ket = "Stunting";
                  }else if((umur == 6) && (tinggi > 68)){
                    ket = "Over";
                  }
                  $("#keterangan").html("Status Pertumbuhan : "+ket);

                  if(ket == undefined){
                    $("#info_keterangan").text("Tidak terdefinisi");
                    $("#keterangan").html("");
                    $("#keterangan").prop("placeholder","Umur tidak terdefinisikan. Cek Stunting (Bayi umur 3-6 bulan).");
                    $("#keterangan").prop("disabled",true);
                  }else{
                    $("#keterangan").html("Status Pertumbuhan : "+ket);
                    $("#keterangan").prop("disabled",false);
                    $("#info_keterangan").text("");
                  }
                }else{
                  $("#keterangan").html("");
                  $("#info_ukuran").text("");
                  $("#info").text("");
                }
              }else if(status != "Tidak ada data pada database" && nama == ""){
                $("#tinggi").val("");
                $("#info_ukuran").text("");
                $("#info").text("");
              }else{
                $("#tinggi").val("Tidak Ada Data");
                $("#info_ukuran").text("");
                $("#info").text("");
              }
          }
      }); 

    }

    function get_umur(){
      var tgl = $("#tgllahir").val();
      var trim = tgl.split("-");

      var tahunLahir = trim[0];
      var bulanLahir = trim[1];
      var tanggalLahir = trim[2];

      var tahunSekarang=<?php echo date('Y');?>;
      var bulanSekarang=<?php echo date('m');?>;
      var tanggalSekarang=<?php echo date('d');?>;

      var umur = tahunSekarang - tahunLahir;

      if(tgl==""){
        $("#umur").val("");
      }else if(bulanLahir >= bulanSekarang && tanggalLahir > tanggalSekarang){
        $("#umur").val(umur-1);
        $("#info").text(" Tahun");
        
      }else if(bulanLahir < bulanSekarang && tanggalLahir<=tanggalSekarang){
        $("#umur").val(umur);
        $("#info").text(" Tahun");
        
      }else{
        $("#umur").val(umur);
        $("#info").text(" Tahun");
        
      }

      if(umur == 0){
        umurBln = bulanSekarang - bulanLahir;
        $("#umur").val(umurBln);
        $("#info").text(" Bulan");
        
      }

    }

});
</script>

