//note.js
$(function(){
	$('#jobNote').on('submit', 'form', function(){
		$.post('/job/index/add-note', $(this).serialize(), function(data){
			$('#jobNote .resultContent').html(data);
			$('#jobNote form')[0].reset();
		});
		return false;
	});
	/*
	$('#jobNote').on('click', ' a.ajax', function(e){
		e.preventDefault();
		$.post($(this).attr('href'), function(data){
			$('#jobPart .resultContent').html(data);
		});
	});
	*/
});