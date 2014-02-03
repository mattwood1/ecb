//search.js

$(function(){
	$('#jobSearch.ajax').on('submit', function(e){
		e.preventDefault();
		$.post('/job/index/search', $(this).serialize(), function(data){
			$('#resultContent').html(data);
		});
	});
});