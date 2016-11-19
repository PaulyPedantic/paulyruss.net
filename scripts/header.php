<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://paulyruss.net/css/style.css">
		<?php
		if (strpos($_SERVER['REQUEST_URI'], 'index') !== false) {  //There's probably a better way, but for now, if the page returns index, set the link rel canonical to the domain/
    	echo '<link rel="canonical" href="http://paulyruss.net/">';
		}
		?>

    <title>Pauly Russ, Technical Analyst</title>
    <meta name="description" content="Pauly Russ is a technical analyst and student of web development and data analytics in Milwaukee, Wi.">

  </head>

	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<div class="container-fluid">
			<nav class="navbar navbar-inverse navbar-fixed-top navFix">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" alt="Show Navigation Options">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<a class="navbar-brand" href="http://paulyruss.net/#home" rel="nofollow">PaulyRuss.net</a>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right navFix">

						<li><a href="http://paulyruss.net/#skills" rel="nofollow">Skills</a></li>
						<li><a href="http://paulyruss.net/#about" rel="nofollow">About</a></li>
						<li><a href="http://paulyruss.net/#work" rel="nofollow">Work</a></li>
						<li><a href="http://paulyruss.net/#contact" rel="nofollow">Contact</a></li>
					</ul>
				</div>
			</nav>
		</div>
