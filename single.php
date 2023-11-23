<?php get_header(); ?>

	<?php $featuredImg = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
	<div class="single_header" style="background: url('<?php echo esc_url($featuredImg) ?>') no-repeat;background-size: cover;background-position: center center;">
		<div class="container">
			<div class="catename_group">
				<?php $username = get_userdata( $post->post_author ); ?>    
				<?php 

					$categories = get_categories();

					$counter = 0;
					$limit = 3;

					foreach ($categories as $category) {
					    if ($counter >= $limit) {
					        break; 
					    }

					    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="cat_name">' . esc_html($category->name) . '</a>';

					    $counter++;
					}

				 ?>
			</div>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="author_bx">

				<b><?php echo esc_html($username->user_nicename); ?></b> on <span><?php echo esc_html(get_the_date()); ?></span> - <?php
        $comment_count = get_comments_number();
		printf(
			esc_html(
				/* translators: The total number of comments on the Single post */
				_n(
					'%d Comment',
					'%d Comments',
					$comment_count,
					'ahona'
				)
			),
			esc_html($comment_count)
		);			
        ?>
			</div>
		</div>
	</div>
<div class="single_page">

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?php 
			
			if( have_posts() ):
				
				while( have_posts() ): the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
					</article>

				<?php endwhile;
				
			endif;
					
			?>
	
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<hr>
			<div class="media single-author-container">
				<div class="media-left author-image-container">
					<?php 
						$theAuthorId = get_the_author_meta('ID');
						$getUserUrl = get_avatar_url ($theAuthorId);
						$getUserUrl = get_avatar_url($theAuthorId, array ('size' => 500));
					 ?>
					<img alt="" src="<?php echo esc_url(get_avatar_url($theAuthorId, array('size' => 500))); ?>" >
				</div>
				<div class="media-body">
					<h4 class="media-heading"><?php the_author(); ?> </h4>
					<p><?php echo wp_kses_post(nl2br(get_the_author_meta('description'))); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<section class="pagination_section">
	<div class="container">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="lft_link">
			<div class="inline-flex">
				<div class="flex aic">
					<span class="fa fa-angle-up"></span>
				</div>
				<div>
					<span class="articles aic"><?php echo esc_html__('Show all', 'ahona'); ?> <strong><?php echo esc_html__('Articles', 'ahona'); ?></strong></span>
				</div>
			</div>
		</a>
		<div class="next_blog">
			<span class="section-title"><?php echo esc_html__('Next blogpost:', 'ahona'); ?></span>
			<?php next_post_link(); ?>
		</div>
	</div>
</section>
<div class="d-none">
  <?php
wp_link_pages(array(
    'before' => '<div class="pagination">' . __('Pages:', 'ahona'),
    'after'  => '</div>',
));
?>

</div>
<section class="comments_section common_section">
	<div class="container">
		<div class="comment_parent">
		
		<div id="commentform3">
		<?php
			if (comments_open()) {
				comments_template();
			} else {
				echo '<h5 class="text-center">' . esc_html__('Sorry, Comments are closed!', 'ahona') . '</h5>';
			}
		?>
		</div>
		</div>
		<div class="d-none">
		<?php
		comment_form(); 
wp_list_comments();
?>
<?php
paginate_comments_links();
?>
</div>
		

	</div>
</section>

<?php

$categories = get_the_category();

if ($categories) {
    $category_ids = wp_list_pluck($categories, 'term_id');

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'category__in' => $category_ids,
        'orderby' => 'rand',
    );
    
    $related_posts_query = new WP_Query($args);
    
    if ($related_posts_query->have_posts()) :?>
		<section class="related_post">
			<div class="container">
				<h3 class="text-center"><?php echo esc_html__('You may also like...', 'ahona'); ?></h3>
					<div class="row">
       <?php
        
        while ($related_posts_query->have_posts()) :
            $related_posts_query->the_post(); ?>
           
					<div class="col-sm-4 col-md-4">
			   <a href="<?php echo esc_url(get_permalink()); ?>" class="post_block">
			     <div class="post_block_img">
			      <?php 
			          $categories = get_the_category();

			          if (!empty($categories)) {
			              $first_category = reset($categories);
			              
			              echo '<div class="cat_name">';
			              echo '' . esc_html($first_category->name) . '';
			              echo '</div>';
			          }
			           ?>
			      <?php $featuredImgPost = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
			       <div class="thumbnail-background" style="background-image: url(<?php echo esc_url($featuredImgPost) ?>)"></div>
			     </div>
			     <div class="post_block_content">
			       <div class="author_name"><?php echo get_the_author(); ?></div>
			       <h3><?php the_title() ?></h3>
			       <div class="date"><?php echo esc_html(date_i18n(get_option('date_format'), strtotime(get_the_date()))); ?></div>
			     </div>
			   </a>
			 </div>
	<?php 
        endwhile;

        wp_reset_postdata();
    endif;
}
?>



				
			</div>
	</div>
</section>

<div class="single-media-sidebar">
    <ul>
		<li><a href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode(get_permalink())); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li><a href="<?php echo esc_url('https://twitter.com/intent/tweet?text=' . rawurlencode(get_permalink())); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li><a href="<?php echo esc_url('https://www.linkedin.com/sharing/share-offsite/?url=' . rawurlencode(get_permalink())); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
	</ul>

</div>

<?php get_footer(); ?>