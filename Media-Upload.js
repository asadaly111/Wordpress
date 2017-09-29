  // ADD IMAGE LINK
  jQuery(document).on('click', '.choosebtn', function( event ){
    event.preventDefault();

    var parent = jQuery(this).parent().parent('div.field_row');
    var inputField = jQuery(parent).find("input.meta_image_url");

  // Create a new media frame
  frame = wp.media({
    title: 'Select or Upload Media for Gallery',
    button: {
      text: 'Use this media'
    },
  multiple: false  // Set to true to allow multiple files to be selected
});


// When an image is selected in the media frame...
frame.on( 'select', function() {

// Get media attachment details from the frame state
var attachment = frame.state().get('selection').first().toJSON();

// attachment.id; //89
// attachment.title; //osts57yu7em91yaeazvq
// attachment.filename; //osts57yu7em91yaeazvq.jpg
// attachment.url; //http://localhost/testwp/wp-content/uploads/2017/09/osts57yu7em91yaeazvq.jpg
// attachment.link; //http://localhost/testwp/obituary/obituary-for-dorothy-ann-leslie/osts57yu7em91yaeazvq/

inputField.val(attachment.url);
  jQuery(parent).find("div.image_wrap").html('<img src="'+attachment.url+'" height="48" width="48" />');
});

// Finally, open the modal on click
frame.open();
});

//refrence link
//https://codex.wordpress.org/Javascript_Reference/wp.media
