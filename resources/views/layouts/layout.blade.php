<!DOCTYPE html>
<html lang="en">
<head>

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{$title}}</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/main.css')}}" rel="stylesheet">
	<link href="{{asset('css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('css/custom.css')}}" rel="stylesheet">

	<!-- Lightbox home -->
	<link href="{{asset('css/menu_lightbox.css')}}" rel="stylesheet">


	<!-- Vertical tab -->
	<link href="{{asset('css/vertical_tab.css')}}" rel="stylesheet">

	<!-- Discount Label -->
	<link href="{{asset('css/discount_label.css')}}" rel="stylesheet">

	<!-- Mega menu -->
	<link href="{{asset('css/mega-menu.css')}}" rel="stylesheet">




	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	@yield('css_content')

    <!--[if lt IE 9]>
    {{--<script src="js/html5shiv.js"></script>--}}
    {{--<script src="js/respond.min.js"></script>--}}
    {{--<![endif]-->       --}}
    {{--<link rel="shortcut icon" href="images/ico/favicon.ico">--}}
    {{--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">--}}
    {{--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">--}}
    {{--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">--}}
    {{--<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">--}}


	<!-- Compare Product CSS -->
	<link href="{{asset('https://fonts.googleapis.com/css?family=Lato:400,700')}}" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{asset('css/normalize.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/comparison.css')}}">

	<!-- Wishlist Product CSS -->
	<!-- <link rel="stylesheet" id="open-sans-css" href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&amp;subset=latin%2Clatin-ext&amp;ver=4.4.2')}}" type="text/css" media="all"> -->
	<link rel="stylesheet" id="style-css" href="{{asset('css/style.css')}}" type="text/css" media="all">


</head><!--/head-->

<body>
	<header id="header"><!--header-->
         
         <!--header_top-->
         <div class="header_top">
             <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="shop-menu pull-left">
                            <ul class="nav navbar-nav">
								<li class="main-dropdown">
										<a href="{{Auth::check() ? '#' : url('backend/login')}}"> <i class="fa fa-user-secret" aria-hidden="true"></i>{{Auth::check() ? 'Seller Account' : 'Seller'}} 
											<!-- <i class="fa fa-chevron-down fa-1x fa-border" style="font-size:10px; padding-top:2px" aria-hidden="true"></i> -->
										</a>
										@if(Auth::check()) 
										<ul class="dropdown-menu dropdown-user">
											<li>
												<a href="{{Auth::check() ? '#' : url('backend/login')}}"> <i class="fa fa-user"></i>{{Auth::check() ? 'Profile' : 'Seller Office'}} </a>
											</li>
											<!-- <li>
												<a href="{{Auth::check() ? '#' : url('backend/login')}}"> <i class="fa fa-sign-out"></i>{{Auth::check() ? 'Logout' : 'Seller Office'}} </a>
											</li> -->
										</ul>
										@endif
								</li>
							</ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div> -->
  
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                           	  <li><a href="{{url('wishlists/')}}"<i class="fa fa-heart" aria-hidden="true"></i> Wishlist ()</a></li>



                                <li><a href="{{url('backend/login')}}"><i class="fa fa-briefcase"></i> Merchants</a></li>
                                <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <li class="main-dropdown">
									<a href="{{Auth::check() ? '#' : url('auth/login')}}"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::check() ? 'Logout' : 'Login'}}</a>
									@if(Auth::check()) 
									<ul class="dropdown-menu dropdown-user">
										<li>
											<a href="#"><i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }}</a>
										</li>
										<li>
											<a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
										</li>
										<!-- <li class="divider"></li> -->
										<li>
											<a href="/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
										</li>
									</ul>
									@endif
								</li>
                            </ul>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div> 
        <!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{url('')}}"><img src="{{asset('images/home/logo-eshop-angkasa.png')}}" alt="" height="40px;"/></a>
                        </div>
                    </div>
					<div class="col-sm-3">
 						<div class="search_box_home pull-right">
                            <input type="text" placeholder="Search for products, brands, shops"/>
                        </div>
				    </div>
                    
                    <!-- old right menu -->
                    <!-- <div class="col-sm-8">
                       <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">  -->
                                <!-- <li><a href="#"><i class="fa fa-user"></i> {{Auth::check() ? Auth::user()->name : 'Account'}}</a></li> -->
                                <!-- <li><a href="{{url('checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
	                           
								<!--<li><a href="{{url('wishlists/')}}"<i class="fa fa-heart" aria-hidden="true"></i> Wishlist ()</a></li>-->

                            <!--     <li><a href="{{url('backend/login')}}"><i class="fa fa-briefcase"></i> Merchants</a></li>
                                <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <li class="main-dropdown">
									<a href="{{Auth::check() ? '#' : url('auth/login')}}"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::check() ? 'Logout' : 'Login'}}</a>
									@if(Auth::check())
									<ul class="dropdown-menu dropdown-user">
										<li>
											<a href="#"><i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }}</a>
										</li>
										<li>
											<a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
										</li>
										<li class="divider"></li>
										<li>
											<a href="/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
										</li>
									</ul>
									@endif
								</li>
                            </ul>
                        </div>  
                    </div>-->
                    <!-- old right menu -->

                </div>
            </div>
        </div><!--/header-middle-->
		
		<!--header-bottom-->
        <!-- <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{url('')}}" {{$page == 'home' ? 'class=active' : ''}}>Home</a></li>
                                <li><a href="{{url('products')}}" {{$page == 'products' ? 'class=active' : ''}}>Products</a></li>
                                <li><a href="{{url('blog')}}" {{$page == 'blog' ? 'class=active' : ''}}>Blog</a></li>

                                <li><a id="compare" href="#animatedModal" disabled class="compare-products">Comparison List</a></li>

                                <li><a href="{{url('contact-us')}}" {{$page == 'contact_us' ? 'class=active' : ''}}>Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

  
 <!--/header-bottom-->

    </header><!--/header-->
		<!-- {{url('products')}} -->

		@yield('content')

<!--Footer HTML code from E-Shopper Template-->
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>E-Shop</span></h2>
							<p>E-Shop is an online shopping portal for its members to purchase products and apply for financing from Koperasi.</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{asset('images/home/map.png')}}" alt="" />
							<p>Angkasa Kuala Lumpur, Malaysia (MY)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-right">© Angkasa E-Shop 2016</p>
					<!-- <p class="pull-right">Designed by <span><a target="_blank" href="http://www.multibase.com.my">Multibase</a></span></p> -->
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('js/price-range.js')}}"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>




   	<!-- Popover Click -->
   <script type="text/javascript">
	$(document).ready(function(){
	    $('[data-toggle="popover"]').popover();   
	});
	</script>
	<style type="text/css">
		.popover-product{
	        margin-bottom: 20px;
	    }
	</style>

    <!-- Zoom Product -->
   <script src="{{asset('js/zoom_product.js')}}"></script>
   
 <script type="text/javascript" src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js')}}"></script>

	<!-- Compare Product JS -->
	<script type="text/javascript" src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.comparison.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/animatedModal.min.js')}}"></script>



	<script>
		$("#compare").animatedModal({
		
		    animatedIn:'lightSpeedIn',
		    animatedOut:'bounceOutDown',
		    color:'#3498db',
		
		});
		
		$(document).ready(function() {
		
		   $('.product').compare({			
				compareButton: '.compare-products'
			});


		
		});
	
	</script>

<!-- Slide Offer -->

<script type="text/javascript">
$("#slideshow_offer > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow_offer > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow_offer');
}, 3000);
</script>

<!-- Wishlist Product JS -->
<script type='text/javascript' src="{{asset('js/script.js')}}"></script>	 


<!-- Mega menu -->
<script type="text/javascript">
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});
</script>

<!-- Vertical tab home -->
<script type="text/javascript">
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").hover(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
</script>


   	@yield('js_content')


</body>
</html>