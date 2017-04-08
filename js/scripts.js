// main JS file

document.documentElement.classList.add('js');
document.documentElement.classList.remove('no-js');

// Load des font en Javascript
WebFont.load({
    google: {
        families: [ 'Roboto:300,400']
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
var ajax = new XMLHttpRequest();
ajax.open("GET", scripts_l10n.svgSpriteUrl, true);
ajax.send();
ajax.onload = function(e) {
    var div = document.createElement("div");
    div.classList.add('screen-reader-text');
    div.innerHTML = ajax.responseText;
    document.body.insertBefore(div, document.body.childNodes[0]);
};