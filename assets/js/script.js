jQuery(function($) {
	/*alert(console.log( $( ".car_items" ).length ));
	console.log( jQuery( ".car_items" ).length );*/
	$( ".car_items" ).click(function() {
		$this = $( this );
		$total = 0;
		/*$this = $( this );
		$total = 0;
		$this.each(function() {
			if( $( this ).attr( 'checked' ) ) {
				$total = $total + $( this ).data( "amount" );
				console.log( $( this ).data( "amount" ) );
				console.log( "....." );
			}			
		});
		$( ".reservation-summary-total-amount" ).html( $total );*/
		$( ".car_items:checked" ).each(function() {
			//console.log( "nnn" );
			//if( $( this ).attr( 'checked' ) ) {
				$total = $total + 1;
				//console.log( "x" );
			//}


		});
		//$( ".reservation-summary-total-amount" ).append( $this.data( "amount" ) );

		var date1 = new Date('2019-02-16T00:00:00');
		// Sun Dec 17 1995 03:24:00 GMT...

		var date2 = new Date('2019-02-16T00:00:00');
		// Sun Dec 17 1995 03:24:00 GMT...

		console.log(date1 == date2);
		// expected output: false;

		var x = date1 - date2;

		var y = new Date( x );
		
		console.log( y.getUTCFullYear() );	
	});
});