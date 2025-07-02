<template>
  <div>
      <div class="container ">
          <ul id="proegress" v-if="progressBar.esVisible" class="proegress">
              <li v-for="(item, i) in progressBar.items"
                  v-bind:class="{activo: i == progressBar.indiceActivo , 'antes-activo': i < progressBar.indiceActivo}">
                  {{ item }}
              </li>
          </ul>
      </div>
      <div class="app_style">
          <div class="item_app" :style="{ 'width': areaActual === 'demo3' ? '100%' : '' }">
              <fieldset v-bind:style="obtenerEstiloArea('demo1')">  
                  <h3>Choose the type of excursion</h3>
                  <div class="content_tour_tipo">
                    <div @click="cargarPublicaciones(969, 976)" :class="{ 'cat_active': categoriaSeleccionada === 969 }" class="item_tipo_tour">
                      <img src="https://www.orange-nation.com/wp-content/uploads/2024/07/app_adventure.jpg" alt="Categoria Adventure - Orange Nation Peru">
                      <div class="texto_cat">
                        <h4>Adventure</h4>
                        <span>13 Tours</span>
                      </div>
                    </div>
                    <div @click="cargarPublicaciones(972, 971, 975, 979)" :class="{ 'cat_active': categoriaSeleccionada === 972 }" class="item_tipo_tour">
                      <img src="https://www.orange-nation.com/wp-content/uploads/2018/07/choquequirao-trekking-4-days-600x454.jpg" alt="">
                      <div class="texto_cat">
                        <h4>Alternatives</h4>
                        <span>12 Tours</span>
                      </div>
                    </div>
                    <div @click="cargarPublicaciones(978, 977, 973)" :class="{ 'cat_active': categoriaSeleccionada === 978 }" class="item_tipo_tour">
                      <img src="https://www.orange-nation.com/wp-content/uploads/2019/12/salkantay-lake-humantay-inca-trail-trek-min.jpg" alt="">
                      <div class="texto_cat">
                        <h4>Day Tours</h4>
                        <span>14 Tours</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="loading" class="loading-message">
                    Loading tours, please wait...
                  </div>
                  <h4 v-if="categoriaSeleccionada">Select the tour of your preference</h4>
                  <transition-group name="fade" mode="out-in" tag="div" class="content_tours" v-if="!loading">
                    <div v-for="post in visiblePosts" :key="post.id" v-show="post.isVisible" @click="agregarAlCarrito(post)" class="tour_item">
                      <img :src="post.feature_media_urls.medium || defaultThumbnail" :alt="`${post.title.rendered} - Orange Nation Peru`">
                      <h5 v-html="post.title.rendered"></h5>
                    </div>
                  </transition-group>
                  <button v-if="showMore" @click="verMasTours" class="btn_ver_mas_tours">See more tours</button>

                  <div v-if="carrito.length >= 2" class="botones-booking mt-4">
                      <a href="javascript:" class="btn_next" @click="validarInfoHotel()">
                          Next step
                      </a>
                  </div>
              </fieldset>
              <fieldset v-bind:style="obtenerEstiloArea('demo2')"> 
                  <h3>Contact information</h3>
                  <div class="content_form">
                      <div class="col50">
                          <div class="input" v-bind:class="generarClasesCss('nombre')">
                              <input v-model="contacto.nombre" @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="text">
                              <span>Full Name *</span>
                          </div>
                      </div>
                      <div class="col50">
                          <div class="input" v-bind:class="generarClasesCss('email')">
                              <input v-model="contacto.email" @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="text">
                              <span>E-mail*</span>
                          </div>
                      </div>
                      <div class="col20">
                          <div class="input" v-bind:class="generarClasesCss('codigo')">
                              <select @focus="agregarClaseInput($event)"
                                      @blur="removerClses($event)" 
                                      v-model="contacto.telefono.codigo" :value="contacto.telefono.codigo">
                                  <option data-countryCode="GB" value="44" Selected>Norway (+47)</option>
                                  <option data-countryCode="US" value="1">UK (+44)</option>
                                  <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                  <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                  <option data-countryCode="AO" value="244">Angola (+244)</option>
                                  <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                  <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                  <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                  <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                  <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                  <option data-countryCode="AU" value="61">Australia (+61)</option>
                                  <option data-countryCode="AT" value="43">Austria (+43)</option>
                                  <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                  <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                  <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                  <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                  <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                  <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                  <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                  <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                  <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                  <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                  <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                  <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                  <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                  <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                  <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                  <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                  <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                  <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                  <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                  <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                  <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                  <option data-countryCode="CA" value="1">Canada (+1)</option>
                                  <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                  <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                  <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                  <option data-countryCode="CL" value="56">Chile (+56)</option>
                                  <option data-countryCode="CN" value="86">China (+86)</option>
                                  <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                  <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                  <option data-countryCode="CG" value="242">Congo (+242)</option>
                                  <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                  <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                  <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                  <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                  <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                  <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                  <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                  <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                  <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                  <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                  <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                  <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                  <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                  <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                  <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                  <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                  <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                  <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                  <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                  <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                  <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                  <option data-countryCode="FI" value="358">Finland (+358)</option>
                                  <option data-countryCode="FR" value="33">France (+33)</option>
                                  <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                  <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                  <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                  <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                  <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                  <option data-countryCode="DE" value="49">Germany (+49)</option>
                                  <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                  <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                  <option data-countryCode="GR" value="30">Greece (+30)</option>
                                  <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                  <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                  <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                  <option data-countryCode="GU" value="671">Guam (+671)</option>
                                  <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                  <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                  <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                  <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                  <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                  <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                  <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                  <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                  <option data-countryCode="IS" value="354">Iceland (+354)</option>
                                  <option data-countryCode="IN" value="91">India (+91)</option>
                                  <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                  <option data-countryCode="IR" value="98">Iran (+98)</option>
                                  <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                  <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                  <option data-countryCode="IL" value="972">Israel (+972)</option>
                                  <option data-countryCode="IT" value="39">Italy (+39)</option>
                                  <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                  <option data-countryCode="JP" value="81">Japan (+81)</option>
                                  <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                  <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                  <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                  <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                  <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                  <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                  <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                  <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                  <option data-countryCode="LA" value="856">Laos (+856)</option>
                                  <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                  <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                  <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                  <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                  <option data-countryCode="LY" value="218">Libya (+218)</option>
                                  <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                  <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                  <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                  <option data-countryCode="MO" value="853">Macao (+853)</option>
                                  <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                  <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                  <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                  <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                  <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                  <option data-countryCode="ML" value="223">Mali (+223)</option>
                                  <option data-countryCode="MT" value="356">Malta (+356)</option>
                                  <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                  <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                  <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                  <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                  <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                  <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                  <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                  <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                  <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                  <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                  <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                  <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                  <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                  <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                  <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                  <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                  <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                  <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                  <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                  <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                  <option data-countryCode="NE" value="227">Niger (+227)</option>
                                  <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                  <option data-countryCode="NU" value="683">Niue (+683)</option>
                                  <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                  <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                  <option data-countryCode="NO" value="47">Norway (+47)</option>
                                  <option data-countryCode="OM" value="968">Oman (+968)</option>
                                  <option data-countryCode="PW" value="680">Palau (+680)</option>
                                  <option data-countryCode="PA" value="507">Panama (+507)</option>
                                  <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                  <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                  <option data-countryCode="PE" value="51">Peru (+51)</option>
                                  <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                  <option data-countryCode="PL" value="48">Poland (+48)</option>
                                  <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                  <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                  <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                  <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                  <option data-countryCode="RO" value="40">Romania (+40)</option>
                                  <option data-countryCode="RU" value="7">Russia (+7)</option>
                                  <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                  <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                  <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                  <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                  <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                  <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                  <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                  <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                  <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                  <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                  <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                  <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                  <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                  <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                  <option data-countryCode="ES" value="34">Spain (+34)</option>
                                  <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                  <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                  <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                  <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                  <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                  <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                  <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                  <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                  <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                  <option data-countryCode="SI" value="963">Syria (+963)</option>
                                  <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                  <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                  <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                  <option data-countryCode="TG" value="228">Togo (+228)</option>
                                  <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                  <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                  <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                  <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                  <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                  <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                  <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                  <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                  <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                  <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                  <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                  <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                  <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                  <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                  <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                  <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                  <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                  <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                  <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                  <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                  <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                  <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                  <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                  <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                              </select>
                              <span>Code</span>
                              <div v-if="contacto.telefono.codigo">
                                  + {{contacto.telefono.codigo}}
                              </div>
                          </div>
                      </div>
                      <div class="col40">
                          <div class="input" v-bind:class="generarClasesCss('numero')">
                              <input v-model="contacto.telefono.numero" @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="number" class="input">
                              <span>Number *</span>
                          </div>
                      </div>
                      <div class="col40">
                          <div class="input" v-bind:class="generarClasesCss('pais')">
                              <input v-model="contacto.pais" @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="text" class="input">
                              <span>Country * </span>
                          </div>
                      </div>
                  </div> 
                  <h3>Trip data</h3>
                  <div class="content_form">
                      <div class="col50">
                          <div class="input" v-bind:class="generarClasesCss('fechaviaje')">
                              <input id="fechaviajeprincipal" v-model="contacto.fechaviaje" 
                                  @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="text" class="input">
                              <span>Start date *</span>
                          </div>
                      </div>
                      <div class="col50">
                          <div class="input">
                              <input id="fechaviajeopcional" v-model="contacto.fechaviaje2" 
                                  @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="text" class="input">
                              <span>Alternative date </span>
                          </div>
                      </div>
                      <div class="col100">
                        <div class="type_service">
                          <div class="">
                            <label>
                                <input type="radio" v-model="contacto.service" value="group" />
                                <span class="checkmark"></span>
                                Group Service
                                <i type="button" class="bi bi-info-circle ms-1"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-html="true" 
                                    data-bs-title="<h4>Group tour</h4>
                                        <p>
                                            A group tour means that there will be other travelers making up our travel team.
                                        </p>">
                                </i>
                            </label>
                          </div>
                          <div class="">
                            <label>
                                <input type="radio" v-model="contacto.service" value="private" />
                                <span class="checkmark"></span>
                                Private Service
                                <i type="button" class="bi bi-info-circle ms-1"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-html="true" 
                                    data-bs-title="<h4>Group tour</h4>
                                        <p>
                                            A group tour means that there will be other travelers making up our travel team.
                                        </p>">
                                </i>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col35 focus">
                          <div class="input">
                              <input v-model="contacto.travels.adults" 
                                  @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="number" class="input">
                              <span>Adults</span>
                          </div>
                      </div>
                      <div class="col35 focus">
                          <div class="input">
                              <input v-model="contacto.travels.children" 
                                  @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="number" class="input">
                              <span>Children (3-11 age)</span>
                          </div>
                      </div>
                      <div class="col_30 focus">
                          <div class="input">
                              <input v-model="contacto.travels.infants" 
                                  @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="number" class="input">
                              <span>Infants (0-2 age)</span>
                          </div>
                      </div>
                  </div> 
                  <h3>Accommodation Data</h3>
                  <div class="content_form">
                      <div class="content_hotel_star">
                          <li :class="{active : contacto.hotel.tipo_hotel == 5 }"
                              @click="contacto.hotel.tipo_hotel = 5">
                              <span>Luxury</span>
                              <ul>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                              </ul>
                          </li>
                          <li :class="{active : contacto.hotel.tipo_hotel == 4 }"
                              @click="contacto.hotel.tipo_hotel = 4">
                              <span>Superior</span>
                              <ul>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                              </ul>
                          </li>
                          <li :class="{active : contacto.hotel.tipo_hotel == 3 }"
                              @click="contacto.hotel.tipo_hotel = 3">
                              <span>Best value</span>
                              <ul>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                              </ul>
                          </li>
                      </div>
                      <div class="col50" v-if="contacto.hotel.tipo_hotel">
                          <div class="input">
                              <select v-model="contacto.hotel.tipo_habitacion" 
                                  @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="text" class="input"> 
                                  <option value="simple">Simple</option>
                                  <option value="doble">Doble</option>
                                  <option value="triple">Triple</option>
                                  <option value="matrimonial">Matrimonial</option>
                                  <option value="otro">Otro</option>
                              </select>
                              <span>Tipo de Habitacion</span>
                          </div>
                      </div>
                      <div class="col50" v-if="contacto.hotel.tipo_habitacion == 'otro'">
                          <div class="input">
                              <textarea v-model="contacto.hotel.adicional" @focus="agregarClaseInput($event)"
                                  @blur="removerClses($event)"
                                  type="text" class="input">
                              </textarea>
                              <span>Datos Adicionales </span>
                          </div>
                      </div>
                  </div> 
                  <div class="botones-booking mt-4">
                      <a href="javascript:" class="prev" @click="irAArea('demo1')">
                          Edit tour
                      </a>
                      <a href="javascript:" @click="validarInfoHotel()">
                          Send package
                      </a>
                  </div>
              </fieldset>
              <fieldset v-bind:style="obtenerEstiloArea('demo3')" >
                <div style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;padding: 15px 10px;border-radius: 5px;text-align: center;margin-bottom: 20px;">
                  <p>
                    Your tourist package was sent satisfactorily, our sales team will contact you as soon as possible
                  </p>
                </div>
                <table class="table_app">
                  <tbody>
                      <tr class="title_table">
                          <th colspan="2">Booking information</th>
                      </tr>
                      <tr>
                          <td style="padding-bottom: 15px">Selected tours</td>
                          <td style="padding-bottom: 15px">
                            <li v-for="item in carrito" :key="item.producto.id" v-html="decodeHtml(item.producto.title.rendered)"></li>
                          </td>
                      </tr>
                      <tr class="title_table">
                          <th colspan="2">Contact information</th>
                      </tr>
                      <tr>
                          <td>Full Name</td>
                          <td>{{ contacto.nombre }}</td>
                      </tr>
                      <tr>
                          <td>E-mail</td>
                          <td>{{ contacto.email }}</td>
                      </tr>
                      <tr>
                          <td>Phone</td>
                          <td>+{{ contacto.telefono.codigo }} {{ contacto.telefono.numero }}</td>
                      </tr>
                      <tr>
                          <td style="padding-bottom: 15px">Country</td>
                          <td>{{ contacto.pais }}</td>
                      </tr>
                      <tr class="title_table">
                          <th colspan="2">Trip data</th>
                      </tr>
                      <tr>
                          <td>Star Date</td>
                          <td>{{ contacto.fechaviaje }}</td>
                      </tr>
                      <tr>
                          <td>Optional Date</td>
                          <td>{{ contacto.fechaviaje2 }}</td>
                      </tr>
                      <tr>
                          <td>Type of service</td>
                          <td>{{ contacto.service }}</td>
                      </tr>
                      <tr>
                          <td>Number of travel</td>
                          <td>
                            <strong>Adults: </strong>{{ contacto.travels.adults }}<br>
                            <strong>Children: </strong>{{ contacto.travels.children }}<br>
                            <strong>Infants: </strong> {{ contacto.travels.infants }}  
                          </td>
                      </tr>
                      <tr class="pb15">
                          <td style="padding-bottom: 15px">Hotel</td>
                          <td style="padding-bottom: 15px">
                            <strong>Type of hotel: </strong> {{ contacto.hotel.tipo_hotel }} star<br>
                            <strong>Type of room: </strong> {{ contacto.hotel.tipo_habitacion }}<br>
                            <strong>Aditional: </strong> {{ contacto.hotel.adicional }}
                          </td>
                      </tr>
                  </tbody>
                </table>
              </fieldset>
              <transition name="fade">
                  <div v-if="mensajeValidation" class="content_modal">
                      <div class="modal_animado">
                          <div>
                              <h5>{{ tituloNotificacion }} </h5>
                              <i v-if="!btnAccion == 'confirmado'" class="bi bi-x" @click="cerrarModalNotificacion()"></i>
                              <i v-if="btnAccion == 'confirmado'" class="bi bi-x">
                              </i>
                          </div>
                          <div>
                              <div v-html="textoNotificacion"></div>
                              <div>
                                  <button v-if="btnAccion == 'notificacion'" type="button" @click="cerrarModalNotificacion()">
                                      Cerrar
                                  </button>
                                  <a href="/" v-if="btnAccion == 'confirmado'">
                                      Cerrar
                                  </a>
                                  <button v-if="btnAccion == 'eliminar'" class="btn_cancelar" type="button" @click="cerrarModalNotificacion()">
                                      Cancelar
                                  </button>
                                  <button v-if="btnAccion == 'eliminar'" type="button" @click="eliminarDelCarrito()">
                                      Eliminar
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </transition>
          </div>
          <div class="item_app" v-if="areaActual == 'demo1' || areaActual == 'demo2' ">
              <h3>Selected Tours</h3>
              <div class="content_tour_seleccionado"> 
                  <div v-for="item in carrito" class="tour_seleccionado">
                      <img :src="item.producto.feature_media_urls.thumbnail" alt="" >
                      <div>
                          <h4>{{ item.producto.title.rendered }}</h4>
                          <div v-html="item.producto.acf.description"></div>
                          <span @click="modalInfoPost(item)">See more</span>
                          <button @click="abrirModalElimarTour(item)"><i class="bi bi-x"></i></button>
                      </div>
                  </div>
              </div>
              <transition name="fade">
                  <div v-if="selectpost" class="content_modal">
                      <span class="close_modal" @click="cerrarModalPost()">X</span>
                      <div class="modal_info_post">
                          <img :src="selectpost.producto.feature_media_url" alt="">
                          <h4 v-html="selectpost.producto.title.rendered"></h4>
                          <div v-html="selectpost.producto.acf.description"></div>
                      </div>
                  </div>
              </transition> 
              <div v-if="modal">
                  estas seguro de elimianr {{tituloTour}} 
                  <button @click="eliminarDelCarrito()">Eliminar del carrito</button>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import { ref, reactive, watch, onMounted } from 'vue';
import flatpickr from 'flatpickr';

export default {
setup() {
  const nombreDominio = ref(window.location.origin);
  const categories = ref([]);
  const posts = ref([]);
  const categoriaSeleccionada = ref(null);
  const carrito = ref([]);
  const modal = ref(false);
  const progressBar = reactive({ 
    esVisible: false, 
    indiceActivo: 0, 
    items: [] 
  });
  const areaActual = ref('demo1');
  const mostrarObligatorios = ref(false);
  const selectpost = ref(null);
  const mensajeValidation = ref(false);
  const tituloNotificacion = ref('');
  const textoNotificacion = ref('');
  const btnAccion = ref('notificacion');
  const tourId = ref(0);
  const contacto = reactive({
    id: 0,
    nombre: '',
    email: '',
    telefono: {
      codigo: '',
      numero: ''
    },
    travels: {
      adults: 2,
      children: 0,
      infants: 0
    },
    pais: '',
    fechaviaje: '',
    fechaviaje2: '',
    viajeros: '',
    hotel: {
      tipo_hotel: '',
      tipo_habitacion: '',
      adicional: ''
    },
    service: ''
  });
  const datePickerFechaPrincipal = ref(null);
  const datePickerFechaOpcional = ref(null);
  const validacion = reactive({
    email: false,
    fecha: false
  });
  const areapackage = ref('');
  const modalCarga = ref(false);
  const allPosts = ref([]);
  const visiblePosts = ref([]);
  const defaultThumbnail = 'path/to/default/thumbnail.jpg';
  const showMore = ref(false);
  const postsToShow = ref(9);
  const loading = ref(false);

  watch(mensajeValidation, (newVal) => {
    if (newVal) {
      document.body.style.overflow = 'hidden';
    } else {
      document.body.removeAttribute('style');
    }
  });

  const agregarClaseInput = (e) => {
    e.target.parentNode.parentNode.classList.add("focus");
  };

  const removerClses = (e) => {
    const el = e.target;
    const parent = e.target.parentNode.parentNode;

    if (el.value === "") {
      parent.classList.remove("focus");
    }
  };

  const abrirModalElimarTour = (tour) => {
    mensajeValidation.value = true;
    tituloNotificacion.value = 'Estas seguro ?';
    textoNotificacion.value = 'Estas seguro de eliminar ' + tour.producto.title.rendered;
    btnAccion.value = 'eliminar';
    tourId.value = tour.producto.id;
  };

  const cerrarModalNotificacion = () => {
    mensajeValidation.value = false;
  };

  const cerrarModalPost = () => {
    selectpost.value = false;
  };

  const modalInfoPost = (item) => {
    selectpost.value = item;
  };

  const validaremail = () => {
    const regex = /[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?/;
    return regex.test(contacto.email);
  };

  const validarInfoHotel = () => {
    let valido = false;

    if (progressBar.indiceActivo === 0) {
      if (carrito.value.length === 0 || carrito.value.length === 1) {
        mensajeValidation.value = true;
        tituloNotificacion.value = 'No tienes ningún tour seleccionado';
        textoNotificacion.value = 'Debes seleccionar 2 tours para poder crear tu paquete turístico personalizado';
        btnAccion.value = 'notificacion';
      } else {
        valido = true;
      }
    }

    if (progressBar.indiceActivo === 1) {
      valido = (
        contacto.nombre.trim() !== '' &&
        contacto.email.trim() !== '' &&
        contacto.telefono.codigo.trim() !== '' &&
        contacto.telefono.numero !== '' &&
        contacto.pais.trim() !== '' &&
        contacto.fechaviaje.trim() !== '' &&
        contacto.travels.adults !== ''
      );
    }

    if (valido) {
      if (areaActual.value === 'demo1') {
        areaActual.value = 'demo2';
      } else if (areaActual.value === 'demo2') {
        validacion.email = validaremail();
        if (!validacion.email) {
          mensajeValidation.value = true;
          tituloNotificacion.value = 'Error !';
          textoNotificacion.value = '<p>Introduzca una dirección de correo electrónico válida.</p>';
          btnAccion.value = 'notificacion';
          return;
        }
        enviarPackage();
        areaActual.value = 'demo3';
      }
      mostrarObligatorios.value = false;
    } else {
      mostrarObligatorios.value = true;
    }

    actualizarProgressBar();
  };

  const enviarPackage = () => {
    const url = '../wp-content/themes/neworange/email/src/package.php';

    const data = new FormData();

    const dataToSend = carrito.value.map(tour => ({ nombre: tour.producto.title.rendered }));

    data.append('nombre', contacto.nombre);
    data.append('tour', JSON.stringify(dataToSend));
    data.append('email', contacto.email);
    data.append('codigo', contacto.telefono.codigo);
    data.append('numero', contacto.telefono.numero);
    data.append('pais', contacto.pais);
    data.append('fechaviaje', contacto.fechaviaje);
    data.append('servicio', contacto.service);
    data.append('fechaviaje2', contacto.fechaviaje2);
    data.append('viajeros', JSON.stringify(contacto.travels));
    data.append('hotel', JSON.stringify(contacto.hotel));

    modalCarga.value = true;

    fetch(url, { method: 'POST', body: data })
      .then(response => response.json())
      .then(result => {
        if (result.reservado) {
          /*
          mensajeValidation.value = true;
          tituloNotificacion.value = 'Felicidades ... !';
          textoNotificacion.value = '<p>Su paquete turistico fue enviado satisfactoriamente, nos pondremos en contacto lo más antes posible/p>';
          btnAccion.value = 'confirmado';*/
        } else {
          alert('Could not send message');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      })
      .finally(() => {
        modalCarga.value = false;
      });
  };

  const esValido = (nombreCampo) => {
    let esValido = false;
    switch (nombreCampo) {
      case 'nombre': esValido = contacto.nombre !== ''; break;
      case 'email': esValido = contacto.email !== ''; break;
      case 'codigo': esValido = contacto.telefono.codigo !== ''; break;
      case 'numero': esValido = contacto.telefono.numero !== ''; break;
      case 'pais': esValido = contacto.pais !== ''; break;
      case 'fechaviaje': esValido = contacto.fechaviaje !== ''; break;
      case 'viajeros': esValido = contacto.viajeros !== ''; break;
    }
    return esValido;
  };

  const generarClasesCss = (nombreCampo) => {
    return {
      error: mostrarObligatorios.value && !esValido(nombreCampo),
      bvalido: mostrarObligatorios.value && esValido(nombreCampo)
    };
  };

  const actualizarProgressBar = () => {
    switch (areaActual.value) {
      case 'demo1': progressBar.indiceActivo = 0; break;
      case 'demo2': progressBar.indiceActivo = 1; break;
      case 'demo3': progressBar.indiceActivo = 2; break;
    }
  };

  const inicializarProgressBar = () => {
    progressBar.items = 
      ["Check your order", "Personal information", "Detailed information"];
    progressBar.indiceActivo = 0;
    progressBar.esVisible = true;
  };

  const obtenerEstiloArea = (area) => {
    return area === areaActual.value ? { display: 'block' } : { display: 'none' };
  };

  const irAArea = (area) => {
    areaActual.value = area;
    actualizarProgressBar();
  };

  const cargarPublicaciones = (...categorias) => {
    loading.value = true;
    const urlapi = `https://www.orange-nation.com/wp-json/wp/v2/posts?categories=${categorias.join(',')}&per_page=100`;
    fetch(urlapi)
      .then(response => response.json())
      .then(data => {
        allPosts.value = data.map(post => ({ ...post, isVisible: false })); // Añadir isVisible a cada post
        visiblePosts.value = allPosts.value.slice(0, postsToShow.value);
        categoriaSeleccionada.value = categorias[0];
        showMore.value = data.length > postsToShow.value;
        loading.value = false;
        demo();
      })
      .catch(error => {
        console.error('Post no encontrados', error);
        loading.value = false;
      });
  };
 const decodeHtml = (html) => {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
 }
  const verMasTours = () => {
    postsToShow.value += 9;
    visiblePosts.value = allPosts.value.slice(0, postsToShow.value);
    showMore.value = allPosts.value.length > postsToShow.value;
    demo();
  };

  const demo = () => {
    visiblePosts.value.forEach((post, index) => {
      setTimeout(() => {
        visiblePosts.value[index] = { ...post, isVisible: true };
      }, (index + 1) * 600);
    });
  };

  const agregarAlCarrito = (producto) => {
    const itemEnCarrito = carrito.value.find(item => item.producto.id === producto.id);

    if (itemEnCarrito) {
      mensajeValidation.value = true;
      tituloNotificacion.value = 'Ya existe!';
      textoNotificacion.value = `<p><strong>${itemEnCarrito.producto.title.rendered}</strong> ya se encuentra agregado en su lista de viajes</p>`;
      btnAccion.value = 'notificacion';
    } else {
      carrito.value.push({ producto });
    }
  };

  const eliminarDelCarrito = () => {
    carrito.value = carrito.value.filter(item => item.producto.id !== tourId.value);
    mensajeValidation.value = false;
    btnAccion.value = 'notificacion';
  };

  const inicializarFecha = () => {
    datePickerFechaPrincipal.value = flatpickr('#fechaviajeprincipal', {
      enableTime: false,
      dateFormat: "d-M-Y",
      minDate: "today",
      locale: {
        firstDayOfWeek: 1,
        weekdays: {
          shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
          longhand: ['Domingo', 'Lunes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        },
        months: {
          shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
          longhand: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        },
      },
    });
    datePickerFechaOpcional.value = flatpickr('#fechaviajeopcional', {
      enableTime: false,
      dateFormat: "d-M-Y",
      minDate: "today",
      locale: {
        firstDayOfWeek: 1,
        weekdays: {
          shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
          longhand: ['Domingo', 'Lunes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        },
        months: {
          shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
          longhand: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        },
      },
    });
  };

  onMounted(() => {
    inicializarProgressBar();
    inicializarFecha();
  });

  const isCategoryActive = (category) => {
    // Assuming `categoriasSeleccionadas` should be an array in the `data` section
    return categoriasSeleccionadas.value.includes(category);
  };

  return {
    nombreDominio,
    categories,
    posts,
    categoriaSeleccionada,
    carrito,
    modal,
    progressBar,
    areaActual,
    mostrarObligatorios,
    selectpost,
    mensajeValidation,
    tituloNotificacion,
    textoNotificacion,
    btnAccion,
    tourId,
    contacto,
    datePickerFechaPrincipal,
    datePickerFechaOpcional,
    validacion,
    areapackage,
    modalCarga,
    allPosts,
    visiblePosts,
    defaultThumbnail,
    showMore,
    postsToShow,
    loading,
    agregarClaseInput,
    removerClses,
    abrirModalElimarTour,
    cerrarModalNotificacion,
    cerrarModalPost,
    modalInfoPost,
    validaremail,
    validarInfoHotel,
    enviarPackage,
    esValido,
    generarClasesCss,
    actualizarProgressBar,
    inicializarProgressBar,
    obtenerEstiloArea,
    irAArea,
    cargarPublicaciones,
    verMasTours,
    demo,
    agregarAlCarrito,
    eliminarDelCarrito,
    inicializarFecha,
    isCategoryActive,
    decodeHtml
  };
}
};

</script>

<style>
  .fade-enter-active, .fade-leave-active {
      transition: opacity 0.6s, transform 0.6s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
      opacity: 0;
      transform: translateY(20px);
  }
</style>