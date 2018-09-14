<!DOCTYPE html>
<html lang="TR">
<head>
<title>Dilber Otel | Rezervasyon</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../public/images/favicon.ico">
<link rel="shortcut icon" href="../public/images/favicon.ico">
<link rel="stylesheet" href="../public/css/owl.carousel.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="../public/css/style.css">
 <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="././../public/css/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="../public/js/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="../public/js/jquery-migrate-1.1.1.js"></script>
<script src="../public/js/superfish.js"></script>
<script src="../public/js/sForm.js"></script>
<script src="../public/js/jquery.jqtransform.js"></script>
<script src="../public/js/jquery.equalheights.js"></script>
<script src="../public/js/jquery.easing.1.3.js"></script>
<script src="../public/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="../public/js/jquery.ui.totop.js"></script>
<script src="../public/js/owl.carousel.min.js"></script>
<script>
$(window).load(function () {
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>


@include('partials.header')

<div class="main">

  <div class="content">
    <div class="container">



<form action="reservation" method="post" class="booking-search">
    {{ csrf_field() }}
        <div class="row">
                @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                
                @if (Session::has('message2'))
                <div class="alert alert-danger">{{ Session::get('message2') }}</div>
                @endif

            <div class="col-md-2 col-sm-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-male"></i> Yetişkin</div>
                    <select name="yetiskin" class="selectpicker form-control">
                        <option value="1" selected="selected">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>                    </select>
                </div>
            </div>
        </div>
<div class="col-md-2 col-sm-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-male"></i> Çocuk</div>
                    <select name="cocuk" class="selectpicker form-control">
                        <option value="0" selected="selected">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
               <div class="box box-primary">
          
		 
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                

                <div class="input-group date">
                  <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>  <label>Giriş</label>
                  </div>
                  <input type="text" name="giris_tarihi" class="form-control pull-right" id="datepicker" value="{{ old('giris_tarihi') }}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


           
              

            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
           <div class="box box-primary">
          
		 
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                

                <div class="input-group date">
                  <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>  <label>Çıkış</label>
                  </div>
                  <input type="text" name="cikis_tarihi" class="form-control pull-right" id="datepicker2" value="{{ old('cikis_tarihi') }}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


           
              

            </div>
            <!-- /.box-body -->
          </div>
        </div>

<div class="col-md-2 col-sm-12">
            <div class="form-group">

                <button class="btn btn-block btn-primary" style="margin: 0px 0px" type="submit" name="check_availabilities"><i class="fa fa-search"></i> Kontrol et</button>
            </div>
        </div>



    </div>
</form>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content" method='post'>
      <div class="row">
        <div class="col-xs-12">

          <!-- /.box -->
    @if ( $isaret == 1)
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Oda Bilgileri</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>


                <tr>
                  <th>Oda Numarası</th>
                  <th>Oda Kapasitesi</th>
                  <th>Oda Fiyatı</th>
                  <th>Oda Resmi</th>
                  <th>Seç</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @foreach ($veriler as $veri)
                
                  <td>{{ $veri->oda_no  }} Numara</td>
                  <td>{{ $veri->oda_kapasite }} Kişi</td>
                  <td>{{ $veri->oda_fiyat }} TL</td>
                  <td> {{ $veri->oda_resim }}</td>
                  <td>
                  <form method="POST" style="max-width: 45px;" action="randevu_al">
                  {{ csrf_field() }}
                  <input type="hidden" name="oda_no" value="{{ $veri->oda_no  }}">
                  <input type="hidden" name="giris" value="{{ $giris }}">
                  <input type="hidden" name="cikis" value="{{ $cikis }}">

                  <button type="submit" class="btn btn-success" style="margin: 0px 35px;">Oda Seç</button>
                  </form>
                  </td>
                  
                </tr>
              @endforeach


                
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         @endif  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->


  </div>


    </div>
  </div>
  </div>

  <div class="main" style="padding: 0px;">
  <div class="bottom_block">
    <div class="container">
    <div class="col-md-12">
      <div class="col-md-3">
        <ul>
          <li><a style="font-family:Arial; font-size: 17px;" href="file:///C:/Users/muham/Desktop/journey/journey/about.html">Hakkımızda</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul>
          <li><a style="font-family:Arial; font-size: 17px; " href="#">İş Ortakları</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul>
          <li><a style="font-family:Arial; font-size: 17px;" href="#">Kariyer</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h4 style="font-family:Arial;font-size: 17px;" >İletişim:</h4>
        TEL: (212) 6244304<br>
        <a>E-posta: iletisim@dilberotel.org</a> 
      </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<footer>
  <div class="container">
    <div class="col-md-12">
      <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
      <div class="copy"> Dilber Otel &copy; 2017 | <a href="#">Gizlilik</a> | Design by: <a target="_blank" href="https://www.facebook.com/muhammet.emin.dilber">Muhammet Emin Dilber</a> </div>
    </div>
    <div class="clearfix"></div>
  </div>
</footer>
<!-- Select2 -->
<script src="././../public/css/admin/bower_components/select2/dist/js/select2.full.min.js"></script>


<!-- bootstrap datepicker -->
<script src="././../public/css/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
	 //Date picker
    $('#datepicker2').datepicker({
      autoclose: true
    })
	

    
  })
</script>
<script src="././../public/css/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.tr.min.js"></script>
</body>
</html>