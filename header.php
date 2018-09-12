<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name'); ?><?php wp_title("|", true, "left"); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body>

	<header class="header">
		<div class="header-wrapper">
			<div class="header-col">
				<div class="header-logo">
					<a href="/">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/body/logo.png">
					</a>
				</div>
				<?php en_header_menu(); ?>
			</div>
			<div class="header-col">
				<p>(855) 832-6768</p>
				<a href="#" class="en-button">Get a free quote</a>
			</div>
		</div>
		<i class="fa fa-bars"></i>
		<div class="header-mob">
			<div class="header-mob-wrapper">
				<?php en_header_menu(); ?>
			</div>
		</div>
	</header>
	
	<div class="quote">
		<div class="quote-wrapper">
			
			<div class="quote-box">
				<i class="fa fa-times"></i>
				<?php echo do_shortcode(get_field('en_home_introCode', get_option('page_on_front'))); ?>
			</div>

		</div>
	</div>

	<?php 
		global $parallax_bg_style;
		global $parallax_bg_style_center;
		global $parallax_bg_style_inner_top;
		$parallax_bg_style = "background-attachment: fixed;";
		$parallax_bg_style_inner_top = "background-attachment: fixed;
		background-size: 100% 380px;
		background-position: top center;";
		$parallax_bg_style_center = "background-attachment: fixed;
		background-size: 100% 100%;
		background-position: center;";
	?>