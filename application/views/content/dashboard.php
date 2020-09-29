<?php
if($this->session->flashdata('login_berhasil')==TRUE){
?>
<body onload="new PNotify({

    title:'Login Berhasil',

    type: 'success',

    text: '<?php echo $this->session->flashdata('login_berhasil'); ?>',

    nonblock: {

        nonblock: true

    },

    styling: 'bootstrap3',

    addclass: 'dark'

});">

</body>

<?php     
}

$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];
?>

<div class="right_col" role="main">
  <div class="x_panel">
    <div class="x_title">
      <h2>Dashboard</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"></i></a></li>
        <li><a class="collapse-link"></i></a></li>
        <li><a class="collapse-link"></i></a></li>
        <li></li>
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <h4>Selamat Datang di Sistem Pencatatan Kesehatan</h4>
      <br/>
      <p align=center>Hai <b><?php echo ucwords($session['level']);?></b>, selamat datang di halaman Dashboard SICAKET. 
        <br/>Silahkan klik menu untuk mengelola sistem Aplikasi Ini. <br /> <b><?php echo $hari_ini;?>, <?php echo date('d-m-Y');?></b>
      </p>
    </div>
  </div>

<?php if($session['level']=='admin'){?>
  <div class="row top_tiles">
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <div class="count"><?php echo @$jml_pasien;?></div>
          <h3>Pasien</h3>
      </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-stethoscope"></i></div>
        <div class="count"><?php echo @$jml_kesehatan; ?></div>
        <h3>Kesehatan</h3>
      </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-child"></i></div>
        <div class="count"><?php echo @$jml_stunting; ?></div>
        <h3>Stunting</h3>
      </div>
    </div>
  </div>

<?php } ?>


</div>
