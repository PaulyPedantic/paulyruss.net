<?php
include(mysqli_connect.php);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

	<?PHP
		$page = trim(basename($_SERVER['PHP_SELF'], '.php'));  //check name of currently executing file and case to update title per page
		switch ($page) {                                   //note to me: __file__ doesn't work because I'm using includes. __file__ gives the name of the included file not the
			case 'leave':																     //file it is being included in
				$title = '- Leave a Comment';
				break;
			case 'delete':
				$title = '- Delete a Comment';
				break;
			case 'update':
				$title = '- Update a Comment';
				break;
		default:
			$title = '- Welcome';
		}

	echo "<title>Pauly's Guestbook $title</title>"

	?>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<!--based on template from materializecss.com -->
<body class="yellow lighten-5">
  <nav class="yellow darken-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="http://paulruss.uwmsois.com/" class="brand-logo">PaulyRuss</a>
      <ul class="right hide-on-med-and-down">
				<li><a href="index.php">Guestbook Home</a></li>
				<li><a href="leave.php">New Comment</a></li>
        <li><a href="update.php">Edit Comment</a></li>
				<li><a href="delete.php">Delete Comment</a></a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
				<li><a href="index.php">Guestbook Home</a></li>
				<li><a href="leave.php">New Comment</a></li>
				<li><a href="update.php">Edit Comment</a></li>
				<li><a href="delete.php">Delete Comment</a></a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
