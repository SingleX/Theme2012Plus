<?php
/*
Template Name: archives(存档页)
*/
?>

<?php get_header(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1 id="archive-title"><?php the_title(); ?><?php edit_post_link('<span class="edit">[edit]</span>');?></h1>
				<a id="expand_collapse" href="#">全部展开/收缩</a>
				<div id="archives"><?php theme2012plus_archives_list(); ?></div>
			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$('#expand_collapse,.archives-yearmonth').css({cursor:"s-resize"});
$('#archives ul li ul.archives-monthlisting').hide();
$('#archives ul li ul.archives-monthlisting:first').show();
$('#archives ul li span.archives-yearmonth').click(function(){$(this).next().slideToggle('fast');return false;});
$('#expand_collapse').toggle(
function(){
$('#archives ul li ul.archives-monthlisting').slideDown('fast');
},
function(){
$('#archives ul li ul.archives-monthlisting').slideUp('fast');
});
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>