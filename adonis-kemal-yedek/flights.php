<!DOCTYPE html>
<html lang="en">
     <head>
     <title>Home</title>
     <meta charset="utf-8">
     <meta name = "format-detection" content = "telephone=no" />
     <link rel="icon" href="images/favicon.ico">
     <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="booking/css/booking.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/form.css">
     <link rel="stylesheet" href="css/stuck.css">
     <link rel="stylesheet" href="css/style.css">
     <script src="js/jquery.js"></script>
     <script src="js/jquery-migrate-1.1.1.js"></script>
     <script src="js/script.js"></script> 
     <script src="js/superfish.js"></script>
     <script src="js/sForm.js"></script>
     <script src="js/jquery.equalheights.js"></script>
     <script src="js/jquery.mobilemenu.js"></script>
     <script src="js/jquery.easing.1.3.js"></script>
     <script src="js/tmStickUp.js"></script>
     <script src="js/jquery.ui.totop.js"></script>
     <script src="booking/js/booking.js"></script>
     <script src="js/owl.carousel.js"></script> 
     <script>
       $(document).ready(function(){
        /*carousel*/
        var owl = $("#owl"); 
            owl.owlCarousel({
            items : 4, //10 items above 1000px browser width
            itemsDesktop : [995,4], //5 items between 1000px and 901px
            itemsDesktopSmall : [767, 2], // betweem 900px and 601px
            itemsTablet: [700, 2], //2 items between 600 and 0
            itemsMobile : [479, 1], // itemsMobile disabled - inherit from itemsTablet option
            navigation : true,
            pagination :  false
            });
        $().UItoTop({ easingType: 'easeOutQuart' });
        $('#stuck_container').tmStickUp({});
     }); 

     </script>
        
   
    <!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
         </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <link rel="stylesheet" media="screen" href="css/ie.css">


    <![endif]-->
     </head>

	 
	 
<body class="" id="top">
<!--==============================header=================================-->
<header>
  <div id="stuck_container">
  <div class="container">
    <div class="row">
      <div class="grid_12">        <h1>
          <a href="index.html">
            <img src="images/logo.png" alt="Your Happy Family">
          </a>
        </h1>   
        <div class="menu_block ">
          <nav class="horizontal-nav full-width horizontalNav-notprocessed">
            <ul class="sf-menu">
             <li><a href="index.html"><span class="fa fa-home"></span>Home</a></li>
             <li class="current"><a href="index-1.html"><span class="fa fa-plane"></span>Flights</a></li>
             <li><a href="index-2.html"><span class="fa fa-star"></span>Cars</a></li>
             <li><a href="index-3.html"><span class="fa fa-flag"></span>Lodging</a></li>
             <li><a href="index-4.html"><span class="fa fa-bell"></span>Cruises<strong></strong></a>
               <ul>
                  <li><a href="#">Vestibulum iaculis</a></li>
                  <li><a href="#">Lacinia est</a></li>
                  <li><a href="#">Proin dictum </a></li>
                  <li><a href="#">Elementum velit</a>
                    <ul>
                      <li><a href="#">Dolore ipsu</a></li>
                      <li><a href="#">Consecte</a></li>
                      <li><a href="#">Elit Conseq</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Consequat ante</a></li>
               </ul>
             </li>
             <li><a href="index-5.html"><span class="fa fa-heart"></span>Vacations</a></li>
             <li><a href="index-6.html"><span class="fa fa-user"></span>Insurance</a></li>
           </ul>
          </nav>
          <div class="clear"></div>       
        </div>  
        <div class="clear"></div>     
        
      </div>
    </div>
  </div>    
  </div>        
</header> 
<!--=====================Content======================-->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="grid_12">
        <h3 class="mb0">Discount Airfare Deals </h3>
      </div>
      <div class="clear"></div>
      <div class="grid_4">
        <div class="box">
          <div class="box_top">
            <div class="fa fa-star-o"></div>
            top airline deals
          </div>
          <img src="images/page2_img1.jpg" alt="">
          <div class="box_bot">
            <div class="maxheight">
              <div class="text1">
                <a href="#">Orlando</a>
                <div class="col1 txf">$89</div>
              </div><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="grid_4">
        <div class="box">
          <div class="box_top">
            <div class="fa fa-clock-o"></div>
            last minute deals
          </div>
          <img src="images/page2_img2.jpg" alt="">
          <div class="box_bot">
            <div class="maxheight">
              <div class="text1">
                <a href="#">Las Vegas</a>
                <div class="col1 txf">$120</div>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="grid_4">
        <div class="box">
          <div class="box_top">
            <div class="fa fa-tags"></div>
            flights under $199
          </div>
          <img src="images/page2_img3.jpg" alt="">
          <div class="box_bot">
            <div class="maxheight">
              <div class="text1">
                <a href="#">Minneapolis</a>
                <div class="col1 txf">$95</div>
              </div><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
            </div>
          </div>
        </div>
      </div>   
      <div class="grid_6">
          <h3 class="head1">why Book Cheap Flights?</h3>
          <p class="col2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malsuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. </p>
          Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malsuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. 
      </div>  
      <div class="grid_6">
        <h3 class="head1">Reviews </h3>
        <blockquote class="bq1">
          <div class="text1">
            <div class="stars">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
            <a href="#">Great Trip</a>
          </div>
          Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
          <div class="bq_bot">
            <strong class="col2">Laura Stegner</strong>
            <time class="col4" datetime="2014-01-01">Apr 18, 2014</time>
          </div>
        </blockquote>
        <blockquote class="bq1">
          <div class="text1">
            <div class="stars">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
            <a href="#">Great Deals!</a>
          </div>
          Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
          <div class="bq_bot">
            <strong class="col2">Tom James</strong>
            <time class="col4" datetime="2014-01-01">Apr 18, 2014</time>
          </div>
        </blockquote>
      </div>
      <div class="clear"></div>
      <div class="grid_6">
        <h3 class="head2">Featured Blog Posts</h3>
        <div class="post">
          <div class="text1"><a href="#">Vestibulum sed ante</a></div>Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum. <br>
          <time class="col4" datetime="2014-01-01">12 min. ago</time>
        </div>
        <div class="post">
          <div class="text1"><a href="#">Vestibulum sed ante</a></div>Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum.<br>
          <time class="col4" datetime="2014-01-01">12 min. ago</time>
        </div>
        <a href="#" class="btn">view all </a>
      </div>
      <div class="grid_6">
        <h3 class="head2">useful links</h3>
        <ul class="list col1">
          <li><a href="#">Lorem ipsum dolor</a></li>
          <li><a href="#">Praesent vestibulum molestie</a></li>
          <li><a href="#">porta Fusce suscipit varius miursu</a></li>
          <li><a href="#">Etiam cursus leo vel metus Nulla facilisi</a></li>
          <li><a href="#">Aenean nec eros</a></li>
          <li><a href="#">Vestibulum ante ipsum primis</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--==============================footer=================================-->
  <footer>   
    <div class="f_top">
      <div class="container">
        <div class="row">
          <div class="grid_4">
            <h4>about</h4>
            Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. 
          </div>
          <div class="grid_4">
            <h4>travel news</h4>
            <img src="images/f_img1.jpg" alt="">
            <div class="extra_wrapper">
              <strong class="col2"><a href="#">Phasellus porta. </a></strong> <br>Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes.
              <br>
              <time class="col4" datetime="2014-01-01">25 April. 2014</time>
            </div>
            <div class="clear cl2"></div>
            <img src="images/f_img2.jpg" alt="">
            <div class="extra_wrapper">
              <strong class="col2"><a href="#">Phasellus porta. </a></strong> <br>Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes.
              <br>
              <time class="col4" datetime="2014-01-01">25 April. 2014</time>
            </div>
          </div>
          <div class="grid_4">
            <h4>locations</h4>
            <address>
              8901 Marmora Road, Glasgow, D04 89GR.
              <div class="col4">+1 800 559 6580</div>
            </address>
            <div class="socials">
              <a href="#" class="fa fa-facebook"></a>
              <a href="#" class="fa fa-google-plus"></a>
              <a href="#" class="fa fa-rss"></a>
              <a href="#" class="fa fa-pinterest"></a>
              <a href="#" class="fa fa-linkedin"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="grid_12">        
          <div class="copy"><span class="f_logo"><a href="index.html">Travel booking</a></span>  &copy; <span id="copyright-year"></span> <a href="index-7.html">Privacy Policy</a>
          </div>
        </div>
      </div>
    </div>  
  </footer>
<script>
</script>
</body>	 
	 
	 
</html>

