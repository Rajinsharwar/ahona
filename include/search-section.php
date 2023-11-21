<div class="container">

   <h3>All Articles</h3>

   <div class="head_search search-bar-container">
      <div class="dropdown cat_dropdown">
          <div class="categorymneu">
            Category <button type="button" class="menu-toggle"><span class="fa fa-angle-down"></span></button>
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

                   echo '<a href="' . get_category_link($category->term_id) . '" class="dropdown-item">' . $category->name . '</a>';

                   $counter++;
               }

             ?>
          </div>
        </div>
     <div class="search">

        <form  method="get" action="<?php echo esc_url(home_url('/')); ?>">

            <i class="search-icon fa fa-search"></i>

            <input type="search" class="search-field" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Search" />

          </form>

    </div>

   </div>

</div>