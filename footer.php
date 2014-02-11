<?php
	//如果你喜欢这份主题，请保留页脚主题信息，谢谢 --By SingleX
	$options = get_option('singlex_options');
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<p class="left">&copy; 2011-2013 · <a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></p>
			<p class="middle">总浏览量 : <?php echo lo_all_view(); ?></p>
			<p class="right"><a href="http://www.singlex.net" target="_blank">Theme2012Plus</a></p>
			<p class="hide"><?php echo($options['footercode']); ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
