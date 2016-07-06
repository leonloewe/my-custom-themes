jQuery(document).ready(function($){

    $('#testimonial_btn').click(function(e) {
        e.preventDefault();

        var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Add Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                //$('#testimonial_btn').attr('src', attachment.url);
                $('#testimonial_shortcode').val(attachment.url);

            })
            .open();
    });

});