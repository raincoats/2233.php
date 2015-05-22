<?php
/*
 *  this function grabs a few bits of inf0 for the user, like pwd, user, etc,
 *  so they can be displayed. it's pretty handy, at least i think. i've got a
 *  horrible memory!
 *
 * this will be optional soon, to make the script more efficient, but for now
 * i just don't give a frip
 */

function kill_a_man_for_his_giro(){

	$📝 = "</span><br>";
	$👤 = "user:      <span id='user'>" . shell_exec('whoami')            . $📝;
	$🏢 = "hostname:  <span id='host'>" . shell_exec('hostname')          . $📝;
	$👇 = "pwd:       <span id='pwd'>"  . shell_exec('pwd')               . $📝;
	$💁	= "os name:   <span id='uname'>" . shell_exec('uname')            . $📝;
	$😳 = "shell:     <span id='shell'>" . shell_exec('which $(echo $0)') . $📝;

	$😵 = $👤 . $🏢 . $👇 . $💁 . $😳;

	return $😵;
}

/*
 * detects the os in more detail
 * really basic heuristics
 * i mean uname is fine but this is quicker to read
 */

function peoples_republic_of_2233dotphp($uname){

	if (preg_match('/Darwin/', $uname)) {
		return oh_wow_its_a_mac();
	}
	elseif (preg_match('/Linux/', $uname)) {
		return oh_wow_its_linux();
	}
	elseif (preg_match('/[Bb][Ss][Dd]/', $uname)) {
		return oh_wow_its_bsd();
	}
	else{
		return "who knows?";
	}
}

/* obvs these will be more complex when i'm done */

function oh_wow_its_a_mac(){
	return "oh wow it's a mac";
}

function oh_wow_its_linux(){
	return "oh wow it's linux";
}

function oh_wow_its_bsd(){
	return "wtf it's some sorta bsd";
}



?>