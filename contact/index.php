<?php session_start(); ?>
<!doctype html>
<!--[if lt IE 7]> <html style="margin-top: 0!important;" class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html style="margin-top: 0!important;" class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html style="margin-top: 0!important;" class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html style="margin-top: 0!important;" class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Cross Texas | Contact</title>

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
	<body class="contact">

		<header role="banner" style="background-image: url(/img/contact-bg.jpg);">
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
									<li><a href="/about/experience.html">Experience</a></li>
									<li class="active"><a href="/contact/">Contact</a></li>
								</ul>
							</li>

							<li class="menu-item has-dropdown">
								<a href="/projects/">Projects</a>

								<ul class="dropdown">
									<li class="show-for-small"><a href="/projects/">Projects</a></li>
									<li class="dd-title">New Projects</li>
									<li><a href="/projects/limestone-to-gibbons-creek.html" title="Limestone To Gibbons Creek">Limestone To Gibbons Creek</a></li>
									<li><a href="/projects/salt-fork-to-gray.html" title="Salt Fork To Gray">Salt Fork To Gray</a></li>
									<li><a href="/projects/pattern-panhandle-wind-iii.html" title="Pattern Panhandle Wind III">Pattern Panhandle Wind III</a></li>
									<li class="dd-title">Existing Projects</li>
									<li><a href="/projects/" title="Landowner Information">Landowner Information</a></li>
									<li><a href="/projects/existing-transmission-system.html" title="Existing Transmission System">Existing Transmission System</a></li>
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
									<li><a href="/contact/careers.html">Careers</a></li>
								</ul>
							</li>
						</ul>
					</section>
				</nav>
			</div>
			<div class="page-title-container row">
				<div class="large-12 columns">
					<h2 class="page-title">Contact</h2>
				</div>
			</div>
		</header>

		<div role="main">
			<div class="row">
				<aside class="medium-4 large-4 columns" role="complementary">
					<ul>
						<li><a href="/contact/" class="current" title="Contact">Contact</a></li>
						<li><a href="/contact/careers.html"  title="Careers">Careers</a></li>
					</ul></aside>
					<div class="medium-8 large-8 columns page-content">
						<section>
							<?php 
							if(isset($_GET['fail']) && $_GET['fail'] == 1) { echo '<div class="warning">reCAPTCHA blank or entered incorrectly.<br>Please try again.<br><small>ERROR: '.$_GET['error'].'</small></div>'; }
							if(isset($_GET['fail']) && $_GET['fail'] == 2) { echo '<div class="warning">Please fill in all required fields.</div>'; }
							if(isset($_GET['fail']) && $_GET['fail'] == 3) { echo '<div class="warning">Something went wrong. Please try again later.</div>'; }
							if(isset($_GET['success']) && $_GET['success'] == 1) { echo '<div class="success">Thank you for you comments. We will get back with you shortly.</div>'; }
							?>
						</section>

						<h3 class="section-title part-green">Get In <b>Touch</b> With Cross Texas</h3>

						<section>
							<p>Part of being a good community partner is listening to you. We want to have an open dialogue and help answer your questions and concerns. Please feel free to contact us by whichever means is most convenient for you.</p>

							<div class="locations row">
								<div class="location large-6 columns">
									<h4 class="section-title">AUSTIN OFFICE</h4>
									<p>1122 South Capital of Texas Highway<br>
										Suite 100<br>
										Austin, Texas 78746<br>
										512.473.2700</p>
									</div>
									<div class="location large-6 columns">
										<h4 class="section-title">AMARILLO OFFICE</h4>
										<p>3469 S Loop 335 East<br>
											Amarillo, Texas 79118<br>
											806.350.5900</p>
										</div>
									</div>
								</section>

								<section>
									<form class="contact-form cf" method="post" action="verify.php">
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
											<label class="medium-3 large-3 columns" for="inquiry-type">How Can We Help</label>
											<div class="medium-9 large-9 columns">
												<select id="inquiry-type" name="inquiry_type">
													<option value="general-inquiry">General Inquiry</option>
													<option value="public-relations-media-inquiry">Public Relations/Media Inquiry</option>
													<option value="potential-service-provider">Potential Service Provider</option>
													<option value="potential-transaction-provider">Potential Transaction Provider</option>
												</select>
											</div>
										</div>

										<div class="row">
											<label class="medium-3 large-3 columns <?php if(isset($_GET['req_field_1'])) { echo 'error'; } ?>" for="field_1">First Name*</label>
											<div class="medium-9 large-9 columns">
												<input id="field_1" <?php if(isset($_GET['req_field_1'])) { echo 'class="error"'; } if(isset($_SESSION['field_1_required'])) { echo 'value="'.$_SESSION['field_1_required'].'"'; } ?> name="field_1_required" type="text" />
												<?php if(isset($_GET['req_field_1'])) { echo '<small class="error">Required Field</small>'; } ?>
											</div>
										</div>

										<div class="row">
											<label class="medium-3 large-3 columns <?php if(isset($_GET['req_field_2'])) { echo 'error'; } ?>" for="field_2">Last Name*</label>
											<div class="medium-9 large-9 columns">
												<input id="field_2" <?php if(isset($_GET['req_field_2'])) { echo 'class="error"'; } if(isset($_SESSION['field_2_required'])) { echo 'value="'.$_SESSION['field_2_required'].'"'; } ?> name="field_2_required" type="text" />
												<?php if(isset($_GET['req_field_2'])) { echo '<small class="error">Required Field</small>'; } ?>
											</div>
										</div>

										<div class="row">
											<label class="medium-3 large-3 columns" for="field_3">Company</label>
											<div class="medium-9 large-9 columns"><input id="field_3" name="field_3" type="text" <?php if(isset($_SESSION['field_3'])) { echo 'value="'.$_SESSION['field_3'].'"'; } ?> /></div>
										</div>

										<div class="row">
											<label class="medium-3 large-3 columns" for="field_4">Phone Number</label>
											<div class="medium-9 large-9 columns"><input id="field_4" name="field_4" type="text" <?php if(isset($_SESSION['field_4'])) { echo 'value="'.$_SESSION['field_4'].'"'; } ?> /></div>
										</div>

										<div class="row">
											<label class="medium-3 large-3 columns <?php if(isset($_GET['req_field_5'])) { echo 'error'; } ?>" for="field_5">Email*</label>
											<div class="medium-9 large-9 columns">
												<input id="field_5" <?php if(isset($_GET['req_field_5'])) { echo 'class="error"'; } if(isset($_SESSION['field_5_required'])) { echo 'value="'.$_SESSION['field_5_required'].'"'; } ?> name="field_5_required" type="email" />
												<?php if(isset($_GET['req_field_5'])) { echo '<small class="error">Required Field</small>'; } ?>
											</div>
										</div>

										<div class="row">
											<label class="medium-3 large-3 columns" for="field_6">City</label>
											<div class="medium-9 large-9 columns"><input id="field_6" name="field_6" type="text" <?php if(isset($_SESSION['field_6'])) { echo 'value="'.$_SESSION['field_6'].'"'; } ?> /></div>
										</div>
										
										<div class="row">
											<label class="medium-3 large-3 columns" for="field_7">Address 1</label>
											<div class="medium-9 large-9 columns"><input id="field_7" name="field_7" type="text" <?php if(isset($_SESSION['field_7'])) { echo 'value="'.$_SESSION['field_7'].'"'; } ?> /></div>
										</div>

										<div class="row">
											<label class="medium-3 large-3 columns" for="field_8">Address 2</label>
											<div class="medium-9 large-9 columns"><input id="field_8" name="field_8" type="text" <?php if(isset($_SESSION['field_8'])) { echo 'value="'.$_SESSION['field_8'].'"'; } ?> /></div>
										</div>

										<div class="row">
											<label class="medium-3 large-3 columns" for="state">State</label>
											<div class="medium-9 large-9 columns">
												<select id="state" name="field_st">
													<option value="">Select your State</option>
													<option class="select-dash" disabled="disabled">----</option>
													<option value="AL">Alabama</option>
													<option value="AK">Alaska</option>
													<option value="AZ">Arizona</option>
													<option value="AR">Arkansas</option>
													<option value="CA">California</option>
													<option value="CO">Colorado</option>
													<option value="CT">Connecticut</option>
													<option value="DE">Delaware</option>
													<option value="DC">District Of Columbia</option>
													<option value="FL">Florida</option>
													<option value="GA">Georgia</option>
													<option value="HI">Hawaii</option>
													<option value="ID">Idaho</option>
													<option value="IL">Illinois</option>
													<option value="IN">Indiana</option>
													<option value="IA">Iowa</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
													<option value="LA">Louisiana</option>
													<option value="ME">Maine</option>
													<option value="MD">Maryland</option>
													<option value="MA">Massachusetts</option>
													<option value="MI">Michigan</option>
													<option value="MN">Minnesota</option>
													<option value="MS">Mississippi</option>
													<option value="MO">Missouri</option>
													<option value="MT">Montana</option>
													<option value="NE">Nebraska</option>
													<option value="NV">Nevada</option>
													<option value="NH">New Hampshire</option>
													<option value="NJ">New Jersey</option>
													<option value="NM">New Mexico</option>
													<option value="NY">New York</option>
													<option value="NC">North Carolina</option>
													<option value="ND">North Dakota</option>
													<option value="OH">Ohio</option>
													<option value="OK">Oklahoma</option>
													<option value="OR">Oregon</option>
													<option value="PA">Pennsylvania</option>
													<option value="RI">Rhode Island</option>
													<option value="SC">South Carolina</option>
													<option value="SD">South Dakota</option>
													<option value="TN">Tennessee</option>
													<option value="TX">Texas</option>
													<option value="UT">Utah</option>
													<option value="VT">Vermont</option>
													<option value="VA">Virginia</option>
													<option value="WA">Washington</option>
													<option value="WV">West Virginia</option>
													<option value="WI">Wisconsin</option>
													<option value="WY">Wyoming</option>
												</select>
											</div>
										</div>

										<div class="row">
											<label class="medium-3 large-3 columns" for="field_9">Zip</label>
											<div class="medium-9 large-9 columns"><input id="field_9" name="field_9" type="text" <?php if(isset($_SESSION['field_9'])) { echo 'value="'.$_SESSION['field_9'].'"'; } ?> /></div>
										</div>

										<div class="row">
											<label class="medium-3 large-3 columns" for="field_text">Comments</label>
											<div class="medium-9 large-9 columns">
												<textarea id="field_text" name="field_text" <?php if(isset($_SESSION['field_text'])) { echo 'value="'.$_SESSION['field_text'].'"'; } ?> ></textarea>
											</div>
										</div>

										<p class="required">Required Field*</p>

										<div class="captcha">
											<script type="text/javascript">
												var RecaptchaOptions = {
													theme : 'clean'
												};
											</script>
											<?php
												require_once('../recaptchalib.php');
												// .dev
												// $publickey = "6LcA2_0SAAAAADuGcAEvsVh_-Z-gZb3jeLzjYA6w";

												// .crane-west.net
												$publickey = "6Lcf4_0SAAAAAKYRum6Jp-3qqeHN74UaAs6gBw-j";

												// .com
												// $publickey = "6Lemmf0SAAAAAMap-pgMHtzsqrLk1SHVQtOLil9l";

												echo recaptcha_get_html($publickey);
											?>
										</div>

										<input class="button" type="submit" value="Submit" />
									</form>
								</section>

								<section>
									<h3 class="section-title part-green">Frequently Asked <b>Questions</b></h3>
									<p>If you have a specific question, please check our frequently asked questions section by clicking <a href="/faqs/">here</a>.</p>
								</section>
							</div>
						</div>


							<div class="contact row">
								<div class="large-12 columns">
									<h3 class="contact-title borders green">Get In <b>Touch</b></h3>
								</div>

								<div class="large-12 columns">
									<div class="row">
										<div class="contact-section medium-6 large-6 columns">
											<h3 class="contact-section-title">Ask Us A Question</h3>
											<p>We’re here to answer your questions about energy and new projects that aim to improve reliability of the Texas electric grid.</p>
											<a class="contact-button button show-for-small" href="/contact/">Contact Us</a>
										</div>

										<div class="contact-section medium-6 large-6 columns">
											<h3 class="contact-section-title">Regulatory Compliance</h3>
											<p>Cross Texas Transmission adheres to all guidelines set forth by state regulatory groups.</p>
											<a class="contact-button button show-for-small" href="/regulatory-notices.html">View Notices</a>
										</div>
									</div>
								</div>

								<div class="large-12 columns show-for-medium-up">
									<div class="row">
										<div class="contact-section medium-6 large-6 columns">
											<a class="contact-button button" href="/contact/">Contact Us</a>
										</div>

										<div class="contact-section medium-6 large-6 columns">
											<a class="contact-button button" href="/regulatory-notices.html">View Notices</a>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- end [role="main"] -->

						<footer role="contentinfo">
							<div class="row">
								<div class="medium-6 large-6 columns">
									<img class="footer-logo" src="/img/footer-logo.png" alt="" />

									<a class="login" href="/login.php">Employee Login</a>

									<p class="footer-info">Copyright &copy; 2014 | <a href="/contact/">Contact Us</a> | <a href="/privacy-policy.html">Privacy Policy</a> | <a href="/regulatory-notices.html" >Regulatory Notices</a></p>
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