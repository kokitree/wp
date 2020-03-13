<?php get_header(); ?>

<main id="site-content">
<center><small>is an Amazon Affiliate. When you buy through links on our site, we may earn an affiliate commission.</small></center>
	<?php

	if ( have_posts() ) :

		while ( have_posts() ) : the_post();

			get_template_part( 'content', get_post_type() );

			// Display related posts
			get_template_part( 'related-posts' );

		endwhile;

	endif;

	?>

</main><!-- #site-content -->

<?php get_footer(); ?>
