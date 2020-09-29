
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
       <h3>Pasien <small>Laman Ubah Data Pasien</small></h3>
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
                      <h2>Form <small>Ubah Data</small></h2>
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
                    <form method="post" action="<?php echo site_url('c_pasien/prosesubah');?>" class="form-horizontal form-label-left" id="form_ubah" data-parsley-validate novalidate>

                      <p>Form ini untuk mengubah data Pasien</a>
                      </p>
                     <hr/>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nik" class="form-control col-md-7 col-xs-12" name="nik" placeholder="Masukan NIK" type="text" value="<?php echo isset($pasien[0]['nik'])?$pasien[0]['nik']:'';?>" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pasien">Nama Pasien
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nidn" class="form-control col-md-7 col-xs-12" name="nama_pasien" placeholder="Masukan Nama Pasien" type="text" required="required" value="<?php echo isset($pasien[0]['nama_pasien'])?$pasien[0]['nama_pasien']:'';?>">
                        </div>
                      </div>

                      <?php 
                        $tgl = date_create($pasien[0]['tgllahir']);
                        $tgllahir = date_format($tgl,'d-m-Y');
                      ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgllahir">Tanggal Lahir
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="myDatepicker" data-date-format="DD-MM-YYYY" class="form-control" name="tgllahir" required="" placeholder="DD-MM-YYYY" value="<?php echo $tgllahir;?>" />
                        </div>
                      </div>

                      <?php 
                      if ($pasien[0]['jk']=='L')
                      {
                        $jk= 'Laki-laki';
                      }
                      else 
                        { $jk= 'Perempuan'; 
                        }
                        ?>
                      <div class='item form-group'>
                      <label class='control-label col-md-3 col-sm-3 col-xs-12'>Jenis Kelamin </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <SELECT  name="jk" class="form-control">
                            <OPTION value="<?php echo isset($pasien[0]['jk'])?$pasien[0]['jk']:'';?>"><?php echo $jk; ?></OPTION>
                            <OPTION>----Pilih Jenis Kelamin----</OPTION>
                            <OPTION value="L">Laki-laki</OPTION>
                            <OPTION value="P">Perempuan</OPTION>
                          </SELECT>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blok">Blok/Dusun
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="blok" class="form-control col-md-7 col-xs-12" name="blok" type="text" value="<?php echo isset($pasien[0]['blok'])?$pasien[0]['blok']:'';?>">
                        </div>
                      </div>

                      <?php 
                        $rtrw = explode('/',$pasien[0]['rtrw']);
                      ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rtrw">RT/RW
                        </label>
                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <input id="rt" class="form-control col-md-7 col-xs-12" name="rt" type="text" placeholder="RT" required="" value="<?php echo $rtrw[0] ?>">
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <input id="rw" class="form-control col-md-7 col-xs-12" name="rw" type="text" placeholder="RW" required="" value="<?php echo $rtrw[1] ?>">
                        </div>
                      </div>

                      <div class='item form-group'>
                      <label class='control-label col-md-3 col-sm-3 col-xs-12'>Provinsi </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <SELECT  name="provinsi" onChange="loadKabupaten()" class="form-control" id="provinsi">
                            <OPTION value="<?php echo isset($pasien[0]['id_prov'])?$pasien[0]['id_prov']:'';?>"><?php echo isset($pasien[0]['provinsi'])?$pasien[0]['provinsi']:'';?></OPTION>
                            <OPTION>----Pilih Kembali Provinsi----</OPTION>
                            <?php foreach ($provinsi as $data) {
                            ?>
                            <OPTION value="<?php echo $data['id_prov']; ?>"><?php echo $data['nama']; ?></OPTION>
                          <?php } ?>
                          </SELECT>
                        </div>
                      </div>
                    
                      <?php 
                        $str = strtolower($pasien[0]['kabupaten']);
                        $str2 = ucwords($str);
                       ?>
                      <div class='item form-group hideElement' id="kabupatenUbah">
                      <label class='control-label col-md-3 col-sm-3 col-xs-12'>Kabupaten </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <SELECT  name="kabupaten" class="form-control" readonly>
                            <OPTION value="<?php echo isset($pasien[0]['id_kab'])?$pasien[0]['id_kab']:'';?>"><?php echo $str2;?></OPTION>
                          </SELECT>
                        </div>
                      </div>

                      <div class='item form-group hideElement' id="kecamatanUbah">
                      <label class='control-label col-md-3 col-sm-3 col-xs-12'>Kecamatan </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <SELECT  name="kecamatan" class="form-control" readonly>
                            <OPTION value="<?php echo isset($pasien[0]['id_kec'])?$pasien[0]['id_kec']:'';?>"><?php echo isset($pasien[0]['kecamatan'])?$pasien[0]['kecamatan']:'';?></OPTION>
                          </SELECT>
                        </div>
                      </div>

                      <div class='item form-group hideElement' id="kelurahanUbah">
                      <label class='control-label col-md-3 col-sm-3 col-xs-12'>Kelurahan </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <SELECT  name="kelurahan" class="form-control" readonly>
                            <OPTION value="<?php echo isset($pasien[0]['id_kel'])?$pasien[0]['id_kel']:'';?>"><?php echo isset($pasien[0]['kelurahan'])?$pasien[0]['kelurahan']:'';?></OPTION>
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
                          <input id="rtrw" class="form-control col-md-7 col-xs-12" name="notelp" type="text" value="<?php echo isset($pasien[0]['notelp'])?$pasien[0]['notelp']:'';?>">
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
  $(document).ready(function() {
      $("#kabupatenUbah").removeClass("hideElement");
      $("#kecamatanUbah").removeClass("hideElement");
      $("#kelurahanUbah").removeClass("hideElement");
    });
      // debugger;
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#provinsi").change(function(){
      var id="<?php echo $pasien[0]['provinsi']; ?>";
      var value = $('#provinsi').val();
      if (value==id){
       $("#kabupatenUbah").show();
       $("#kecamatanUbah").show();
       $("#kelurahanUbah").show();
      }
      else{
       $("#kabupatenUbah").hide();
       $("#kecamatanUbah").hide();
       $("#kelurahanUbah").hide();
      }
    });



    $("#reset").click(function(){
      $("#kabupatenUbah").show();
      $("#kecamatanUbah").show();
      $("#kelurahanUbah").show();

      $("#kab").addClass("hideElement");
      $("#kec").addClass("hideElement");
      $("#kel").addClass("hideElement");

      $('#form_ubah').trigger('reset');
    });

    });
</script>

<script type="text/javascript">
  $(function(){
    $('#myDatepicker').datetimepicker();
  });
</script>