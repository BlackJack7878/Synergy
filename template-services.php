<?php 
/* Template Name: Services */
get_header();

if (get_field('en_serv_mainParallax')) {
	$serv_main_parallax = $parallax_bg_style_inner_top;
}
if (get_field('en_serv_estParallax')) {
	$serv_estimate_parallax = $parallax_bg_style_center;
}

?>

<section class="service-intro rect-bottom" style="<?php echo $serv_main_parallax; ?> background-image: url('<?php the_field('en_serv_mainImg'); ?>');"></section>

<section class="service-list">
	<div class="content">
		
		<h4><?php the_field('en_serv_mainSub'); ?></h4>
		<h2><?php the_field('en_serv_mainHead'); ?></h2>
		<p><?php the_field('en_serv_mainText'); ?></p>

		<ul>

			<?php if (have_rows('en_serv_list')) : ?>
				<?php while ( have_rows('en_serv_list') ) : the_row(); ?>

					<li style="background-image: url('<?php the_sub_field('image'); ?>');">
					<?php the_sub_field('text'); ?>
					</li>

				<?php endwhile; ?>
			<?php endif; ?>
			
		</ul>

	</div>
</section>

<section class="service-today rect-top" style="<?php echo $serv_estimate_parallax; ?> background-image: url('<?php the_field('en_serv_estImg'); ?>');">
	<div class="service-today-overlay"></div>
	<div class="content-wide">
		
		<h2><?php the_field('en_serv_estHead'); ?></h2>
		<a href="<?php the_field('en_serv_estBtnLink'); ?>" class="en-button"><?php the_field('en_serv_estBtnText'); ?></a>

	</div>
</section>

<?php get_footer(); ?>