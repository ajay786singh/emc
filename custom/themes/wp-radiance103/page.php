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

if(
	substr( $_SERVER[ "REQUEST_URI" ], 0, 16 ) == '/podcast-setup/' ||
	substr( $_SERVER[ "REQUEST_URI" ], 0, 16 ) == '/casting-setup/'
)
{
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
			var prefix	= 'http://';

			for( var c = 1; c <= 20; c ++ )
			{
				if( document.getElementById( 'feed_link_' + c ) )
				{
					if( c == 4 || c == 5 )
					{
						prefix	= 'pcast://';
					
					} else {
					
						prefix	= 'http://';
					}
				
					document.getElementById( 'feed_link_' + c ).href	= prefix + '<?php echo str_replace( 'http://', '', get_home_url() ); ?>/feed/';
				}
			}
				
			/*
			if( document.getElementById( 'feed_key' ).value == '' )
			{
				setTimeout( setFeedData, 500 );
				
			} else {
			
				for( var c = 1; c <= 20; c ++ )
				{
					if( document.getElementById( 'feed_link_' + c ) )
					{
						if( c == 4 || c == 5 )
						{
							prefix	= 'pcast://';
						
						} else {
						
							prefix	= 'http://';
						}
					
						document.getElementById( 'feed_link_' + c ).href	= prefix + '<?php echo str_replace( 'http://', '', get_home_url() ); ?>/feed/?feedkey=' + document.getElementById( 'feed_key' ).value;
					}
				}
			}
			*/
		}
		
		setTimeout( setFeedData, 500 );
	
	//-->
	</script>
	
	<?php
}

?>

<?php get_template_part( 'content', 'after' ); ?>