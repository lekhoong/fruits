
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>fresh</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->

   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="index.html"><img src="images/logo.png" alt="#" style=""/></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item active">
                              <a class="nav-link" href="{{ url('vegetables') }}">HOME</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{ url('juice') }}">ORDER</a>
                           </li>
                           @auth
                           <li class="nav-item">
                               <a class="nav-link" href="{{ url('profile/' . Auth::user()->name) }}">{{ Auth::user()->name }}</a>
                           </li>
                           <li class="nav-item">
                               <form id="logout-form" action="{{ route('logoutFunction') }}" method="POST" style="display: none;">
                                   @csrf
                               </form>
                               <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   LOGOUT
                               </a>
                           </li>
                       @else
                           <li class="nav-item">
                               <a class="nav-link" href="{{ url('login') }}">LOGIN</a>
                           </li>
                       @endauth  
                            <li class="nav-item ">
                                 <a class="nav-link" href="{{ url('cart') }}">CART</a>
                            </li>                     
                           <li class="nav-item d_none">
                              <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                           </li>
                           
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header -->

   <!-- banner -->
   <section class="banner_main">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="test_box">
                  <div class="text-bg">
                     <h1><span> Welcome to</span> <br>Our Vegetables Center</h1>
                     <a class="read_more" href="#">Read More</a>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div id="banner1" class="carousel slide banner_Carousel " data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#banner1" data-slide-to="0" class="active"></li>
                     <li data-target="#banner1" data-slide-to="1"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="container">
                           <div class="carousel-caption ">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="banner_img">
                                       <figure><img src="images/Fruits.png" alt="#"/></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="container">
                           <div class="carousel-caption">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="banner_img">
                                       <figure><img src="images/Vegetables.png" alt="#"/></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end banner -->

   <!-- about -->
   <div class="about">
      <div class="container">
         <div class="row d_flex">
            <div class="col-md-7">
               <div class="about_img">
                  <figure><img src="images/Fruits.png" alt="#" /></figure>
               </div>
            </div>
            <div class="col-md-5">
               <div class="titlepage">
                  <h2>About Us</h2>
                  <p>At Fresh Vegetables Center, we believe in the power of fresh, locally-sourced vegetables. Our mission is to bring the farm-to-table experience to your home with the finest produce, handpicked daily for quality and taste. Whether you're cooking up a family meal or preparing for a special occasion, our wide selection of fresh vegetables will make every dish vibrant and nutritious.
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end about -->

   <!-- Our Juices -->
   <div class="juices ">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Our Vegetables</h2>
                  <p> We are committed to sustainability and supporting local farmers, ensuring that our produce is not only delicious but also eco-friendly. Join us in celebrating healthy eating and discover the difference that fresh, quality vegetables can make.
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="our_main_box">
                  <div class="our_img">
                     <figure><img src="images/tomatoes.jpg" alt="#"/></figure>
                  </div>
                  <div class="our_text">
                     <h4>$<strong class="yellow">50</strong></h4>
                     <h3>Orange Juice</h3>
                     <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     <a class="read_more" href="#">Order Now</a>
                  </div>
               </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
               <div class="our_main_box">
                  <div class="our_img">
                     <figure><img src="images/our2.png" alt="#"/></figure>
                  </div>
                  <div class="our_text">
                     <h4>$<strong class="yellow">50</strong></h4>
                     <h3>Orange Juice</h3>
                     <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     <a class="read_more" href="#">Order Now</a>
                  </div>
               </div>
            </div>
            <div class="col-md-4 ">
               <div class="our_main_box">
                  <div class="our_img">
                     <figure><img src="images/our3.png" alt="#"/></figure>
                  </div>
                  <div class="our_text">
                     <h4>$<strong class="yellow">50</strong></h4>
                     <h3>Orange Juice</h3>
                     <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     <a class="read_more" href="#">Order Now</a>
                  </div>
               </div>
            </div>
            <div class="col-md-4 margin_top">
               <div class="our_main_box">
                  <div class="our_img">
                     <figure><img src="images/our4.png" alt="#"/></figure>
                  </div>
                  <div class="our_text">
                     <h4>$<strong class="yellow">50</strong></h4>
                     <h3>Orange Juice</h3>
                     <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     <a class="read_more" href="#">Order Now</a>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="our_main_box">
                  <div class="our_img">
                     <figure><img src="images/our5.png" alt="#"/></figure>
                  </div>
                  <div class="our_text">
                     <h4>$<strong class="yellow">50</strong></h4>
                     <h3>Orange Juice</h3>
                     <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                     <a class="read_more" href="#">Order Now</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end Our Juices  section -->

   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
</body>
</html>
