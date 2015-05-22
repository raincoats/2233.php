/* i don't know why jquery files end with .js */


/* _007
 * sends a shell command via an AJAX POST request, returns result to secretary function.
 * Thank you, Miss Moneypenny.
 */
function _007(secret_command) {

	var post_data = "ajax=very-yes&007=" + encodeURIComponent(secret_command);

	var req = new XMLHttpRequest();
	req.open('POST', document.location.href, true);

	// req.setRequestHeader('X-Powered-By', '2233.php');
	req.setRequestHeader('Accept', 'text/plain'); // don't send me no .swf by mistake
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	req.send(post_data);

	// ok, let's see if our POST worked!
	req.onreadystatechange = function(){
		if (req.readyState == 4 && (req.status == 666 || 200)) {
			// looks like it worked (: send it to Moneypenny for
			// further processing, archiving, et cetera.
			moneypenny(req.responseText, 'top-secret');
		}
	}
}


/* moneypenny
 *
 * performs the administrative duties of the operation,
 * taking the intel from _007 and formatting the output, etc.
 * then sends it onto q for dom insertion.
 *
 * get it?!
 *
 * because moneypenny was 007's secretary?!?!
 *
 * haaaaaaah nobody will ever read this :'(
 *
 */
function moneypenny(paperwork, clearance){

	switch (clearance) {

		// if this is the executed command from 2233.php
		case "top-secret":
			paperwork = '<span class="console-exec">' + paperwork + '</span><br><br>' + 
						'<span class="console-dummy-prompt">$<span class="blink">_</span></span>';
			break;

		// if this is the command the user typed
		case "for-your-eyes-only":
			// grab the user, hostname, pwd etc for the prompt
			var dollarsign = '<span class="console-prompt">$ </span>';
			paperwork = dollarsign + '<span class="console-cmd">' + 
						paperwork + '</span><br>';
			// delete the dummy prompt
			$(".console-dummy-prompt").remove();
			break;

		default:
			noop();
	}
	// send it to Q to insert it into the page
	q(paperwork);
}


function q(intel){
	// put it all on screen!
	$("#out").append(intel);
}


$(document).ready(function(){ // codecademy taught me to do this, idk if i need to

	// listens for the enter key, posts command when pressed
	$(this).keypress(function(e) {
		if (e.which == 13){ // the enter key
			var commands_to_post = $("input").val();
			$('input').val('');
			// sending the command to moneypenny, for processing
			moneypenny(commands_to_post, "for-your-eyes-only");
			var post_response = _007(commands_to_post);
		}
	});

	// this does the same thing as above but for the submit button
	$('#submit-btn').click(function(){
		var commands_to_post = $("input").val();
		$('input').val('');
		moneypenny(commands_to_post, "for-your-eyes-only");
		var post_response = _007(commands_to_post);
	});
});
