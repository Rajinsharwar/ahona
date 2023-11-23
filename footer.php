  </main>
  <footer class="footer_section content-info">
    
    <div class="content-copyright bg-black">
        <div class="container">
            <div id="short-footer" class="row">
                <div class="col-xs-12 col-sm-7 copyright-holder">
                    <span class="footer-grey"><?php dynamic_sidebar('sidebar-6'); ?></span>
                </div>
                <div class="col-xs-12 col-sm-5 social-holder">
                    <ul class="footer_social mb-4">
                        <?php
                        $social_icons = array(
                            'facebook' => 'fa-facebook',
                            'twitter' => 'fa-twitter',
                            'instagram' => 'fa-instagram',
                            'linkedin' => 'fa-linkedin',
                            'youtube' => 'fa-youtube',
                        );

                        foreach ($social_icons as $key => $icon) {
                            $social_link = get_theme_mod($key . '_link', '#'); // Set the default value here
                        
                            // Check if the social link is empty or equals to "#" and skip if true
                            if ( ! empty($social_link) || $social_link === '#') {
                                echo '<li><a href="' . esc_url($social_link) . '" target="_blank"><i class="fa ' . esc_attr($icon) . '"></i></a></li>';
                            }
                        }

                        ?>
                    </ul>
                </div>
                
            </div>

            <div class="additional-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 footer-menu-items_parent">
                        <?php dynamic_sidebar('sidebar-02'); ?>
                        <?php 

                        wp_nav_menu(array(

                          'theme_location' => 'footer-one',

                          'container' => false,
                          'depth' => 1,
                          'walker' => new Walker_Nav_Primary(),
                          'menu_class' => 'unstyled footer-menu-items',

                      )

                    );

                    ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 footer-menu-items_parent">
                    <?php dynamic_sidebar('sidebar-3'); ?>
                    <?php 

                    wp_nav_menu(array(

                      'theme_location' => 'footer-two',

                      'container' => false,
                      'depth' => 1,
                      'walker' => new Walker_Nav_Primary(),
                      'menu_class' => 'unstyled footer-menu-items',

                      

                  )

                );

                ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 footer-menu-items_parent">
                <?php dynamic_sidebar('sidebar-4'); ?>
                <?php 

                wp_nav_menu(array(

                  'theme_location' => 'footer-three',

                  'container' => false,
                  'depth' => 1,
                  
                  'walker' => new Walker_Nav_Primary(),
                  'menu_class' => 'unstyled footer-menu-items',

                  

              )

            );

            ?>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-3 footer-menu-items_parent">
            <?php dynamic_sidebar('sidebar-5'); ?>
            <?php 

            wp_nav_menu(array(

              'theme_location' => 'footer-four',

              'container' => false,
              'depth' => 1,
              'walker' => new Walker_Nav_Primary(),
              'menu_class' => 'unstyled footer-menu-items',

              

          )

        );

        ?>
    </div>
</div>
</div>

</div>
</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>