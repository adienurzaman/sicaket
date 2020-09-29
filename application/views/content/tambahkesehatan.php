
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
       <h3>Kesehatan <small>Laman Tambah Data Kesehatan Pasien</small></h3>
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
                    <form method="post" action="<?php echo site_url('c_kesehatan/simpan');?>" class="form-horizontal form-label-left" id="demo-form" data-parsley-validate novalidate>
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

                      <input id="id_kondisi" class="form-control" name="id_kondisi" type="hidden">

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

                     <input id="id_temp" class="form-control col-md-7 col-xs-12" name="id_temp" type="hidden">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="berat">Berat
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="berat" class="form-control col-md-7 col-xs-12" name="berat" placeholder="Masukan NIK terlebih dahulu" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinggi">Tinggi
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tinggi" class="form-control col-md-7 col-xs-12" name="tinggi" placeholder="Masukan NIK terlebih dahulu" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="suhu">Suhu Badan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="suhu" class="form-control col-md-7 col-xs-12" name="suhu" placeholder="Masukan NIK terlebih dahulu" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="detakjantung">Detak Jantung
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="detakjantung" class="form-control col-md-7 col-xs-12" name="detakjantung" placeholder="Masukan NIK terlebih dahulu" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="keterangan" class="form-control col-md-7 col-xs-12" name="keterangan" placeholder="Masukan NIK terlebih dahulu" type="text" required=""></textarea>
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
        get_kondisi();
        check_nik();
        check_temp();
    }, 400);

    function get_kondisi()
    {
      var id = "id_kondisi";
      $.ajax({
        type:'POST',
        url:"<?php echo site_url('c_ajax/get_data_kondisi'); ?>",
        data:{id_kondisi:id},
        success: function(data)
        { 
          // alert(data);
          $("#id_kondisi").val(data);
        }
      }); 
    }

    function check_nik(){
      var temp_nik = $("#nik").val();
      var id_kondisi = $("#id_kondisi").val();
      var len = temp_nik.length;
      if(len>0 && len<16 || len==""){

        $("#berat").attr("disabled","disabled");
        $("#tinggi").attr("disabled","disabled");
        $("#suhu").attr("disabled","disabled");
        $("#detakjantung").attr("disabled","disabled");
        $("#myDatepicker").attr("disabled","disabled");
        $("#simpan").attr("disabled","disabled");
        $("#nik_val").text("");
        $("#nama_pasien").val("");
        $("#jk").val("");
        $("#keterangan").html("");

        $.ajax({
            type:'POST',
            url:"<?php echo site_url('c_ajax/simpan_kondisi'); ?>",
            data:{id_kondisi:id_kondisi, status : 0},
            success: function(data)
            { 
            }
        }); 

      }else if(len>16 && len!=""){
        
        $("#nik_val").text("");
        $("#nik_val").text("Inputan anda melebihi jumlah Karakter NIK !");
        $("#berat").attr("disabled","disabled");
        $("#tinggi").attr("disabled","disabled");
        $("#suhu").attr("disabled","disabled");
        $("#detakjantung").attr("disabled","disabled");
        $("#myDatepicker").attr("disabled","disabled");
        $("#simpan").attr("disabled","disabled");
        $("#nama_pasien").val("");
        $("#jk").val("");
        $("#keterangan").html("");

        $.ajax({
            type:'POST',
            url:"<?php echo site_url('c_ajax/simpan_kondisi'); ?>",
            data:{id_kondisi:id_kondisi, status : 0},
            success: function(data)
            { 
            }
        }); 


      }else{
        id_kondisi = 1;
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
                  $("#berat").attr('readonly',"true");
                  $("#tinggi").attr('readonly',"true");
                  $("#suhu").attr('readonly',"true");
                  $("#detakjantung").attr('readonly',"true");
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

        $.ajax({
              type:'POST',
              url:"<?php echo site_url('c_ajax/simpan_kondisi'); ?>",
              data:{id_kondisi:id_kondisi, status : 1},
              success: function(data)
              { 
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
              }

              if(status != "Tidak ada data pada database" && nama != ""){
                $("#id_temp").val(res[0]);
                $("#berat").val(res[1]);
                $("#tinggi").val(res[2]);
                $("#suhu").val(res[3]);
                $("#detakjantung").val(res[4]);

                if(jk=='L'){
                  var berat = $("#berat").val();
                  var tinggi = $("#tinggi").val();
                  var suhu = $("#suhu").val();
                  var ideal = ((tinggi - 100) - (tinggi - 100) * 10/100);
                  var suhuBadan;
                  if(suhu >=36 && suhu<=37.2){
                    var suhuBadan = "Suhu Badan Normal";
                  }else if(suhu<36){
                    var suhuBadan = "Suhu Badan Rendah";
                  }else{
                    var suhuBadan = "Suhu Badan Tinggi";
                  }
                  $("#keterangan").html("Berat Badan Ideal : "+ideal+" Kg. \n"+suhuBadan);
                }else if(jk=='P'){
                  var berat = $("#berat").val();
                  var tinggi = $("#tinggi").val();
                  var suhu = $("#suhu").val();
                  var ideal = ((tinggi - 100) - (tinggi - 100) * 15/100);
                  var suhuBadan;
                  if(suhu >=36 && suhu<=37.2){
                    var suhuBadan = "Suhu Badan Normal";
                  }else if(suhu<36){
                    var suhuBadan = "Suhu Badan Rendah";
                  }else{
                    var suhuBadan = "Suhu Badan Tinggi";
                  }
                  $("#keterangan").html("Berat Badan Ideal : "+ideal+" Kg. \n"+suhuBadan);
                }else{
                  $("#keterangan").html("");
                }
              }else if(status != "Tidak ada data pada database" && nama == ""){
                $("#berat").val("");
                $("#tinggi").val("");
                $("#suhu").val("");
                $("#detakjantung").val("");
              }else{
                $("#berat").val(status);
                $("#tinggi").val(status);
                $("#suhu").val(status);
                $("#detakjantung").val(status);
              }
          }
      }); 

    };

});
</script>

