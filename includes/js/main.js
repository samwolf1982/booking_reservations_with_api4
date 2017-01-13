
function dates(){
    //console.log('dates')
    var dateToday = new Date();
    var dates = $("#check_in").datepicker({
        dateFormat: "yy-mm-dd",
        defaultDate: "+1d",
        minDate: dateToday,
        onSelect: f_check_in
    });


    if (dateToday) {
        var dt=        dateToday.getDate() + 1;
            var dt = new Date(dateToday);
            dt.setDate(dateToday.getDate() + 1);
            }

      //      console.dir(dateToday);
        //                console.dir(dt);
       var dates2 = $("#check_out").datepicker({
        dateFormat: "yy-mm-dd",
        defaultDate: "+1d",
        minDate: dt,
        onSelect: f_check_out
    });
}


function f_check_in() {
     console.log(check_in)
          console.log(check_out)

            var check_in = $("#check_in").datepicker( 'getDate' );
            var check_out = $("#check_out").datepicker( 'getDate' );
            
                 var check_out_min = new Date(check_in);
                 check_out_min.setDate(check_out_min.getDate() + 1);
                // var check_out_min=check_in+1;
                    
                 var check_out_max= new Date(check_in);
                
      
                check_out_max.setDate(check_out_max.getDate() + 28);
             
$('#check_out').datepicker('destroy');
//$('#check_in').datepicker('destroy');

//$("#check_in").datepicker({dateFormat: "yy-mm-dd",minDate: check_out_min, maxDate: check_out_max,    defaultDate: "+1d", });
$("#check_out").datepicker({dateFormat: "yy-mm-dd",minDate: check_out_min, maxDate: check_out_max,  onSelect: f_check_out });


}
function f_check_out() {
           // console.log('select2'+selectedDate)
           //  var option = this.id == "check_out" ? "minDate" : "maxDate",
           //  instance = $(this).data("datepicker"),
           //  date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
           //  dates2.not(this).datepicker("option", option, date)
  // console.log(check_in)
  //         console.log(check_out)
      
          var check_in = $("#check_in").datepicker( 'getDate' );
          var check_out = $("#check_out").datepicker( 'getDate' );
            
           console.log(check_in)
          console.log(check_out)
            //if(dmin>dmax){
                //console.log('dmin>dmax')
                 var check_in_max = new Date(check_out);
               check_in_max.setDate(check_in_max.getDate() -1);
                // var check_out_min=check_in+1;
                    
                 var check_in_min= new Date(check_out); // проверка на 28 дней
                check_in_min.setDate(check_in_min.getDate() - 28);
           var curent_date=new Date();
    if (check_in_min<curent_date) {
                        check_in_min=curent_date;
                        console.log('check_out_max<curent_date')
                 }
                 if (check_in_min>curent_date) {
                        check_in_max=curent_date;
                        console.log('check_out_max>curent_date')
                 }

$('#check_in').datepicker('destroy');
//$('#check_in').datepicker('destroy');

$("#check_in").datepicker({dateFormat: "yy-mm-dd",minDate: check_in_min, maxDate: check_in_max, onSelect: f_check_in});
//$("#check_out").datepicker({dateFormat: "yy-mm-dd",minDate: check_out_min, maxDate: check_out_max,    defaultDate: "+1d", });

}


function checkDates(){
    if($("#check_in").val() == 0){
        alert("Please, check date");
        event.preventDefault();
    } else if($("#check_out").val() == 0){
       alert("Please, check date");
       event.preventDefault();
   }
else if($("#location_for_search").val() == 0){
       alert("Please, enter location");
       event.preventDefault();
   }
   
   var a = $("#check_in").datepicker('getDate').getTime();
   var b = $("#check_out").datepicker('getDate').getTime();
   console.log($("#check_in").val());
   console.log($("#check_out").val());
   c = 24*60*60*1000,
   diffDays = Math.round(Math.abs((a - b)/(c)));
   if(diffDays > 30){
    alert("Hotel can not be reserved for more than 30 nights!");
    event.preventDefault();
}
}
function addChildSelectingIteration(){
    for(var i = 0; i < $('.child_selecting').length; i++){
        $('.child_selecting').eq(i).addClass('child_selecting_' + i);
    }
    for(var i = 0; i < $('.child_age_wrapper').length; i++){
        $('.child_age_wrapper').eq(i).addClass('child_age_wrapper_' + i);
    }
}
function recalculatePeople1() {
    var first = parseInt($('.room_1 .adult_search select').val());
    var second = parseInt($('.room_1 .child_search select').val()); 
    var result = first + second; 
    if(result > 6){
        $('.room_1 .adult_search select').css('border-color', 'red');
        $('.room_1 .child_search select').css('border-color', 'red');
        alert('Invalid number of paxes per room (maximum 6 paxes per room)');
        event.preventDefault();
    } else if(result <= 6){
        $('.room_1 .adult_search select').css('border-color', '#ccc');
        $('.room_1 .child_search select').css('border-color', '#ccc');
    }
}
function recalculatePeople2() {
    var first = parseInt($('.room_2 .adult_search select').val());
    var second = parseInt($('.room_2 .child_search select').val()); 
    var result = first + second; 
    if(result > 6){
        $('.room_2 .adult_search select').css('border-color', 'red');
        $('.room_2 .child_search select').css('border-color', 'red');
        alert('Invalid number of paxes per room (maximum 6 paxes per room)');
        event.preventDefault();
    } else if(result <= 6){
        $('.room_2 .adult_search select').css('border-color', '#ccc');
        $('.room_2 .child_search select').css('border-color', '#ccc');
    }
}
function recalculatePeople3() {
    var first = parseInt($('.room_3 .adult_search select').val());
    var second = parseInt($('.room_3 .child_search select').val()); 
    var result = first + second; 
    if(result > 6){
        $('.room_3 .adult_search select').css('border-color', 'red');
        $('.room_3 .child_search select').css('border-color', 'red');
        alert('Invalid number of paxes per room (maximum 6 paxes per room)');
        event.preventDefault();
    } else if(result <= 6){
        $('.room_3 .adult_search select').css('border-color', '#ccc');
        $('.room_3 .child_search select').css('border-color', '#ccc');
    }
}
function recalculatePeople4() {
    var first = parseInt($('.room_4 .adult_search select').val());
    var second = parseInt($('.room_4 .child_search select').val()); 
    var result = first + second; 
    if(result > 6){
        $('.room_4 .adult_search select').css('border-color', 'red');
        $('.room_4 .child_search select').css('border-color', 'red');
        alert('Invalid number of paxes per room (maximum 6 paxes per room)');
        event.preventDefault();
    } else if(result <= 6){
        $('.room_4 .adult_search select').css('border-color', '#ccc');
        $('.room_4 .child_search select').css('border-color', '#ccc');
    }
}
function recalculatePeople5() {
    var first = parseInt($('.room_5 .adult_search select').val());
    var second = parseInt($('.room_5 .child_search select').val()); 
    var result = first + second; 
    if(result > 6){
        $('.room_5 .adult_search select').css('border-color', 'red');
        $('.room_5 .child_search select').css('border-color', 'red');
        alert('Invalid number of paxes per room (maximum 6 paxes per room)');
        event.preventDefault();
    } else if(result <= 6){
        $('.room_5 .adult_search select').css('border-color', '#ccc');
        $('.room_5 .child_search select').css('border-color', '#ccc');
    }
}
function forDisplayCountOfChild(counter, i){
    if(counter == '0'){
        $('.child_age_wrapper_'+i+' .child_age_0 select').removeAttr('required', 'required');
        $('.child_age_wrapper_'+i+' .child_age_1').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_1 select').removeAttr('required', 'required');
        $('.child_age_wrapper_'+i+' .child_age_2').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_2 select').removeAttr('required', 'required');
        $('.child_age_wrapper_'+i+' .child_age_3').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_3 select').removeAttr('required', 'required');
        $('.child_age_wrapper_'+i+' .child_age_4').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_4 select').removeAttr('required', 'required');
    } else if(counter == '1'){
        $('.child_age_wrapper_'+i+' .child_age_0').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_0 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_1').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_1 select').removeAttr('required', 'required');
        
        $('.child_age_wrapper_'+i+' .child_age_2').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_2 select').removeAttr('required', 'required');
        
        $('.child_age_wrapper_'+i+' .child_age_3').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_3 select').removeAttr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_4').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_4 select').removeAttr('required', 'required');
    } else if(counter == '2'){
        $('.child_age_wrapper_'+i+' .child_age_0').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_0 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_1').slideDown('slow');
        $('.child_age_wrapper_'+i+' .child_age_1').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_1 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_2').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_2 select').removeAttr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_3').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_3 select').removeAttr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_4').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_4 select').removeAttr('required', 'required');
    } else if(counter == '3'){
        $('.child_age_wrapper_'+i+' .child_age_0').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_0 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_1').slideDown('slow');
        $('.child_age_wrapper_'+i+' .child_age_1').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_1 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_2').slideDown('slow');
        $('.child_age_wrapper_'+i+' .child_age_2').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_2 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_3').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_3 select').removeAttr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_4').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_4 select').removeAttr('required', 'required');
    } else if(counter == '4'){
        $('.child_age_wrapper_'+i+' .child_age_0').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_0 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_1').slideDown('slow');
        $('.child_age_wrapper_'+i+' .child_age_1').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_1 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_2').slideDown('slow');
        $('.child_age_wrapper_'+i+' .child_age_2').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_2 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_3').slideDown('slow');
        $('.child_age_wrapper_'+i+' .child_age_3').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_3 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_4').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_4 select').removeAttr('required', 'required');
    } else if(counter == '5'){
        $('.child_age_wrapper_'+i+' .child_age_0').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_0 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_1').slideDown('slow');
        $('.child_age_wrapper_'+i+' .child_age_1').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_1 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_2').slideDown('slow');
        $('.child_age_wrapper_'+i+' .child_age_2').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_2 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_3').slideDown('slow');
        $('.child_age_wrapper_'+i+' .child_age_3').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_3 select').attr('required', 'required');

        $('.child_age_wrapper_'+i+' .child_age_4').slideDown('slow');
        $('.child_age_wrapper_'+i+' .child_age_4').css('display', 'block');
        $('.child_age_wrapper_'+i+' .child_age_4 select').attr('required', 'required');
    }
}
$(window).on('load', function () {
    var $preloader = $('#page-preloader'),
    $spinner   = $preloader.find('.spinner');
    $spinner.fadeOut();
    $preloader.delay(350).fadeOut('slow');
});

$(document).ready(function(){

    dates();

    addChildSelectingIteration();

    $('.confirm_search_hotel input').click(function(){
        dates();
        checkDates();
        recalculatePeople1(); 
        recalculatePeople2(); 
        recalculatePeople3(); 
        recalculatePeople4();
        recalculatePeople5();
    });
    $('.room_1 .count_select').on('change', recalculatePeople1);
    $('.room_2 .count_select').on('change', recalculatePeople2);
    $('.room_3 .count_select').on('change', recalculatePeople3);
    $('.room_4 .count_select').on('change', recalculatePeople4);
    $('.room_5 .count_select').on('change', recalculatePeople5);

    $('.room_1').addClass('activeRoom');
    $('.room_1 .adult_search select').attr('required', 'required');
    $('#location_for_search').blur(function(){

 $('#hidden_location_for_search').attr('value', $(this).val());

        var tmp = $(this).val().split(',');
        console.log($(this).val().split(','));
        $(this).attr('value', tmp[0])
    });
    $('#rooms_for_search').change(function(){
        if($(this).val() == '1'){
            $('.room_2').slideUp().removeClass('activeRoom').addClass('unactiveRoom');
            $('.room_2 .adult_search select').removeAttr('required', 'required');

            $('.room_3').slideUp().removeClass('activeRoom').addClass('unactiveRoom');
            $('.room_3 .adult_search select').removeAttr('required', 'required');

            $('.room_4').slideUp().removeClass('activeRoom').addClass('unactiveRoom');
            $('.room_4 .adult_search select').removeAttr('required', 'required');

            $('.room_5').slideUp().removeClass('activeRoom').addClass('unactiveRoom');
            $('.room_5 .adult_search select').removeAttr('required', 'required');
        } else if($(this).val() == '2'){ 
            $('.room_2').slideDown('slow').removeClass('unactiveRoom').addClass('activeRoom');
            $('.room_2').css('display', 'block');
            $('.room_2 .adult_search select').attr('required', 'required');

            $('.room_3').slideUp().removeClass('activeRoom').addClass('unactiveRoom');
            $('.room_3 .adult_search select').removeAttr('required', 'required');

            $('.room_4').slideUp().removeClass('activeRoom').addClass('unactiveRoom');
            $('.room_4 .adult_search select').removeAttr('required', 'required');

            $('.room_5').slideUp().removeClass('activeRoom').addClass('unactiveRoom');
            $('.room_5 .adult_search select').removeAttr('required', 'required');
        } else if($(this).val() == '3'){ 
            $('.room_2').slideDown('slow').removeClass('unactiveRoom').addClass('activeRoom');
            $('.room_2').css('display', 'block');
            $('.room_2 .adult_search select').attr('required', 'required');

            $('.room_3').slideDown('slow').removeClass('unactiveRoom').addClass('activeRoom');
            $('.room_3').css('display', 'block');
            $('.room_3 .adult_search select').attr('required', 'required');

            $('.room_4').slideUp().removeClass('activeRoom').addClass('unactiveRoom');
            $('.room_4 .adult_search select').removeAttr('required', 'required');

            $('.room_5').slideUp().removeClass('activeRoom').addClass('unactiveRoom');
            $('.room_5 .adult_search select').removeAttr('required', 'required');
        } else if($(this).val() == '4'){ 
            $('.room_2').slideDown('slow').removeClass('unactiveRoom').addClass('activeRoom');
            $('.room_2').css('display', 'block');
            $('.room_2 .adult_search select').attr('required', 'required');

            $('.room_3').slideDown('slow').removeClass('unactiveRoom').addClass('activeRoom');
            $('.room_3').css('display', 'block');
            $('.room_3 .adult_search select').attr('required', 'required');

            $('.room_4').slideDown('slow').removeClass('unactiveRoom').addClass('activeRoom');
            $('.room_4').css('display', 'block');
            $('.room_4 .adult_search select').attr('required', 'required');

            $('.room_5').slideUp().removeClass('activeRoom').addClass('unactiveRoom');
            $('.room_5 .adult_search select').removeAttr('required', 'required');
        } else if($(this).val() == '5'){ 
            $('.room_2').slideDown('slow').removeClass('unactiveRoom').addClass('activeRoom');
            $('.room_2').css('display', 'block');
            $('.room_2 .adult_search select').attr('required', 'required');

            $('.room_3').slideDown('slow').removeClass('unactiveRoom').addClass('activeRoom');
            $('.room_3').css('display', 'block');
            $('.room_3 .adult_search select').attr('required', 'required');

            $('.room_4').slideDown('slow').removeClass('unactiveRoom').addClass('activeRoom');
            $('.room_4').css('display', 'block');
            $('.room_4 .adult_search select').attr('required', 'required');

            $('.room_5').slideDown('slow').removeClass('unactiveRoom').addClass('activeRoom');
            $('.room_5').css('display', 'block');
            $('.room_5 .adult_search select').attr('required', 'required');
        }
    });
$('.child_selecting_0 select').change(function(evt){
    var counter = $(this).val();
    forDisplayCountOfChild(counter, 0);
});
$('.child_selecting_1 select').change(function(evt){
    var counter = $(this).val();
    forDisplayCountOfChild(counter, 1);
});
$('.child_selecting_2 select').change(function(evt){
    var counter = $(this).val();
    forDisplayCountOfChild(counter, 2);
});
$('.child_selecting_3 select').change(function(evt){
    var counter = $(this).val();
    forDisplayCountOfChild(counter, 3);
});
$('.child_selecting_4 select').change(function(evt){
    var counter = $(this).val();
    forDisplayCountOfChild(counter, 4);
});
/*
$('.child_selecting')
    $('.child_selecting select').change(function(){
        if($(this).val() == '0'){
            $('.child_age select').removeAttr('required', 'required');
        } else if($(this).val() == '1'){
            $('.child_age select').attr('required', 'required');
        } else if($(this).val() == '2'){ 

        } else if($(this).val() == '3'){ 

        } else if($(this).val() == '4'){ 

        } else if($(this).val() == '5'){ 

        }
    });
*/

$("img").each(function(){
    $(this).error(function(){
            //console.log('image error');
            $(this).attr('src','includes/images/img_err.jpg');
        });
});

        // -------------------------------------------------------------
    // Accordion
    // -------------------------------------------------------------

    (function () {  
        $('.collapse').on('show.bs.collapse', function() {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-minus"></i>');
        });

        $('.collapse').on('hide.bs.collapse', function() {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-plus"></i>');
        });
    }());

});
