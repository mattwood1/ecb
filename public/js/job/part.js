//part.js
$(function(){
	$('#jobPart').on('submit', 'form', function(){
		$.post('/job/index/add-part', $(this).serialize(), function(data){
			$('#jobPart .resultContent').html(data);
			$('#jobPart form')[0].reset();
		});
		return false;
	});
	
	$('#jobPart').on('click', ' a.ajax', function(e){
		e.preventDefault();
		$.post($(this).attr('href'), function(data){
			$('#jobPart .resultContent').html(data);
		});
	});
});