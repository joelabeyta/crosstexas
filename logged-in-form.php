<?php session_start(); ?>
<section>
	<?php 
	if(isset($_GET['fail']) && $_GET['fail'] == 1) { echo '<div class="warning">reCAPTCHA blank or entered incorrectly.<br>Please try again.<br><small>ERROR: '.$_GET['error'].'</small></div>'; }
	if(isset($_GET['fail']) && $_GET['fail'] == 2) { echo '<div class="warning">Please fill in all required fields.</div>'; }
	if(isset($_GET['fail']) && $_GET['fail'] == 3) { echo '<div class="warning">Something went wrong. Please try again later.</div>'; }
	if(isset($_GET['success']) && $_GET['success'] == 1) { echo '<div class="success">Thank you for you comments. We will get back with you shortly.</div>'; }
	?>
</section>

<section>
	<form class="contact-form cf" method="post" action="../verify-empl-contact.php">
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
			<label class="medium-3 large-3 columns" for="inquiry-type">Choose one*</label>
			<div class="medium-9 large-9 columns">
				<select id="inquiry-type" name="inquiry_type" <?php if(isset($_GET['inquiry_type'])) { echo 'class="error"'; } ?>>
					<option value="">Choose One:</option>
					<option class="select-dash" disabled="disabled">----</option>
					<option value="suggestion-comment">Suggestion/Comment</option>
					<option value="Complaint">Complaint</option>
				</select>
				<?php if(isset($_GET['inquiry_type'])) { echo '<small class="error">Required Field</small>'; } ?>
			</div>
		</div>

		<div class="row">
			<label class="medium-3 large-3 columns <?php if(isset($_GET['field_1'])) { echo 'error'; } ?>" for="field_1">First Name&dagger;</label>
			<div class="medium-9 large-9 columns">
				<input id="field_1" <?php if(isset($_SESSION['field_1'])) { echo 'value="'.$_SESSION['field_1'].'"'; } ?> name="field_1" type="text" />
			</div>
		</div>

		<div class="row">
			<label class="medium-3 large-3 columns <?php if(isset($_GET['field_2'])) { echo 'error'; } ?>" for="field_2">Last Name&dagger;</label>
			<div class="medium-9 large-9 columns">
				<input id="field_2" <?php if(isset($_GET['field_2'])) { echo 'class="error"'; } if(isset($_SESSION['field_2'])) { echo 'value="'.$_SESSION['field_2'].'"'; } ?> name="field_2" type="text" />
			</div>
		</div>

		<div class="row">
			<label class="medium-3 large-3 columns <?php if(isset($_GET['field_3'])) { echo 'error'; } ?>" for="field_3">Email&dagger;</label>
			<div class="medium-9 large-9 columns">
				<input id="field_3" <?php if(isset($_GET['field_3'])) { echo 'class="error"'; } if(isset($_SESSION['field_3'])) { echo 'value="'.$_SESSION['field_3'].'"'; } ?> name="field_3" type="email" />
			</div>
		</div>

		<div class="row">
			<label class="medium-3 large-3 columns" for="field_text">Comments*</label>
			<div class="medium-9 large-9 columns">
				<textarea id="field_text" name="field_text" placeholder="Please provide an overview of your feedback with as much detail as possible."  <?php if(isset($_GET['field_text'])) { echo 'class="error"'; } ?>><?php if(isset($_SESSION['field_text'])) { echo $_SESSION['field_text']; } ?></textarea>
				<?php if(isset($_GET['field_text'])) { echo '<small class="error">Required Field</small>'; } ?>
			</div>
		</div>

		<p class="required">Required Field*<br>Optional Field&dagger;</p>

		<div class="captcha">
			<script type="text/javascript">
				var RecaptchaOptions = {
					theme : 'clean'
				};
			</script>
			<?php
				require_once('recaptchalib.php');
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


<form class="login-form" method="post" action="/verify-login.php">
	
	<input type="hidden" name="contact_page" value="<?php echo curPageURL(); ?>" />
	<input type="hidden" name="logout" value="1" />

	<input class="button" type="submit" value="Log Out" />
</form>