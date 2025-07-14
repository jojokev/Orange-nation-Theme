<?php
/* 
 * Template Name: Availability
 * Template Post Type: post
*/
get_header();
?>
	<div class="container-xl">
		<div class="row py-3 text-availibility">
			<div class="col-lg-8">
				<div class="text_h2">
					<h1><?php the_title(); ?></h1>
				</div>
				<p>*** On May 27, 2025, the Ministry of Culture announced a significant regulatory change that affects all visitors completing any of the Inca Trail routes. This includes the 1-day, 2-day, 4-day, 5-day, and 7-day Inca Trail hikes. According to the new policy, hikers who complete any of these Inca Trail options will now be granted access only to Circuit 1 of Machu Picchu.</p>
				<p>Circuit #1; encompasses the upper section of the archaeological site, offering panoramic views and the opportunity to take the iconic postcard photo. However, it does not include access to the main archaeological complex located in the lower section, which is typically part of the traditional guided tour through Circuit 3<strong>, so, NOW</strong>, The Inca Trail hikers will need to BUY an extra ticket to explore the citadel of Machu Picchu. </p>
				<p>The Inca Trail is one of the most popular hikes in the world. Welcoming tens of thousands of visitors every year. Due to its popularity and need for preservation, the Peruvian government closely monitors and regulates its use. Therefore, it is mandatory to obtain a permit before embarking on this trail. &nbsp;There are various factors that determine the availability of permits.</p>
			</div>
			<div class="col-lg-4 d-block d-sm-none d-lg-block">
				<?php the_post_thumbnail(); ?>
			</div>
		</div>
		<div class="page_plantilla">
			<div class="row align-items-stretch py-3">
				<div class="col-lg-8 text-availibility">
					<h3>Disponibilidad del Camino Inca para 2026</h3>
					<?php echo do_shortcode('[pear_calendar type="vertical" code="IT2D,IT4D" month="8" id_tour="1536,1535" price="477,737"]');?>
				</div>
				<div class="col-lg-4">
					<div class="position-sticky top-0">
						<div class="alert alert-warning" role="alert">
							<p>Orange Nation Peru has Guaranteed and Flexible Departure Dates, we only need a minimum of 2 trekkers and a maximum of 8 for all of our listed tours.</p>
						</div>
						<div class="alert alert-warning" role="alert">
							<p><strong>Permits: </strong>All visitors who wish to hike the Inca Trail must have a permit. These permits are limited, and it is recommended to book in advance, especially during peak season (May to September).</p>
						</div>
						<div class="alert alert-warning" role="alert">
							<p><strong>How to obtain a permit:</strong> Permits for the Inca Trail can only be obtained through a licensed tour operator. You cannot obtain a permit directly from the Peruvian government. Tour operators will purchase permits on your behalf, and you must provide your passport information when booking.</p>
						</div>
						<div class="alert alert-danger" role="alert">
							<p><strong>IMPORTANT</strong></p>
							<p>If your date is sold out it is sold out for all travel agencies, there are not more permits!</p>
							<p>We need Inca Trail availability ONLY for the starting date of  your trek!</p>
						</div>
					</div>
				</div>
			</div>
			<div class="alert alert-danger" role="alert">
				<p>******The maximum number of Inca Trail permits is 500. Support staff is included within the five hundred, meaning that about 200 pemits are allocated for tourists and about 300 for cooks, porters and guides each day. Inca trail permit availability shown herein is directly provided by the Peruvian Government.</p>
			</div>
			<div class="alert alert-info" role="alert">
				<p><strong>Peak season: </strong>The peak season for the Inca Trail is from May to October.</p>
				<p><strong>Off-peak season: </strong>The off-peak season for the Inca Trail is from October to April. Permits are easier to obtain. However, this is Peru´s rainy season, so the weather is unpredictable. On the other hand, this is the perfect time to book, if the rain doesn´t bother you much and you would like to trek and visit the citadel with fewer crowds.</p>
			</div>

			<?php the_content(); ?>
			
		</div>

	</div>
	
</section>

<div class="container-xl">
	<div class="py-4">
		<?php get_template_part('template-parts/reviews') ?>
	</div>
	<div class="py-4">
		<?php get_template_part('template-parts/certificados') ?>
	</div>
</div>

<?php get_footer();?>