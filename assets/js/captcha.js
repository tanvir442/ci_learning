$(document).ready(function(){
	$("#captcha").on("submit", function(){
		var base_url = $(this).data('base_url');
		var form = $(this);
		$.post(
			form.attr('action'),
			form.serialize(),
			function(data){
				if(data.status){
					$('.result').html('Success!');
				} else{
					$('.result').html(data.word);
					var url = base_url + "captcha/generate_captcha/";
					$.ajax({
						url: url,
						type: "POST",
						dataType: "HTML",
						success: function(data){
							$('#captcha_container').html(data);
						}
					});
				}
			},
			"json"
		);
		return false;
	});
});