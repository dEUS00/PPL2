<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>AAPDO</title>
  <meta name="description" content="Aplikasi Administrasi Pindah Datang Online"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="../libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />

  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />

  <?php
    $token = "none";
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    }
  ?>

</head>
<body>
<div class="app app-header-fixed ">
  

  <!-- header -->
  <header class="app-header navbar" id="header" role="menu">
      <!-- navbar header -->

      <div class="navbar-header bg-info">
          <!-- brand -->
          <a class="navbar-brand text-lt" href="#!">AAPDO</a>
          <!-- / brand -->
      </div>
      <!-- / navbar header -->
      <!-- navbar collapse -->


      <div class="collapse pos-rlt navbar-collapse bg-info">
          <!-- buttons -->
          <?php
            include("user.php");
            $user = new user();
            $user->getUsername($token);
          ?>

          <div class="nav navbar-nav hidden-xs">
          </div>
          <!-- / buttons -->
          <!-- link and dropdown -->


          <ul class="nav navbar-nav hidden-sm">
          </ul>

      </div>
      <!-- / navbar collapse -->
  </header>
  <!-- / header -->


    <!-- aside -->
  <aside id="aside" class="app-aside hidden-xs bg-dark">
      <div class="aside-wrap">
        <div class="navi-wrap">          

         <!-- nav -->
         <nav ui-nav class="navi clearfix">
            <ul class="nav">
                <li class="hidden-folded m-t text-dark-grey text-xs padder-md padder-v-sm">
                    <span>Navigation</span>
                </li>
                <li>
                    <?php echo "<a href=\"index.php?token=" . $token . "\" class=\"text-dark-grey\">" ?>
                        <i class="icon-bdg_dashboard icon-grey"></i>
                        <span class="font-bold">Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#" class="text-dark-grey">
                        <i class="icon-bdg_form"></i>
                        <span class="font-bold">Pindah Alamat</span>
                    </a>

                    <ul class="nav nav-sub dk">
                        <li class="nav-sub-header">
                            <a href>
                                <span>Pindah Alamat</span>
                            </a>
                        </li>
                        <li>
                            <?php echo "<a href=\"formKepindahanDatang.php?token=" . $token . "\">" ?>
                                <span>Datang</span>
                            </a>
                        </li>
                        <li>
                            <?php echo "<a href=\"formKepindahanKeluar.php?token=" . $token . "\">" ?>
                                <span>Keluar</span>
                            </a>
                        </li>
                        <li>
                            <?php echo "<a href=\"formKepindahanDalam.php?token=" . $token . "\">" ?>
                                <span>Dalam Kota</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li>
                    <?php echo "<a href=\"verifikasiKepindahan.php?token=" . $token . "\">" ?>
                        <i class="icon-bdg_table"></i>
                        <span class="font-bold">Verifikasi</span>
                    </a>
                </li>
                <li>
                    <?php echo "<a href=\"statistics.php?token=" . $token . "\" class=\"text-dark-grey\">" ?>
                        <i class="glyphicon glyphicon-stats"></i>
                        <span class="font-bold">Statistik</span>
                    </a>
                </li>
                <li>
                    <?php echo "<a href=\"tampilan_print.php?token=" . $token . "\" class=\"text-dark-grey\">" ?>
                        <i class="icon-bdg_uikit"></i>
                        <span class="font-bold">Print</span>
                    </a>
                </li>

            </ul>
        </nav>
         <!-- nav -->

        </div>
      </div>
  </aside>
  <!-- / aside -->

<!-- content -->
<div id="content" class="app-content" role="main">

  <div class="hbox hbox-auto-xs hbox-auto-sm ng-scope">
      <div class="col">

          <div class="bg-light lter">    
              <ul class="breadcrumb bg-grey-breadcrumb m-b-none">
                <li><a href="#" class="btn no-shadow" ui-toggle-class="app-aside-folded" target=".app">
                   <i class="icon-bdg_expand1 text"></i>
                  <i class="icon-bdg_expand2 text-active"></i>
                </a>   </li>
                <li><a href>Home</a></li>
                <li class="active"><i class="fa fa-angle-right"></i>Pindah Alamat</li>
              </ul>
          </div>

          <div class="bg-light lter b-b wrapper-md padder-md">
            <h1 class="m-n font-bold h4 padder">Pindah Alamat dalam Kota</h1>
          </div>      
      <!-- App-content-body --> 

  <div class="wrapper-lg bg-light" ng-controller="FormDemoCtrl">
    <div class="row">

        <div class="panel panel-default">
          <div class="panel-heading font-bold">Form Kepindahan dalam Kota</div>
          <div class="panel-body">
            <form role="form" class="bs-example form-horizontal" action="kepindahan.php?token=<?php echo $token; ?>" method="post">

              <div class="form-group">
                <label class="col-lg-2 control-label">NIK</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="nik" placeholder="NIK">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label">Nomor Kartu Keluarga</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="no_kk" placeholder="Nomor Kartu Keluarga">
                </div>
              </div>

              <div class="panel-heading font-bold">Asal</div>

              <div class="form-group">
                <label class="col-lg-2 control-label">Kecamatan</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="kec_asal" placeholder="Kecamatan Asal">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label">Kelurahan</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="kel_asal" placeholder="Kelurahan Asal">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label">RW</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="rw_asal" placeholder="RW Asal">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label">RT</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="rt_asal" placeholder="RT Asal">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label">Alamat</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="alamat_asal" placeholder="Alamat Asal">
                </div>
              </div>

              <div class="panel-heading font-bold">Tujuan</div>

              <div class="form-group">
                <label class="col-lg-2 control-label">Kecamatan</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="kec_tujuan" placeholder="Kecamatan Tujuan">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label">Kelurahan</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="kel_tujuan" placeholder="Kelurahan Tujuan">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label">RW</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="rw_tujuan" placeholder="RW Tujuan">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label">RT</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="rt_tujuan" placeholder="RT Tujuan">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label">Alamat</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="alamat_tujuan" placeholder="Alamat Tujuan">
                </div>
              </div>

              <input type="hidden" name="kota_asal" value="Bandung">
              <input type="hidden" name="kota_tujuan" value="Bandung">
              <input type="hidden" name="type" value="dalam">
              <button type="submit" class="btn btn-sm btn-success">Kirim</button>
            </form>
          </div>
        </div>

    </div>
  </div>


 <!-- footer -->
  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper-md padder-lg b-t bg-light">
      <span class="pull-right">&copy; Copyright Bandung <a href ui-scroll="app" class="m-l-sm text-muted"><i class="icon-bdg_arrow11"></i></a></span>
     Made with <i class="text-danger fa fa-heart"></i> in Bandung
    </div>
  </footer>
  <!-- / footer -->



</div>

<script src="../libs/jquery/jquery/dist/jquery.js"></script>
<script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>
<script src="js/ui-client.js"></script>

</body>
</html>
