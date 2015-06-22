<?php get_header(); ?>

<?php get_template_part( 'content', 'before' ); ?>	

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="post clearfix" id="post-main-<?php the_ID(); ?>">

					<div class="entry">

						<h1 class="page-title"><?php the_title(); ?></h1>

						<?php the_content(); ?>

						<div style="clear:both;"></div>

						<?php wp_link_pages(); ?>

					</div>

				</div>

<?php endwhile; endif; ?>

<?php

if( substr( $_SERVER[ "REQUEST_URI" ], 0, 16 ) == '/podcast-setup/' )
{
	global $feedkey;
	
	?>

	<input type="hidden" id="waiting_for_feed_data" value="1" />
	<input type="hidden" id="feed_key" value="" />
	<div id="feed_url"></div>
	
	<div style="width:1px;height:1px;padding:1px;overflow:hidden;">
		<iframe id="feed_url_frame" src="/wp-admin/profile.php?get_feed_key"></iframe>
	</div>

	<script type="text/javascript">
	<!--

		function setFeedData()
		{
			if( document.getElementById( 'feed_key' ).value == '' )
			{
				setTimeout( setFeedData, 500 );
				
			} else {
			
				document.getElementById( 'feed_link' ).href	= '<?php echo get_home_url(); ?>/feed/?feedkey=' + document.getElementById( 'feed_key' ).value;
			}
		}
		
		setTimeout( setFeedData, 500 );
	
	//-->
	</script>
	
	<?php
}

?>

<?php get_template_part( 'content', 'after' ); ?>