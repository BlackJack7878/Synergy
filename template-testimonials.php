<?php 
/* Template Name: Testimonials */
get_header();

if (get_field('en_test_mainParallax')) {
	$test_intro_parallax = $parallax_bg_style_inner_top;
}

?>

<section class="testimonials-intro rect-bottom" style="<?php echo $test_intro_parallax; ?> background-image: url('<?php the_field('en_test_mainImg'); ?>');"></section>

<section class="testimonials-reviews">
	<div class="content">
		
		<h4><?php the_field('en_test_mainSub'); ?></h4>
		<h2><?php the_field('en_test_mainHead'); ?></h2>

		<?php
		$load_more_text = get_field('en_test_mainBtnText');
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
			'post_type'       => 'testimonial',
			'posts_per_page'  => 5,
			'paged'           => $paged
			);
		$the_query = new WP_Query( $args ); 
		?>

		<script type="text/javascript">
			<?php 
			wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
				'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
				'posts' => serialize( $the_query->query_vars ), // everything about your loop is here
				'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
				'max_page' => $the_query->max_num_pages
				) ); 
			?>
		</script>

		<?php $tests = array(); $i = 0; ?>
		<?php if ($the_query->have_posts()) : ?>
			<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

				<?php $tests[$i]['num'] = $the_query->current_post; ?>
				<?php $tests[$i]['content'] = get_the_content(); ?>
				<?php $tests[$i]['author'] = get_field('test_author'); ?>
				<?php $i++; ?>

			<?php endwhile; ?>
			<?php

			if (  $the_query->max_num_pages > 1 )
				echo '<div class="en-button misha_loadmore">'. $load_more_text .'</div>';
			?>

			<div class="testimonials-reviews-list">
				<div class="testimonials-reviews-list-col left">

					<?php foreach ($tests as $item) : ?>

						<?php if ($item['num'] % 2 === 0) : ?>

							<div class="testimonials-reviews-single">
								<p class="testimonials-reviews-single-text">
									<?php echo $item['content']; ?>
								</p>
								<p class="testimonials-reviews-single-author">
									<?php echo $item['author']; ?>
								</p>
							</div>

						<?php endif; ?>

						<?php endforeach; ?>

					</div>

					<div class="testimonials-reviews-list-col right">

						<?php foreach ($tests as $item) : ?>

							<?php if ($item['num'] % 2 != 0) : ?>

								<div class="testimonials-reviews-single">
									<p class="testimonials-reviews-single-text">
										<?php echo $item['content']; ?>
									</p>
									<p class="testimonials-reviews-single-author">
										<?php echo $item['author']; ?>
									</p>
								</div>

							<?php endif; ?>

							<?php endforeach; ?>

						</div>
					</div>

				<?php endif; wp_reset_query(); ?>


			</div>
		</section>

		<?php get_footer(); ?>