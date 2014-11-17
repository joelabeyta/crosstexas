<ul>
	<li>File 1</li>
	<li>File 2</li>
	<li>Another File</li>
	<li>File 4</li>
	<li>File 5</li>
</ul>

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
	<input type="hidden" name="logout" value="1" />

	<input class="button" type="submit" value="Log Out" />
</form>