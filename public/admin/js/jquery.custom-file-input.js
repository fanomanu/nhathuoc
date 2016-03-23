/*
	By Osvaldas Valutis, www.osvaldas.info
	Available for use under the MIT License
*/

'use strict';

;( function( $, window, document, undefined )
{
	$( '.inputfile' ).each( function(){
		var $input	 = $( this ),
			$label	 = $input.parent().children('label'),
			labelVal = $label.html();
        //console.log($label);
		$input.on( 'change', function( e )
		{
			var fileName = '';
            
		    if( e.target.value ){
                fileName = e.target.value.split( '\\' ).pop();     
            }
            
            //console.log(fileName);
			if( fileName )
				$label.find( 'span' ).html( fileName );
			else
				$label.html( labelVal );
		});

		// Firefox bug fix
		$input
		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});
})( jQuery, window, document );