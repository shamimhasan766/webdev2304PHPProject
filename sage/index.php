<?php 
session_start();
require 'includes/db.php';

// Logo
$logo_select= "SELECT * FROM logos WHERE id=1";
$logo_res = mysqli_query($connect,$logo_select);
$after_assoc_logo = mysqli_fetch_assoc($logo_res);


// Intro
$intros = "SELECT * FROM intros WHERE id=1";
$intros_res = mysqli_query($connect,$intros);
$intros_res_assoc = mysqli_fetch_assoc($intros_res);


// Skill
$select_skills = "SELECT * FROM skills WHERE status=1";
$select_skills_res = mysqli_query($connect, $select_skills);
$skills_assoc = mysqli_fetch_assoc($select_skills_res); 


// Service
$select_services = "SELECT * FROM services WHERE status=1" ;
$select_services_res = mysqli_query($connect, $select_services);
$services_assoc = mysqli_fetch_assoc($select_services_res); 



// Portfolio
$select_portfolios = "SELECT * FROM portfolios WHERE status=1" ;
$select_portfolios_res = mysqli_query($connect, $select_portfolios);
$portfolios_assoc = mysqli_fetch_assoc($select_portfolios_res); 


// Testimonial
$select_testimonial = "SELECT * FROM testimonial WHERE status=1" ;
$select_testimonial_res = mysqli_query($connect, $select_testimonial);
$testimonial_assoc = mysqli_fetch_assoc($select_testimonial_res); 


// Menu
$select_menu = "SELECT * FROM menu WHERE status=1" ;
$select_menu_res = mysqli_query($connect, $select_menu);
$menu_assoc = mysqli_fetch_assoc($select_menu_res); 


// Copyright
$select_copyright = "SELECT * FROM copyright WHERE id=1" ;
$select_copyright_res = mysqli_query($connect, $select_copyright);
$copyright_assoc = mysqli_fetch_assoc($select_copyright_res); 
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="portfolio,creative,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themeturn.com">

  <title>Shamim Hasan</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Themeify Icon Css -->
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <!-- owl carousel -->
  <link rel="stylesheet" href="plugins/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="plugins/owl/assets/owl.theme.default.min.css" >
  <!-- Slick slider CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="portfolio" id="top">


<!-- Navigation start -->
<!-- Header Start --> 

<nav class="navbar navbar-expand-lg bg-transprent py-4 fixed-top navigation" id="navbar">
	<div class="container">
	  <a class="navbar-brand" href="index.html">
		<?php if($after_assoc_logo['header_logo'] == !NULL) {?>
	  	<img width="120px" src="uploads/logo/<?=$after_assoc_logo['header_logo']?>" alt="">
		<?php }else if($after_assoc_logo['header_text']== !NULL){ ?>
			<h3><?=$after_assoc_logo['header_text']?></h3>
		<?php } ?>
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
		<span class="ti-view-list"></span>
	  </button>
  
	  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
				<?php foreach($select_menu_res as $menu):?>
			   		<li class="nav-item"><a class="nav-link" href="<?=$menu['link']?>"><?=$menu['menu']?></a></li>
			   <?php endforeach; ?>
			</ul>
	  </div>
	</div>
</nav>


<!-- Navigation End -->

<!-- Banner start -->

<!-- Slider Start -->
<section class="slider py-7 ">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5 col-sm-12 col-12 col-md-5">
				<div class="slider-img position-relative">
					<img src="uploads/intro/<?=$intros_res_assoc['intro_img']?>" alt="" class="img-fluid w-100">
				</div>
			</div>

			<div class="col-lg-6 col-12 col-md-7">
				<div class="ml-5 position-relative mt-5 mt-lg-0">
					<span class="head-trans"><?=$intros_res_assoc['watermark']?></span>
					<h1 class="font-weight-normal text-color text-md"><i class="ti-minus mr-2"></i><?=$intros_res_assoc['title']?></h1>
					<h2 class="mt-3 text-lg mb-3 text-capitalize"><?=$intros_res_assoc['name']?>.</h2>
					<p class="animated fadeInUp lead mt-4 mb-5 text-white-50 lh-35"><?=$intros_res_assoc['description']?></p>
					<a href="#about" class="btn btn-solid-border"><?=$intros_res_assoc['button']?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner End -->

<!-- Skills start -->
<section class="section bg-gray" id="skillbar" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>Skills Set</span>
					<h2 class="title"><?=$skills_assoc['name']?></h2>
				</div>
			</div>
		</div>
		<div class="row">
		<?php foreach($select_skills_res as $skill):?>
			<div class="col-lg-6 col-md-6">
				<div class="skill-bar mb-4 mb-lg-0">
					<div class="mb-4 text-right"><h4 class="font-weight-normal"><?=$skill['skill_title']?></h4></div>
					<div class="progress">
						<div class="progress-bar" data-percent="<?=$skill['skill_rate']?>">
							<span class="percent-text"><span class="count"><?=$skill['skill_rate']?></span>%</span>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</section>	

<!-- Skills End -->

<!-- Service start -->
<section class="section bg-gray" id="service" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>What i do</span>
					<h2 class="title"><?=$services_assoc['name']?></h2>
				</div>
			</div>
		</div>

		<div class="row no-gutters">
		<?php foreach($select_services_res as $service):?>
			<div class="col-lg-4 col-md-6">
				<div class="card p-5 rounded-0">
					<h3 class="my-4 text-capitalize"><?=$service['service_title']?></h3>
					<p><?=$service['service_description']?></p>
				</div>
			</div>
		<?php endforeach; ?>
		</div>

		<div class="row align-items-center mt-5" data-aos="fade-up">
			<div class="col-lg-6 mt-5">
				<h2 class="mb-5 text-lg-2 text-white-50"><?=$services_assoc['footer_intro'] ?> </h2>
			</div>
			<div class="col-lg-4 ml-auto text-right">
				<a href="#contact" class="btn btn-main text-white smoth-scroll"><?=$services_assoc['footer_button'] ?></a>
			</div>
		</div>
	</div>
</section>
<!-- Service End -->

<!-- Portfolio start -->
<section class="section" id="portfolio" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus"></i>works</span>
					<h2 class="title"><?=$portfolios_assoc['heading']?></h2>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="post_gallery owl-carousel owl-theme">
			<?php foreach($select_portfolios_res as $portfolio):?>
				<div class="item">
					<div class="portfolio-item position-relative">
						<img src="./uploads/portfolios/<?=$portfolio['image']?>" alt="" class="img-fluid">

						<div class="portoflio-item-overlay">
							<a href="<?=$portfolio['link']?>"><i class="ti-plus"></i></a>
						</div>
					</div>
					<div class="text mt-3">
						<h4 class="mb-1 text-capitalize"><?=$portfolio['name']?></h4>
						<p class="text-uppercase letter-spacing text-sm"><?=$portfolio['title']?></p>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<!-- Portfolio End -->

<!-- Tetsimonial start -->
<section id="testimonial" class="section testomionial" data-aos="fade-up">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="section-title">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>testimonial</span>
					<h1 class="title"><?=$testimonial_assoc['heading']?></h1>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="testimonial-slider">
				<?php foreach($select_testimonial_res as $testimonial):?>
					<div class="testimonial-item position-relative">
						<i class="ti-quote-left text-white-50"></i>
						<div class="testimonial-content">
							<p class="text-md mt-3"><?=$testimonial['comment']?></p>

							<div class="media mt-5 align-items-center">
								<img width="80" height="80" src="./uploads/testimonial/<?=$testimonial['image']?>" alt="" class="img-fluid  rounded-circle align-self-center mr-4">
								<div class="media-body">
									<h3 class="mb-0"><?=$testimonial['name']?></h3>
									<span class="text-muted"><?=$testimonial['title']?></span>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>	
				</div>
			</div>	
		</div>
	</div>
</section>
<!-- Tetsimonial End -->

<!-- Contact start -->
<section class="section" id="contact" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>Contact</span>
					<h1 class="title">Get in Touch</h1>
				</div>
			</div>
		</div>

		<div id="messages" class="row justify-content-center">
			<div class="col-lg-8">
				<form class="contact__form form-row contact-form" method="post" action="/class11/sage/messages/messages.php">
					 <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>
					<div class="form-group col-lg-6 mb-5">
						<input type="text" id="name" name="name" class="form-control bg-transparent" placeholder="Your Name">
					</div>
					<div class="form-group col-lg-6 mb-5">
						<input type="text" name="email" id="email" class="form-control bg-transparent" placeholder="Your Email">
					</div>
					<div class="form-group col-lg-12 mb-5">
						<input type="text" name="subject" id="subject" class="form-control bg-transparent" placeholder="Your Subject">
					</div>
					
					<div class="form-group col-lg-12 mb-5">
						<textarea id="message" name="message" cols="30" rows="6" class="form-control bg-transparent" placeholder="Your Message"></textarea>
						
						<div class="text-center">
							 <input class="btn btn-main text-white mt-5" id="submit" name="submit" type="submit" class="btn btn-hero" value="Send Message">
						</div>
					</div>
				</form>
				<?php if(isset($_SESSION['message_success'])){ ?>
					<div class="alert alert-success"><?=$_SESSION['message_success']?></div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<!-- Contact End -->

<!-- Footer start -->
<footer class="footer border-top-1">
	<div class="container">
		<div class="row align-items-center text-center text-lg-left">
			<div class="col-lg-2">
			<?php if($after_assoc_logo['footer_logo'] == !NULL) {?>
				<img width="120px" src="uploads/logo/<?=$after_assoc_logo['footer_logo']?>" alt="">
			<?php }else if($after_assoc_logo['footer_text']== !NULL){ ?>
				<h3><?=$after_assoc_logo['footer_text']?></h3>
			<?php } ?>
			
			</div>
			<div class="col-lg-10">
				<div class="text-right">
					<p class="lead"><?=$copyright_assoc['copyright']?></p>
					<a href="#top" class="backtop smoth-scroll"><i class="ti-angle-up"></i></a>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer End -->


    <!-- 
    Essential Scripts
    =====================================-->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/nav/jquery.easing.1.3.html"></script>
    
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="plugins/owl/owl.carousel.min.js"></script>
  
    <!-- Skill COunt -->
    <script src="plugins/counto/apear.js"></script>
    <script src="plugins/counto/counTo.js"></script>
    <!-- AOS Animation -->
    <script src="plugins/aos/aos.js"></script>
    
    <script src="js/script.js"></script>
    <script src="js/ajax-contact.html"></script>

  </body>
</html>
<?php 
unset($_SESSION['message_success']);
?>