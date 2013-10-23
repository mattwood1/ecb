// Convert divs to queue widgets when the DOM is ready
$(function() {
	var uploadPath = $('#uploader').data('path');
	
    $("#uploader").pluploadQueue({
        // General settings
        runtimes : 'gears,flash,silverlight,browserplus,html5',
        url : uploadPath,
        max_file_size : '10mb',
        chunk_size : '1mb',
        unique_names : false,

        // Resize images on clientside if we can
        // resize : {width : 320, height : 240, quality : 90},

        // Specify what files to browse for
        filters : [
            {title : "Image files", extensions : "jpg,,jpeg,gif,png"},
        ],

        // Flash settings
        flash_swf_url : '/js/plupload/js/plupload.flash.swf',

        // Silverlight settings
        silverlight_xap_url : '/js/plupload/js/plupload.silverlight.xap'
    });

    // Client side form validation
    $('form').submit(function(e) {
        var uploader = $('#uploader').pluploadQueue();

        // Files in queue upload them first
        if (uploader.files.length > 0) {
            // When all files are uploaded submit form
            uploader.bind('StateChanged', function() {
                if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
                    $('form')[0].submit();
                }
            });
                
            uploader.start();
        } else {
            alert('You must queue at least one file.');
        }

        return false;
    });
});
