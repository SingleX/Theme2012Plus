<?php
/**
 * The template for displaying posts in the Status post format
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-header">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'twentytwelve_status_avatar', '48' ) ); ?>
			<header>
				<h1><?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></h1>
				<hr>
				<div class="entry-meta">
				<span class="info-calendar"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_time('Y.m.d'); ?></a></span>
				<span class="info-comment"><?php comments_popup_link('No Reply', '1 Reply', '% Replies'); ?></span>
				</div>
			</header>
		</div><!-- .entry-header -->
	</article><!-- #post -->