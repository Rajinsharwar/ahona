<?php get_header(); ?>
<div class="head_articles">
  <?php get_template_part('include/search-section'); ?>
  </div>
<section class="post_section section_color">
  <div class="container">
     <div class="row">
     	<?php 
			
			if( have_posts() ):
				
				while( have_posts() ): the_post(); ?>
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
                       <div class="date"><?php echo get_the_date(); ?></div>
                     </div>
                   </a>
                 </div>
				<?php endwhile;
			endif;
			wp_reset_postdata();
			?>
     </div>

  </div>
</section>

<section class="pagination_bottom">
  <?php
        
        the_posts_pagination(array(
            'prev_text' => __('Previous', 'ahona'),
            'next_text' => __('Next', 'ahona'),
        ));
        ?>

</section>
<?php get_footer(); ?>