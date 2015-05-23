<?php

/*
 * this next function contains the page's html, no cmd exec happens here
 */

function fuck_abbott($which){

	// grabbing the nice little bits of info
	$up_the_dole = kill_a_man_for_his_giro();

	// this is just the location of the script, we need this so the html form
	// knows where to submit the command, and so you when you press enter/submit,
	// you come back to the same page, and not some useless 404 page
	$putin_huilo = basename($_SERVER['SCRIPT_NAME']);

$html_top = <<< EOF
<!DOCTYPE SATAN>
<html>
	<head>
	<script type="text/javascript" src="./boogers/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="./boogers/jquery.scrollTo.min.js"></script>
	<script type="text/javascript" src="post.js"></script>
	$up_the_dole
	<link href="./boogers/styles.css" rel="stylesheet" />
	</head>
	<body>

		<div id="form">
			<input type="text" id="cmdline" name="007" autocomplete="off" autofocus>
			<button id="submit-btn" value="Submit" name="submit" type="submit">~\$ubM1t~~&gt;</button>
		</div>
		<div id='out'>

EOF;
// gotta keep your html all semantic and proper and shit
$html_bottom = <<< EOF

		</div>
	</body>
</html>
EOF;

	// i hope this is self explanatory
	if ($which == 0){
		return $html_top;
	} else {
		return $html_bottom;
	}

}

?>