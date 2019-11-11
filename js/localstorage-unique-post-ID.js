jQuery(document).on('click', 'a.votenowbtn', function(event) {
    event.preventDefault();
    var postid = jQuery(this).data('id');
    var names = [postid];
    var storedNames = JSON.parse(localStorage.getItem("photo_of_the_month"));
    if (!storedNames) {
        localStorage.setItem("photo_of_the_month", JSON.stringify(names));
        jQuery.post(fl_object.ajax_url, {action: 'vote_for_image', postid : postid}, function(data, textStatus, xhr) {
            
            if (data.status) {
               Swal.fire(
                'Good job!',
                data.msg,
                'success'
                );
           }else{
               Swal.fire({
                type: 'error',
                title: 'Oops...',
                html: 'Something went wrong!',
            });
           }


        }, 'JSON');
    }else{
        if (storedNames.includes(postid)) {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                html: 'You have already voted this photo!',
            });
        }else{
            var names =storedNames.concat(postid);
            localStorage.setItem("photo_of_the_month", JSON.stringify(names));
        jQuery.post(fl_object.ajax_url, {action: 'vote_for_image', postid : postid}, function(data, textStatus, xhr) {
            
            if (data.status) {
               Swal.fire(
                'Good job!',
                data.msg,
                'success'
                );
           }else{
               Swal.fire({
                type: 'error',
                title: 'Oops...',
                html: 'Something went wrong!',
            });
           }


        }, 'JSON');
        }
    }
});
