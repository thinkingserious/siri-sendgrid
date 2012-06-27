<?php
// The Parse API requires you to return status 200
header("HTTP/1.1 200 OK");

function curl_me_bro($rq, $pms){
	// Generate curl request
	$session = curl_init($rq);
	// Tell curl to use HTTP POST
	curl_setopt ($session, CURLOPT_POST, true);
	// Tell curl that this is the body of the POST
	curl_setopt ($session, CURLOPT_POSTFIELDS, $pms);
	// Tell curl not to return headers, but do return the response
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	// obtain response
	$response = curl_exec($session);
	curl_close($session);
	return $response;
}

// START For Debugging
// This stores what SendGrid's PARSE API is returing
$fh = fopen('dump.log', 'a+');

if ( $fh )
{
	// Dump parameters
	fwrite($fh, print_r($_POST, true) . print_r($_FILES, true));
	fclose($fh);
	// Dump any files posted
	foreach ($_FILES as $key => $file){
		move_uploaded_file($file['tmp_name'], $file['name']);
	}
}
// END For Debugging

$url = 'http://sendgrid.com/';
$user = '[[SendGrid Username]]';
$pass = '[[SendGrid Password]]'; 

$subject = $_POST['subject'];
$text =  $_POST['text'];

// Use this variable as your API switch. In this case, there is on only one.
$api = $subject;
// Use this variable as the API command. In this case, there is no command.
$command = $text;

// The one and only action Siri will understand. Create some more!
if($api == "Motivate me"){
	// Include the Twilio PHP library
	require 'Services/Twilio.php';
	// Twilio REST API version
	$version = "2010-04-01";
	// Set our Account SID and AuthToken
	$sid = '[[Twilio SID]]';
	$token = '[[Twilio Token]]';
	// A phone number you have previously validated with Twilio
	$phonenumber = '[[XXXXXXXXXX]]';
	// Instantiate a new Twilio Rest Client
	$client = new Services_Twilio($sid, $token, $version);
	try {
		// Initiate a new outbound call
		$call = $client->account->calls->create(
		$phonenumber, // The number of the phone initiating the call
		'[[XXXXXXXXXX]]', // The number of the phone receiving call
		'[[yourdomain.com/twiml.xml]]' // The URL Twilio will request when the call is answered
	);
	echo 'Started call: ' . $call->sid;
	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}
}

// START For Debugging
// This emails you the results of your voice commands to Siri
$params = array(
	'api_user'  => $user,
	'api_key'   => $pass,
	'to'        => '[[Your Email]]',
	'subject'   => $_POST['subject'],
	'html'      => $html,
	'text'      => $text,
	'from'      => '[[From Email]]',
);
 
$request =  $url.'api/mail.send.json';
curl_me_bro($request, $params); 
// END For Debugging

?>
