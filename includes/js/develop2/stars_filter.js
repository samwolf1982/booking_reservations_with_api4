
jQuery(function($){
 
   $("#stars_filter").click(function(){

     if($('.star-label > input:checkbox:checked').length <= 0){ $( '.media.holel-media-item' ).show(); return; }  

   $( '.media.holel-media-item' ).hide();
var ii=5;


$('.star-label > input:checkbox').each( function(i, item) {
             // $('.hide_stars-5').show();    
           if ($(this).is(':checked')) {
               $('.hide_stars-'+ii).show();
            } 
          ii--; });

      // $(".media.holel-media-item99 > .hotel-five-stars").filter(function(index){     	
      //    if (  index<4)
      //       {return true;}
      // }).css({"color":"green"});
});


});

