jQuery( document ).ready(function() {
	jQuery.ajax({
		type : "post",
		url : myAjax.ajaxurl,
		data : {action: "tw_display_word"},
		success: function(response) {
			setTimeout(function(){ 
				jQuery('.load-todays-word').html(response);
			}, 3000);
		}
	});
	
	jQuery( ".tw_searchBox input" ).keyup(function(key) {
		if(jQuery(this).val().length != '0'){
			jQuery('.tw_searchBox span').fadeIn();
		}else{
			jQuery('.tw_searchBox span').fadeOut();
		}
		var keyCode = (key.keyCode ? key.keyCode : key.which);   
		if (keyCode == 13) {
			var word = jQuery(this).val();
			jQuery.ajax({
				type : "post",
				url : myAjax.ajaxurl,
				data : {action: "tw_fetch_word", word:word},
				success: function(response) {
					jQuery('.load-todays-word').html(response);
				}
			});
		}
	});
	
	jQuery('.tw_searchBox span').on('click',function(){
		jQuery( ".tw_searchBox input" ).val('');
	});
});