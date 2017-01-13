

// autocomplete
$( function() {
	function log( message ) {
		$( "<div>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
	}

	$( "#location_for_search" ).autocomplete({
		source: function( request, response ) {
			$.ajax( {
				//url: "https://gd.geobytes.com/AutoCompleteCity",
				url: "/autocomplete.php",
				dataType: "jsonp",
				data: {
					q: request.term
				},
				success: function( data ) {
                console.log(data);
            // Handle 'no match' indicated by [ "" ] response
            response( data.length === 1 && data[ 0 ].length === 0 ? [] : data );
        }
    } );
		},
		minLength: 3,
		select: function( event, ui ) {
			log( "Selected: " + ui.item.label );
		}
	} );
} );
