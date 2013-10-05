<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Theme2012Plus
 * @author SingleX
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><i class="icon-chevron-left"></i><?php previous_post_link( '%link', '%title' ); ?></span>
					<span class="nav-nextarray"><i class="icon-chevron-right"></i></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title' ); ?></span>
				</nav><!-- .nav-single -->
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>