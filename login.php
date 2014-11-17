<?php session_start(); ?>
<!doctype html>
<!--[if lt IE 7]> <html style="margin-top: 0!important;" class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html style="margin-top: 0!important;" class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html style="margin-top: 0!important;" class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html style="margin-top: 0!important;" class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Cross Texas | Cross Texas Employee Login</title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="author" href="/humans.txt">
	<link rel="dns-prefetch" href="//ajax.googleapis.com">

	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/style.min.css?v=130111514" />
	<link rel="stylesheet" href="/custom-styles.css" />
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="/css/ie.css" />
		<![endif]-->
		
		<script src="/js/modernizr.js"></script>
	</head>
	<body class="cross-texas-employee-login">

		<header role="banner" style="background-image: url(/img/cross-texas-employee-login-bg.jpg);">
			<div class="contain-to-grid">
				<nav class="top-bar" data-topbar role="navigation">
					<ul class="title-area">
						<li class="name">
							<h1><a href="/" title="Cross Texas Transmission"><img src="/img/ctt-logo.png" alt="Cross Texas Transmission" /></a></h1>
						</li>
						<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
					</ul>

					<section class="top-bar-section cf">
						<ul class="menu right">
							<li class="menu-item">
								<a href="/texas-energy/">Texas Energy</a>
							</li>

							<li class="menu-item has-dropdown">
								<a href="/about/">About</a>

								<ul class="dropdown">
									<li class="show-for-small"><a href="/about/">About</a></li>
									<li><a href="/about/experience.php">Experience</a></li>
									<li class="active"><a href="/contact/">Contact</a></li>
								</ul>
							</li>

							<li class="menu-item has-dropdown">
								<a href="/projects/">Projects</a>

								<ul class="dropdown">
									<li class="show-for-small"><a href="/projects/">Projects</a></li>
									<li class="dd-title">New Projects</li>
									<li><a href="/projects/limestone-to-gibbons-creek.php" title="Limestone To Gibbons Creek">Limestone To Gibbons Creek</a></li>
									<li><a href="/projects/salt-fork-to-gray.php" title="Salt Fork To Gray">Salt Fork To Gray</a></li>
									<li><a href="/projects/pattern-panhandle-wind-iii.php" title="Pattern Panhandle Wind III">Pattern Panhandle Wind III</a></li>
									<li class="dd-title">Existing Projects</li>
									<li><a href="/projects/" title="Landowner Information">Landowner Information</a></li>
									<li><a href="/projects/existing-transmission-system.php" title="Existing Transmission System">Existing Transmission System</a></li>
								</ul>
							</li>

							<li class="menu-item">
								<a href="/community/">Community</a>
							</li>

							<li class="menu-item">
								<a href="/faqs/">FAQs</a>
							</li>

							<li class="menu-item has-dropdown">
								<a href="/contact/">Contact</a>

								<ul class="dropdown">
									<li class="show-for-small"><a href="/contact/">Contact</a></li>
									<li><a href="/contact/careers.php">Careers</a></li>
								</ul>
							</li>
						</ul>
					</section>
				</nav>
			</div>
			<div class="page-title-container row">
				<div class="large-12 columns">
					<h2 class="page-title">Cross Texas Employee Login</h2>
				</div>
			</div>
		</header>

		<div role="main">
			<div class="row">
				<aside class="medium-4 large-4 columns" role="complementary">
					<ul>
						<li><a href="login.php"  title="Employee Login">Employee Login</a></li>
					</ul></aside>
					<div class="medium-8 large-8 columns page-content">
						<?php if(isset($_GET['fail']) && $_GET['fail'] == 99) { echo '<section><div class="warning">Incorrect username and/or password. Please try again.</div></section>'; } ?>
						
						<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 ) {
							echo '<section><div class="success">Logged In</div></section>';

							echo '<section>';
								include('logged-in-content.php');
							echo '</section>';
						} else { ?>
						
						<section>
							<form class="login-form" method="post" action="/verify-login.php">
								<?php 
									function curPageURL() {
										$pageURL = 'http://';
										if ($_SERVER["SERVER_PORT"] != "80") {
											$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
										} else {
											$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
										}
										return $pageURL;
									}
								?>							
								<input type="hidden" name="contact_page" value="<?php echo curPageURL(); ?>" />

								<div class="row">
									<label class="medium-3 large-3 columns" for="user_name">User Name</label>
									<div class="medium-9 large-9 columns"><input id="user_name" name="user_name" type="text" /></div>
								</div>

								<div class="row">
									<label class="medium-3 large-3 columns" for="user_pass">Password</label>
									<div class="medium-9 large-9 columns"><input id="user_pass" name="user_pass" type="text" autocomplete="off" /></div>
								</div>

								<input class="button" type="submit" value="Log In" />
							</form>
						</section>

						<?php } ?>

					</div>

				</div>

				
			</div> <!-- end [role="main"] -->
			
			<footer role="contentinfo">
				<div class="row">
					<div class="medium-6 large-6 columns">
						<img class="footer-logo" src="/img/footer-logo.png" alt="" />

						<a class="login" href="/login.php">Employee Login</a>

						<p class="footer-info">Copyright &copy; 2014 | <a href="/contact/">Contact Us</a> | <a href="/privacy-policy.php">Privacy Policy</a> | <a href="/regulatory-notices.php" >Regulatory Notices</a></p>
					</div>

					<div class="medium-6 large-6 columns footer-address">
						<p>
							<b>AUSTIN OFFICE</b><br>
							1122 South Capital of Texas Highway<br>
							Suite 100<br>
							Austin, Texas 78746<br>
							512.473.2700
							<br>
							<br>
							<b>AMARILLO OFFICE</b><br>
							3469 S Loop 335 East<br>
							Amarillo, Texas 79118<br>
							806.350.5900
						</p>
					</div>
				</div>
			</footer>

			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="/js/production.min.js"></script>
			<script src="/custom-js.js"></script>
		</body>
		</html>