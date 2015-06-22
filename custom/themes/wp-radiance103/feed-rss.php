<?php
/**
 * RSS 0.92 Feed Template for displaying RSS 0.92 Posts feed.
 *
 * @package WordPress
 */

global $wpdb;
 
header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<rss version="0.92">
<channel>
	<title><?php bloginfo_rss('name'); wp_title_rss(); ?></title>
	<link><?php bloginfo_rss('url') ?></link>
	<description><?php bloginfo_rss('description') ?></description>
	<lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
	<docs>http://backend.userland.com/rss092</docs>
	<language><?php bloginfo_rss( 'language' ); ?></language>

	<?php
	/**
	 * Fires at the end of the RSS Feed Header.
	 *
	 * @since 2.0.0
	 */
	do_action( 'rss_head' );
	?>

<?php while (have_posts()) : the_post(); ?>
	<item>
		<title><?php the_title_rss() ?></title>
		<description><![CDATA[<?php the_excerpt_rss() ?>]]></description>
		<link><?php the_permalink_rss() ?></link>
		<?php

		$exc	= get_the_excerpt();
		
		if( strpos( $exc, 'tpl=emc-mp3' ) > 0 )
		{
			$exc	= explode( 'tpl=emc-mp3', $exc );
			$exc	= explode( 'wpfilebase tag=file id=', $exc[ 0 ] );
			$exc	= $exc[ count( $exc ) - 1 ];
			$exc	= trim( $exc );
			
			$mp3	= $wpdb->get_var( "SELECT `file_path` FROM `wp_wpfb_files` WHERE `file_id` = " . (int) $exc . " LIMIT 1;" );
			
			if( $mp3 )
			{
				?>
				
				<enclosure url="http://<?php echo $_SERVER[ "HTTP_HOST" ]; ?>/download/<?php echo $mp3; ?>" length="70000000" type="audio/mpeg" />
				
				<?php
			}
		}
		
		?>
		<?php
		/**
		 * Fires at the end of each RSS feed item.
		 *
		 * @since 2.0.0
		 */
		do_action( 'rss_item' );
		?>
	</item>
<?php endwhile; ?>
</channel>
</rss>
