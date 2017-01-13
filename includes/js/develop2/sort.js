

function sort_by_price(argument) {
var mylist = $('.hotels-result');
var listitems = mylist.children('.media.holel-media-item').get();

// $divs.sort(function (a, b) {
// 	console.log('sort_by_price');
// 	  return false;
//         return parseFloat( $(a).attr('cost')) - parseFloat( $(b).attr('cost'));
//     });
listitems.sort(function(a, b) {
   var compA = parseFloat( $(a).attr('cost'));
   var compB = parseFloat( $(b).attr('cost'))

    if (argument==false) { return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;}
   return (compA > compB) ? -1 : (compA < compB) ? 1 : 0;
})

$.each(listitems, function(idx, itm) { mylist.append(itm); });



console.log('sort_by_price');


}

function sort_by_stars(argument) {



var mylist = $('.hotels-result');
var listitems = mylist.children('.media.holel-media-item').get();

// $divs.sort(function (a, b) {
// 	console.log('sort_by_price');
// 	  return false;
//         return parseFloat( $(a).attr('cost')) - parseFloat( $(b).attr('cost'));
//     });
listitems.sort(function(a, b) {

   var compA = parseInt( $(a).attr('stars'));
   var compB = parseInt( $(b).attr('stars'))
   //console.log('sort_by_stars***');
   // console.log('a: '+compA+' b: '+compB);
   var t=(compA > compB) ? -1 : (compA < compB) ? 1 : 0;
   // console.log('a: '+compA+' b: '+compB+' return : '+t +' arg: '+argument);
//    if(compA==argument) return -1;   

  if(compA==argument){ 
   //  console.log("returbn 1");
   	return -1;
  };
   if(compB==argument){ 
    // console.log("returbn -1");
   	return 1;
  };
  if (compA < compB) {
    return 1;
  }
  if (compA > compB) {
    return -1;
  }
  // a должно быть равным b
  return 0;
   
})

$.each(listitems, function(idx, itm) { mylist.append(itm); });



//console.log('sort_by_stars');


}













jQuery(function($){
 
   $("#sort_by_price").click(function(){

//      if($('.star-label > input:checkbox:checked').length <= 0){ $( '.media.holel-media-item' ).show(); return; }  

//    $( '.media.holel-media-item' ).hide();
// var ii=5;

      
$('.star-label > input:checkbox').each( function(i, item) {
             // $('.hide_stars-5').show();    
          //  if ($(this).is(':checked')) {
          //      $('.hide_stars-'+ii).show();
          //   } 
          // ii--; });

      // $(".media.holel-media-item99 > .hotel-five-stars").filter(function(index){     	
      //    if (  index<4)
      //       {return true;}
    //    }).css({"color":"green"});
   });
});


});

