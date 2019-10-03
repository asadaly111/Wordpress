<?php 
/*
* Template Name: Multi Step Form1
*/
get_header();
?>
<style>
a:hover. span:hover,li:hover{text-decoration:none}
a:focus{outline:0;outline-offset:0}
.mesmerize-inner-page .page-content,.mesmerize-inner-page .content,.mesmerize-front-page.mesmerize-content-padding .page-content{background-color:unset!important}
.form{background: #eabf61;padding:100px 0;background-size: cover;}
#example-form ul[role="tablist"]{display:table;margin:auto;padding:0}
#example-form ul[role="tablist"] li{text-indent:inherit;width:40px;height:40px;margin-right:10px;border-radius:50%;color:#fff;font-size:20px;border:2px solid #fff;padding:4px 0;opacity:.5;cursor:default;color:#fff;display:inline-block!important}
#example-form ul[role="tablist"] li.current{background-color:#fff;opacity:1}
#example-form ul[role="tablist"] li.current a span.number{color:#333!important;opacity:1!important}
#example-form ul[role="tablist"] li a span.current-info{display:none}
#example-form ul[role="tablist"] li a span.number{display:block;text-align:center;text-indent:inherit;font-size:20px;color:#fff;opacity:.5;cursor:default}
#example-form ul[role="tablist"] li a span.number:last-letter{display:none}
#example-form ul[role="tablist"] li a{font-size:0}
#example-form .title{display:none}
#example-form section h2{text-align:center;font-size:2.5em;border-top:1px solid #fff;border-bottom:1px solid #fff;padding:20px 35px;position:relative;margin-top:0;line-height:1.2em;color:#fff}
#example-form section h2 small{color:#fff;font-size:65%;font-weight:400;line-height:1}
#example-form section h2 i{font-size:21px;text-shadow:0 2px 3px #0000006b;position:relative;top:-26px;margin-left:-27px;left:17px;position:relative}
#example-form .step-select,#main-text .step .step-input,#main-text .step input[type=month],#main-text .step input[type=date]{font-size:22px;height:64px;border-radius:19px;padding:6px 12px;line-height:1.42857143;background-color:#fff;background-image:none;border:1px solid #ccc}
#example-form .answers-small-margin{margin-top:18px}
#example-form .step-buttons{transition:all .2s ease;font-size:24px;color:#238ac5;border:0;border-radius:50px;box-shadow:0 15px 34px rgba(0,0,0,0.52);width:100%;margin-bottom:15px;margin-top:5px}
#example-form .actions ul li:nth-child(1),#example-form .actions ul li:nth-child(3){display:none!important}
#example-form .actions ul li{list-style-type:none}
#example-form .actions ul li:nth-child(2) a:hover{text-decoration:none}
#example-form .actions ul li:nth-child(2) a{padding: 18px 0 !important;transition: all .2s ease;color: #eabf61;border: 0;border-radius: 50px;box-shadow: 0 15px 34px rgba(0,0,0,0.52);width: 100%;font-size: 30px;padding: 5px 10px;background: #fff;text-align: center;width: 40%;margin: auto;display: block;}
#example-form .actions ul{margin-top:36px}
#example-form .slider-wapper{display:block;background:#fff;color:#333;border-radius:3px;box-shadow:0 9px 21px rgba(0,0,0,.33),0 2px 3px rgba(0,0,0,.49);text-align:center;max-width:537px;margin:auto;position:relative;padding:11px 0 28px;margin-top:24px}
#example-form .slider-wapper h3{margin-bottom:3px;font-size:1.6em;color:#258ac5;margin-top:17px}
#example-form .slider-wapper #howmuch-num{font-size:37px;font-weight:300;margin-bottom:7px}
.slider-handle.min-slider-handle.round{background:#23a755;width:29px;height:29px;cursor:pointer}
.slider-selection{background:#238247}
.slider-track{position:absolute;cursor:pointer;background-image:-webkit-linear-gradient(top,#f5f5f5 0,#f9f9f9 100%);background-image:-o-linear-gradient(top,#f5f5f5 0,#f9f9f9 100%);background-image:linear-gradient(to bottom,#f5f5f5 0,#f9f9f9 100%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5f5f5',endColorstr='#fff9f9f9',GradientType=0);-webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,.1);box-shadow:inset 0 1px 2px rgba(0,0,0,.1);border-radius:4px}
#ex1Slider{width:85%;height:31px}
.slider-handle.min-slider-handle.round:focus,.slider-handle.min-slider-handle.round:active{outline:none;-webkit-animation:buttonblink .5s 1;-moz-animation:buttonblink .5s 1;-o-animation:buttonblink .5s 1;animation:buttonblink .5s 1;animation-fill-mode:forwards;-webkit-animation-fill-mode:forwards}
.error {color: #ce0847;border-radius: 12px;border: 2px solid #ce0847;font-size: 14px;padding: 1px 8px;margin-bottom: 10px;}
h3#days {font-size: 24px;padding-top: 24px;font-weight: 600;color: #fff;}


.secure_mcafee_lead {margin-bottom: 13px;border-bottom: 1px solid rgba(255, 255, 255, .44);padding-bottom: 16px;}
div#declimer, div#declimer a {color: #fff;margin-top: 28px;text-align: center;}
.secure_mcafee_lead {margin-bottom: 13px;  border-bottom: 1px solid rgba(255, 255, 255, .44);  padding-bottom: 16px}
.secure_mcafee_lead .secure_details {font-size: 13px;  color: #fff;  margin-left: 16px;  border-left: 1px solid #fff;  padding-left: 10px}
.secure_mcafee_lead .secure_details i {color: #fff}
img.mfes-trustmark.mfes-trustmark-hover{    top: 7px;
    position: relative;}
#example-form section h2#amount {text-align: center;font-size: 2.5em;border-top: 1px solid #fff;border-bottom: 1px solid #fff;padding: 8px 35px !important;position: relative;margin-top: 0;line-height: 1.2em;color: #fff;margin-bottom: 30px;}


/*checkbox*/
.checkbox { display: inline-block;position: relative;padding-left: 34px;margin-bottom: 12px;cursor: pointer;font-size: 22px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;margin-right: 23px;}
.checkbox input { position: absolute; opacity: 0; cursor: pointer }
.checkmark { position: absolute; top: 0; left: 0; height: 25px; width: 25px; background-color: #eee }
.checkbox:hover input ~ .checkmark { background-color: #ccc }
.checkbox input:checked ~ .checkmark { background-color: #8bc541 }
.checkmark:after { content: ""; position: absolute; display: none }
.checkbox input:checked ~ .checkmark:after { display: block }
.checkbox .checkmark:after {left: 10px;top: 5px; width: 5px; height: 10px; border: solid white; border-width: 0 3px 3px 0; -webkit-transform: rotate(45deg); -ms-transform: rotate(45deg); transform: rotate(45deg) }
form#example-form .span_6 {color: #fff;}
#example-form .col {margin-right: 1%;} 

#example-form .btn-success{
        display: block;
    margin: auto;
    margin-top: 30px;
    padding: 18px 47px;
    background: #0f9447 !important;
}


.loaderpaypal img {
    display: block;
    margin: auto;
    margin-top: 20px;
}

.loaderpaypal {
    text-align: center;
    color: #fff;
    font-size: 20px;
    display: none; 
}
div#dayscount {
    margin-top: -30px;
}
.discountcode p {
    padding-bottom: 8px;
    font-size: 15px;
    font-weight: 600;
        cursor: pointer;
}

.discountcode button {
    height: 64px;
    width: 82%;
    display: block;
    margin: auto;
    padding: 18px;
    background: #0f9447 !important;
    border: 0;
    font-size: 15px;
    text-align: center;
    color: #fff;
}

</style>

<div class="container-wrap">
    <div class="<?php if($page_full_screen_rows != 'on') echo 'container'; ?> main-content">
        <div class="row">
            <?php
            //breadcrumbs
            if ( function_exists( 'yoast_breadcrumb' ) && !is_home() && !is_front_page() ){ yoast_breadcrumb('<p id="breadcrumbs">','</p>'); }
            //buddypress
            global $bp;
            if($bp && !bp_is_blog_page()) echo '<h1>' . get_the_title() . '</h1>';
            //fullscreen rows
            if($page_full_screen_rows == 'on') echo '<div id="nectar_fullscreen_rows" data-animation="'.$page_full_screen_rows_animation.'" data-row-bg-animation="'.$page_full_screen_rows_bg_img_animation.'" data-animation-speed="'.$page_full_screen_rows_animation_speed.'" data-content-overflow="'.$page_full_screen_rows_content_overflow.'" data-mobile-disable="'.$page_full_screen_rows_mobile_disable.'" data-dot-navigation="'.$page_full_screen_rows_dot_navigation.'" data-footer="'.$page_full_screen_rows_footer.'" data-anchors="'.$page_full_screen_rows_anchors.'">';
            if(have_posts()) : while(have_posts()) : the_post();
                the_content(); ?>
            <?php            endwhile; endif;
            if($page_full_screen_rows == 'on') echo '</div>'; ?>
        </div><!--/row-->
    </div><!--/container-->
</div><!--/container-wrap-->

<section class="form">
   <div class="container">
     <form id="example-form" action="#">
        <div>
            <h3>2</h3>
            <section>
                <div class="discountinput"></div>
                <h2>Booking Form</h2>


                <div class="row">
                    <div class="col span_6">
                        <label for="">Future Camp</label>
                        <select name="future_camp" class="step-select" required="">
                            <option value="0" selected="selected">--- Select ---</option>
                            <option value="october">October Half term 2018</option>
                            <option value="february">February Half term 2019</option>
                        </select>
                    </div>
                    <div class="col span_6">
                        <h3 id="days"></h3>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col span_6">
                        <label for="">Services</label>
                        <select name="services" class="step-select">
                            <option value="0" selected="selected">--- Select ---</option>
                            <option value="Full week">Full week</option>
                            <option value="Day pass">Day pass</option>
                        </select>
                    </div>
                    <div class="col span_6">
                        <label for="">Number Of Persons</label>
                        <select name="number_of_persons" class="step-select">
                         <option value="0" selected="selected">--- Select ---</option>
                         <option value="1">1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option>
                         <option value="6">6</option>
                         <option value="7">7</option>
                         <option value="8">8</option>
                         <option value="9">9</option>
                         <option value="10">10</option>
                     </select>
                    </div>
                </div>



                <div class="row">
                    <div class="col span_6">
                        <p style="visibility: hidden;">Lorem</p>
                        <div id="dayscount">
                        </div>
                        
                        <div class="discountcode">
                            <p>Have discount code? Click Here</p>
                            <div class="togglecss" style="display: none;">
                                <div class="row">
                                    <div class="col span_9"><input type="text" id="discountinput" class="step-select"></div>
                                    <div class="col span_3"><button style="border-radius: 19px !important;">Apply</button></div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="col span_6">
                      <label for="">Amount</label>
                      <h2 id="amount">£0</h2>
                   </div>
               </div>







            </section>




            <h3>2</h3>
            <section>
                <h2>Booking Form</h2>
                <div class="row">
                    <div class="col span_6">
                        Parent/Guardian
                        <input type="text" class="step-select form-control" name="Parent" required="">
                    </div>
                    <div class="col span_6">
                        Address
                        <input type="text" class="step-select form-control" name="Address" required="">
                    </div>
                    <div class="col span_6">
                        *Email
                        <input type="text" class="step-select form-control" name="Email" required="">
                    </div>
                    <div class="col span_6">
                        *Phone
                        <input type="tel" class="step-select form-control" name="phone" required="">
                    </div>
                    <div class="col span_6">
                        Child's School
                        <input type="text" class="step-select form-control" name="Childs_School" required="">
                    </div>
                    <div class="col span_6">
                        Child's Name
                        <input type="text" class="step-select form-control" name="Childs_Name" required="">
                    </div>
                    <div class="col span_6">
                        Age
                        <input type="text" class="step-select form-control" name="Age" required="">
                    </div>
                    <div class="col span_6">
                        Year Group
                        <input type="text" class="step-select form-control" name="Year_Group" required="">
                    </div>
                    <div class="col span_6">
                        Medical Requirements (fill if applicable)
                        <input type="text" name="Medical_Requirements" required="" class="step-select form-control">
                    </div>
                    <div class="col span_12 text-center">
                        <p><button type="submit" class="btn btn-success btn-lg">Submit</button></p>
                    




                        <div class="loaderpaypal">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/09/loader.gif" alt="">
                            <p>Waiting for PayPal...</p>
                        </div>



                    </div>
                </div>
                <div id="declimer" class="col-md-12 text-center ">
                    <div class="secure_mcafee_lead">
                        <img class="mfes-trustmark mfes-trustmark-hover" border="0" src="<?php echo site_url(); ?>/wp-content/uploads/2018/09/102.png" width="60" height="25" title="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams" alt="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams">
                        
                        <img class="mfes-trustmark mfes-trustmark-hover" border="0" src="<?php echo site_url(); ?>/wp-content/uploads/2018/09/paypal-784404_960_720.png" width="60" height="25" title="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams" alt="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams">

                        
                        <span class="secure_details">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <span data-lang-id="Your details are protected">Your details are protected</span>
                        </span>
                    </div>
                    By clicking "Submit", you are indicating that you have read and agree to our <a href="javascript:;" id="Privacy" class="pum-trigger" style="cursor: pointer;">Privacy Policy</a> and <a href="javascript:;" id="Terms" class="pum-trigger" style="cursor: pointer;">Terms And Conditions</a>.
                </div>
            </section>






     </div>








 </form>     

<?php 
$sandbox = false;
$url = $sandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
$email = $sandbox ? 'test@test.com' : 'schoolsout-sportscamp@hotmail.com';
echo '
<form id="paypalform" name="_xclick" action="'.$url.'" method="post" style="visibility: hidden;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="'.$email.'">

<div class="append"></div>


</form>
';
?>


</div>
</section>




<?php get_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/custom/jquery.steps.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/custom/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/custom/sweetalert.min.js"></script>

<script>


jQuery(document).ready(function() {
        
    jQuery('select[name="future_camp"]').change(function(event) {
        var t = jQuery(this).val();
        var selector = jQuery('#days');
        if (t == 'october') {
            selector.html('Monday 22nd October – Friday 26th October 2018');
        }else if (t == 'february') {
            selector.html('Monday 18th February- Friday 22nd February 2019');
        }else{
            selector.html('');
        }
    });
    function checkcondition() {
        var t = jQuery('select[name="future_camp"]').val();
        var v = jQuery('select[name="services"]').val();
        jQuery('#dayscount').html('');
        if (t =='october' && v =='Day pass') {
            var days = [22,23,24,25,26];
            for(x in days){
                jQuery('#dayscount').append('<label class="checkbox"><input type="checkbox" name="select_date[]" value="'+days[x]+'">'+days[x]+'<span class="checkmark"></span></label>');
            }
        }else if (t =='february' && v =='Day pass') {
            var days = [18,19,20,21,22];
            for(x in days){
                jQuery('#dayscount').append('<label class="checkbox"><input type="checkbox" name="select_date[]" value="'+days[x]+'">'+days[x]+'<span class="checkmark"></span></label>');
            }
        }else{
        }
    }
    function total_amount(days=1, person=1, discount=false, dis=0) {
        var v = jQuery('select[name="services"]').val();
        var rate, cal = 0;
        if (v =='Full week') {
            rate = 80;
            cal = person*rate;
        }else if (v =='Day pass') {
            rate = 24;
            cal = days*person*rate;
        }else {
            // alert('Please select service first!');
        }
        // $amount = $amount - $amount*($coupon->amount/100);
        if (discount) {
            if (cal < 1) {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Please fill the required field first!',
                });
             return false;
            }
            cal = cal - cal*(dis/100); 
            console.log(cal);   

            jQuery('.discountinput').html('<input type="hidden" name="discountcode" value="'+dis+'">');         
        }


        cal = cal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "£1,");
        var num = '£' + cal;
        jQuery('#amount').html(num+'<input type="hidden" name="amount" value="'+cal+'" required>');
        console.log(cal);
    }
    jQuery(document).on('change', 'select[name="future_camp"]', function(event) {
        event.preventDefault();
        checkcondition();
    });
    jQuery(document).on('change', 'select[name="services"]', function(event) {
        event.preventDefault();
        checkcondition();
    });
    jQuery(document).on('change', 'input[name="select_date[]"], select[name="number_of_persons"], select[name="future_camp"]', function(event) {
        event.preventDefault();
        
        var person = jQuery('select[name="number_of_persons"]').val();
        var v = 0;
        jQuery('input[name="select_date[]"]:checked').each(function(index, el) {
                v++;
        });
        total_amount(v, person);
    });

// Discount code

jQuery('.discountcode > p').click(function(event) {
    jQuery('.togglecss').slideToggle();
});



jQuery('.togglecss button').click(function(event) {
    event.preventDefault();
    var v = jQuery('#discountinput').val();

    var dis = 0;
    if (v == 'earlybird1') {  
        dis = 10;
        swal('Good job!', dis+'% Discount has been applied...','success')
    }else if (v == 'earlybird2') {
        dis = 20;
        swal('Good job!', dis+'% Discount has been applied...','success')
    }else if (v == 'earlybird3') {
        dis = 30;
        swal('Good job!', dis+'% Discount has been applied...','success')
    }else if (v == 'earlybird4') {
        dis = 40;
        swal('Good job!', dis+'% Discount has been applied...','success')
    }else if (v == 'earlybird5') {
        dis = 50;
        swal('Good job!', dis+'% Discount has been applied...','success')
    }else{
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'Discount code is not valid!',
        });
    }

    var person = jQuery('select[name="number_of_persons"]').val();
    var v = 0;
    jQuery('input[name="select_date[]"]:checked').each(function(index, el) {
        v++;
    });
    total_amount(v, person,true,dis);
});














});//ready ending condition





/**
 * Custom validator for contains at least one lower-case letter
 */
 jQuery.validator.addMethod("atLeastOneLowercaseLetter", function (value, element) {
    return this.optional(element) || /[a-z]+/.test(value);
}, "Must have at least one lowercase letter");
 
/**
 * Custom validator for contains at least one upper-case letter.
 */
 jQuery.validator.addMethod("atLeastOneUppercaseLetter", function (value, element) {
    return this.optional(element) || /[A-Z]+/.test(value);
}, "Must have at least one uppercase letter");
 
/**
 * Custom validator for contains at least one number.
 */
 jQuery.validator.addMethod("atLeastOneNumber", function (value, element) {
    return this.optional(element) || /[0-9]+/.test(value);
}, "Must have at least one number");
 
/**
 * Custom validator for contains at least one symbol. 
 */
 jQuery.validator.addMethod("atLeastOneSymbol", function (value, element) {
    return this.optional(element) || /[!@#$%^&*()]+/.test(value);
}, "Must have at least one symbol");


jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg !== value;
 }, "This field is required.");


var form = jQuery("#example-form");
form.validate({
    errorPlacement: function errorPlacement(error, element) { element.after(error); },
    rules: {
        future_camp: { valueNotEquals: "0" },
        services: { valueNotEquals: "0" },
        number_of_persons: { valueNotEquals: "0" },
        userName: {
            required: true,
            atLeastOneLowercaseLetter: true,
            minlength: 4,
            maxlength: 40,
            remote: {
                url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_checkusername",
                type: "post"
            }
        },
        kvk_number: {
            required: true,
            remote: {
                url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_kvk_number",
                type: "post"
            }
        },
        userEmail: {
            required: true,
            email: true,
            remote: {
                url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_checkemail",
                type: "post"
            }
        },          
        confirm: {
            equalTo: "#password"
        }
    },
    messages: {
        // future_camp: { valueNotEquals: "Please select a month" },
        userName: {
            required: "Please enter your Username",
            remote: "Username is already in use!"
        },
        userEmail: {
            required: "Please enter your Email address.",
            remote: "Email is already in use!"
        },
        kvk_number: {
            required: "Please enter your Kvk Number",
            remote: "Your KVK is'nt verified!"
        }
    },
});
form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
        // transitionEffect: "slideLeft",
        // autoFocus: true,
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex){
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex){
        }
    });


    jQuery(document).on('submit', '#example-form', function(event) {
        event.preventDefault();
        jQuery('#ajax-loading-screen').css({'opacity':'1', 'display':'block'});
        jQuery('#ajax-loading-screen .loading-icon').animate({'opacity':1},400);
        var formData = new FormData(jQuery(this)[0]);
        var pay = jQuery('#paypalform .append');
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
                jQuery('#example-form').trigger('reset');
                // jQuery('.errrrrrr').remove();
                // if (value.class == 'isa_error isa_sucess') {
                //     jQuery('.loader-css').hide();
                // }
                // form.append('<div class="container errrrrrr"><div class="'+value.class+'">'+value.msg+'</div></div>');
                // jQuery('.loader-css').hide();
                console.log(value);
                pay.append('<input type="hidden" name="item_name" value="Future Camp Booking"><input type="hidden" name="currency_code" value="GBP"><input type="hidden"  name="amount" value="'+value.amount+'"> <input type="hidden" name="email" value="'+value.Email+'"><input type="hidden" name="return" value="'+value.url+'">');
                jQuery('.loaderpaypal').show();
                jQuery('#paypalform').submit();

            })
        .fail(function() {
            jQuery('#ajax-loading-screen').css({'opacity':'0', 'display':'none'});
            // jQuery('.loader-css').hide();
            console.log("error");
        });

    });








</script>
