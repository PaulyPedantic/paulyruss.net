<?php
include("header.php");
include("leave-action.php");
?>

	<div class="container">
		<h1 class="header center cyan-text text-darken-1">Welcome to Pauly's Guestbook!</h1>

		<div class="row center">
			<p class="header col s12">Please fill out the form below to leave a comment. You must provide an email address. It will not be displayed publicly but will be required if you want to change or delete your comment later.</p>
		</div>

  	<div class="row">
    	<form class="col s12" method="POST" action="leave.php">
      	<div class="row">
        	<div class="input-field col s6">
          	<input name="fname" type="text" class="validate" value="<?php
						if ($fname) {			//Make values sticky
						   echo $fname;
						}
						?>">
          	<label for="fname">First Name:</label>
        	</div>
        	<div class="input-field col s6">
          	<input name="lname" type="text" class="validate" value="<?php
						if ($lname) {			//Make values sticky
						   echo $lname;
						}
						?>">
          	<label for="lname">Last Name:</label>
        	</div>
      	</div>
				<div class="row">
        	<div class="input-field col s12">
          	<input name="email" type="email" class="validate" value="<?php
						if ($email) {			//Make values sticky
						   echo $email;
						}
						?>">
          	<label for="email">Email:</label>
        	</div>
      	</div>
      	<div class="row">
        	<div class="input-field col s12">
          	<input name="displayname" type="text" class="validate" value="<?php
						if ($dispname) {			//Make values sticky
						   echo $dispname;
						}
						?>">
          	<label for="displayname">Name to Display with Comment:</label>
        	</div>
      	</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea name="comment" class="materialize-textarea"><?php
						if ($comment) {			//Make values sticky
							 echo $comment;
						}
						?></textarea>
						<label for="comment">Comment:</label>
					</div>
				</div>

  			<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    			<i class="material-icons right">send</i>
  			</button>

    	</form>
  	</div>
	</div>

<?php
include("footer.php");
?>
