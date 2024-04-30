<?php get_header(); ?>
	<?php $featuredImg = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
	<div class="single_header" style="background: url('<?php echo esc_url($featuredImg) ?>') no-repeat;background-size: cover;background-position: center center;">
		<div class="container">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>
	</div>
<div class="cell-module common_section">
	<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 p-0">
			<?php 

			if( have_posts() ):
				
				while( have_posts() ): the_post(); ?>
				<!-- 	<h1 class="global_heading"><?php the_title(); ?></h1> -->
					<p><?php the_content(); ?></p>
				<?php endwhile;
			endif;	
			?>
		</div>
	</div>
</div>
</div>
<div class="d-none">
  <?php
wp_link_pages(array(
    'before' => '<div class="pagination">' . __('Pages:', 'ahona'),
    'after'  => '</div>',
));
?>

</div>

<?php get_footer(); ?>