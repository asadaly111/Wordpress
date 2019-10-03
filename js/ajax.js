    jQuery(document).on('submit', 'form#uploadfile', function(event) {
        event.preventDefault();
        jQuery('#ajax-loading-screen').css({'opacity':'1', 'display':'block'});
        jQuery('#ajax-loading-screen .loading-icon').animate({'opacity':1},400);
        var form = jQuery(this);
        var formData = new FormData(jQuery(form)[0]);
        jQuery.ajax({
            type: 'post',
            url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_formsubmit',
            dataType: 'json',
            contentType: false,
            processData: false,
            data: formData,
        })
        .done(function(value) {
            jQuery('#ajax-loading-screen').css({'opacity':'0', 'display':'none'});
            // jQuery('.errrrrrr').remove();
            // if (value.class == 'isa_error isa_sucess') {
            //  jQuery('.loader-css').hide();
            // }
            form.append('<div class="container errrrrrr"><div class="'+value.class+'">'+value.msg+'</div></div>');
            form.trigger('reset');
            // jQuery('.loader-css').hide();
            console.log(value);
        })
        .fail(function() {
            jQuery('#ajax-loading-screen').css({'opacity':'0', 'display':'none'});
            console.log("error");
        });

    });


$('#searhform').submit(function(event) {
    event.preventDefault();
    var formData = new FormData($(this)[0]);
    var url = $(this).attr('action');

    $.ajax({
        type: 'post',  
        url: url,  
        dataType: 'json',
        contentType: false,
        processData: false,
        data: formData,
    })
    .done(function(value) {
        console.log(value);
    })
    .fail(function() {
        console.log("error");
    });
    
});


$("form.sendemail").submit(function ( event ) {
    event.preventDefault();
    var url = $(this).attr('action');


    info = [];
    info[0] =  $('input[name="email[]"').val();
    var id =  $('#summernote').code();

    var data_to_send = $(this).serialize(info);
    var dataString = data_to_send + '&id=' + id;

    $.ajax({
      type: "POST",
      data: dataString,
      url: url,
      success: function(msg){
         console.log(msg);
     }
 }); 



});





        Query('.loader-css').show();
        var formData = new FormData(jQuery(form)[0]);
        jQuery.ajax({
            type: 'post',
            url: 'http://dev3.onlinetestingserver.com/hennep/wp-admin/admin-ajax.php?action=cms_formsubmit',
            dataType: 'json',
            contentType: false,
            processData: false,
            data: formData,
        })
        .done(function(value) {
            jQuery('.errrrrrr').remove();
            if (value.class == 'isa_error isa_sucess') {
                form.trigger('reset');
                jQuery('.loader-css').hide();
            }
            form.append('<div class="container errrrrrr"><div class="'+value.class+'">'+value.msg+'</div></div>');
            jQuery('.loader-css').hide();
            console.log(value);
        })
        .fail(function() {
            jQuery('.loader-css').hide();
            console.log("error");
        });



/******************* New code *********************************/ 

jQuery(document).ready(function($) {
    jQuery('#minMaxExample').datepicker({
        language: 'en',
        multipleDates: false,
        position: "bottom left",
        minDate: new Date(),
    });
});

var form = jQuery("#example-form");
form.validate({
    errorPlacement: function errorPlacement(error, element) {
        element.closest('section').find('.errorr').append(error);
    }
});
var cc = form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    enableContentCache: true,
    onStepChanging: function (event, currentIndex, newIndex){
        form.validate().settings.ignore = ":disabled,:hidden";



        if (currentIndex === 0 && form.valid() == true){
            var serv = jQuery('#booking_service').val();
            var datee = jQuery('#minMaxExample').val();
            cc.steps("remove", 1);
            cc.steps("insert", 1, {
                title: "Time",
                contentMode: "async",
                contentUrl: "http://shearee.com/websites/booking/wp-admin/admin-ajax.php?action=booking_slots&serviceid="+serv+'&date='+datee,
            });
        }

        return form.valid();
    },
    onFinishing: function (event, currentIndex){
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex){
        event.preventDefault();
    }
});

// append service on category
jQuery(document).on('change', '#booking_size', function(event) {
    event.preventDefault();
    var id = jQuery(this).val();
    jQuery.post('http://shearee.com/websites/booking/wp-admin/admin-ajax.php?action=booking_show_service', {cat_id: id}, function(data, textStatus, xhr) {
        jQuery('#booking_service').html(data)
    });
});

// select date when select slot
jQuery(document).on('change', 'input[name="booking_slot"]', function(event) {
    event.preventDefault();
    jQuery('input[name="booking_date"]').prop('checked', false);
    jQuery(this).closest('.slots-main').find('input[name="booking_date"]').prop('checked', true);
});

// price calculate
jQuery(document).on('change', '#booking_service', function(event) {
    var v = jQuery(this).find(':selected').data('price');
    if (v == undefined) {
        jQuery('#priceshow').html('0.00');
    }else{
        jQuery('#priceshow').html(v);
    }
});


jQuery('#example-form').submit(function(event) {
    event.preventDefault();
    
    if (jQuery(this).valid() == false) {
        return jQuery(this).valid();
    }

    jQuery.LoadingOverlay("show");
    var form = jQuery(this);
    var formData = new FormData(jQuery(this)[0]);
    jQuery.ajax({
        type: 'post',
        url: 'http://hyperinventive.com/websites/booking/wp-admin/admin-ajax.php?action=booking_submit_form',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: formData,
    })
    .done(function(value) {
        console.log(value);
        jQuery.LoadingOverlay("hide");
        if (value.status) {
            form.trigger('reset');
            jQuery('.form').html('<a href="http://hyperinventive.com/websites/booking/user-account/" class="btn btn-primary">Booking History</a>');
            swal('Thank You!', value.msg ,'success');
        } else {
            swal({
                type: 'error',
                title: 'Oops...',
                text: value.error,
            });

        }
    })
    .fail(function() {
        jQuery.LoadingOverlay("hide");
        console.log("error");
    });
});


jQuery('a.showlogin').click(function(event) {
    jQuery('.showlogidn').slideToggle();
});


jQuery('.registernewcustomer input[name="createaccount"]').change(function(event) {
    jQuery('.create-account').slideToggle();
});


jQuery('input[name="paymentmethod"]').change(function(event) {
    var v = jQuery(this).val();
    jQuery('.creditcardpayment').slideUp();
    if (v == 'paypal_pro') {
        jQuery('.creditcardpayment').slideDown();
    }
});



jQuery('#loginbtn').click(function(event) {
    var v1 = jQuery('input[name="login[username]"]').val();
    var v2 = jQuery('input[name="login[password]"]').val();
    if (v1 != '' && v2 != '') {
        jQuery.post('http://shearee.com/websites/booking/wp-admin/admin-ajax.php?action=easy_login', { username : v1 , password :  v2 }, function(data, textStatus, xhr) {
            if (data.type == 'success') {
                jQuery('.notlogedin').remove();
                jQuery('.create-account, .registernewcustomer').remove();
            } else {
                jQuery('.loginerror').html(data.message);   
            }
        },'JSON');
    }else {
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'Uername and Password is required!',
        })

    }

});

var form = jQuery("#cms_formsubmit");
        jQuery.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cs_signup",
            dataType: 'json',
            data: form.,
            cache: false,
            success: function(data) {
                console.log(data);
            }
        });