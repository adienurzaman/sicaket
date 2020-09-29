<?php
if($this->session->flashdata('simpan_berhasil') == TRUE){
?>
<body onload="new PNotify({
                                  title:'Data Berhasil ditambahkan',
                                  type: 'success',
                                  text: '<?php echo $this->session->flashdata('simpan_berhasil');?>',
                                  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3',
                                  addclass: 'dark'
                              });">
</body>
<?php
}elseif($this->session->flashdata('simpan_gagal') == TRUE){
?>
<body onload="new PNotify({
                                  title:'Data Gagal ditambahkan',
                                  type: 'error',
                                  text: '<?php echo $this->session->flashdata('simpan_gagal');?>',
                                  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3',
                                  addclass: 'dark'
                              });">
</body>
<?php
}elseif($this->session->flashdata('edit_berhasil') == TRUE){
?>
<body onload="new PNotify({
                                  title:'Data Berhasil diperbaharui',
                                  type: 'success',
                                  text: '<?php echo $this->session->flashdata('edit_berhasil');?>',
                                  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3',
                                  addclass: 'dark'
                              });">
</body>
<?php
}elseif($this->session->flashdata('edit_gagal') == TRUE){
?>
<body onload="new PNotify({
                                  title:'Data Gagal diperbaharui',
                                  type: 'error',
                                  text: '<?php echo $this->session->flashdata('edit_gagal');?>',
                                  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3',
                                  addclass: 'dark'
                              });">
</body>
<?php
}elseif($this->session->flashdata('hapus_berhasil') == TRUE){
?>
<body onload="new PNotify({
                                  title:'Delete Berhasil',
                                  type: 'success',
                                  text: '<?php echo $this->session->flashdata('hapus_berhasil');?>',
                                  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3',
                                  addclass: 'dark'
                              });">
</body>
<?php
}elseif($this->session->flashdata('hapus_gagal') == TRUE){
?>
<body onload="new PNotify({
                                  title:'Delete Gagal',
                                  type: 'error',
                                  text: '<?php echo $this->session->flashdata('hapus_gagal');?>',
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
        <h3>Kesehatan <small>Laman Data Kesehatan Pasien</small></h3>
      </div>
    </div>  
<!--Content-->
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
                  <div class="x_title">
                      <h2><small><span class="fa fa-database"></span> Data Kesehatan Pasien</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <!-- <li><a class="collapse-link"></i></a></li>
                        <li><a class="collapse-link"></i></a></li>
                        <li><a class="collapse-link"></i></a></li> -->
                        <?php if($session['level']=='admin'){ ?>
                        <li>
                          <a href="<?php echo site_url('c_kesehatan/tambah'); ?>">
                            <button type="button" class="btn btn-sm btn-info" title="Tambah Data Pasien"><i class="glyphicon glyphicon-plus"></i> Tambah Data</button>
                            </a>
                        </li>
                        <?php 
                          if(!empty($kesehatan)){
                        ?>
                        <li>
                          <a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_terseleksi" data-placement="top" title="Hapus Data Pasien"><i class="glyphicon glyphicon-trash"></i> Hapus Data Terseleksi</button>
                          </a>
                        </li>
                        <?php }else{ ?>
                        <li>
                          <a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_terseleksi" data-placement="top" title="Hapus Data Pasien" disabled><i class="glyphicon glyphicon-trash"></i> Hapus Data Terseleksi</button>
                          </a>
                        </li>
                        <?php 
                          }
                        }else{ 
                        ?>
                        <li>
                          <a></a>
                        </li>
                        <li>
                          <a></a>
                        </li>
                        <li>
                          <a></a>
                        </li>
                        <?php } ?>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
                  
    <div class="x_content"> 
      <form action="<?php echo site_url('c_kesehatan/delete');?>" method="post" id="form-detele">
    <div class='table-responsive'>
    <?php
        $id="id='datatable-responsive'";
    ?>
    <?php
        if(empty($kesehatan)){
        ?>
        <table class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <?php
        }else{
        ?>
       <table <?php echo $id;?> class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <?php 
        }
        ?>
                      <thead>
                        <tr>
                          <?php if($session['level']=='admin'){ ?>
                          <th><input type="checkbox" id="check-all"></th>
                          <?php } ?>
                          <th>No</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Tanggal <i>Checkup</i></th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                  //jika data Staff tidak kosong maka jalankan perintah dibawah ini
                  if(!empty($kesehatan))
                  {
                    $no=1;
                    foreach ($kesehatan as $data)
                    {
                      $nik = $data['nik'];
                      $nama_pasien = $data['nama_pasien'];
                      $temp_tgl = date_create($data['tgl']);
                      $tgl = date_format($temp_tgl, 'd-m-Y');

                      $id_hasil = $data['id_hasil'];
                      $id_temp = $data['id_temp'];

                     
                  ?>  
                    <tr>
                        <?php if($session['level']=='admin'){ ?>
                        <td><input type='checkbox' id='check' class='check-item' name='id_hasil[]' value="<?php echo $id_hasil;?>"></td>
                        <?php } ?>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $nik; ?></td>
                        <td><?php echo $nama_pasien; ?></td>
                        <td><?php echo $tgl; ?></td>
                        <td class='center' width='159'>

                      <?php if($session['level']=='admin'){ ?>

                        <a class="btn btn-sm btn-warning" href="<?php echo site_url()."c_kesehatan/detail_kesehatan/".$data['id_hasil'];?>" title="Edit Data Pasien"><i class="glyphicon glyphicon-edit"></i> Detail Kesehatan</a>

                        <a>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $data['id_hasil']; ?>" data-placement="top" title="Hapus Data Pasien"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                        </a>

                      <?php }else{?>

                        <a class="btn btn-sm btn-warning" href="<?php echo site_url()."c_kesehatan/detail_kesehatan/".$data['id_hasil'];?>" title="Edit Data Pasien"><i class="glyphicon glyphicon-edit"></i> Detail Kesehatan</a>

                        <a>

                      <?php }?>

                        </td>
                    </tr>


                        <!-- Modal Detele Data -->
                  <div class="modal fade" id="modal_delete<?php echo $data['id_hasil']; ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="true">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel2">Konfirmasi Hapus Data</h4>
                            </div>
                            <div class="modal-body">
                              <p>Silahkan klik tombol <strong> Hapus </strong> untuk menghapus data</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-backward"></i> Kembali</button>
                              <a href="<?php echo site_url()."c_kesehatan/hapus/".$data['id_hasil'];?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                            </div>

                          </div>
                        </div>
                  </div>

                <!-- Modal Detele Data -->

                        <?php
                        $no++;
                        }
                  }else{
             ?>
            <table>
                    <tr>
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-close"></i> Belum terdapat data apapun pada database.
                      </div>
                    </tr>
                  </table>
                  <?php
                  }
                  ?>
                  
                        <script type="text/javascript">
                          function ConfirmDialog() {
                            var x=confirm("Yakin data ini akan anda Delete?")
                            if (x) {
                              return true;
                            } else {
                              return false;
                            }
                          }
                        </script>
                        <script type="text/javascript">
                           function ConfirmSelection() {
                              $("#form-detele").submit();
                          }
                        </script>


                      </tbody>
                    </table>
                  </form>
                        <script>
                        $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
                          $("#check-all").click(function(){ // Ketika user men-cek checkbox all
                            if($(this).is(":checked")) // Jika checkbox all diceklis
                              $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
                            else // Jika checkbox all tidak diceklis
                              $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
                          });
                          
                        });
                        </script>

        </div>
      </div>
      </div>
    </div>
  </div>

<?php if($session['level']=='pasien'){?>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
                  <div class="x_title">
                      <h2><small><span class="fa fa-database"></span> Data Stunting</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <!-- <li><a class="collapse-link"></i></a></li>
                        <li><a class="collapse-link"></i></a></li>
                        <li><a class="collapse-link"></i></a></li> -->
                        <?php if($session['level']=='admin'){ ?>
                        <li>
                          <a href="<?php echo site_url('c_kesehatan/tambah'); ?>">
                            <button type="button" class="btn btn-sm btn-info" title="Tambah Data Pasien"><i class="glyphicon glyphicon-plus"></i> Tambah Data</button>
                            </a>
                        </li>
                        <?php 
                          if(!empty($stunting)){
                        ?>
                        <li>
                          <a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_terseleksi" data-placement="top" title="Hapus Data Pasien"><i class="glyphicon glyphicon-trash"></i> Hapus Data Terseleksi</button>
                          </a>
                        </li>
                        <?php }else{ ?>
                        <li>
                          <a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_terseleksi" data-placement="top" title="Hapus Data Pasien" disabled><i class="glyphicon glyphicon-trash"></i> Hapus Data Terseleksi</button>
                          </a>
                        </li>
                        <?php 
                          }
                        }else{ 
                        ?>
                        <li>
                          <a></a>
                        </li>
                        <li>
                          <a></a>
                        </li>
                        <li>
                          <a></a>
                        </li>
                        <?php } ?>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
                  
    <div class="x_content"> 
      <form action="<?php echo site_url('c_kesehatan/delete');?>" method="post" id="form-detele">
    <div class='table-responsive'>
    <?php
        $id="id='datatable-responsive2'";
    ?>
    <?php
        if(empty($stunting)){
        ?>
        <table class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <?php
        }else{
        ?>
       <table <?php echo $id;?> class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <?php 
        }
        ?>
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Umur</th>
                          <th>Tanggal <i>Checkup</i></th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                  //jika data Staff tidak kosong maka jalankan perintah dibawah ini
                  if(!empty($stunting))
                  {
                    //load data Staff
                    $no=1;
                    foreach ($stunting as $data)
                    {
                      $nik = $data['nik'];
                      $nama_pasien = $data['nama_pasien'];
                      $umur = $data['umur'];
                      $temp_tgl = date_create($data['tgl']);
                      $tgl = date_format($temp_tgl, 'd-m-Y');

                      $temp_tgllahir = date_create($data['tgllahir']);
                      $tgllahir = date_format($temp_tgllahir, 'd-m-Y');

                      $id_stunting = $data['id_stunting'];

                     
                  ?>  
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $nik; ?></td>
                        <td><?php echo $nama_pasien; ?></td>
                        <td><?php echo $tgllahir; ?></td>
                        <td><?php echo $umur ." bln/thn"; ?></td>
                        <td><?php echo $tgl; ?></td>
                        <td class='center' width='129'>

                        <a class="btn btn-sm btn-warning" href="<?php echo site_url()."c_kesehatan/detail_stunting/".$data['id_stunting'];?>" title="Edit Data Pasien"><i class="glyphicon glyphicon-edit"></i> Detail Kesehatan</a>

                        </td>
                    </tr>
                        <?php
                        $no++;
                        }
                  }else{
             ?>
            <table>
                    <tr>
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-close"></i> Belum terdapat data apapun pada database.
                      </div>
                    </tr>
                  </table>
                  <?php
                  }
                  ?>
                  
                      </tbody>
                    </table>
                  </form>

        </div>
      </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>



<!-- Modal Detele Data Terseleksi-->
  <div class="modal fade" id="modal_delete_terseleksi" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Konfirmasi Hapus Data</h4>
            </div>
            <div class="modal-body">
              <p>Silahkan klik tombol <strong> Hapus </strong> untuk menghapus data yang terseleksi</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-backward"></i> Kembali</button>
              <a onclick="ConfirmSelection()" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
            </div>

          </div>
        </div>
  </div>

<!-- Modal Detele Data Terseleksi-->

          