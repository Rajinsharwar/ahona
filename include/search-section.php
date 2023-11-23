<div class="container">

   <h3><?php esc_html_e('All Articles', 'ahona'); ?></h3>

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
        
        <?php get_search_form();?>

    </div>

   </div>

</div>