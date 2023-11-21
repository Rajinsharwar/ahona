<?php
	
	class Walker_Nav_Primary extends Walker_Nav_menu {
		
 function start_lvl( &$output, $depth = 0, $args = array() ){
		$indent = str_repeat("\t",$depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}
	

function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    if (is_object($args) && isset($args->walker) && is_object($args->walker) && property_exists($args->walker, 'has_children')) {
        $has_children = $args->walker->has_children;
    } else {
        $has_children = false;
    }

    $classes[] = ($has_children) ? 'dropdown' : '';
    $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
    $classes[] = 'menu-item-' . $item->ID;

    // Add a keyboard navigation class
    $classes[] = 'keyboard-nav';

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
    $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

    $tabindex = ($has_children) ? ' tabindex="0"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . $tabindex . '>';

    $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

    $attributes .= ($has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

    $item_output = (is_array($args)) ? '' : $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= (is_array($args)) ? '' : $args->link_before;
    $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
    $item_output .= (is_array($args)) ? '' : $args->link_after;
    $item_output .= ($depth == 0 && $has_children) ? ' <b class="caret"></b></a>' : '</a>';
    $item_output .= (is_array($args)) ? '' : $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
}

}
