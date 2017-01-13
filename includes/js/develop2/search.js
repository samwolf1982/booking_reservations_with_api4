	// global

	// empty or some text for empty text 
	var cleartxt='';
	var total_txt=' hotels)';

//$( ".form_submit" ).submit(function( event ) {

	$(document).on('click', '.form_submit', function(event) {
		// hide
		$('#page-preloader').show();
		$('.spinner').show();
		$('.pace').show();
		$('.pace_num').show();
           //hide end



		        $('.first-sprite + .hotels-count').text('9999991'); // hotel 5
                $('.second-sprite + .hotels-count').text('9999992');    //4
                $('.third-sprite + .hotels-count').text('9999993');        //3
                $('.fourth-sprite + .hotels-count').text('9999994');        //2 
                $('.fifth-sprite + .hotels-count').text('9999995');        //1 
                $('.sixth-sprite + .hotels-count').text('9999996');   // 0

		var p = 0;
		var interval = setInterval(function() {
			$('.pace-progress').attr('style', '-webkit-transform: translate3d('+p+'%, 0px, 0px); -ms-transform: translate3d('+p+'%, 0px, 0px); transform: translate3d('+p+'%, 0px, 0px);');
			$('.pace-progress_num').attr('data-progress-text', p+'%');
			p++;
		}, 500)
		clear_stars();
		$.ajax({
//			url: "/api/ajax/getHotels.php",
url: "/s_test.php",
			type: "post",
			data: $('.form').serialize()+'&page=2',
			success: function(data) {				
				data = JSON.parse(data);
             
    //           if(data.empty){
    //           	console.log('success OK' + data.empty);
                 
				// $('.hotels-result').html(html);
				// $(".search-result").show();
				// $('.ajax_pages').html(pages);
				// clearInterval(interval);
				// $('.pace-progress').attr('style', '-webkit-transform: translate3d(100%, 0px, 0px); -ms-transform: translate3d(100%, 0px, 0px); transform: translate3d(100%, 0px, 0px);');
				// $('.pace-progress_num').attr('data-progress-text', '100%');
    //              setTimeout(function() {

				// 	$('#page-preloader').hide();
				// 	$('.spinner').hide();
				// 	$('.pace').hide();
				// 	$('.pace_num').hide();
				// }, 1000);

    //               return;
    //           }

				 html=data.html.html;
				 // console.log('success OK' + html);
	             pages=data.html.pages; 


				$('.hotels-result').html(html);
				$(".search-result").show();
				$('.ajax_pages').html(pages);
				clearInterval(interval);
				$('.pace-progress').attr('style', '-webkit-transform: translate3d(100%, 0px, 0px); -ms-transform: translate3d(100%, 0px, 0px); transform: translate3d(100%, 0px, 0px);');
				$('.pace-progress_num').attr('data-progress-text', '100%');
                 
                     // set stars

                   
                     $('#result-number').text('( '+Object.keys(data.result).length+total_txt);
                     $('#result-city').text(data.location_for_search);
                     $('#search_locations').text(data.hidden_location_for_search);
                      $('.date_string').text(data.date_string); 
                       $('.room-property').text(data.room_property);       

                  
                    var stars=[0,0,0,0,0,0];
                    $.each(data.result, function(i, item) {
                         stars[item.stars]++;
                            render_srars(' hotel',stars);
                       // console.log(item.stars);
                    });
                     


         
            //     data.result.forEach(function(item, i, data.result) {
                //$('.first-sprite + .hotels-count').text('9999991'); // hotel 5
                //$('.second-sprite + .hotels-count').text('9999992');    //4
                //$('.third-sprite + .hotels-count').text('9999993');        //3
                //$('.fourth-sprite + .hotels-count').text('9999994');        //2 
                //$('.fifth-sprite + .hotels-count').text('9999995');        //1 
                //$('.sixth-sprite + .hotels-count').text('9999996');   // 0 
          //});
        
//acordion 
 $( ".tabs" ).tabs({
 	// active: -1,
      //collapsible: true,active: false, autoHeight: false,
        //clearStyle: true,  
      beforeActivate: function( event, ui ) {
    if( ui.newTab.hasClass('amenities')){ dt='amenities'}
	if( ui.newTab.hasClass('details')){ dt='details'; }      
    if( ui.newTab.hasClass('more-photos')){ dt='more-photos'}
      
     ui.newPanel.html('<p>Search...</p>');   
$.ajax({
url: "/get_hotel_info.php",
			type: "post",
			// data: {code: ui.newHeader.attr('m-value'),dt: dt  },
			data: {code: ui.newTab.attr('m-value'),dt: dt  },
			
			success: function(data) {				
				data = JSON.parse(data);
                ui.newPanel.html(data.html); }});
       }
    });


				


// //acordion 
//  $( ".jQuery_accordion" ).accordion({
//       collapsible: true,active: false, autoHeight: false,
//         clearStyle: true,  
//        beforeActivate: function( event, ui ) {
// if( ui.newHeader.hasClass('amenities')){ dt='amenities'}
// 	if( ui.newHeader.hasClass('details')){ dt='details'}
      
//      if( ui.newHeader.hasClass('more-photos')){ dt='more-photos'}     
// $.ajax({
// url: "/get_hotel_info.php",
// 			type: "post",
// 			data: {code: ui.newHeader.attr('m-value'),dt: dt  },
// 			success: function(data) {				
// 				data = JSON.parse(data);
//                 ui.newPanel.html(data.html); }});
//        }
//     });




         setTimeout(function() {

					$('#page-preloader').hide();
					$('.spinner').hide();
					$('.pace').hide();
					$('.pace_num').hide();
				}, 300);    







			}
		});

	  event.preventDefault();
	});


	function get_info_data(result) {
		


	}
           
     function render_srars(w,arr) {

     	        $('.first-sprite + .hotels-count').text(arr[5]+w); // hotel 5
                $('.second-sprite + .hotels-count').text(arr[4]+w);    //4
                $('.third-sprite + .hotels-count').text(arr[3]+w);        //3
                $('.fourth-sprite + .hotels-count').text(arr[2]+w);        //2 
                $('.fifth-sprite + .hotels-count').text(arr[1]+w);        //1 
                $('.sixth-sprite + .hotels-count').text(arr[0]+w);     
     }


	function clear_stars() {

		       $('.first-sprite + .hotels-count').text(cleartxt); // hotel 5
               $('.second-sprite + .hotels-count').text(cleartxt);    //4
               $('.third-sprite + .hotels-count').text(cleartxt);        //3
               $('.fourth-sprite + .hotels-count').text(cleartxt);        //2 
               $('.fifth-sprite + .hotels-count').text(cleartxt);        //1 
               $('.sixth-sprite + .hotels-count').text(cleartxt);   // 0


	}





