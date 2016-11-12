<?php
include("header.php");
include("delete-action.php");
?>

<div class="container">
	<h1 class="header center cyan-text text-darken-1">Welcome to Pauly's Guestbook!</h1>

	<div class="row center">
		<p class="header col s12">Please provide the ID of the comment you want to delete and the email you submitted it with.</p>
	</div>

	<div class="fullH">
		<div class="row">
			<form class="col s12" method="POST" action="delete.php">
				<div class="row">
					<div class="input-field col s12">
						<input name="id" type="number" class="validate" value="<?php
						if ($id) {			//Make values sticky
						 	echo $id;
						} else if ($del) {
							echo $del;
						}
						?>">
						<label for="id">Comment ID to Delete:</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="email" type="email" class="validate" value="<?php
						if ($email) {			//Make values sticky
						 	echo $email;
						}
						?>">
						<label for="email">Email used to leave comment:</label>
					</div>
				</div>

				<button class="btn waves-effect waves-light" type="submit" name="action" onclick="return confDelete()">Submit
					<i class="material-icons right">send</i>
				</button>

			</form>
		</div>
	</div>
</div>


<?php
include("footer.php");
?>
