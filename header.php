<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>

	</head> 
	
	<?php 
		
		if( is_front_page() ):
			$ahona_classes = array( 'home-class' );
		else:
			$ahona_classes = array( 'innerpage-class' );
		endif;
		
	?>

	<body <?php body_class( $ahona_classes ); ?>>
		 <?php wp_body_open(); ?>
		 
<a class="screen-reader-text" href="#main-content">Skip to main content</a>

<?php
$anchor_text_color = get_theme_mod('anchor_text_color', '#686a6f');
$header_background_color = get_theme_mod('header_background_color', '#eeeeee');
?>
		<header class="top-header <?php

if ( is_user_logged_in() ) {
    echo 'login_header';
} else {
    echo '';
}

?>" style="background-color: <?php echo esc_attr($header_background_color); ?>">
			<div class="container">
				<div class="left_logo">
					<?php
					if ( function_exists( 'the_custom_logo' ) ) {
					    $custom_logo_id = get_theme_mod( 'custom_logo' );
					    $logo_url = wp_get_attachment_image_src( $custom_logo_id , 'full' );

						if ($custom_logo_id) {
							echo '<a href="' . esc_url(home_url('/')) . '"><img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '"></a>';
						} else {
							echo '<a style="color: ' . esc_attr($anchor_text_color) . ';" href="' . esc_url(home_url('/')) . '">' . esc_html(get_bloginfo('name')) . '</a>';
						}						
					}
					?>
				</div>

				<div id="nav-icon1" class="mobile-menu-hamber">
				  <span style="background-color: <?php echo esc_attr($anchor_text_color) ?>;"></span>
				  <span style="background-color: <?php echo esc_attr($anchor_text_color) ?>;"></span>
				  <span style="background-color: <?php echo esc_attr($anchor_text_color) ?>;"></span>
				</div>
				
				<nav class="navbar desktop_menu">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary-menu',
							'menu_id' => 'primary-menu',
							'walker' => new Walker_Nav_Primary(),
							'container' => false,
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'link_before' => '<span style="color: ' . esc_attr($anchor_text_color) . ';">',
							'link_after' => '</span>',
						));
        ?>
				</nav>
		<div class="navbar2 mobile_menu mobile-menu">
				    
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary-menu',
							'menu_id' => 'primary-menu',
							'walker' => new Walker_Nav_Primary(),
							'container' => false,
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'link_before' => '<span style="color: ' . esc_attr($anchor_text_color) . ';">',
							'link_after' => '</span>',
						));
        ?>
				</div>
			</div>
		</header>
		<main id="main-content">
    

		
			