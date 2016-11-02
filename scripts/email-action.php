<?php

include("scripts/header.php");
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['email'])) {

	$email_to = "contact@paulyruss.com";
	$email_subject = "New Message Submitted From PaulyRuss.net";


	// validation expected data exists
	if(!isset($_POST['email']) ||
		!isset($_POST['comment'])) {
		die("Sorry, there was a problem. Please ensure you've entered both a valid email address and filled in the message box.");
	}

	$email_from = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL); // required
	$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING); // required

	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
  	$error_message = 'Please doublecheck the email entered is in the correct format (yourname@example.com).<br />';
  }

  if(strlen($comment) < 5) {
  	$error_message .= 'Please doublecheck that the message box is filled out with a comment or message.<br />';
  }

  if(strlen($error_message) > 0) {
  	die($error_message);
  }

	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}

	$email_message = "comment: ".clean_string($comment)."\n";
// create email headers

$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<div class="jumbotron intro section bg-img-section" id="home">
	<h1>Thank You! </h1>
	<p class="lead">I'll review your message and get back to you as soon as possible. In the meantime, feel free to connect on those social type sites:</p>
	<div class="col-md-3">
		<a href="https://twitter.com/PaulyPedantic" class="btn btn-default btn-circle" id="twitter" data-show-count="false"><i class="fa fa-twitter-square" aria-hidden="true" target="_blank"></i> Twitter</a>
		<a href="https://github.com/PaulyPedantic" target="_blank" class="btn btn-default btn-circle" id="github"><i class="fa fa-github-square" aria-hidden="true"></i> Github</a>
		<a href="https://www.linkedin.com/in/paulyruss" target="_blank" class="btn  btn-default btn-circle" id="linkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i> LinkedIn</a>
		<a href="https://www.freecodecamp.com/paulypedantic" target="_blank" class="btn  btn-default btn-circle" id="freeCodeCamp"><i class="fa fa-fire" aria-hidden="true"></i> FreeCodeCamp</a>
	</div>
</div>

<?php

}

?>
