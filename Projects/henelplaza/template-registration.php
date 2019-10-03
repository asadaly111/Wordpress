<?php 
/*
*  Template name: Seller Registration
*
*
*/ 
get_header(); 


// global $student;
// if (!empty($_POST)) {
// 	if ($student->insert_student($_POST)) {
// 		$msg = '<div class="container"><div class="isa_error isa_sucess">User has been created...</div></div>';
// 	}else{
// 		$msg = '<div class="container"><div class="isa_error">Your account is already with us!</div></div>';
// 	}
// }

?>










<?php 
	$emarket_sidebar_template	= get_post_meta( get_the_ID(), 'page_sidebar_layout', true );
	$emarket_sidebar 					= get_post_meta( get_the_ID(), 'page_sidebar_template', true );
?>
	<div class="emarket_breadcrumbs">
		<div class="container">
			<div class="listing-title">			
				<h1><span><?php emarket_title(); ?></span></h1>				
			</div>
			<?php
				if (!is_front_page() ) {
					if (function_exists('emarket_breadcrumb')){
						emarket_breadcrumb('<div class="breadcrumbs custom-font theme-clearfix">', '</div>');
					} 
				} 
			?>
		</div>
	</div>	


<section class="bgmain">
	<div class="container">
		<div class="row">





<style>
.loader-css {position: absolute;background: rgba(255, 255, 255, 0.84);left: 0;right: 0;bottom: 0;top: 0;z-index: 999;display: none;}
.loader-css img {width: 100px;position: absolute;z-index: 9999999;top: 0;right: 0;left: 0;bottom: 0;display: block;margin: auto;}
section.bgmain {padding: 100px 0;}
.isa_error{color: #D8000C;background-color: #FFBABA;}.isa_error{margin: 10px 0;padding: 12px;}.isa_error:before{font-family: isabelc;font-style: normal;font-weight: 400;speak: none;display: inline-block;text-decoration: inherit;width: 1em;margin-right: .2em;text-align: center;font-variant: normal;text-transform: none;line-height: 1em;margin-left: .2em;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;}.isa_error a {float: right;margin-right: 2%;font-size: 20px;text-transform: uppercase;font-weight: 700;color: #D8000C;}
.isa_sucess{      background-color: #80af53 !important;color: white !important;border-radius: 4px;}
.container-wrapm, .bgmain{background:url(http://dev8.onlinetestingserver.com/pathforward/wp-content/uploads/2018/01/re.jpg)!important;background-repeat:no-repeat!important;background-size:100% 100%!important}form#example-form{width:100%!important}.wizard,.tabcontrol{display:block;width:100%;overflow:hidden}.wizard a,.tabcontrol a{outline:0}.wizard ul,.tabcontrol ul{list-style:none!important;padding:0;margin:0}.wizard ul > li,.tabcontrol ul > li{display:block;padding:0}.wizard > .steps .current-info,.tabcontrol > .steps .current-info{position:absolute;left:-999em}.wizard > .content > .title,.tabcontrol > .content > .title{position:absolute;left:-999em}.wizard > .steps{position:relative;display:block;width:100%}.wizard.vertical > .steps{display:inline;float:left;width:30%}.wizard > .steps .number{font-size:1.429em}.wizard > .steps > ul > li{width:25%}.wizard > .steps > ul > li,.wizard > .actions > ul > li{float:left}.wizard.vertical > .steps > ul > li{float:none;width:100%}.wizard > .steps a,.wizard > .steps a:hover,.wizard > .steps a:active{display:block;width:auto;margin:0 0.5em 0.5em;padding:1em 1em;text-decoration:none;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px}.wizard > .steps .disabled a,.wizard > .steps .disabled a:hover,.wizard > .steps .disabled a:active{background:#eee;color:#aaa;cursor:default}.wizard > .steps .current a,.wizard > .steps .current a:hover,.wizard > .steps .current a:active{background:#81af53;color:#fff;cursor:default}.wizard > .steps .done a,.wizard > .steps .done a:hover,.wizard > .steps .done a:active{background:#1b93cc;color:#fff}.wizard > .steps .error a,.wizard > .steps .error a:hover,.wizard > .steps .error a:active{background:#ff3111;color:#fff}.wizard > .content{background:rgba(255,255,255,0.5)!important;display:block;margin:0.5em;min-height:35em;overflow:hidden;position:relative;width:auto;clear:both;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px}.wizard.vertical > .content{display:inline;float:left;margin:0 2.5% 0.5em 2.5%;width:65%}.wizard > .content > .body{float:left;position:relative;width:100%;height:95%;padding:19px 35px 34px 35px}.wizard > .content > .body ul{list-style:disc!important}.wizard > .content > .body ul > li{display:list-item}.wizard > .content > .body > iframe{border:0 none;width:100%;height:100%}.wizard > .content > .body input{display:block;border:1px solid #ccc;color:#333;height: 32px;width: 50%;}.wizard > .content > .body input[type="checkbox"]{display:inline-block}.wizard > .content > .body input.error{background:rgb(251,227,228);border:1px solid #fbc2c4;color:#8a1f11}.wizard > .content > .body label{display:inline-block;margin-bottom:0.5em;font-weight:bold!important;text-transform:uppercase;color:#fff;font-size:16px!important}.wizard > .content > .body label.error{color:#8a1f11;display:inline-block;margin-left:1.5em}.wizard > .actions{position:relative;display:block;text-align:right;width:100%}.wizard.vertical > .actions{display:inline;float:right;margin:0 2.5%;width:95%}.wizard > .actions > ul{display:inline-block;text-align:right}.wizard > .actions > ul > li{margin:0 0.5em}.wizard.vertical > .actions > ul > li{margin:0 0 0 1em}.wizard > .actions a,.wizard > .actions a:hover,.wizard > .actions a:active{background:#81af53;color:#fff;display:block;padding:0.5em 1em;text-decoration:none;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px}.wizard > .actions .disabled a,.wizard > .actions .disabled a:hover,.wizard > .actions .disabled a:active{background:#eee;color:#aaa}.wizard > .loading{}.wizard > .loading .spinner{}.tabcontrol > .steps{position:relative;display:block;width:100%}.tabcontrol > .steps > ul{position:relative;margin:6px 0 0 0;top:1px;z-index:1}.tabcontrol > .steps > ul > li{float:left;margin:5px 2px 0 0;padding:1px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;border-top-left-radius:5px;border-top-right-radius:5px}.tabcontrol > .steps > ul > li:hover{background:#edecec;border:1px solid #bbb;padding:0}.tabcontrol > .steps > ul > li.current{background:#fff;border:1px solid #bbb;border-bottom:0 none;padding:0 0 1px 0;margin-top:0}.tabcontrol > .steps > ul > li > a{color:#5f5f5f;display:inline-block;border:0 none;margin:0;padding:10px 30px;text-decoration:none}.tabcontrol > .steps > ul > li > a:hover{text-decoration:none}.tabcontrol > .steps > ul > li.current > a{padding:15px 30px 10px 30px}.tabcontrol > .content{position:relative;display:inline-block;width:100%;height:35em;overflow:hidden;border-top:1px solid #bbb;padding-top:20px}.tabcontrol > .content > .body{float:left;position:absolute;width:95%;height:95%;padding:2.5%}.tabcontrol > .content > .body ul{list-style:disc!important}.tabcontrol > .content > .body ul > li{display:list-item}#steps-uid-0-p-1 p{color:#fff;font-size:20px;text-transform:uppercase;font-weight:bold}input[type="radio"]{width:6%;float:left;margin-top:6px}#steps-uid-0-p-1 label{width:28%}#steps-uid-0-p-2 select{padding:15px!important;width:100%;border:0px!important;border:1px solid #ccc!important;font-family:'Open Sans';font-weight:400;font-size:16px;line-height:22px;color:#fff;background-color:transparent!important;-moz-box-shadow:none!important;-o-box-shadow:none!important;-moz-transition:none!important;-o-transition:none!important}#steps-uid-0-p-2 option{color:#7CA354!important}#steps-uid-0-p-2 img{width:21%;margin-top:19px}.col-sm-6{width:50%!important;float:left;padding-right:4px}		
</style>
			



			<form id="example-form" action="#">
				<div>
					
					<h3>Profile Info</h3>
					<section>
						<label for="userName">User name</label>
						<input id="userName" name="userName" type="text" class="required">
						<label for="userEmail">Email Address</label>
						<input id="userEmail" name="userEmail" type="email" class="required">
						<label for="userEmail">First Name</label>
						<input id="userFirst" name="userFirst" type="text" class="required">
						<label for="userEmail">Last Name</label>
						<input id="userLast" name="userLast" type="text" class="required">
						<label for="password">Password *</label>
						<input id="password" name="password" type="password" class="required">
						<label for="confirm">Confirm Password *</label>
						<input id="confirm" name="confirm" type="password" class="required">
					</section>
					

					<h3>Store Info</h3>
					<section>
							
							<label for="kvk_number">Chamber of Commerce (Kvk Number)*</label>
							<input id="kvk_number" name="kvk_number" type="text" class="required">

							<label for="shop_name">Shop Name *</label>
							<input id="shop_name" name="shop_name" type="text" class="required">

							<label for="shop_url">Shop URL *</label>
							<input id="shop_url" name="shop_url" type="text" class="required">


							<label for="shop_dsc">Company Description*</label>
							<input id="shop_dsc" name="shop_dsc" type="text" class="required">

							<label for="product_dsc">Product Description*</label>
							<input id="product_dsc" name="product_dsc" type="text" class="required">
							



							<label for="phone_number">Phone Number*</label>
							<input id="phone_number" name="phone_number" type="text" class="required">												

					</section>


					<h3>Bank Info</h3>
					<section>
						
						<label for="iban_number">Bank IBAN Number*</label>
						<input id="iban_number" name="iban_number" type="text" class="required">
							
						<label for="ac_name">Ac Name*</label>
						<input id="ac_name" name="ac_name" type="text" class="required">
						
					</section>




					<h3>Logictical Information</h3>
					<section>						

							<label><input type="radio"  name="logistics[shipping]" value="Own">Own logistical partner</label>
							<label><input type="radio"  name="logistics[shipping]" value="HP">HP logistical partner - Parcel Pro</label>

							<div class="appendihere">
								
							</div>

					</section>


				</div>
				<?php if (!empty($msg)){ echo $msg; } ?>
			</form>






						
		</div>		
	</div>



</section>	

<div class="loader-css">
	<img src="<?php echo site_url('/wp-content/themes/emarket-child-theme/'); ?>/cstm/loader.gif" alt="">
</div>
<?php get_footer(); ?>


<script src="<?php echo site_url('/wp-content/themes/emarket-child-theme/'); ?>/cstm/jquery.steps.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script>


jQuery(document).on('change', 'input[name="logistics[shipping]"]', function(event) {
	event.preventDefault();
	var v = jQuery(this).val();
	if (v == 'Own') {
		jQuery('.appendihere').html('<label for="cost_kg">Cost/ KG*</label><input id="cost_kg" name="logistics[cost_kg]" type="text" class="required"><label for="Delivery_time">Delivery Time*</label><input id="Delivery_time" name="logistics[Delivery_time]" type="text" class="required">');
	}else{
		jQuery('.appendihere').html('');
	}
});


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

//
	var form = jQuery("#example-form");
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
		transitionEffect: "slideLeft",
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
			jQuery('.loader-css').show();
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



		}
	});
</script>