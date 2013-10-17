//card.js
$(function(){
	$('#jobCard').on('submit', 'form', function(){
		$.post('/job/index/update-card', $(this).serialize(), function(data){
	//		$('#jobNote .resultContent').html(data);
	//		$('#jobNote form')[0].reset();
		});
		return false;
	});
});