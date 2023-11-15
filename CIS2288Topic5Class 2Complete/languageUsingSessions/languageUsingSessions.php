<?php
	// language example using sessions instead of cookies

	// this page handles both the form submission
	// and the displaying of the form. This is fairly standard in Web programming.

	// call this so we can access the session
	session_start();

	// do this block only if the user clicks the link to restart the game
	if (isset($_GET['action'])) {

		session_destroy(); // this destroys the current session

		// this part gets rid of the session cookie that php puts on the users machine
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}

		echo "<p>Session ended</p>";
		// reset lang back to english
		$lang = "en";

	} else {

		// did they hit submit!
		if (isset($_POST['lang'])) {
			$lang = $_POST['lang'];
			// set new session var with their language choice
			$_SESSION['userLang'] = $lang;
		// if they already have a session going, then grab the current value
		} elseif (isset($_SESSION['userLang'])) {
			$lang = $_SESSION['userLang'];
		} else // form has not been submitted, and no session var
		{
			$lang = "en";
		}
	}

	/*
	The tricky part is setting the default
	selected item for the drop down list.
	
	Here I am using the ternary operator:
	
	<?php echo ($lang == "en" ? "selected" : "" ); ?>
	
	This is the same as saying 
	if ( $lang == "en")
		echo "Selected";
	else
		echo ""
		
	The trick is we do this inline within each option tag.
	*/
?>
<!doctype html>
<html>
	<head>
		<title>Language Rememberer with SESSIONS</title>
	</head>
	<body>
		<form action="languageUsingSessions.php" method="POST">
			<select name='lang'>
				<option value="en" <?php echo ($lang == "en" ? "selected":"");?>>English</option>
				<option value="fr" <?php echo ($lang == "fr" ? "selected":"");?>>French</option>
				<option value="pr" <?php echo ($lang == "pr" ? "selected":"");?>>Pirate</option>
			</select>
			<input type="submit" value="Set Language" />
		</form>

		<p>
			<?php
			if($lang == "en") {
				echo "Hello World";
			}
			else if ($lang == "fr" ) {
				echo "Bonjour Monde";
			}
			else if ($lang == "pr" ) {
				echo "Hullo Planet o' mine. Yarr!";
			}
			?>
		</p>
		<a href="languageUsingSessions.php?action=restart">Restart?</a>

	</body>
</html>


