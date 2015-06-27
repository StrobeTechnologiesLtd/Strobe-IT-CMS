function toggle(div_id) {
	var el = document.getElementById(div_id);
	if ( el.style.display == 'none' ) {	el.style.display = 'block';}
	else {el.style.display = 'none';}
}
function blanket_size(popUpDivVar, windowheight) {
	if (typeof window.innerWidth != 'undefined') {
		viewportheight = window.innerHeight;
	} else {
		viewportheight = document.documentElement.clientHeight;
	}
	if ((viewportheight > document.body.parentNode.scrollHeight) && (viewportheight > document.body.parentNode.clientHeight)) {
		blanket_height = viewportheight;
	} else {
		if (document.body.parentNode.clientHeight > document.body.parentNode.scrollHeight) {
			blanket_height = document.body.parentNode.clientHeight;
		} else {
			blanket_height = document.body.parentNode.scrollHeight;
		}
	}
	var blanket = document.getElementById('blanket');
	blanket.style.height = blanket_height + 'px';
	var popUpDiv = document.getElementById(popUpDivVar);
	var wheight = windowheight / 2;
	//popUpDiv_height=blanket_height/2-150;//150 is half popup's height
 popUpDiv_height=blanket_height/2-wheight;
	popUpDiv.style.top = popUpDiv_height + 'px';
}
function window_pos(popUpDivVar, windowwidth) {
	if (typeof window.innerWidth != 'undefined') {
		viewportwidth = window.innerHeight;
	} else {
		viewportwidth = document.documentElement.clientHeight;
	}
	if ((viewportwidth > document.body.parentNode.scrollWidth) && (viewportwidth > document.body.parentNode.clientWidth)) {
		window_width = viewportwidth;
	} else {
		if (document.body.parentNode.clientWidth > document.body.parentNode.scrollWidth) {
			window_width = document.body.parentNode.clientWidth;
		} else {
			window_width = document.body.parentNode.scrollWidth;
		}
	}
	var popUpDiv = document.getElementById(popUpDivVar);
	//window_width=window_width/2-150;//150 is half popup's width
	var wwidth = windowwidth / 2;
	window_width=window_width/2-wwidth;
	popUpDiv.style.left = window_width + 'px';
}
function popup(windowname, windowwidth, windowheight) {
	blanket_size(windowname, windowheight);
	window_pos(windowname, windowwidth);
	toggle('blanket');
	toggle(windowname);		
}
