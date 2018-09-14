<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="../public/css/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="../public/css/admin/bower_components/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="../public/css/admin/bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="../public/css/admin/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../public/css/admin/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="../public/css/admin/bower_components/morris.js/morris.css">

  <link rel="stylesheet" href="../public/css/admin/bower_components/jvectormap/jquery-jvectormap.css">
 
  <link rel="stylesheet" href="../public/css/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="../public/css/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="../public/css/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <a href="admin" class="logo">

      <span class="logo-mini"><b>A</b>LT</span>

      <span class="logo-lg"><b>Admin</b></span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>




    </nav>
  </header>

  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="../public/css/admin/dist/img/admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>MUHAMMET EMİN DİLBER</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
        </div>
      </div>

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Arama">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menü</li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tablolar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="simple"><i class="fa fa-circle-o"></i> Giriş Bilgileri</a></li>
            <li><a href="data"><i class="fa fa-circle-o"></i> Kullanıcı Bilgileri</a></li>
            <li><a href="room"><i class="fa fa-circle-o"></i> Oda Bilgileri</a></li>    
            <li><a href="booking"><i class="fa fa-circle-o"></i> Rezervasyon Bilgileri</a></li>    
          </ul>
        </li>
      </ul>

      
    </section>

  </aside>


  <div class="content-wrapper">
  <div class="row">
  <label type="text" style="font-size: 40px; color: #222d32; display: block; text-align: center; line-height: 150%;">Hızlı Erişim </label>
  </div>
  <div class="row">

  <div class="container" style="padding:20px 150px;">
  <form action="room">
  <div class="col-lg-12">
  <button class="btn btn-primary btn-block" style="margin: 20px 0px;">Oda Bilgileri</button>
  </div>
  </form>
  <form action="data">
  <div class="col-lg-12" >
  <button class="btn btn-primary btn-block" style="margin: 20px 0px;">Kullanıcı Bilgileri</button>
  </div>
  </form>
  <form action="simple">
  <div class="col-lg-12">
  <button class="btn btn-primary btn-block" style="margin: 20px 0px;">Giriş Bilgileri</button>
  </div>
  </form>
  <form action="booking">
  <div class="col-lg-12">
  <button class="btn btn-primary btn-block" style="margin: 20px 0px;">Rezervasyon Bilgileri</button>
  </div>
  </form>
  </div>
  </div>
  </div>


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2017 <a href="index">Dilber Otel</a>.</strong> Tüm hakları saklıdır.
  </footer>

</div>

<script src="../public/css/admin/bower_components/jquery/dist/jquery.min.js"></script>

<script src="../public/css/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="../public/css/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../public/css/admin/bower_components/raphael/raphael.min.js"></script>
<script src="../public/css/admin/bower_components/morris.js/morris.min.js"></script>

<script src="../public/css/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<script src="../public/css/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../public/css/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="../public/css/admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

<script src="../public/css/admin/bower_components/moment/min/moment.min.js"></script>
<script src="../public/css/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="../public/css/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="../public/css/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="../public/css/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="../public/css/admin/bower_components/fastclick/lib/fastclick.js"></script>

<script src="../public/css/admin/dist/js/adminlte.min.js"></script>

<script src="../public/css/admin/dist/js/pages/dashboard.js"></script>

<script src="../public/css/admin/dist/js/demo.js"></script>
</body>
</html>
