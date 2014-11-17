<?php session_start();
	// store some session variables to repopulate form if errors occur
	$_SESSION['field_1_required'] = $_POST['field_1_required'];
	$_SESSION['field_2_required'] = $_POST['field_2_required'];
	$_SESSION['field_3'] = $_POST['field_3'];
	$_SESSION['field_4'] = $_POST['field_4'];
	$_SESSION['field_5_required'] = $_POST['field_5_required'];
	$_SESSION['field_6'] = $_POST['field_6'];
	$_SESSION['field_7'] = $_POST['field_7'];
	$_SESSION['field_8'] = $_POST['field_8'];
	$_SESSION['field_text'] = $_POST['field_text'];

    // recaptcha stuff
	require_once('recaptchalib.php');
	// .dev
	$privatekey = "6LcA2_0SAAAAABmf0HJiimFt4urReHpAHQCyuEFg";

	// .crane-west.net
	// $privatekey = "6Lcf4_0SAAAAAHPHHMDyfXHIPNzKHZv5RLh8IsQu";

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
		if(empty($_POST['field_1_required']) || empty($_POST['field_2_required']) || empty($_POST['field_5_required'])) {
			$warnings = '?fail=2';


			if(empty($_POST['field_1_required'])) {
				$warnings .= '&req_field_1=1';
			}

			if(empty($_POST['field_2_required'])) {
				$warnings .= '&req_field_2=1';
			}

			if(empty($_POST['field_5_required'])) {
				$warnings .= '&req_field_5=1';
			}

			$url = strtok($_POST['contact_page'], '?').$warnings;

			header( "Location: $url" );
			die;
		} else {
			// everthing is good

			// email stuff here
			//define the receiver of the email
			$to = 'joel@crane-west.net, BChoate@marketwave.biz';

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
				echo "Name: ".$_POST['field_1_required']." ".$_POST['field_2_required']."\r\n";
				if(!empty($_POST['field_4'])) { echo "Phone: ".$_POST['field_4']."\r\n"; }
				if(!empty($_POST['field_7'])) { echo "Address: ".$_POST['field_7']."\r\n"; }
				if(!empty($_POST['field_8'])) { echo "Address 2: ".$_POST['field_8']."\r\n"; }
				if(!empty($_POST['field_6'])) { echo "City: ".$_POST['field_6']."\r\n"; }
				if(!empty($_POST['field_st'])) { echo "State: ".$_POST['field_st']."\r\n"; }
				if(!empty($_POST['field_9'])) { echo "Zip: ".$_POST['field_9']."\r\n"; }
				if(!empty($_POST['field_3'])) { echo "Company: ".$_POST['field_3']."\r\n"; }
				if(!empty($_POST['inquiry_type'])) { echo "Inquiry Type: ".$_POST['inquiry_type']."\r\n"; }
				if(!empty($_POST['field_text'])) { echo $_POST['field_text']; }
			?>

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

			<?php
				echo 'Name: '.$_POST['field_1_required'].' '.$_POST['field_2_required'].'<br>';
				if(!empty($_POST['field_4'])) { echo 'Phone: '.$_POST['field_4'].'<br>'; }
				if(!empty($_POST['field_7'])) { echo 'Address: '.$_POST['field_7'].'<br>'; }
				if(!empty($_POST['field_8'])) { echo 'Address 2: '.$_POST['field_8'].'<br>'; }
				if(!empty($_POST['field_6'])) { echo 'City: '.$_POST['field_6'].'<br>'; }
				if(!empty($_POST['field_st'])) { echo 'State: '.$_POST['field_st'].'<br>'; }
				if(!empty($_POST['field_9'])) { echo 'Zip: '.$_POST['field_9'].'<br>'; }
				if(!empty($_POST['field_3'])) { echo 'Company: '.$_POST['field_3'].'<br>'; }
				if(!empty($_POST['inquiry_type'])) { echo 'Inquiry Type: '.$_POST['inquiry_type'].'<br>'; }
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

			// clear session
			session_destroy();

			$url = strtok($_POST['contact_page'], '?').$warnings;			
			header( "Location: $url" );
		}
	}
?>