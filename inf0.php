<?php
/*
 *  this function grabs a few bits of inf0 for the user, like pwd, user, etc,
 *  so they can be displayed. it's pretty handy, at least i think. i've got a
 *  horrible memory!
 */
 /* this will be optional soon, to make the script more efficient */

function kill_a_man_for_his_giro(){

	$📝 = "\n";
	$👤 = "user:      " . shell_exec('whoami');
	$🏢 = "hostname:  " . shell_exec('hostname');
	$👇 = "pwd:       " . shell_exec('pwd');
	$💻	= "os name:   " . shell_exec('uname');

	os_detect("")

	$😵 =  $📝 . $👤 . $🏢 . $👇 . $💻;
	return $😵;

}
?>