<?php 
/* Template Name: Homepage */
get_header();

if (get_field('en_home_introParallax')) {
	$main_intro_parallax = $parallax_bg_style;
}
if (get_field('en_home_whyParallax')) {
	$main_why_parallax = $parallax_bg_style_center;
}
if (get_field('en_home_saveParallax')) {
	$main_roof_parallax = $parallax_bg_style;
}

?>

<section class="main-intro rect-bottom" style="<?php echo $main_intro_parallax; ?> background-image: url('<?php the_field('en_home_introImg'); ?>');">
	<div class="content-wide">
		
		<h1><?php the_field('en_home_introText'); ?></h1>

		<div class="main-intro-row">
			<form>
				<input type="number" placeholder="Enter Your Zip Code">
				<button type="submit" class="en-button">Get a free quote</button>
			</form>
			<div class="main-intro-circle">
				<p><?php the_field('en_home_introCircle'); ?></p>
			</div>
		</div>

	</div>
</section>

<section class="main-services">
	<div class="content">

		<h4><?php the_field('en_home_servSub'); ?></h4>
		<h2><?php the_field('en_home_servHead'); ?></h2>
		<p><?php the_field('en_home_servText'); ?></p>

		<?php if (have_rows('en_home_servArr')) : ?>
			<?php while ( have_rows('en_home_servArr') ) : the_row(); ?>

				<div class="main-services-item">
					<div class="main-services-item-circle" style="background-image: url('<?php the_sub_field('image'); ?>');"></div>
					<p><?php the_sub_field('text'); ?></p>
				</div>

			<?php endwhile;?>
		<?php endif; ?>


		<a href="<?php the_field('en_home_servBtnLink'); ?>" class="en-button"><?php the_field('en_home_servBtnText'); ?></a>

	</div>
</section>

<section class="main-why rect-top" style="<?php echo $main_why_parallax; ?> background-image: url('<?php the_field('en_home_whyImg'); ?>');">
	<div class="main-why-layout"></div>
	<div class="content">
		
		<h4><?php the_field('en_home_whySub'); ?></h4>
		<h2><?php the_field('en_home_whyHead'); ?></h2>
		<p>
			<?php the_field('en_home_whyText'); ?>
		</p>
		<a href="<?php the_field('en_home_whyBtnLink'); ?>" class="en-button"><?php the_field('en_home_whyBtnText'); ?></a>

	</div>
</section>

<section class="main-roof" style="<?php echo $main_roof_parallax; ?> background-image: url('<?php the_field('en_home_saveImg'); ?>');">
	
	<div class="main-roof-layout"></div>
	<div class="content">
		
		<h2><?php the_field('en_home_saveHead'); ?></h2>
		<a href="<?php the_field('en_home_saveBtnLink'); ?>" class="en-button"><?php the_field('en_home_saveBtnText'); ?></a>

	</div>

</section>

<section class="main-spend">
	<div class="content">
		
		<h2><?php the_field('en_home_howHead'); ?></h2>
		<div class="main-spend-line">
			<div class="main-spend-line-passed"></div>
			<div class="main-spend-line-circle">
				<div class="main-spend-line-text">$<span data-number="200"></span> - <span data-number="270"></span> per month</div>
			</div>
		</div>
		<div class="main-spend-cost">
			<span>$100</span>
			<span>$200</span>
			<span>$300</span>
			<span>$400</span>
			<span>$500</span>
		</div>

	</div>
</section>

<section class="main-slider">
	<div class="content">
		
		<h4><?php the_field('en_home_testSub'); ?></h4>
		<h2><?php the_field('en_home_testHead'); ?></h2>
		<a href="<?php the_field('en_home_testBtnLink'); ?>" class="en-button"><?php the_field('en_home_testBtnText'); ?></a>

		<div class="swiper-container" id="main-review-slider">
			<div class="swiper-wrapper">

				<?php 
				$args = array(
					'post_type'       => 'testimonial',
					'posts_per_page'  => get_field('en_home_testNum'),
					);
				$the_query = new WP_Query( $args );
				?>

				<?php if ($the_query->have_posts()) : ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

						<div class="swiper-slide">
							<p><?php the_content(); ?></p>
							<div class="swiper-slide-quote">
								<span><?php the_field('test_author'); ?></span>
							</div>
						</div>

					<?php endwhile; ?>
				<?php endif; wp_reset_query(); ?>

			</div>

			<div class="main-slider-review-dots swiper-pagination"></div>
		</div>

	</div>
</section>

<section class="main-partners">
	<div class="content-wide">
		
		<h2><?php the_field('en_home_compHead'); ?></h2>
		<div class="main-partners-row">
			<img src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-1.png">
			<img src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-2.png">
			<img src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-3.png">
			<img src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-4.png">
		</div>
		<div class="main-partners-row main-partners-row-short">
			<img src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-5.png">
			<div>
				<div class="main-partners-row">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-6.png">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-7.png">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-8.png">
				</div>
				<div class="main-partners-row main-partners-row-last">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-9.png">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-10.png">
					<a href="#"><img class="main-partners-mob-scale" alt="Pick My Solar Approved Badge" src="<?php bloginfo('template_url'); ?>/assets/img/body/firm-11.png"></a>
				</div>
			</div>
		</div>

	</div>
</section>


<?php get_footer() ?>