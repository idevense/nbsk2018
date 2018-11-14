( function( $ ) {

/** attach a submit handler to the form */
$( "#searchform" ).submit( function( event ) {

	/** stop form from submitting normally */
	/** event.preventDefault(); */

	// get some values from elements on the page:
	var $form = $( this ),
	$term_input = $form.find( 'input[id="s"]' ),
	term = $term_input.val(),
	//term = "s",
	url = $form.attr( 'value' );
	$( "#s" ).val( "lol" );
});

}( jQuery ) );
