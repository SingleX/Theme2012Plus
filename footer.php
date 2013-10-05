<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<p class="left">&copy; 2011-2013 · <a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></p>
			<p class="middle">总浏览量 : <?php echo lo_all_view(); ?></p>
			<p class="right">WordPress &amp; Theme2012Plus</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>