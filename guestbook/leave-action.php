<?php
	$error = ''; //declare a variable to use for error messaging
	$success = ''; //declare a variable to use for a success message

	//define the username and pass for the session
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
	$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
	$dispname = filter_var($_POST['displayname'], FILTER_SANITIZE_STRING);
	$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);


	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($email) || empty($comment)) {
			$error = 'All posts must include an Email and a comment. Your Email will not be publicly visible.';
		} else {

			if (empty($dispname)) {
				$dispname = 'anonymous';  /*I set the db to default displayname to anonymous, but it seems php passes an empty string rather than NULL
				so the DB default doesn't work. Using if statement to set default here*/
			}

			//using mysqli prepared statement object oriented style from php.net to avoid sql injection
			if ($leave = $db->prepare("INSERT INTO $content (id ,email ,fname ,lname ,commentdate ,displayname ,comment)
VALUES (null,?,?,?,CURRENT_TIMESTAMP,?,?)")) {

			$leave->bind_param("sssss", $email, $fname, $lname, $dispname, $comment);

			if ($leave->execute()) {
				$success = "Your comment has been posted. Return to the <a href=\"http://paulruss.uwmsois.com/assignment8\">Guestbook home page</a> to view.";
			} else {
				$error="Something went wrong while submitting. Please try again.";
			}
			mysqli_close($db);
		}
	}
	echo '<div class="container">';
	if ($success){
		echo "<p class=\"green-text text-darken-3\"><i class=\"material-icons\">done</i>$success</p>";
	} else {
		echo "<p class=\"red-text text-darken-3\"><i class=\"material-icons\">error</i>$error</p>";
	}
	echo '</div>';
};
?>
