<!DOCTYPE html>

<html class="" lang="en">

<head>
    <meta charset="utf-8">

    <title>AAPDO</title>
    <meta name="description" content="Aplikasi Administrasi Pindah Datang Online"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <link href="../libs/assets/animate.css/animate.css" rel="stylesheet" type="text/css">
    <link href="../libs/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../libs/assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="../libs/jquery/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/font.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <?php
        include( "statistics_lib.php");
        $token = "none";
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
        }
    ?>

</head>

<body>
    <div class="app app-header-fixed">
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
            <li>
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
            <li class="active">
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


        <div class="app-content" id="content" role="main">
            <div class="hbox hbox-auto-xs hbox-auto-sm ng-scope">
                <div class="app-content-body">
                    <div class="bg-light lter">
                        <ul class="breadcrumb bg-grey-breadcrumb m-b-none">
                            <li>
                                <a class="btn no-shadow" href="#" target=".app"><i class="icon-bdg_expand1 text"></i>
                                <i class=
                                "icon-bdg_expand2 text-active"></i></a>
                            </li>


                            <li>
                                <a href="">Home</a>
                            </li>


                            <li class="active"><i class="fa fa-angle-right"></i>Statistik</li>
                        </ul>
                    </div>


                    <div class="bg-light b-b wrapper-md padder-md">
                        <h1 class="m-n font-bold h4 padder">Statistik Kepindahan Bandung</h1>
                    </div>

                    <div class="wrapper-lg bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading font-semibold">Kepindahan Penduduk di Bandung</div>
                                    <div class="panel-body">
                                        <form role="form" action="" method="post">
                                            <div class="form-group">
                                                <label>Tanggal mulai</label>
                                                <input type="text" class="form-control" name="start">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal akhir</label>
                                                <input type="text" class="form-control" name="end">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading font-semibold">Kepindahan Penduduk di Bandung</div>
                                    <div class="panel-body no-padder">
                                        <div class="col-xs-8">
                                            <div class="wrapper text-center">
                                                <?php
                                                	$statistics = new statistics("localhost", "root", "", "kepindahan");
                                                	$statistics->getPieChart();
                                            	?>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 border-left">
                                            <div class="wrapper">
                                                <div class="text-xs">
                                                    <ul class="sparkline-info">
                                                        <li class="mb20 text-purple font-light"><i class="fa fa-circle text-purple"></i>Pindah Dalam Bandung</li>
                                                        <li class="mb20 text-warning font-light"><i class="fa fa-circle text-warning"></i>Pindah Datang ke Bandung</li>
                                                        <li class="mb20 text-success font-light"><i class="fa fa-circle text-success"></i>Pindah Keluar dari Bandung</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading font-semibold">Rincian Pindah Dalam Bandung</div>
                                    <div class="panel-body no-padder">
                                        <?php $statistics->getDalamData(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading font-semibold">Rincian Pindah Datang ke Bandung</div>
                                    <div class="panel-body no-padder">
                                        <?php $statistics->getDatangData(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading font-semibold">Rincian Pindah Keluar dari Bandung</div>
                                    <div class="panel-body no-padder">
                                        <?php $statistics->getKeluarData(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading font-semibold">Rincian Jumlah Kepindahan Masuk ke Bandung</div>
                                    <div class="panel-body no-padder">
                                        <?php $statistics->getDatangCount(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- App-content-body -->
            </div>
            <!-- end hbox hbox-auto-xs -->
        </div>
        <!-- footer -->


        <footer class="app-footer" id="footer" role="footer">
            <div class="wrapper-md padder-lg b-t bg-light">
                <span class="pull-right">&copy; Copyright Bandung <a class=
                "m-l-sm text-muted" href=""><i class=
                "icon-bdg_arrow11"></i></a></span> Made with <i class="text-danger fa fa-heart"></i> in Bandung
            </div>
        </footer>
        <!-- / footer -->
    </div>
    <script src="../libs/jquery/jquery/dist/jquery.js">
    </script>
    <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js">
    </script>
    <script src="js/ui-load.js">
    </script>
    <script src="js/ui-jp.config.js">
    </script>
    <script src="js/ui-jp.js">
    </script>
    <script src="js/ui-nav.js">
    </script>
    <script src="js/ui-toggle.js">
    </script>
    <script src="js/ui-client.js">
    </script>
</body>

</html>