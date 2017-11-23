<div class="modal fade" id="addProfileInfoModal" tabindex="-1" role="dialog" aria-labelledby="addProfileInfoLabel" aria-hidden="true">
    <div class="modal-dialog bg-navy wishy-rounded" role="document">
        <div class="modal-content bg-navy wishy-rounded">
            <div class="modal-header wishy-rounded-top bg-navy text-white">
                <h5 class="modal-title" id="addProfileInfoLabel">Add some details about you!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-navy text-white">
                <form class="mb-2" method="post" action="">
                    {{csrf_field()}}
                    <input type="hidden" name="category" value="detail">
                    <div class="form-group">
                        <label for="quote">Quote:</label>
                        <div class="col">
                            <input name="quote" type="text" class="form-control" id="quote" placeholder="Add quote" value="{{ isset($userDetail->quote) ? $userDetail->quote : '' }}">
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="country">Country:</label>
                        <select name="country" id="country">
                            <option value=""{{ isset($userDetail->gender) && $userDetail->country=='' ?  'selected="selected"' : '' }}></option>
                            <option value="Afghanistan"{{ isset($userDetail->gender) && $userDetail->country=='Afghanistan' ?  'selected="selected"' : '' }}>Afghanistan</option>
                            <option value="Åland Islands"{{ isset($userDetail->gender) && $userDetail->country=='Åland Islands' ?  'selected="selected"' : '' }}>Åland Islands</option>
                            <option value="Albania"{{ isset($userDetail->gender) && $userDetail->country=='Albania' ?  'selected="selected"' : '' }}>Albania</option>
                            <option value="Algeria"{{ isset($userDetail->gender) && $userDetail->country=='Algeria' ?  'selected="selected"' : '' }}>Algeria</option>
                            <option value="American Samoa"{{ isset($userDetail->gender) && $userDetail->country=='American Samoa' ?  'selected="selected"' : '' }}>American Samoa</option>
                            <option value="Andorra"{{ isset($userDetail->gender) && $userDetail->country=='Andorra' ?  'selected="selected"' : '' }}>Andorra</option>
                            <option value="Angola"{{ isset($userDetail->gender) && $userDetail->country=='Angola' ?  'selected="selected"' : '' }}>Angola</option>
                            <option value="Anguilla"{{ isset($userDetail->gender) && $userDetail->country=='Anguilla' ?  'selected="selected"' : '' }}>Anguilla</option>
                            <option value="Antarctica"{{ isset($userDetail->gender) && $userDetail->country=='Antarctica' ?  'selected="selected"' : '' }}>Antarctica</option>
                            <option value="Antigua and Barbuda"{{ isset($userDetail->gender) && $userDetail->country=='Antigua and Barbuda' ?  'selected="selected"' : '' }}>Antigua and Barbuda</option>
                            <option value="Argentina"{{ isset($userDetail->gender) && $userDetail->country=='Argentina' ?  'selected="selected"' : '' }}>Argentina</option>
                            <option value="Armenia"{{ isset($userDetail->gender) && $userDetail->country=='Armenia' ?  'selected="selected"' : '' }}>Armenia</option>
                            <option value="Aruba"{{ isset($userDetail->gender) && $userDetail->country=='Aruba' ?  'selected="selected"' : '' }}>Aruba</option>
                            <option value="Australia"{{ isset($userDetail->gender) && $userDetail->country=='Australia' ?  'selected="selected"' : '' }}>Australia</option>
                            <option value="Austria"{{ isset($userDetail->gender) && $userDetail->country=='Austria' ?  'selected="selected"' : '' }}>Austria</option>
                            <option value="Azerbaijan"{{ isset($userDetail->gender) && $userDetail->country=='Azerbaijan' ?  'selected="selected"' : '' }}>Azerbaijan</option>
                            <option value="Bahamas"{{ isset($userDetail->gender) && $userDetail->country=='Bahamas' ?  'selected="selected"' : '' }}>Bahamas</option>
                            <option value="Bahrain"{{ isset($userDetail->gender) && $userDetail->country=='Bahrain' ?  'selected="selected"' : '' }}>Bahrain</option>
                            <option value="Bangladesh"{{ isset($userDetail->gender) && $userDetail->country=='Bangladesh' ?  'selected="selected"' : '' }}>Bangladesh</option>
                            <option value="Barbados"{{ isset($userDetail->gender) && $userDetail->country=='Barbados' ?  'selected="selected"' : '' }}>Barbados</option>
                            <option value="Belarus"{{ isset($userDetail->gender) && $userDetail->country=='Belarus' ?  'selected="selected"' : '' }}>Belarus</option>
                            <option value="Belgium"{{ isset($userDetail->gender) && $userDetail->country=='Belgium' ?  'selected="selected"' : '' }}>Belgium</option>
                            <option value="Belize"{{ isset($userDetail->gender) && $userDetail->country=='Belize' ?  'selected="selected"' : '' }}>Belize</option>
                            <option value="Benin"{{ isset($userDetail->gender) && $userDetail->country=='Benin' ?  'selected="selected"' : '' }}>Benin</option>
                            <option value="Bermuda"{{ isset($userDetail->gender) && $userDetail->country=='Bermuda' ?  'selected="selected"' : '' }}>Bermuda</option>
                            <option value="Bhutan"{{ isset($userDetail->gender) && $userDetail->country=='Bhutan' ?  'selected="selected"' : '' }}>Bhutan</option>
                            <option value="Bolivia, Plurinational State of"{{ isset($userDetail->gender) && $userDetail->country=='Bolivia, Plurinational State of' ?  'selected="selected"' : '' }}>Bolivia, Plurinational State of</option>
                            <option value="Bonaire, Sint Eustatius and Saba"{{ isset($userDetail->gender) && $userDetail->country=='Bonaire, Sint Eustatius and Saba' ?  'selected="selected"' : '' }}>Bonaire, Sint Eustatius and Saba</option>
                            <option value="Bosnia and Herzegovina"{{ isset($userDetail->gender) && $userDetail->country=='Bosnia and Herzegovina' ?  'selected="selected"' : '' }}>Bosnia and Herzegovina</option>
                            <option value="Botswana"{{ isset($userDetail->gender) && $userDetail->country=='Botswana' ?  'selected="selected"' : '' }}>Botswana</option>
                            <option value="Bouvet Island"{{ isset($userDetail->gender) && $userDetail->country=='Bouvet Island' ?  'selected="selected"' : '' }}>Bouvet Island</option>
                            <option value="Brazil"{{ isset($userDetail->gender) && $userDetail->country=='Brazil' ?  'selected="selected"' : '' }}>Brazil</option>
                            <option value="British Indian Ocean Territory"{{ isset($userDetail->gender) && $userDetail->country=='British Indian Ocean Territory' ?  'selected="selected"' : '' }}>British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam"{{ isset($userDetail->gender) && $userDetail->country=='Brunei Darussalam' ?  'selected="selected"' : '' }}>Brunei Darussalam</option>
                            <option value="Bulgaria"{{ isset($userDetail->gender) && $userDetail->country=='Bulgaria' ?  'selected="selected"' : '' }}>Bulgaria</option>
                            <option value="Burkina Faso"{{ isset($userDetail->gender) && $userDetail->country=='Burkina Faso' ?  'selected="selected"' : '' }}>Burkina Faso</option>
                            <option value="Burundi"{{ isset($userDetail->gender) && $userDetail->country=='Burundi' ?  'selected="selected"' : '' }}>Burundi</option>
                            <option value="Cambodia"{{ isset($userDetail->gender) && $userDetail->country=='Cambodia' ?  'selected="selected"' : '' }}>Cambodia</option>
                            <option value="Cameroon"{{ isset($userDetail->gender) && $userDetail->country=='Cameroon' ?  'selected="selected"' : '' }}>Cameroon</option>
                            <option value="Canada"{{ isset($userDetail->gender) && $userDetail->country=='Canada' ?  'selected="selected"' : '' }}>Canada</option>
                            <option value="Cape Verde"{{ isset($userDetail->gender) && $userDetail->country=='Cape Verde' ?  'selected="selected"' : '' }}>Cape Verde</option>
                            <option value="Cayman Islands"{{ isset($userDetail->gender) && $userDetail->country=='Cayman Islands' ?  'selected="selected"' : '' }}>Cayman Islands</option>
                            <option value="Central African Republic"{{ isset($userDetail->gender) && $userDetail->country=='Central African Republic' ?  'selected="selected"' : '' }}>Central African Republic</option>
                            <option value="Chad"{{ isset($userDetail->gender) && $userDetail->country=='Chad' ?  'selected="selected"' : '' }}>Chad</option>
                            <option value="Chile"{{ isset($userDetail->gender) && $userDetail->country=='Chile' ?  'selected="selected"' : '' }}>Chile</option>
                            <option value="China"{{ isset($userDetail->gender) && $userDetail->country=='China' ?  'selected="selected"' : '' }}>China</option>
                            <option value="Christmas Island"{{ isset($userDetail->gender) && $userDetail->country=='Christmas Island' ?  'selected="selected"' : '' }}>Christmas Island</option>
                            <option value="Cocos (Keeling) Islands"{{ isset($userDetail->gender) && $userDetail->country=='Cocos (Keeling) Islands' ?  'selected="selected"' : '' }}>Cocos (Keeling) Islands</option>
                            <option value="Colombia"{{ isset($userDetail->gender) && $userDetail->country=='Colombia' ?  'selected="selected"' : '' }}>Colombia</option>
                            <option value="Comoros"{{ isset($userDetail->gender) && $userDetail->country=='Comoros' ?  'selected="selected"' : '' }}>Comoros</option>
                            <option value="Congo"{{ isset($userDetail->gender) && $userDetail->country=='Congo' ?  'selected="selected"' : '' }}>Congo</option>
                            <option value="Congo, the Democratic Republic of the"{{ isset($userDetail->gender) && $userDetail->country=='Congo, the Democratic Republic of the' ?  'selected="selected"' : '' }}>Congo, the Democratic Republic of the</option>
                            <option value="Cook Islands"{{ isset($userDetail->gender) && $userDetail->country=='Cook Islands' ?  'selected="selected"' : '' }}>Cook Islands</option>
                            <option value="Costa Rica"{{ isset($userDetail->gender) && $userDetail->country=='Costa Rica' ?  'selected="selected"' : '' }}>Costa Rica</option>
                            <option value="Côte d'Ivoire"{{ isset($userDetail->gender) && $userDetail->country=='Côte d\'Ivoire' ?  'selected="selected"' : '' }}>Côte d'Ivoire</option>
                            <option value="Croatia"{{ isset($userDetail->gender) && $userDetail->country=='Croatia' ?  'selected="selected"' : '' }}>Croatia</option>
                            <option value="Cuba"{{ isset($userDetail->gender) && $userDetail->country=='Cuba' ?  'selected="selected"' : '' }}>Cuba</option>
                            <option value="Curaçao"{{ isset($userDetail->gender) && $userDetail->country=='Curaçao' ?  'selected="selected"' : '' }}>Curaçao</option>
                            <option value="Cyprus"{{ isset($userDetail->gender) && $userDetail->country=='Cyprus' ?  'selected="selected"' : '' }}>Cyprus</option>
                            <option value="Czech Republic"{{ isset($userDetail->gender) && $userDetail->country=='Czech Republic' ?  'selected="selected"' : '' }}>Czech Republic</option>
                            <option value="Denmark"{{ isset($userDetail->gender) && $userDetail->country=='Denmark' ?  'selected="selected"' : '' }}>Denmark</option>
                            <option value="Djibouti"{{ isset($userDetail->gender) && $userDetail->country=='Djibouti' ?  'selected="selected"' : '' }}>Djibouti</option>
                            <option value="Dominica"{{ isset($userDetail->gender) && $userDetail->country=='Dominica' ?  'selected="selected"' : '' }}>Dominica</option>
                            <option value="Dominican Republic"{{ isset($userDetail->gender) && $userDetail->country=='Dominican Republic' ?  'selected="selected"' : '' }}>Dominican Republic</option>
                            <option value="Ecuador"{{ isset($userDetail->gender) && $userDetail->country=='Ecuador' ?  'selected="selected"' : '' }}>Ecuador</option>
                            <option value="Egypt"{{ isset($userDetail->gender) && $userDetail->country=='Egypt' ?  'selected="selected"' : '' }}>Egypt</option>
                            <option value="El Salvador"{{ isset($userDetail->gender) && $userDetail->country=='El Salvador' ?  'selected="selected"' : '' }}>El Salvador</option>
                            <option value="Equatorial Guinea"{{ isset($userDetail->gender) && $userDetail->country=='Equatorial Guinea' ?  'selected="selected"' : '' }}>Equatorial Guinea</option>
                            <option value="Eritrea"{{ isset($userDetail->gender) && $userDetail->country=='Eritrea' ?  'selected="selected"' : '' }}>Eritrea</option>
                            <option value="Estonia"{{ isset($userDetail->gender) && $userDetail->country=='Estonia' ?  'selected="selected"' : '' }}>Estonia</option>
                            <option value="Ethiopia"{{ isset($userDetail->gender) && $userDetail->country=='Ethiopia' ?  'selected="selected"' : '' }}>Ethiopia</option>
                            <option value="Falkland Islands (Malvinas"{{ isset($userDetail->gender) && $userDetail->country=='Falkland Islands (Malvinas' ?  'selected="selected"' : '' }}>Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands"{{ isset($userDetail->gender) && $userDetail->country=='Faroe Islands' ?  'selected="selected"' : '' }}>Faroe Islands</option>
                            <option value="Fiji"{{ isset($userDetail->gender) && $userDetail->country=='Fiji' ?  'selected="selected"' : '' }}>Fiji</option>
                            <option value="Finland"{{ isset($userDetail->gender) && $userDetail->country=='Finland' ?  'selected="selected"' : '' }}>Finland</option>
                            <option value="France"{{ isset($userDetail->gender) && $userDetail->country=='France' ?  'selected="selected"' : '' }}>France</option>
                            <option value="French Guiana"{{ isset($userDetail->gender) && $userDetail->country=='French Guiana' ?  'selected="selected"' : '' }}>French Guiana</option>
                            <option value="French Polynesia"{{ isset($userDetail->gender) && $userDetail->country=='French Polynesia' ?  'selected="selected"' : '' }}>French Polynesia</option>
                            <option value="French Southern Territories"{{ isset($userDetail->gender) && $userDetail->country=='French Southern Territories' ?  'selected="selected"' : '' }}>French Southern Territories</option>
                            <option value="Gabon"{{ isset($userDetail->gender) && $userDetail->country=='Gabon' ?  'selected="selected"' : '' }}>Gabon</option>
                            <option value="Gambia"{{ isset($userDetail->gender) && $userDetail->country=='Gambia' ?  'selected="selected"' : '' }}>Gambia</option>
                            <option value="Georgia"{{ isset($userDetail->gender) && $userDetail->country=='Georgia' ?  'selected="selected"' : '' }}>Georgia</option>
                            <option value="Germany"{{ isset($userDetail->gender) && $userDetail->country=='Germany' ?  'selected="selected"' : '' }}>Germany</option>
                            <option value="Ghana"{{ isset($userDetail->gender) && $userDetail->country=='Ghana' ?  'selected="selected"' : '' }}>Ghana</option>
                            <option value="Gibraltar"{{ isset($userDetail->gender) && $userDetail->country=='Gibraltar' ?  'selected="selected"' : '' }}>Gibraltar</option>
                            <option value="Greece"{{ isset($userDetail->gender) && $userDetail->country=='Greece' ?  'selected="selected"' : '' }}>Greece</option>
                            <option value="Greenland"{{ isset($userDetail->gender) && $userDetail->country=='Greenland' ?  'selected="selected"' : '' }}>Greenland</option>
                            <option value="Grenada"{{ isset($userDetail->gender) && $userDetail->country=='Grenada' ?  'selected="selected"' : '' }}>Grenada</option>
                            <option value="Guadeloupe"{{ isset($userDetail->gender) && $userDetail->country=='Guadeloupe' ?  'selected="selected"' : '' }}>Guadeloupe</option>
                            <option value="Guam"{{ isset($userDetail->gender) && $userDetail->country=='Guam' ?  'selected="selected"' : '' }}>Guam</option>
                            <option value="Guatemala"{{ isset($userDetail->gender) && $userDetail->country=='Guatemala' ?  'selected="selected"' : '' }}>Guatemala</option>
                            <option value="Guernsey"{{ isset($userDetail->gender) && $userDetail->country=='Guernsey' ?  'selected="selected"' : '' }}>Guernsey</option>
                            <option value="Guinea"{{ isset($userDetail->gender) && $userDetail->country=='Guinea' ?  'selected="selected"' : '' }}>Guinea</option>
                            <option value="Guinea-Bissau"{{ isset($userDetail->gender) && $userDetail->country=='Guinea-Bissau' ?  'selected="selected"' : '' }}>Guinea-Bissau</option>
                            <option value="Guyana"{{ isset($userDetail->gender) && $userDetail->country=='Guyana' ?  'selected="selected"' : '' }}>Guyana</option>
                            <option value="Haiti"{{ isset($userDetail->gender) && $userDetail->country=='Haiti' ?  'selected="selected"' : '' }}>Haiti</option>
                            <option value="Heard Island and McDonald Islands"{{ isset($userDetail->gender) && $userDetail->country=='Heard Island and McDonald Islands' ?  'selected="selected"' : '' }}>Heard Island and McDonald Islands</option>
                            <option value="Holy See (Vatican City State"{{ isset($userDetail->gender) && $userDetail->country=='Holy See (Vatican City State' ?  'selected="selected"' : '' }}>Holy See (Vatican City State)</option>
                            <option value="Honduras"{{ isset($userDetail->gender) && $userDetail->country=='Honduras' ?  'selected="selected"' : '' }}>Honduras</option>
                            <option value="Hong Kong"{{ isset($userDetail->gender) && $userDetail->country=='Hong Kong' ?  'selected="selected"' : '' }}>Hong Kong</option>
                            <option value="Hungary"{{ isset($userDetail->gender) && $userDetail->country=='Hungary' ?  'selected="selected"' : '' }}>Hungary</option>
                            <option value="Iceland"{{ isset($userDetail->gender) && $userDetail->country=='Iceland' ?  'selected="selected"' : '' }}>Iceland</option>
                            <option value="India"{{ isset($userDetail->gender) && $userDetail->country=='India' ?  'selected="selected"' : '' }}>India</option>
                            <option value="Indonesia"{{ isset($userDetail->gender) && $userDetail->country=='Indonesia' ?  'selected="selected"' : '' }}>Indonesia</option>
                            <option value="Iran, Islamic Republic of"{{ isset($userDetail->gender) && $userDetail->country=='Iran, Islamic Republic of' ?  'selected="selected"' : '' }}>Iran, Islamic Republic of</option>
                            <option value="Iraq"{{ isset($userDetail->gender) && $userDetail->country=='Iraq' ?  'selected="selected"' : '' }}>Iraq</option>
                            <option value="Ireland"{{ isset($userDetail->gender) && $userDetail->country=='Ireland' ?  'selected="selected"' : '' }}>Ireland</option>
                            <option value="Isle of Man"{{ isset($userDetail->gender) && $userDetail->country=='Isle of Man' ?  'selected="selected"' : '' }}>Isle of Man</option>
                            <option value="Israel"{{ isset($userDetail->gender) && $userDetail->country=='Israel' ?  'selected="selected"' : '' }}>Israel</option>
                            <option value="Italy"{{ isset($userDetail->gender) && $userDetail->country=='Italy' ?  'selected="selected"' : '' }}>Italy</option>
                            <option value="Jamaica"{{ isset($userDetail->gender) && $userDetail->country=='Jamaica' ?  'selected="selected"' : '' }}>Jamaica</option>
                            <option value="Japan"{{ isset($userDetail->gender) && $userDetail->country=='Japan' ?  'selected="selected"' : '' }}>Japan</option>
                            <option value="Jersey"{{ isset($userDetail->gender) && $userDetail->country=='Jersey' ?  'selected="selected"' : '' }}>Jersey</option>
                            <option value="Jordan"{{ isset($userDetail->gender) && $userDetail->country=='Jordan' ?  'selected="selected"' : '' }}>Jordan</option>
                            <option value="Kazakhstan"{{ isset($userDetail->gender) && $userDetail->country=='Kazakhstan' ?  'selected="selected"' : '' }}>Kazakhstan</option>
                            <option value="Kenya"{{ isset($userDetail->gender) && $userDetail->country=='Kenya' ?  'selected="selected"' : '' }}>Kenya</option>
                            <option value="Kiribati"{{ isset($userDetail->gender) && $userDetail->country=='Kiribati' ?  'selected="selected"' : '' }}>Kiribati</option>
                            <option value="Korea, Democratic People's Republic of"{{ isset($userDetail->gender) && $userDetail->country=='Korea, Democratic People\'s Republic of' ?  'selected="selected"' : '' }}>Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of"{{ isset($userDetail->gender) && $userDetail->country=='Korea, Republic of' ?  'selected="selected"' : '' }}>Korea, Republic of</option>
                            <option value="Kuwait"{{ isset($userDetail->gender) && $userDetail->country=='Kuwait' ?  'selected="selected"' : '' }}>Kuwait</option>
                            <option value="Kyrgyzstan"{{ isset($userDetail->gender) && $userDetail->country=='Kyrgyzstan' ?  'selected="selected"' : '' }}>Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic"{{ isset($userDetail->gender) && $userDetail->country=='Lao People\'s Democratic Republic' ?  'selected="selected"' : '' }}>Lao People's Democratic Republic</option>
                            <option value="Latvia"{{ isset($userDetail->gender) && $userDetail->country=='Latvia' ?  'selected="selected"' : '' }}>Latvia</option>
                            <option value="Lebanon"{{ isset($userDetail->gender) && $userDetail->country=='Lebanon' ?  'selected="selected"' : '' }}>Lebanon</option>
                            <option value="Lesotho"{{ isset($userDetail->gender) && $userDetail->country=='Lesotho' ?  'selected="selected"' : '' }}>Lesotho</option>
                            <option value="Liberia"{{ isset($userDetail->gender) && $userDetail->country=='Liberia' ?  'selected="selected"' : '' }}>Liberia</option>
                            <option value="Libya"{{ isset($userDetail->gender) && $userDetail->country=='Libya' ?  'selected="selected"' : '' }}>Libya</option>
                            <option value="Liechtenstein"{{ isset($userDetail->gender) && $userDetail->country=='Liechtenstein' ?  'selected="selected"' : '' }}>Liechtenstein</option>
                            <option value="Lithuania"{{ isset($userDetail->gender) && $userDetail->country=='Lithuania' ?  'selected="selected"' : '' }}>Lithuania</option>
                            <option value="Luxembourg"{{ isset($userDetail->gender) && $userDetail->country=='Luxembourg' ?  'selected="selected"' : '' }}>Luxembourg</option>
                            <option value="Macao"{{ isset($userDetail->gender) && $userDetail->country=='Macao' ?  'selected="selected"' : '' }}>Macao</option>
                            <option value="Macedonia, the former Yugoslav Republic of"{{ isset($userDetail->gender) && $userDetail->country=='Macedonia, the former Yugoslav Republic of' ?  'selected="selected"' : '' }}>Macedonia, the former Yugoslav Republic of</option>
                            <option value="Madagascar"{{ isset($userDetail->gender) && $userDetail->country=='Madagascar' ?  'selected="selected"' : '' }}>Madagascar</option>
                            <option value="Malawi"{{ isset($userDetail->gender) && $userDetail->country=='Malawi' ?  'selected="selected"' : '' }}>Malawi</option>
                            <option value="Malaysia"{{ isset($userDetail->gender) && $userDetail->country=='Malaysia' ?  'selected="selected"' : '' }}>Malaysia</option>
                            <option value="Maldives"{{ isset($userDetail->gender) && $userDetail->country=='Maldives' ?  'selected="selected"' : '' }}>Maldives</option>
                            <option value="Mali"{{ isset($userDetail->gender) && $userDetail->country=='Mali' ?  'selected="selected"' : '' }}>Mali</option>
                            <option value="Malta"{{ isset($userDetail->gender) && $userDetail->country=='Malta' ?  'selected="selected"' : '' }}>Malta</option>
                            <option value="Marshall Islands"{{ isset($userDetail->gender) && $userDetail->country=='Marshall Islands' ?  'selected="selected"' : '' }}>Marshall Islands</option>
                            <option value="Martinique"{{ isset($userDetail->gender) && $userDetail->country=='Martinique' ?  'selected="selected"' : '' }}>Martinique</option>
                            <option value="Mauritania"{{ isset($userDetail->gender) && $userDetail->country=='Mauritania' ?  'selected="selected"' : '' }}>Mauritania</option>
                            <option value="Mauritius"{{ isset($userDetail->gender) && $userDetail->country=='Mauritius' ?  'selected="selected"' : '' }}>Mauritius</option>
                            <option value="Mayotte"{{ isset($userDetail->gender) && $userDetail->country=='Mayotte' ?  'selected="selected"' : '' }}>Mayotte</option>
                            <option value="Mexico"{{ isset($userDetail->gender) && $userDetail->country=='Mexico' ?  'selected="selected"' : '' }}>Mexico</option>
                            <option value="Micronesia, Federated States of"{{ isset($userDetail->gender) && $userDetail->country=='Micronesia, Federated States of' ?  'selected="selected"' : '' }}>Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of"{{ isset($userDetail->gender) && $userDetail->country=='Moldova, Republic of' ?  'selected="selected"' : '' }}>Moldova, Republic of</option>
                            <option value="Monaco"{{ isset($userDetail->gender) && $userDetail->country=='Monaco' ?  'selected="selected"' : '' }}>Monaco</option>
                            <option value="Mongolia"{{ isset($userDetail->gender) && $userDetail->country=='Mongolia' ?  'selected="selected"' : '' }}>Mongolia</option>
                            <option value="Montenegro"{{ isset($userDetail->gender) && $userDetail->country=='Montenegro' ?  'selected="selected"' : '' }}>Montenegro</option>
                            <option value="Montserrat"{{ isset($userDetail->gender) && $userDetail->country=='Montserrat' ?  'selected="selected"' : '' }}>Montserrat</option>
                            <option value="Morocco"{{ isset($userDetail->gender) && $userDetail->country=='Morocco' ?  'selected="selected"' : '' }}>Morocco</option>
                            <option value="Mozambique"{{ isset($userDetail->gender) && $userDetail->country=='Mozambique' ?  'selected="selected"' : '' }}>Mozambique</option>
                            <option value="Myanmar"{{ isset($userDetail->gender) && $userDetail->country=='Myanmar' ?  'selected="selected"' : '' }}>Myanmar</option>
                            <option value="Namibia"{{ isset($userDetail->gender) && $userDetail->country=='Namibia' ?  'selected="selected"' : '' }}>Namibia</option>
                            <option value="Nauru"{{ isset($userDetail->gender) && $userDetail->country=='Nauru' ?  'selected="selected"' : '' }}>Nauru</option>
                            <option value="Nepal"{{ isset($userDetail->gender) && $userDetail->country=='Nepal' ?  'selected="selected"' : '' }}>Nepal</option>
                            <option value="Netherlands"{{ isset($userDetail->gender) && $userDetail->country=='Netherlands' ?  'selected="selected"' : '' }}>Netherlands</option>
                            <option value="New Caledonia"{{ isset($userDetail->gender) && $userDetail->country=='New Caledonia' ?  'selected="selected"' : '' }}>New Caledonia</option>
                            <option value="New Zealand"{{ isset($userDetail->gender) && $userDetail->country=='New Zealand' ?  'selected="selected"' : '' }}>New Zealand</option>
                            <option value="Nicaragua"{{ isset($userDetail->gender) && $userDetail->country=='Nicaragua' ?  'selected="selected"' : '' }}>Nicaragua</option>
                            <option value="Niger"{{ isset($userDetail->gender) && $userDetail->country=='Niger' ?  'selected="selected"' : '' }}>Niger</option>
                            <option value="Nigeria"{{ isset($userDetail->gender) && $userDetail->country=='Nigeria' ?  'selected="selected"' : '' }}>Nigeria</option>
                            <option value="Niue"{{ isset($userDetail->gender) && $userDetail->country=='Niue' ?  'selected="selected"' : '' }}>Niue</option>
                            <option value="Norfolk Island"{{ isset($userDetail->gender) && $userDetail->country=='Norfolk Island' ?  'selected="selected"' : '' }}>Norfolk Island</option>
                            <option value="Northern Mariana Islands"{{ isset($userDetail->gender) && $userDetail->country=='Northern Mariana Islands' ?  'selected="selected"' : '' }}>Northern Mariana Islands</option>
                            <option value="Norway"{{ isset($userDetail->gender) && $userDetail->country=='Norway' ?  'selected="selected"' : '' }}>Norway</option>
                            <option value="Oman"{{ isset($userDetail->gender) && $userDetail->country=='Oman' ?  'selected="selected"' : '' }}>Oman</option>
                            <option value="Pakistan"{{ isset($userDetail->gender) && $userDetail->country=='Pakistan' ?  'selected="selected"' : '' }}>Pakistan</option>
                            <option value="Palau"{{ isset($userDetail->gender) && $userDetail->country=='Palau' ?  'selected="selected"' : '' }}>Palau</option>
                            <option value="Palestinian Territory, Occupied"{{ isset($userDetail->gender) && $userDetail->country=='Palestinian Territory, Occupied' ?  'selected="selected"' : '' }}>Palestinian Territory, Occupied</option>
                            <option value="Panama"{{ isset($userDetail->gender) && $userDetail->country=='Panama' ?  'selected="selected"' : '' }}>Panama</option>
                            <option value="Papua New Guinea"{{ isset($userDetail->gender) && $userDetail->country=='Papua New Guinea' ?  'selected="selected"' : '' }}>Papua New Guinea</option>
                            <option value="Paraguay"{{ isset($userDetail->gender) && $userDetail->country=='Paraguay' ?  'selected="selected"' : '' }}>Paraguay</option>
                            <option value="Peru"{{ isset($userDetail->gender) && $userDetail->country=='Peru' ?  'selected="selected"' : '' }}>Peru</option>
                            <option value="Philippines"{{ isset($userDetail->gender) && $userDetail->country=='Philippines' ?  'selected="selected"' : '' }}>Philippines</option>
                            <option value="Pitcairn"{{ isset($userDetail->gender) && $userDetail->country=='Pitcairn' ?  'selected="selected"' : '' }}>Pitcairn</option>
                            <option value="Poland"{{ isset($userDetail->gender) && $userDetail->country=='Poland' ?  'selected="selected"' : '' }}>Poland</option>
                            <option value="Portugal"{{ isset($userDetail->gender) && $userDetail->country=='Portugal' ?  'selected="selected"' : '' }}>Portugal</option>
                            <option value="Puerto Rico"{{ isset($userDetail->gender) && $userDetail->country=='Puerto Rico' ?  'selected="selected"' : '' }}>Puerto Rico</option>
                            <option value="Qatar"{{ isset($userDetail->gender) && $userDetail->country=='Qatar' ?  'selected="selected"' : '' }}>Qatar</option>
                            <option value="Réunion"{{ isset($userDetail->gender) && $userDetail->country=='Réunion' ?  'selected="selected"' : '' }}>Réunion</option>
                            <option value="Romania"{{ isset($userDetail->gender) && $userDetail->country=='Romania' ?  'selected="selected"' : '' }}>Romania</option>
                            <option value="Russian Federation"{{ isset($userDetail->gender) && $userDetail->country=='Russian Federation' ?  'selected="selected"' : '' }}>Russian Federation</option>
                            <option value="Rwanda"{{ isset($userDetail->gender) && $userDetail->country=='Rwanda' ?  'selected="selected"' : '' }}>Rwanda</option>
                            <option value="Saint Barthélemy"{{ isset($userDetail->gender) && $userDetail->country=='Saint Barthélemy' ?  'selected="selected"' : '' }}>Saint Barthélemy</option>
                            <option value="Saint Helena, Ascension and Tristan da Cunha"{{ isset($userDetail->gender) && $userDetail->country=='Saint Helena, Ascension and Tristan da Cunha' ?  'selected="selected"' : '' }}>Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="Saint Kitts and Nevis"{{ isset($userDetail->gender) && $userDetail->country=='Saint Kitts and Nevis' ?  'selected="selected"' : '' }}>Saint Kitts and Nevis</option>
                            <option value="Saint Lucia"{{ isset($userDetail->gender) && $userDetail->country=='Saint Lucia' ?  'selected="selected"' : '' }}>Saint Lucia</option>
                            <option value="Saint Martin (French part"{{ isset($userDetail->gender) && $userDetail->country=='Saint Martin (French part' ?  'selected="selected"' : '' }}>Saint Martin (French part)</option>
                            <option value="Saint Pierre and Miquelon"{{ isset($userDetail->gender) && $userDetail->country=='Saint Pierre and Miquelon' ?  'selected="selected"' : '' }}>Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and the Grenadines"{{ isset($userDetail->gender) && $userDetail->country=='Saint Vincent and the Grenadines' ?  'selected="selected"' : '' }}>Saint Vincent and the Grenadines</option>
                            <option value="Samoa"{{ isset($userDetail->gender) && $userDetail->country=='Samoa' ?  'selected="selected"' : '' }}>Samoa</option>
                            <option value="San Marino"{{ isset($userDetail->gender) && $userDetail->country=='San Marino' ?  'selected="selected"' : '' }}>San Marino</option>
                            <option value="Sao Tome and Principe"{{ isset($userDetail->gender) && $userDetail->country=='Sao Tome and Principe' ?  'selected="selected"' : '' }}>Sao Tome and Principe</option>
                            <option value="Saudi Arabia"{{ isset($userDetail->gender) && $userDetail->country=='Saudi Arabia' ?  'selected="selected"' : '' }}>Saudi Arabia</option>
                            <option value="Senegal"{{ isset($userDetail->gender) && $userDetail->country=='Senegal' ?  'selected="selected"' : '' }}>Senegal</option>
                            <option value="Serbia"{{ isset($userDetail->gender) && $userDetail->country=='Serbia' ?  'selected="selected"' : '' }}>Serbia</option>
                            <option value="Seychelles"{{ isset($userDetail->gender) && $userDetail->country=='Seychelles' ?  'selected="selected"' : '' }}>Seychelles</option>
                            <option value="Sierra Leone"{{ isset($userDetail->gender) && $userDetail->country=='Sierra Leone' ?  'selected="selected"' : '' }}>Sierra Leone</option>
                            <option value="Singapore"{{ isset($userDetail->gender) && $userDetail->country=='Singapore' ?  'selected="selected"' : '' }}>Singapore</option>
                            <option value="Sint Maarten (Dutch part"{{ isset($userDetail->gender) && $userDetail->country=='Sint Maarten (Dutch part' ?  'selected="selected"' : '' }}>Sint Maarten (Dutch part)</option>
                            <option value="Slovakia"{{ isset($userDetail->gender) && $userDetail->country=='Slovakia' ?  'selected="selected"' : '' }}>Slovakia</option>
                            <option value="Slovenia"{{ isset($userDetail->gender) && $userDetail->country=='Slovenia' ?  'selected="selected"' : '' }}>Slovenia</option>
                            <option value="Solomon Islands"{{ isset($userDetail->gender) && $userDetail->country=='Solomon Islands' ?  'selected="selected"' : '' }}>Solomon Islands</option>
                            <option value="Somalia"{{ isset($userDetail->gender) && $userDetail->country=='Somalia' ?  'selected="selected"' : '' }}>Somalia</option>
                            <option value="South Africa"{{ isset($userDetail->gender) && $userDetail->country=='South Africa' ?  'selected="selected"' : '' }}>South Africa</option>
                            <option value="South Georgia and the South Sandwich Islands"{{ isset($userDetail->gender) && $userDetail->country=='South Georgia and the South Sandwich Islands' ?  'selected="selected"' : '' }}>South Georgia and the South Sandwich Islands</option>
                            <option value="South Sudan"{{ isset($userDetail->gender) && $userDetail->country=='South Sudan' ?  'selected="selected"' : '' }}>South Sudan</option>
                            <option value="Spain"{{ isset($userDetail->gender) && $userDetail->country=='Spain' ?  'selected="selected"' : '' }}>Spain</option>
                            <option value="Sri Lanka"{{ isset($userDetail->gender) && $userDetail->country=='Sri Lanka' ?  'selected="selected"' : '' }}>Sri Lanka</option>
                            <option value="Sudan"{{ isset($userDetail->gender) && $userDetail->country=='Sudan' ?  'selected="selected"' : '' }}>Sudan</option>
                            <option value="Suriname"{{ isset($userDetail->gender) && $userDetail->country=='Suriname' ?  'selected="selected"' : '' }}>Suriname</option>
                            <option value="Svalbard and Jan Mayen"{{ isset($userDetail->gender) && $userDetail->country=='Svalbard and Jan Mayen' ?  'selected="selected"' : '' }}>Svalbard and Jan Mayen</option>
                            <option value="Swaziland"{{ isset($userDetail->gender) && $userDetail->country=='Swaziland' ?  'selected="selected"' : '' }}>Swaziland</option>
                            <option value="Sweden"{{ isset($userDetail->gender) && $userDetail->country=='Sweden' ?  'selected="selected"' : '' }}>Sweden</option>
                            <option value="Switzerland"{{ isset($userDetail->gender) && $userDetail->country=='Switzerland' ?  'selected="selected"' : '' }}>Switzerland</option>
                            <option value="Syrian Arab Republic"{{ isset($userDetail->gender) && $userDetail->country=='Syrian Arab Republic' ?  'selected="selected"' : '' }}>Syrian Arab Republic</option>
                            <option value="Taiwan, Province of China"{{ isset($userDetail->gender) && $userDetail->country=='Taiwan, Province of China' ?  'selected="selected"' : '' }}>Taiwan, Province of China</option>
                            <option value="Tajikistan"{{ isset($userDetail->gender) && $userDetail->country=='Tajikistan' ?  'selected="selected"' : '' }}>Tajikistan</option>
                            <option value="Tanzania, United Republic of"{{ isset($userDetail->gender) && $userDetail->country=='Tanzania, United Republic of' ?  'selected="selected"' : '' }}>Tanzania, United Republic of</option>
                            <option value="Thailand"{{ isset($userDetail->gender) && $userDetail->country=='Thailand' ?  'selected="selected"' : '' }}>Thailand</option>
                            <option value="Timor-Leste"{{ isset($userDetail->gender) && $userDetail->country=='Timor-Leste' ?  'selected="selected"' : '' }}>Timor-Leste</option>
                            <option value="Togo"{{ isset($userDetail->gender) && $userDetail->country=='Togo' ?  'selected="selected"' : '' }}>Togo</option>
                            <option value="Tokelau"{{ isset($userDetail->gender) && $userDetail->country=='Tokelau' ?  'selected="selected"' : '' }}>Tokelau</option>
                            <option value="Tonga"{{ isset($userDetail->gender) && $userDetail->country=='Tonga' ?  'selected="selected"' : '' }}>Tonga</option>
                            <option value="Trinidad and Tobago"{{ isset($userDetail->gender) && $userDetail->country=='Trinidad and Tobago' ?  'selected="selected"' : '' }}>Trinidad and Tobago</option>
                            <option value="Tunisia"{{ isset($userDetail->gender) && $userDetail->country=='Tunisia' ?  'selected="selected"' : '' }}>Tunisia</option>
                            <option value="Turkey"{{ isset($userDetail->gender) && $userDetail->country=='Turkey' ?  'selected="selected"' : '' }}>Turkey</option>
                            <option value="Turkmenistan"{{ isset($userDetail->gender) && $userDetail->country=='Turkmenistan' ?  'selected="selected"' : '' }}>Turkmenistan</option>
                            <option value="Turks and Caicos Islands"{{ isset($userDetail->gender) && $userDetail->country=='Turks and Caicos Islands' ?  'selected="selected"' : '' }}>Turks and Caicos Islands</option>
                            <option value="Tuvalu"{{ isset($userDetail->gender) && $userDetail->country=='Tuvalu' ?  'selected="selected"' : '' }}>Tuvalu</option>
                            <option value="Uganda"{{ isset($userDetail->gender) && $userDetail->country=='Uganda' ?  'selected="selected"' : '' }}>Uganda</option>
                            <option value="Ukraine"{{ isset($userDetail->gender) && $userDetail->country=='Ukraine' ?  'selected="selected"' : '' }}>Ukraine</option>
                            <option value="United Arab Emirates"{{ isset($userDetail->gender) && $userDetail->country=='United Arab Emirates' ?  'selected="selected"' : '' }}>United Arab Emirates</option>
                            <option value="United Kingdom"{{ isset($userDetail->gender) && $userDetail->country=='United Kingdom' ?  'selected="selected"' : '' }}>United Kingdom</option>
                            <option value="United States"{{ isset($userDetail->gender) && $userDetail->country=='United States' ?  'selected="selected"' : '' }}>United States</option>
                            <option value="United States Minor Outlying Islands"{{ isset($userDetail->gender) && $userDetail->country=='United States Minor Outlying Islands' ?  'selected="selected"' : '' }}>United States Minor Outlying Islands</option>
                            <option value="Uruguay"{{ isset($userDetail->gender) && $userDetail->country=='Uruguay' ?  'selected="selected"' : '' }}>Uruguay</option>
                            <option value="Uzbekistan"{{ isset($userDetail->gender) && $userDetail->country=='Uzbekistan' ?  'selected="selected"' : '' }}>Uzbekistan</option>
                            <option value="Vanuatu"{{ isset($userDetail->gender) && $userDetail->country=='Vanuatu' ?  'selected="selected"' : '' }}>Vanuatu</option>
                            <option value="Venezuela, Bolivarian Republic of"{{ isset($userDetail->gender) && $userDetail->country=='Venezuela, Bolivarian Republic of' ?  'selected="selected"' : '' }}>Venezuela, Bolivarian Republic of</option>
                            <option value="Viet Nam"{{ isset($userDetail->gender) && $userDetail->country=='Viet Nam' ?  'selected="selected"' : '' }}>Viet Nam</option>
                            <option value="Virgin Islands, British"{{ isset($userDetail->gender) && $userDetail->country=='Virgin Islands, British' ?  'selected="selected"' : '' }}>Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S"{{ isset($userDetail->gender) && $userDetail->country=='Virgin Islands, U.S' ?  'selected="selected"' : '' }}>Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna"{{ isset($userDetail->gender) && $userDetail->country=='Wallis and Futuna' ?  'selected="selected"' : '' }}>Wallis and Futuna</option>
                            <option value="Western Sahara"{{ isset($userDetail->gender) && $userDetail->country=='Western Sahara' ?  'selected="selected"' : '' }}>Western Sahara</option>
                            <option value="Yemen"{{ isset($userDetail->gender) && $userDetail->country=='Yemen' ?  'selected="selected"' : '' }}>Yemen</option>
                            <option value="Zambia"{{ isset($userDetail->gender) && $userDetail->country=='Zambia' ?  'selected="selected"' : '' }}>Zambia</option>
                            <option value="Zimbabwe"{{ isset($userDetail->gender) && $userDetail->country=='Zimbabwe' ?  'selected="selected"' : '' }}>Zimbabwe</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthday" class="control-label">Your birthday:</label>
                        <input id="birthday" type="date" class="form-control" name="birthday" value={{ isset($userDetail->birthday) ? "$userDetail->birthday" : '' }}  min="1900-01-01" max="">
                    </div>

                    <div class="form-group d-flex justify-content-between">
                        <label for="gender" class="control-label">Your gender:</label>

                        <div class="d-flex justify-content-between">
                            <input class="mr-3 mt-1" id="gender" type="radio" class="form-control" name="gender"
                                   value="male" {{ isset($userDetail->gender) && $userDetail->gender=='male' ?  'checked="checked"' : '' }}>
                            <p>Male</p>
                            <input class="mx-3 mt-1" id="gender" type="radio" class="form-control" name="gender"
                                   value="female" {{ isset($userDetail->gender) && $userDetail->gender=='female' ?  'checked="checked"' : '' }}>
                            <p>Female</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gold">Submit</button>
                </form>
            </div>
            <div class="modal-footer wishy-rounded-bottom bg-navy text-white">
                <button type="button" class="btn btn-gold" data-dismiss="modal" data-toggle="modal" data-target="#editModal">Back</button>
                <button type="button" class="btn btn-gold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>