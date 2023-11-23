<div class="col-xs-<?php echo esc_attr($column); ?>">
	<?php if( has_post_thumbnail() ): ?>

		<div class="thumbnail">234322352<?php the_post_thumbnail('thumbnail'); ?></div>

	<?php endif; ?>
	
	<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
	
	<small><?php the_category(' '); ?></small>
</div>