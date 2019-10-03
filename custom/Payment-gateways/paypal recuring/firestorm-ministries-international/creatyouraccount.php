<?php 
/*
*
* template name: CREAT YOUR ACCOUNT

*/
get_header(); 


if (@$_GET['msg'] == '1') {
    echo '<div class="alert success"><span class="closebtn">&times;</span><strong>Success!</strong> You have been subscribed!</div>';
}
if (@$_GET['msg'] == '2') {
    echo '<div class="alert"><span class="closebtn">&times;</span><strong>Opps!</strong> Something went wrong...</div>';
}
?>


<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
section.register-form .form-sec .feild-1 input.form-control, section.register-form .form-sec .feild-2 input.form-control, section.register-form .form-sec .feild-3 input.form-control, section.register-form .form-sec .feild-4 input.form-control{
        border-radius: 0 !important;
}
input[type=text], textarea, input[type=email], input[type=password], input[type=tel], input[type=url], input[type=search], input[type=date]{
    margin:0 0 10px;
}
@media (min-width: 690px){
.col {
    margin-right: 1% !important;
}
}
</style>





<section class="register-form">
    <div class="container">
        <div class="row">
            <div class="col span_12 col-md-12">
                <div class="form-sec">
                    <h1>create your account</h1>
                    <hr>
                    <form accept="" method="POST" id="cms_formsubmit">
                        <div class="form-group">
                            <div class="row">
                                <div class="col span_6 col-md-12">
                                    <div class="feild-1">
                                        <input class="form-control" type="text" name="first_name" placeholder="First Name"/>
                                    </div>
                                </div>
                                <div class="col span_6">
                                    <div class="feild-1">
                                        <input class="form-control" type="text" name="last_name" placeholder="last Name"/>
                                    </div>
                                </div>
                                <div class="col span_6">

                                    <div class="feild-2">
                                        <input class="form-control" type="text" name="email" placeholder="email"/>
                                    </div>
                                </div>
                                <div class="col span_6">
                                    <div class="feild-3">
                                        <input class="form-control" type="text" name="number" placeholder="number"/>
                                    </div>
                                </div>
                                <div class="col span_6">
                                    <div class="feild-4">
                                        <input class="form-control" type="password" name="password" placeholder="password"/>
                                    </div>
                                </div>


                                <div class="col span_12 col-md-12">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment_method" value="onetime" required="">
                                            One Time payment
                                        </label>
                                    </div>   
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment_method" value="recuring" required="">
                                            Monthly Payment
                                        </label>
                                    </div>    
                                </div>


                                <div class="col span_12" id="paymentshow" style="display: none;">
                                    <h3 class="t-heading -size-s">Payment Information</h3>
                                    <div class="col span_6">
                                        <div class="feild-1">
                                            <label for="">Card Number</label>
                                            <input type="tel" size="20" name="payment[card_number]" value="5110921864924447">
                                        </div>
                                    </div>
                                    <div class="col span_6">
                                        <div class="feild-1">
                                            <label for="">MM</label>
                                            <input type="tel" size="2" name="payment[month]" value="02">
                                        </div>
                                    </div>
                                    <div class="col span_6">
                                        <div class="feild-1">
                                            <label for="">YY</label>
                                            <input type="tel" size="2" name="payment[year]" value="2020">
                                        </div>
                                    </div>
                                    <div class="col span_6">
                                        <div class="feild-1">
                                            <label for="">CVV (3 digits)</label>
                                            <input type="tel" size="4" name="payment[cvv]" value="456">
                                        </div>
                                    </div>
                                </div>

                                <div class="col span_12 col-md-12">
                                    <div class="send_btn">
                                        <button type="submit">Submit</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>








<?php get_footer(); ?>



<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/loadingoverlay.min.js"></script> 
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/sweetalert.min.js"></script>

<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>

<script>
/**
* Custom validator for contains at least one lower-case letter
*/

jQuery(document).ready(function() {
    

    jQuery(document).on('change', 'input[name="payment_method"]', function(event) {
        event.preventDefault();
        var v = jQuery(this).val();
        console.log(v);
        if (v == 'onetime') {
            jQuery('#paymentshow').slideDown();
        }else{
            jQuery('#paymentshow').slideUp();
        }
    });




});





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
var form = jQuery("#cms_formsubmit");
form.validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
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
        email: {
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
        userName: {
            required: "Please enter your Username",
            remote: "Username is already in use!"
        },
        email: {
            required: "Please enter your Email address.",
            remote: "Email is already in use!"
        },
    },
    submitHandler: function(form) {
        jQuery.LoadingOverlay("show");
    }
});


jQuery('#cms_formsubmit').submit(function(event) {
    event.preventDefault();
    if (jQuery(this).valid() == false) {
        return jQuery(this).valid();
    }
    jQuery.LoadingOverlay("show");
    var form = jQuery(this);
    var formData = new FormData(jQuery(this)[0]);
    jQuery.ajax({
        type: 'post',
        url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_formsubmit',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: formData,
    })
    .done(function(value) {
        jQuery.LoadingOverlay('hide', true);
        if (value.status) {
            if (value.type) {
                window.location = value.url;
            }else{
                swal('Thank You!', value.msg ,'success');
            }
            form.trigger('reset');
        } else {
            swal({
                type: 'error',
                title: 'Oops...',
                text: value.msg,
            });
        }
        console.log(value);
    })
    .fail(function() {
        jQuery.LoadingOverlay("hide");
        console.log("error");
    });
});
</script>




