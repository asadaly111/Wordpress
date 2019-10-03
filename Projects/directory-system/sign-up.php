<?php  /* Template Name: Signup*/ 
get_header();
?>
</header>
<style>
input[type=number]:-webkit-inner-spin-button, input[type=number]:-webkit-outer-spin-button {
 -webkit-appearance: none;
 margin: 0;
 display:none !important;
}
.profileimage + label {
	width: 100%;
	height: 213px;
}
.profileimage + label strong {
	height: 40px;
	float: right;
}
.profileimage1 + label img {
	float: left;
	width: 31%;
	margin-right: 5px;
	margin-bottom: 5px;
}

div#selectedFiles div {
    width: 21%;
    float: left;
    margin-right: 12px;
    font-size: 9px;
    margin-bottom: 6px;
    position: relative;
}

div#selectedFiles div img {
    width: 100%;
}
div#selectedFiles div > span {
    position: absolute;
    top: -3px;
    right: -6px;
    width: 16px;
    height: 17px;
    background: #2a2a2a;
    border-radius: 100%;
    color: #fff;
    text-align: center;
    line-height: 16px;
    padding-left: 1px;
    cursor: pointer;
}
div#catalogueshow p {
    font-size: 14px;
}

div#catalogueshow p i {
    padding-right: 7px;
}
</style>

<div class="clearfix"></div>
<div class="login">
  <div class="container">
    <h1 class="main-heading">Registration</h1>
    <form method="POST" action="" enctype="multipart/form-data" id="validation">
      <div class="col-md-12 c-h-l contact-inner" id="form">
        <div class="col-md-12">
          <h6>Profile Information:</h6>
        </div>
        <div class="contact-inner-1 row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" name="userEmail" class="form-control" placeholder="Email" required="required">
            </div>
            <div class="form-group">
              <input type="text" name="location" class="form-control" placeholder="Location" required="required">
            </div>
            <div class="form-group">
              <input type="text" name="company_name" class="form-control" placeholder="Company Name" required="required">
            </div>
            <div class="form-group">
              <input type="number" step="1" name="company_phone" class="form-control" placeholder="Company Phone" required="required">
            </div>
            <div class="form-group">
              <input type="text" name="website" class="form-control" placeholder="Company Website (if any)">
            </div>
            <div class="form-group">
              <input type="text" name="contact_person_name" class="form-control" placeholder="Contact Person Name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <textarea id="message" name="company_description" class="form-control" placeholder="Company Description" required></textarea>
            </div>
          </div>
        </div>
        <h1 class="main-heading crate-account">Create an Account</h1>
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="form-group">
                <input type="text" name="userName" class="form-control" placeholder="User Name" required="required">
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
              <input type="password"  name="re_enter" class="form-control" placeholder="Re Enter Your Password" >
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="contact-inner-2 row">
          <div class="col-md-6 contact-inner-box-1">
            <div class="col-md-12">
              <h6>Select your category:</h6>
              <img src="images/icon1.png" class="icon" alt="">
              <select class="selectpicker" name="category" id="category" required>
                <option value="">Select Your Category</option>
                <option value="Construction & Consultancy" data-sub="Construction">Construction &amp; Consultancy</option>
                <option value="decorations" data-sub="Decorations">Decorations</option>
                <option value="flooring" data-sub="Flooring">Flooring</option>
                <option value="gardens and swimming pools" data-sub="Gardens">Gardens and swimming pools</option>
                <option value="aluminum and windows" data-sub="Aluminum">Aluminum and Windows</option>
                <option value="kitchens and bathrooms" data-sub="Kitchens">Kitchens and Bathrooms</option>
              </select>
            </div>
            <div class="col-md-12 contact-inner-box-2 sub_cats" style="display: block;">
              <h6>Select your sub-category(s):</h6>
              <div class="col-md-12 sub" id="Construction" style="display: block;">
                <label>
                  <input type="checkbox" name="subcats[]" value="Consultancy">
                  Consultancy</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Construction small building">
                  Construction small building</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Construction big building">
                  Construction big building</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Mechanical and plumbing">
                  Mechanical and plumbing</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Air conditioning and electrical">
                  Air conditioning and electrical</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="General maintenance">
                  General maintenance</label>
              </div>
              <div class="col-md-12 sub" id="Decorations" style="display: none;">
                <label>
                  <input type="checkbox" name="subcats[]" value="Interior design">
                  Interior design</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Painting">
                  Painting </label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Fit out">
                  Fit out </label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Gypsum and ceiling">
                  Gypsum and ceiling</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Wallpaper">
                  Wallpaper</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Cabinet and carpenter">
                  Cabinet and carpenter </label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Furniture">
                  Furniture</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Others">
                  Others</label>
              </div>
              <div class="col-md-12 sub" id="Flooring" style="display: none;">
                <label>
                  <input type="checkbox" name="subcats[]" value="Marble">
                  Marble</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Granite">
                  Granite </label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Tile">
                  Tile</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Stone">
                  Stone</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Others">
                  Others </label>
              </div>
              <div class="col-md-12 sub" id="Gardens" style="display: none;">
                <label>
                  <input type="checkbox" name="subcats[]" value="Landscape">
                  Landscape</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Swimming pool">
                  Swimming pool</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Tent and outdoor decoration">
                  Tent and outdoor decoration</label>
              </div>
              <div class="col-md-12 sub" id="Aluminum" style="display: none;">
                <label>
                  <input type="checkbox" name="subcats[]" value="Windows">
                  Windows</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Exterior doors and Garage">
                  Exterior doors and Garage</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Others">
                  Others </label>
              </div>
              <div class="col-md-12 sub" id="Kitchens" style="display: none;">
                <label>
                  <input type="checkbox" name="subcats[]" value="Kitchen">
                  Kitchen</label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Sanitary and Bathroom">
                  Sanitary and Bathroom </label>
                <label>
                  <input type="checkbox" name="subcats[]" value="Others">
                  Others </label>
              </div>
            </div>
          </div>
          <div class="col-md-6 contact-inner-box-3">
            <div class="col-md-12">
              <h6>Choose your city:</h6>
              <img src="images/icon6.png" class="icon" alt="">
              <select class="selectpicker" name="city" required>
                <option value="">Select City</option>
                <option value="abudhabi">Abudhabi</option>
                <option value="dubai">Dubai</option>
                <option value="sharjah">Sharjah</option>
                <option value="ajman">Ajman</option>
                <option value="um alquwain">Um alquwain</option>
                <option value="ras alkhaima">Ras alkhaima</option>
                <option value="alfujairah">Alfujairah</option>
                <option value="alain">Alain</option>
              </select>
            </div>
          </div>
        </div>
        <div class="contact-inner-3 row">
          <h1 class="main-heading">Upload your <span>files</span></h1>
          <div class="col-md-12 contact-inner-box-2 upload_size_container">
            <div class="col-md-4">
              <h6>Logo (Upload Only JPG, PNG) </h6>
              <div class="box">
                <input type="file" name="logo" id="logo" class="inputfile inputfile-6 profileimage" accept="image/x-png,image/gif,image/jpeg">
                <label for="logo" > <strong> Choose a file…</strong> </label>
                <span> Maximum Size: 3MBs </span> </div>
              <div id="logoimage"></div>
            </div>
            <div class="col-md-4">
              <h6>Recent projects photos (Upload Only JPG, PNG )</h6>
              <div class="box">
                <input type="file" name="project_photos[]" id="project_photos" class="inputfile inputfile-6 profileimage profileimage1" accept="image/x-png,image/gif,image/jpeg" multiple>
                <label for="project_photos" > <strong> Choose a file…</strong> </label>
                <span> Maximum Size: 10 MBs(Upto 10 Photos) </span>
               <div id="selectedFiles"></div>
              </div>
            </div>
            <div class="col-md-4">
              <h6>Catalogue PDF (Upload Only PDF)</h6>
              <div class="box">
                <input type="file" name="catalogue" id="catalogue" class="inputfile inputfile-6" accept="application/pdf">
                <label for="catalogue"><span></span> <strong> Choose a file…</strong></label>
                <span> Maximum  Size: 10 MBs </span> </div>
                <div id="catalogueshow"></div>
            </div>
          </div>
          <div class="col-md-12 contact-inner-box-4">
            <p class="terms_conditions">
              <input type="checkbox" class="check_box" name="required" required="">
              <span style="color: #000;">I agree to your <a target="_blank" href="<?php  echo get_site_url(); ?>/terms-condition"  class="terms_conditions">terms and conditions</a></span> </p>
          </div>
          <div class="col-md-12 contact-inner-box-4">
            <input type="submit" class="btn" value="Submit">
          </div>
        </div>
        <br>
        <div id="msg"> </div>
      </div>
    </form>
  </div>
</div>
<div class="clearfix"></div>
<?php  get_footer(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/inc/jquery.validate.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script> 
<script>





var selDiv = "";
  var storedFiles = [];
  
  jQuery(document).ready(function() {
    jQuery("#project_photos").on("change", handleFileSelect);
    
    selDiv = jQuery("#selectedFiles"); 
    // jQuery("#myForm").on("submit", handleForm);
    
    jQuery("body").on("click", ".selFile, div#selectedFiles div > span", removeFile);
  });
    
  function handleFileSelect(e) {
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function(f) {      

      if(!f.type.match("image.*")) {
        return;
      }
      storedFiles.push(f);

      
      var reader = new FileReader();
      reader.onload = function (e) {
        var html = "<div><img src=\"" + e.target.result + "\" data-file='"+f.name+"' class='selFile' title='Click to remove'>" + f.name + "<br clear=\"left\"/><span data-file='"+f.name+"'>x</span></div>";
        selDiv.append(html);
        
      }
      reader.readAsDataURL(f); 
    });
    
  }
    
  function handleForm(e) {
    e.preventDefault();
    var data = new FormData();
    var formData = jQuery(this).serialize();
    for(var i=0, len=storedFiles.length; i<len; i++) {
      data.append('files[]', storedFiles[i]);
    }
    jQuery.each(formData.split('&'), function (index, elem) {
      var vals = elem.split('=');
      data.append(vals[0], vals[1]);
    });
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit.php', true);
    xhr.onload = function(e) {
      if(this.status == 200) {
        console.log(e.currentTarget.responseText);
      }
    }
    xhr.send(data);
  }
    
  function removeFile(e) {
    var file = jQuery(this).data("file");
    for(var i=0;i<storedFiles.length;i++) {
      if(storedFiles[i].name === file) {
        storedFiles.splice(i,1);
        break;
      }
    }
    jQuery(this).closest('div').remove();
  }



  jQuery('#catalogue').change(function(e){
    var fileName = e.target.files[0].name;
    jQuery('#catalogueshow').html('<p><i class="fa fa-file-pdf"></i>'+fileName+'</p>');
  });




  $(".number").on("keypress keyup blur",function (event) {
    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
      event.preventDefault();
    }
  });
  $(".number").on("keypress keyup blur",function (event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
      event.preventDefault();
    }
  });
// Images work
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      jQuery('#logoimage').html('<img src="'+e.target.result+'">');
    }
    reader.readAsDataURL(input.files[0]);
  }
}
jQuery("#logo").change(function(event) {
  var size = jQuery(this)[0].files[0].size;
  if (size > 3145728) {
    alert('Maximum Size: 3MBs');
  }else{
    readURL(this);
  }
});
/**
 * Custom validator for contains at least one lower-case letter
 */

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
  errorPlacement: function errorPlacement(error, element) { 
    element.after(error);
  },
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
    re_enter : {
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
    }
  },
  submitHandler: function(form) {


    var data = new FormData();
    var formData = new FormData(jQuery(form)[0]);
    formData.delete('project_photos[]');
    for(var i=0, len=storedFiles.length; i<len; i++) {
      data.append('project_photos[]', storedFiles[i]);
    }
    for (var pair of formData.entries()) {
      data.append(pair[0], pair[1]);
    }



    jQuery.LoadingOverlay("show");
    jQuery.ajax({
      type: 'post',
      url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_formsubmit',
      dataType: 'json',
      contentType: false,
      processData: false,
      data: data,
    })
    .done(function(value) {
      jQuery.LoadingOverlay("hide");
      jQuery('#validation').trigger('reset');
      jQuery("#logoimage").html("");
      jQuery("#selectedFiles").html("");
      jQuery('#msg').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+value.msg+'</div>');
      console.log(value);
    })
    .fail(function() {
      jQuery.LoadingOverlay("hide");
      console.log("error");
    });




  }
});



</script> 
