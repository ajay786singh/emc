<?php
/*
 * Plugin Name: PDF viewer for WordPress
 * Plugin URI: http://themencode.com/plugins/pdf-viewer-for-wordpress/
 * Description: A Simple plugin to display Your site's pdf files with a nice viewer using pdfjs script from mozilla.
 * Version: 3.0
 * Author: ThemeNcode
 * Author URI: http://themencode.com
*/

define('PLUGIN_NAME','PDF viewer for WordPress');
define('PLUGIN_DIR', 'pdf-viewer-for-wordpress');
define('WEB_DIR', 'pdf-viewer-for-wordpress/web');
define('BUILD_DIR', 'pdf-viewer-for-wordpress/build');
include "admin/tnc-pdf-viewer-options.php";
$viewer_url = plugins_url()."/".WEB_DIR."/viewer.php?file=";

//get_settings
$auto_add       	= get_option('auto_add_link');
$show_social   		= get_option('ss_opt_name');


function tnc_pdf_autolink(){
	$viewer_url = plugins_url()."/".WEB_DIR."/viewer.php?file=";
?>

	<script type="text/javascript">

		jQuery(document).ready(function() {		

			jQuery("a[href$='.pdf']").each(function() {

			   var _href = jQuery(this).attr("href"); 

			   jQuery(this).attr("href", '<?php echo $viewer_url; ?>'+ _href);

			});

		});

	</script>

<?php }

function tnc_pdf_autoiframe(){
	$viewer_url = plugins_url()."/".WEB_DIR."/viewer.php?file=";
	$auto_iframe_width	= get_option('auto_iframe_width');
	$auto_iframe_width	= get_option('auto_iframe_height');
?>
	<script type="text/javascript">

		jQuery(document).ready(function() {		

			jQuery("a[href$='.pdf']").each(function() {
			   var _href = jQuery(this).attr("href"); 
			   jQuery(this).replaceWith("<iframe width='<?php echo $auto_iframe_width; ?>' height='<?php echo $auto_iframe_height; ?>' src='<?php echo $viewer_url ?>" + _href +"'></iframe>");
			});

		});

	</script>

<?php }

if($auto_add == 'auto_iframe'){

	add_action('wp_footer', 'tnc_pdf_autoiframe');

} elseif($auto_add == 'auto_link') {
	add_action('wp_footer', 'tnc_pdf_autolink');
} else {

}

//Autolink Blank Target

function themencode_autolink_target(){

	$autolink_setting = get_option('tnc_link_target', '_blank');

    $output  	 = '<script type="text/javascript">';

    $output 	.=    "jQuery(function($) {";

    $output 	.=  "jQuery('a[href$=\".pdf\"]').attr('target', '".$autolink_setting."');";

    $output    	.= "});"; 

    $output 	.= "</script>";

    echo $output;
}

add_action('wp_footer', 'themencode_autolink_target');

// Iframe Responsive Fix ** Added in 3.0
function tnc_pdf_iframe_responsive_fix(){
	echo "<style type='text/css'>
		iframe{
			max-width: 100%;
		}
	</style>";
}
add_action( 'wp_head', 'tnc_pdf_iframe_responsive_fix' );

add_action( 'admin_enqueue_scripts', 'tnc_enqueue_color_picker' );
function tnc_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'tnc-cp-script-handle', plugins_url('tnc-pdf-scripts.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

}

function tnc_pdf_admin_css(){
	echo '<link rel="stylesheet" href="'.plugins_url().'/'.PLUGIN_DIR.'/tnc-resources/admin-css.css" />';
}
add_action('admin_head', 'tnc_pdf_admin_css');

include "includes/tnc_shortcodes.php";
include "includes/tinymce/button.php";
?>