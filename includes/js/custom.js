//owl carausel
$(document).ready(function(){

/*carousel*/
	var owl = $("#owl"); 
	owl.owlCarousel({
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [995,4], //5 items between 1000px and 901px
		itemsDesktopSmall : [767, 2], // betweem 900px and 601px
		itemsTablet: [700, 2], //2 items between 600 and 0
		itemsMobile : [479, 1], // itemsMobile disabled - inherit from itemsTablet option
		navigation : true,
		pagination :  false
	});

	$().UItoTop({ easingType: 'easeOutQuart' });
	$('#stuck_container').tmStickUp({});
	
	/*eEasy AutoComplete*/	
	var options = {
		url: "sources/cities.json",
		getValue: "name",
		dataType: "json",
		highlightPhrase: true,
		placeholder: "Şehir Seçiniz",
		list: {
			match: {
				enabled: true
			},
			maxNumberOfElements: 8,
			onSelectItemEvent: function() {
				var CityId = $("#City").getSelectedItemData().citycode;
				var CountryId = $("#City").getSelectedItemData().countrycode;
				$("#CityId").val(CityId).trigger("change");
				$("#CountryId").val(CountryId).trigger("change");
			}
		},
		theme: "square"
	};
	
//	$("#City").easyAutocomplete(options);
	
	/*DoSearch*/
	$('#i_gonder').click(function(){
		arama_yap();
	});
	
});


/*Valid email control*/
function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(emailAddress);
}

/* Function Do Form */
function arama_yap()
{
	
	var CityId = $('#CityId').val();
	var CountryId = $('#CountryId').val();
	var EmailAddress = $('#EmailAddress').val();
	var StartDate = $('#StartDate').val();
	var EndDate = $('#EndDate').val();
	var Oda = $('#Oda').val();
	var Yetiskin = $('#Yetiskin').val();
	var Cocuk = $('#Cocuk').val();
	
	$.post("doit.php?i=arama_yap&uid="+(new Date()).valueOf(),{
			Ne : $('input[name=Hotel]:checked', '#bookingForm').val(),
			CityId : $('#CityId').val(), 
			CountryId : $('#CountryId').val(), 
			EmailAddress : $('#EmailAddress').val(), 
			StartDate : $('#StartDate').val(),
			EndDate : $('#EndDate').val() , 
			Oda : $('#Oda').val() , 
			Yetiskin : $('#Yetiskin').val(),
			Cocuk : $('#Cocuk').val()
	}, function(data){
		alert(data);
	});

	/*
	if ($('#mbusername').val().length < 4 ) { alert("Kullanıcı ismi en az 4 karakter uzunluğunda olmalıdır"); $('#mbusername').focus(); return false;}
	if (!isValidEmailAddress(emailad)) { alert("Email adresi doğru girilmelidir."); $('#mbusername').focus(); return false;}
	if ($('#mbpassword').val().length < 4 ) { alert("Kullanıcı şifresi en az 4 karakter uzunluğunda olmalıdır"); $('#mbpassword').focus(); return false;}
	if ($('#txtgrup').val() == -1 ) { alert("Grup seçiniz."); $('#txtgrup').focus(); return false;}
	if ($('#isimsoyisim').val().length < 4 ) { alert("İsim, Soyisim en az 4 karakter uzunluğunda olmalıdır"); $('#isimsoyisim').focus(); return false;}
	if ($('#txtsehir').val() == -1 ) { alert("Şehir seçiniz."); $('#txtsehir').focus(); return false;}
	if (!confirm("Kullanıcıyı eklemek istdiğinizden emin misiniz ?")) { return false; } 
	$('#btnguncelle').attr("disabled", "disabled");
	
	<? echo "var uidx=\"$uid\";"; ?>
	
	$.post("set_add_user.php?uid="+(new Date()).valueOf(),{
		mbusername : $('#mbusername').val(), 
		txtgrup : $('#txtgrup').val(), 
		isimsoyisim : $('#isimsoyisim').val(),
		txtsehir : $('#txtsehir').val() , 
		telno : $('#telno').val() , 
		mbpassword : $('#mbpassword').val(),
		san1 : $('#santral1').val(),
		san2 : $('#santral2').val(),
		santral : santralchecked ,
		radius : radiuschecked ,
		ticket : ticketchecked ,
		mail : mailchecked ,
		ap : apchecked ,
		cpe : cpechecked,
		vpn : vpnchecked,
		aciklama : $('#aciklama').val()
	},
	function(data){ alert(data);  } );
	*/

}

//function make_lowercase() { $('#mbusername').val($('#mbusername').val().toLowerCase()); }
//function make_uppercase() { $('#isimsoyisim').val($('#isimsoyisim').val().toUpperCase()); }

