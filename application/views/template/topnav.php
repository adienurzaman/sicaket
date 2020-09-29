 <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <b id="menu_toggle"><i class="fa fa-bars"></i></b>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo ucwords($session['nama_pasien']); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   <!--Dropdown Logout-->
                    <li><a data-toggle="modal" data-target="#modal_logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </ul>
                </li>

               
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

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