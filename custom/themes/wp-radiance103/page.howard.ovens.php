<?php 
/*
* Template Name: Howard Ovens
*/
get_header(); ?>
<?php
   //$pluginurl = dirname(plugin_basename(__FILE__)).'/';
   //$helperscripts = WP_PLUGIN_URL.'/'.$pluginurl.'js/jquery.js';
   //wp_enqueue_script('jquery-min-custom', $helperscripts, array('jquery'));   
?>

<?php get_template_part( 'content', 'before' ); ?>	

<?php 
$id=5992; 
$post = get_post($id); 
$header_content = apply_filters('the_content', $post->post_content); 

//$id=5996; 
//$post = get_post($id); 
//$footer_content = apply_filters('the_content', $post->post_content); 

global $more;
$more = 0;
query_posts('cat=605');
echo $header_content;
if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="post clearfix" id="post-main-<?php the_ID(); ?>">
                                        
					<div class="entry">

						<h1 class="page-title"><?php the_title(); ?>
						<br>
						
						</h1>
                        <a href="<?php the_permalink() ?>" rel="nofollow" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php solostream_large_thumbnail(); ?></a>
                        <b><?php the_date();?></b>
						<?php solostream_excerpt(); ?>

						<div style="clear:both;"></div>

						<?php wp_link_pages(); ?>

					</div>

				</div>

<?php endwhile; endif; 
//echo $footer_content;
echo do_shortcode('[ts_fab authorid="3265" ]');
?>

<?php get_template_part( 'content', 'after' ); ?>