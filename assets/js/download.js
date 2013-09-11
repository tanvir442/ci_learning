$(document).ready(function(){
	$('.download').click(function(){
		var btn = $(this);
		var url = $(this).data('url');
		var data = "file_name=" + $(this).data('file_name') + "&file_url=" + $(this).data('file_url');
		$.post(
			url,
			data,
			function(data){
				if(data.status){
					//console.log('success');
					//console.log(btn.data('download'));
					window.open(btn.data('download'), '_blank');
				} else{
					alert('error!');
				}
			},
			'json'
		);
	});
});