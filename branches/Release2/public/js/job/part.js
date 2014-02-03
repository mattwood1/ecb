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
		//$('#vat').val( parseFloat(20.0).toFixed(1) );
		
		// Qty  *  Cost
		subtotal = parseFloat(($('#quantity').val()) * parseFloat($('#cost').val()));
		
		// minus discount %
		discount = (subtotal / 100) * parseFloat($('#discount').val() );
		
		vat = parseFloat( (( parseFloat(subtotal) - parseFloat(discount) )/100) * 20 ).toFixed(2);
		$('#vat').val( vat );
		
		total = ( ( parseFloat(subtotal) - parseFloat(discount) ) + parseFloat(vat) );
		$('#total').val( parseFloat(total).toFixed(2) );
	});
});