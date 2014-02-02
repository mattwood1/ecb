$(function(){
    $('.modalConfirm').on('click', function(e) {
    	
        // modal header section
        var modalHeader = $('<div>').addClass('modal-header');
        var closeIcon = $('<button>').addClass('close')
                                     .attr('type', 'button')
                                     .attr('data-dismiss', 'modal')
                                     .attr('aria-hidden', 'true')
                                     .append('x');
        var headerLabel = $('<h3>').attr('id', 'aubergineModalLabel').append('Confirm');

        modalHeader.append(closeIcon);
        modalHeader.append(headerLabel);

        // modal body section
        var modalBody = $('<div>').addClass('modal-body');
        var message = $(this).attr('data-modalMessage');
        var modalMessage = $('<p>').append(message);
        modalBody.append(modalMessage);

        // modal footer section
        var modalFooter= $('<div>').addClass('modal-footer');
        var cancelButton = $('<button>').addClass('btn')
                                        .attr('data-dismiss', 'modal')
                                        .attr('aria-hidden', 'true')
                                        .append('Cancel');
        var href = $(this).attr('href');
        var okButton = $('<a>').addClass('btn btn-primary')
                               .attr('href', href)
                               .append('OK');
        modalFooter.append(cancelButton);
        modalFooter.append(okButton);

        // create a new div with header, body and footer
        // delete this div if it has been appended
        $('#Modal').remove();
        var modalHtml = $('<div>').addClass('modal').attr('id', 'Modal').attr('aria-hidden', 'true');
        modalHtml.append(modalHeader);
        modalHtml.append(modalBody);
        modalHtml.append(modalFooter);

        $('body').append(modalHtml);

        $('#Modal').modal();

        return false;
    });
    
    $( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd", minDate: 0 });
});