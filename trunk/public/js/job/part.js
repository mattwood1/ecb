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
	
	$(document).on('keyup', $('#quantity'), function(){
		$('#vat').val( parseFloat(20.0).toFixed(1) );
		
		subtotal = parseFloat(($('#quantity').val()) * parseFloat($('#cost').val()));
		tax = parseFloat($('#vat').val());
		total = ((tax / 100) * subtotal) + subtotal;
		
		$('#total').val( parseFloat(total).toFixed(2) );
	});
});