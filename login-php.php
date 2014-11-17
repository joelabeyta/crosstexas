<?php session_start();
	$page_title = 'Cross Texas Employee Login';
	include 'header.php';
?>

<div class="row">
	<?php include 'sidebar.php'; ?>

	<div class="medium-8 large-8 columns page-content">
		<section>
			<?php if(isset($_GET['fail']) && $_GET['fail'] == 1) { echo '<div class="warning">Incorrect username and/or password. Please try again.</div>'; } ?>
		</section>

		<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 ) {
			echo '<div class="success">Logged In</div>';

			echo '<section>';
				include('user-files.php');
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
					<div class="medium-9 large-9 columns"><input id="user_pass" name="user_pass" type="text" /></div>
				</div>

				<input class="button" type="submit" value="Log In" />
			</form>
		</section>

		<?php } ?>
	</div>

</div>

<?php include 'footer.php'; ?>