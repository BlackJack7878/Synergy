<?php 
/* Template Name: About */
get_header();

if (get_field('en_about_aboutParallax')) {
	$about_main_parallax = $parallax_bg_style_inner_top;
}
if (get_field('en_about_servParallax')) {
	$about_serv_parallax = $parallax_bg_style;
}

?>

<section class="about-intro rect-bottom" style="<?php echo $about_main_parallax; ?> background-image: url('<?php the_field('en_about_aboutImg'); ?>');"></section>

<section class="about-info">
	<div class="content">
		
		<h4><?php the_field('en_about_aboutSub'); ?></h4>
		<h2><?php the_field('en_about_aboutHead'); ?></h2>
		<p><?php the_field('en_about_aboutText'); ?></p>

		<div class="about-info-slider swiper-container" id="about-info-slider">
			<div class="swiper-wrapper">

				<?php if (have_rows('en_about_aboutSlider')) : ?>
					<?php while ( have_rows('en_about_aboutSlider') ) : the_row(); ?>

						<div class="swiper-slide">
							<div class="about-info-image-wrapper">
								<div class="about-info-image">
								<img src="<?php the_sub_field('image'); ?>">
								</div>
							</div>
						</div>

					<?php endwhile; ?>
				<?php endif; ?>

			</div>

		</div>
		<div class="about-info-slider-dots swiper-pagination"></div>

	</div>
</section>

<section class="about-more rect-bottom-dark" style="<?php echo $about_serv_parallax; ?> background-image: url('<?php the_field('en_about_servImg'); ?>');">
	<div class="about-more-layout"></div>
	<div class="content">
		
		<h2><?php the_field('en_about_servHead'); ?></h2>
		<p><?php the_field('en_about_servText'); ?></p>
		<a href="<?php the_field('en_about_servBtnLink'); ?>" class="en-button"><?php the_field('en_about_servBtnText'); ?></a>

	</div>
</section>


<?php get_footer(); ?>