<?php get_header(); ?>
  <div class="head_articles">
<div class="container">

   <h3><?php single_cat_title(); ?> </h3>

   <div class="head_search search-bar-container">
      <div class="dropdown cat_dropdown">
          <div class="categorymneu">
            <button type="button" class="menu-toggle"><?php esc_html_e( 'Category', 'ahona' ); ?><span class="fa fa-angle-down"></span></button>
         </div>
          <div class="dropdown-menu">
            <?php 

               $categories = get_categories();

               $counter = 0;
               $limit = 3; 

               foreach ($categories as $category) {
                   if ($counter >= $limit) {
                       break; 
                   }

                   echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="dropdown-item">' . esc_html($category->name) . '</a>';

                   $counter++;
               }

             ?>
          </div>
        </div>
     <div class="search">

        <form method="get" action="<?php echo esc_url(home_url('/')); ?>">

            <i class="search-icon fa fa-search"></i>

            <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search', 'ahona'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php esc_attr_e('Search', 'ahona'); ?>" />

        </form>

    </div>

   </div>

</div>
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

