<form  method="get" action="<?php echo esc_url(home_url('/')); ?>">

	<i class="search-icon fa fa-search"></i>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr( __( 'Search', 'ahona' ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php esc_attr_e( 'Search', 'ahona' ); ?>" />

</form>