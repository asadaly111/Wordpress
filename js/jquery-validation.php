<script>
 jQuery.validator.addMethod("noSpace", function (value, element) {
   return value.indexOf(" ") < 0 && value != "";
 }, "Space are not allowed");
 

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


 var form = jQuery("#validation");
 form.validate({
  errorPlacement: function errorPlacement(error, element) { element.after(error); },
  rules: {
    userName: {
      required: true,
      noSpace : true,
      atLeastOneLowercaseLetter: true,
      minlength: 4,
      maxlength: 40,
      remote: {
        url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_checkusername",
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
  },
  messages: {
    userName: {
      required: "Please enter your Username",
      remote: "Username is already in use!"
    },
    userEmail: {
      required: "Please enter your Email address.",
      remote: "Email is already in use!"
    }
  },
});
</script>






<?php
// ************* STUDENT
add_action( 'wp_ajax_cms_checkusername', 'cms_checkusername' );
add_action( 'wp_ajax_nopriv_cms_checkusername', 'cms_checkusername' );
function cms_checkusername(){
  if (username_exists($_POST['userName'])) {
    echo 'false';
  }else{
    echo 'true';
  }
  exit();
}
add_action( 'wp_ajax_cms_checkemail', 'cms_checkemail' );
add_action( 'wp_ajax_nopriv_cms_checkemail', 'cms_checkemail' );
function cms_checkemail(){
  if (email_exists($_POST['userEmail'])) {
    echo 'false';
  }else{
    echo 'true';
  }
  exit();
}

?>

