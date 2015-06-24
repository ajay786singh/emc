<?php

ob_start();

if( $_SERVER[ "REQUEST_URI" ] == '/?feed=podcast' )
{
	header( 'Location: http://emergencymedicinecases.com/feed/', TRUE, 301 );
	die;
}

$feed_synch	= array( 'feed-rss.php' );

foreach( $feed_synch as $feed_filename )
{
	$feed1_path	= dirname( __FILE__ ) . '/' . $feed_filename;
	$feed2_path	= dirname( __FILE__ ) . '/../../../wp-includes/' . $feed_filename;

	if( file_get_contents( $feed1_path ) != file_get_contents( $feed2_path ) )
	{
		$fp	= fopen( $feed2_path, 'w' );
		
		fwrite( $fp, file_get_contents( $feed1_path ) );
		fclose( $fp );
	}
}

/*-----------------------------------------------------------------------------------*/
// Ready the theme for translation
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain("solostream");


/*-----------------------------------------------------------------------------------*/
// Require Various Files to Run the Theme
/*-----------------------------------------------------------------------------------*/
require_once( trailingslashit( get_template_directory() ) . 'theme-settings.php' );
require_once( trailingslashit( get_template_directory() ) . 'theme-styles.php' );
require_once( trailingslashit( get_template_directory() ) . 'theme-widgets.php' );
require_once( trailingslashit( get_template_directory() ) . 'theme-metaboxes.php' );
require_once( trailingslashit( get_template_directory() ) . 'theme-js.php' );
require_once( trailingslashit( get_template_directory() ) . 'theme-images.php' );


/*-----------------------------------------------------------------------------------*/
// Register widgetized areas
/*-----------------------------------------------------------------------------------*/
function theme_widgets_init() {
	register_sidebar(array (
		'name'=>'Sidebar-Wide - Top',
		'id'=>'widget-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
	register_sidebar(array (
		'name'=>'Sidebar-Wide - Bottom Left',
		'id'=>'widget-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
	register_sidebar(array (
		'name'=>'Sidebar-Wide - Bottom Right',
		'id'=>'widget-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
	register_sidebar(array (
		'name'=>'Sidebar-Narrow',
		'id'=>'widget-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
	register_sidebar(array (
		'name'=>'Footer Widget 1',
		'id'=>'widget-5',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
	register_sidebar(array (
		'name'=>'Footer Widget 2',
		'id'=>'widget-6',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
	register_sidebar(array (
		'name'=>'Footer Widget 3',
		'id'=>'widget-7',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
	register_sidebar(array (
		'name'=>'Footer Widget 4',
		'id'=>'widget-8',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
	register_sidebar(array (
		'name'=>'Alt Home Page Widget 1',
		'id'=>'widget-9',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
	register_sidebar(array (
		'name'=>'Alt Home Page Widget 2',
		'id'=>'widget-10',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
	register_sidebar(array (
		'name'=>'Alt Home Page Widget 3',
		'id'=>'widget-11',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
		));
}

add_action( 'init', 'theme_widgets_init' );


/*-----------------------------------------------------------------------------------*/
// Add Excerpt field to Pages
/*-----------------------------------------------------------------------------------*/
add_post_type_support( 'page', 'excerpt' );


/*-----------------------------------------------------------------------------------*/
// Add RSS Feed Links
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
// Add support for WP 3.0 Menu Management
/*-----------------------------------------------------------------------------------*/
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}


/*-----------------------------------------------------------------------------------*/
// Register Nav Menus
/*-----------------------------------------------------------------------------------*/
if (function_exists('register_nav_menus')) {
	function register_my_menus() {
		register_nav_menus(array(
			'topnav' => __( 'Top Navigation' ),
			'catnav' => __( 'Category Navigation' ),
			'footernav' => __( 'Footer Navigation' )
			)
		);
	}

	add_action( 'init', 'register_my_menus' );
}


/*-----------------------------------------------------------------------------------*/
// Fallback function for Top Navigation
/*-----------------------------------------------------------------------------------*/
function nav_fallback() { ?>
	<?php wp_page_menu( array( 'show_home' => 'Home', 'sort_column' => 'menu_order' ) ); ?>
<?php }


/*-----------------------------------------------------------------------------------*/
// Fallback function for Category Navigation
/*-----------------------------------------------------------------------------------*/
function catnav_fallback() { ?>
	<ul class="clearfix"><?php wp_list_categories('title_li='); ?></ul>
<?php }


/*-----------------------------------------------------------------------------------*/
// Fallback function for Footer Navigation
/*-----------------------------------------------------------------------------------*/
function footnav_fallback() { ?>
	<ul><?php wp_list_pages( array( 'depth' => 1, 'title_li' => '', 'sort_column' => 'menu_order' ) ); ?></ul>
<?php }


/*-----------------------------------------------------------------------------------*/
// Add Twitter and other social media links to user profile
/*-----------------------------------------------------------------------------------*/
add_filter('user_contactmethods','add_twitter_contactmethod',10,1);
function add_twitter_contactmethod( $contactmethods ) {
	$contactmethods['twitter'] = 'Twitter Username';
	$contactmethods['facebook'] = 'Facebook Username';
	$contactmethods['instagram'] = 'Instagram Username';
	$contactmethods['pinterest'] = 'Pinterest Username';
	$contactmethods['googbuzz'] = 'Google Plus Username';
	$contactmethods['linkedin'] = 'LinkedIn Username';
	$contactmethods['flickr'] = 'Flickr Username';
	$contactmethods['youtube'] = 'Youtube Username';

	return $contactmethods;
}


/*-----------------------------------------------------------------------------------*/
// Function to check for active Page Template File
/*-----------------------------------------------------------------------------------*/
function is_pagetemplate_active($pagetemplate = '') {
	global $wpdb;
	$sql = "select meta_key from $wpdb->postmeta where meta_key like '_wp_page_template' and meta_value like '" . $pagetemplate . "'";
	$result = $wpdb->query($sql);
	if ($result) {
		return TRUE;
	} else {
		return FALSE;
	}
}


/*-----------------------------------------------------------------------------------*/
// Function to get custom field value.
/*-----------------------------------------------------------------------------------*/
function get_custom_field($key, $echo = FALSE) {
	global $post;
	$custom_field = get_post_meta($post->ID, $key, true);
	if ($echo == FALSE) return $custom_field;
	echo $custom_field;
}


/*-----------------------------------------------------------------------------------*/
// Function to limit the number of words in the post excerpt.
/*-----------------------------------------------------------------------------------*/
function string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}


/*-----------------------------------------------------------------------------------*/
// Function to list pings/trackbacks.
/*-----------------------------------------------------------------------------------*/
function list_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
        <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> | <?php comment_date(); ?>
<?php }


/*-----------------------------------------------------------------------------------*/
// Function to add rel="nofollow" to the read more link.
/*-----------------------------------------------------------------------------------*/
function add_nofollow_to_more_links($content) {
	return preg_replace("@class=\"more-link\"@", "class=\"more-link\" rel=\"nofollow\"", $content);
}

add_filter('the_content', 'add_nofollow_to_more_links');


/*-----------------------------------------------------------------------------------*/
// Function to remove default border from gallery thumbnails
/*-----------------------------------------------------------------------------------*/
function remove_gallery_border( $galleryStyles ) {

	// Set the string we want to remove from the default style declaration. 
	$remove = "border: 2px solid #cfcfcf;";

	// Remove it.
	$galleryStyles = str_replace( $remove, '', $galleryStyles );

	return $galleryStyles ;
}

add_filter( 'gallery_style', 'remove_gallery_border' );


/*
   #change | BradJ 2015-03-23 | Filter out all of Howard Ovens posts from main blog page
*/
function exclude_category($query) {
if ( $query->is_home() ) {
$query->set('cat', '-605');
}
return $query;
}
add_filter('pre_get_posts', 'exclude_category');

/*-----------------------------------------------------------------------------------*/
// Function to get the post excerpt
/*-----------------------------------------------------------------------------------*/
function solostream_excerpt() {
	if ( get_option('solostream_post_content') == 'Excerpts' ) { ?>
		<?php the_excerpt(); ?>
		<p class="readmore"><a class="more-link" href="<?php the_permalink() ?>" rel="nofollow" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php _e("Learn More &raquo;", "solostream"); ?></a></p>
	<?php } else { 
		the_content(__("Continue Reading &raquo;", "solostream")); 
	}
}



add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

function feedFilter( $query )
{
	if($query->is_feed)
	{
		add_filter( 'the_content', 'feedContentFilter' );
	}

	return $query;
}

function feedContentFilter( $content )
{
	//echo '<pre>' . print_r( $content, true ) . '</pre>';
 
	return $content;
}

add_filter( 'pre_get_posts', 'feedFilter' );

add_filter('the_excerpt', 'do_shortcode');

function iframe_pdf_viewer($atts){        
    /*
    $pdf_shortcode = '[tnc-pdf-viewer-iframe file="http://emergencymedicinecases.com/wp-content/uploads/2015/04/April8_PDF_TarynEdits.pdf" width="500" height="600" download="true" print="true" fullscreen="true" share="true" zoom="true" open="true" logo="true" pagenav="true" find="true"]';        
    //return '<div id="iframe-img-div">'.$string.'</div><div id="iframe-pdf" style="display: none;">'.do_shortcode($pdf_shortcode).'</div><br />';
    
    $pdf_shortcode = '[tnc-pdf-viewer-iframe file="http://emergencymedicinecases.com/wp-content/uploads/2015/04/April8_PDF_TarynEdits.pdf" width="500" height="600" download="true" print="true" fullscreen="true" share="true" zoom="true" open="true" logo="true" pagenav="true" find="true"]';
    
    $string_to_return = do_shortcode($pdf_shortcode);
    //$string_to_return = ob_get_contents();
    return $string_to_return;
     * 
     */
    $string = '<img id="iframe-img" src="'.$atts['img'].'" style="cursor: pointer;"/>';
    $post_embed = '[tnc-pdf-viewer-iframe file="'.$atts['pdf'].'" width="757" height="610" download="true" print="true" fullscreen="true" share="true" zoom="true" open="true" logo="true" pagenav="true" find="true"]';
    $string_to_return = do_shortcode($post_embed);
    return '<div id="iframe-img-div">'.$string.'</div><div id="iframe-pdf" style="display: none;">'.$string_to_return.'</div>';    
}
add_shortcode('iframe_pdf_viewer', 'iframe_pdf_viewer');


function test_pdf_viewer($atts){    
    return 'Test ShortCode';
}
add_shortcode('test_pdf_viewer', 'test_pdf_viewer');

// REPLACE SITE UPLOAD URLS - HYPENOTIC
add_action('init', 'my_replace_image_urls' );
function my_replace_image_urls() {
    if ( defined('WP_SITEURL') && defined('LIVE_SITEURL') ) {
        if ( WP_SITEURL != LIVE_SITEURL ){
            add_filter('wp_get_attachment_url', 'my_wp_get_attachment_url', 10, 2 );
        }
    }
}

function my_wp_get_attachment_url( $url, $post_id) {
    if ( $file = get_post_meta( $post_id, '_wp_attached_file', true) ) {
        if ( ($uploads = wp_upload_dir()) && false === $uploads['error'] ) {
            if ( file_exists( $uploads['basedir'] .'/'. $file ) ) {
                return $url;
            }
        }
    }
    return str_replace( WP_SITEURL, LIVE_SITEURL, $url );
}

?>