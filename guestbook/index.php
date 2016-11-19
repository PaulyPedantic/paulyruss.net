<?php
include("header.php");

$sort = trim(filter_var($_GET['s'],FILTER_SANITIZE_STRING));
$filter = trim(filter_var($_GET['h'],FILTER_SANITIZE_STRING));

	switch ($sort) {
		case 'O':
			$order = 'commentdate ASC';
			break;
		case 'U':
			$order = 'displayname ASC';
			break;
		case 'H':
			$order = 'displayname ASC';
		#	$where = 'WHERE TRIM(displayname) != "anonymous"';
			break;
	default:
		$order = 'commentdate DESC';
		break;
	}

	if ($filter == 't') {   //later, add functionality to make anonymous a persistent filter
		$where = 'WHERE TRIM(displayname) != "anonymous"';
	} else {
		$where = '';
	}


?>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h1 class="header center cyan-text text-darken-1">Welcome to Pauly's Guestbook!</h1>
      <div class="row center">
        <h5 class="header col s12 light">Let me know what you think, eh?</h5>
      </div>
      <div class="row center">
        <a href="leave.php" class="btn-large waves-effect waves-light">Leave a Comment</a>
      </div>

    </div>
  </div>


  <div class="container">
    <div class="section">
			<!-- header with buttons for sort options -->

			<menu>
				<div class="nav-wrapper row white-text yellow darken-2">

					<div class="col s3 mymenu">
						<p>Sort and Filter: </p>
					</div>
					<div class="col s9 mymenu">
						<?php
						echo '<a href="'.$baseurl.'?s=N">Newest First</a>';
						echo '<a href="'.$baseurl.'?s=O">Oldest First</a>';
						echo '<a href="'.$baseurl.'?s=U">Username</a>';
						echo '<a href="'.$baseurl.'?h=t">Hide Anonymous</a>';
						echo '<a href="'.$baseurl.'?h=f">Show Anonymous</a>';
						?>
					</div>
				</div>
			</menu>
      <!-- display posts -->

			<?php
			if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
				$curpg = +$_GET['p'];								//use + operator to cast variable as int
			} else { // Need to determine.
			 	// Count the number of records:
				$curpg = 1;
			}

			$cntq = "SELECT COUNT(*) FROM $content $where";
			$res = @mysqli_query ($db, $cntq);
			$resarr = @mysqli_fetch_array ($res, MYSQLI_NUM);
			$reccount = $resarr[0];

			$limit = 6;  //declare a variable to limit number of records on a page
			$skipcnt = 0;  //declare a variable to track how many records were displayed on previous pages

			// Calculate the number of pages...
			if ($reccount > $limit) { // More than 1 page.
				$pgcount = ceil ($reccount/$limit);
				$skipcnt = ($curpg -1) * $limit;   //skip records shown on previous pages
			} else {
				$pgcount = 1;
				$skipcnt = 0;
			}

			$sel = "SELECT id, displayname, comment, DATE_FORMAT(commentdate,'%h:%i %p %c/%d/%Y') AS cdate FROM $content $where ORDER BY $order LIMIT $skipcnt, $limit";
			//I am not displaying all fields. My goal with this was to set up to capture the required fields into the DB, but ape a chan site and allow
			//anonymous posts with minimal information shared. If a user provides a display name, I show a different icon to identify anon from named comments

			$result = $db->query($sel);  //oop format to execute statement above

			$rowcnt = $result->num_rows; //define variable to hold total number of rows in my query result

			$currow = 1;  		  //declare a variable to keep track of number for each result row




			if ($rowcnt > 0) {

    		// use fetch_assoc to create array and loop through array to output results future state, use modulus operator to paginate results
    		while($row = $result->fetch_assoc()) {
					if ($currow % 3 == 1) {								//if row mod 3 = 1, this is the first element in a row (rows hold three comments)
						$htmlnewrow = '<div class="row">';
					} else {
						$htmlnewrow = '';
					}

					if ($currow % 3 == 0 || $currow == $rowcnt){  /*if row mod 3 = 0, this is the last element in a row,
																														if rownum=numberrows, it's the last result on the page and ends the row*/
						$htmlendrow = '</div>';
					} else {
						$htmlendrow = '';
					}
					if ($htmlnewrow) {  //if the statement above identified the start of a row, echo the appropriate div tag
						echo $htmlnewrow;
					}
		        echo '<div class="col s12 m4">';
		          echo '<div class="icon-block">';
								//if user provided a displayname, use verified_user icon, otherwise use perm_identity icon
								if (strtoupper($row["displayname"]) == "ANONYMOUS" || $row["displayname"] == "") {
		            	echo '<h2 class="center cyan-text text-darken-1 myicon"><i class="material-icons">perm_identity</i></h2>';
								} else {
									echo '<h2 class="center cyan-text text-darken-1 myicon"><i class="material-icons">verified_user</i></h2>';
								}
		            echo '<h5 class="center">'.$row["displayname"].'</h5>';

		            echo '<p>'.$row["comment"].'</p>';
								echo '<div class="row">';
									echo '<div class="col s12 m6">';
										echo '<p class="light mylight">CommentID: '.$row["id"].'</br>';
										echo 'Posted: '.$row["cdate"].'</p>';
									echo '</div>';
									echo '<div class="col s12 m6">';
										echo '<div class="fixed-action-btn horizontal">';
											echo '<a class="btn-floating btn yellow darken-2">';
												echo '<i class="large material-icons">view_headline</i>';
											echo '</a>';
											echo '<ul>';
												echo '<li><a href="http://paulyruss.net/guestbook/update.php?id=' .$row["id"] .'" class="btn-floating cyan darken-1"><i class="material-icons" alt="Update Comment">mode_edit</i></a></li>';
												echo '<li><a href="http://paulyruss.net/guestbook/delete.php?id=' .$row["id"] .'" class="btn-floating red"><i class="material-icons" alt="Delete Comment">delete</i></a></li>';
											echo '</ul>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
		        echo '</div>';
					if ($htmlendrow){   //if the statement above identified the end of a row, echo the close tag for the row div
						echo $htmlendrow;
					}
					$currow++; //increment the variable tracking the number of the current row before restarting the while loop
    		}
			} else {		//if the number of rows returned is 0, there aren't any entries in the table yet.
    		echo "<p>
				There are no entries in the Guestbook yet. You should be the first
				</p>";
			}

			if ($pgcount > 1) {

				echo '<ul class="pagination">';
				// If it's the first page, disable the previous button:
				if ($curpg != 1) {
					echo '<li class="waves-effect"><a href="'.$baseurl.'?p=' . ($curpg - 1) . '&s=' . $sort . '"><i class="material-icons">chevron_left</i></a></li>';
					echo '<li class="waves-effect"><a href="'.$baseurl.'?p=1&s=' . $sort . '">1</a></li>';
				} else {
					echo '<li class="waves-effect disabled"><a href="'.$baseurl.'?p=' . ($curpg - 1) . '&s=' . $sort . '"><i class="material-icons">chevron_left</i></a></li>';
					echo '<li class="waves-effect active"><a href="#">1</a></li>';
				}

				if (($curpg > 4) && ($pgcount > 7)) {
					echo '<li class="waves-effect">...</li>';
				}

				if (($curpg <= 3) || (($pgcount - 5) < 2)) {
					for ($i = 2; ($i <= 6) && ($i < $pgcount); $i++) {
						if ($i != $curpg) {
							echo '<li class="waves-effect"><a href="'.$baseurl.'?p=' . $i . '&s=' . $sort . '">' . $i . '</a></li>';
						} else {
							echo '<li class="waves-effect active"><a href="#">' .$i . '</a></li>';
						}
					}
				} else if ($curpg >= ($pgcount - 3)) {
					for ($i = ($pgcount - 5); $i < $pgcount; $i++) {
						if ($i != $curpg) {
							echo '<li class="waves-effect"><a href="'.$baseurl.'?p=' . $i . '&s=' . $sort . '">' . $i . '</a></li>';
						} else {
							echo '<li class="waves-effect active"><a href="#">' .$i . '</a></li>';
						}
					}
				} else {
					for ($i = ($curpg - 2); $i <= ($curpg +2); $i++) {
						if ($i != $curpg) {
							echo '<li class="waves-effect"><a href="'.$baseurl.'?p=' . $i . '&s=' . $sort . '">' . $i . '</a></li>';
						} else {
							echo '<li class="waves-effect active"><a href="#">' .$i . '</a></li>';
						}
					}
				}

				if ($pgcount > 7 && $curpg <= $pgcount - 5) {
					echo '<li class="waves-effect">...</li>';
				}
				// If it's the last page, disable next page:
				if ($curpg != $pgcount) {
					echo '<li class="waves-effect"><a href="'.$baseurl.'?p='.$pgcount.'&s=' . $sort . '">'.$pgcount.'</a></li>';
					echo '<li class="waves-effect"><a href="'.$baseurl.'?p=' . ($curpg + 1) . '&s=' . $sort . '"><i class="material-icons">chevron_right</i></a></li>';
				} else {
					echo '<li class="waves-effect active"><a href="#">'.$pgcount.'</a></li>';
					echo '<li class="waves-effect disabled"><a href="'.$baseurl.'?p=' . ($curpg + 1) . '&s=' . $sort . '"><i class="material-icons">chevron_right</i></a></li>';
				}

				echo '</ul>';

			}

			mysqli_close($db);
			?>
    </div>
  </div>


<?php
include("footer.php");
?>
