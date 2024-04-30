<form  method="get" action="<?php echo esc_url(home_url('/')); ?>">

	<i class="search-icon fa fa-search"></i>
	<label for="search-input" hidden><?php esc_html_e('Search', 'ahona'); ?></label>
	<input type="search" class="search-field" id="search-input" placeholder="<?php echo esc_attr( __( 'Search', 'ahona' ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php esc_attr_e( 'Search', 'ahona' ); ?>" />

</form>