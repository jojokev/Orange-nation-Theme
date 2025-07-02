<div class="container-xl">
    <div class="text_h2">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="page_plantilla">
        <?php the_content(); ?>
    </div>
    <div class="content_contact">
        <div class="item_contact">
            <div class="contact_img">
                <?php echo the_post_thumbnail('full-size') ?>
            </div>
            <h5>Address</h5>
            <p>
                Garcilaso Street 210 , Office Nº:207 (2and Floor) in the la CASA DEL ABUELO shopping center | cusco - peru
            </p>
            <p><strong>Drop a line: </strong><a href="tel:+51992126224">+51 992 126 224</a></p>
            <p><strong>Whatsapp: </strong><a href="https://wa.link/tszhgv" target="_black">+51 992 126 224</a></p>
            <h5>Office Hours</h5>
            <p>
                Monday to Friday 9:00 - 13:00 H & 15:00 - 19:00 H <br>
                Saturday 9:00 to 13:00 H & From 17:00 to 19:00 H
            </p>
            <h5>Email Address</h5>
            <a href="mailto:orangenationperu@gmail.com">orangenationperu@gmail.com</a>
        </div>
        <form class="item_contact" id="contact_form">
            <div class="form_contact">
                <div class="item_form">
                    <label for="">First Name * </label>
                    <input type="text" name="nombre">
                </div>
                <div class="item_form">
                    <label for="">Last Name * </label>
                    <input type="text" name="apellidos">
                </div>
                <div class="item_form">
                    <label for="">Email Address * </label>
                    <input type="text" name="email">
                </div>
                <div class="item_form">
                    <label for="">Phone Number * </label>
                    <input type="text" name="telefono">
                </div>
                <div class="item_form">
                    <label for="">Message * </label>
                    <textarea name="mensaje"></textarea>
                </div>
                <div class="item_form">
                    <button type="button" class="btn_contact">Send message</button>
                </div>
            </div>
            <div class="loader_msg" >
                <img src="<?php echo IMGS_URL ?>loader.webp" alt="">
                <span>Enviando mensaje...</span>
            </div>
        </form>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d1631.043858449265!2d-71.98065167207109!3d-13.51729956270593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e2!4m5!1s0x916dd6739cd7f175%3A0x27c9a9082fc6343!2sPlaza%20Mayor%20De%20Cuzco%2C%20Del%20Medio%2C%20Cusco!3m2!1d-13.516772!2d-71.9787231!4m3!3m2!1d-13.517321899999999!2d-71.98058499999999!5e0!3m2!1ses!2spe!4v1687189090136!5m2!1ses!2spe" width="100%" height="450" style="border:0;margin-top: 4rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <?php get_template_part('template-parts/certificados') ?>
</div>