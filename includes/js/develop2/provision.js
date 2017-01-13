function provision(argument) {


    $.ajax({
//      url: "/api/ajax/getHotels.php",
      url: "provision.php",
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