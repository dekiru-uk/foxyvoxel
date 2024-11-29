<?php 
	$site_url = get_site_url();
?>

<form action="<?php echo $site_url; ?>" method="get" class="searchform">
	<input type="hidden" value="post" name="post_type" id="post_type" />
	<label for="search">Search</label>
	<input type="text" name="s" placeholder="Search…" id="search" value="<?php the_search_query(); ?>" />
	<button class="fv-button fv-button-short">Search</button>
</form>