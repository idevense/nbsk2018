var header = document.querySelector( '.site-header' );
var sticky = header.offsetTop;
var showsticky = header.offsetTop + 600;

window.onscroll = function() {
	myStickyHeader();
};

function myStickyHeader() {
  if ( window.pageYOffset > sticky ) {
    header.classList.add( 'sticky' );
  } else {
	header.classList.remove( 'sticky' );
	header.classList.remove( 'show' );
  }
  if ( window.pageYOffset > showsticky ) {
	header.classList.add( 'show' );
  } else {
	return;
  }
}
