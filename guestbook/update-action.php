<?php
	$error = ''; //declare a variable to use for error messaging
	$success = ''; //declare a variable to use for a success message

	//define the username and pass for the session
	$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	//I'm requiring id and email to update and not displaying email so that theoretically, the only person who can update
	//a comment is the person who posted it or a site admin with DB access. Cheaper than having login sessions control it
	//Fname and Lname are being captured but not displayed, so not letting them be updated
	$dispname = filter_var($_POST['displayname'], FILTER_SANITIZE_STRING);
	$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

	if (empty($dispname)) {
		$dispname = 'anonymous';  /*I set the db to default displayname to anonymous, but it seems php passes an empty string rather than NULL
		so the DB default doesn't work. Using if statement to set default here*/
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){       //UPDATE FORM SENDS VIA POST

		$check = $db->prepare("SELECT * FROM $content WHERE id = ? AND email = ?");

		$check->bind_param("ss", $id, $email);
		$check->execute();
		$returned = $check->get_result();
		$numberrows = $returned->num_rows;

		if(empty($email) || empty($comment)) {
			$error = "All posts must include an Email and a comment. Your Email will not be publicly visible.";
		} else if ($numberrows == 0){
			$error = "Sorry, we can't find a comment with that ID and Email combination. Please enter the exact ID and email used to submit the comment";
		} else {


			//using mysqli prepared statement object oriented style from php.net to avoid sql injection
			if ($update = $db->prepare("UPDATE $content
				SET displayname = ? , comment = ?
				WHERE id = ? and email = ?")) {

			$update->bind_param("ssss", $dispname, $comment, $id, $email);

			if ($update->execute()) {
				$success = "Your comment has been updated. Return to the <a href=\"http://paulruss.uwmsois.com/assignment8\">Guestbook home page</a> to view.";
			} else {
				$error="Something went wrong while submitting. Please try again.";
			}
		}
	}
} else {                      //ACTION BUTTONS ACCESS SCRIPT THROUGH GET METHOD
	$id = trim(filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT));
	if (empty($id)) {
		$error = "Something went wrong, ID passed is not valid. Please fill in the information below to update a comment.";
	} else {
			$get = $db->prepare("SELECT * FROM $content where id=?");

			$get->bind_param("s",$id);
			if ($get->execute()) {
				$prefill = mysqli_fetch_array($get->get_result(),MYSQLI_ASSOC);
			} else {
				$error = "Something went wrong. Please fill in the information below to update a comment.";
			}
	}
};

mysqli_close($db);
echo '<div class="container">';
if ($success){
	echo "<p class=\"green-text text-darken-3\"><i class=\"material-icons\">done</i>$success</p>";
} else {
	echo "<p class=\"red-text text-darken-3\"><i class=\"material-icons\">error</i>$error</p>";
}
echo '</div>';
?>
