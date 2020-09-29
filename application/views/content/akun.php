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
}elseif($this->session->flashdata('ubah_level_sukses') == TRUE){
?>
<body onload="new PNotify({
                                  title:'Delete Berhasil',
                                  type: 'success',
                                  text: '<?php echo $this->session->flashdata('ubah_level_sukses');?>',
                                  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3',
                                  addclass: 'dark'
                              });">
</body>
<?php
}elseif($this->session->flashdata('ubah_level_gagal') == TRUE){
?>
<body onload="new PNotify({
                                  title:'Delete Gagal',
                                  type: 'error',
                                  text: '<?php echo $this->session->flashdata('ubah_level_gagal');?>',
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
        <h3>Akun <small>Laman Data Akun</small></h3>
      </div>
    </div>  
<!--Content-->
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
                  <div class="x_title">
                      <h2><small><span class="fa fa-database"></span> Data Akun</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <!-- <li><a class="collapse-link"></i></a></li>
                        <li><a class="collapse-link"></i></a></li>
                        <li><a class="collapse-link"></i></a></li> -->
                        <li>
                          <a href=""></a>
                        </li>
                        <li>
                          <a href=""></a>
                        </li>
                        <li>
                          <a href=""></a>
                        </li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
                  
    <div class="x_content"> 
      <form action="<?php echo site_url('c_pasien/delete');?>" method="post" id="form-detele">
    <div class='table-responsive'>
    <?php
        $id="id='datatable-responsive'";
    ?>
    <?php
        if(empty($akun)){
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
                          <th>No</th>
                          <th>Email</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Level User</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                  //jika data Staff tidak kosong maka jalankan perintah dibawah ini
                  if(!empty($akun))
                  {
                    $no=1;
                    foreach ($akun as $data)
                    {
                     
                  ?>  
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['nik']; ?></td>
                        <td><?php echo $data['nama_pasien']; ?></td>
                        <td><?php echo ucwords($data['level']); ?></td>
                        <td class='center' width='120'>
                        
                        <?php if($data['level'] == 'admin'){ ?>
                        <a>
                          <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_ubah_pasien<?php echo $data['nik']; ?>" data-placement="top" title="Reset Password"><i class="fa fa-edit"></i> Ubah ke Pasien</button>
                        </a>
                        <?php }else{ ?>
                        <a>
                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_ubah_admin<?php echo $data['nik']; ?>" data-placement="top" title="Reset Password"><i class="fa fa-edit"></i> Ubah ke Admin</button>
                        </a>
                        <?php } ?>

                        <a>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_reset<?php echo $data['nik']; ?>" data-placement="top" title="Reset Password"><i class="fa fa-refresh"></i> Reset Password</button>
                        </a>


                        </td>
                    </tr>

                <!-- Modal Reset Password -->
                    <div class="modal fade" id="modal_reset<?php echo $data['nik']; ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">Konfirmasi Reset Password</h4>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan klik tombol <strong> Reset </strong> untuk mereset password akun</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-backward"></i> Kembali</button>
                            <a href="<?php echo site_url()."c_akun/reset_pass/".$data['nik'];?>" class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i> Reset</a>
                          </div>

                        </div>
                      </div>
                    </div>

                    <!-- Modal Ubah ke pasien -->
                    <div class="modal fade" id="modal_ubah_pasien<?php echo $data['nik']; ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">Konfirmasi Ubah Level User</h4>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan klik tombol <strong> Ubah </strong> untuk mengubah Level User menjadi <b> Pasien </b></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-backward"></i> Kembali</button>
                            <a href="<?php echo site_url()."c_akun/change_level/".$data['nik']."/pasien";?>" class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i> Ubah</a>
                          </div>

                        </div>
                      </div>
                    </div>

                  <!-- Modal Ubah ke admin -->
                    <div class="modal fade" id="modal_ubah_admin<?php echo $data['nik']; ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">Konfirmasi Ubah Level User</h4>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan klik tombol <strong> Ubah </strong> untuk mengubah Level User menjadi <b>Admin</b></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-backward"></i> Kembali</button>
                            <a href="<?php echo site_url()."c_akun/change_level/".$data['nik']."/admin";?>" class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i> Ubah</a>
                          </div>

                        </div>
                      </div>
                    </div>
                

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
</div>
