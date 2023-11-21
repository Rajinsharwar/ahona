<?php get_header(); ?>

<img class="img-404" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/404-error.svg'); ?>" alt="404 Error Image">
	<p class="error-text"><?php esc_html_e('Please check that the Web site address is spelled correctly.', 'ahona'); ?></p>
<div class="error-btn1">
<a class="error-callback" href="<?php echo esc_url( home_url( '/' ) ); ?>">Go to Homepage</a>
</div>
</br>

<?php get_footer(); ?>