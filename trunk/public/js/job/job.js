$(document).ready(function() {
    $(document).on('keyup', $('#labRate'), function(){
        $('#labEst').val( parseFloat( $('#labRate').val() * $('#labHours').val() ).toFixed(2) );

        $('#subtotEst').val(
            parseFloat(
                parseFloat($('#labEst').val()) +
                parseFloat($('#pandmEst').val()) +
                parseFloat($('#partsTotal').val()) +
                parseFloat($('#recovEst').val()) +
                parseFloat($('#specialEst').val())
            ).toFixed(2)
        );

        $('#vatEst').val( parseFloat( parseFloat($('#subtotEst').val()) * 0.2 ).toFixed(2) );

        $('#totalEst').val( parseFloat( parseFloat($('#subtotEst').val()) + parseFloat($('#vatEst').val()) ).toFixed(2) );
    });
});