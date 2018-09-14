@inject('service','App\format')


<header>
  <div class="container">
    <div class="menu_block">
   <nav role="navigation" class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-1 col-sm-2">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-img" id="nav-img">
                        <a href="index"><img class="logo" src="../public/images/Adsız.jpg" alt=""></a>
                    </div>
                </div>
                <!-- Collection of nav links and other content for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse col-md-8 col-sm-8">
                    <nav class="nav navbar-nav" id="header-list">
                        <li><a href="index">ANASAYFA</a></li>
                        <li><a href="reservation">REZERVASYON</a></li>
                        <li><a href="tours">TURLAR</a></li>
                        <li><a href="gallery">GALERİ</a></li>
                        <li><a href="contacts">İLETİŞİM</a></li>
                        @if($service->login() == 0)
                        <li><button class="btn btn-success" onclick="window.open('login', '_blank') ">Üye Girişi</button></li>
                        <li><button class="btn btn-success" onclick="window.open('register', '_blank') ">Üye Ol</button></li>
                        @else
                        <li><a href="cikis" style="padding: 0px;"><button class="btn btn-danger">Çıkış</button></a></li>
                        @endif

                </nav>
     
      </nav>


      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</header>