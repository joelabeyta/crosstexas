<?php session_start();
	// store some session variables to repopulate form if errors occur
	$_SESSION['inquiry_type'] = $_POST['inquiry_type'];

	$_SESSION['field_1'] = $_POST['field_1'];
	$_SESSION['field_2'] = $_POST['field_2'];
	$_SESSION['field_3'] = $_POST['field_3'];

	$_SESSION['field_text'] = $_POST['field_text'];

    // recaptcha stuff
	require_once('recaptchalib.php');
	// .dev
	// $privatekey = "6LcA2_0SAAAAABmf0HJiimFt4urReHpAHQCyuEFg";

	// .crane-west.net
	$privatekey = "6Lcf4_0SAAAAAHPHHMDyfXHIPNzKHZv5RLh8IsQu";

	//.com
	// $privatekey = "6Lemmf0SAAAAAG0J-KoeHKiIS6gfrA_G-YFBRDKZ";

	$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

	if (!$resp->is_valid) {
		// if recaptcha is wrong or empty
		$warnings = '?fail=1';
		$warnings .= '&error='.$resp->error;
		$url = strtok($_POST['contact_page'], '?').$warnings;
		header( "Location: $url" );
		die;
	} else {
		// captcha correct but required fields are empty
		if(empty($_POST['inquiry_type'])) {
			$warnings = '?fail=2';

			if(empty($_POST['inquiry_type'])) {
				$warnings .= '&inquiry_type=1';
			}

			$url = strtok($_POST['contact_page'], '?').$warnings;

			header( "Location: $url" );
			die;
		} else {
			// everthing is good

			// email stuff here
			//define the receiver of the email
			// $to = 'joel@crane-west.net, BChoate@marketwave.biz';
			$to = 'joel@crane-west.net';

			//define the subject of the email
			$subject = 'crosstexas.com Contact Form submission from '.$_POST['field_5_required']; 

			//create a boundary string. It must be unique 
			//so we use the MD5 algorithm to generate a random hash
			$random_hash = md5(date('r', time())); 

			//define the headers we want passed. Note that they are separated with \r\n
			$headers = "From: info@crosstexas.com\r\nReply-To: info@crosstexas.com";

			//add boundary string and mime type specification
			$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\""; 

			//define the body of the message.
			ob_start(); //Turn on output buffering
			?>
--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

			<?php
				if(!empty($_POST['field_1'])) { echo "Name: ".$_POST['field_1']." "; }
				if(!empty($_POST['field_2'])) { echo $_POST['field_2']."\r\n"; }

				if(!empty($_POST['field_3'])) { echo "Email: ".$_POST['field_3']."\r\n"; }
				if(!empty($_POST['inquiry_type'])) { echo $_POST['inquiry_type']."\r\n"; }
				if(!empty($_POST['field_text'])) { echo $_POST['field_text']; }
			?>

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

			<?php
				echo '<p>';
					if(!empty($_POST['field_1'])) { echo 'Name: '.$_POST['field_1'].' '; }
					if(!empty($_POST['field_2'])) { echo $_POST['field_2']; }
				echo '</p>';

				if(!empty($_POST['field_3'])) { echo '<Email: '.$_POST['field_3'].'<br>'; }
				if(!empty($_POST['inquiry_type'])) { echo $_POST['inquiry_type'].'<br>'; }
				if(!empty($_POST['field_text'])) { echo '<p>'.$_POST['field_text'].'</p>'; }
			?>

--PHP-alt-<?php echo $random_hash; ?>--
			<?
			//copy current buffer contents into $message variable and delete current output buffer
			$message = ob_get_clean();

			//send the email
			$mail_sent = @mail( $to, $subject, $message, $headers );

			//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
			$mail_sent ? $warnings = '?success=1' : $warnings = '?fail=3';;

			$url = strtok($_POST['contact_page'], '?').$warnings;			
			header( "Location: $url" );
		}
	}
?>