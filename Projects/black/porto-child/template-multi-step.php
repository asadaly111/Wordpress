<?php 
/*
* Template Name: Multi Step Form1
*/
get_header() ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/custom/bootstrap.min.css">

<style>
.form {
    background: #238ac5;
    padding: 100px 0;
}    


#example-form ul[role="tablist"]{
   display: table;
    margin: auto;
    padding: 0;
}
#example-form ul[role="tablist"] li{
    text-indent: inherit;
    width: 40px;
    height: 40px;
    margin-right: 10px;
    border-radius: 50%;
       color: #fff;
    font-size: 20px;
    border: 2px solid #fff;
    padding: 4px 0;
    opacity: .5;
    cursor: default;
    color: #fff;
        display: inline-block !important;
}
#example-form ul[role="tablist"] li.current{
    background-color: #fff;
    opacity: 1;
    }
#example-form ul[role="tablist"] li.current a span.number{
 color: #333 !important;
    opacity: 1 !important;
}

#example-form ul[role="tablist"] li a span.current-info{display: none;}
#example-form ul[role="tablist"] li a span.number{
        display: block;
    text-align: center;
    text-indent: inherit;
    font-size: 20px;
       color: #fff;
    opacity: .5;
    cursor: default;
 
}
#example-form ul[role="tablist"] li a{font-size: 0}
#example-form .title{display: none;}



#example-form section h2{    
      text-align: center;
    font-size: 2.5em;
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    padding: 20px 35px;
    position: relative;
      margin-top: 0;
    line-height: 1.2em;
    color: #fff;
}
#example-form section h2 small{
        color: #fff;font-size: 65%;font-weight: 400;
    line-height: 1;
}

#example-form section h2 i{
    font-size: 21px;
    text-shadow: 0px 2px 3px #0000006b;
    position: relative;
    top: -26px;
    margin-left: -27px;
    left: 17px;
    position: relative;
}

/*fields*/

#example-form .step-select, #main-text .step .step-input, #main-text .step input[type=month], #main-text .step input[type=date] {
    font-size: 22px;
    height: 64px;
    border-radius: 19px;
    padding: 6px 12px;
    line-height: 1.42857143;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
}

#example-form  .answers-small-margin {
    margin-top: 18px;
}


#example-form .step-buttons {
    transition: all 0.2s ease;
    font-size: 24px;
    color: #238ac5;
    border: 0px;
    border-radius: 50px;
    box-shadow: 0px 15px 34px rgba(0, 0, 0, 0.52);
    width: 100%;
    margin-bottom: 15px;
    margin-top: 5px;
}

#example-form .actions ul li:nth-child(1),#example-form .actions ul li:nth-child(3) {
display: none !important;
}
#example-form .actions ul li:nth-child(2){
    transition: all 0.2s ease;
    color: #238ac5;
    border: 0px;
    border-radius: 50px;
    box-shadow: 0px 15px 34px rgba(0, 0, 0, 0.52);
    width: 100%;
    margin-bottom: 15px;
    margin-top: 5px;
    font-size: 30px;
    padding: 5px 10px;
    background: #fff;
    text-align: center;
    width: 40%;
    margin: auto;
}
#example-form .actions ul{
        margin-top: 36px;
}

</style>



<section class="form">
 <div class="container">
   <form id="example-form" action="#">
    <div>
        <h3>2</h3>
        <section>

            <h2> Business Operating Time<i title="" data-toggle="tooltip" data-placement="bottom" class="fa fa-fw fa-question-circle" data-original-title="The period of time your business has been operating since its establishment until now."></i><br></h2>

        </section>

        <h3>2</h3>
        <section>
            <h2> Business Operating Time<i title="" data-toggle="tooltip" data-placement="bottom" class="fa fa-fw fa-question-circle" data-original-title="The period of time your business has been operating since its establishment until now."></i><br></h2>

            <div class="col-md-12 text-center answers-section" style=" margin-top: 36px; ">
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-group input business-months-number-containter">
                        <select class="form-control step-select business-months-number-select" id="business_months_number" name="business_months_number">
                            <option value="-1">Select Operating Time</option>
                            <option value="0">I currently don't own a business</option>
                            <option value="2">Less than 3 Months</option>
                            <option value="4">3 - 5 Months</option>
                            <option value="9">6 - 12 Months </option>
                            <option value="18">1 - 2 Years</option>
                            <option value="48">2 - 5 Years</option>
                            <option value="60">More than 5 Years </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-offset-3 col-md-6 hide">
                    <div class="step-error">
                        <i class="fa fa-fw fa-exclamation-triangle"></i> Please Select Business Operating Time
                    </div>
                </div>
            </div>


        </section>

        <h3>2</h3>
        <section>
            <h2> Choose Your Business Industry<i title="" data-toggle="tooltip" data-placement="bottom" class="fa fa-fw fa-question-circle" data-original-title="The period of time your business has been operating since its establishment until now."></i><br></h2>


            <div class="col-md-offset-3 col-md-6 text-center answers-section  answers-small-margin">
                <div class="row">
                    <div class=" col-md-8 col-md-offset-2">
                        <div class="form-group input">
                            <select id="industry_ID" name="industry_ID" class="form-control form-control step-select select2  select2-hidden-accessible" tabindex="-1" aria-hidden="true"><option value="">Select Industry</option>                 <optgroup label="Automotive">
                                <option value="26">Parts and Accessories</option>
                                <option value="25">Dealership</option>
                                <option value="24">Car Washes</option>
                                <option value="27">Repair and Maintenance</option>
                            </optgroup>
                            <optgroup label="Construction">
                                <option value="28">New Construction (House flipping)</option>
                                <option value="29">Renovation &amp; Remodeling</option>
                                <option value="30">Commercial</option>
                                <option value="31">Residential</option>
                                <option value="99">General Construction</option>
                            </optgroup>
                            <optgroup label="Retail Stores">
                                <option value="42">Building Materials</option>
                                <option value="43">Electronics</option>
                                <option value="44">Fashion, Clothing, Sports Goods</option>
                                <option value="45">Grocery, Supermarkets and Bakeries</option>
                                <option value="46">Garden &amp; Florists</option>
                                <option value="47">Liquor Store</option>
                                <option value="48">Other Retail Store</option>
                                <option value="78">Cell Phone Store</option>
                                <option value="93">Drug paraphernalia</option>
                                <option value="94">E-commerce</option>
                                <option value="95">Electronic cigarette devices</option>
                            </optgroup>
                            <optgroup label="Transportation, Taxis and Trucking">
                                <option value="63">Freight Trucking</option>
                                <option value="64">Limousine</option>
                                <option value="65">Taxis</option>
                                <option value="66">Travel Agencies</option>
                                <option value="67">Other Transportaion &amp; Travel</option>
                                <option value="97">Car Rentals</option>
                                <option value="98">Towing services</option>
                                <option value="102">Uber Driver</option>
                            </optgroup>
                            <optgroup label="Entertainment and Recreation">
                                <option value="1">Adult Entertainment</option>
                                <option value="9">Gambling</option>
                                <option value="69">Sports Club</option>
                                <option value="70">Arts</option>
                                <option value="74">Nightclubs</option>
                                <option value="96">Event and Entertainment Sales</option>
                            </optgroup>
                            <optgroup label="Utilities and Home Services">
                                <option value="6">Cleaning</option>
                                <option value="58">Plumbing, Electricians &amp; HVAC</option>
                                <option value="60">Landscaping Services</option>
                                <option value="61">Other home services</option>
                            </optgroup>
                            <optgroup label="Retail Facilities">
                                <option value="49">Beauty Salon &amp; Barbers</option>
                                <option value="50">Dry Cleaning &amp; Laundry</option>
                                <option value="51">Gym &amp; Fitness Center</option>
                                <option value="52">Nails Salon</option>
                            </optgroup>
                            <optgroup label="Health Services">
                                <option value="33">Dentists</option>
                                <option value="34">Doctors Offices</option>
                                <option value="35">Personal Care Services</option>
                                <option value="36">Pharmacies and Drug Stores</option>
                                <option value="37">Optometrists</option>
                                <option value="38">Other Health Services</option>
                                <option value="84">Biotechnology</option>
                                <option value="85">Diet pills and nutraceuticals</option>
                            </optgroup>
                            <optgroup label="Hospitality">
                                <option value="72">Hotels &amp; Inns</option>
                                <option value="73">Bed and Breakfasts</option>
                            </optgroup>
                            <optgroup label="Professional Services">
                                <option value="7">Finance and Insurance</option>
                                <option value="11">IT, Media, or Publishing</option>
                                <option value="12">Legal Services</option>
                                <option value="79">Accounting</option>
                                <option value="80">Call Centers</option>
                                <option value="81">Communication Services</option>
                                <option value="82">Registered Training Organization</option>
                                <option value="83">Payday or any other financial lenders</option>
                                <option value="100">Direct Marketing</option>
                                <option value="101">Forex or share trading</option>
                            </optgroup>
                            <optgroup label="Restaurants and Food Services">
                                <option value="39">Restaurants and Bars</option>
                                <option value="40">Catering</option>
                                <option value="41">Other Food Services</option>
                            </optgroup>
                            <optgroup label="Other">
                                <option value="89">Not for Profit</option>
                                <option value="8">Firearm Sales</option>
                                <option value="2">Agriculture, Forestry, Fishing and Hunting</option>
                                <option value="13">Manufacturing</option>
                                <option value="14">Mining (except Oil and Gas)</option>
                                <option value="15">Oil and Gas Extraction</option>
                                <option value="16">Other</option>
                                <option value="17">Real Estate</option>
                                <option value="23">Wholesale Trade</option>
                                <option value="32">Convenience Stores</option>
                                <option value="77">Gas stations</option>
                                <option value="86">Farming</option>
                                <option value="87">Gas and Water Supply</option>
                                <option value="88">Government and Defence</option>
                                <option value="90">Auction Houses</option>
                                <option value="91">Tattoo or piercing parlours</option>
                                <option value="92">Pawn Broker</option>
                                <option value="103">Educational Services</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        </section>




        <h3>2</h3>
        <section>

           <h2><b>Monthly Revenue</b>?<br><small>(average over past 6 months)</small></h2>
<div class="col-lg-offset-2 col-lg-8 text-center answers-section" style=" margin-top: 28px; ">
                              <div class="col-md-4">
                                <a class="btn btn-default btn-lg step-buttons button-text-small turnover-button" role="button" href="#main-text" data-slide="next" data-val="500">Less than $1,000</a>
                              </div>
                            <div class="col-md-4">
                              <a class="btn btn-default btn-lg step-buttons button-text-small turnover-button" role="button" href="#main-text" data-slide="next" data-val="3000">$1,000-$5,000</a>
                            </div>
                            <div class="col-md-4">
                              <a class="btn btn-default btn-lg step-buttons button-text-small turnover-button" role="button" href="#main-text" data-slide="next" data-val="6000">$5,000-$8,000</a>
                            </div>
                            <div class="col-md-4">
                              <a class="btn btn-default btn-lg step-buttons button-text-small turnover-button" role="button" href="#main-text" data-slide="next" data-val="10500">$8,000-$13,000</a>
                            </div>
                            <div class="col-md-4">
                              <a class="btn btn-default btn-lg step-buttons button-text-small turnover-button" role="button" href="#main-text" data-slide="next" data-val="16500">$13,000-$20,000</a>
                            </div>
                            <div class="col-md-4">
                              <a class="btn btn-default btn-lg step-buttons button-text-small turnover-button" role="button" href="#main-text" data-slide="next" data-val="25000">$20,000-$30,000</a>
                            </div>
                            <div class="col-md-4">
                              <a class="btn btn-default btn-lg step-buttons button-text-small turnover-button" role="button" href="#main-text" data-slide="next" data-val="45000">$30,000-$50,000</a>
                            </div>
                            <div class="col-md-4">
                              <a class="btn btn-default btn-lg step-buttons button-text-small turnover-button" role="button" href="#main-text" data-slide="next" data-val="75000">$50,000-$100,000</a>
                            </div>
                            <div class="col-md-4">
                              <a class="btn btn-default btn-lg step-buttons button-text-small turnover-button" role="button" href="#main-text" data-slide="next" data-val="100000">$100,000+</a>
                            </div>
                            <input data-hj-whitelist="" style="visibility:hidden" class="form-control step-input" id="monthly_turnover" name="monthly_turnover" type="tel" placeholder="Monthly Revenue $" aria-describedby="basic-addon2">
                          </div>



        </section>




        <h3>2</h3>
        <section>  
  <h2>Personal Credit Score?</h2>
<div class="col-lg-offset-2 col-lg-8 text-center answers-section" style=" margin-top: 28px; ">
                          <div class="col-md-4">
                            <a class="btn btn-default btn-lg step-buttons button-text-small credit-score-button" role="button" href="#main-text" data-slide="next" data-val="499">499 or below</a>
                          </div>
                          <div class="col-md-4">
                            <a class="btn btn-default btn-lg step-buttons button-text-small credit-score-button" role="button" href="#main-text" data-slide="next" data-val="525">500-549</a>
                          </div>
                          <div class="col-md-4">
                            <a class="btn btn-default btn-lg step-buttons button-text-small credit-score-button" role="button" href="#main-text" data-slide="next" data-val="575">550-599</a>
                          </div>
                          <div class="col-md-4">
                            <a class="btn btn-default btn-lg step-buttons button-text-small credit-score-button" role="button" href="#main-text" data-slide="next" data-val="625">600-649</a>
                          </div>
                          <div class="col-md-4">
                            <a class="btn btn-default btn-lg step-buttons button-text-small credit-score-button" role="button" href="#main-text" data-slide="next" data-val="685">650-719</a>
                          </div>
                          <div class="col-md-4">
                            <a class="btn btn-default btn-lg step-buttons button-text-small credit-score-button" role="button" href="#main-text" data-slide="next" data-val="720">720 or above</a>
                          </div>
                          <div class="col-md-4 col-md-offset-4">
                            <a class="btn btn-default btn-lg step-buttons button-text-small credit-score-button" role="button" href="#main-text" data-slide="next" data-val="600">Not Sure</a>
                          </div>

                          <input data-hj-whitelist="" style="visibility:hidden" class="form-control step-input" id="creditscore" name="credit_score" type="tel">
                        </div>


        </section>

    





        <h3>2</h3>
        <section>  
  <h2>Get Your Loan Offers Now</h2>
  <div class="col-md-12 answers-section" style="margin-top: 19px;">
      <div class="col-md-offset-4 col-md-4" id="form-inputs-containter">
        <div class="form-group inner-addon right-addon">
          <i class="fa fa-user"></i>
          <input data-hj-whitelist="" type="text" class="form-control error_input" name="name" id="fullname" placeholder="Full Name">
      </div>
      <div class="form-group inner-addon right-addon email-container-lead">
          <i class="fa fa-envelope"></i>
          <input data-hj-whitelist="" type="email" class="form-control" id="email" name="email" placeholder="Email Address">
      </div>
      <div class="form-group inner-addon right-addon">
          <i class="fa fa-building"></i>
          <input data-hj-whitelist="" type="text" class="form-control" id="business_name" placeholder="Business Name">
      </div>
      <div class="form-group" style="display:none">
          <div class="checkbox-style col-md-12">
            <input checked="" data-hj-whitelist="" type="checkbox" id="agree_emk_lead">
        </div>
    </div>
</div>
<div class="col-md-12 text-center ">
    <p><a class="btn btn-success btn-lg" href="#main-text" id="submit_lead_button" role="button">Get Offers Now <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></p>
</div>
</div>

        </section>

    






    </div>
</form>       
</div>
</section>




<?php get_footer() ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/custom/jquery.steps.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/custom/jquery.validate.min.js"></script>

<script>
    
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
