<form role="search" method="get" id="searchform" class="pull-right" action="<?php bloginfo('url'); ?>">
	<input type="text" name="s" id="search-text" placeholder="Search DisneyDebit.com" value="<?php echo esc_attr( get_search_query() ); ?>" />
	<button class="glyphicon glyphicon-search" type="submit" id="searchsubmit" title="Search"></button>
</form>