var header = document.querySelector( '.site-header' );
var sticky = header.offsetTop;

window.onscroll = function() {
	myFunction();
};

function myFunction() {
  if ( window.pageYOffset > sticky ) {
    header.classList.add( 'sticky' );
  } else {
    header.classList.remove( 'sticky' );
  }
}
