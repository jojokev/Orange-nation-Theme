<div class="container_booking py-4">
    <div class="text_h2">
        <h2>Steps To Book With Orange Nation</h2>
    </div>
    <div class="item_booking">
        <div class="item_2">
            <h3>
                FILL OUT BOOKING FORM
            </h3>
            <div>
                <p>
                    A. If you are booking for the Classic Inca Trail of 4, 5 and 7 days, with ORANGE Nation
                    Peru,
                    please
                    click on the<a href="https://www.orange-nation.com/availability-inca-trail-real-time"> Inca Trail Availability</a>. Check your start date before booking to make sure the
                    government still has permits available. You only need a permit for your start date (not each day trekking) and we will secure the permit on your behalf. If you are a single trekker, please
                    check with us at orangenationperu@gmail.com for availability of a group.
                </p>
            </div>
        </div>
        <div class="item_2">
            <h3>
                SEND YOUR DEPOSIT
            </h3>
            <div>
                <p>A. For treks and tours without hotels, the deposit is $200 + $11 service fee = $211 per
                    person.
                </p>
                <p>B. For all tours that include hotels, the deposit is $300 + $16 service fee = $316 per
                    person.
                </p>
                <p>C. Please make your deposit by clicking on paypal-icon&nbsp;
                <a href="https://www.orange-nation.com/payments-with-orange-nation/">
                    <img src="https://www.orange-nation.com/wp-content/uploads/2018/08/pay-pal.png" alt="PayPal"/>
                </a>
                </p>
            </div>
        </div>
        <div class="item_2">
            <h3>CONFIRMATION &amp; TRAVEL INVOICE</h3>
            <div>
                <p>A. When we have received your booking form and your deposit, we will do a final confirmation
                    and
                    send
                    you a travel invoice.</p>
                <p>B. Please be sure to review your confirmation and travel invoice for accuracy.</p>
            </div>
        </div>
    </div>
</div>
<div class="container py-4">
    <div class="text_h2">
        <h1>Booking Form - <span id="storedTitle"></span></h1>
    </div>
    <div id="app" tourTitle="<?php $idTour = isset($_GET['uuid']) ? intval($_GET['uuid']) : null; echo $idTour?get_the_title($idTour):"";?>"></div>
    <script>
        const titleStorageTour = document.getElementById('app').getAttribute('tourTitle');
        const storedTitle = "";
        if(titleStorageTour){
            localStorage.setItem('tour',titleStorageTour);
        }
        storedTitle = localStorage.getItem('tour');
        document.addEventListener('DOMContentLoaded', (event) => {
            const titleElement = document.getElementById('storedTitle');
            if (storedTitle) {
                titleElement.textContent = storedTitle;
            } else {
                titleElement.textContent = 'No stored title';
            }

            console.log(storedTitle);
        });
    </script>
</div>
<div class="container-xl">
    <div class="py-4">
        <?php get_template_part('template-parts/reviews') ?>
    </div>
    <div class="py-4">
        <?php get_template_part('template-parts/certificados') ?>
    </div>
</div>
