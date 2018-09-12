<?php 
/* Template Name: Contact */
get_header();

if (get_field('en_cont_mainParallax')) {
	$cont_intro_parallax = $parallax_bg_style_inner_top;
}

?>

<section class="contact-intro rect-bottom" style="<?php echo $cont_intro_parallax; ?> background-image: url('<?php the_field('en_cont_mainImg'); ?>');"></section>

<section class="contact-us">
	<div class="content-wide">
		
		<h2><?php the_field('en_cont_mainHead'); ?></h2>

		<div class="contact-us-row">
			<div class="contact-us-col"><?php echo do_shortcode(get_field('en_cont_mainCode')); ?></div>
			<div class="contact-us-col">

				<h4><?php the_field('en_cont_mainSub1'); ?></h4>
				<ul>
					<li><?php the_field('en_cont_mainPhone'); ?></li>
					<li><?php the_field('en_cont_mainLic'); ?></li>
				</ul>

				<h4><?php the_field('en_cont_mainSub2'); ?></h4>
				<table>
					<tbody>

						<?php if (have_rows('en_cont_mainTime')) : ?>
							<?php while ( have_rows('en_cont_mainTime') ) : the_row(); ?>

								<tr>
									<td><?php the_sub_field('day'); ?></td>
									<td><?php the_sub_field('from'); ?> - <?php the_sub_field('to'); ?></td>
								</tr>

							<?php endwhile; ?>
						<?php endif; ?>
						
					</tbody>
				</table>

			</div>
		</div>

	</div>
</section>

<section class="contact-map rect-top">
	<div class="content-wide">
		<div class="contact-map-block">
			<h4><?php the_field('en_cont_mapVisit'); ?></h4>
			<span><?php the_field('en_cont_mapAddr'); ?></span>
		</div>
	</div>
	<div id="map" data-lat="<?php echo get_field('en_cont_mapMap')['lat']; ?>" data-lng="<?php echo get_field('en_cont_mapMap')['lng']; ?>"></div>
</section>

<?php get_footer(); ?>