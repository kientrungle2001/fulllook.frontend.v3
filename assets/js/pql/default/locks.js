if(0) {
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };



$(document).ready(function(){
	if(window.location.pathname.indexOf('trytest') !== -1)
		$(document).on("keydown", disableF5);
});

if(typeof COPY_MODE == 'undefined') {
	COPY_MODE = false;
}

if('1' === localStorage.getItem('copy_mode')) {
	COPY_MODE = true;
}

if(!COPY_MODE && (window.location.href.indexOf('admin_') === -1)) $(document).bind("contextmenu", function(e) {
	if(!COPY_MODE)
		e.preventDefault();
});

// We also check for a text selection if ctrl/command are pressed along
// w/certain keys
if(!COPY_MODE && (window.location.href.indexOf('admin_') === -1)) $(document).keydown(function(ev) {
	if(!COPY_MODE) {
		// capture the event for a variety of browsers
		ev = ev || window.event;
		// catpure the keyCode for a variety of browsers
		kc = ev.keyCode || ev.which;
		// check to see that either ctrl or command are being pressed along w/any
		// other keys
		if ((ev.ctrlKey || ev.metaKey) && kc) {
			// these are the naughty keys in question. 'x', 'c', and 'c'
			// (some browsers return a key code, some return an ASCII value)
			if (kc == 99 || kc == 67 || kc == 88) {
				return false;
			}
		}
	}
});

$(document).bind('keydown', function(e) {
  if(e.ctrlKey && (e.which == 83)) {
    e.preventDefault();
    return false;
  }
});

}