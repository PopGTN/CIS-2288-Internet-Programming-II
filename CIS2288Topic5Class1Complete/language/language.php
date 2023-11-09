<?php
	//Author:
	//Date:
	//Purpose:

	// this page handles both
	// the form submission
	// and the displaying of the form.
	// This is fairly standard in Web programming.

	// So... First we check to see if the form submit was clicked
		if(isset($_POST['lang']) ) {
			// if it was clicked, it means the user wants to set the language
			$lang = $_POST['lang'];

			// set lang cookie for 24 hours
			setcookie('lang',$lang,time() + 60*60*24);

		}
		// if it submit wasn't clicked we need to check to see if they ALREADY made a choice in the past...
		// so we need to check for the presence of the cookie with the isset below
		elseif (isset($_COOKIE['lang'])) {
			// if they made a choice in the past, lets get the value of the cookie and set $lang to their choice
			$lang = $_COOKIE['lang'];
		} else {
			// if we have gotten here, it means that the form has not been submitted, and no cookie, so this is
			// the default... english
			$lang = "en";
		}

	/*
	The tricky part below is setting the default
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
		<title>Language Rememberer</title>
	</head>
	<body>
		<form action="language.php" method="POST">
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
	</body>
</html>


