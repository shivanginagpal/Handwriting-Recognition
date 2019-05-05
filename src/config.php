<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("506796802318-i93avufgo2lgu4rmo6r49alq0lv21kas.apps.googleusercontent.com");
	$gClient->setClientSecret("UUhHLKSCVHxuqF9Q_7ep8zLw");
	$gClient->setApplicationName("Handwriting To Text");
	$gClient->setRedirectUri("http://ec2-34-221-182-162.us-west-2.compute.amazonaws.com/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/drive.file");
  $service = new Google_Service_Drive($gClient);
?>

