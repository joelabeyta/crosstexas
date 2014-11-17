<?php session_start();

	$_SESSION['logged_in'] = 0;

	$user_name = 0;
	$user_pass = 0;

	if(!empty($_POST['user_name']) && $_POST['user_name'] == 'admin') {
		$user_name = 1;
	} else {
		$user_name = 0;
	}

	if(!empty($_POST['user_pass']) && $_POST['user_pass'] == 'admin') {
		$user_pass = 1;
	} else {
		$user_pass = 0;
	}

	if(empty($_POST['logout'])) {
		if($user_name == 1 && $user_pass == 1) {
			$_SESSION['logged_in'] = 1;

			$url = strtok($_POST['contact_page'], '?');
			header( "Location: $url" );
		} else {
			$_SESSION['logged_in'] = 0;

			$warnings = '?fail=99';
			$url = strtok($_POST['contact_page'], '?').$warnings;
			header( "Location: $url" );
		}		
	}

	// log out
	if(!empty($_POST['logout']) && $_POST['logout'] == 1) {
		$_SESSION['logged_in'] = 0;

		$url = strtok($_POST['contact_page'], '?');
		header( "Location: $url" );		
	}
?>