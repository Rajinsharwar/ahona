<div class="container">

   <h3>All Articles</h3>

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

        <form  method="get" action="<?php echo esc_url(home_url('/')); ?>">

            <i class="search-icon fa fa-search"></i>

            <input type="search" class="search-field" placeholder="<?php echo esc_attr(__( 'Search', 'ahona' )); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php esc_attr_e( 'Search', 'ahona' ); ?>" />

          </form>

    </div>

   </div>

</div>