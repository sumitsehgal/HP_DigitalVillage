<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HP Digital Classrooms</title>

    <link href="/assets/front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!--bootstrap-->
    <link href="/assets/front/css/style.css" rel="stylesheet" type="text/css" media="all" /><!--stylesheet-->

    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=PT+Serif:400,700" rel="stylesheet">
    <!--//fonts-->
    <meta name="google-site-verification" content="A-MsRkjP8erHFajBnPdT_Paaly9TY5iJbttUNn_Cguk" />

</head>


<body class="home">
<!-- Header -->
    <div id="home" class="<?php if($page_slug == 'home'){echo "banner"; }else if ($page_slug == 'contact_us'){ echo "contact-banner"; }else {echo "inner-banner-w3l";};?>  w3l"    >
        <div class="header-nav">
            <nav class="navbar navbar-default">
                <div class="header-top">
                    <div class="navbar-header logo">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1>
                            <a class="navbar-brand" href="/"><img src="/assets/front/images/logo.png" class="img-responsive"></a>
                        </h1>
                    </div>
                    <!-- navbar-header -->
                    <div class="contact-bnr-w3-agile">
                        <ul>
                            <li><i class="fa fa-edit - feedback" aria-hidden="true"></i><a href="/feedback">Feedback</a></li>
                            <li><i class="fa fa-support - support" aria-hidden="true"></i><a href="/support">Support</a></li> 
                            <li><i class="fa fa-question - FAQ" aria-hidden="true"></i><a target="_blank" href="/faq">FAQ</a></li>
                            @if(!Auth::check())
                            <li><a class="hyper" id="reg_free"  title="Register" href="javascript:;" data-toggle="modal" data-target="#registerLoginModal"><span><i class="fa fa-sign-in"></i> Student Login</span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="collapse navbar-collapse cl-effect-13" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a href="/" class="<?php if($page_slug=='home'){echo "active"; } ?>">Home</a></li>
                        <li><a href="/about" class="<?php if($page_slug=='about'){echo "active"; } ?>">About</a></li>
                        <li><a href="/courses" class="<?php if($page_slug=='courses'){echo "active"; } ?>">Courses</a></li>
                        <li><a href="/contact_us" class="<?php if($page_slug=='contact_us'){echo "active"; } ?>">Contact</a></li>
                        
                        @if (Auth::check())
                        <li><a href="/blogs" class="">Blog</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i>   {{ Auth::user()->name() }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/home" class="">Dashboard</a></li>
                                <li><a href="#">Info</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="clearfix"> </div>	
            </nav>
            <div class="clearfix"> </div>
        </div>
        
        @if($page_slug=='home')
        <div class="container">
            <div class="banner-info wow bounceInDown" data-wow-duration="1s" data-wow-delay="0s">
                <div  class="callbacks_container">
                    <ul class="rslides" id="slider3">
                        <li>
                            <div class="flight-text">
                                <div class="animation-text">
                                    <h1 class="ml9">
                                        <span class="text-wrapper">
                                            <span class="letters">More than {{$student}} Students</span>
                                            <br>
                                            <br>
                                            <span class="letters"> &nbsp In {{$centerhead}} Head Center</span>
                                        </span>
                                    </h1>
                                </div>
                            </div>
                            <div class="banner-text">
                                @if(Auth::check())
                                <h3 class="text-left">Welcome {{ Auth::user()->name() }}</h3>
                                @else
                                <h3 class="text-left">Admin Sign In</h3>
                                <form id="popup-admin-login-form" role="form" method="post" action="/login" autocomplete="off">
                                    @csrf
                                    <div id="login-admin-msg-div" class="login-admin-msg-div"></div>
                                    <div class="form-group">
                                        <input type="text" name="username" required value="" id="admin_user_name" placeholder="Username" class="form-control" rel="txtTooltip" title="" data-toggle="tooltip" data-placement="bottom">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" required name="password" id="admin_password"  value="" placeholder="Password" class="form-control" rel="txtTooltip" title="" data-toggle="tooltip" data-placement="bottom">
                                            <span class="view pull-left"><input type="checkbox" name="View Password" value="View Password" class="">  Remember me</span><span class="view pull-right"><a href="#">Forgot Password</a></span><br>
                                    </div>
                                    <div class="form-group">
                                        <center><input type="button" id="popup-admin-login-btn"" class="btn btn-default" value="Login" name="loginsubmit"></center>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>	
            </div>
        </div>
        @endif
    </div>

<style type="text/css">
    .flight-text {
        float: left;
        margin: 15.5em auto 0;
        color: #fff;
    }

    .animation-text {
        background: url(/cloud.png);
        background-repeat: repeat;
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-repeat: no-repeat;
        width: 100%;
        height: 176px;
        position: absolute;
        left: 10%;
        top: 14%;
        width:500px;
    }

    .ml9 {
        font-weight: 200;
        font-size: 22px;
        color: #2e204e;
        
        line-height: 11px;
        top: 38%;
        font-weight:bold;
        position: relative;
        left:12%;
        font-family: serif;
    }

    .ml9 .text-wrapper {
        position: relative;
        display: inline-block;
        padding-top: 0.2em;
        padding-right: 0.05em;
        padding-bottom: 0.1em;
        overflow: hidden;
    }
    .small {
        float: left;
    }

    .ml9 .letter {
        transform-origin: 50% 100%;
        display: inline-block;
        line-height: 1em;
    }

    .login-title-label {
        margin-bottom: 10px;
        margin-left: 30px;
        font-weight: bold;
        font-size: 130%;
    }
    @media only screen and (max-width: 600px) {
        .animation-text {
            background: url(/cloud.png);
            background-repeat: repeat;
            background-position-x: 0%;
            background-position-y: 0%;
            background-repeat: repeat;
            background-position-x: 0;
            background-position-y: 0%;
            background-repeat: repeat;
            background-repeat: no-repeat;
            width: 100%;
            height: 176px;
            position: absolute;
            left: 3%;
            top: 1%;
            width: 330px;
            background-size: contain;
        }


        .ml9 {
            font-weight: 200;
            font-size: 20px;
            color: #2e204e;
            line-height: 11px;
            top: 22%;
            font-weight: bold;
            position: relative;
            left: 12%;
            font-family: serif;
        }

        .banner-text {
            width: 99%;
            margin: 11em auto 0;
        }
    }
    div#login-msg-div.red {
        color: red;
        font-weight: bold;
    }
</style>
<div class="main-body ">
@yield('content')
</div>



<div class="contact-w3ls ">
    <div class="contact-top-w3-agile">
    </div>
    <div class="container">
		@if($page_slug != "contact_us")
        <h2 class="heading-agileinfo white-w3ls">Contact Us<span class="black-w3ls">Welcome to our Classrooms. We are glad to have you around.</span></h2>
        <ul class="w3_address">
            <li>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>#1687-A,Sector-82,JLPL,Industrial Park,Mohali,Punjab-140306,India</span>
            </li>
            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i><span>18001201687</span></li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i><span><a href="mailto:Customersupporthpedc@clarity-medical.com">Customersupporthpedc@clarity-medical.com</a><br></span></li>
            <li><i class="fa fa-comments-o" aria-hidden="true"></i><span><a href="/contact_us">Contact >></a></span></li>
		</ul>
        @endif
		<div class="clearfix"></div>
            <div class="copy">
				<ul class="banner-menu-w3layouts">
					<li><a href="/">Home</a></li>
					<li><a href="/about">About</a></li>
					<li><a href="/contact_us">Contact</a></li>
				</ul>
				<p>© 2018 HPE . All Rights Reserved <a class="hide" href="http://www.33infotech.com/">33infotech</a> </p>
		</div>
	</div>
</div>

@if(!Auth::check())
<!-- Modal -->
<div id="registerLoginModal" class="modal fade" role="dialog">
    <div class="modal-dialog"> 
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h2 class="modal-title fdr">Student Login</h2>
            <h2 class="modal-title fdr2" style="display:none">Forgot Password</h2>
        </div>
        <div class="modal-body">
            <div class="col-sm-12 signin-sect fdr">
                <div id="login-msg-div" class="login-msg-div red"></div>
                <form class="form" action="" method="post" id="popup-login-form">
                    @csrf
                    <p><label>User ID</label> <input type="text" required name="username" class="form-control input-empty" placeholder=""></p>
                    <p><label>Password</label> <input type="password" required name="password" class="form-control input-empty"></p>
                    <p><input type="button" id="popup-login-btn" name="submit" value="Login" class="btn btn-primary popup-login-button"> 
                    <div class="col-md-7 col-xs-7 keeplogin text-right ferd"><b>Forgot Password?</b></div>
                </form>
            </div>
            <div class=" col-sm-12 loginform fdr2" style="display:none">
            <div id="forget-msg-div"></div>
            <form action="#" id="forgetpassword" autocomplete="on" method="POST">
                <p><label>Username</label> <input type="text" required name="user_name" class="form-control input-empty" placeholder="Enter your User ID"></p>
                <p class="keeplogin dgtbkt"> 
                    <b class="lgt"> Login </b>
                    <input class="hdf btn btn-primary popup-login-button" name="submit" id="can" type="submit" value="Reset Password" />
                </p>
            </form>
        </div>
    </div>
</div> 
</div>
</div>
@endif







<!--//footer -->
<!-- js -->

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<!--//js -->
<script src="/assets/front/js/SmoothScroll.min.js"></script>
<!-- responsiveslides -->
<script src="/assets/front/js/responsiveslides.min.js"></script>
			<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: true,
										nav: true,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
			</script>
<!-- //responsiveslides -->
<!-- OnScroll-Number-Increase-JavaScript -->
	<script type="text/javascript" src="/assets/front/js/numscroller-1.0.js"></script>
<!-- //OnScroll-Number-Increase-JavaScript -->
<!--Scrolling-top -->
<script type="text/javascript" src="/assets/front/js/move-top.js"></script>
<script type="text/javascript" src="/assets/front/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!--//Scrolling-top -->
 <!--flexiselDemo1 -->
 <script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 2,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems: 1
										},
										tablet: { 
											changePoint:991,
											visibleItems: 1
										}
									}
								});
								
							});
			</script>
			<script type="text/javascript" src="/assets/front/js/jquery.flexisel.js"></script>
<!--//flexiselDemo1 -->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<script type="text/javascript" src="/assets/front/js/bootstrap-3.1.1.min.js"></script>



<script type="text/javascript">
	
jQuery(document).ready(function () {
	
	 // jQuery('#popup-login-form').submit(function( event ) {  
	  jQuery('#popup-login-btn').click(function( event ) {  
   
			   jQuery.ajax({
                   type:"POST",
                   url:"/login",
                   data:jQuery("#popup-login-form").serialize(), 
                   success : function(data){ 
                       console.log(data);
                     window.location.href = "{{ url()->current() }}";
                   },
                   error: function(dt){
                    if(dt.status = 422)
                    {
                        error = dt.responseJSON.message;
                        console.log(dt.responseJSON.errors);
                        if(dt.responseJSON.errors)
                        {
                            jQuery.each(dt.responseJSON.errors, function(v, item){
                                jQuery.each(item,function(i, d){
                                    error += '<br/>'+d;
                                });
                            })
                        }
                        jQuery("#login-msg-div").html(error);
                        
                    }
                   }
               });  
  }); 

  jQuery('#popup-admin-login-btn').click(function( event ) {  
  
			   jQuery.ajax({
                   type:"POST",
                   url:"/login",
                   data:jQuery("#popup-admin-login-form").serialize(), 
                   success : function(data){ 
                       console.log(data);
					   var urls = "{{ url()->current() }}/home";
						window.location.href = urls; 
				  },
                  error: function(dt){
                    if(dt.status = 422)
                    {
                        error = dt.responseJSON.message;
                        console.log(dt.responseJSON.errors);
                        if(dt.responseJSON.errors)
                        {
                            jQuery.each(dt.responseJSON.errors, function(v, item){
                                jQuery.each(item,function(i, d){
                                    error += '<br/>'+d;
                                });
                            })
                        }
                        jQuery("#login-admin-msg-div").html(error);
                        
                    }
                   }
                   
               });  
  });

  
   jQuery("#forgetpassword").submit(function( event ) { 
  event.preventDefault();
			   jQuery.ajax({
                   type:"POST",
                   url:"/forgetpassword",
                   data:jQuery("#forgetpassword").serialize(),
                   success:function(data){
					jQuery("#forget-msg-div").html(data); 
                   }
               });  
  }); 
  
   jQuery("#review").submit(function( event ) { 
  event.preventDefault();
			   jQuery.ajax({
                   type:"POST",
                   url:"/review",
                   data:jQuery("#review").serialize(),
                   success:function(){
					   $("#review")[0].reset();
					 alert('submitted successfully');
                   }
               });  
  });
  
  
   jQuery('.show-register-form').click(function(){
	 jQuery('#loginModal').modal('hide'); 
	 jQuery('#registerModal').modal('show'); 
  });
  jQuery('.show-login-form').click(function(){
	 jQuery('#loginModal').modal('show'); 
	 jQuery('#registerModal').modal('hide'); 
  });
	
		
 jQuery(".ferd").click(function(){
        jQuery(".fdr").hide(); 
        jQuery(".fdr2").show();
    });
	    jQuery(".lgt").click(function(){
        jQuery(".fdr2").hide(); 
        jQuery(".fdr").show();
    });
  
  
});	
	
 </script>
 <!-- Banner Slider js script file-->
<script src="/assets/front/js/JiSlider.js"></script>
<script>
			$(window).load(function () {
				$('#JiSlider').JiSlider({color: '#fff', start: 0, reverse: false}).addClass('ff')
			})
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- //Banner Slider js script file-->

<!-- required-js-files-->
<link href="/assets/front/css/owl.carousel.css" rel="stylesheet">
<link href="/assets/front/css/JiSlider.css" rel="stylesheet">
	<script src="/assets/front/js/owl.carousel.js"></script>
		<script>
			$(document).ready(function() {
				$("#owl-demo").owlCarousel({
					items : 1,
					lazyLoad : true,
					autoPlay : true,
					navigation : false,
					navigationText :  false,
					pagination : true,
				});
			});
		 </script>
<!--//required-js-files-->


<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->

<!-- Stars scrolling script -->
	<script src="/assets/front/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="/assets/front/js/move-top.js"></script>
	<script type="text/javascript" src="/assets/front/js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<script>
// Wrap every letter in a span
$('.ml9 .letters').each(function(){
  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: true})
  .add({
    targets: '.ml9 .letter',
    scale: [0, 1],
    duration: 1500,
    elasticity: 600,
    delay: function(el, i) {
      return 45 * (i+1)
    }
  }).add({
    targets: '.ml9',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
</script>

@if($page_slug == "feedback")

<script>

jQuery(document).ready(function(){





    jQuery(".Suggestion").click(function(){
        jQuery(".show_Suggestion").show();
        jQuery(".show_Compliment").hide();
        jQuery(".show_Bug").hide();
        jQuery(".show_Question").hide();
    });
							 
    jQuery(".Compliment").click(function(){
        jQuery(".show_Suggestion").hide();
        jQuery(".show_Compliment").show();
        jQuery(".show_Bug").hide();
        jQuery(".show_Question").hide();
    });

    jQuery(".Bug").click(function(){
        jQuery(".show_Suggestion").hide();
        jQuery(".show_Compliment").hide();
        jQuery(".show_Bug").show();
        jQuery(".show_Question").hide();
    });

    jQuery(".Question").click(function(){
        jQuery(".show_Suggestion").hide();
        jQuery(".show_Compliment").hide();
        jQuery(".show_Bug").hide();
        jQuery(".show_Question").show();
    });

});

                             </script>

@endif



</body>
</html>
