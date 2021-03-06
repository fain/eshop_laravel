<!DOCTYPE html>
<html lang="en">
<head>


<script src="{{asset('js/jquery.js')}}"></script>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">

<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js/price-range.js')}}"></script>
<script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<!-- this line supposely for title -->
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

    <!-- Sweetalert CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">


	<!-- Compare Product CSS -->
	<link href="{{asset('https://fonts.googleapis.com/css?family=Lato:400,700')}}" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{asset('css/normalize.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/comparison.css')}}">


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
										<a href="{{Auth::check() ? 'backend/profile' : url('backend/login')}}"> <i class="fa fa-user-secret" aria-hidden="true"></i>{{Auth::check() ? 'Seller Account' : 'Seller'}} 
										<span class="caret"></span></a>
										@if(Auth::check()) 
										<ul class="dropdown-menu dropdown-user">
											<li>
												<a href="{{Auth::check() ? '#' : url('backend/login')}}"> <i class="fa fa-user"></i>{{Auth::check() ? 'Profile' : 'Seller Office'}} </a>
											</li>
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
                        @if(Auth::user())
                        <li>
                            <a href="{{url('/product_wishlists')}}">
                                <i class="fa fa-gift fa-13x" aria-hidden="true"></i>
                                    <span id='p_labelwishlist'>
                                
                                @foreach($product_wishlists as $product_wishlist)
                                @endforeach

                                    @if ($product_wishlist->products_id)
                                     Wishlist ({{ sizeof($product_wishlists) }})
                                    @else
                                        Wishlist (0)
                                    @endif

                                </span> 
                            </a>
                        </li>

                        <li><a href="{{url('backend/login')}}"><i class="fa fa-briefcase"></i> Merchants</a></li>

            
                         <li>
                             <a href="{{url('/product_carts')}}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id='p_labelcart'>
                                
                                @foreach($product_carts as $product_cart)
                                @endforeach

                                    @if ($product_cart->products_id)
                                     Cart ({{ sizeof($product_carts) }})
                                    @else
                                        Cart (0)
                                    @endif

                                </span> 
                            </a>
                        </li>
                        @endif


                        <li class="main-dropdown">
							<a href="{{Auth::check() ? '#' : url('auth/login')}}"><i class="fa fa-lock"></i> {{Auth::check() ? 'Profile' : 'Login'}}<span class="caret"></span></a>
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
                    <a href="{{Auth::check() ? url('/') : url('/shop')}} ">
                        <img src="{{asset('images/home/logo-eshop-angkasa.png')}}" alt="" height="40px;"/>
                    </a> 
                </div>
            </div>
			<div class="col-sm-3">

				<div class="search_box_home pull-right">
                    <input type="text" placeholder="Search for products, brands, shops"/>
                </div>

		    </div>
        </div>
    </div>
</div><!--/header-middle-->

<!--header-bottom-->
<!-- <div class="header-bottom">
  
</div> -->
<!--/header-bottom-->

</header><!--/header-->

@yield('content')



<!-- Tooltip -->
<script type="text/javascript">
$("[data-toggle=tooltip]").tooltip();
</script>


<!-- Zoom Product -->
<script src="{{asset('js/zoom_product.js')}}"></script>

<!-- Compare Product JS -->
 <!-- // <script type="text/javascript" src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js')}}"></script>  -->
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


<!-- Featured Products -->
<!-- bxSlider Javascript file -->
<script type="text/javascript" src="{{asset('js/jquery.bxslider.min.js')}}"></script>

<!-- bxSlider CSS file -->
<link href="{{asset('css/jquery.bxslider.css')}}" rel="stylesheet">
<!-- Featured Products -->


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



<!-- Bank Partner Slider -->
<script type="text/javascript" src="{{asset('js/jquery.catslider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/modernizr.custom.63321.js')}}"></script>

<link href="{{asset('css/multi_item_style.css')}}" rel="stylesheet">

<script>
$(function() {
	$( '#mi-slider' ).catslider();
});
</script>

<!-- PreOrder Items-->
<!-- Load modernizr or html5shiv -->
<script type="text/javascript" src="{{asset('//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js')}}"></script>
<script>window.modernizr || document.write('<script src="../lib/modernizr/modernizr-custom.js"><\/script>')</script>

<!-- Load miSlider -->
<link href="{{asset('css/mislider.css')}}" rel="stylesheet">
<link href="{{asset('css/mislider-skin-cameo.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset('js/mislider.js')}}"></script>
<script type="text/javascript">
jQuery(function ($) {
    var slider = $('.mis-stage').miSlider({
        //  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
        //stageHeight: 380,
        //  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
        slidesOnStage: false,
        //  The location of the current slide on the stage. Options: 'left', 'right', 'center'. Defualt: 'left'
        slidePosition: 'center',
        //  The slide to start on. Options: 'beg', 'mid', 'end' or slide number starting at 1 - '1','2','3', etc. Defualt: 'beg'
        slideStart: 'mid',
        //  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
        slideScaling: 150,
        //  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
        offsetV: -5,
        //  Center slide contents vertically - Boolean. Default: false
        centerV: true,
        //  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
        navButtonsOpacity: 1
    });
});
</script>


<!-- Apply other styles -->
<link href="{{asset('css/styles_mislider.css')}}" rel="stylesheet">

<!-- google-code-prettify -->
<script type="text/javascript" src="{{asset('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js')}}"></script>
<script type="text/javascript">$(function() { $('pre').addClass('prettyprint');})</script>
<!-- PreOrder Items-->


<!-- vertical preloved -->
<script type="text/javascript" src="{{asset('js/jssor.slider-22.1.6.min.js')}}"></script>
<script type="text/javascript">
jssor_1_slider_init = function() {

    var jssor_1_options = {
      $AutoPlay: true,
      $DragOrientation: 2,
      $PlayOrientation: 2,
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      }
    };

    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

    /*responsive code begin*/
    /*you can remove responsive code if you don't want the slider scales while window resizing*/
    function ScaleSlider() {
        var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, 600);
            jssor_1_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider, 30);
        }
    }
    ScaleSlider();
    $Jssor$.$AddEvent(window, "load", ScaleSlider);
    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    /*responsive code end*/
};
</script>

<script type="text/javascript">jssor_1_slider_init();</script>


<!-- Sweetalert JS -->
<script src="{{asset('js/sweetalert.min.js')}}"></script>

<!-- Cart Steps Circular-->
<script type="text/javascript">
//initialization options for the progress bar
var progress = $("#progress").shieldProgressBar({
    min: 0,
    max: 100,
    value: 20,
    layout: "circular",
    layoutOptions: {
        circular: {
            borderColor: "#3366ff",
            width: 17,
            borderWidth: 3,
            color: "#F58723",
            backgroundColor: "transparent"
        }
    },
    text: {
        enabled: true,
        template: '<span style="font-size:47px; color: #F58723">{0:n1}%</span>'
    },
}).swidget();


function resetActive(event, percent, step) {
    progress.value(percent);

    $(".progress-bar").css("width", percent + "%").attr("aria-valuenow", percent);
    $(".progress-completed").text(percent + "%");

    $("div").each(function () {
        if ($(this).hasClass("activestep")) {
            $(this).removeClass("activestep");
        }
    });

    if (event.target.className == "col-md-2") {
        $(event.target).addClass("activestep");
    }
    else {
        $(event.target.parentNode).addClass("activestep");
    }

    hideSteps();
    showCurrentStepInfo(step);
}

function hideSteps() {
    $("div").each(function () {
        if ($(this).hasClass("activeStepInfo")) {
            $(this).removeClass("activeStepInfo");
            $(this).addClass("hiddenStepInfo");
        }
    });
}

function showCurrentStepInfo(step) {
    var id = "#" + step;
    $(id).addClass("activeStepInfo");
}
</script>



<script type="text/javascript">
$( "div#div1" ).click(function() {
  $(this).toggleClass( "select1" );
});

$( "div#step2" ).click(function() {
  $(this).toggleClass( "select2" );
});

$( "div#step3" ).click(function() {
  $(this).toggleClass( "select3" );
});

$( "div#step4" ).click(function() {
  $(this).toggleClass( "select4" );
});

$( "div#step5" ).click(function() {
  $(this).toggleClass( "select5" );
});

$( "div#finish" ).click(function() {
  $(this).toggleClass( "last" );
});
</script>


<script type="text/javascript">// <![CDATA[
      $("#searchterm").keyup(function(e){
        var q = $("#searchterm").val();
        $.getJSON("http://en.wikipedia.org/w/api.php?callback=?",
        {
          srsearch: q,
          action: "query",
          list: "search",
          format: "json"
        },
        function(data) {
          $("#results").empty();
          $("#results").append("

Results for <b>" + q + "</b>

");
          $.each(data.query.search, function(i,item){
            $("#results").append("
<div><a href='http://en.wikipedia.org/wiki/" + encodeURIComponent(item.title) + "'>" + item.title + "</a>" + item.snippet + "</div>
");
          });
        });
      });
</script>


<script type="text/javascript">
$('#div11').bind("click");
$("#div1").addClass("disabledbutton");

$("#step3").addClass("disabledbutton");

$("#step4").addClass("disabledbutton");

$("#step5").addClass("disabledbutton");

$("#finish").addClass("disabledbutton");

</script>


@include('sweet::alert')

@yield('js_content')


</body>
</html>