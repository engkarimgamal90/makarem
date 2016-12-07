jQuery( function ( $ )
{
	'use strict';

	/**
	 * Show color pickers inside a group.
	 * We need to re-instantiate the color field because cloning a group won't remove existing color picker.
	 */
	function initColorPicker()
	{
		var $this = $( this );

		if ( !$this.closest( '.rwmb-group-clone' ).length )
		{
			return;
		}

		var $container = $this.closest( '.rwmb-input' );

		// Clone doesn't have input for color picker, we have to add the input and remove the color picker container
		$this.appendTo( $container ).siblings( '.wp-picker-container' ).remove();

		// Show color picker
		$this.wpColorPicker();
	}

	$( ':input.rwmb-color' ).each( initColorPicker );
	$( '.rwmb-input' ).on( 'clone', 'input.rwmb-color', initColorPicker );
} );
