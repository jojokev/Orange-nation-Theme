<?php
get_header();

/*
 * Template Name: Availability
 * Template Post Type: page
 */
?>
<section>
	<div class="">
		<img src="">
		<h1>hola</h1>
	</div>

	<section>
		<div>
			<div class="Circle_step">
				<span>Step</span>
				<span>1</span>
			</div>
			<h3>Check the calendar</h3>
			<p>Make sure the government still has permits available for your start date (Permits are for your START date)</p>
		</div>
		<div>
			<div class="Circle_step">
				<span>Step</span>
				<span>2</span>
			</div>
			<h3>Check with us</h3>
			<p>Make sure the government still has permits available for your start date (Permits are for your START date)</p>
		</div>
		<div>
			<div class="Circle_step">
				<span>Step</span>
				<span>3</span>
			</div>
			<h3>Check the calendar</h3>
			<p>Make sure the government still has permits available for your start date (Permits are for your START date)</p>
		</div>
	</section>
	
	
	<h5>
		ORANGE NATION HAS GUARANTEED AND FLEXIBLE DEPARTURE DATES <br>WE ONLY NEED A MINIMUM OF 2 TREKKERS AND A MAXIMUM OF 10 FOR ALL OF OUR LISTED TOURS
	</h5>
	<hr>
	

	
	<div class="SectionColumnsFull">
		<div>
			<h2 style="font-size:22px; margin:0 auto 20px auto;">
				1 OR 2 DAYS SHORT INCA TRAIL AVAILABILITY
			</h2>
			<h5 style="font-size:15px;">
				CLICK EACH MONTH TO CHECK THE AVAILABILITY ONLY FOR THE 1 OR 2 DAYS SHORT INCA TRAIL
			</h5>
			<hr>
			
			<?php echo do_shortcode('[SamCalendarAlternative rtu="4" package="SIT2D" lang="en"]'); ?>
		</div>
		<div>
			<h2 style="font-size:22px; margin:0 auto 20px auto;">
				3, 4, 5, 7, DAYS CLASSIC INCA TRAIL AVAILABILITY
			</h2>
			<h5 style="font-size:15px;">
				CLICK EACH MONTH TO CHECK THE AVAILABILITY ONLY FOR THE 3, 4, 5, 7 DAYS INCA TRAIL
			</h5>
			<hr>
			
			<?php 
				$fecha 			= date('Y-m-j');
				$nuevafecha 	= strtotime ( '+6 month' , strtotime ( $fecha ) ) ;
				$nuevafecha 	= date ( 'm' , $nuevafecha );
				// echo do_shortcode('[SamCalendarAlternative month="'.$nuevafecha.'" rtu="1" package="IT18" lang="en"]'); 
				echo do_shortcode('[Calendar]'); 
			?>
		</div>
	</div>
	
	<div class="alert alert-info">
		<h2 style="text-align:center !important; font-size:20px !important; color:inherit !important; margin:0 0 20px 0 !important;">
			IMPORTANT
		</h2>
		<p class="alert-info">
			If your date is sold out it is sold out for all travel agencies, there are not more permits!
		<br>
			We need Inca Trail availability ONLY for the starting date of  your trek!
		<br>
			February 2018 – The 2, 3, 4, 5, 7 days Inca Trail is closed for maintenance
		<br>
			We can ONLY operate the LARES TREK to Machu Picchu and TOURS to Machu Picchu during February.
		</p>
	</div>
	
</section>

<section>
	<h2>
		WHAT TO DO IF THE CLASSIC INCA TRAIL IS SOLD OUT
	</h2>
	<h5>
		FOR YOUR DESIRED DATES?
	</h5>
	<hr>
	
	<div>
		<?php //the_content();?>
	</div>
</section>


<?php
/*

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 sidebar_left">
			<article>
				<?php the_content();?>
			</article>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar_right">
			<?php get_sidebar();?>
		</div>
	</div>

 *
 * <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<?php the_content();?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<?php get_sidebar();?>
		</div>
	</div>
*/
?>


<?php get_footer();?>