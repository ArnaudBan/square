// main JS file

document.documentElement.classList.add('js');
document.documentElement.classList.remove('no-js');

// Load des font en Javascript
WebFont.load({
    google: {
        families: [ 'Roboto:300,400,700']
    },
    classes: false
});

// Menu
var toggleMenuLink = document.querySelector('.menu-toggle');
var topMenu = document.getElementById('top-menu');

toggleMenuLink.addEventListener('click', function( e ){

    e.preventDefault();

    this.classList.toggle('open');

    topMenu.classList.toggle('open');
});

// Ajout du sprite SVG
var squareSvgRequest = new XMLHttpRequest();
squareSvgRequest.open("GET", scripts_l10n.svgSpriteUrl, true);
squareSvgRequest.send();
squareSvgRequest.onload = function(e) {
    var div = document.createElement("div");
    div.classList.add('screen-reader-text');
    div.innerHTML = squareSvgRequest.responseText;
    document.body.insertBefore(div, document.body.childNodes[0]);
};