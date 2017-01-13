

function chancel(argument) {


    $.ajax({
//      url: "/api/ajax/getHotels.php",
      url: "chancel_book.php",
      type: "post",
      data: {data: argument},
      success: function(data) {       
      if(data){

          data = JSON.parse(data);
         

          //  data.html

         $('#myModalHorizontal').html(data.html);
         $('#myModalHorizontal').modal('show');
      }
      console.log(data);
                     

      }
    });



}