<!DOCTYPE html>
<html lang="tr">
<head>
<title>Dilber Otel | Galeri</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../public/images/favicon.ico">
<link rel="shortcut icon" href="../public/images/favicon.ico">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="../public/css/style.css">
<link rel="stylesheet" href="../public/css/touchTouch.css">
<script src="../public/js/jquery.js"></script>
<script src="../public/js/jquery-migrate-1.1.1.js"></script>
<script src="../public/js/superfish.js"></script>
<script src="../public/js/jquery.equalheights.js"></script>
<script src="../public/js/jquery.easing.1.3.js"></script>
<script src="../public/js/jquery.ui.totop.js"></script>
<script src="../public/js/touchTouch.jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
$(window).load(function () {
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
$(function () {
    $('.gallery a.gal').touchTouch();
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
      <div class="col-md-12 col-sm-12">
        <h3 style="font-family: Arial;font-size: 30px;">Galeri</h3>
      </div>
      <div class="clear"></div>
      <div class="gallery">
        <div class="col-md-4 col-sm-6 img-gallery"> <a href="../public/images/big1.jpg" class="gal img_inner"><img class="center-block" src="../public/images/page3_img1.jpg" alt=""></a> </div>
        <div class="col-md-4 col-sm-6 img-gallery"> <a href="../public/images/big2.jpg" class="gal img_inner"><img src="../public/images/page3_img2.jpg" alt=""></a> </div>
        <div class="col-md-4 col-sm-6 img-gallery"> <a href="../public/images/big3.jpg" class="gal img_inner"><img src="../public/images/page3_img3.jpg" alt=""></a> </div>

        <div class="col-md-4 col-sm-6 img-gallery"> <a href="../public/images/big4.jpg" class="gal img_inner"><img src="../public/images/page3_img4.jpg" alt=""></a> </div>
        <div class="col-md-4 col-sm-6 img-gallery"> <a href="../public/images/big5.jpg" class="gal img_inner"><img src="../public/images/page3_img5.jpg" alt=""></a> </div>
        <div class="col-md-4 col-sm-6 img-gallery"> <a href="../public/images/big6.jpg" class="gal img_inner"><img src="../public/images/page3_img6.jpg" alt=""></a> </div>

        <div class="col-md-4 col-sm-6 img-gallery"> <a href="../public/images/big7.jpg" class="gal img_inner"><img src="../public/images/page3_img7.jpg" alt=""></a> </div>
        <div class="col-md-4 col-sm-6 img-gallery"> <a href="../public/images/big8.jpg" class="gal img_inner"><img src="../public/images/page3_img8.jpg" alt=""></a> </div>
        <div class="col-md-4 col-sm-6 img-gallery"> <a href="../public/images/big9.jpg" class="gal img_inner"><img src="../public/images/page3_img9.jpg" alt=""></a> </div>
      </div>
      <div class="clear"></div>
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
</body>
</html>