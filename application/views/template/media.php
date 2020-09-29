<!DOCTYPE html>
<html lang="en">
  <head>
<?php $this->load->view('template/head'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url('c_dashboard'); ?>" class="site_title"><img src="<?php echo base_url('build/images/Artboard 10(2).png'); ?>" alt="logo2"> </a>
            </div>

            <div class="clearfix"></div>
            <?php $this->load->view('template/user'); ?>

            <br />

            <?php $this->load->view('template/sidebar'); ?>
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="modal" data-target="#modal_logout" data-placement="top" title="Logout" href="<?php echo site_url('login/logout');?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          


          </div>
        </div>

        <?php $this->load->view('template/topnav'); ?>

        <?php $this->load->view('content/'.$tampilan); ?>

        <?php $this->load->view('template/footer'); ?>
      </div>
    </div>

  <?php $this->load->view('template/js'); ?>



<!--Modal Logout-->
<div class="modal fade" id="modal_logout" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Konfirmasi Logout Sistem</h4>
      </div>
      <div class="modal-body">
        <p>Silahkan klik tombol <strong> Logout </strong> untuk keluar dari sistem</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-backward"></i> Kembali</button>
        <a href="<?php echo site_url('c_login/logout'); ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Logout</a>
      </div>

    </div>
  </div>
</div>
<!--/Modal-->


  </body>
</html>
