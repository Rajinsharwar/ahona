<?php get_header(); ?>
<div class="head_articles">
    <?php
        $args = array(
            'post_type' => 'post', 
            'posts_per_page' => 1,
        );
        $postc = get_posts($args);
        $post_count = count($postc);
        if ($post_count > 0) { ?>
          <?php get_template_part('include/search-section'); ?>
          <?php
        }
    ?>
  </div>
<section class="post_section section_color">
  <div class="container">
     <div class="row">
     <?php 
        // Query for sticky posts
          $sticky_posts = get_option('sticky_posts');

          if (!empty($sticky_posts)) {
            $sticky_args = array(
              'post__in'       => $sticky_posts,
            );

            $sticky_query = new WP_Query($sticky_args);

            // Output sticky posts
            while ($sticky_query->have_posts()) : $sticky_query->the_post();
            endwhile; 
            wp_reset_postdata(); 
            $sticky_post_count = $sticky_query->post_count;
          } else {
            $sticky_post_count = 0;
          }

          $currentpage = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // Get the current page number
          $argsposttwo  = array(
              'post_type' => 'post',
              'posts_per_page' => 12,
              'paged'          => $currentpage,

          );

          // If there are sticky posts, adjust the posts_per_page for regular posts
          if (($sticky_post_count > 0) && ($currentpage == 1)) {
            $argsposttwo['posts_per_page'] -= $sticky_post_count;

          }
          $loopposttwo = new WP_Query($argsposttwo); ?>

          <?php 
          if ( $loopposttwo->have_posts() ) :
              while ( $loopposttwo->have_posts() ) : $loopposttwo->the_post(); ?>
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
                 
              <?php
              endwhile;
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

