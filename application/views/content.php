    <div class="content-wrap">
    
    
    
    
            

<script type="text/javascript" src="http://localhost/cscart/js/tygh/tabs.js?ver=4.1.5" ></script>

    

<div class="cm-j-tabs cm-track tabs">
    <ul class="nav nav-tabs">
                    <li id="general" class="cm-js">
                        <a >General</a>
        </li>
                            </ul>
</div>
<div class="cm-tabs-content">
        
    
    
    
    <input type="hidden" name="user_id" value="3" />
    <input type="hidden" class="cm-no-hide-input" name="selected_section" id="selected_section" value="" />
    <input type="hidden" class="cm-no-hide-input" name="user_type" value="C" />
    
    <div id="content_general">
        
            <h4 class="subheader  " >
    User account information
    </h4>

    <input type="hidden" name="user_data[status]" value="A" />
    <input type="hidden" name="user_data[user_type]" value="C" />

<div class="control-group">
    <label for="email" class="control-label cm-required cm-email">Email:</label>
    <div class="controls">
        <input type="text" id="email" name="user_data[email]" class="input-large" size="32" maxlength="128" value="customer@example.com" />
    </div>
</div>

<div class="control-group">
    <label for="password1" class="control-label cm-required">Password:</label>
    <div class="controls">
        <input type="password" id="password1" name="user_data[password1]" class="input-large cm-autocomplete-off" size="32" maxlength="32" value="            " />
    </div>
</div>

<div class="control-group">
    <label for="password2" class="control-label cm-required">Confirm password:</label>
    <div class="controls">
        <input type="password" id="password2" name="user_data[password2]" class="input-large cm-autocomplete-off" size="32" maxlength="32" value="            " />
    </div>
</div>

    
        <div class="control-group">
    <label class="control-label cm-required">Status</label>
    <div class="controls">
                    <label class="radio inline" for="user_data_0_a"><input type="radio" name="user_data[status]" id="user_data_0_a" checked="checked" value="A" />Active</label>

        
        
            <label class="radio inline" for="user_data_0_d"><input type="radio" name="user_data[status]" id="user_data_0_d"  value="D" />Disabled</label>
            </div>
</div>


                            <div class="control-group">
                <label for="user_type" class="control-label cm-required">Account type:</label>
                                <div class="controls">
                <select id="user_type" name="user_data[user_type]" onchange="Tygh.$.redirect('http://localhost/cscart/admin.php?dispatch=profiles.update&amp;user_id=3&amp;user_type=' + this.value);">
                    
                                                    <option value="C" selected="selected">Customer</option>
                                                                                                                                        <option value="A" >Administrator</option>
                                                                        

                </select>
                </div>
            </div>
        
        <div class="control-group">
            <label class="control-label" for="tax_exempt">Tax exempt:</label>
            <input type="hidden" name="user_data[tax_exempt]" value="N" />
            <div class="controls">
                <input id="tax_exempt" type="checkbox" name="user_data[tax_exempt]" value="Y"  />
            </div>
        </div>

    
<div class="control-group">
    <label class="control-label" for="user_language">Language</label>
    <div class="controls">
    <select name="user_data[lang_code]" id="user_language">
                    <option value="en" selected="selected">English</option>
            </select>
    </div>
</div>


            
                                
                



        <input type="hidden" name="user_data[company_id]" id="user_data_company_id" value="1">
    


                    

        
        

        
                    
    <h4 class="subheader  " >
    Billing address
    </h4>



    

            
<div class="control-group">
    <label for="elm_14" class="control-label cm-profile-field  ">First name:</label>

    <div class="controls">

      
        <input type="text" id="elm_14" name="user_data[b_firstname]" size="32" value="Customer" class="input-large"  />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_16" class="control-label cm-profile-field  ">Last name:</label>

    <div class="controls">

      
        <input type="text" id="elm_16" name="user_data[b_lastname]" size="32" value="Customer" class="input-large"  />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_30" class="control-label cm-profile-field  ">Phone:</label>

    <div class="controls">

      
        <input type="text" id="elm_30" name="user_data[b_phone]" size="32" value="" class="input-large"  />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_18" class="control-label cm-profile-field  ">Address:</label>

    <div class="controls">

      
        <input type="text" id="elm_18" name="user_data[b_address]" size="32" value="44 Main street" class="input-large"  />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_20" class="control-label cm-profile-field  ">Address:</label>

    <div class="controls">

      
        <input type="text" id="elm_20" name="user_data[b_address_2]" size="32" value="" class="input-large"  />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_22" class="control-label cm-profile-field  ">City:</label>

    <div class="controls">

      
        <input type="text" id="elm_22" name="user_data[b_city]" size="32" value="Boston" class="input-large"  />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_26" class="control-label cm-profile-field  ">Country:</label>

    <div class="controls">

      
                <select id="elm_26" class="cm-country cm-location-billing" name="user_data[b_country]" >
            
            <option value="">- Select country -</option>
                        <option  value="AF">Afghanistan</option>
                        <option  value="AX">Aland Islands</option>
                        <option  value="AL">Albania</option>
                        <option  value="DZ">Algeria</option>
                        <option  value="AS">American Samoa</option>
                        <option  value="AD">Andorra</option>
                        <option  value="AO">Angola</option>
                        <option  value="AI">Anguilla</option>
                        <option  value="AQ">Antarctica</option>
                        <option  value="AG">Antigua and Barbuda</option>
                        <option  value="AR">Argentina</option>
                        <option  value="AM">Armenia</option>
                        <option  value="AW">Aruba</option>
                        <option  value="AP">Asia-Pacific</option>
                        <option  value="AU">Australia</option>
                        <option  value="AT">Austria</option>
                        <option  value="AZ">Azerbaijan</option>
                        <option  value="BS">Bahamas</option>
                        <option  value="BH">Bahrain</option>
                        <option  value="BD">Bangladesh</option>
                        <option  value="BB">Barbados</option>
                        <option  value="BY">Belarus</option>
                        <option  value="BE">Belgium</option>
                        <option  value="BZ">Belize</option>
                        <option  value="BJ">Benin</option>
                        <option  value="BM">Bermuda</option>
                        <option  value="BT">Bhutan</option>
                        <option  value="BO">Bolivia</option>
                        <option  value="BA">Bosnia and Herzegowina</option>
                        <option  value="BW">Botswana</option>
                        <option  value="BV">Bouvet Island</option>
                        <option  value="BR">Brazil</option>
                        <option  value="IO">British Indian Ocean Territory</option>
                        <option  value="VG">British Virgin Islands</option>
                        <option  value="BN">Brunei Darussalam</option>
                        <option  value="BG">Bulgaria</option>
                        <option  value="BF">Burkina Faso</option>
                        <option  value="BI">Burundi</option>
                        <option  value="KH">Cambodia</option>
                        <option  value="CM">Cameroon</option>
                        <option  value="CA">Canada</option>
                        <option  value="CV">Cape Verde</option>
                        <option  value="KY">Cayman Islands</option>
                        <option  value="CF">Central African Republic</option>
                        <option  value="TD">Chad</option>
                        <option  value="CL">Chile</option>
                        <option  value="CN">China</option>
                        <option  value="CX">Christmas Island</option>
                        <option  value="CC">Cocos (Keeling) Islands</option>
                        <option  value="CO">Colombia</option>
                        <option  value="KM">Comoros</option>
                        <option  value="CG">Congo</option>
                        <option  value="CK">Cook Islands</option>
                        <option  value="CR">Costa Rica</option>
                        <option  value="CI">Cote D&#039;ivoire</option>
                        <option  value="HR">Croatia</option>
                        <option  value="CU">Cuba</option>
                        <option  value="CW">Curaçao</option>
                        <option  value="CY">Cyprus</option>
                        <option  value="CZ">Czech Republic</option>
                        <option  value="DK">Denmark</option>
                        <option  value="DJ">Djibouti</option>
                        <option  value="DM">Dominica</option>
                        <option  value="DO">Dominican Republic</option>
                        <option  value="TL">East Timor</option>
                        <option  value="EC">Ecuador</option>
                        <option  value="EG">Egypt</option>
                        <option  value="SV">El Salvador</option>
                        <option  value="GQ">Equatorial Guinea</option>
                        <option  value="ER">Eritrea</option>
                        <option  value="EE">Estonia</option>
                        <option  value="ET">Ethiopia</option>
                        <option  value="EU">Europe</option>
                        <option  value="FK">Falkland Islands (Malvinas)</option>
                        <option  value="FO">Faroe Islands</option>
                        <option  value="FJ">Fiji</option>
                        <option  value="FI">Finland</option>
                        <option  value="FR">France</option>
                        <option  value="FX">France, Metropolitan</option>
                        <option  value="GF">French Guiana</option>
                        <option  value="PF">French Polynesia</option>
                        <option  value="TF">French Southern Territories</option>
                        <option  value="GA">Gabon</option>
                        <option  value="GM">Gambia</option>
                        <option  value="GE">Georgia</option>
                        <option  value="DE">Germany</option>
                        <option  value="GH">Ghana</option>
                        <option  value="GI">Gibraltar</option>
                        <option  value="GR">Greece</option>
                        <option  value="GL">Greenland</option>
                        <option  value="GD">Grenada</option>
                        <option  value="GP">Guadeloupe</option>
                        <option  value="GU">Guam</option>
                        <option  value="GT">Guatemala</option>
                        <option  value="GG">Guernsey</option>
                        <option  value="GN">Guinea</option>
                        <option  value="GW">Guinea-Bissau</option>
                        <option  value="GY">Guyana</option>
                        <option  value="HT">Haiti</option>
                        <option  value="HM">Heard and McDonald Islands</option>
                        <option  value="HN">Honduras</option>
                        <option  value="HK">Hong Kong</option>
                        <option  value="HU">Hungary</option>
                        <option  value="IS">Iceland</option>
                        <option  value="IN">India</option>
                        <option  value="ID">Indonesia</option>
                        <option  value="IQ">Iraq</option>
                        <option  value="IE">Ireland</option>
                        <option  value="IR">Islamic Republic of Iran</option>
                        <option  value="IM">Isle of Man</option>
                        <option  value="IL">Israel</option>
                        <option  value="IT">Italy</option>
                        <option  value="JM">Jamaica</option>
                        <option  value="JP">Japan</option>
                        <option  value="JE">Jersey</option>
                        <option  value="JO">Jordan</option>
                        <option  value="KZ">Kazakhstan</option>
                        <option  value="KE">Kenya</option>
                        <option  value="KI">Kiribati</option>
                        <option  value="KP">Korea</option>
                        <option  value="KR">Korea, Republic of</option>
                        <option  value="KW">Kuwait</option>
                        <option  value="KG">Kyrgyzstan</option>
                        <option  value="LA">Laos</option>
                        <option  value="LV">Latvia</option>
                        <option  value="LB">Lebanon</option>
                        <option  value="LS">Lesotho</option>
                        <option  value="LR">Liberia</option>
                        <option  value="LY">Libyan Arab Jamahiriya</option>
                        <option  value="LI">Liechtenstein</option>
                        <option  value="LT">Lithuania</option>
                        <option  value="LU">Luxembourg</option>
                        <option  value="MO">Macau</option>
                        <option  value="MK">Macedonia</option>
                        <option  value="MG">Madagascar</option>
                        <option  value="MW">Malawi</option>
                        <option  value="MY">Malaysia</option>
                        <option  value="MV">Maldives</option>
                        <option  value="ML">Mali</option>
                        <option  value="MT">Malta</option>
                        <option  value="MH">Marshall Islands</option>
                        <option  value="MQ">Martinique</option>
                        <option  value="MR">Mauritania</option>
                        <option  value="MU">Mauritius</option>
                        <option  value="YT">Mayotte</option>
                        <option  value="MX">Mexico</option>
                        <option  value="FM">Micronesia</option>
                        <option  value="MD">Moldova, Republic of</option>
                        <option  value="MC">Monaco</option>
                        <option  value="MN">Mongolia</option>
                        <option  value="ME">Montenegro</option>
                        <option  value="MS">Montserrat</option>
                        <option  value="MA">Morocco</option>
                        <option  value="MZ">Mozambique</option>
                        <option  value="MM">Myanmar</option>
                        <option  value="NA">Namibia</option>
                        <option  value="NR">Nauru</option>
                        <option  value="NP">Nepal</option>
                        <option  value="NL">Netherlands</option>
                        <option  value="NC">New Caledonia</option>
                        <option  value="NZ">New Zealand</option>
                        <option  value="NI">Nicaragua</option>
                        <option  value="NE">Niger</option>
                        <option  value="NG">Nigeria</option>
                        <option  value="NU">Niue</option>
                        <option  value="NF">Norfolk Island</option>
                        <option  value="MP">Northern Mariana Islands</option>
                        <option  value="NO">Norway</option>
                        <option  value="OM">Oman</option>
                        <option  value="PK">Pakistan</option>
                        <option  value="PW">Palau</option>
                        <option  value="PS">Palestine Authority</option>
                        <option  value="PA">Panama</option>
                        <option  value="PG">Papua New Guinea</option>
                        <option  value="PY">Paraguay</option>
                        <option  value="PE">Peru</option>
                        <option  value="PH">Philippines</option>
                        <option  value="PN">Pitcairn</option>
                        <option  value="PL">Poland</option>
                        <option  value="PT">Portugal</option>
                        <option  value="PR">Puerto Rico</option>
                        <option  value="QA">Qatar</option>
                        <option  value="RS">Republic of Serbia</option>
                        <option  value="RE">Reunion</option>
                        <option  value="RO">Romania</option>
                        <option  value="RU">Russian Federation</option>
                        <option  value="RW">Rwanda</option>
                        <option  value="LC">Saint Lucia</option>
                        <option  value="WS">Samoa</option>
                        <option  value="SM">San Marino</option>
                        <option  value="ST">Sao Tome and Principe</option>
                        <option  value="SA">Saudi Arabia</option>
                        <option  value="SN">Senegal</option>
                        <option  value="CS">Serbia</option>
                        <option  value="SC">Seychelles</option>
                        <option  value="SL">Sierra Leone</option>
                        <option  value="SG">Singapore</option>
                        <option  value="SX">Sint Maarten</option>
                        <option  value="SK">Slovakia</option>
                        <option  value="SI">Slovenia</option>
                        <option  value="SB">Solomon Islands</option>
                        <option  value="SO">Somalia</option>
                        <option  value="ZA">South Africa</option>
                        <option  value="ES">Spain</option>
                        <option  value="LK">Sri Lanka</option>
                        <option  value="SH">St. Helena</option>
                        <option  value="KN">St. Kitts and Nevis</option>
                        <option  value="PM">St. Pierre and Miquelon</option>
                        <option  value="VC">St. Vincent and the Grenadines</option>
                        <option  value="SD">Sudan</option>
                        <option  value="SR">Suriname</option>
                        <option  value="SJ">Svalbard and Jan Mayen Islands</option>
                        <option  value="SZ">Swaziland</option>
                        <option  value="SE">Sweden</option>
                        <option  value="CH">Switzerland</option>
                        <option  value="SY">Syrian Arab Republic</option>
                        <option  value="TW">Taiwan</option>
                        <option  value="TJ">Tajikistan</option>
                        <option  value="TZ">Tanzania, United Republic of</option>
                        <option  value="TH">Thailand</option>
                        <option  value="TG">Togo</option>
                        <option  value="TK">Tokelau</option>
                        <option  value="TO">Tonga</option>
                        <option  value="TT">Trinidad and Tobago</option>
                        <option  value="TN">Tunisia</option>
                        <option  value="TR">Turkey</option>
                        <option  value="TM">Turkmenistan</option>
                        <option  value="TC">Turks and Caicos Islands</option>
                        <option  value="TV">Tuvalu</option>
                        <option  value="UG">Uganda</option>
                        <option  value="UA">Ukraine</option>
                        <option  value="AE">United Arab Emirates</option>
                        <option  value="GB">United Kingdom (Great Britain)</option>
                        <option selected="selected" value="US">United States</option>
                        <option  value="VI">United States Virgin Islands</option>
                        <option  value="UY">Uruguay</option>
                        <option  value="UZ">Uzbekistan</option>
                        <option  value="VU">Vanuatu</option>
                        <option  value="VA">Vatican City State</option>
                        <option  value="VE">Venezuela</option>
                        <option  value="VN">Viet Nam</option>
                        <option  value="WF">Wallis And Futuna Islands</option>
                        <option  value="EH">Western Sahara</option>
                        <option  value="YE">Yemen</option>
                        <option  value="ZR">Zaire</option>
                        <option  value="ZM">Zambia</option>
                        <option  value="ZW">Zimbabwe</option>
                        

        </select>

        </div>
</div>
            
<div class="control-group">
    <label for="elm_24" class="control-label cm-profile-field  ">State/province:</label>

    <div class="controls">

      

                
        <select class="cm-state cm-location-billing" id="elm_24" name="user_data[b_state]" >
            <option value="">- Select state -</option>
                                                <option  value="AL">Alabama</option>
                                    <option  value="AK">Alaska</option>
                                    <option  value="AZ">Arizona</option>
                                    <option  value="AR">Arkansas</option>
                                    <option  value="CA">California</option>
                                    <option  value="CO">Colorado</option>
                                    <option  value="CT">Connecticut</option>
                                    <option  value="DE">Delaware</option>
                                    <option  value="DC">District of Columbia</option>
                                    <option  value="FL">Florida</option>
                                    <option  value="GA">Georgia</option>
                                    <option  value="GU">Guam</option>
                                    <option  value="HI">Hawaii</option>
                                    <option  value="ID">Idaho</option>
                                    <option  value="IL">Illinois</option>
                                    <option  value="IN">Indiana</option>
                                    <option  value="IA">Iowa</option>
                                    <option  value="KS">Kansas</option>
                                    <option  value="KY">Kentucky</option>
                                    <option  value="LA">Louisiana</option>
                                    <option  value="ME">Maine</option>
                                    <option  value="MD">Maryland</option>
                                    <option selected="selected" value="MA">Massachusetts</option>
                                    <option  value="MI">Michigan</option>
                                    <option  value="MN">Minnesota</option>
                                    <option  value="MS">Mississippi</option>
                                    <option  value="MO">Missouri</option>
                                    <option  value="MT">Montana</option>
                                    <option  value="NE">Nebraska</option>
                                    <option  value="NV">Nevada</option>
                                    <option  value="NH">New Hampshire</option>
                                    <option  value="NJ">New Jersey</option>
                                    <option  value="NM">New Mexico</option>
                                    <option  value="NY">New York</option>
                                    <option  value="NC">North Carolina</option>
                                    <option  value="ND">North Dakota</option>
                                    <option  value="MP">Northern Mariana Islands</option>
                                    <option  value="OH">Ohio</option>
                                    <option  value="OK">Oklahoma</option>
                                    <option  value="OR">Oregon</option>
                                    <option  value="PA">Pennsylvania</option>
                                    <option  value="PR">Puerto Rico</option>
                                    <option  value="RI">Rhode Island</option>
                                    <option  value="SC">South Carolina</option>
                                    <option  value="SD">South Dakota</option>
                                    <option  value="TN">Tennessee</option>
                                    <option  value="TX">Texas</option>
                                    <option  value="UT">Utah</option>
                                    <option  value="VT">Vermont</option>
                                    <option  value="VI">Virgin Islands</option>
                                    <option  value="VA">Virginia</option>
                                    <option  value="WA">Washington</option>
                                    <option  value="WV">West Virginia</option>
                                    <option  value="WI">Wisconsin</option>
                                    <option  value="WY">Wyoming</option>
                                    </select><input type="text" id="elm_24_d" name="user_data[b_state]" size="32" maxlength="64" value="MA" disabled="disabled" class="cm-state cm-location-billing input-large hidden cm-skip-avail-switch" />

        </div>
</div>
            
<div class="control-group">
    <label for="elm_28" class="control-label cm-profile-field  cm-zipcode cm-location-billing">Zip/postal code:</label>

    <div class="controls">

      
        <input type="text" id="elm_28" name="user_data[b_zipcode]" size="32" value="02134" class="input-large"  />
        </div>
</div>


            
    <h4 class="subheader  " >
    Shipping address
    </h4>

<label for="elm_ship_to_another">
     <input class="hidden" id="elm_ship_to_another" type="checkbox" name="ship_to_another" value="1"  />
        <span class="cm-combination cm-hide-with-inputs " id="on_sta_notice" onclick="Tygh.$('#sa').switchAvailability(false); Tygh.$('#elm_ship_to_another').click();">
            Order will be delivered to the billing address.&nbsp;<a>Ship to a different address</a>
        </span>
        <span class="cm-combination cm-hide-with-inputs hidden" id="off_sta_notice" onclick="Tygh.$('#sa').switchAvailability(true); Tygh.$('#elm_ship_to_another').click();">
            <a>Order will be delivered to the billing address</a>
        </span>
</label>

    <div id="sa" class="hidden">

    

            
<div class="control-group">
    <label for="elm_15" class="control-label cm-profile-field  ">First name:</label>

    <div class="controls">

      
        <input type="text" id="elm_15" name="user_data[s_firstname]" size="32" value="Customer" class="input-large" disabled="disabled" />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_17" class="control-label cm-profile-field  ">Last name:</label>

    <div class="controls">

      
        <input type="text" id="elm_17" name="user_data[s_lastname]" size="32" value="Customer" class="input-large" disabled="disabled" />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_31" class="control-label cm-profile-field  ">Phone:</label>

    <div class="controls">

      
        <input type="text" id="elm_31" name="user_data[s_phone]" size="32" value="" class="input-large" disabled="disabled" />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_19" class="control-label cm-profile-field  ">Address:</label>

    <div class="controls">

      
        <input type="text" id="elm_19" name="user_data[s_address]" size="32" value="44 Main street" class="input-large" disabled="disabled" />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_21" class="control-label cm-profile-field  ">Address:</label>

    <div class="controls">

      
        <input type="text" id="elm_21" name="user_data[s_address_2]" size="32" value="" class="input-large" disabled="disabled" />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_23" class="control-label cm-profile-field  ">City:</label>

    <div class="controls">

      
        <input type="text" id="elm_23" name="user_data[s_city]" size="32" value="Boston" class="input-large" disabled="disabled" />
        </div>
</div>
            
<div class="control-group">
    <label for="elm_27" class="control-label cm-profile-field  ">Country:</label>

    <div class="controls">

      
                <select id="elm_27" class="cm-country cm-location-shipping" name="user_data[s_country]" disabled="disabled">
            
            <option value="">- Select country -</option>
                        <option  value="AF">Afghanistan</option>
                        <option  value="AX">Aland Islands</option>
                        <option  value="AL">Albania</option>
                        <option  value="DZ">Algeria</option>
                        <option  value="AS">American Samoa</option>
                        <option  value="AD">Andorra</option>
                        <option  value="AO">Angola</option>
                        <option  value="AI">Anguilla</option>
                        <option  value="AQ">Antarctica</option>
                        <option  value="AG">Antigua and Barbuda</option>
                        <option  value="AR">Argentina</option>
                        <option  value="AM">Armenia</option>
                        <option  value="AW">Aruba</option>
                        <option  value="AP">Asia-Pacific</option>
                        <option  value="AU">Australia</option>
                        <option  value="AT">Austria</option>
                        <option  value="AZ">Azerbaijan</option>
                        <option  value="BS">Bahamas</option>
                        <option  value="BH">Bahrain</option>
                        <option  value="BD">Bangladesh</option>
                        <option  value="BB">Barbados</option>
                        <option  value="BY">Belarus</option>
                        <option  value="BE">Belgium</option>
                        <option  value="BZ">Belize</option>
                        <option  value="BJ">Benin</option>
                        <option  value="BM">Bermuda</option>
                        <option  value="BT">Bhutan</option>
                        <option  value="BO">Bolivia</option>
                        <option  value="BA">Bosnia and Herzegowina</option>
                        <option  value="BW">Botswana</option>
                        <option  value="BV">Bouvet Island</option>
                        <option  value="BR">Brazil</option>
                        <option  value="IO">British Indian Ocean Territory</option>
                        <option  value="VG">British Virgin Islands</option>
                        <option  value="BN">Brunei Darussalam</option>
                        <option  value="BG">Bulgaria</option>
                        <option  value="BF">Burkina Faso</option>
                        <option  value="BI">Burundi</option>
                        <option  value="KH">Cambodia</option>
                        <option  value="CM">Cameroon</option>
                        <option  value="CA">Canada</option>
                        <option  value="CV">Cape Verde</option>
                        <option  value="KY">Cayman Islands</option>
                        <option  value="CF">Central African Republic</option>
                        <option  value="TD">Chad</option>
                        <option  value="CL">Chile</option>
                        <option  value="CN">China</option>
                        <option  value="CX">Christmas Island</option>
                        <option  value="CC">Cocos (Keeling) Islands</option>
                        <option  value="CO">Colombia</option>
                        <option  value="KM">Comoros</option>
                        <option  value="CG">Congo</option>
                        <option  value="CK">Cook Islands</option>
                        <option  value="CR">Costa Rica</option>
                        <option  value="CI">Cote D&#039;ivoire</option>
                        <option  value="HR">Croatia</option>
                        <option  value="CU">Cuba</option>
                        <option  value="CW">Curaçao</option>
                        <option  value="CY">Cyprus</option>
                        <option  value="CZ">Czech Republic</option>
                        <option  value="DK">Denmark</option>
                        <option  value="DJ">Djibouti</option>
                        <option  value="DM">Dominica</option>
                        <option  value="DO">Dominican Republic</option>
                        <option  value="TL">East Timor</option>
                        <option  value="EC">Ecuador</option>
                        <option  value="EG">Egypt</option>
                        <option  value="SV">El Salvador</option>
                        <option  value="GQ">Equatorial Guinea</option>
                        <option  value="ER">Eritrea</option>
                        <option  value="EE">Estonia</option>
                        <option  value="ET">Ethiopia</option>
                        <option  value="EU">Europe</option>
                        <option  value="FK">Falkland Islands (Malvinas)</option>
                        <option  value="FO">Faroe Islands</option>
                        <option  value="FJ">Fiji</option>
                        <option  value="FI">Finland</option>
                        <option  value="FR">France</option>
                        <option  value="FX">France, Metropolitan</option>
                        <option  value="GF">French Guiana</option>
                        <option  value="PF">French Polynesia</option>
                        <option  value="TF">French Southern Territories</option>
                        <option  value="GA">Gabon</option>
                        <option  value="GM">Gambia</option>
                        <option  value="GE">Georgia</option>
                        <option  value="DE">Germany</option>
                        <option  value="GH">Ghana</option>
                        <option  value="GI">Gibraltar</option>
                        <option  value="GR">Greece</option>
                        <option  value="GL">Greenland</option>
                        <option  value="GD">Grenada</option>
                        <option  value="GP">Guadeloupe</option>
                        <option  value="GU">Guam</option>
                        <option  value="GT">Guatemala</option>
                        <option  value="GG">Guernsey</option>
                        <option  value="GN">Guinea</option>
                        <option  value="GW">Guinea-Bissau</option>
                        <option  value="GY">Guyana</option>
                        <option  value="HT">Haiti</option>
                        <option  value="HM">Heard and McDonald Islands</option>
                        <option  value="HN">Honduras</option>
                        <option  value="HK">Hong Kong</option>
                        <option  value="HU">Hungary</option>
                        <option  value="IS">Iceland</option>
                        <option  value="IN">India</option>
                        <option  value="ID">Indonesia</option>
                        <option  value="IQ">Iraq</option>
                        <option  value="IE">Ireland</option>
                        <option  value="IR">Islamic Republic of Iran</option>
                        <option  value="IM">Isle of Man</option>
                        <option  value="IL">Israel</option>
                        <option  value="IT">Italy</option>
                        <option  value="JM">Jamaica</option>
                        <option  value="JP">Japan</option>
                        <option  value="JE">Jersey</option>
                        <option  value="JO">Jordan</option>
                        <option  value="KZ">Kazakhstan</option>
                        <option  value="KE">Kenya</option>
                        <option  value="KI">Kiribati</option>
                        <option  value="KP">Korea</option>
                        <option  value="KR">Korea, Republic of</option>
                        <option  value="KW">Kuwait</option>
                        <option  value="KG">Kyrgyzstan</option>
                        <option  value="LA">Laos</option>
                        <option  value="LV">Latvia</option>
                        <option  value="LB">Lebanon</option>
                        <option  value="LS">Lesotho</option>
                        <option  value="LR">Liberia</option>
                        <option  value="LY">Libyan Arab Jamahiriya</option>
                        <option  value="LI">Liechtenstein</option>
                        <option  value="LT">Lithuania</option>
                        <option  value="LU">Luxembourg</option>
                        <option  value="MO">Macau</option>
                        <option  value="MK">Macedonia</option>
                        <option  value="MG">Madagascar</option>
                        <option  value="MW">Malawi</option>
                        <option  value="MY">Malaysia</option>
                        <option  value="MV">Maldives</option>
                        <option  value="ML">Mali</option>
                        <option  value="MT">Malta</option>
                        <option  value="MH">Marshall Islands</option>
                        <option  value="MQ">Martinique</option>
                        <option  value="MR">Mauritania</option>
                        <option  value="MU">Mauritius</option>
                        <option  value="YT">Mayotte</option>
                        <option  value="MX">Mexico</option>
                        <option  value="FM">Micronesia</option>
                        <option  value="MD">Moldova, Republic of</option>
                        <option  value="MC">Monaco</option>
                        <option  value="MN">Mongolia</option>
                        <option  value="ME">Montenegro</option>
                        <option  value="MS">Montserrat</option>
                        <option  value="MA">Morocco</option>
                        <option  value="MZ">Mozambique</option>
                        <option  value="MM">Myanmar</option>
                        <option  value="NA">Namibia</option>
                        <option  value="NR">Nauru</option>
                        <option  value="NP">Nepal</option>
                        <option  value="NL">Netherlands</option>
                        <option  value="NC">New Caledonia</option>
                        <option  value="NZ">New Zealand</option>
                        <option  value="NI">Nicaragua</option>
                        <option  value="NE">Niger</option>
                        <option  value="NG">Nigeria</option>
                        <option  value="NU">Niue</option>
                        <option  value="NF">Norfolk Island</option>
                        <option  value="MP">Northern Mariana Islands</option>
                        <option  value="NO">Norway</option>
                        <option  value="OM">Oman</option>
                        <option  value="PK">Pakistan</option>
                        <option  value="PW">Palau</option>
                        <option  value="PS">Palestine Authority</option>
                        <option  value="PA">Panama</option>
                        <option  value="PG">Papua New Guinea</option>
                        <option  value="PY">Paraguay</option>
                        <option  value="PE">Peru</option>
                        <option  value="PH">Philippines</option>
                        <option  value="PN">Pitcairn</option>
                        <option  value="PL">Poland</option>
                        <option  value="PT">Portugal</option>
                        <option  value="PR">Puerto Rico</option>
                        <option  value="QA">Qatar</option>
                        <option  value="RS">Republic of Serbia</option>
                        <option  value="RE">Reunion</option>
                        <option  value="RO">Romania</option>
                        <option  value="RU">Russian Federation</option>
                        <option  value="RW">Rwanda</option>
                        <option  value="LC">Saint Lucia</option>
                        <option  value="WS">Samoa</option>
                        <option  value="SM">San Marino</option>
                        <option  value="ST">Sao Tome and Principe</option>
                        <option  value="SA">Saudi Arabia</option>
                        <option  value="SN">Senegal</option>
                        <option  value="CS">Serbia</option>
                        <option  value="SC">Seychelles</option>
                        <option  value="SL">Sierra Leone</option>
                        <option  value="SG">Singapore</option>
                        <option  value="SX">Sint Maarten</option>
                        <option  value="SK">Slovakia</option>
                        <option  value="SI">Slovenia</option>
                        <option  value="SB">Solomon Islands</option>
                        <option  value="SO">Somalia</option>
                        <option  value="ZA">South Africa</option>
                        <option  value="ES">Spain</option>
                        <option  value="LK">Sri Lanka</option>
                        <option  value="SH">St. Helena</option>
                        <option  value="KN">St. Kitts and Nevis</option>
                        <option  value="PM">St. Pierre and Miquelon</option>
                        <option  value="VC">St. Vincent and the Grenadines</option>
                        <option  value="SD">Sudan</option>
                        <option  value="SR">Suriname</option>
                        <option  value="SJ">Svalbard and Jan Mayen Islands</option>
                        <option  value="SZ">Swaziland</option>
                        <option  value="SE">Sweden</option>
                        <option  value="CH">Switzerland</option>
                        <option  value="SY">Syrian Arab Republic</option>
                        <option  value="TW">Taiwan</option>
                        <option  value="TJ">Tajikistan</option>
                        <option  value="TZ">Tanzania, United Republic of</option>
                        <option  value="TH">Thailand</option>
                        <option  value="TG">Togo</option>
                        <option  value="TK">Tokelau</option>
                        <option  value="TO">Tonga</option>
                        <option  value="TT">Trinidad and Tobago</option>
                        <option  value="TN">Tunisia</option>
                        <option  value="TR">Turkey</option>
                        <option  value="TM">Turkmenistan</option>
                        <option  value="TC">Turks and Caicos Islands</option>
                        <option  value="TV">Tuvalu</option>
                        <option  value="UG">Uganda</option>
                        <option  value="UA">Ukraine</option>
                        <option  value="AE">United Arab Emirates</option>
                        <option  value="GB">United Kingdom (Great Britain)</option>
                        <option selected="selected" value="US">United States</option>
                        <option  value="VI">United States Virgin Islands</option>
                        <option  value="UY">Uruguay</option>
                        <option  value="UZ">Uzbekistan</option>
                        <option  value="VU">Vanuatu</option>
                        <option  value="VA">Vatican City State</option>
                        <option  value="VE">Venezuela</option>
                        <option  value="VN">Viet Nam</option>
                        <option  value="WF">Wallis And Futuna Islands</option>
                        <option  value="EH">Western Sahara</option>
                        <option  value="YE">Yemen</option>
                        <option  value="ZR">Zaire</option>
                        <option  value="ZM">Zambia</option>
                        <option  value="ZW">Zimbabwe</option>
                        

        </select>

        </div>
</div>
            
<div class="control-group">
    <label for="elm_25" class="control-label cm-profile-field  ">State/province:</label>

    <div class="controls">

      

                
        <select class="cm-state cm-location-shipping" id="elm_25" name="user_data[s_state]" disabled="disabled">
            <option value="">- Select state -</option>
                                                <option  value="AL">Alabama</option>
                                    <option  value="AK">Alaska</option>
                                    <option  value="AZ">Arizona</option>
                                    <option  value="AR">Arkansas</option>
                                    <option  value="CA">California</option>
                                    <option  value="CO">Colorado</option>
                                    <option  value="CT">Connecticut</option>
                                    <option  value="DE">Delaware</option>
                                    <option  value="DC">District of Columbia</option>
                                    <option  value="FL">Florida</option>
                                    <option  value="GA">Georgia</option>
                                    <option  value="GU">Guam</option>
                                    <option  value="HI">Hawaii</option>
                                    <option  value="ID">Idaho</option>
                                    <option  value="IL">Illinois</option>
                                    <option  value="IN">Indiana</option>
                                    <option  value="IA">Iowa</option>
                                    <option  value="KS">Kansas</option>
                                    <option  value="KY">Kentucky</option>
                                    <option  value="LA">Louisiana</option>
                                    <option  value="ME">Maine</option>
                                    <option  value="MD">Maryland</option>
                                    <option selected="selected" value="MA">Massachusetts</option>
                                    <option  value="MI">Michigan</option>
                                    <option  value="MN">Minnesota</option>
                                    <option  value="MS">Mississippi</option>
                                    <option  value="MO">Missouri</option>
                                    <option  value="MT">Montana</option>
                                    <option  value="NE">Nebraska</option>
                                    <option  value="NV">Nevada</option>
                                    <option  value="NH">New Hampshire</option>
                                    <option  value="NJ">New Jersey</option>
                                    <option  value="NM">New Mexico</option>
                                    <option  value="NY">New York</option>
                                    <option  value="NC">North Carolina</option>
                                    <option  value="ND">North Dakota</option>
                                    <option  value="MP">Northern Mariana Islands</option>
                                    <option  value="OH">Ohio</option>
                                    <option  value="OK">Oklahoma</option>
                                    <option  value="OR">Oregon</option>
                                    <option  value="PA">Pennsylvania</option>
                                    <option  value="PR">Puerto Rico</option>
                                    <option  value="RI">Rhode Island</option>
                                    <option  value="SC">South Carolina</option>
                                    <option  value="SD">South Dakota</option>
                                    <option  value="TN">Tennessee</option>
                                    <option  value="TX">Texas</option>
                                    <option  value="UT">Utah</option>
                                    <option  value="VT">Vermont</option>
                                    <option  value="VI">Virgin Islands</option>
                                    <option  value="VA">Virginia</option>
                                    <option  value="WA">Washington</option>
                                    <option  value="WV">West Virginia</option>
                                    <option  value="WI">Wisconsin</option>
                                    <option  value="WY">Wyoming</option>
                                    </select><input type="text" id="elm_25_d" name="user_data[s_state]" size="32" maxlength="64" value="MA" disabled="disabled" class="cm-state cm-location-shipping input-large hidden cm-skip-avail-switch" />

        </div>
</div>
            
<div class="control-group">
    <label for="elm_29" class="control-label cm-profile-field  cm-zipcode cm-location-shipping">Zip/postal code:</label>

    <div class="controls">

      
        <input type="text" id="elm_29" name="user_data[s_zipcode]" size="32" value="02134" class="input-large" disabled="disabled" />
        </div>
</div>
</div>


                </div>
    
    <div id="content_addons">
        
        

    </div>
    
    
    

    
            
        

    
</div>



    
    </div>
