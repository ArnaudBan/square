// main JS file

// Load des font en Javascript
WebFont.load({
    google: {
        families: [ 'Roboto:300,400']
    },
    classes: false
});

document.documentElement.classList.add('js');
document.documentElement.classList.remove('no-js');

var toggleMenuLink = document.querySelector('.menu-toggle');
var topMenu = document.getElementById('top-menu');

toggleMenuLink.addEventListener('click', function( e ){

    e.preventDefault();

    this.classList.toggle('open');

    topMenu.classList.toggle('open');
});