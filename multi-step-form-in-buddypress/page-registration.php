<?php
/**
* template name: Registration
*
*/
get_header(); ?>
<style>
.wizard, .tabcontrol { display: block; width: 100%; overflow: hidden }
.wizard a, .tabcontrol a { outline: 0 }
.wizard ul, .tabcontrol ul { list-style: none !important; padding: 0; margin: 0 }
.wizard ul>li, .tabcontrol ul>li { display: block; padding: 0 }
.wizard>.steps .current-info, .tabcontrol>.steps .current-info { position: absolute; left: -999em }
.wizard>.content>.title, .tabcontrol>.content>.title { position: absolute; left: -999em }
.wizard>.steps { position: relative; display: block; width: 100% }
.wizard.vertical>.steps { display: inline; float: left; width: 30% }
.wizard>.steps .number { font-size: 1.429em }
.wizard>.steps>ul>li { width: 18% }
.wizard>.steps>ul>li, .wizard>.actions>ul>li {
    text-align: center;
    margin: auto;
    display: inline-block;
    float: none;
}
.wizard.vertical>.steps>ul>li { float: none; width: 100% }
.wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active { display: block; width: auto; margin: 0 .5em .5em; padding: 1em 1em; text-decoration: none; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px }
.wizard>.steps .disabled a, .wizard>.steps .disabled a:hover, .wizard>.steps .disabled a:active { background: #eee; color: #aaa; cursor: default }
.wizard>.steps .current a, .wizard>.steps .current a:hover, .wizard>.steps .current a:active { background: #2184be; color: #fff; cursor: default }
.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active { background: #9dc8e2; color: #fff }
.wizard>.steps .error a, .wizard>.steps .error a:hover, .wizard>.steps .error a:active { background: #c51a00; color: #fff }
.wizard>.content {  display: block; margin: .5em; min-height: 25em; overflow: hidden; position: relative; width: auto; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px }
.wizard.vertical>.content { display: inline; float: left; margin: 0 2.5% .5em 2.5%; width: 65% }
.wizard>.content>.body {
    float: none;
    position: absolute;
    width: 50%;
    margin: auto;
    height: 95%;
    padding: 2.5%;
    right: 0;
    left: 0;
}
.wizard>.content>.body ul { list-style: disc !important }
.wizard>.content>.body ul>li { display: list-item }
.wizard>.content>.body>iframe { border: 0 none; width: 100%; height: 100% }
.wizard>.content>.body input , select{ display: block; border: 1px solid #ccc;height: 40px; }
select{margin-bottom: 10px}
.wizard>.content>.body input[type="checkbox"] { display: inline-block }
.wizard>.content>.body input.error { background: #fbe3e4; border: 1px solid #fbc2c4; color: #8a1f11 }
.wizard>.content>.body label { display: inline-block; margin-bottom: .5em; color: #ffffff !important }
.wizard>.content>.body label.error { color: #ffffff; display: inline-block; margin-left: 1.5em }
.wizard>.actions { position: relative; display: block; text-align: right; width: 100% }
.wizard.vertical>.actions { display: inline; float: right; margin: 0 2.5%; width: 95% }
.wizard>.actions>ul {
    display: inline-block;
    text-align: center;
    margin: auto;
    width: 100%; }
    .wizard>.actions>ul>li {
        margin: 0 .5em;
        float: none;
        display: inline-block;
    }
    .wizard.vertical>.actions>ul>li { margin: 0 0 0 1em }
    .wizard>.actions a, .wizard>.actions a:hover, .wizard>.actions a:active { background: #2184be; color: #fff; display: block; padding: .5em 1em; text-decoration: none; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px }
    .wizard>.actions .disabled a, .wizard>.actions .disabled a:hover, .wizard>.actions .disabled a:active { background: #eee; color: #aaa }
    .wizard>.loading { }
    .wizard>.loading .spinner { }
    .tabcontrol>.steps { position: relative; display: block; width: 100% }
    .tabcontrol>.steps>ul { position: relative; margin: 6px 0 0 0; top: 1px; z-index: 1 }
    .tabcontrol>.steps>ul>li { float: left; margin: 5px 2px 0 0; padding: 1px; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; border-top-left-radius: 5px; border-top-right-radius: 5px }
    .tabcontrol>.steps>ul>li:hover { background: #edecec; border: 1px solid #bbb; padding: 0 }
    .tabcontrol>.steps>ul>li.current { background: #fff; border: 1px solid #bbb; border-bottom: 0 none; padding: 0 0 1px 0; margin-top: 0 }
    .tabcontrol>.steps>ul>li>a { color: #5f5f5f; display: inline-block; border: 0 none; margin: 0; padding: 10px 30px; text-decoration: none }
    .tabcontrol>.steps>ul>li>a:hover { text-decoration: none }
    .tabcontrol>.steps>ul>li.current>a { padding: 15px 30px 10px 30px }
    .tabcontrol>.content { position: relative; display: inline-block; width: 100%; height: 35em; overflow: hidden; border-top: 1px solid #bbb; padding-top: 20px }
    .tabcontrol>.content>.body { float: left; position: absolute; width: 95%; height: 95%; padding: 2.5% }
    .tabcontrol>.content>.body ul { list-style: disc !important }
    .tabcontrol>.content>.body ul>li { display: list-item }
    @media(max-width:600px) {
        .wizard>.steps>ul>li { width: 50% }
        .wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active { margin-top: .5em }
        .wizard.vertical>.steps, .wizard.vertical>.actions { display: block; float: none; width: 100% }
        .wizard.vertical>.content { display: block; float: none; margin: 0 .5em .5em; width: auto }
    }
    @media(max-width:480px) {
        .wizard>.steps>ul>li { width: 100% }
    }
    .alert.alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
        text-align: center;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
</style>
<section style="    padding: 0 0 100px 0;position: relative;background: url(https://www.eumello.com/wp-content/uploads/2018/01/frank-mckenna-219857-2-3.jpg); background-size: cover; ">
    <div class="row">
        <div class="twelve columns">
            <br><br><br><div class="msgapend"></div>
            <form id="example-form" action="#">
                <div>
                    <h3>Account Detail</h3>
                    <section>
                        <label for="Username">Username (required)</label>
                        <input id="Username" name="Username" type="text">
                        <label for="email">Email (required)</label>
                        <input id="email" name="email" type="text">
                        <label for="Password">Desired password (required)</label>
                        <input id="Password" name="Password" type="password">
                        <label for="confirm">Confirm password (required)</label>
                        <input id="confirm" name="confirm" type="password">
                    </section>
                    <h3>Profile Detail</h3>
                    <section>
                        <label for="name">Nickname  (required)</label>
                        <input id="name" name="name" type="text">
                        <label for="age">Age  (required)</label>
                        <select name="age1">
                            <option value="" selected="selected">----</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>              </select>
                            <select name="age2">
                                <option value="" selected="selected">----</option><option value="01">January</option><option value="02">February</option><option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>
                            </select>
                            <select  name="age3">
                                <option value="">----</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option>                </select>
                            </section>
                            <h3>Location</h3>
                            <section>
                                <label for="Country">Country (required)</label>
                                <select name="Country">
                                    <option value="">----</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Colombi">Colombi</option><option value="Comoros">Comoros</option><option value="Congo (Brazzaville)">Congo (Brazzaville)</option><option value="Congo">Congo</option><option value="Costa Rica">Costa Rica</option><option value="Cote d'Ivoire">Cote d'Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor (Timor Timur)">East Timor (Timor Timur)</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="Gabon">Gabon</option><option value="Gambia, The">Gambia, The</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Greece">Greece</option><option value="Grenada">Grenada</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea, North">Korea, North</option><option value="Korea, South">Korea, South</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Vincent">Saint Vincent</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia and Montenegro">Serbia and Montenegro</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City">Vatican City</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>        </select>
                                    <label for="City">City (required)</label>
                                    <input id="City" name="City" type="text">
                                </section>
                                <h3>Preference</h3>
                                <section>
                                    <label for="gender">I am a (required)</label>
                                    <select id="gender" name="gender">
                                        <option value="">----</option><option value="Man">Man</option><option value="Woman">Woman</option>      </select>
                                        <label for="intrested">Looking for a (required)</label>
                                        <select name="intrested" id="intrested">
                                            <option value="">----</option><option value="Woman">Woman</option><option value="Man">Man</option>      </select>
                                        </section>
                                        <h3>Status</h3>
                                        <section>
                                            <label for="status">Martial Status (required)</label>
                                            <select name="status">
                                                <option value="">----</option><option value="Single">Single</option><option value="Living together">Living together</option><option value="Married">Married</option><option value="Separated">Separated</option><option value="Divorced">Divorced</option><option value="Widowed">Widowed</option><option value="Prefer not to say">Prefer not to say</option>      </select>
                                            </section>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <div style="clear: both;"></div>
                        <?php get_footer(); ?>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
                        <script src="<?php echo get_template_directory_uri();  ?>/jquery.steps.js"></script>
                        <script>
                            jQuery(document).ready(function() {
                                var form = jQuery("#example-form");
                                form.validate({
                                    errorPlacement: function errorPlacement(error, element) { element.before(error); },
                                    rules: {
                                        name :{
                                            required: true,
                                        },
                                        age1 :{
                                            required: true,
                                        },
                                        age2 :{
                                            required: true,
                                        },
                                        age3 :{
                                            required: true,
                                        },
                                        Country :{
                                            required: true,
                                        },
                                        City :{
                                            required: true,
                                        },
                                        gender :{
                                            required: true,
                                        },
                                        intrested :{
                                            required: true,
                                        },
                                        status :{
                                            required: true,
                                        },
                                        Username : {
                                            required: true,
                                            minlength: 6,
                                            remote: {
                                                url: "<?php echo site_url('/wp-admin/admin-ajax.php?action=checkusername'); ?>",
                                                type: "post"
                                            }
                                        },
                                        email: {
                                            required: true,
                                            email : true,
                                            remote: {
                                                url: "<?php echo site_url('/wp-admin/admin-ajax.php?action=checkemail'); ?>",
                                                type: "post"
                                            }
                                        },
                                        Password: {
                                            required: true,
                                            equalTo: "#Password"
                                        },
                                        confirm: {
                                            required: true,
                                            equalTo: "#Password"
                                        }
                                    },
                                    messages: {
                                        Username: {
                                            required: "Please enter your Username",
                                            remote: "Username is already in use!"
                                        },
                                        email : {
                                            required: "Please enter your Email",
                                            remote: "Email is already in use!"
                                        },
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
                                    onFinishing: function (event, currentIndex)
                                    {
                                        form.validate().settings.ignore = ":disabled";
                                        return form.valid();
                                    },
                                    onFinished: function (event, currentIndex)
                                    {
                                        var t = jQuery(form);
                                        var formData = new FormData(jQuery(form)[0]);
                                        jQuery.ajax({
                                            type: 'post',
                                            url: '<?php echo site_url('/wp-admin/admin-ajax.php?action=formsubmit'); ?>',
                                            contentType: false,
                                            processData: false,
                                            data: formData,
                                        })
                                        .done(function(value) {
                                            console.log(value);
                                            t.trigger('reset');
                                            if (value == 'done') {
                                                jQuery('.msgapend').append('<div class="alert alert-success">Your registrationo has been completed.</div>');
                                            }
                                                // jQuery('.showmsg').append('<p><div class="alert alert-success">We’ve sent a message. Open it up and click Activate Account. We’ll take it from there.</div></p>');
                                            })
                                        .fail(function() {
                                            console.log("error");
                                        });
                                    }
                                });
                            });
                        </script>