<?php

// Hook to include additional content before blog post item
do_action( 'touchup_action_before_blog_post_item' );

if ( have_posts() ) {
	while ( have_posts() ) : the_post();
		// Include post item
		if ( is_single() ) {
			echo apply_filters( 'touchup_filter_blog_single_template', touchup_get_template_part( 'blog', 'templates/parts/single/post', get_post_format() ) );
		} else {
			echo apply_filters( 'touchup_filter_blog_list_post_template', touchup_get_template_part( 'blog', 'templates/parts/list/post', get_post_format() ) );
		}
	endwhile; // End of the loop.
} else {
	// Include posts not found
	touchup_template_part( 'blog', 'templates/parts/posts-not-found' );
}

// Hook to include additional content after blog post item
do_action( 'touchup_action_after_blog_post_item' );

wp_reset_postdata();