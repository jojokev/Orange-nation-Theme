<?php 
	get_header();
?>

<section class="container-xl">
    <div class="text_h2">
        <h1 class="">
            <?php the_title(); ?>
        </h1>
    </div>

    <div class="content_payment">
        <?php 
		if ( have_posts() ): while ( have_posts() ):the_post();
		?>
        <?php the_content(); ?>
        <?php //the_title( $before ='<h1>', $after='</h1>', $echo = true);?>
        <?php /// the_content();?>
        <?php endwhile;?>
        <?php else: ?>
        <?php endif;?>
    </div>
</section>
    <section class="container-xl">
        <div class="nav-payment tabs">
            <li class="tab js-active" data-tab-target="#side-tab498">
                <span>
                    PAY WITH ANY CARD
                </span>
            </li>
            <li class="tab" data-tab-target="#side-tab218">
                <span>
                    PAY WITH WETRAVEL
                </span>
            </li>
        </div>
        <div class="panel-container content_pay">
            <div class="panel_tab paypal_form js-active" id="side-tab498" data-tab-content="">
            <section class="mastercart">
            <h2 style="text-align: center;">Pay only with credit card</h2>
            <div class="paypal border shadow-sm mb-3 p-2">
                <h3 class="fw-bold fs-5 p-0"><span>Deposit for any 1 day Tour &amp;
                        trek to Machu
                        Picchu or any standar
                        tour
                        or trek to Machu Picchu </span>&nbsp;-$211 USD
                </h3>
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="border-start border-2  rounded-1 ps-2 d-inline-block border-primary">
                            We request a deposit of <strong>$200 USD</strong> +
                            <strong>5.5 % service
                                fee&nbsp;</strong>that <strong>PAY TO PERU</strong>&nbsp;for the
                            following
                            tours &amp;
                            treks:
                            Any
                            tour to Machu Picchu, Inca Trail 1, 2, 4, 5 Days, Lares Hike, Salkantay
                            Trail,
                            Choquequirao
                            trek.<strong><span style="color: #f54505;"> (Does Not Include Huayna Picchu
                                    Or
                                    Machu Picchu
                                    Mt.)</span>
                            </strong>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form id="frmRegister" class="ng-pristine ng-valid"
                            action="https://secure.paytoperu.com/eng/customize" method="POST"
                            name="frmRegister" target="_blank">
                            <select class="form-select rounded-0 mb-2" name="importe"
                                data-ng-options="o.label for o in options"
                                data-ng-model="selectedOption">
                                <option label="1 Person $211.00 USD" selected="selected" value="211">1
                                    Person $211.00
                                    USD
                                </option>
                                <option label="2 Persons $422.00 USD" value="422">2 Persons $422.00 USD
                                </option>
                                <option label="3 Persons $633.00 USD" value="633">3 Persons $633.00 USD
                                </option>
                                <option label="4 Persons $844.00 USD" value="844">4 Persons $844.00 USD
                                </option>
                                <option label="5 Persons $1,055.00 USD" value="1055">5 Persons $1,055.00
                                    USD</option>
                                <option label="6 Persons $1,266.00 USD" value="1266">6 Persons $1,266.00
                                    USD</option>
                                <option label="7 Persons $1,477.00 USD" value="1477">7 Persons $1,477.00
                                    USD</option>
                                <option label="8 Persons $1,688.00 USD" value="1688">8 Persons $1,688.00
                                    USD</option>
                            </select>
                            <input title="Payments with pay to peru"
                                alt="PayToPeru.com - The easy and secure way to make payments"
                                height="50" src="https://secure.paytoperu.com/comercio/paynow_a.png"
                                type="image" align="center">
                            <input id="ruc" name="ruc" type="hidden" value="20604162786">
                            <input id="moneda" autocomplete="off" name="moneda" type="hidden" value="2">
                            <input autocomplete="off" name="cantidad" type="hidden" value="1">
                            <input autocomplete="off" name="descripcion" type="hidden"
                                value="Deposit for any Tour or Trek to Machu Picchu with 1 Night Hotel">
                        </form>
                    </div>
                </div>
            </div>
            <div class="paypal border shadow-sm mb-3 p-2">
                <h3 class="fw-bold fs-5">Deposit for 2, 3, 4, 5 or 7 days &nbsp;Inca Trails <span
                        style="color: #f54505;">with</span><strong><span style="color: #f54505;"> Huayna
                            Picchu or Machu
                            Picchu Mt. </span></strong>&nbsp;-$290 USD</h3>
                <div class="row aligm-items-center">
                    <div class="col-md-8 ">
                         <div class="border-start border-2  rounded-1 ps-2 d-inline-block border-primary">
                         We request a deposit of <strong>$200&nbsp; USD+ $75 USD
                            (Huayna Picchu)
                            +</strong>&nbsp;<strong>5.5 % service fee</strong> that <strong>PAY TO
                            PERU</strong>&nbsp;,
                        which is
                        a total of <strong>$286 USD</strong> for the following treks: 2, 3, 4, 5,
                        &nbsp;or 7 days
                        <strong>Inca
                            Trails to Machu Picchu +</strong> <strong>Huayna Picchu Mt</strong> (extra
                        hike at Machu
                        Picchu)
                        or
                        <strong>Machu Picchu Mountain</strong> (hike to Machu Picchu Mountain).
                         </div>
                    </div>
                    <div class="col-md-4">
                        <form id="frmRegister" class="ng-pristine ng-valid"
                            action="https://secure.paytoperu.com/eng/customize" method="POST"
                            name="frmRegister" target="_blank">
                            <select name="importe" class="form-select mb-2 rounded-0"
                                data-ng-options="o.label for o in options2"
                                data-ng-model="selectedOption2">
                                <option class="form-select rounded-0 mb-2" label="1 Person $290.00 USD"
                                    selected="selected" value="290.00">1 Person $290.00
                                    USD
                                </option>
                                <option label="2 Persons $580.00 USD" value="580.00">2 Persons $580.00
                                    USD</option>
                                <option label="3 Persons $870.00 USD" value="870.00">3 Persons $870.00
                                    USD</option>
                                <option label="4 Persons $1,160.00 USD" value="1160.00">4 Persons
                                    $1,160.00 USD</option>
                                <option label="5 Persons $1,450.00 USD" value="1450.00">5 Persons
                                    $1,450.00 USD</option>
                                <option label="6 Persons $1,740.00 USD" value="1740.00">6 Persons
                                    $1,740.00 USD</option>
                                <option label="7 Persons $2,030.00 USD" value="2030.00">7 Persons
                                    $2,030.00 USD</option>
                                <option label="8 Persons $2,320.00 USD" value="2320.00">8 Persons
                                    $2,320.00 USD</option>
                            </select>
                            <input title="Payments with pay to peru"
                                alt="PayToPeru.com - The easy and secure way to make payments"
                                height="50" src="https://secure.paytoperu.com/comercio/paynow_a.png"
                                type="image" align="center">
                            <input id="ruc" name="ruc" type="hidden" value="20604162786">
                            <input id="moneda" autocomplete="off" name="moneda" type="hidden" value="2">
                            <input autocomplete="off" name="cantidad" type="hidden" value="1">
                            <input autocomplete="off" name="descripcion" type="hidden"
                                value="Deposit for 2, 3, 4, 5 or 7 days Inca Trails + Huayna Picchu or Machu Picchu Mt. hikes">
                        </form>
                    </div>
                </div>
            </div>
            <div class="paypal border shadow-sm mb-3 p-2">
                <h3 class="fs-5 fw-bold">Deposit for any day Tour - $53 USD</h3>
                <div class="row align-items-center">
                    <div class="col-md-8">We request a deposit of&nbsp;<strong>$50 USD +
                        </strong>&nbsp;<strong>5.5
                            %
                            service fee</strong> that <strong>PAY TO PERU</strong>&nbsp; charges
                        (<strong>$3
                            USD</strong>),
                        which is in total <strong>$53 USD</strong> for the following day tours: City
                        Tour, Sacred
                        Valley,
                        Maras/Moray, South Valley, Mountain Bike, Rainbow Mountain.</div>
                    <div class="col-md-4">
                        <form id="frmRegister" class="ng-pristine ng-valid"
                            action="https://secure.paytoperu.com/eng/customize" method="POST"
                            name="frmRegister" target="_blank">
                            <select class="form-select rounded-0 mb-2" name="importe"
                                data-ng-options="o.label for o in options2"
                                data-ng-model="selectedOption2">
                                <option label="Per Group $53.00 USD" selected="selected" value="53.00">1
                                    Person $53.00
                                    USD
                                </option>

                                <option label="2 Persons $106.00 USD" value="106.00">2 Persons $106.00
                                    USD</option>
                                <option label="3 Persons $159.00 USD" value="159.00">3 Persons $159.00
                                    USD</option>
                                <option label="4 Persons $212.00 USD" value="212.00">4 Persons $212.00
                                    USD</option>
                            </select>
                            <input title="Payments with pay to peru"
                                alt="PayToPeru.com - The easy and secure way to make payments"
                                height="50" src="https://secure.paytoperu.com/comercio/paynow_a.png"
                                type="image" align="center">
                            <input id="ruc" name="ruc" type="hidden" value="20604162786">
                            <input id="moneda" autocomplete="off" name="moneda" type="hidden" value="2">
                            <input autocomplete="off" name="cantidad" type="hidden" value="1">
                            <input autocomplete="off" name="descripcion" type="hidden"
                                value="Deposit for any day Tour.">
                        </form>
                    </div>
                </div>
            </div>
            <div class="paypal border shadow-sm mb-3 p-2">
                <h3 class="fw-bold fs-5">Deposit for Any tour package with 2 or more nights of 2* or 3*
                    Hotels -$ 316
                    USD</h3>
                <div class="row align-items-center">
                    <div class="col-md-8">We request a deposit of <strong>$300 USD +
                        </strong>&nbsp;<strong>5.5 %
                            service
                            fee</strong> that <strong>PAY TO PERU</strong>&nbsp; charges (<strong>$16
                            USD</strong>),
                        which
                        is a
                        total of <strong>$316 USD</strong> this amount of deposit is ONLY for tours and
                        tour packages,
                        it
                        does
                        apply to treks which have hotels included.
                    </div>
                    <div class="col-md-4">
                        <form id="frmRegister" class="ng-pristine ng-valid"
                            action="https://secure.paytoperu.com/eng/customize" method="POST"
                            name="frmRegister" target="_blank">
                            <select class="form-select rounded-0 mb-2" name="importe"
                                data-ng-options="o.label for o in options2"
                                data-ng-model="selectedOption2">
                                <option label="1 Person $316.00 USD" selected="selected" value="316.00">
                                    1 Person $316.00
                                    USD
                                </option>
                                <option label="2 Persons $632.00 USD" value="632.00">2 Persons $632.00
                                    USD</option>
                                <option label="3 Persons $948.00 USD" value="948.00">3 Persons $948.00
                                    USD</option>
                                <option label="4 Persons $1,264.00 USD" value="1264.00">4 Persons
                                    $1,264.00 USD</option>
                                <option label="5 Persons $1,580.00 USD" value="1580.00">5 Persons
                                    $1,580.00 USD</option>
                                <option label="6 Persons $1,896.00 USD" value="1896.00">6 Persons
                                    $1,896.00 USD</option>
                                <option label="7 Persons $2,212.00 USD" value="2212.00">7 Persons
                                    $2,212.00 USD</option>
                                <option label="8 Persons $2,528.00 USD" value="2528.00">8 Persons
                                    $2,528.00 USD</option>
                            </select>
                            <input title="Payments with pay to peru"
                                alt="PayToPeru.com - The easy and secure way to make payments"
                                height="50" src="https://secure.paytoperu.com/comercio/paynow_a.png"
                                type="image" align="center">
                            <input id="ruc" name="ruc" type="hidden" value="20604162786">
                            <input id="moneda" autocomplete="off" name="moneda" type="hidden" value="2">
                            <input autocomplete="off" name="cantidad" type="hidden" value="1">
                            <input autocomplete="off" name="descripcion" type="hidden"
                                value="Deposit for Any tour package with 2 or more nights of 2* or 3* Hotels.">
                        </form>
                    </div>
                </div>
            </div>
            <div class="paypal border shadow-sm mb-3 p-2">
                <h3 class="fs-5 fw-bold">Deposit for Any 5 days or more tour packages with 4* or 5*
                    Hotels -$ 525 USD
                </h3>
                <div class="row align-items-center">
                    <div class="col-md-8">We request a deposit of <strong>$500 USD +
                        </strong>&nbsp;<strong>5.5 %
                            service
                            fee</strong> that <strong>PAY TO PERU</strong>&nbsp; charges (<strong>USD
                            $25</strong>),
                        which
                        is a
                        total of <strong>US$525</strong> for 5 days or more tour packages with 4* or 5*
                        hotels.</div>
                    <div class="col-md-4">
                        <form id="frmRegister" class="ng-pristine ng-valid"
                            action="https://secure.paytoperu.com/eng/customize" method="POST"
                            name="frmRegister" target="_blank">
                            <select class="form-select rounded-0 mb-2" name="importe"
                                data-ng-options="o.label for o in options2"
                                data-ng-model="selectedOption2">
                                <option label="1 Person 525.00 USD" selected="selected" value="525.00">1
                                    Person 525.00
                                    USD
                                </option>
                                <option label="2 Persons $1,050.00 USD" value="1050.00">2 Persons
                                    $1,050.00 USD</option>
                                <option label="3 Persons $1,575.00 USD" value="1575.00">3 Persons
                                    $1,575.00 USD</option>
                                <option label="4 Persons $2,100.00 USD" value="2100.00">4 Persons
                                    $2,100.00 USD</option>
                                <option label="5 Persons $2,675.00 USD" value="2675.00">5 Persons
                                    $2,675.00 USD</option>
                                <option label="6 Persons $3,150.00 USD" value="3150.00">6 Persons
                                    $3,150.00 USD</option>
                                <option label="7 Persons $3,675.00 USD" value="3675.00">7 Persons
                                    $3,675.00 USD</option>
                                <option label="8 Persons $4,200.00 USD" value="4200.00">8 Persons
                                    $4,200.00 USD</option>
                            </select>
                            <input title="Payments with pay to peru"
                                alt="PayToPeru.com - The easy and secure way to make payments"
                                height="50" src="https://secure.paytoperu.com/comercio/paynow_a.png"
                                type="image" align="center">
                            <input id="ruc" name="ruc" type="hidden" value="20604162786">
                            <input id="moneda" autocomplete="off" name="moneda" type="hidden" value="2">
                            <input autocomplete="off" name="cantidad" type="hidden" value="1"><input
                                autocomplete="off" name="descripcion" type="hidden"
                                value="Deposit for Any 5 days or more tour packages with 4* or 5* Hotels.">
                        </form>
                    </div>
                </div>
            </div>
        </section>
            </div>
            <div class="panel_tab" id="side-tab218" data-tab-content="">
                <div class="row mt-3 py-3 align-items-center border rounded">
                    <div class="col-md-8">
                        <div class="">
                            <h3 class="fs-6 fw-bold text-primary ">Deposit for any Tour or Trek to Machu Picchu </h3>
                            <span class="border-start border-2  rounded-1 ps-2 d-inline-block border-primary">
                                We request a deposit of <strong>USD $200</strong> for the following tours &amp;
                                treks:
                                Any
                                tour to Machu Picchu, Inca Trail, Lares Hike, Salkantay Trail, Choquequirao trek.
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="wtrvl-checkout_button" id="wetravel_button_widget"
                            data-env="https://www.wetravel.com" data-version="v0.3" data-uid="475729"
                            data-uuid="28696559" href="https://www.wetravel.com/checkout_embed?uuid=28696559"
                            style="background-color:#ff3f00;color:#ffffff;border: 0px;border-radius: 5px;font-family: 'Poppins', sans-serif;font-weight: 400;font-size: 14px;-webkit-font-smoothing: antialiased;text-transform: capitalize;padding: 13px 24px;text-decoration: none;text-align: center;line-height: 14px;display: inline-block; cursor: pointer;">Pay
                            Now</button>
                        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
                        <script src="https://cdn.wetravel.com/widgets/embed_checkout.js"></script>
                    </div>
                </div>
                <!-- 22 -->
                <div class="row mt-3 py-3 align-items-center border rounded">
                    <div class="col-md-8">
                        <div>
                            <h3 class="fs-6 fw-bold text-primary ">Deposit for 2, 3, 4, 5 or 7 days Inca Trails with
                                Huayna
                                Picchu or Machu Picchu
                                Mt.</h3>
                            <span class="border-start border-2  rounded-1 ps-2 d-inline-block border-primary">
                                We request a deposit of $200 USD + $75 USD (Huayna Picchu)  for
                                the following treks: 2, 3, 4, 5,  or 7 days <strong>Inca Trails to Machu Picchu
                                    +</strong> <strong>Huayna Picchu Mt</strong> (extra hike at Machu Picchu)
                                or <strong>Machu Picchu Mountain</strong>(hike to Machu Picchu Mountain)
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="wtrvl-checkout_button" id="wetravel_button_widget"
                            data-env="https://www.wetravel.com" data-version="v0.3" data-uid="475729"
                            data-uuid="98724574" href="https://www.wetravel.com/checkout_embed?uuid=98724574"
                            style="background-color:#ff3f00;color:#ffffff;border: 0px;border-radius: 5px;font-family: 'Poppins', sans-serif;font-weight: 400;font-size: 14px;-webkit-font-smoothing: antialiased;text-transform: capitalize;padding: 13px 24px;text-decoration: none;text-align: center;line-height: 14px;display: inline-block; cursor: pointer;">Pay
                            Now</button>
                        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
                        <script src="https://cdn.wetravel.com/widgets/embed_checkout.js"></script>
                    </div>
                </div>
                <!-- 33 -->
                <div class="row mt-3 py-3 align-items-center border rounded">
                    <div class="col-md-8">
                        <div>
                            <h3 class="fs-6 fw-bold text-primary ">Deposit for any day Tour</h3>
                            <span class="border-start border-2  rounded-1 ps-2 d-inline-block border-primary">
                                We request a deposit of <strong>$50 USD</strong> 
                                day tours: City Tour, Sacred Valley, Maras/Moray, South Valley, Mountain Bike, Rainbow
                                Mountain.
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="wtrvl-checkout_button" id="wetravel_button_widget"
                            data-env="https://www.wetravel.com" data-version="v0.3" data-uid="475729"
                            data-uuid="63373194" href="https://www.wetravel.com/checkout_embed?uuid=63373194"
                            style="background-color:#ff3f00;color:#ffffff;border: 0px;border-radius: 5px;font-family: 'Poppins', sans-serif;font-weight: 400;font-size: 14px;-webkit-font-smoothing: antialiased;text-transform: capitalize;padding: 13px 24px;text-decoration: none;text-align: center;line-height: 14px;display: inline-block; cursor: pointer;">Pay
                            Now</button>
                        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
                        <script src="https://cdn.wetravel.com/widgets/embed_checkout.js"></script>
                    </div>
                </div>
                <!-- 44 -->
                <div class="row mt-3 py-3 align-items-center border rounded">
                    <div class="col-md-8">
                        <div>
                            <h3 class="fs-6 fw-bold text-primary ">Deposit for Any tour package with 2* or 3* Hotels
                            </h3>
                            <span class="border-start border-2  rounded-1 ps-2 d-inline-block border-primary">
                                We request a deposit of <strong>$300 USD</strong>  this amount of
                                deposit is ONLY for tours and tour packages, it does apply to treks which have hotels
                                included.
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="wtrvl-checkout_button" id="wetravel_button_widget"
                            data-env="https://www.wetravel.com" data-version="v0.3" data-uid="475729"
                            data-uuid="48014311" href="https://www.wetravel.com/checkout_embed?uuid=48014311"
                            style="background-color:#ff3f00;color:#ffffff;border: 0px;border-radius: 5px;font-family: 'Poppins', sans-serif;font-weight: 400;font-size: 14px;-webkit-font-smoothing: antialiased;text-transform: capitalize;padding: 13px 24px;text-decoration: none;text-align: center;line-height: 14px;display: inline-block; cursor: pointer;">Pay
                            Now</button>
                        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
                        <script src="https://cdn.wetravel.com/widgets/embed_checkout.js"></script>
                    </div>
                </div>
                <!-- 55 -->
                <div class="row mt-3 py-3 align-items-center border rounded">
                    <div class="col-md-8">
                        <div>
                            <h3 class="fs-6 fw-bold text-primary">Deposit for Any 5 days or more tour packages with 4*
                                or 5*
                                Hotels </h3>
                            <span class="border-start border-2  rounded-1 ps-2 d-inline-block border-primary">
                                We request a deposit of <strong>$500 USD</strong>  for 5 days or
                                more
                                tour packages with 4* or 5* hotels.
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="wtrvl-checkout_button" id="wetravel_button_widget"
                            data-env="https://www.wetravel.com" data-version="v0.3" data-uid="475729"
                            data-uuid="18249765" href="https://www.wetravel.com/checkout_embed?uuid=18249765"
                            style="background-color:#ff3f00;color:#ffffff;border: 0px;border-radius: 5px;font-family: 'Poppins', sans-serif;font-weight: 400;font-size: 14px;-webkit-font-smoothing: antialiased;text-transform: capitalize;padding: 13px 24px;text-decoration: none;text-align: center;line-height: 14px;display: inline-block; cursor: pointer;">Pay
                            Now</button>
                        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
                        <script src="https://cdn.wetravel.com/widgets/embed_checkout.js"></script>
                    </div>
                </div>
            </div>
        </div>
        <!-- end new style -->
    </section>

    <?php 
	get_footer();
?>