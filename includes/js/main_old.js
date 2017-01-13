function dates(){
    var dateToday = new Date();
    var dates = $("#check_in, #check_out").datepicker({
        dateFormat: "yy-mm-dd",
        defaultDate: "+1w",
        minDate: dateToday,
        onSelect: function(selectedDate) {
            var option = this.id == "check_in" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            dates.not(this).datepicker("option", option, date),
            a = $("#check_in").datepicker('getDate').getTime(),
            b = $("#check_out").datepicker('getDate').getTime(),
            c = 24*60*60*1000,
            diffDays = Math.round(Math.abs((a - b)/(c)));
            if(diffDays > 30){
                alert("Hotel can not be reserved for more than 30 nights!");
                event.preventDefault();
            }
        }
    });
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
function forDisplayCountOfChild(i){
    if($(this).val() == '0'){
        $('.child_age_wrapper_'+i+' .child_age_0 select').removeAttr('required', 'required');
        $('.child_age_wrapper_'+i+' .child_age_1').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_1 select').removeAttr('required', 'required');
        $('.child_age_wrapper_'+i+' .child_age_2').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_2 select').removeAttr('required', 'required');
        $('.child_age_wrapper_'+i+' .child_age_3').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_3 select').removeAttr('required', 'required');
        $('.child_age_wrapper_'+i+' .child_age_4').slideUp();
        $('.child_age_wrapper_'+i+' .child_age_4 select').removeAttr('required', 'required');
    } else if($(this).val() == '1'){
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
    } else if($(this).val() == '2'){
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
    } else if($(this).val() == '3'){
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
    } else if($(this).val() == '4'){
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
    } else if($(this).val() == '5'){
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
$('.child_selecting_0 select').change(function(){
    forDisplayCountOfChild(0);
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
