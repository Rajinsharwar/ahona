<?php

/*
	Include scripts
*/
function ahona_script_enqueue() {
	$suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';

	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), ahona_theme_version(), 'all');
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style' . $suffix . '.css', array(), ahona_theme_version(), 'all');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive' . $suffix . '.css', array(), ahona_theme_version(), 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), ahona_theme_version(), 'all');
	wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom' . $suffix. '.js', array('jquery'), ahona_theme_version(), true);
	wp_enqueue_script('link-preview-script', get_template_directory_uri() . '/assets/js/link-preview' . $suffix. '.js', array('jquery'), ahona_theme_version(), true);

    wp_localize_script('link-preview-script', 'link_preview_vars', array(
        'mshots_url' => 'https://s0.wp.com/mshots/v1/',
        'width' => (get_theme_mod('ahona_live_preview_box_size') !== false) ? get_theme_mod('ahona_live_preview_box_size') : 300,
        'excluded_elements' => get_theme_mod('ahona_live_preview_excluded_elements'),
        'excluded_classes' => get_theme_mod('ahona_live_preview_excluded_classes'),
        'excluded_ids' => get_theme_mod('ahona_live_preview_excluded_ids'),
    ));
}
add_action( 'wp_enqueue_scripts', 'ahona_script_enqueue');

function ahona_custom_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'ahona_custom_editor_styles' );

//Get Theme version
function ahona_theme_version() {
    $theme = wp_get_theme();
    return $theme->get('Version');
}

//Add nav menu in Navigation Bar
function ahona_add_nav_menus() {
    register_nav_menus( array(
        'primary-menu'=>'Header Menu',
        'footer-one'=> 'footer Menu1',
        'footer-two'=> 'footer Menu2',
        'footer-three'=> 'footer Menu3',
        'footer-four'=> 'footer Menu4',

    ));
}
add_action('init', 'ahona_add_nav_menus');

/*
	 Theme support function
*/

add_theme_support( 'wp-block-styles' );
add_theme_support( 'responsive-embeds' );
add_theme_support( "align-wide" );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support('post-thumbnails');
add_theme_support('html5',array('search-form'));
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );
add_action( 'after_setup_theme', 'ahona_woocommerce_support' );
function ahona_woocommerce_support() {
   add_theme_support( 'woocommerce' );
} 

add_theme_support( 'custom-header', array(
    'width'           => 1200,  
    'height'          => 600,   
    'flex-width'      => true,  
    'flex-height'     => true,  
    'header-text'     => false, 
) );

add_theme_support( 'custom-background', array(
    'default-color' => 'ffffff', 
    'default-image' => '',       
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
) );


/*
	Sidebar function
*/
function ahona_widget_setup() {
	
	register_sidebar(
		array(	
			'name'	=> 'Sidebar',
			'id'	=> 'sidebar-1',
			'class'	=> 'custom',
			'description' => 'Standard Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
	
}
add_action('widgets_init','ahona_widget_setup');

function ahona_widget_setup2() {
	
	register_sidebar(
		array(	
			'name'	=> 'Footer One Title',
			'id'	=> 'sidebar-02',
			'class'	=> 'custom2',
			'description' => 'Footer One Title',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	
}
add_action('widgets_init','ahona_widget_setup2');

function ahona_widget_setup3() {
	
	register_sidebar(
		array(	
			'name'	=> 'Footer Two Title',
			'id'	=> 'sidebar-3',
			'class'	=> 'custom2',
			'description' => 'Footer Two Title',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	
}
add_action('widgets_init','ahona_widget_setup3');


function ahona_widget_setup4() {
	
	register_sidebar(
		array(	
			'name'	=> 'Footer Three Title',
			'id'	=> 'sidebar-4',
			'class'	=> 'custom2',
			'description' => 'Footer Three Title',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	
}
add_action('widgets_init','ahona_widget_setup4');

function ahona_widget_setup5() {
	
	register_sidebar(
		array(	
			'name'	=> 'Footer Four Title',
			'id'	=> 'sidebar-5',
			'class'	=> 'custom2',
			'description' => 'Footer Four Title',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	
}
add_action('widgets_init','ahona_widget_setup5');

function ahona_widget_setup6() {
	
	register_sidebar(
		array(	
			'name'	=> 'Footer Copy Right Text',
			'id'	=> 'sidebar-6',
			'class'	=> 'custom2',
			'description' => 'Footer Copy Right Text',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	
}
add_action('widgets_init','ahona_widget_setup6');


/*
	Include Walker file
*/
require get_template_directory() . '/inc/walker.php';

/*
	Head function
*/
function ahona_remove_version() {
	return '';
}
add_filter('the_generator', 'ahona_remove_version');

/*
	Custom Term Function
*/
function ahona_get_terms( $postID, $term ){
	
	$terms_list = wp_get_post_terms($postID, $term); 
	$output = '';
					
	$i = 0;
	foreach( $terms_list as $term ){ $i++;
		if( $i > 1 ){ $output .= ', '; }
		$output .= '<a href="' . get_term_link( $term ) . '">'. $term->name .'</a>';
	}
	
	return $output;
	
}


function ahona_theme_customize_register($wp_customize) {

    $wp_customize->add_section('custom_social_links', array(
        'title' => __('Social Links', 'ahona'),
        'priority' => 30,
    ));


    $social_icons = array(
        'facebook' => 'fa-facebook',
        'twitter' => 'fa-twitter',
        'instagram' => 'fa-instagram',
        'linkedin' => 'fa-linkedin',
        'youtube' => 'fa-youtube',
    );

    foreach ($social_icons as $key => $icon) {
        $wp_customize->add_setting($key . '_link', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control($key . '_link', array(
            'label' => ucwords($key) . ' Link',
            'section' => 'custom_social_links',
            'type' => 'text',
        ));
    }
}
add_action('customize_register', 'ahona_theme_customize_register');


function ahona_theme_customize_register_color($wp_customize) {

    $wp_customize->add_section('header_customization', array(
        'title' => __('Header Customization', 'ahona'),
        'priority' => 30,
    ));

  
    $wp_customize->add_setting('anchor_text_color', array(
        'default' => '#686a6f',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anchor_text_color', array(
        'label' => __('Anchor Text Color', 'ahona'),
        'section' => 'header_customization',
        'settings' => 'anchor_text_color',
    )));

    
    $wp_customize->add_setting('header_background_color', array(
        'default' => '#eeeeee',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
        'label' => __('Header Background Color', 'ahona'),
        'section' => 'header_customization',
        'settings' => 'header_background_color',
    )));
}
add_action('customize_register', 'ahona_theme_customize_register_color');

/* Link Previe Settings */
function ahona_theme_link_preview_settings($wp_customize) {

    $wp_customize->add_section('link_preview_settings', array(
        'title' => __('Link Preview Settings', 'ahona'),
        'priority' => 30,
    ));

	// Setting for Preview Box Size.
	$wp_customize->add_setting( 'ahona_live_preview_box_size',
	array(
		'default'           =>  300,
		'sanitize_callback' => 'absint',
	)
	);

	// Control for Preview Box Size.
	$wp_customize->add_control( 'ahona_live_preview_box_size', 
	array(
		'type'        => 'number',
		'priority'    => 10,
		'section'     => 'link_preview_settings',
		'label'       => 'Preview Box Size',
		'description' => 'Enter the size of the preview box (<b>default is 300</b>).',
	));

	// Setting for Excluded Elements.
	$wp_customize->add_setting( 'ahona_live_preview_excluded_elements',
	array(
		'sanitize_callback' => 'wp_strip_all_tags',
	)
	);

	// Control for Excluded Elements.
	$wp_customize->add_control( 'ahona_live_preview_excluded_elements', 
	array(
		'type'        => 'text',
		'priority'    => 10,
		'section'     => 'link_preview_settings',
		'label'       => 'Excluded Elements',
		'description' => 'Enter the HTML elements you want to exclude, separated by commas (Ex: <b>h1, h2, span, p</b>).',
	));

	// Setting for Excluded Classes.
	$wp_customize->add_setting( 'ahona_live_preview_excluded_classes',
	array(
		'sanitize_callback' => 'wp_strip_all_tags',
	)
	);

	// Control for Excluded Classes.
	$wp_customize->add_control( 'ahona_live_preview_excluded_classes', 
	array(
		'type'        => 'text',
		'priority'    => 10,
		'section'     => 'link_preview_settings',
		'label'       => 'Excluded Classes',
		'description' => 'Enter the CSS classes you want to exclude, separated by commas. Remember to include the DOT. (Ex: <b>.my-class, .another-class</b>).',
	));

	// Setting for Excluded IDs.
	$wp_customize->add_setting( 'ahona_live_preview_excluded_ids',
	array(
		'sanitize_callback' => 'wp_strip_all_tags',
	)
	);

	// Control for Excluded IDs.
	$wp_customize->add_control( 'ahona_live_preview_excluded_ids', 
	array(
		'type'        => 'text',
		'priority'    => 10,
		'section'     => 'link_preview_settings',
		'label'       => 'Excluded IDs',
		'description' => 'Enter the HTML IDs you want to exclude, separated by commas. Remember to include the HASH. (Ex: <b>#my-id, #another-id</b>).',
	));
}
add_action('customize_register', 'ahona_theme_link_preview_settings');

function ahona_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ahona_enqueue_comment_reply' );


function ahona_website_remove($fields)
{
if(isset($fields['url']))
unset($fields['url']);
return $fields;
}
add_filter('comment_form_default_fields', 'ahona_website_remove');

add_filter( 'comment_form_fields', 'ahona_move_comment_field', 10, 3 ); 
function ahona_move_comment_field( $fields) 
{ 
	$comment_field = $fields['comment']; 
	unset( $fields['comment'] ); $fields['comment'] = $comment_field; return $fields;
}
