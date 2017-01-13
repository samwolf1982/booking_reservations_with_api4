$('.change-search').click(function(){

	$('.hide-form').toggleClass('open-form');

	$('.change-search').toggleClass('change-search-btn-open');

	return false;
})



$('.room-number-link').click(function(){

	$('.hide-rooms').toggleClass('open-rooms');

	$('.room-number-link').toggleClass('room-number-link-open');

	return false;
})



$('.close-btn').click(function(){

	$('.hide-rooms').toggleClass('open-rooms');

	$('.room-number-link').toggleClass('room-number-link-open');
	return false;
})



$('.alpha').click(function(){

	$('.hide-alphabet').toggleClass('open-alphabet');

	$('.alpha').toggleClass('alpha-btn-open');

	$('.alpha').parent().toggleClass('item-active');

	return false;
})



$("#rooms_selector_id").change(function() {

	var count = $("#rooms_selector_id option:selected" ).text();

	var text = "";

	for(var i =0; i<count; i++){

		text += "<div class=\"third-set-box\"><select class=\"form-control adult-select\" name=\"\" id=\"\"><option value=\"\">1</option><option value=\"\">2</option><option value=\"\">3</option><option value=\"\">4</option></select><select class=\"form-control child-select\" name=\"\" id=\"\"><option value=\"\">0</option><option value=\"\">1</option><option value=\"\">2</option></select><select class=\"form-control age-select\" name=\"\" id=\"\"><option value=\"\">1</option><option value=\"\">2</option><option value=\"\">3</option><option value=\"\">4</option><option value=\"\">5</option><option value=\"\">6</option><option value=\"\">7</option><option value=\"\">8</option><option value=\"\">9</option><option value=\"\">10</option><option value=\"\">11</option><option value=\"\">12</option></select></div>";

	}

	count = $(".third-set-box-container" ).html(text);	

});



$('.dist').click(function(){

	var isVisible = $('.hide-distance').hasClass("open-distance");


	$('.hide-distance').toggleClass('open-distance');

	$('.dist').toggleClass('alpha-btn-open');

	$('.dist').parent().toggleClass('item-active');

	
	if (isVisible) {
		$(".distance-list").select2("destroy");
	} else {
		$(".distance-list").select2();
		$(".distance-list").select2('open');
	}


	return false;
})



$('.inp-distance-search').keyup(function(){

	var val = $('.inp-distance-search').val();

	if(val == "")

		$('.search-glyph').show();

	else

		$('.search-glyph').hide();

})