
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
       <h3>Kesehatan <small>Laman Detail Data Kesehatan Pasien</small></h3>
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
                      <h2>Form <small>Detail Data</small></h2>
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
                    <form method="post" action="#" class="form-horizontal form-label-left" id="demo-form" data-parsley-validate novalidate>
                      <br>
                      <p>Form Data Pasien</a>
                      </p>
                     <hr/>


                      <?php 
                        $tgltemp= date_create($detail[0]['tgl']);
                        $tgl = date_format($tgltemp,'d-m-Y');
                      ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl">Tanggal <i>Checkup</i>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="tgl" data-date-format="DD-MM-YYYY" class="form-control" name="tgl" value="<?php echo $tgl;?>" readonly />
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK Pasien
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nik" class="form-control col-md-7 col-xs-12" name="nik" placeholder="Masukan NIK Pasien" type="text" value="<?php echo isset($detail[0]['nik'])?$detail[0]['nik']:'';?>" readonly >
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pasien">Nama Pasien
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_pasien" class="form-control col-md-7 col-xs-12" name="nama_pasien" placeholder="Get Nama Pasien" type="text" value="<?php echo isset($detail[0]['nama_pasien'])?$detail[0]['nama_pasien']:'';?>" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk">Jenis Kelamin
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="jk" class="form-control col-md-7 col-xs-12" name="jk" placeholder="Get Nama Pasien" type="text" value="<?php echo isset($detail[0]['jk'])?$detail[0]['jk']:'';?>" readonly>
                        </div>
                      </div>

                      <?php 
                        $tgltemp2= date_create($detail[0]['tgllahir']);
                        $tgl2 = date_format($tgltemp2,'d-m-Y');
                      ?>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgllahir">Tanggal Lahir
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tgllahir" class="form-control col-md-7 col-xs-12" name="tgllahir" placeholder="Get Nama Pasien" type="text" value="<?php echo $tgl2;?>" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="umur">Umur Pasien
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="umur" class="form-control col-md-7 col-xs-12" name="umur" placeholder="Get Umur Pasien" type="text" value="<?php echo isset($detail[0]['umur'])?$detail[0]['umur']:'';?> bulan/tahun" readonly>
                        </div>
                      </div>

                      <?php
                        $str = strtolower($detail[0]['kabupaten']);
                        $str2= ucwords($str);
                        $alamat = 'Blok/Dusun '.$detail[0]['blok'].' RT/RW '.$detail[0]['rtrw'].' Desa '.$detail[0]['kelurahan'].' Kec. '.$detail[0]['kecamatan']. ' '.$str2. ' Prov. '.$detail[0]['provinsi'];
                      ?>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="alamat" class="form-control col-md-7 col-xs-12" name="alamat" placeholder="Simpulan dari hasil pendeteksian" type="text" readonly=""><?php echo $alamat;?></textarea>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="notelp">Nomor Telepon
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="notelp" class="form-control col-md-7 col-xs-12" name="notelp" placeholder="Get Nomor Pasien" type="text" value="<?php echo isset($detail[0]['notelp'])?$detail[0]['notelp']:'';?>" readonly>
                        </div>
                      </div>




                      <br>
                      <p>Form data Kesehatan</a>
                      </p>
                     <hr/>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinggi">Tinggi Badan
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="tinggi" class="form-control col-md-7 col-xs-12" name="tinggi" placeholder="Tinggi Pasien" type="text" value="<?php echo isset($detail[0]['tinggi_badan'])?$detail[0]['tinggi_badan']:'';?> Cm" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="keterangan" class="form-control col-md-7 col-xs-12" name="keterangan" placeholder="Simpulan dari hasil pendeteksian" type="text" readonly=""><?php echo ucwords(isset($detail[0]['keterangan'])?$detail[0]['keterangan']:'');?></textarea>
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
