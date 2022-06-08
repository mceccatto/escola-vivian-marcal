document.onreadystatechange = function() {
	if (document.readyState !== 'complete') {
		document.querySelector('body').style.visibility = 'hidden';
		document.querySelector('#esconder').style.visibility = 'hidden';
		document.querySelector('#loader').style.visibility = 'visible';
	} else {
		document.querySelector('#loader').style.display = 'none';
		document.querySelector('#esconder').style.visibility = 'visible';
		document.querySelector('body').style.visibility = 'visible';
	}
};

var menu = document.getElementById("menu");
var link = menu.getElementsByClassName("nav-link");
for (var i = 0; i < link.length; i++) {
    link[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}