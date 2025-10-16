<?php include "include/header.php" ?>
<main id="main-content" class="usa-prose grid-container">


    <div id="complaintStep" class="margin-top-3 tablet:margin-top-2 usa-step-indicator usa-step-indicator--counters" aria-label="progress">
        <ol class="usa-step-indicator__segments">
            <li class="usa-step-indicator__segment" data-step-num="1" role="button">
                <span class="usa-step-indicator__segment-label">Who is Filing this Complaint?</span>
            </li>
            <li class="usa-step-indicator__segment" data-step-num="2" role="button">
                <span class="usa-step-indicator__segment-label">Complainant Information</span>
            </li>
            <li class="usa-step-indicator__segment" data-step-num="3" role="button">
                <span class="usa-step-indicator__segment-label">Financial Transaction(s)</span>
            </li>
            <li class="usa-step-indicator__segment" data-step-num="4" role="button">
                <span class="usa-step-indicator__segment-label">Information About The Subject(s)</span>
            </li>
            <li class="usa-step-indicator__segment" data-step-num="5" role="button">
                <span class="usa-step-indicator__segment-label">Description of Incident</span>
            </li>
            <li class="usa-step-indicator__segment" data-step-num="6" role="button">
                <span class="usa-step-indicator__segment-label">Other Information</span>
            </li>
            <li class="usa-step-indicator__segment" data-step-num="7" role="button">
                <span class="usa-step-indicator__segment-label">Privacy &amp; Signature</span>
            </li>
        </ol>
    </div>
    <div class="usa-alert usa-alert--info usa-alert--slim">
        <div class="usa-alert__body">
            <ul class="margin-0 usa-alert__text">
                <li>A red asterisk (<abbr title="required" class="usa-hint--required">*</abbr>) indicates a required field.</li>
                <li>All other fields are optional. Please provide all requested information if possible, but these fields may be left blank.</li>
                <li>Do <em class="text-uppercase text-no-italic">not</em> provide complainant Personally Identifiable Information (<abbr>PII</abbr>) such as Social Security numbers or dates of birth anywhere in this form.</li>
            </ul>
        </div>
    </div>
    <form id="IC3ComplaintForm" action="" method="post" novalidate>
        <a id="prompt" aria-controls="promptModal" data-open-modal></a>
        <div class="modal-bootstrap-hidden display-none">
            <div id="promptModal" class="usa-modal" aria-labelledby="promptModalHeading" aria-describedby="promptModalDescription" data-force-action>
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="promptModalHeading">
                            <span class="font-family-sans">Confirm Action</span>
                        </h2>
                        <div class="usa-prose">
                            <p id="promptModalDescription">
                            </p>
                        </div>
                        <div class="usa-modal__footer">
                            <ul class="usa-button-group">
                                <li class="usa-button-group__item">
                                    <button type="button" class="prompt-button--confirm usa-button usa-button--secondary" data-close-modal>
                                        Yes, proceed
                                    </button>
                                </li>
                                <li class="usa-button-group__item">
                                    <button type="button" class="prompt-button--cancel usa-button" data-close-modal>
                                        No, cancel and return to form
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <article id="step1" class="form-step" data-step-num="1">
            <fieldset class="usa-fieldset">
                <legend class="text-semibold border-bottom font-sans-lg width-full usa-legend usa-label">Who is Filing this Complaint?</legend>
                <p>If you were the one affected by this incident, please indicate so below. In the event that you are completing this form on behalf of another individual or business, please select NO and provide your contact information.</p>
                <fieldset class="usa-fieldset is-victim">
                    <legend class="usa-legend usa-label"><abbr class="usa-hint--required" title="Required">*</abbr>Were you the one affected in this incident?</legend>
                    <div class="usa-radio">
                        <input aria-errormessage="IsVictim_error" class="usa-radio__input" id="IsVictim_yes" required type="radio" value="true" data-val="true" data-val-required="Please indicate if you are the Victim in this incident." name="IsVictim">
                        <label class="usa-radio__label" for="IsVictim_yes">Yes</label>
                        <input aria-errormessage="IsVictim_error" class="usa-radio__input" id="IsVictim_no" required type="radio" value="false" name="IsVictim">
                        <label class="usa-radio__label" for="IsVictim_no">No</label>
                    </div>
                    <div class="val-error" id="IsVictim_error"></div>
                </fieldset>
            </fieldset>
            <fieldset id="contactInfo" class="noborder margin-y-3">
                <legend class="text-semibold border-bottom font-sans-lg width-full usa-legend usa-label">Your Contact Information</legend>
                <fieldset class="noborder"><label class="usa-label inline" for="Complainant_Name"><abbr class="usa-hint--required" title="Required">*</abbr>Name:</label><input required data-field-type="Name" aria-errormessage="Complainant_Name_error" class="usa-input inline" data-val="true" data-val-length="The Complainant Name must be no longer than 50 characters." data-val-length-max="50" data-val-required="Please provide your name." id="Complainant_Name" maxlength="50" name="Complainant.Name" type="text" value="" />
                    <div class="val-error" id="Complainant_Name_error"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Complainant_BusinessName">Business Name: </label><input data-field-type="Business" aria-errormessage="Complainant_BusinessName_error" class="usa-input inline" data-val="true" data-val-length="The Complainant Business Name must be no longer than 50 characters." data-val-length-max="50" id="Complainant_BusinessName" maxlength="50" name="Complainant.BusinessName" type="text" value="" />
                    <div class="val-error" id="Complainant_BusinessName_error"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Complainant_Phone"><abbr class="usa-hint--required" title="Required">*</abbr>Phone Number: </label><input required type="tel" pattern="\d&#x2B;" class="usa-tooltip usa-input inline" data-position="right" data-classes="display-inline" title="Numbers only (1112223333)" data-field-type="Phone" aria-errormessage="Complainant_Phone_error" data-val="true" data-val-length="The Complainant Phone Number must be no longer than 50 digits." data-val-length-max="50" data-val-regex="The Complainant Phone Number must be digits only. (ex. 1112223333)" data-val-regex-pattern="\d&#x2B;" data-val-required="Please provide your phone number." id="Complainant_Phone" maxlength="50" name="Complainant.Phone" value="" />
                    <div class="val-error" id="Complainant_Phone_error"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Complainant_Email"><abbr class="usa-hint--required" title="Required">*</abbr>Email Address: </label><input required type="email" class="usa-tooltip usa-input inline" data-position="right" data-classes="display-inline" title="Example: jdoe@email.com" data-field-type="Email" aria-errormessage="Complainant_Email_error" data-val="true" data-val-emailaddress="Please provide a valid Email Address for the Complainant." data-val-length="The Complainant Email Address must be no longer than 50 digits." data-val-length-max="50" data-val-required="Please provide your email address." id="Complainant_Email" maxlength="50" name="Complainant.Email" value="" />
                    <div class="val-error" id="Complainant_Email_error"></div>
                </fieldset>
            </fieldset>
        </article>
        <article id="step2" class="form-step" data-step-num="2">
            <fieldset class="usa-fieldset">
                <legend class="text-semibold border-bottom font-sans-lg width-full usa-legend usa-label">Complainant Information</legend>
                <p>Please provide as much detail as possible related to the one affected by this incident. If you are reporting on behalf of a business, please include any Points-of-Contact (<abbr>POC</abbr>s) at the business in the section below.</p>
                <fieldset class="noborder"><label class="usa-label inline" for="Victim_Name"><abbr class="usa-hint--required" title="Required">*</abbr>Name: </label><input required data-field-type="Name" aria-errormessage="Victim_Name_error" class="usa-input inline" data-val="true" data-val-length="The Complainant Name must be no longer than 50 characters." data-val-length-max="50" data-val-required="Please provide a Complainant Name." id="Victim_Name" maxlength="50" name="Victim.Name" type="text" value="" />
                    <div class="val-error" id="Victim_Name_error"></div>
                </fieldset>
                <fieldset class="noborder" data-target="isMinor" data-target-value="Under20">
                    <label class="usa-label inline" for="Victim_AgeRange">Age: </label>
                    <select class="usa-select inline" aria-errormessage="ageRangeError" id="Victim_AgeRange" name="Victim.AgeRange">
                        <option value="">Please select one...</option>
                        <optgroup label="">
                            <option value="Under20">Under 20</option>
                            <option value="TwentyTo29">20 - 29</option>
                            <option value="ThirtyTo39">30 - 39</option>
                            <option value="Fortyto49">40 - 49</option>
                            <option value="Fiftyto59">50 - 59</option>
                            <option value="Over60">Over 60</option>
                        </optgroup>
                    </select>
                    <div class="val-error" id="ageRangeError"></div>
                </fieldset>
                <fieldset class="usa-fieldset fieldset-contingent" id="isMinor">
                    <legend class="usa-legend usa-label"><abbr class="usa-hint--required" title="Required">*</abbr>Is the complainant 17 years old or younger?</legend>
                    <div class="usa-radio">
                        <input aria-errormessage="Victim_IsMinor_error" class="usa-radio__input" id="Victim_IsMinor_yes" required type="radio" value="true" data-val="true" data-val-required-when="Please specify if this Complainant is aged 17 or under." data-val-required-when-allowempty="false" data-val-required-when-input="Victim.AgeRange" data-val-required-when-op="eq" data-val-required-when-target="Under20" name="Victim.IsMinor">
                        <label class="usa-radio__label" for="Victim_IsMinor_yes">Yes</label>
                        <input aria-errormessage="Victim_IsMinor_error" class="usa-radio__input" id="Victim_IsMinor_no" required type="radio" value="false" name="Victim.IsMinor">
                        <label class="usa-radio__label" for="Victim_IsMinor_no">No</label>
                    </div>
                    <div class="val-error" id="Victim_IsMinor_error"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Victim_Address1"><abbr class="usa-hint--required" title="Required">*</abbr>Address: </label><input required aria-errormessage="Victim_Address1_error" class="usa-input inline" data-val="true" data-val-length="The Complainant Address must be no longer than 50 characters." data-val-length-max="50" data-val-required="Please provide an address for the Complainant." id="Victim_Address1" maxlength="50" name="Victim.Address1" type="text" value="" />
                    <div class="val-error" id="Victim_Address1_error"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Victim_Address2">Address (continued): </label><input aria-errormessage="Victim_Address2_error" class="usa-input inline" data-val="true" data-val-length="The Complainant Address (cont.) must be no longer than 50 characters." data-val-length-max="50" id="Victim_Address2" maxlength="50" name="Victim.Address2" type="text" value="" />
                    <div class="val-error" id="Victim_Address2_error"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Victim_Suite">Suite/Apt./Mail Stop: </label><input aria-errormessage="Victim_Suite_error" class="usa-input inline" data-val="true" data-val-length="The Complainant Suite must be no longer than 50 characters." data-val-length-max="50" id="Victim_Suite" maxlength="50" name="Victim.Suite" type="text" value="" />
                    <div class="val-error" id="Victim_Suite_error"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Victim_City"><abbr class="usa-hint--required" title="Required">*</abbr>City: </label><input required aria-errormessage="Victim_City_error" class="usa-input inline" data-val="true" data-val-length="The Complainant City must be no longer than 50 characters." data-val-length-max="50" data-val-required="Please provide a city for the Complainant." id="Victim_City" maxlength="50" name="Victim.City" type="text" value="" />
                    <div class="val-error" id="Victim_City_error"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Victim_County">County: </label><input aria-errormessage="Victim_County_error" class="usa-input inline" data-val="true" data-val-length="The Complainant County must be no longer than 50 characters." data-val-length-max="50" id="Victim_County" maxlength="50" name="Victim.County" type="text" value="" />
                    <div class="val-error" id="Victim_County_error"></div>
                </fieldset>
                <fieldset class="noborder" data-target="victimState" data-target-value="USA">
                    <label class="usa-label inline" for="Victim_Country"><abbr title="required" class="usa-hint--required">*</abbr>Country: </label>
                    <select class="usa-select inline" required aria-errormessage="victimCountryError" data-val="true" data-val-required="Please select a country for the Complainant." id="Victim_Country" name="Victim.Country">
                        <option value="" selected="selected">Please select one...</option>
                        <optgroup label="">
                            <option value="USA">United States of America</option>
                            <option value="AFG">Afghanistan</option>
                            <option value="ALA">&#xC5;land Islands</option>
                            <option value="ALB">Albania</option>
                            <option value="DZA">Algeria</option>
                            <option value="AND">Andorra</option>
                            <option value="AGO">Angola</option>
                            <option value="AIA">Anguilla</option>
                            <option value="ATA">Antarctica</option>
                            <option value="ATG">Antigua and Barbuda</option>
                            <option value="ARG">Argentina</option>
                            <option value="ARM">Armenia</option>
                            <option value="ABW">Aruba</option>
                            <option value="AUS">Australia</option>
                            <option value="AUT">Austria</option>
                            <option value="AZE">Azerbaijan</option>
                            <option value="BHS">Bahamas</option>
                            <option value="BHR">Bahrain</option>
                            <option value="BGD">Bangladesh</option>
                            <option value="BRB">Barbados</option>
                            <option value="BLR">Belarus</option>
                            <option value="BEL">Belgium</option>
                            <option value="BLZ">Belize</option>
                            <option value="BEN">Benin</option>
                            <option value="BMU">Bermuda</option>
                            <option value="BTN">Bhutan</option>
                            <option value="BOL">Bolivia (Plurinational State of)</option>
                            <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BIH">Bosnia and Herzegovina</option>
                            <option value="BWA">Botswana</option>
                            <option value="BVT">Bouvet Island</option>
                            <option value="BRA">Brazil</option>
                            <option value="IOT">British Indian Ocean Territory</option>
                            <option value="BRN">Brunei Darussalam</option>
                            <option value="BGR">Bulgaria</option>
                            <option value="BFA">Burkina Faso</option>
                            <option value="BDI">Burundi</option>
                            <option value="CPV">Cabo Verde</option>
                            <option value="KHM">Cambodia</option>
                            <option value="CMR">Cameroon</option>
                            <option value="CAN">Canada</option>
                            <option value="CYM">Cayman Islands</option>
                            <option value="CAF">Central African Republic</option>
                            <option value="TCD">Chad</option>
                            <option value="CHL">Chile</option>
                            <option value="CHN">China</option>
                            <option value="CXR">Christmas Island</option>
                            <option value="CCK">Cocos (Keeling) Islands</option>
                            <option value="COL">Colombia</option>
                            <option value="COM">Comoros</option>
                            <option value="COG">Congo</option>
                            <option value="COD">Congo (Democratic Republic of the)</option>
                            <option value="COK">Cook Islands</option>
                            <option value="CRI">Costa Rica</option>
                            <option value="CIV">C&#xF4;te d&#x27;Ivoire</option>
                            <option value="HRV">Croatia</option>
                            <option value="CUB">Cuba</option>
                            <option value="CUW">Cura&#xE7;ao</option>
                            <option value="CYP">Cyprus</option>
                            <option value="CZE">Czech Republic</option>
                            <option value="DNK">Denmark</option>
                            <option value="DJI">Djibouti</option>
                            <option value="DMA">Dominica</option>
                            <option value="DOM">Dominican Republic</option>
                            <option value="ECU">Ecuador</option>
                            <option value="EGY">Egypt</option>
                            <option value="SLV">El Salvador</option>
                            <option value="GNQ">Equatorial Guinea</option>
                            <option value="ERI">Eritrea</option>
                            <option value="EST">Estonia</option>
                            <option value="ETH">Ethiopia</option>
                            <option value="FLK">Falkland Islands (Malvinas)</option>
                            <option value="FRO">Faroe Islands</option>
                            <option value="FJI">Fiji</option>
                            <option value="FIN">Finland</option>
                            <option value="FRA">France</option>
                            <option value="GUF">French Guiana</option>
                            <option value="PYF">French Polynesia</option>
                            <option value="ATF">French Southern Territories</option>
                            <option value="GAB">Gabon</option>
                            <option value="GMB">Gambia</option>
                            <option value="GEO">Georgia</option>
                            <option value="DEU">Germany</option>
                            <option value="GHA">Ghana</option>
                            <option value="GIB">Gibraltar</option>
                            <option value="GRC">Greece</option>
                            <option value="GRL">Greenland</option>
                            <option value="GRD">Grenada</option>
                            <option value="GLP">Guadeloupe</option>
                            <option value="GTM">Guatemala</option>
                            <option value="GGY">Guernsey</option>
                            <option value="GIN">Guinea</option>
                            <option value="GNB">Guinea-Bissau</option>
                            <option value="GUY">Guyana</option>
                            <option value="HTI">Haiti</option>
                            <option value="HMD">Heard Island and McDonald Islands</option>
                            <option value="VAT">Holy See</option>
                            <option value="HND">Honduras</option>
                            <option value="HKG">Hong Kong</option>
                            <option value="HUN">Hungary</option>
                            <option value="ISL">Iceland</option>
                            <option value="IND">India</option>
                            <option value="IDN">Indonesia</option>
                            <option value="IRN">Iran (Islamic Republic of)</option>
                            <option value="IRQ">Iraq</option>
                            <option value="IRL">Ireland</option>
                            <option value="IMN">Isle of Man</option>
                            <option value="ISR">Israel</option>
                            <option value="ITA">Italy</option>
                            <option value="JAM">Jamaica</option>
                            <option value="JPN">Japan</option>
                            <option value="JEY">Jersey</option>
                            <option value="JOR">Jordan</option>
                            <option value="KAZ">Kazakhstan</option>
                            <option value="KEN">Kenya</option>
                            <option value="KIR">Kiribati</option>
                            <option value="PRK">Korea (Democratic People&#x27;s Republic of)</option>
                            <option value="KOR">Korea (Republic of)</option>
                            <option value="KWT">Kuwait</option>
                            <option value="KGZ">Kyrgyzstan</option>
                            <option value="LAO">Lao People&#x27;s Democratic Republic</option>
                            <option value="LVA">Latvia</option>
                            <option value="LBN">Lebanon</option>
                            <option value="LSO">Lesotho</option>
                            <option value="LBR">Liberia</option>
                            <option value="LBY">Libya</option>
                            <option value="LIE">Liechtenstein</option>
                            <option value="LTU">Lithuania</option>
                            <option value="LUX">Luxembourg</option>
                            <option value="MAC">Macao</option>
                            <option value="MDG">Madagascar</option>
                            <option value="MWI">Malawi</option>
                            <option value="MYS">Malaysia</option>
                            <option value="MDV">Maldives</option>
                            <option value="MLI">Mali</option>
                            <option value="MLT">Malta</option>
                            <option value="MHL">Marshall Islands</option>
                            <option value="MTQ">Martinique</option>
                            <option value="MRT">Mauritania</option>
                            <option value="MUS">Mauritius</option>
                            <option value="MYT">Mayotte</option>
                            <option value="MEX">Mexico</option>
                            <option value="FSM">Micronesia (Federated States of)</option>
                            <option value="MDA">Moldova (Republic of)</option>
                            <option value="MCO">Monaco</option>
                            <option value="MNG">Mongolia</option>
                            <option value="MNE">Montenegro</option>
                            <option value="MSR">Montserrat</option>
                            <option value="MAR">Morocco</option>
                            <option value="MOZ">Mozambique</option>
                            <option value="MMR">Myanmar</option>
                            <option value="NAM">Namibia</option>
                            <option value="NRU">Nauru</option>
                            <option value="NPL">Nepal</option>
                            <option value="NLD">Netherlands</option>
                            <option value="NCL">New Caledonia</option>
                            <option value="NZL">New Zealand</option>
                            <option value="NIC">Nicaragua</option>
                            <option value="NER">Niger</option>
                            <option value="NGA">Nigeria</option>
                            <option value="NIU">Niue</option>
                            <option value="NFK">Norfolk Island</option>
                            <option value="MKD">North Macedonia</option>
                            <option value="NOR">Norway</option>
                            <option value="OMN">Oman</option>
                            <option value="PAK">Pakistan</option>
                            <option value="PLW">Palau</option>
                            <option value="PSE">Palestinian Territory, Occupied</option>
                            <option value="PAN">Panama</option>
                            <option value="PNG">Papua New Guinea</option>
                            <option value="PRY">Paraguay</option>
                            <option value="PER">Peru</option>
                            <option value="PHL">Philippines</option>
                            <option value="PCN">Pitcairn</option>
                            <option value="POL">Poland</option>
                            <option value="PRT">Portugal</option>
                            <option value="QAT">Qatar</option>
                            <option value="REU">R&#xE9;union</option>
                            <option value="ROU">Romania</option>
                            <option value="RUS">Russian Federation</option>
                            <option value="RWA">Rwanda</option>
                            <option value="BLM">Saint Barth&#xE9;lemy</option>
                            <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KNA">Saint Kitts and Nevis</option>
                            <option value="LCA">Saint Lucia</option>
                            <option value="MAF">Saint Martin (French part)</option>
                            <option value="SPM">Saint Pierre and Miquelon</option>
                            <option value="VCT">Saint Vincent and the Grenadines</option>
                            <option value="WSM">Samoa</option>
                            <option value="SMR">San Marino</option>
                            <option value="STP">Sao Tome and Principe</option>
                            <option value="SAU">Saudi Arabia</option>
                            <option value="SEN">Senegal</option>
                            <option value="SRB">Serbia</option>
                            <option value="SYC">Seychelles</option>
                            <option value="SLE">Sierra Leone</option>
                            <option value="SGP">Singapore</option>
                            <option value="SXM">Sint Maarten (Dutch part)</option>
                            <option value="SVK">Slovakia</option>
                            <option value="SVN">Slovenia</option>
                            <option value="SLB">Solomon Islands</option>
                            <option value="SOM">Somalia</option>
                            <option value="ZAF">South Africa</option>
                            <option value="SGS">South Georgia and the South Sandwich Islands</option>
                            <option value="SSD">South Sudan</option>
                            <option value="ESP">Spain</option>
                            <option value="LKA">Sri Lanka</option>
                            <option value="SDN">Sudan</option>
                            <option value="SUR">Suriname</option>
                            <option value="SJM">Svalbard and Jan Mayen</option>
                            <option value="SWZ">Swaziland</option>
                            <option value="SWE">Sweden</option>
                            <option value="CHE">Switzerland</option>
                            <option value="SYR">Syrian Arab Republic</option>
                            <option value="TWN">Taiwan</option>
                            <option value="TJK">Tajikistan</option>
                            <option value="TZA">Tanzania, United Republic of</option>
                            <option value="THA">Thailand</option>
                            <option value="TLS">Timor-Leste</option>
                            <option value="TGO">Togo</option>
                            <option value="TKL">Tokelau</option>
                            <option value="TON">Tonga</option>
                            <option value="TTO">Trinidad and Tobago</option>
                            <option value="TUN">Tunisia</option>
                            <option value="TUR">Turkey</option>
                            <option value="TKM">Turkmenistan</option>
                            <option value="TCA">Turks and Caicos Islands</option>
                            <option value="TUV">Tuvalu</option>
                            <option value="UGA">Uganda</option>
                            <option value="UKR">Ukraine</option>
                            <option value="ARE">United Arab Emirates</option>
                            <option value="GBR">United Kingdom</option>
                            <option value="USA">United States of America</option>
                            <option value="URY">Uruguay</option>
                            <option value="UZB">Uzbekistan</option>
                            <option value="VUT">Vanuatu</option>
                            <option value="VEN">Venezuela (Bolivarian Republic of)</option>
                            <option value="VNM">Viet Nam</option>
                            <option value="VGB">Virgin Islands (British)</option>
                            <option value="WLF">Wallis and Futuna</option>
                            <option value="ESH">Western Sahara</option>
                            <option value="YEM">Yemen</option>
                            <option value="ZMB">Zambia</option>
                            <option value="ZWE">Zimbabwe</option>
                        </optgroup>
                    </select>
                    <div class="val-error" id="victimCountryError"></div>
                </fieldset>
                <fieldset id="victimState" class="noborder fieldset-contingent">
                    <label class="usa-label inline" for="Victim_State"><abbr title="required" class="usa-hint--required">*</abbr>State: </label>
                    <select required class="usa-select inline" aria-errormessage="victimStateError" data-val="true" data-val-required-when="The Complainant State field is required if the Complainant is in the United States of America." data-val-required-when-allowempty="false" data-val-required-when-input="Victim.Country" data-val-required-when-op="eq" data-val-required-when-target="USA" id="Victim_State" name="Victim.State">
                        <option value="">Please select one...</option>
                        <optgroup label="">
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AS">American Samoa</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="GU">Guam</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VI">Virgin Islands, U.S.</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                    </select>
                    <div class="val-error" id="victimCountryError"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Victim_ZipCode"><abbr class="usa-hint--required" title="Required">*</abbr>Zip Code/Route: </label><input required aria-errormessage="Victim_ZipCode_error" class="usa-input inline" data-val="true" data-val-length="The Complainant Zip Code must be no longer than 20 characters." data-val-length-max="20" data-val-required="Please provide a ZIP Code or Route for the Complainant." id="Victim_ZipCode" maxlength="20" name="Victim.ZipCode" type="text" value="" />
                    <div class="val-error" id="Victim_ZipCode_error"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Victim_Phone"><abbr class="usa-hint--required" title="Required">*</abbr>Phone Number: </label><input required type="tel" pattern="\d&#x2B;" class="usa-tooltip usa-input inline" data-position="right" data-classes="display-inline" title="Numbers only (1112223333)" data-field-type="Phone" aria-errormessage="Victim_Phone_error" data-val="true" data-val-length="The Complainant Phone Number must be no longer than 50 digits." data-val-length-max="50" data-val-regex="The Complainant Phone Number must be digits only. (ex. 1112223333)" data-val-regex-pattern="\d&#x2B;" data-val-required="Please provide a Phone Number for the Complainant." id="Victim_Phone" maxlength="50" name="Victim.Phone" value="" />
                    <div class="val-error" id="Victim_Phone_error"></div>
                </fieldset>
                <fieldset class="noborder"><label class="usa-label inline" for="Victim_Email"><abbr class="usa-hint--required" title="Required">*</abbr>Email Address: </label><input required type="email" class="usa-tooltip usa-input inline" data-position="right" data-classes="display-inline" title="Example: jdoe@email.com" data-field-type="Email" aria-errormessage="Victim_Email_error" data-val="true" data-val-emailaddress="Please provide a valid Email Address for the Complainant." data-val-length="The Complainant Email Address must be no longer than 50 characters." data-val-length-max="50" data-val-required="Please provide an Email Address for the Complainant." id="Victim_Email" maxlength="50" name="Victim.Email" value="" />
                    <div class="val-error" id="Victim_Email_error"></div>
                </fieldset>
            </fieldset>
            <fieldset class="usa-fieldset margin-y-3">
                <legend class="text-semibold border-bottom font-sans-lg width-full usa-legend usa-label">Business Information</legend>
                <fieldset class="usa-fieldset" data-target="businessInfo">
                    <legend class="usa-legend usa-label">Is this on behalf of a business that was targeted by a Cyber incident?</legend>
                    <div class="usa-radio">
                        <input aria-errormessage="Victim_IsBusiness_error" class="usa-radio__input" id="Victim_IsBusiness_yes" type="radio" value="true" name="Victim.IsBusiness">
                        <label class="usa-radio__label" for="Victim_IsBusiness_yes">Yes</label>
                        <input aria-errormessage="Victim_IsBusiness_error" class="usa-radio__input" id="Victim_IsBusiness_no" type="radio" value="false" name="Victim.IsBusiness">
                        <label class="usa-radio__label" for="Victim_IsBusiness_no">No</label>
                    </div>
                    <div class="val-error" id="Victim_IsBusiness_error"></div>
                </fieldset>
                <fieldset id="businessInfo" class="noborder fieldset-contingent">
                    <fieldset class="noborder"><label class="usa-label inline" for="Victim_BusinessName"><abbr class="usa-hint--required" title="Required">*</abbr>Business Name: </label><input required data-field-type="Business" aria-errormessage="Victim_BusinessName_error" class="usa-input inline" data-val="true" data-val-length="The Complainant Business Name must be no longer than 50 characters." data-val-length-max="50" data-val-required-if="Please provide a Complainant Business Name if you are filing on behalf of a business." data-val-required-if-allowempty="false" data-val-required-if-input="Victim.IsBusiness" id="Victim_BusinessName" maxlength="50" name="Victim.BusinessName" type="text" value="" />
                        <div class="val-error" id="Victim_BusinessName_error"></div>
                    </fieldset>
                    <fieldset class="usa-fieldset">
                        <legend class="usa-legend usa-label"><abbr class="usa-hint--required" title="Required">*</abbr>Is the incident currently impacting business operations?</legend>
                        <div class="usa-radio">
                            <input aria-errormessage="Victim_BusinessImpacted_error" class="usa-radio__input" id="Victim_BusinessImpacted_yes" required type="radio" value="true" data-val="true" data-val-required-if="Specify if business has been impacted if you are filing on behalf of a business." data-val-required-if-allowempty="false" data-val-required-if-input="Victim.IsBusiness" name="Victim.BusinessImpacted">
                            <label class="usa-radio__label" for="Victim_BusinessImpacted_yes">Yes</label>
                            <input aria-errormessage="Victim_BusinessImpacted_error" class="usa-radio__input" id="Victim_BusinessImpacted_no" required type="radio" value="false" name="Victim.BusinessImpacted">
                            <label class="usa-radio__label" for="Victim_BusinessImpacted_no">No</label>
                        </div>
                        <div class="val-error" id="Victim_BusinessImpacted_error"></div>
                    </fieldset>
                    <aside class="text-italic margin-top-2">If applicable, provide points of contact (<abbr>POC</abbr>s) for this business.</aside>
                    <fieldset class="noborder"><label class="usa-label inline" for="Victim_ItPoc">Business IT POC: </label><input class="usa-tooltip usa-input inline" data-position="right" data-classes="display-inline" title="Include Name, Email, Phone number, etc." aria-errormessage="Victim_ItPoc_error" data-val="true" data-val-length="The Complainant Business IT POC must be no longer than 150 characters." data-val-length-max="150" id="Victim_ItPoc" maxlength="150" name="Victim.ItPoc" type="text" value="" />
                        <div class="val-error" id="Victim_ItPoc_error"></div>
                    </fieldset>
                    <fieldset class="noborder"><label class="usa-label inline" for="Victim_OtherPoc">Other Business POC: </label><input class="usa-tooltip usa-input inline" data-position="right" data-classes="display-inline" title="Include Name, Email, Phone number, etc." aria-errormessage="Victim_OtherPoc_error" data-val="true" data-val-length="The Complainant Business POC must be no longer than 150 characters." data-val-length-max="150" id="Victim_OtherPoc" maxlength="150" name="Victim.OtherPoc" type="text" value="" />
                        <div class="val-error" id="Victim_OtherPoc_error"></div>
                    </fieldset>
                    <fieldset class="noborder" id="inf">
                        <label class="usa-label" for="Victim_Sector">If your business or organization is defined as a critical infrastructure entity, select the sector below:</label>
                        <select class="usa-select" aria-errormessage="sectorError" id="Victim_Sector" name="Victim.Sector">
                            <option value="">None/Unsure</option>
                            <option value="0">Chemical</option>
                            <option value="1">Commercial Facilities</option>
                            <option value="2">Communications</option>
                            <option value="3">Critical Manufacturing</option>
                            <option value="4">Dams</option>
                            <option value="5">Defense Industrial Base</option>
                            <option value="6">Emergency Services</option>
                            <option value="7">Energy</option>
                            <option value="8">Financial Services</option>
                            <option value="9">Food and Agriculture</option>
                            <option value="10">Government Facilities</option>
                            <option value="11">Healthcare and Public Health</option>
                            <option value="12">Information Technology</option>
                            <option value="13">Nuclear Reactors, Materials, &amp; Waste</option>
                            <option value="14">Transportation Systems</option>
                            <option value="15">Water &amp; Wastewater Systems</option>
                        </select>
                        <div class="val-error" id="sectorError"></div>
                    </fieldset>
                    <fieldset class="noborder fieldset-contingent" id="infSub">
                        <label class="usa-label" for="Victim_Subsector">If known or applicable, please select the critical infrastructure subsector:</label>
                        <select class="usa-select" aria-errormessage="subsectorError" id="Victim_Subsector" name="Victim.Subsector">
                            <option value="0" selected="selected">None/Unsure</option>
                            <optgroup label="Chemical">
                                <option value="1">Basic</option>
                                <option value="2">Specialty</option>
                                <option value="3">Agriculture</option>
                                <option value="4">Pharmaceuticals</option>
                                <option value="5">Consumer Products</option>
                            </optgroup>
                            <optgroup label="Commercial Facilities">
                                <option value="6">Entertainment and Media</option>
                                <option value="7">Gaming</option>
                                <option value="8">Lodging</option>
                                <option value="9">Outdoor Events</option>
                                <option value="10">Public Assembly</option>
                                <option value="11">Real Estate</option>
                                <option value="12">Retail</option>
                                <option value="13">Sports Leagues</option>
                            </optgroup>
                            <optgroup label="Communications">
                                <option value="14">Terrestrial</option>
                                <option value="15">Satellite</option>
                                <option value="16">Wireless</option>
                            </optgroup>
                            <optgroup label="Critical Manufacturing">
                                <option value="17">Primary Metals</option>
                                <option value="18">Machinery</option>
                                <option value="19">Electrical Equipment</option>
                                <option value="20">Appliance</option>
                                <option value="21">Components</option>
                                <option value="22">Transportation Equipment</option>
                            </optgroup>
                            <optgroup label="Dams">
                                <option value="0">Dams</option>
                            </optgroup>
                            <optgroup label="Defense Industrial Base">
                                <option value="0">Defense Industrial Base</option>
                            </optgroup>
                            <optgroup label="Emergency Services">
                                <option value="23">Law Enforcement</option>
                                <option value="24">Fire and Rescue</option>
                                <option value="25">Emergency Medical</option>
                                <option value="26">Emergency Management</option>
                                <option value="27">Public Works</option>
                            </optgroup>
                            <optgroup label="Energy">
                                <option value="28">Electricity</option>
                                <option value="29">Oil</option>
                                <option value="30">Natural Gas</option>
                                <option value="31">Solar</option>
                            </optgroup>
                            <optgroup label="Financial Services">
                                <option value="32">Depository Institution</option>
                                <option value="33">Investment Product</option>
                                <option value="34">Insurance Companies</option>
                                <option value="35">Credit and Financing</option>
                            </optgroup>
                            <optgroup label="Food and Agriculture">
                                <option value="36">Farming/Manufacturing</option>
                                <option value="37">Processing/Storage</option>
                                <option value="38">Restaurant</option>
                            </optgroup>
                            <optgroup label="Government Facilities">
                                <option value="39">Federal Government Facility</option>
                                <option value="40">State Government Facility</option>
                                <option value="41">Local Government Facility</option>
                                <option value="42">Education Facility</option>
                                <option value="43">National Monument/Icon</option>
                                <option value="44">Electoral System</option>
                            </optgroup>
                            <optgroup label="Healthcare and Public Health">
                                <option value="45">Hospital</option>
                                <option value="46">Other Medical Facility</option>
                            </optgroup>
                            <optgroup label="Information Technology">
                                <option value="0">Information Technology</option>
                            </optgroup>
                            <optgroup label="Nuclear Reactors, Materials, &amp; Waste">
                                <option value="47">Reactor</option>
                                <option value="48">Materials</option>
                                <option value="49">Waste</option>
                            </optgroup>
                            <optgroup label="Transportation Systems">
                                <option value="50">Aviation</option>
                                <option value="51">Highway and Motor Carrier</option>
                                <option value="52">Maritime</option>
                                <option value="53">Mass Transit and Passenger Rail</option>
                                <option value="54">Pipeline System</option>
                                <option value="55">Postal and Shipping</option>
                            </optgroup>
                            <optgroup label="Water &amp; Wastewater Systems">
                                <option value="0">Water &amp; Wastewater Systems</option>
                            </optgroup>
                        </select>
                        <div class="val-error" id="subsectorError"></div>
                    </fieldset>
                </fieldset>
            </fieldset>
        </article>
        <article id="step3" class="form-step" data-step-num="3">
            <fieldset class="usa-fieldset">
                <legend class="text-semibold border-bottom font-sans-lg width-full usa-legend usa-label">Financial Transaction(s)</legend>
                <fieldset class="usa-fieldset" data-target="reportedLoss">
                    <legend class="usa-legend usa-label"><abbr class="usa-hint--required" title="Required">*</abbr>Did you send or lose money in the incident?</legend>
                    <div class="usa-radio">
                        <input aria-errormessage="MoneySent_error" class="usa-radio__input" id="MoneySent_yes" required type="radio" value="true" data-val="true" data-val-required="Please indicate if money was lost in this incident." name="MoneySent">
                        <label class="usa-radio__label" for="MoneySent_yes">Yes</label>
                        <input aria-errormessage="MoneySent_error" class="usa-radio__input" id="MoneySent_no" required type="radio" value="false" name="MoneySent">
                        <label class="usa-radio__label" for="MoneySent_no">No</label>
                    </div>
                    <div class="val-error" id="MoneySent_error"></div>
                </fieldset>
                <fieldset id="reportedLoss" class="fieldset-contingent noborder">
                    <label class="usa-label" for="ReportedLoss"><abbr class="usa-hint--required" title="Required">*</abbr>What was your total loss amount?</label>
                    <input required type="number" min="0" max="9999999999.99" step="0.01" aria-errormessage="ReportedLossError" class="usa-input" data-val="true" data-val-number="The field ReportedLoss must be a number." data-val-range="Please enter a positive loss amount less than $9,999,999,999.99." data-val-range-max="9999999999.99" data-val-range-min="0" data-val-required-if="Please specify the total amount of money lost." data-val-required-if-allowempty="false" data-val-required-if-input="MoneySent" id="ReportedLoss" name="ReportedLoss" value=""><input name="__Invariant" type="hidden" value="ReportedLoss" />
                    <div class="val-error" id="ReportedLossError"></div>
                </fieldset>
            </fieldset>
            <div class="usa-alert usa-alert--warning usa-alert--no-icon">
                <div class="usa-alert__body">
                    <p class="usa-alert__heading text-bold" role="heading" aria-level="7">For the transaction information below:</p>
                    <ul class="usa-alert__text margin-y-0">
                        <li>Provide the most recent transactions involved with this incident.</li>
                        <li>Specify all money amounts below in US Dollars (<abbr>USD</abbr>).</li>
                        <li>Originating account refers to where the funds were sent from; usually the Complainant's account.</li>
                        <li>Recipient account refers to where the funds were sent to; usually a Subject's account.</li>
                        <li>More information about the types of transactions can be found by clicking the help icon <span aria-hidden="true">(<svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                                    <use href="/img/sprite.svg#help"></use>
                                </svg>)</span> next to the Transaction Type field.</li>
                    </ul>
                </div>
            </div>
            <div class="usa-modal usa-modal--lg" id="tTypeDef" aria-labelledby="tTypeDefHeading" aria-describedby="tTypeDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="tTypeDefHeading">
                            <span class="font-family-sans">Transaction Type Definitions</span>
                        </h2>
                        <div class="usa-prose">

                            <dl id="tTypeDefDescription">
                                <dt>Cash</dt>
                                <dd>Money in the form of coins or bills.</dd>
                                <dt>Check/Cashier's Check</dt>
                                <dd>A document that orders a bank, building society to pay a specific amount of money from a person's account to the person in whose name the check has been issued.</dd>
                                <dt>Cryptocurrency/Crypto ATM</dt>
                                <dd>Cryptocurrencies are digital tokens. Cryptocurrency payments may be made through an exchange or directly to the recipient. A Crypto ATM or kiosk that allows a person to purchase Bitcoin and other cryptocurrencies by using cash or debit card.</dd>
                                <dt>Debit Card/Credit Card</dt>
                                <dd>Payment cards that can be used in place of cash to make purchases. A debit card is usually linked to a bank account. A credit card is linked to a line of credit.</dd>
                                <dt>Money Order</dt>
                                <dd>A printed order for payment of a specified sum from prepaid funds, issued by a bank or Post Office.</dd>
                                <dt>Peer-to-Peer Transfer</dt>
                                <dd>A Peer-to-Peer (or <abbr>P2P</abbr>) transaction is an electronic payment method via a third-party application or website that allows users to send money directly between two parties with separate bank accounts.</dd>
                                <dt>Prepaid/Gift Card</dt>
                                <dd>A prepaid/gift card is not linked to a bank or credit union account. Instead, money is deposited or "loaded" onto the card with a certain amount before the card can be used.</dd>
                                <dt>Wire Transfer</dt>
                                <dd>Types of electronic fund transfers to send money directly from one account to another. A wire transfer is a transaction initiated through a bank moving funds from one account to another at an external bank, can be domestic or international. This includes <dfn><abbr title="Automated Clearing House">ACH</abbr> transactions</dfn>, which involve the transfer of funds between banks, credit unions, or other financial institutions through an electronic network.</dd>
                            </dl>
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#tTypeDef" aria-controls="tTypeDef" id="tTypeDefOpen" data-open-modal></a>
            <div class="usa-modal usa-modal--lg" id="tRoutingNumDef" aria-labelledby="tRoutingNumDefHeading" aria-describedby="tRoutingNumDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="tRoutingNumDefHeading">
                            <span class="font-family-sans">Routing Number Definition</span>
                        </h2>
                        <div class="usa-prose">
                            A <dfn>routing number</dfn> (also known as an "RTN" or "ABA Routing Number") is a code used by financial institutions to identify one another, usually for electronic fund or wire transfers. It may have been provided as payment instructions by the individuals or organizations you are reporting
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#tRoutingNumDef" aria-controls="tRoutingNumDef" id="tRoutingNumDefOpen" data-open-modal></a>
            <div class="usa-modal usa-modal--lg" id="tSwiftDef" aria-labelledby="tSwiftDefHeading" aria-describedby="tSwiftDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="tSwiftDefHeading">
                            <span class="font-family-sans">SWIFT Code Definition</span>
                        </h2>
                        <div class="usa-prose">
                            A <dfn>SWIFT Code</dfn> is an eight- or eleven-character code made up of letters and numbers that are used in international transfers of money. It may have been provided as payment instructions by the individuals or organizations you are reporting, particularly if the money is being sent to another country. For example: AAAABBC1 or AAAABBC1234
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#tSwiftDef" aria-controls="tSwiftDef" id="tSwiftDefOpen" data-open-modal></a>
            <div class="usa-modal usa-modal--lg" id="p2pAccountIdDef" aria-labelledby="p2pAccountIdDefHeading" aria-describedby="p2pAccountIdDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="p2pAccountIdDefHeading">
                            <span class="font-family-sans">Peer-to-peer Account Identifiers</span>
                        </h2>
                        <div class="usa-prose">
                            Please use an email address or a phone number for an Account Identifier in a Peer-to-Peer transaction if possible.
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#p2pAccountIdDef" aria-controls="p2pAccountIdDef" id="p2pAccountIdDefOpen" data-open-modal></a>
            <div class="usa-modal usa-modal--lg" id="cryptoCurrencyTypeDef" aria-labelledby="cryptoCurrencyTypeDefHeading" aria-describedby="cryptoCurrencyTypeDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="cryptoCurrencyTypeDefHeading">
                            <span class="font-family-sans">Type of CryptoCurrency</span>
                        </h2>
                        <div class="usa-prose">
                            Type of cryptocurrency you sent as part of this transaction. (For example: Bitcoin, Ethereum, Tether, Litecoin, etc.)
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#cryptoCurrencyTypeDef" aria-controls="cryptoCurrencyTypeDef" id="cryptoCurrencyTypeDefOpen" data-open-modal></a>
            <div class="usa-modal usa-modal--lg" id="txnHashDef" aria-labelledby="txnHashDefHeading" aria-describedby="txnHashDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="txnHashDefHeading">
                            <span class="font-family-sans">Transaction ID/Hash</span>
                        </h2>
                        <div class="usa-prose">
                            Example: <span class="font-family-mono">0xfa485de419011ceefdd3cd00a4ff64e52bf9a0dfa528e4fff8bb4c9c</span>. The ID/Hash is typically much longer than a crypto address or P2P account identifier.
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#txnHashDef" aria-controls="txnHashDef" id="txnHashDefOpen" data-open-modal></a>
            <div class="usa-modal usa-modal--lg" id="cryptoCurrencyAtmDef" aria-labelledby="cryptoCurrencyAtmDefHeading" aria-describedby="cryptoCurrencyAtmDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="cryptoCurrencyAtmDefHeading">
                            <span class="font-family-sans">Cryptocurrency ATM/Kiosk</span>
                        </h2>
                        <div class="usa-prose">
                            If you used a cryptocurrency ATM/Kiosk, include the type/name, such as Bitcoin Depot, CoinFlip, Margo, etc.
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#cryptoCurrencyAtmDef" aria-controls="cryptoCurrencyAtmDef" id="cryptoCurrencyAtmDefOpen" data-open-modal></a>
            <div class="usa-modal usa-modal--lg" id="cryptoCurrencyAtmAddressDef" aria-labelledby="cryptoCurrencyAtmAddressDefHeading" aria-describedby="cryptoCurrencyAtmAddressDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="cryptoCurrencyAtmAddressDefHeading">
                            <span class="font-family-sans">ATM/Kiosk Address</span>
                        </h2>
                        <div class="usa-prose">
                            Include the physical address of the ATM/Kiosk
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#cryptoCurrencyAtmAddressDef" aria-controls="cryptoCurrencyAtmAddressDef" id="cryptoCurrencyAtmAddressDefOpen" data-open-modal></a>
            <div class="usa-modal usa-modal--lg" id="cryptoCurrencyOrigAddressDef" aria-labelledby="cryptoCurrencyOrigAddressDefHeading" aria-describedby="cryptoCurrencyOrigAddressDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="cryptoCurrencyOrigAddressDefHeading">
                            <span class="font-family-sans">Originating Wallet Address</span>
                        </h2>
                        <div class="usa-prose">
                            Your wallet address. Example: <span class="font-family-mono">0x58566904f57eac4E9EDd81BbC2f877865ECd35985</span>. An address is approximately 26-63 characters. If you do not have the whole address, include what you do have.
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#cryptoCurrencyOrigAddressDef" aria-controls="cryptoCurrencyOrigAddressDef" id="cryptoCurrencyOrigAddressDefOpen" data-open-modal></a>
            <div class="usa-modal usa-modal--lg" id="cryptoCurrencyRecipAddressDef" aria-labelledby="cryptoCurrencyRecipAddressDefHeading" aria-describedby="cryptoCurrencyRecipAddressDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="cryptoCurrencyRecipAddressDefHeading">
                            <span class="font-family-sans">Recipient Wallet Address</span>
                        </h2>
                        <div class="usa-prose">
                            The wallet address where you sent funds. Example: <span class="font-family-mono">0x58566904f57eac4E9EDd81BbC2f877865ECd35985</span>. An address is approximately 26-63 characters. If you do not have the whole address, include what you do have.
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#cryptoCurrencyRecipAddressDef" aria-controls="cryptoCurrencyRecipAddressDef" id="cryptoCurrencyRecipAddressDefOpen" data-open-modal></a>
            <div class="usa-modal usa-modal--lg" id="giftCardTypeDef" aria-labelledby="giftCardTypeDefHeading" aria-describedby="giftCardTypeDefDescription">
                <div class="usa-modal__content">
                    <div class="usa-modal__main">
                        <h2 class="usa-modal__heading" id="giftCardTypeDefHeading">
                            <span class="font-family-sans">Type of Prepaid/Gift Card</span>
                        </h2>
                        <div class="usa-prose">
                            The type of prepaid or gift card purchased as part of this transaction. (For example: Visa, MasterCard, Macys, Home Depot, Steam, etc.)
                        </div>
                        <div class="usa-modal__footer">
                            <button type="button" class="usa-button" data-close-modal>
                                Close
                            </button>
                        </div>
                    </div>
                    <button type="button" class="usa-button usa-modal__close" aria-label="Close this window" data-close-modal>
                        <svg class="usa-icon" aria-hidden="true" focusable="false" role="img">
                            <use href="img/sprite.svg#close" />
                        </svg>
                    </button>
                </div>
            </div>
            <a class="display-none" href="#giftCardTypeDef" aria-controls="giftCardTypeDef" id="giftCardTypeDefOpen" data-open-modal></a>
            <div class="transactions usa-accordion usa-accordion--bordered usa-accordion--multiselectable margin-y-3" data-allow-multiple>
                <div data-index="1">
                    <div class="usa-accordion__heading">
                        <button type="button" class="usa-accordion__button" aria-controls="transaction0">
                            <div>Transaction #1</div>
                        </button>
                    </div>
                    <div class="usa-accordion__content" id="transaction0">
                        <button class="float-right usa-button" type="submit" name="Transaction" formaction="RemoveTransaction#step3" data-ordinal="-9999" value="0">Remove Transaction</button>
                        <fieldset class="noborder">
                            <label class="usa-label inline" for="Transactions_0__TransactionType">Transaction Type: </label>
                            <select class="usa-select inline transaction-type" data-ordinal="0.01" aria-errormessage="Transactions_0__TransactionType_error" id="Transactions_0__TransactionType" name="Transactions[0].TransactionType">
                                <option value="">Please select one...</option>
                                <optgroup label="">
                                    <option value="0">Cash</option>
                                    <option value="1">Check/Cashier&#x27;s Check</option>
                                    <option value="6">Cryptocurrency/Crypto ATM</option>
                                    <option value="2">Debit Card/Credit Card</option>
                                    <option value="3">Money Order</option>
                                    <option value="8">Other</option>
                                    <option value="7">Peer-to-peer Transfer</option>
                                    <option value="5">Prepaid Card/Gift Card</option>
                                    <option value="4">Wire Transfer</option>
                                </optgroup>
                            </select>
                            <div class="val-error" id="Transactions_0__TransactionType_error"></div>
                        </fieldset>
                        <fieldset class="noborder t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__OtherType"><abbr class="usa-hint--required" title="Required">*</abbr>If other, please specify: </label><input data-ordinal="0.02" required aria-errormessage="Transactions_0__OtherType_error" class="usa-input inline" data-val="true" data-val-length="The Other Transaction Type for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" data-val-required-when="The Other Type field for transaction #TNUM must have a value if the Transaction Type is &#x27;Other&#x27;." data-val-required-when-allowempty="false" data-val-required-when-input="Transactions[0].TransactionType" data-val-required-when-op="eq" data-val-required-when-target="8" id="Transactions_0__OtherType" maxlength="50" name="Transactions[0].OtherType" type="text" value="" />
                            <div class="val-error" id="Transactions_0__OtherType_error"></div>
                        </fieldset>
                        <fieldset class="usa-fieldset tall fieldset-contingent" data-ordinal="0.03">
                            <legend class="usa-legend usa-label"><abbr class="usa-hint--required" title="Required">*</abbr>Was the money sent or lost?</legend>
                            <div class="usa-radio">
                                <input aria-errormessage="Transactions_0__WasSent_error" class="usa-radio__input" id="Transactions_0__WasSent_yes" required type="radio" value="true" data-val="true" data-val-required-when="Please specify if the money was sent for transaction #TNUM." data-val-required-when-allowempty="false" data-val-required-when-input="Transactions[0].TransactionType" data-val-required-when-op="ne" data-val-required-when-target="" name="Transactions[0].WasSent">
                                <label class="usa-radio__label" for="Transactions_0__WasSent_yes">Yes</label>
                                <input aria-errormessage="Transactions_0__WasSent_error" class="usa-radio__input" id="Transactions_0__WasSent_no" required type="radio" value="false" name="Transactions[0].WasSent">
                                <label class="usa-radio__label" for="Transactions_0__WasSent_no">No</label>
                            </div>
                            <div class="val-error" id="Transactions_0__WasSent_error"></div>
                        </fieldset>
                        <fieldset class="noborder tall fieldset-contingent"><label class="usa-label inline" for="Transactions_0__Amount"><abbr class="usa-hint--required" title="Required">*</abbr>Transaction Amount: </label><input type="number" min="0" max="999999999.99" step="0.01" class="amount usa-input inline" required data-ordinal="0.04" aria-errormessage="Transactions_0__Amount_error" data-val="true" data-val-range="The Amount for transaction #TNUM must be a positive value less than $999,999,999.99." data-val-range-max="999999999.99" data-val-range-min="0" data-val-required-when="The Amount for transaction #TNUM must have a value when there is a transaction." data-val-required-when-allowempty="false" data-val-required-when-input="Transactions[0].TransactionType" data-val-required-when-op="ne" data-val-required-when-target="" id="Transactions_0__Amount" name="Transactions[0].Amount" value="" />
                            <div class="val-error" id="Transactions_0__Amount_error"></div>
                        </fieldset>
                        <fieldset class="noborder tall fieldset-contingent date"><label class="usa-label inline" for="Transactions_0__Date"><abbr class="usa-hint--required" title="Required">*</abbr>Transaction Date:</label><input class="transaction-date usa-input inline" required data-ordinal="0.05" type="date" data-val="true" data-val-range="The Transaction Date for transaction #TNUM must not be in the future." data-val-required-when="The Transaction Date for transaction #TNUM must have a value when there is a transaction." data-val-required-when-allowempty="false" data-val-required-when-input="Transactions[0].TransactionType" data-val-required-when-op="ne" data-val-required-when-target="" id="Transactions_0__Date" max="2025-10-17" name="Transactions[0].Date" value="" aria-errormessage="Transactions_0__Date_error" />
                            <div class="val-error" id="Transactions_0__Date_error"></div>
                        </fieldset>
                        <fieldset class="usa-fieldset tall fieldset-contingent" data-ordinal="0.06">
                            <legend class="usa-legend usa-label">Did you contact your bank, financial institution, or cryptocurrency exchange?</legend>
                            <div class="usa-radio">
                                <input aria-errormessage="Transactions_0__InstitutionNotified_error" class="usa-radio__input" id="Transactions_0__InstitutionNotified_yes" type="radio" value="true" name="Transactions[0].InstitutionNotified">
                                <label class="usa-radio__label" for="Transactions_0__InstitutionNotified_yes">Yes</label>
                                <input aria-errormessage="Transactions_0__InstitutionNotified_error" class="usa-radio__input" id="Transactions_0__InstitutionNotified_no" type="radio" value="false" name="Transactions[0].InstitutionNotified">
                                <label class="usa-radio__label" for="Transactions_0__InstitutionNotified_no">No</label>
                            </div>
                            <div class="val-error" id="Transactions_0__InstitutionNotified_error"></div>
                        </fieldset>
                        <hr class="opacity-0" data-ordinal="1">
                        <fieldset class="noborder t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__VictimBankName">Originating Bank Name: </label><input data-ordinal="110" aria-errormessage="Transactions_0__VictimBankName_error" class="usa-input inline" data-val="true" data-val-length="The Originating Bank Name for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__VictimBankName" maxlength="50" name="Transactions[0].VictimBankName" type="text" value="" />
                            <div class="val-error" id="Transactions_0__VictimBankName_error"></div>
                        </fieldset>
                        <fieldset class="noborder t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__VictimBankAddress1">Originating Bank Address: </label><input data-ordinal="120" aria-errormessage="Transactions_0__VictimBankAddress1_error" class="usa-input inline" data-val="true" data-val-length="The Originating Bank Address for transaction #TNUM must be no longer than 75 characters." data-val-length-max="75" id="Transactions_0__VictimBankAddress1" maxlength="75" name="Transactions[0].VictimBankAddress1" type="text" value="" />
                            <div class="val-error" id="Transactions_0__VictimBankAddress1_error"></div>
                        </fieldset>
                        <fieldset class="noborder label-sm t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__VictimBankAddress2">Originating Bank Address (cont.): </label><input data-ordinal="130" aria-errormessage="Transactions_0__VictimBankAddress2_error" class="usa-input inline" data-val="true" data-val-length="The Originating Bank Address (cont.) for transaction #TNUM must be no longer than 75 characters." data-val-length-max="75" id="Transactions_0__VictimBankAddress2" maxlength="75" name="Transactions[0].VictimBankAddress2" type="text" value="" />
                            <div class="val-error" id="Transactions_0__VictimBankAddress2_error"></div>
                        </fieldset>
                        <fieldset class="noborder label-sm t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__VictimBankMailStop">Originating Bank Suite/Mail Stop: </label><input data-ordinal="140" aria-errormessage="Transactions_0__VictimBankMailStop_error" class="usa-input inline" data-val="true" data-val-length="The Originating Bank Suite/Mail Stop for transaction #TNUM must be no longer than 75 characters." data-val-length-max="75" id="Transactions_0__VictimBankMailStop" maxlength="75" name="Transactions[0].VictimBankMailStop" type="text" value="" />
                            <div class="val-error" id="Transactions_0__VictimBankMailStop_error"></div>
                        </fieldset>
                        <fieldset class="noborder t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__VictimBankCity">Originating Bank City: </label><input data-ordinal="150" aria-errormessage="Transactions_0__VictimBankCity_error" class="usa-input inline" data-val="true" data-val-length="The Originating Bank City for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__VictimBankCity" maxlength="50" name="Transactions[0].VictimBankCity" type="text" value="" />
                            <div class="val-error" id="Transactions_0__VictimBankCity_error"></div>
                        </fieldset>
                        <fieldset class="noborder t1 t2 t3 t4 t8 fieldset-contingent" data-ordinal="160" data-target="Transactions_0__VictimBankStateFields" data-target-value="USA">
                            <label class="usa-label inline" for="Transactions_0__VictimBankCountry">Originating Bank Country: </label>
                            <select class="usa-select inline" aria-errormessage="Transactions_0__VictimBankCountryError" id="Transactions_0__VictimBankCountry" name="Transactions[0].VictimBankCountry">
                                <option value="">[None]</option>
                                <optgroup label="">
                                    <option value="USA">United States of America</option>
                                    <option value="AFG">Afghanistan</option>
                                    <option value="ALA">&#xC5;land Islands</option>
                                    <option value="ALB">Albania</option>
                                    <option value="DZA">Algeria</option>
                                    <option value="AND">Andorra</option>
                                    <option value="AGO">Angola</option>
                                    <option value="AIA">Anguilla</option>
                                    <option value="ATA">Antarctica</option>
                                    <option value="ATG">Antigua and Barbuda</option>
                                    <option value="ARG">Argentina</option>
                                    <option value="ARM">Armenia</option>
                                    <option value="ABW">Aruba</option>
                                    <option value="AUS">Australia</option>
                                    <option value="AUT">Austria</option>
                                    <option value="AZE">Azerbaijan</option>
                                    <option value="BHS">Bahamas</option>
                                    <option value="BHR">Bahrain</option>
                                    <option value="BGD">Bangladesh</option>
                                    <option value="BRB">Barbados</option>
                                    <option value="BLR">Belarus</option>
                                    <option value="BEL">Belgium</option>
                                    <option value="BLZ">Belize</option>
                                    <option value="BEN">Benin</option>
                                    <option value="BMU">Bermuda</option>
                                    <option value="BTN">Bhutan</option>
                                    <option value="BOL">Bolivia (Plurinational State of)</option>
                                    <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                                    <option value="BIH">Bosnia and Herzegovina</option>
                                    <option value="BWA">Botswana</option>
                                    <option value="BVT">Bouvet Island</option>
                                    <option value="BRA">Brazil</option>
                                    <option value="IOT">British Indian Ocean Territory</option>
                                    <option value="BRN">Brunei Darussalam</option>
                                    <option value="BGR">Bulgaria</option>
                                    <option value="BFA">Burkina Faso</option>
                                    <option value="BDI">Burundi</option>
                                    <option value="CPV">Cabo Verde</option>
                                    <option value="KHM">Cambodia</option>
                                    <option value="CMR">Cameroon</option>
                                    <option value="CAN">Canada</option>
                                    <option value="CYM">Cayman Islands</option>
                                    <option value="CAF">Central African Republic</option>
                                    <option value="TCD">Chad</option>
                                    <option value="CHL">Chile</option>
                                    <option value="CHN">China</option>
                                    <option value="CXR">Christmas Island</option>
                                    <option value="CCK">Cocos (Keeling) Islands</option>
                                    <option value="COL">Colombia</option>
                                    <option value="COM">Comoros</option>
                                    <option value="COG">Congo</option>
                                    <option value="COD">Congo (Democratic Republic of the)</option>
                                    <option value="COK">Cook Islands</option>
                                    <option value="CRI">Costa Rica</option>
                                    <option value="CIV">C&#xF4;te d&#x27;Ivoire</option>
                                    <option value="HRV">Croatia</option>
                                    <option value="CUB">Cuba</option>
                                    <option value="CUW">Cura&#xE7;ao</option>
                                    <option value="CYP">Cyprus</option>
                                    <option value="CZE">Czech Republic</option>
                                    <option value="DNK">Denmark</option>
                                    <option value="DJI">Djibouti</option>
                                    <option value="DMA">Dominica</option>
                                    <option value="DOM">Dominican Republic</option>
                                    <option value="ECU">Ecuador</option>
                                    <option value="EGY">Egypt</option>
                                    <option value="SLV">El Salvador</option>
                                    <option value="GNQ">Equatorial Guinea</option>
                                    <option value="ERI">Eritrea</option>
                                    <option value="EST">Estonia</option>
                                    <option value="ETH">Ethiopia</option>
                                    <option value="FLK">Falkland Islands (Malvinas)</option>
                                    <option value="FRO">Faroe Islands</option>
                                    <option value="FJI">Fiji</option>
                                    <option value="FIN">Finland</option>
                                    <option value="FRA">France</option>
                                    <option value="GUF">French Guiana</option>
                                    <option value="PYF">French Polynesia</option>
                                    <option value="ATF">French Southern Territories</option>
                                    <option value="GAB">Gabon</option>
                                    <option value="GMB">Gambia</option>
                                    <option value="GEO">Georgia</option>
                                    <option value="DEU">Germany</option>
                                    <option value="GHA">Ghana</option>
                                    <option value="GIB">Gibraltar</option>
                                    <option value="GRC">Greece</option>
                                    <option value="GRL">Greenland</option>
                                    <option value="GRD">Grenada</option>
                                    <option value="GLP">Guadeloupe</option>
                                    <option value="GTM">Guatemala</option>
                                    <option value="GGY">Guernsey</option>
                                    <option value="GIN">Guinea</option>
                                    <option value="GNB">Guinea-Bissau</option>
                                    <option value="GUY">Guyana</option>
                                    <option value="HTI">Haiti</option>
                                    <option value="HMD">Heard Island and McDonald Islands</option>
                                    <option value="VAT">Holy See</option>
                                    <option value="HND">Honduras</option>
                                    <option value="HKG">Hong Kong</option>
                                    <option value="HUN">Hungary</option>
                                    <option value="ISL">Iceland</option>
                                    <option value="IND">India</option>
                                    <option value="IDN">Indonesia</option>
                                    <option value="IRN">Iran (Islamic Republic of)</option>
                                    <option value="IRQ">Iraq</option>
                                    <option value="IRL">Ireland</option>
                                    <option value="IMN">Isle of Man</option>
                                    <option value="ISR">Israel</option>
                                    <option value="ITA">Italy</option>
                                    <option value="JAM">Jamaica</option>
                                    <option value="JPN">Japan</option>
                                    <option value="JEY">Jersey</option>
                                    <option value="JOR">Jordan</option>
                                    <option value="KAZ">Kazakhstan</option>
                                    <option value="KEN">Kenya</option>
                                    <option value="KIR">Kiribati</option>
                                    <option value="PRK">Korea (Democratic People&#x27;s Republic of)</option>
                                    <option value="KOR">Korea (Republic of)</option>
                                    <option value="KWT">Kuwait</option>
                                    <option value="KGZ">Kyrgyzstan</option>
                                    <option value="LAO">Lao People&#x27;s Democratic Republic</option>
                                    <option value="LVA">Latvia</option>
                                    <option value="LBN">Lebanon</option>
                                    <option value="LSO">Lesotho</option>
                                    <option value="LBR">Liberia</option>
                                    <option value="LBY">Libya</option>
                                    <option value="LIE">Liechtenstein</option>
                                    <option value="LTU">Lithuania</option>
                                    <option value="LUX">Luxembourg</option>
                                    <option value="MAC">Macao</option>
                                    <option value="MDG">Madagascar</option>
                                    <option value="MWI">Malawi</option>
                                    <option value="MYS">Malaysia</option>
                                    <option value="MDV">Maldives</option>
                                    <option value="MLI">Mali</option>
                                    <option value="MLT">Malta</option>
                                    <option value="MHL">Marshall Islands</option>
                                    <option value="MTQ">Martinique</option>
                                    <option value="MRT">Mauritania</option>
                                    <option value="MUS">Mauritius</option>
                                    <option value="MYT">Mayotte</option>
                                    <option value="MEX">Mexico</option>
                                    <option value="FSM">Micronesia (Federated States of)</option>
                                    <option value="MDA">Moldova (Republic of)</option>
                                    <option value="MCO">Monaco</option>
                                    <option value="MNG">Mongolia</option>
                                    <option value="MNE">Montenegro</option>
                                    <option value="MSR">Montserrat</option>
                                    <option value="MAR">Morocco</option>
                                    <option value="MOZ">Mozambique</option>
                                    <option value="MMR">Myanmar</option>
                                    <option value="NAM">Namibia</option>
                                    <option value="NRU">Nauru</option>
                                    <option value="NPL">Nepal</option>
                                    <option value="NLD">Netherlands</option>
                                    <option value="NCL">New Caledonia</option>
                                    <option value="NZL">New Zealand</option>
                                    <option value="NIC">Nicaragua</option>
                                    <option value="NER">Niger</option>
                                    <option value="NGA">Nigeria</option>
                                    <option value="NIU">Niue</option>
                                    <option value="NFK">Norfolk Island</option>
                                    <option value="MKD">North Macedonia</option>
                                    <option value="NOR">Norway</option>
                                    <option value="OMN">Oman</option>
                                    <option value="PAK">Pakistan</option>
                                    <option value="PLW">Palau</option>
                                    <option value="PSE">Palestinian Territory, Occupied</option>
                                    <option value="PAN">Panama</option>
                                    <option value="PNG">Papua New Guinea</option>
                                    <option value="PRY">Paraguay</option>
                                    <option value="PER">Peru</option>
                                    <option value="PHL">Philippines</option>
                                    <option value="PCN">Pitcairn</option>
                                    <option value="POL">Poland</option>
                                    <option value="PRT">Portugal</option>
                                    <option value="QAT">Qatar</option>
                                    <option value="REU">R&#xE9;union</option>
                                    <option value="ROU">Romania</option>
                                    <option value="RUS">Russian Federation</option>
                                    <option value="RWA">Rwanda</option>
                                    <option value="BLM">Saint Barth&#xE9;lemy</option>
                                    <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                                    <option value="KNA">Saint Kitts and Nevis</option>
                                    <option value="LCA">Saint Lucia</option>
                                    <option value="MAF">Saint Martin (French part)</option>
                                    <option value="SPM">Saint Pierre and Miquelon</option>
                                    <option value="VCT">Saint Vincent and the Grenadines</option>
                                    <option value="WSM">Samoa</option>
                                    <option value="SMR">San Marino</option>
                                    <option value="STP">Sao Tome and Principe</option>
                                    <option value="SAU">Saudi Arabia</option>
                                    <option value="SEN">Senegal</option>
                                    <option value="SRB">Serbia</option>
                                    <option value="SYC">Seychelles</option>
                                    <option value="SLE">Sierra Leone</option>
                                    <option value="SGP">Singapore</option>
                                    <option value="SXM">Sint Maarten (Dutch part)</option>
                                    <option value="SVK">Slovakia</option>
                                    <option value="SVN">Slovenia</option>
                                    <option value="SLB">Solomon Islands</option>
                                    <option value="SOM">Somalia</option>
                                    <option value="ZAF">South Africa</option>
                                    <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                    <option value="SSD">South Sudan</option>
                                    <option value="ESP">Spain</option>
                                    <option value="LKA">Sri Lanka</option>
                                    <option value="SDN">Sudan</option>
                                    <option value="SUR">Suriname</option>
                                    <option value="SJM">Svalbard and Jan Mayen</option>
                                    <option value="SWZ">Swaziland</option>
                                    <option value="SWE">Sweden</option>
                                    <option value="CHE">Switzerland</option>
                                    <option value="SYR">Syrian Arab Republic</option>
                                    <option value="TWN">Taiwan</option>
                                    <option value="TJK">Tajikistan</option>
                                    <option value="TZA">Tanzania, United Republic of</option>
                                    <option value="THA">Thailand</option>
                                    <option value="TLS">Timor-Leste</option>
                                    <option value="TGO">Togo</option>
                                    <option value="TKL">Tokelau</option>
                                    <option value="TON">Tonga</option>
                                    <option value="TTO">Trinidad and Tobago</option>
                                    <option value="TUN">Tunisia</option>
                                    <option value="TUR">Turkey</option>
                                    <option value="TKM">Turkmenistan</option>
                                    <option value="TCA">Turks and Caicos Islands</option>
                                    <option value="TUV">Tuvalu</option>
                                    <option value="UGA">Uganda</option>
                                    <option value="UKR">Ukraine</option>
                                    <option value="ARE">United Arab Emirates</option>
                                    <option value="GBR">United Kingdom</option>
                                    <option value="USA">United States of America</option>
                                    <option value="URY">Uruguay</option>
                                    <option value="UZB">Uzbekistan</option>
                                    <option value="VUT">Vanuatu</option>
                                    <option value="VEN">Venezuela (Bolivarian Republic of)</option>
                                    <option value="VNM">Viet Nam</option>
                                    <option value="VGB">Virgin Islands (British)</option>
                                    <option value="WLF">Wallis and Futuna</option>
                                    <option value="ESH">Western Sahara</option>
                                    <option value="YEM">Yemen</option>
                                    <option value="ZMB">Zambia</option>
                                    <option value="ZWE">Zimbabwe</option>
                                </optgroup>
                            </select>
                            <div class="val-error" id="Transactions_0__VictimBankCountryError"></div>
                        </fieldset>
                        <fieldset id="Transactions_0__VictimBankStateFields" class="state noborder t1 t2 t3 t4 t8 fieldset-contingent" data-ordinal="165">
                            <label class="usa-label inline" for="Transactions_0__VictimBankState">Originating Bank State: </label>
                            <select class="usa-select inline" aria-errormessage="Transactions_0__VictimBankStateError" data-val="true" data-val-required-when="The Victim Bank State field for transaction #TNUM is required if the Victim Bank Country is the United States of America." data-val-required-when-allowempty="false" data-val-required-when-input="Transactions[0].VictimBankCountry" data-val-required-when-op="eq" data-val-required-when-target="USA" id="Transactions_0__VictimBankState" name="Transactions[0].VictimBankState">
                                <option value="">[None]</option>
                                <optgroup label="">
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="GU">Guam</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VI">Virgin Islands, U.S.</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                            </select>
                            <div class="val-error" id="Transactions_0__VictimBankStateError"></div>
                        </fieldset>
                        <fieldset class="noborder label-sm t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__VictimBankZipCode">Originating Bank Zip Code/Route: </label><input data-ordinal="170" aria-errormessage="Transactions_0__VictimBankZipCode_error" class="usa-input inline" data-val="true" data-val-length="The Originating Bank Zip Code for transaction #TNUM must be no longer than 20 characters." data-val-length-max="20" id="Transactions_0__VictimBankZipCode" maxlength="20" name="Transactions[0].VictimBankZipCode" type="text" value="" />
                            <div class="val-error" id="Transactions_0__VictimBankZipCode_error"></div>
                        </fieldset>
                        <fieldset class="noborder t1 t2 t3 t4 t7 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__VictimAccountName">Originating Name on Account: </label><input data-ordinal="180" aria-errormessage="Transactions_0__VictimAccountName_error" class="usa-input inline" data-val="true" data-val-length="The Originating Account Name for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__VictimAccountName" maxlength="50" name="Transactions[0].VictimAccountName" type="text" value="" />
                            <div class="val-error" id="Transactions_0__VictimAccountName_error"></div>
                        </fieldset>
                        <fieldset class="noborder t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__VictimAccountNumber">Originating Account Number: </label><input data-ordinal="190" aria-errormessage="Transactions_0__VictimAccountNumber_error" class="usa-input inline" data-val="true" data-val-length="The Originating Account Number for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__VictimAccountNumber" maxlength="50" name="Transactions[0].VictimAccountNumber" type="text" value="" />
                            <div class="val-error" id="Transactions_0__VictimAccountNumber_error"></div>
                        </fieldset>
                        <fieldset class="noborder t6 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__CryptocurrencyType">Type of Cryptocurrency: </label><input data-ordinal="110" class="cc-type usa-input inline" aria-errormessage="Transactions_0__CryptocurrencyType_error" data-val="true" data-val-length="The Type of Cryptocurrency for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__CryptocurrencyType" maxlength="50" name="Transactions[0].CryptocurrencyType" type="text" value="" />
                            <div class="val-error" id="Transactions_0__CryptocurrencyType_error"></div>
                        </fieldset>
                        <fieldset class="noborder t7 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__P2PApplication">P2P Application Used: </label><input data-ordinal="110" aria-errormessage="Transactions_0__P2PApplication_error" class="usa-input inline" data-val="true" data-val-length="The P2P Application Used field for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__P2PApplication" maxlength="50" name="Transactions[0].P2PApplication" type="text" value="" />
                            <div class="val-error" id="Transactions_0__P2PApplication_error"></div>
                        </fieldset>
                        <fieldset class="noborder t6 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__TransactionID">Transaction ID/Hash: </label><input data-ordinal="120" class="txn-hash usa-input inline" aria-errormessage="Transactions_0__TransactionID_error" data-val="true" data-val-length="The Transaction ID for transaction #TNUM must be no longer than 75 characters." data-val-length-max="75" id="Transactions_0__TransactionID" maxlength="75" name="Transactions[0].TransactionID" type="text" value="" />
                            <div class="val-error" id="Transactions_0__TransactionID_error"></div>
                        </fieldset>
                        <fieldset class="noborder t6 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__CryptoATM">Cryptocurrency ATM/Kiosk: </label><input data-ordinal="130" class="cc-atm usa-input inline" aria-errormessage="Transactions_0__CryptoATM_error" data-val="true" data-val-length="The Cryptocurrency ATM/Kiosk for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__CryptoATM" maxlength="50" name="Transactions[0].CryptoATM" type="text" value="" />
                            <div class="val-error" id="Transactions_0__CryptoATM_error"></div>
                        </fieldset>
                        <fieldset class="noborder t5 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__GiftCardType">Type of Prepaid/Gift Card: </label><input class="gift-card-type usa-input inline" data-ordinal="110" aria-errormessage="Transactions_0__GiftCardType_error" data-val="true" data-val-length="The Type of Prepaid/Gift Card field for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__GiftCardType" maxlength="50" name="Transactions[0].GiftCardType" type="text" value="" />
                            <div class="val-error" id="Transactions_0__GiftCardType_error"></div>
                        </fieldset>
                        <fieldset class="noborder t6 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__ATMAddress">ATM/Kiosk Address: </label><input data-ordinal="140" class="cc-atm-add usa-input inline" aria-errormessage="Transactions_0__ATMAddress_error" data-val="true" data-val-length="The ATM/Kiosk Address for transaction #TNUM must be no longer than 75 characters." data-val-length-max="75" id="Transactions_0__ATMAddress" maxlength="75" name="Transactions[0].ATMAddress" type="text" value="" />
                            <div class="val-error" id="Transactions_0__ATMAddress_error"></div>
                        </fieldset>
                        <fieldset class="noborder t6 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__ATMCity">ATM/Kiosk City: </label><input data-ordinal="150" aria-errormessage="Transactions_0__ATMCity_error" class="usa-input inline" data-val="true" data-val-length="The ATM/Kiosk City for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__ATMCity" maxlength="50" name="Transactions[0].ATMCity" type="text" value="" />
                            <div class="val-error" id="Transactions_0__ATMCity_error"></div>
                        </fieldset>
                        <fieldset class="noborder t6 fieldset-contingent" data-ordinal="160" data-target="Transactions_0__ATMStateFields" data-target-value="USA">
                            <label class="usa-label inline" for="Transactions_0__ATMCountry">ATM/Kiosk Country: </label>
                            <select class="usa-select inline" aria-errormessage="Transactions_0__ATMCountryError" id="Transactions_0__ATMCountry" name="Transactions[0].ATMCountry">
                                <option value="">[None]</option>
                                <optgroup label="">
                                    <option value="USA">United States of America</option>
                                    <option value="AFG">Afghanistan</option>
                                    <option value="ALA">&#xC5;land Islands</option>
                                    <option value="ALB">Albania</option>
                                    <option value="DZA">Algeria</option>
                                    <option value="AND">Andorra</option>
                                    <option value="AGO">Angola</option>
                                    <option value="AIA">Anguilla</option>
                                    <option value="ATA">Antarctica</option>
                                    <option value="ATG">Antigua and Barbuda</option>
                                    <option value="ARG">Argentina</option>
                                    <option value="ARM">Armenia</option>
                                    <option value="ABW">Aruba</option>
                                    <option value="AUS">Australia</option>
                                    <option value="AUT">Austria</option>
                                    <option value="AZE">Azerbaijan</option>
                                    <option value="BHS">Bahamas</option>
                                    <option value="BHR">Bahrain</option>
                                    <option value="BGD">Bangladesh</option>
                                    <option value="BRB">Barbados</option>
                                    <option value="BLR">Belarus</option>
                                    <option value="BEL">Belgium</option>
                                    <option value="BLZ">Belize</option>
                                    <option value="BEN">Benin</option>
                                    <option value="BMU">Bermuda</option>
                                    <option value="BTN">Bhutan</option>
                                    <option value="BOL">Bolivia (Plurinational State of)</option>
                                    <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                                    <option value="BIH">Bosnia and Herzegovina</option>
                                    <option value="BWA">Botswana</option>
                                    <option value="BVT">Bouvet Island</option>
                                    <option value="BRA">Brazil</option>
                                    <option value="IOT">British Indian Ocean Territory</option>
                                    <option value="BRN">Brunei Darussalam</option>
                                    <option value="BGR">Bulgaria</option>
                                    <option value="BFA">Burkina Faso</option>
                                    <option value="BDI">Burundi</option>
                                    <option value="CPV">Cabo Verde</option>
                                    <option value="KHM">Cambodia</option>
                                    <option value="CMR">Cameroon</option>
                                    <option value="CAN">Canada</option>
                                    <option value="CYM">Cayman Islands</option>
                                    <option value="CAF">Central African Republic</option>
                                    <option value="TCD">Chad</option>
                                    <option value="CHL">Chile</option>
                                    <option value="CHN">China</option>
                                    <option value="CXR">Christmas Island</option>
                                    <option value="CCK">Cocos (Keeling) Islands</option>
                                    <option value="COL">Colombia</option>
                                    <option value="COM">Comoros</option>
                                    <option value="COG">Congo</option>
                                    <option value="COD">Congo (Democratic Republic of the)</option>
                                    <option value="COK">Cook Islands</option>
                                    <option value="CRI">Costa Rica</option>
                                    <option value="CIV">C&#xF4;te d&#x27;Ivoire</option>
                                    <option value="HRV">Croatia</option>
                                    <option value="CUB">Cuba</option>
                                    <option value="CUW">Cura&#xE7;ao</option>
                                    <option value="CYP">Cyprus</option>
                                    <option value="CZE">Czech Republic</option>
                                    <option value="DNK">Denmark</option>
                                    <option value="DJI">Djibouti</option>
                                    <option value="DMA">Dominica</option>
                                    <option value="DOM">Dominican Republic</option>
                                    <option value="ECU">Ecuador</option>
                                    <option value="EGY">Egypt</option>
                                    <option value="SLV">El Salvador</option>
                                    <option value="GNQ">Equatorial Guinea</option>
                                    <option value="ERI">Eritrea</option>
                                    <option value="EST">Estonia</option>
                                    <option value="ETH">Ethiopia</option>
                                    <option value="FLK">Falkland Islands (Malvinas)</option>
                                    <option value="FRO">Faroe Islands</option>
                                    <option value="FJI">Fiji</option>
                                    <option value="FIN">Finland</option>
                                    <option value="FRA">France</option>
                                    <option value="GUF">French Guiana</option>
                                    <option value="PYF">French Polynesia</option>
                                    <option value="ATF">French Southern Territories</option>
                                    <option value="GAB">Gabon</option>
                                    <option value="GMB">Gambia</option>
                                    <option value="GEO">Georgia</option>
                                    <option value="DEU">Germany</option>
                                    <option value="GHA">Ghana</option>
                                    <option value="GIB">Gibraltar</option>
                                    <option value="GRC">Greece</option>
                                    <option value="GRL">Greenland</option>
                                    <option value="GRD">Grenada</option>
                                    <option value="GLP">Guadeloupe</option>
                                    <option value="GTM">Guatemala</option>
                                    <option value="GGY">Guernsey</option>
                                    <option value="GIN">Guinea</option>
                                    <option value="GNB">Guinea-Bissau</option>
                                    <option value="GUY">Guyana</option>
                                    <option value="HTI">Haiti</option>
                                    <option value="HMD">Heard Island and McDonald Islands</option>
                                    <option value="VAT">Holy See</option>
                                    <option value="HND">Honduras</option>
                                    <option value="HKG">Hong Kong</option>
                                    <option value="HUN">Hungary</option>
                                    <option value="ISL">Iceland</option>
                                    <option value="IND">India</option>
                                    <option value="IDN">Indonesia</option>
                                    <option value="IRN">Iran (Islamic Republic of)</option>
                                    <option value="IRQ">Iraq</option>
                                    <option value="IRL">Ireland</option>
                                    <option value="IMN">Isle of Man</option>
                                    <option value="ISR">Israel</option>
                                    <option value="ITA">Italy</option>
                                    <option value="JAM">Jamaica</option>
                                    <option value="JPN">Japan</option>
                                    <option value="JEY">Jersey</option>
                                    <option value="JOR">Jordan</option>
                                    <option value="KAZ">Kazakhstan</option>
                                    <option value="KEN">Kenya</option>
                                    <option value="KIR">Kiribati</option>
                                    <option value="PRK">Korea (Democratic People&#x27;s Republic of)</option>
                                    <option value="KOR">Korea (Republic of)</option>
                                    <option value="KWT">Kuwait</option>
                                    <option value="KGZ">Kyrgyzstan</option>
                                    <option value="LAO">Lao People&#x27;s Democratic Republic</option>
                                    <option value="LVA">Latvia</option>
                                    <option value="LBN">Lebanon</option>
                                    <option value="LSO">Lesotho</option>
                                    <option value="LBR">Liberia</option>
                                    <option value="LBY">Libya</option>
                                    <option value="LIE">Liechtenstein</option>
                                    <option value="LTU">Lithuania</option>
                                    <option value="LUX">Luxembourg</option>
                                    <option value="MAC">Macao</option>
                                    <option value="MDG">Madagascar</option>
                                    <option value="MWI">Malawi</option>
                                    <option value="MYS">Malaysia</option>
                                    <option value="MDV">Maldives</option>
                                    <option value="MLI">Mali</option>
                                    <option value="MLT">Malta</option>
                                    <option value="MHL">Marshall Islands</option>
                                    <option value="MTQ">Martinique</option>
                                    <option value="MRT">Mauritania</option>
                                    <option value="MUS">Mauritius</option>
                                    <option value="MYT">Mayotte</option>
                                    <option value="MEX">Mexico</option>
                                    <option value="FSM">Micronesia (Federated States of)</option>
                                    <option value="MDA">Moldova (Republic of)</option>
                                    <option value="MCO">Monaco</option>
                                    <option value="MNG">Mongolia</option>
                                    <option value="MNE">Montenegro</option>
                                    <option value="MSR">Montserrat</option>
                                    <option value="MAR">Morocco</option>
                                    <option value="MOZ">Mozambique</option>
                                    <option value="MMR">Myanmar</option>
                                    <option value="NAM">Namibia</option>
                                    <option value="NRU">Nauru</option>
                                    <option value="NPL">Nepal</option>
                                    <option value="NLD">Netherlands</option>
                                    <option value="NCL">New Caledonia</option>
                                    <option value="NZL">New Zealand</option>
                                    <option value="NIC">Nicaragua</option>
                                    <option value="NER">Niger</option>
                                    <option value="NGA">Nigeria</option>
                                    <option value="NIU">Niue</option>
                                    <option value="NFK">Norfolk Island</option>
                                    <option value="MKD">North Macedonia</option>
                                    <option value="NOR">Norway</option>
                                    <option value="OMN">Oman</option>
                                    <option value="PAK">Pakistan</option>
                                    <option value="PLW">Palau</option>
                                    <option value="PSE">Palestinian Territory, Occupied</option>
                                    <option value="PAN">Panama</option>
                                    <option value="PNG">Papua New Guinea</option>
                                    <option value="PRY">Paraguay</option>
                                    <option value="PER">Peru</option>
                                    <option value="PHL">Philippines</option>
                                    <option value="PCN">Pitcairn</option>
                                    <option value="POL">Poland</option>
                                    <option value="PRT">Portugal</option>
                                    <option value="QAT">Qatar</option>
                                    <option value="REU">R&#xE9;union</option>
                                    <option value="ROU">Romania</option>
                                    <option value="RUS">Russian Federation</option>
                                    <option value="RWA">Rwanda</option>
                                    <option value="BLM">Saint Barth&#xE9;lemy</option>
                                    <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                                    <option value="KNA">Saint Kitts and Nevis</option>
                                    <option value="LCA">Saint Lucia</option>
                                    <option value="MAF">Saint Martin (French part)</option>
                                    <option value="SPM">Saint Pierre and Miquelon</option>
                                    <option value="VCT">Saint Vincent and the Grenadines</option>
                                    <option value="WSM">Samoa</option>
                                    <option value="SMR">San Marino</option>
                                    <option value="STP">Sao Tome and Principe</option>
                                    <option value="SAU">Saudi Arabia</option>
                                    <option value="SEN">Senegal</option>
                                    <option value="SRB">Serbia</option>
                                    <option value="SYC">Seychelles</option>
                                    <option value="SLE">Sierra Leone</option>
                                    <option value="SGP">Singapore</option>
                                    <option value="SXM">Sint Maarten (Dutch part)</option>
                                    <option value="SVK">Slovakia</option>
                                    <option value="SVN">Slovenia</option>
                                    <option value="SLB">Solomon Islands</option>
                                    <option value="SOM">Somalia</option>
                                    <option value="ZAF">South Africa</option>
                                    <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                    <option value="SSD">South Sudan</option>
                                    <option value="ESP">Spain</option>
                                    <option value="LKA">Sri Lanka</option>
                                    <option value="SDN">Sudan</option>
                                    <option value="SUR">Suriname</option>
                                    <option value="SJM">Svalbard and Jan Mayen</option>
                                    <option value="SWZ">Swaziland</option>
                                    <option value="SWE">Sweden</option>
                                    <option value="CHE">Switzerland</option>
                                    <option value="SYR">Syrian Arab Republic</option>
                                    <option value="TWN">Taiwan</option>
                                    <option value="TJK">Tajikistan</option>
                                    <option value="TZA">Tanzania, United Republic of</option>
                                    <option value="THA">Thailand</option>
                                    <option value="TLS">Timor-Leste</option>
                                    <option value="TGO">Togo</option>
                                    <option value="TKL">Tokelau</option>
                                    <option value="TON">Tonga</option>
                                    <option value="TTO">Trinidad and Tobago</option>
                                    <option value="TUN">Tunisia</option>
                                    <option value="TUR">Turkey</option>
                                    <option value="TKM">Turkmenistan</option>
                                    <option value="TCA">Turks and Caicos Islands</option>
                                    <option value="TUV">Tuvalu</option>
                                    <option value="UGA">Uganda</option>
                                    <option value="UKR">Ukraine</option>
                                    <option value="ARE">United Arab Emirates</option>
                                    <option value="GBR">United Kingdom</option>
                                    <option value="USA">United States of America</option>
                                    <option value="URY">Uruguay</option>
                                    <option value="UZB">Uzbekistan</option>
                                    <option value="VUT">Vanuatu</option>
                                    <option value="VEN">Venezuela (Bolivarian Republic of)</option>
                                    <option value="VNM">Viet Nam</option>
                                    <option value="VGB">Virgin Islands (British)</option>
                                    <option value="WLF">Wallis and Futuna</option>
                                    <option value="ESH">Western Sahara</option>
                                    <option value="YEM">Yemen</option>
                                    <option value="ZMB">Zambia</option>
                                    <option value="ZWE">Zimbabwe</option>
                                </optgroup>
                            </select>
                            <div class="val-error" id="Transactions_0__ATMCountryError"></div>
                        </fieldset>
                        <fieldset id="Transactions_0__ATMStateFields" class="state noborder t6 fieldset-contingent" data-ordinal="165">
                            <label class="usa-label inline" for="Transactions_0__ATMState">ATM/Kiosk State: </label>
                            <select class="usa-select inline" aria-errormessage="Transactions_0__ATMStateError" data-val="true" data-val-required-when="The ATM/Kiosk State field for transaction #TNUM is required if the ATM/Kiosk Country is the United States of America." data-val-required-when-allowempty="false" data-val-required-when-input="Transactions[0].ATMCountry" data-val-required-when-op="eq" data-val-required-when-target="USA" id="Transactions_0__ATMState" name="Transactions[0].ATMState">
                                <option value="">[None]</option>
                                <optgroup label="">
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="GU">Guam</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VI">Virgin Islands, U.S.</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                            </select>
                            <div class="val-error" id="Transactions_0__ATMStateError"></div>
                        </fieldset>
                        <fieldset class="noborder t6 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__ATMZipCode">ATM/Kiosk Zip Code/Route: </label><input data-ordinal="170" aria-errormessage="Transactions_0__ATMZipCode_error" class="usa-input inline" data-val="true" data-val-length="The ATM/Kiosk Zip Code for transaction #TNUM must be no longer than 20 characters." data-val-length-max="20" id="Transactions_0__ATMZipCode" maxlength="20" name="Transactions[0].ATMZipCode" type="text" value="" />
                            <div class="val-error" id="Transactions_0__ATMZipCode_error"></div>
                        </fieldset>
                        <fieldset class="noborder t6 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__VictimAccountWallet">Originating Wallet Address: </label><input class="cc-orig-wallet usa-input inline" data-ordinal="190" aria-errormessage="Transactions_0__VictimAccountWallet_error" data-val="true" data-val-length="The Originating Account/Wallet for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__VictimAccountWallet" maxlength="50" name="Transactions[0].VictimAccountWallet" type="text" value="" />
                            <div class="val-error" id="Transactions_0__VictimAccountWallet_error"></div>
                        </fieldset>
                        <fieldset class="noborder t7 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__VictimAccountIdentifier">Originating Account Identifier: </label><input class="transaction-account-num usa-input inline" data-ordinal="190" aria-errormessage="Transactions_0__VictimAccountIdentifier_error" data-val="true" data-val-length="The Originating Account Identifier for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__VictimAccountIdentifier" maxlength="50" name="Transactions[0].VictimAccountIdentifier" type="text" value="" />
                            <div class="val-error" id="Transactions_0__VictimAccountIdentifier_error"></div>
                        </fieldset>
                        <fieldset class="noborder t5 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__GiftCardNumber">Prepaid/Gift Card Number: </label><input data-ordinal="190" aria-errormessage="Transactions_0__GiftCardNumber_error" class="usa-input inline" data-val="true" data-val-length="The Prepaid/Gift Card Number for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__GiftCardNumber" maxlength="50" name="Transactions[0].GiftCardNumber" type="text" value="" />
                            <div class="val-error" id="Transactions_0__GiftCardNumber_error"></div>
                        </fieldset>
                        <hr class="opacity-0" data-ordinal="1000">
                        <fieldset class="noborder t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientBankName">Recipient Bank Name: </label><input data-ordinal="1100" aria-errormessage="Transactions_0__RecipientBankName_error" class="usa-input inline" data-val="true" data-val-length="The Recipient Bank Name for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientBankName" maxlength="50" name="Transactions[0].RecipientBankName" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientBankName_error"></div>
                        </fieldset>
                        <fieldset class="noborder t0 t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientBankAddress1">Recipient Bank Address: </label><input data-ordinal="1110" aria-errormessage="Transactions_0__RecipientBankAddress1_error" class="usa-input inline" data-val="true" data-val-length="The Recipient Bank Address for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientBankAddress1" maxlength="50" name="Transactions[0].RecipientBankAddress1" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientBankAddress1_error"></div>
                        </fieldset>
                        <fieldset class="noborder label-sm t0 t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientBankAddress2">Recipient Bank Address (cont.): </label><input data-ordinal="1120" aria-errormessage="Transactions_0__RecipientBankAddress2_error" class="usa-input inline" data-val="true" data-val-length="The Recipient Bank Address (cont.) for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientBankAddress2" maxlength="50" name="Transactions[0].RecipientBankAddress2" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientBankAddress2_error"></div>
                        </fieldset>
                        <fieldset class="noborder label-sm t0 t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientBankMailStop">Recipient Bank Suite/Mail Stop: </label><input data-ordinal="1130" aria-errormessage="Transactions_0__RecipientBankMailStop_error" class="usa-input inline" data-val="true" data-val-length="The Recipient Bank Suite/Mail Stop for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientBankMailStop" maxlength="50" name="Transactions[0].RecipientBankMailStop" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientBankMailStop_error"></div>
                        </fieldset>
                        <fieldset class="noborder t0 t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientBankCity">Recipient Bank City: </label><input data-ordinal="1140" aria-errormessage="Transactions_0__RecipientBankCity_error" class="usa-input inline" data-val="true" data-val-length="The Recipient Bank City for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientBankCity" maxlength="50" name="Transactions[0].RecipientBankCity" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientBankCity_error"></div>
                        </fieldset>
                        <fieldset class="noborder t0 t1 t2 t3 t4 t8 fieldset-contingent" data-ordinal="1150" data-target="Transactions_0__RecipientBankStateFields" data-target-value="USA">
                            <label class="usa-label inline" for="Transactions_0__RecipientBankCountry">Recipient Bank Country: </label>
                            <select class="usa-select inline" aria-errormessage="Transactions_0__RecipientBankCountryError" id="Transactions_0__RecipientBankCountry" name="Transactions[0].RecipientBankCountry">
                                <option value="">[None]</option>
                                <optgroup label="">
                                    <option value="USA">United States of America</option>
                                    <option value="AFG">Afghanistan</option>
                                    <option value="ALA">&#xC5;land Islands</option>
                                    <option value="ALB">Albania</option>
                                    <option value="DZA">Algeria</option>
                                    <option value="AND">Andorra</option>
                                    <option value="AGO">Angola</option>
                                    <option value="AIA">Anguilla</option>
                                    <option value="ATA">Antarctica</option>
                                    <option value="ATG">Antigua and Barbuda</option>
                                    <option value="ARG">Argentina</option>
                                    <option value="ARM">Armenia</option>
                                    <option value="ABW">Aruba</option>
                                    <option value="AUS">Australia</option>
                                    <option value="AUT">Austria</option>
                                    <option value="AZE">Azerbaijan</option>
                                    <option value="BHS">Bahamas</option>
                                    <option value="BHR">Bahrain</option>
                                    <option value="BGD">Bangladesh</option>
                                    <option value="BRB">Barbados</option>
                                    <option value="BLR">Belarus</option>
                                    <option value="BEL">Belgium</option>
                                    <option value="BLZ">Belize</option>
                                    <option value="BEN">Benin</option>
                                    <option value="BMU">Bermuda</option>
                                    <option value="BTN">Bhutan</option>
                                    <option value="BOL">Bolivia (Plurinational State of)</option>
                                    <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                                    <option value="BIH">Bosnia and Herzegovina</option>
                                    <option value="BWA">Botswana</option>
                                    <option value="BVT">Bouvet Island</option>
                                    <option value="BRA">Brazil</option>
                                    <option value="IOT">British Indian Ocean Territory</option>
                                    <option value="BRN">Brunei Darussalam</option>
                                    <option value="BGR">Bulgaria</option>
                                    <option value="BFA">Burkina Faso</option>
                                    <option value="BDI">Burundi</option>
                                    <option value="CPV">Cabo Verde</option>
                                    <option value="KHM">Cambodia</option>
                                    <option value="CMR">Cameroon</option>
                                    <option value="CAN">Canada</option>
                                    <option value="CYM">Cayman Islands</option>
                                    <option value="CAF">Central African Republic</option>
                                    <option value="TCD">Chad</option>
                                    <option value="CHL">Chile</option>
                                    <option value="CHN">China</option>
                                    <option value="CXR">Christmas Island</option>
                                    <option value="CCK">Cocos (Keeling) Islands</option>
                                    <option value="COL">Colombia</option>
                                    <option value="COM">Comoros</option>
                                    <option value="COG">Congo</option>
                                    <option value="COD">Congo (Democratic Republic of the)</option>
                                    <option value="COK">Cook Islands</option>
                                    <option value="CRI">Costa Rica</option>
                                    <option value="CIV">C&#xF4;te d&#x27;Ivoire</option>
                                    <option value="HRV">Croatia</option>
                                    <option value="CUB">Cuba</option>
                                    <option value="CUW">Cura&#xE7;ao</option>
                                    <option value="CYP">Cyprus</option>
                                    <option value="CZE">Czech Republic</option>
                                    <option value="DNK">Denmark</option>
                                    <option value="DJI">Djibouti</option>
                                    <option value="DMA">Dominica</option>
                                    <option value="DOM">Dominican Republic</option>
                                    <option value="ECU">Ecuador</option>
                                    <option value="EGY">Egypt</option>
                                    <option value="SLV">El Salvador</option>
                                    <option value="GNQ">Equatorial Guinea</option>
                                    <option value="ERI">Eritrea</option>
                                    <option value="EST">Estonia</option>
                                    <option value="ETH">Ethiopia</option>
                                    <option value="FLK">Falkland Islands (Malvinas)</option>
                                    <option value="FRO">Faroe Islands</option>
                                    <option value="FJI">Fiji</option>
                                    <option value="FIN">Finland</option>
                                    <option value="FRA">France</option>
                                    <option value="GUF">French Guiana</option>
                                    <option value="PYF">French Polynesia</option>
                                    <option value="ATF">French Southern Territories</option>
                                    <option value="GAB">Gabon</option>
                                    <option value="GMB">Gambia</option>
                                    <option value="GEO">Georgia</option>
                                    <option value="DEU">Germany</option>
                                    <option value="GHA">Ghana</option>
                                    <option value="GIB">Gibraltar</option>
                                    <option value="GRC">Greece</option>
                                    <option value="GRL">Greenland</option>
                                    <option value="GRD">Grenada</option>
                                    <option value="GLP">Guadeloupe</option>
                                    <option value="GTM">Guatemala</option>
                                    <option value="GGY">Guernsey</option>
                                    <option value="GIN">Guinea</option>
                                    <option value="GNB">Guinea-Bissau</option>
                                    <option value="GUY">Guyana</option>
                                    <option value="HTI">Haiti</option>
                                    <option value="HMD">Heard Island and McDonald Islands</option>
                                    <option value="VAT">Holy See</option>
                                    <option value="HND">Honduras</option>
                                    <option value="HKG">Hong Kong</option>
                                    <option value="HUN">Hungary</option>
                                    <option value="ISL">Iceland</option>
                                    <option value="IND">India</option>
                                    <option value="IDN">Indonesia</option>
                                    <option value="IRN">Iran (Islamic Republic of)</option>
                                    <option value="IRQ">Iraq</option>
                                    <option value="IRL">Ireland</option>
                                    <option value="IMN">Isle of Man</option>
                                    <option value="ISR">Israel</option>
                                    <option value="ITA">Italy</option>
                                    <option value="JAM">Jamaica</option>
                                    <option value="JPN">Japan</option>
                                    <option value="JEY">Jersey</option>
                                    <option value="JOR">Jordan</option>
                                    <option value="KAZ">Kazakhstan</option>
                                    <option value="KEN">Kenya</option>
                                    <option value="KIR">Kiribati</option>
                                    <option value="PRK">Korea (Democratic People&#x27;s Republic of)</option>
                                    <option value="KOR">Korea (Republic of)</option>
                                    <option value="KWT">Kuwait</option>
                                    <option value="KGZ">Kyrgyzstan</option>
                                    <option value="LAO">Lao People&#x27;s Democratic Republic</option>
                                    <option value="LVA">Latvia</option>
                                    <option value="LBN">Lebanon</option>
                                    <option value="LSO">Lesotho</option>
                                    <option value="LBR">Liberia</option>
                                    <option value="LBY">Libya</option>
                                    <option value="LIE">Liechtenstein</option>
                                    <option value="LTU">Lithuania</option>
                                    <option value="LUX">Luxembourg</option>
                                    <option value="MAC">Macao</option>
                                    <option value="MDG">Madagascar</option>
                                    <option value="MWI">Malawi</option>
                                    <option value="MYS">Malaysia</option>
                                    <option value="MDV">Maldives</option>
                                    <option value="MLI">Mali</option>
                                    <option value="MLT">Malta</option>
                                    <option value="MHL">Marshall Islands</option>
                                    <option value="MTQ">Martinique</option>
                                    <option value="MRT">Mauritania</option>
                                    <option value="MUS">Mauritius</option>
                                    <option value="MYT">Mayotte</option>
                                    <option value="MEX">Mexico</option>
                                    <option value="FSM">Micronesia (Federated States of)</option>
                                    <option value="MDA">Moldova (Republic of)</option>
                                    <option value="MCO">Monaco</option>
                                    <option value="MNG">Mongolia</option>
                                    <option value="MNE">Montenegro</option>
                                    <option value="MSR">Montserrat</option>
                                    <option value="MAR">Morocco</option>
                                    <option value="MOZ">Mozambique</option>
                                    <option value="MMR">Myanmar</option>
                                    <option value="NAM">Namibia</option>
                                    <option value="NRU">Nauru</option>
                                    <option value="NPL">Nepal</option>
                                    <option value="NLD">Netherlands</option>
                                    <option value="NCL">New Caledonia</option>
                                    <option value="NZL">New Zealand</option>
                                    <option value="NIC">Nicaragua</option>
                                    <option value="NER">Niger</option>
                                    <option value="NGA">Nigeria</option>
                                    <option value="NIU">Niue</option>
                                    <option value="NFK">Norfolk Island</option>
                                    <option value="MKD">North Macedonia</option>
                                    <option value="NOR">Norway</option>
                                    <option value="OMN">Oman</option>
                                    <option value="PAK">Pakistan</option>
                                    <option value="PLW">Palau</option>
                                    <option value="PSE">Palestinian Territory, Occupied</option>
                                    <option value="PAN">Panama</option>
                                    <option value="PNG">Papua New Guinea</option>
                                    <option value="PRY">Paraguay</option>
                                    <option value="PER">Peru</option>
                                    <option value="PHL">Philippines</option>
                                    <option value="PCN">Pitcairn</option>
                                    <option value="POL">Poland</option>
                                    <option value="PRT">Portugal</option>
                                    <option value="QAT">Qatar</option>
                                    <option value="REU">R&#xE9;union</option>
                                    <option value="ROU">Romania</option>
                                    <option value="RUS">Russian Federation</option>
                                    <option value="RWA">Rwanda</option>
                                    <option value="BLM">Saint Barth&#xE9;lemy</option>
                                    <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                                    <option value="KNA">Saint Kitts and Nevis</option>
                                    <option value="LCA">Saint Lucia</option>
                                    <option value="MAF">Saint Martin (French part)</option>
                                    <option value="SPM">Saint Pierre and Miquelon</option>
                                    <option value="VCT">Saint Vincent and the Grenadines</option>
                                    <option value="WSM">Samoa</option>
                                    <option value="SMR">San Marino</option>
                                    <option value="STP">Sao Tome and Principe</option>
                                    <option value="SAU">Saudi Arabia</option>
                                    <option value="SEN">Senegal</option>
                                    <option value="SRB">Serbia</option>
                                    <option value="SYC">Seychelles</option>
                                    <option value="SLE">Sierra Leone</option>
                                    <option value="SGP">Singapore</option>
                                    <option value="SXM">Sint Maarten (Dutch part)</option>
                                    <option value="SVK">Slovakia</option>
                                    <option value="SVN">Slovenia</option>
                                    <option value="SLB">Solomon Islands</option>
                                    <option value="SOM">Somalia</option>
                                    <option value="ZAF">South Africa</option>
                                    <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                    <option value="SSD">South Sudan</option>
                                    <option value="ESP">Spain</option>
                                    <option value="LKA">Sri Lanka</option>
                                    <option value="SDN">Sudan</option>
                                    <option value="SUR">Suriname</option>
                                    <option value="SJM">Svalbard and Jan Mayen</option>
                                    <option value="SWZ">Swaziland</option>
                                    <option value="SWE">Sweden</option>
                                    <option value="CHE">Switzerland</option>
                                    <option value="SYR">Syrian Arab Republic</option>
                                    <option value="TWN">Taiwan</option>
                                    <option value="TJK">Tajikistan</option>
                                    <option value="TZA">Tanzania, United Republic of</option>
                                    <option value="THA">Thailand</option>
                                    <option value="TLS">Timor-Leste</option>
                                    <option value="TGO">Togo</option>
                                    <option value="TKL">Tokelau</option>
                                    <option value="TON">Tonga</option>
                                    <option value="TTO">Trinidad and Tobago</option>
                                    <option value="TUN">Tunisia</option>
                                    <option value="TUR">Turkey</option>
                                    <option value="TKM">Turkmenistan</option>
                                    <option value="TCA">Turks and Caicos Islands</option>
                                    <option value="TUV">Tuvalu</option>
                                    <option value="UGA">Uganda</option>
                                    <option value="UKR">Ukraine</option>
                                    <option value="ARE">United Arab Emirates</option>
                                    <option value="GBR">United Kingdom</option>
                                    <option value="USA">United States of America</option>
                                    <option value="URY">Uruguay</option>
                                    <option value="UZB">Uzbekistan</option>
                                    <option value="VUT">Vanuatu</option>
                                    <option value="VEN">Venezuela (Bolivarian Republic of)</option>
                                    <option value="VNM">Viet Nam</option>
                                    <option value="VGB">Virgin Islands (British)</option>
                                    <option value="WLF">Wallis and Futuna</option>
                                    <option value="ESH">Western Sahara</option>
                                    <option value="YEM">Yemen</option>
                                    <option value="ZMB">Zambia</option>
                                    <option value="ZWE">Zimbabwe</option>
                                </optgroup>
                            </select>
                            <div class="val-error" id="Transactions_0__RecipientBankCountryError"></div>
                        </fieldset>
                        <fieldset id="Transactions_0__RecipientBankStateFields" data-ordinal="1155" class="state noborder t0 t1 t2 t3 t4 t8 fieldset-contingent">
                            <label class="usa-label inline" for="Transactions_0__RecipientBankState">Recipient Bank State: </label>
                            <select class="usa-select inline" aria-errormessage="Transactions_0__RecipientBankStateError" id="Transactions_0__RecipientBankState" name="Transactions[0].RecipientBankState">
                                <option value="">[None]</option>
                                <optgroup label="">
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="GU">Guam</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VI">Virgin Islands, U.S.</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                            </select>
                            <div class="val-error" id="Transactions_0__RecipientBankStateError"></div>
                        </fieldset>
                        <fieldset class="noborder label-sm t0 t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientBankZipCode">Recipient Bank Zip Code/Route: </label><input data-ordinal="1160" aria-errormessage="Transactions_0__RecipientBankZipCode_error" class="usa-input inline" data-val="true" data-val-length="The Recipient Bank Zip Code for transaction #TNUM must be no longer than 20 characters." data-val-length-max="20" id="Transactions_0__RecipientBankZipCode" maxlength="20" name="Transactions[0].RecipientBankZipCode" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientBankZipCode_error"></div>
                        </fieldset>
                        <fieldset class="noborder t1 t2 t3 t4 t7 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientAccountName">Recipient Name on Account: </label><input data-ordinal="1170" aria-errormessage="Transactions_0__RecipientAccountName_error" class="usa-input inline" data-val="true" data-val-length="The Recipient Account Name for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientAccountName" maxlength="50" name="Transactions[0].RecipientAccountName" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientAccountName_error"></div>
                        </fieldset>
                        <fieldset class="noborder t5 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientName">Recipient Name: </label><input data-ordinal="1170" aria-errormessage="Transactions_0__RecipientName_error" class="usa-input inline" data-val="true" data-val-length="The Recipient Name for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientName" maxlength="50" name="Transactions[0].RecipientName" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientName_error"></div>
                        </fieldset>
                        <fieldset class="noborder label-sm t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientBankRoutingNumber">Recipient Bank Routing Number: </label><input class="route-num usa-input inline" data-ordinal="1180" aria-errormessage="Transactions_0__RecipientBankRoutingNumber_error" data-val="true" data-val-length="The Recipient Routing Number for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientBankRoutingNumber" maxlength="50" name="Transactions[0].RecipientBankRoutingNumber" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientBankRoutingNumber_error"></div>
                        </fieldset>
                        <fieldset class="noborder t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientAccountNumber">Recipient Account Number: </label><input data-ordinal="1190" aria-errormessage="Transactions_0__RecipientAccountNumber_error" class="usa-input inline" data-val="true" data-val-length="The Recipient Account Number for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientAccountNumber" maxlength="50" name="Transactions[0].RecipientAccountNumber" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientAccountNumber_error"></div>
                        </fieldset>
                        <fieldset class="noborder t1 t2 t3 t4 t8 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientBankSwiftCode">Recipient Bank SWIFT Code: </label><input class="swift-num usa-input inline" pattern="[a-zA-Z]{6}\w{2}(\w{3})?" data-ordinal="1200" aria-errormessage="Transactions_0__RecipientBankSwiftCode_error" data-val="true" data-val-length="The SWIFT Code for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" data-val-regex="The SWIFT Code for transaction #TNUM must be in a valid SWIFT Code format." data-val-regex-pattern="[a-zA-Z]{6}\w{2}(\w{3})?" id="Transactions_0__RecipientBankSwiftCode" maxlength="50" name="Transactions[0].RecipientBankSwiftCode" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientBankSwiftCode_error"></div>
                        </fieldset>
                        <fieldset class="noborder t6 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientAccountWallet">Recipient Wallet Address: </label><input class="cc-recip-wallet usa-input inline" data-ordinal="1190" aria-errormessage="Transactions_0__RecipientAccountWallet_error" data-val="true" data-val-length="The Recipient Account/Wallet for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientAccountWallet" maxlength="50" name="Transactions[0].RecipientAccountWallet" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientAccountWallet_error"></div>
                        </fieldset>
                        <fieldset class="noborder t7 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientAccountIdentifier">Recipient Account Identifier: </label><input class="transaction-account-num usa-input inline" data-ordinal="1190" aria-errormessage="Transactions_0__RecipientAccountIdentifier_error" data-val="true" data-val-length="The Recipient Account Identifier for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientAccountIdentifier" maxlength="50" name="Transactions[0].RecipientAccountIdentifier" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientAccountIdentifier_error"></div>
                        </fieldset>
                        <fieldset class="noborder label-sm t5 fieldset-contingent"><label class="usa-label inline" for="Transactions_0__RecipientIdentifier">Recipient Identifier (email/phone): </label><input data-ordinal="1190" aria-errormessage="Transactions_0__RecipientIdentifier_error" class="usa-input inline" data-val="true" data-val-length="The Recipient Identifier for transaction #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Transactions_0__RecipientIdentifier" maxlength="50" name="Transactions[0].RecipientIdentifier" type="text" value="" />
                            <div class="val-error" id="Transactions_0__RecipientIdentifier_error"></div>
                        </fieldset>
                    </div>
                </div>
                <div class="display-flex flex-justify-end width-full">
                    <button class="usa-button margin-top-1" type="submit" formaction="AddTransaction#step3">Add Transaction</button>
                </div>
            </div>
        </article>
        <article id="step4" class="form-step" data-step-num="4">
            <fieldset class="usa-fieldset">
                <legend class="text-semibold border-bottom font-sans-lg width-full usa-legend usa-label">Information About The Subject(s)</legend>
                <aside class="text-italic">Please complete one section for each subject that caused this incident. <span class="text-underline">If you do not have all of the requested information, please provide as much as possible.</span> If subject(s) are not known, proceed to the next section.</aside>
                <div class="subjects usa-accordion usa-accordion--bordered usa-accordion--multiselectable margin-y-3" data-allow-multiple>
                    <div data-index="1">
                        <div class="usa-accordion__heading">
                            <button type="button" class="usa-accordion__button" aria-controls="subject0">
                                <div>Subject #1</div>
                            </button>
                        </div>
                        <div class="usa-accordion__content" id="subject0">
                            <button class="float-right usa-button" type="submit" name="Subject" formaction="RemoveSubject#step4" value="0">Remove Subject</button>
                            <fieldset class="noborder"><label class="usa-label inline" for="Subjects_0__Name">Name: </label><input aria-errormessage="Subjects_0__Name_error" class="usa-input inline" data-val="true" data-val-length="The Name for subject #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Subjects_0__Name" maxlength="50" name="Subjects[0].Name" type="text" value="" />
                                <div class="val-error" id="Subjects_0__Name_error"></div>
                            </fieldset>
                            <fieldset class="noborder"><label class="usa-label inline" for="Subjects_0__BusinessName">Business Name: </label><input aria-errormessage="Subjects_0__BusinessName_error" class="usa-input inline" data-val="true" data-val-length="The Business Name for subject #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Subjects_0__BusinessName" maxlength="50" name="Subjects[0].BusinessName" type="text" value="" />
                                <div class="val-error" id="Subjects_0__BusinessName_error"></div>
                            </fieldset>
                            <fieldset class="noborder"><label class="usa-label inline" for="Subjects_0__Address1">Address: </label><input aria-errormessage="Subjects_0__Address1_error" class="usa-input inline" data-val="true" data-val-length="The Address for subject #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Subjects_0__Address1" maxlength="50" name="Subjects[0].Address1" type="text" value="" />
                                <div class="val-error" id="Subjects_0__Address1_error"></div>
                            </fieldset>
                            <fieldset class="noborder"><label class="usa-label inline" for="Subjects_0__Address2">Address (continued): </label><input aria-errormessage="Subjects_0__Address2_error" class="usa-input inline" data-val="true" data-val-length="The Address (cont.) for subject #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Subjects_0__Address2" maxlength="50" name="Subjects[0].Address2" type="text" value="" />
                                <div class="val-error" id="Subjects_0__Address2_error"></div>
                            </fieldset>
                            <fieldset class="noborder"><label class="usa-label inline" for="Subjects_0__MailStop">Suite/Apt./Mail Stop: </label><input aria-errormessage="Subjects_0__MailStop_error" class="usa-input inline" data-val="true" data-val-length="The Suite/Apt./MailStop for subject #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Subjects_0__MailStop" maxlength="50" name="Subjects[0].MailStop" type="text" value="" />
                                <div class="val-error" id="Subjects_0__MailStop_error"></div>
                            </fieldset>
                            <fieldset class="noborder"><label class="usa-label inline" for="Subjects_0__City">City: </label><input aria-errormessage="Subjects_0__City_error" class="usa-input inline" data-val="true" data-val-length="The City for subject #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Subjects_0__City" maxlength="50" name="Subjects[0].City" type="text" value="" />
                                <div class="val-error" id="Subjects_0__City_error"></div>
                            </fieldset>
                            <fieldset class="noborder" data-target="Subjects_0_StateField" data-target-value="USA">
                                <label class="usa-label inline" for="Subjects_0__Country">Country: </label>
                                <select class="usa-select inline" aria-errormessage="Subjects_0__CountryError" id="Subjects_0__Country" name="Subjects[0].Country">
                                    <option value="">[None/Unknown]</option>
                                    <optgroup label="">
                                        <option value="USA">United States of America</option>
                                        <option value="AFG">Afghanistan</option>
                                        <option value="ALA">&#xC5;land Islands</option>
                                        <option value="ALB">Albania</option>
                                        <option value="DZA">Algeria</option>
                                        <option value="AND">Andorra</option>
                                        <option value="AGO">Angola</option>
                                        <option value="AIA">Anguilla</option>
                                        <option value="ATA">Antarctica</option>
                                        <option value="ATG">Antigua and Barbuda</option>
                                        <option value="ARG">Argentina</option>
                                        <option value="ARM">Armenia</option>
                                        <option value="ABW">Aruba</option>
                                        <option value="AUS">Australia</option>
                                        <option value="AUT">Austria</option>
                                        <option value="AZE">Azerbaijan</option>
                                        <option value="BHS">Bahamas</option>
                                        <option value="BHR">Bahrain</option>
                                        <option value="BGD">Bangladesh</option>
                                        <option value="BRB">Barbados</option>
                                        <option value="BLR">Belarus</option>
                                        <option value="BEL">Belgium</option>
                                        <option value="BLZ">Belize</option>
                                        <option value="BEN">Benin</option>
                                        <option value="BMU">Bermuda</option>
                                        <option value="BTN">Bhutan</option>
                                        <option value="BOL">Bolivia (Plurinational State of)</option>
                                        <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BIH">Bosnia and Herzegovina</option>
                                        <option value="BWA">Botswana</option>
                                        <option value="BVT">Bouvet Island</option>
                                        <option value="BRA">Brazil</option>
                                        <option value="IOT">British Indian Ocean Territory</option>
                                        <option value="BRN">Brunei Darussalam</option>
                                        <option value="BGR">Bulgaria</option>
                                        <option value="BFA">Burkina Faso</option>
                                        <option value="BDI">Burundi</option>
                                        <option value="CPV">Cabo Verde</option>
                                        <option value="KHM">Cambodia</option>
                                        <option value="CMR">Cameroon</option>
                                        <option value="CAN">Canada</option>
                                        <option value="CYM">Cayman Islands</option>
                                        <option value="CAF">Central African Republic</option>
                                        <option value="TCD">Chad</option>
                                        <option value="CHL">Chile</option>
                                        <option value="CHN">China</option>
                                        <option value="CXR">Christmas Island</option>
                                        <option value="CCK">Cocos (Keeling) Islands</option>
                                        <option value="COL">Colombia</option>
                                        <option value="COM">Comoros</option>
                                        <option value="COG">Congo</option>
                                        <option value="COD">Congo (Democratic Republic of the)</option>
                                        <option value="COK">Cook Islands</option>
                                        <option value="CRI">Costa Rica</option>
                                        <option value="CIV">C&#xF4;te d&#x27;Ivoire</option>
                                        <option value="HRV">Croatia</option>
                                        <option value="CUB">Cuba</option>
                                        <option value="CUW">Cura&#xE7;ao</option>
                                        <option value="CYP">Cyprus</option>
                                        <option value="CZE">Czech Republic</option>
                                        <option value="DNK">Denmark</option>
                                        <option value="DJI">Djibouti</option>
                                        <option value="DMA">Dominica</option>
                                        <option value="DOM">Dominican Republic</option>
                                        <option value="ECU">Ecuador</option>
                                        <option value="EGY">Egypt</option>
                                        <option value="SLV">El Salvador</option>
                                        <option value="GNQ">Equatorial Guinea</option>
                                        <option value="ERI">Eritrea</option>
                                        <option value="EST">Estonia</option>
                                        <option value="ETH">Ethiopia</option>
                                        <option value="FLK">Falkland Islands (Malvinas)</option>
                                        <option value="FRO">Faroe Islands</option>
                                        <option value="FJI">Fiji</option>
                                        <option value="FIN">Finland</option>
                                        <option value="FRA">France</option>
                                        <option value="GUF">French Guiana</option>
                                        <option value="PYF">French Polynesia</option>
                                        <option value="ATF">French Southern Territories</option>
                                        <option value="GAB">Gabon</option>
                                        <option value="GMB">Gambia</option>
                                        <option value="GEO">Georgia</option>
                                        <option value="DEU">Germany</option>
                                        <option value="GHA">Ghana</option>
                                        <option value="GIB">Gibraltar</option>
                                        <option value="GRC">Greece</option>
                                        <option value="GRL">Greenland</option>
                                        <option value="GRD">Grenada</option>
                                        <option value="GLP">Guadeloupe</option>
                                        <option value="GTM">Guatemala</option>
                                        <option value="GGY">Guernsey</option>
                                        <option value="GIN">Guinea</option>
                                        <option value="GNB">Guinea-Bissau</option>
                                        <option value="GUY">Guyana</option>
                                        <option value="HTI">Haiti</option>
                                        <option value="HMD">Heard Island and McDonald Islands</option>
                                        <option value="VAT">Holy See</option>
                                        <option value="HND">Honduras</option>
                                        <option value="HKG">Hong Kong</option>
                                        <option value="HUN">Hungary</option>
                                        <option value="ISL">Iceland</option>
                                        <option value="IND">India</option>
                                        <option value="IDN">Indonesia</option>
                                        <option value="IRN">Iran (Islamic Republic of)</option>
                                        <option value="IRQ">Iraq</option>
                                        <option value="IRL">Ireland</option>
                                        <option value="IMN">Isle of Man</option>
                                        <option value="ISR">Israel</option>
                                        <option value="ITA">Italy</option>
                                        <option value="JAM">Jamaica</option>
                                        <option value="JPN">Japan</option>
                                        <option value="JEY">Jersey</option>
                                        <option value="JOR">Jordan</option>
                                        <option value="KAZ">Kazakhstan</option>
                                        <option value="KEN">Kenya</option>
                                        <option value="KIR">Kiribati</option>
                                        <option value="PRK">Korea (Democratic People&#x27;s Republic of)</option>
                                        <option value="KOR">Korea (Republic of)</option>
                                        <option value="KWT">Kuwait</option>
                                        <option value="KGZ">Kyrgyzstan</option>
                                        <option value="LAO">Lao People&#x27;s Democratic Republic</option>
                                        <option value="LVA">Latvia</option>
                                        <option value="LBN">Lebanon</option>
                                        <option value="LSO">Lesotho</option>
                                        <option value="LBR">Liberia</option>
                                        <option value="LBY">Libya</option>
                                        <option value="LIE">Liechtenstein</option>
                                        <option value="LTU">Lithuania</option>
                                        <option value="LUX">Luxembourg</option>
                                        <option value="MAC">Macao</option>
                                        <option value="MDG">Madagascar</option>
                                        <option value="MWI">Malawi</option>
                                        <option value="MYS">Malaysia</option>
                                        <option value="MDV">Maldives</option>
                                        <option value="MLI">Mali</option>
                                        <option value="MLT">Malta</option>
                                        <option value="MHL">Marshall Islands</option>
                                        <option value="MTQ">Martinique</option>
                                        <option value="MRT">Mauritania</option>
                                        <option value="MUS">Mauritius</option>
                                        <option value="MYT">Mayotte</option>
                                        <option value="MEX">Mexico</option>
                                        <option value="FSM">Micronesia (Federated States of)</option>
                                        <option value="MDA">Moldova (Republic of)</option>
                                        <option value="MCO">Monaco</option>
                                        <option value="MNG">Mongolia</option>
                                        <option value="MNE">Montenegro</option>
                                        <option value="MSR">Montserrat</option>
                                        <option value="MAR">Morocco</option>
                                        <option value="MOZ">Mozambique</option>
                                        <option value="MMR">Myanmar</option>
                                        <option value="NAM">Namibia</option>
                                        <option value="NRU">Nauru</option>
                                        <option value="NPL">Nepal</option>
                                        <option value="NLD">Netherlands</option>
                                        <option value="NCL">New Caledonia</option>
                                        <option value="NZL">New Zealand</option>
                                        <option value="NIC">Nicaragua</option>
                                        <option value="NER">Niger</option>
                                        <option value="NGA">Nigeria</option>
                                        <option value="NIU">Niue</option>
                                        <option value="NFK">Norfolk Island</option>
                                        <option value="MKD">North Macedonia</option>
                                        <option value="NOR">Norway</option>
                                        <option value="OMN">Oman</option>
                                        <option value="PAK">Pakistan</option>
                                        <option value="PLW">Palau</option>
                                        <option value="PSE">Palestinian Territory, Occupied</option>
                                        <option value="PAN">Panama</option>
                                        <option value="PNG">Papua New Guinea</option>
                                        <option value="PRY">Paraguay</option>
                                        <option value="PER">Peru</option>
                                        <option value="PHL">Philippines</option>
                                        <option value="PCN">Pitcairn</option>
                                        <option value="POL">Poland</option>
                                        <option value="PRT">Portugal</option>
                                        <option value="QAT">Qatar</option>
                                        <option value="REU">R&#xE9;union</option>
                                        <option value="ROU">Romania</option>
                                        <option value="RUS">Russian Federation</option>
                                        <option value="RWA">Rwanda</option>
                                        <option value="BLM">Saint Barth&#xE9;lemy</option>
                                        <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KNA">Saint Kitts and Nevis</option>
                                        <option value="LCA">Saint Lucia</option>
                                        <option value="MAF">Saint Martin (French part)</option>
                                        <option value="SPM">Saint Pierre and Miquelon</option>
                                        <option value="VCT">Saint Vincent and the Grenadines</option>
                                        <option value="WSM">Samoa</option>
                                        <option value="SMR">San Marino</option>
                                        <option value="STP">Sao Tome and Principe</option>
                                        <option value="SAU">Saudi Arabia</option>
                                        <option value="SEN">Senegal</option>
                                        <option value="SRB">Serbia</option>
                                        <option value="SYC">Seychelles</option>
                                        <option value="SLE">Sierra Leone</option>
                                        <option value="SGP">Singapore</option>
                                        <option value="SXM">Sint Maarten (Dutch part)</option>
                                        <option value="SVK">Slovakia</option>
                                        <option value="SVN">Slovenia</option>
                                        <option value="SLB">Solomon Islands</option>
                                        <option value="SOM">Somalia</option>
                                        <option value="ZAF">South Africa</option>
                                        <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SSD">South Sudan</option>
                                        <option value="ESP">Spain</option>
                                        <option value="LKA">Sri Lanka</option>
                                        <option value="SDN">Sudan</option>
                                        <option value="SUR">Suriname</option>
                                        <option value="SJM">Svalbard and Jan Mayen</option>
                                        <option value="SWZ">Swaziland</option>
                                        <option value="SWE">Sweden</option>
                                        <option value="CHE">Switzerland</option>
                                        <option value="SYR">Syrian Arab Republic</option>
                                        <option value="TWN">Taiwan</option>
                                        <option value="TJK">Tajikistan</option>
                                        <option value="TZA">Tanzania, United Republic of</option>
                                        <option value="THA">Thailand</option>
                                        <option value="TLS">Timor-Leste</option>
                                        <option value="TGO">Togo</option>
                                        <option value="TKL">Tokelau</option>
                                        <option value="TON">Tonga</option>
                                        <option value="TTO">Trinidad and Tobago</option>
                                        <option value="TUN">Tunisia</option>
                                        <option value="TUR">Turkey</option>
                                        <option value="TKM">Turkmenistan</option>
                                        <option value="TCA">Turks and Caicos Islands</option>
                                        <option value="TUV">Tuvalu</option>
                                        <option value="UGA">Uganda</option>
                                        <option value="UKR">Ukraine</option>
                                        <option value="ARE">United Arab Emirates</option>
                                        <option value="GBR">United Kingdom</option>
                                        <option value="USA">United States of America</option>
                                        <option value="URY">Uruguay</option>
                                        <option value="UZB">Uzbekistan</option>
                                        <option value="VUT">Vanuatu</option>
                                        <option value="VEN">Venezuela (Bolivarian Republic of)</option>
                                        <option value="VNM">Viet Nam</option>
                                        <option value="VGB">Virgin Islands (British)</option>
                                        <option value="WLF">Wallis and Futuna</option>
                                        <option value="ESH">Western Sahara</option>
                                        <option value="YEM">Yemen</option>
                                        <option value="ZMB">Zambia</option>
                                        <option value="ZWE">Zimbabwe</option>
                                    </optgroup>
                                </select>
                                <div class="val-error" id="Subjects_0__CountryError"></div>
                            </fieldset>
                            <fieldset id="Subjects_0_StateField" class="noborder fieldset-contingent">
                                <label class="usa-label inline" for="Subjects_0__State">State: </label>
                                <select class="usa-select inline" aria-errormessage="Subjects_0__StateError" id="Subjects_0__State" name="Subjects[0].State">
                                    <option value="">[None/Unknown]</option>
                                    <optgroup label="">
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="GU">Guam</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                </select>
                                <div class="val-error" id="Subjects_0__StateError"></div>
                            </fieldset>
                            <fieldset class="noborder"><label class="usa-label inline" for="Subjects_0__ZipCode">Zip Code/Route: </label><input aria-errormessage="Subjects_0__ZipCode_error" class="usa-input inline" data-val="true" data-val-length="The Zip Code for subject #TNUM must be no longer than 20 characters." data-val-length-max="20" id="Subjects_0__ZipCode" maxlength="20" name="Subjects[0].ZipCode" type="text" value="" />
                                <div class="val-error" id="Subjects_0__ZipCode_error"></div>
                            </fieldset>
                            <fieldset class="noborder"><label class="usa-label inline" for="Subjects_0__Phone">Phone Number: </label><input type="tel" pattern="\d&#x2B;" class="usa-tooltip usa-input inline" data-position="right" data-classes="display-inline" title="Numbers only (1112223333)" data-field-type="Phone" aria-errormessage="Subjects_0__Phone_error" data-val="true" data-val-length="The Phone number for subject #TNUM must be no longer than 20 digits." data-val-length-max="20" data-val-regex="The Phone number for subject #TNUM must be digits only. (ex. 1112223333)" data-val-regex-pattern="\d&#x2B;" id="Subjects_0__Phone" maxlength="20" name="Subjects[0].Phone" value="" />
                                <div class="val-error" id="Subjects_0__Phone_error"></div>
                            </fieldset>
                            <fieldset class="noborder"><label class="usa-label inline" for="Subjects_0__Email">Email Address: </label><input type="email" class="usa-tooltip usa-input inline" data-position="right" data-classes="display-inline" title="Example: jdoe@email.com" data-field-type="Email" aria-errormessage="Subjects_0__Email_error" data-val="true" data-val-emailaddress="The Email Address for subject #TNUM must be a valid email address." data-val-length="The Email Address for subject #TNUM must be no longer than 50 characters." data-val-length-max="50" id="Subjects_0__Email" maxlength="50" name="Subjects[0].Email" value="" />
                                <div class="val-error" id="Subjects_0__Email_error"></div>
                            </fieldset>
                            <fieldset class="noborder label-sm"><label class="usa-label inline" for="Subjects_0__Website">Website/Social Media Account: </label><input inputmode="url" aria-errormessage="Subjects_0__Website_error" class="usa-input inline" data-val="true" data-val-length="The Website Address/Social Media Account for subject #TNUM must be no longer than 100 characters." data-val-length-max="100" id="Subjects_0__Website" maxlength="100" name="Subjects[0].Website" type="text" value="" />
                                <div class="val-error" id="Subjects_0__Website_error"></div>
                            </fieldset>
                            <fieldset class="noborder"><label class="usa-label inline" for="Subjects_0__IPAddress">IP Address: </label><input class="usa-tooltip usa-input inline" data-position="right" data-classes="display-inline" title="123.45.67.89 or 2001:abc::1234" pattern="(((((1\d|[1-9])?\d|2([0-4]\d|5[0-5]))\.){3}((1\d|[1-9])?\d|2([0-4]\d|5[0-5])))|((([0-9a-fA-F]{1,4}:){7,7}[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,7}:|([0-9a-fA-F]{1,4}:){1,6}:[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,5}(:[0-9a-fA-F]{1,4}){1,2}|([0-9a-fA-F]{1,4}:){1,4}(:[\da-fA-F]{1,4}){1,3}|([\da-fA-F]{1,4}:){1,3}(:[\da-fA-F]{1,4}){1,4}|([\da-fA-F]{1,4}:){1,2}(:[\da-fA-F]{1,4}){1,5}|[\da-fA-F]{1,4}:((:[\da-fA-F]{1,4}){1,6})|:((:[\da-fA-F]{1,4}){1,7}|:))))" aria-errormessage="Subjects_0__IPAddress_error" data-val="true" data-val-ipaddress="The IP Address for subject #TNUM must be a valid IP address. (ex. 1.2.3.4 or 1111:2222::FFFF)" data-val-length="The IP Address for subject #TNUM must be no longer than 39 characters." data-val-length-max="39" id="Subjects_0__IPAddress" maxlength="39" name="Subjects[0].IPAddress" type="text" value="" />
                                <div class="val-error" id="Subjects_0__IPAddress_error"></div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="display-flex flex-justify-end width-full">
                        <button class="usa-button margin-top-1" type="submit" formaction="AddSubject#step4">Add Subject</button>
                    </div>
                </div>
            </fieldset>
        </article>
        <article id="step5" class="form-step" data-step-num="5">
            <fieldset class="usa-fieldset">
                <legend class="text-semibold border-bottom font-sans-lg width-full usa-legend usa-label">Description of Incident</legend>
                <div class="usa-alert usa-alert--warning usa-alert--slim">
                    <div class="usa-alert__body">
                        <p class="margin-0 usa-alert__text">
                            Law enforcement or regulatory agencies may desire copies of pertinent documents or other evidence regarding your complaint. Originals should be retained for use by law enforcement agencies. <strong>It is not necessary to provide your evidence here.</strong>
                        </p>
                    </div>
                </div>
                <div class="usa-character-count padding-bottom-3">
                    <fieldset class="noborder width-full"><label class="usa-label" for="IncidentDescription"><abbr class="usa-hint--required" title="Required">*</abbr>Describe what happened in your own words. Provide any information you have yet to include in this complaint that may assist law enforcement in understanding what happened.</label><textarea required aria-describedby="IncidentDescriptionCount" class="usa-character-count__field usa-textarea" aria-errormessage="IncidentDescription_error" data-val="true" data-val-length="The Incident Description must be no longer than 3,500 characters." data-val-length-max="3500" data-val-required="Please provide an Incident Description." id="IncidentDescription" maxlength="3500" name="IncidentDescription"></textarea>
                        <div class="val-error" id="IncidentDescription_error"></div>
                    </fieldset>
                    <div id="IncidentDescriptionCount" class="usa-character-count__message margin-bottom-1">Please limit responses to 3,500 characters</div>
                </div>
            </fieldset>
        </article>
        <article id="step6" class="form-step" data-step-num="6">
            <fieldset class="usa-fieldset">
                <legend class="text-semibold border-bottom font-sans-lg width-full usa-legend usa-label">Other Information</legend>
                <div class="usa-character-count">
                    <fieldset class="noborder width-full"><label class="usa-label" for="EmailHeaders">Please provide any technical details regarding this incident. This can include email headers, cryptocurrency transaction metadata, ransomware hashes, etc.</label><textarea aria-describedby="EmailHeadersCount" class="usa-character-count__field usa-textarea" aria-errormessage="EmailHeaders_error" data-val="true" data-val-length="The Email Text and Headers must be no longer than 5,000 characters." data-val-length-max="5000" id="EmailHeaders" maxlength="5000" name="EmailHeaders"></textarea>
                        <div class="val-error" id="EmailHeaders_error"></div>
                    </fieldset>
                    <div id="EmailHeadersCount" class="usa-character-count__message margin-bottom-1">Please limit responses to 5,000 characters</div>
                </div>
                <div class="usa-character-count">
                    <fieldset class="noborder width-full"><label class="usa-label" for="Witnesses">Are there any other witnesses or persons affected by this incident?</label><textarea aria-describedby="WitnessesCount" class="usa-character-count__field usa-textarea" aria-errormessage="Witnesses_error" data-val="true" data-val-length="The Other Witnesses or Victims must be no longer than 1,000 characters." data-val-length-max="1000" id="Witnesses" maxlength="1000" name="Witnesses"></textarea>
                        <div class="val-error" id="Witnesses_error"></div>
                    </fieldset>
                    <div id="WitnessesCount" class="usa-character-count__message margin-bottom-1">Please limit responses to 1,000 characters</div>
                </div>
                <div class="usa-character-count">
                    <fieldset class="noborder width-full"><label class="usa-label" for="LawEnforcement">If you have reported this incident to other law enforcement or government agencies, please provide the name, phone number, email, date reported, report number, etc.</label><textarea aria-describedby="LawEnforcementCount" class="usa-character-count__field usa-textarea" aria-errormessage="LawEnforcement_error" data-val="true" data-val-length="The Other Law Enforcement or Agency Reports must be no longer than 1,000 characters." data-val-length-max="1000" id="LawEnforcement" maxlength="1000" name="LawEnforcement"></textarea>
                        <div class="val-error" id="LawEnforcement_error"></div>
                    </fieldset>
                    <div id="LawEnforcementCount" class="usa-character-count__message margin-bottom-1">Please limit responses to 1,000 characters</div>
                </div>
                <fieldset class="usa-fieldset margin-bottom-3">
                    <legend class="usa-legend usa-label">Is this an update to a previously filed complaint?</legend>
                    <div class="usa-radio"><input aria-errormessage="ComplaintUpdate_error" class="usa-radio__input" id="ComplaintUpdate_yes" name="ComplaintUpdate" type="radio" value="true" /><label class="usa-radio__label" for="ComplaintUpdate_yes">Yes</label><input aria-errormessage="ComplaintUpdate_error" class="usa-radio__input" id="ComplaintUpdate_no" name="ComplaintUpdate" type="radio" value="false" /><label class="usa-radio__label" for="ComplaintUpdate_no">No</label></div>
                    <div class="val-error" id="ComplaintUpdate_error"></div>
                </fieldset>
            </fieldset>
        </article>
        <article id="step7" class="form-step" data-step-num="7">
            <fieldset class="usa-fieldset">
                <legend class="text-semibold border-bottom font-sans-lg width-full usa-legend usa-label">Privacy & Signature</legend>
                <p class="text-bold">Read the following statement below, and confirm your agreement by typing your full name below in the box provided:</p>
                <p>The collection of information on this form is authorized by one or more of the following statutes: <cite>18 U.S.C. § 1028</cite> (false documents and identity theft); <cite>1028A</cite> (aggravated identity theft); <cite>18 U.S.C. § 1029</cite> (credit card fraud); <cite>18 U.S.C. § 1030</cite> (computer fraud); <cite>18 U.S.C. § 1343</cite> (wire fraud); <cite>18 U.S.C 2318B</cite> (counterfeit and illicit labels); <cite>18 U.S.C. § 2319</cite> (violation of intellectual property rights); <cite>28 U.S.C. § 533</cite> (FBI authorized to investigate violations of federal law for which it has primary investigative jurisdiction); and <cite>28 U.S.C. § 534</cite> (FBI authorized to collect and maintain identification, criminal information, crime, and other records).</p>
                <p>The collection of this information is relevant and necessary to document and investigate complaints of Internet-related crime. Submission of the information requested is voluntary; however, your failure to supply requested information may impede or preclude the investigation of your complaint by law enforcement agencies.</p>
                <p>The information collected is maintained in one or more of the following Privacy Act Systems of Records: the FBI Central Records System, Justice/FBI-002, notice of which was published in the Federal Register at <cite>63 Fed. Reg. 8671 (Feb. 20, 1998)</cite>; the FBI Data Warehouse System, DOJ/FBI-022, notice of which was published in the Federal Register at <cite>77 Fed. Reg. 40631 (July 10, 2012)</cite>. Descriptions of these systems may also be found at <a target="_blank" href="https://www.justice.gov/opcl/doj-systems-records#FBI">www.justice.gov/opcl/doj-systems-records#FBI</a>. The information collected may be disclosed in accordance with the routine uses referenced in those notices or as otherwise permitted by law. For example, in accordance with those routine uses, in certain circumstances, the FBI may disclose information from your complaint to appropriate criminal, civil, or regulatory law enforcement authorities (whether federal, state, local, territorial, tribal, foreign, or international). Information also may be disclosed as a routine use to an organization or individual in both the public or private sector if deemed necessary to elicit information or cooperation from the recipient for use by the FBI in the performance of an authorized activity. "An example would be where the activities of an individual are disclosed to a member of the public in order to elicit his/her assistance in [FBI's] apprehension or detection efforts." <cite>63 Fed. Reg. 8671, 8682 (February 20, 1998)</cite>.</p>
                <p class="text-bold">By typing my name below, I understand and agree that this form of electronic signature has the same legal force and effect as a manual signature. I affirm that the information I provided is true and accurate to the best of my knowledge. I understand that providing false information could make me subject to fine, imprisonment, or both. (Title 18, U.S.Code, Section 1001)</p>
                <fieldset class="noborder"><label class="usa-label inline" for="DigitalSignature"><abbr class="usa-hint--required" title="Required">*</abbr>Digital Signature: </label><input required aria-errormessage="DigitalSignature_error" class="usa-input inline" data-val="true" data-val-length="The Digital Signature must be no longer than 50 characters." data-val-length-max="50" data-val-required="Please provide a Digital Signature." id="DigitalSignature" maxlength="50" name="DigitalSignature" type="text" value="" />
                    <div class="val-error" id="DigitalSignature_error"></div>
                </fieldset>
                <div id="captcha" class="margin-y-1 display-flex flex-justify-center">

                    <div class="g-recaptcha" aria-errormessage="g-recaptcha-responseError" data-sitekey="6LfaXhUTAAAAAAvKw_sNVIyc7f7wmqPdxd6p1hO9"></div>


                    <div class="val-error" id="g-recaptcha-responseError"></div>
                </div>
                <div class="display-flex flex-justify-end">
                    <button class="usa-button" type="submit">Submit Complaint</button>
                </div>
            </fieldset>
        </article>
        <input name="COMPLAINT_SESSION" type="hidden" value="CfDJ8ApAv3mLQVVIr3Og8tcM06NmE01_MH-BxLEBS71TD0Gu_Xh5J8BgyX6x9r5YYH3UAxbP-2y-_0pw6rJ0PxhxYFmkYZY60flIFixNGiAnNsnB3-FZCIqCY-Id3vVS5dF6_67tRQoylJZyQdaODiICyO8" />
    </form>


</main>
<?php include "include/footer.php" ?>