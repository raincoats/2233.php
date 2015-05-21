/* i don't know why jquery files end with .js */

function _007(secret_command){
    // jQuery.post( url [, data ] [, success ] [, dataType ] )
    
}


$(document).ready(function(){
    $("#form").submit(function(event){ // on submission of form

    });
});





/********************************************************
 *                                                      *
 *  stupid half-finished non-jQuery version below       *
 *  seriously why even read it there's no jQuery there  *
 *                                                      *
 ********************************************************
function _007(secret_command) {
    var post_data = "whosthere=" + secret_command;
    var request = new XMLHttpRequest();
    request.open('POST', (document.location.href + "?007"), true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    request.send(post_data);
    return request;
}

var james_bond = _007("ssh --help");

Document.getElementById()
*/