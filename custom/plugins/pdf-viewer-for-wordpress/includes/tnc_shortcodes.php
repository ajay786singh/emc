<?php 
function tnc_pdf_shortcode( $atts ) {
	$shortcode_viewer_url = plugins_url()."/".WEB_DIR."/viewer-shortcode.php?file=";
    	extract( shortcode_atts( array(
    		'file'			  => '',
    		'width'			  => '550',
    		'height'		  => '800',
    		'download'		=> 'true',
    		'print'			  => 'true',
    		'fullscreen'	=> 'true',
    		'share'			  => 'true',
    		'zoom'			  => 'true',
    		'open'			  => 'true',
    		'logo'			  => 'true',
    		'pagenav'		  => 'true',
    		'find'			  => 'true',
    		'language'		=> 'en-US',
    		'page'			  => '', // Added in 3.0
    	), $atts ) );
	return '<iframe width="'.$width.'" height="'.$height.'" src="'.$shortcode_viewer_url.$file.'&download='.$download.'&print='.$print.'&fullscreen='.$fullscreen.'&share='.$share.'&zoom='.$zoom.'&open='.$open.'&logo='.$logo.'&pagenav='.$pagenav.'&find='.$find.'#locale='.$language.'"></iframe>';
}

add_shortcode( 'tnc-pdf-viewer-iframe', 'tnc_pdf_shortcode' );

// Link Shortcode

function tnc_pdf_link_shortcode( $atts ) {
	$shortcode_viewer_url = plugins_url()."/".WEB_DIR."/viewer-shortcode.php?file=";
	extract( shortcode_atts( array(
		'file'        => '',
		'text'        => 'Open PDF',
		'target'      => '_blank',
		'download'    => 'true',
		'print'       => 'true',
		'fullscreen'  => 'true',
		'share'       => 'true',
		'zoom'        => 'true',
		'open'        => 'true',
		'class'       => 'tnc_pdf',
		'logo'		=> 'true',
		'pagenav'     => 'true',
		'find'		=> 'true',
		'language'	=> 'en-US',
		'page'		=> '', // Added in 3.0
		'default_zoom' => 'auto', // Added in 3.0
	), $atts ) );
return '<a href="'.$shortcode_viewer_url.$file.'&download='.$download.'&print='.$print.'&fullscreen='.$fullscreen.'&share='.$share.'&zoom='.$zoom.'&open='.$open.'&logo='.$logo.'&pagenav='.$pagenav.'&find='.$find.'#locale='.$language.'&page='.$page.'&zoom='.$default_zoom.'" class="'.$class.'" target="'.$target.'">'.$text.'</a>';
}
add_shortcode( 'tnc-pdf-viewer-link', 'tnc_pdf_link_shortcode' );

/* Shortlink Shortcode */

function tnc_pdf_shortlink_shortcode( $atts ) {
$shortcode_viewer_url = plugins_url()."/".WEB_DIR."/viewer.php?file=";
	extract( shortcode_atts( array(
		'file'        => '',
		'text'        => 'Open PDF',
		'target'      => '_blank',
		'class'       => 'tnc_pdf',
		'language'    => 'en-US',
		'page'		    => '', // Added in 3.0
		'default_zoom' => 'auto', // Added in 3.0
	), $atts ) );
return '<a href="'.$shortcode_viewer_url.$file.'#locale='.$language.'&page='.$page.'&zoom='.$default_zoom.'" class="'.$class.'" target="'.$target.'">'.$text.'</a>';
}
add_shortcode( 'tnc-pdf-viewer-shortlink', 'tnc_pdf_shortlink_shortcode' );

function tnc_pdf_image_shortcode( $atts, $content = "" ) {
$shortcode_viewer_url = plugins_url()."/".WEB_DIR."/viewer-shortcode.php?file=";
 extract( shortcode_atts( array(
      'file'        => '',
      'target'      => '_blank',
      'download'    => 'true',
      'print'       => 'true',
      'fullscreen'  => 'true',
      'share'       => 'true',
      'zoom'        => 'true',
      'open'        => 'true',
      'class'       => 'tnc_pdf',
      'logo'		=> 'true',
      'pagenav'     => 'true',
      'find'		=> 'true',
      'language'	=> 'en-US',
      'page'		=> '', // Added in 3.0
      'default_zoom' => 'auto', // Added in 3.0
 ), $atts ) );
return '<a href="'.$shortcode_viewer_url.$file.'&download='.$download.'&print='.$print.'&fullscreen='.$fullscreen.'&share='.$share.'&zoom='.$zoom.'&open='.$open.'&logo='.$logo.'&pagenav='.$pagenav.'&find='.$find.'#locale='.$language.'&page='.$page.'&zoom='.$default_zoom.'" class="'.$class.'" target="'.$target.'">'.$content.'</a>';
}
add_shortcode( 'tnc-pdf-viewer-image', 'tnc_pdf_image_shortcode' );
// PDF Viewer for WordPress. All Rights Reserved by ThemeNcode (ThemeNcode.com)
?>