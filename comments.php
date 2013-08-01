<?php
/**
 * The template for displaying Comments.
 *
 * 本页面包含当前评论和评论框
 * 评论显示功能是调用functions.php中的twentytwelve_comment()函数实现
 * @package WordPress
 * @subpackage Theme2012Plus
 * @version 1.0
 * @authon SingleX
 */

/*
 * 有密码保护的文章，未输密码时返回。
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>
	
	<?php //trackbacks计数分离
	if (function_exists('wp_list_comments')) {
		$trackbacks = $comments_by_type['pings'];
	} else {
		$trackbacks = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_approved = '1' AND (comment_type = 'pingback' OR comment_type = 'trackback') ORDER BY comment_date", $post->ID));
	}?>
	
	<?php if ( have_comments() ) : ?>
		<div class="comments-title">
			<span class="comment-total"><?php comments_number('No Response', '1 Response', '% Responses' );?></span>
			<span class="comment-part">Comment<?php echo (' (' . (count($comments)-count($trackbacks)) . ')'); ?></span>
			<span class="ping-part">Trackback<?php echo (' (' . count($trackbacks) . ')');?></span>
			<div class="clear"></div>
		</div>
		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'twentytwelve_comment', 'style' => 'ol' ) ); ?>
			<?php //wp_list_comments( 'type=comment&callback=twentytwelve_comment&max_depth=10000' ); ?>
		</ol><!-- .commentlist -->
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'twentytwelve' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentytwelve' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>		
		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'twentytwelve' ); ?></p>
		<?php endif; ?>
	<?php endif; // have_comments() ?>
	
	<?php //修改评论表单样式，此函数位于wp-includes/comment-template.php
	$args = array(
		'comment_field'        => '<p class="comment-form-comment"><label class="wp-smilies">' . sprintf( __( '%s' ), wp_smilies() ) . '</label><textarea id="comment" name="comment" cols="45" rows="6" aria-required="true"};"></textarea>' . 
								  '<script type="text/javascript">document.getElementById("comment").onkeydown = function (moz_ev){var ev = null;if (window.event){ev = window.event;}else{ev = moz_ev;}if (ev != null && ev.ctrlKey && ev.keyCode == 13){document.getElementById("submit").click();}}</script></p>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
	);
	comment_form($args);
	?>
	<script type="text/javascript">
		function grin(tag){var myField;tag=' '+tag+' ';if(document.getElementById('comment')&&document.getElementById('comment').type=='textarea'){myField=document.getElementById('comment');}else{return false;}
		if(document.selection){myField.focus();sel=document.selection.createRange();sel.text=tag;myField.focus();}
		else if(myField.selectionStart||myField.selectionStart=='0'){var startPos=myField.selectionStart;var endPos=myField.selectionEnd;var cursorPos=endPos;myField.value=myField.value.substring(0,startPos)+tag+myField.value.substring(endPos,myField.value.length);cursorPos+=tag.length;myField.focus();myField.selectionStart=cursorPos;myField.selectionEnd=cursorPos;}
		else{myField.value+=tag;myField.focus();}}
	</script>
	
</div><!-- #comments .comments-area -->