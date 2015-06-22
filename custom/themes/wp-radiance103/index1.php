				<?php if (is_home() && get_option('solostream_recent_posts_title')) { ?>
					<h2 class="feature-title"><span><?php echo stripslashes(get_option('solostream_recent_posts_title')); ?></span></h2>
				<?php } ?>

<?php
global $do_not_duplicate;
global $more; $more = 0;
$count = 1; 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ( get_option('solostream_hidedupes') == "No" ) { $do_not_duplicate = NULL; }

// IF THIS IS A CATEGORY-SPECIFIC BLOG PAGE, GRAB THE 'tempcatid' CUSTOM FIELD VALUE AND RUN THE PROPER QUERY
$tempcatid = get_post_meta($post->ID, 'tempcatid', true);
if (is_page() && $tempcatid) {
	query_posts(array(
		'cat' => $tempcatid,
		'post__not_in' =>  $do_not_duplicate,
		'paged' => $paged
	)); 
}

// IF THIS IS NOT A CATEGORY-SPECIFIC BLOG PAGE, RUN THE PROPER QUERY
if (is_home() || is_page()) {
	query_posts(array(
		'post__not_in' =>  $do_not_duplicate,
		'paged' => $paged
	)); 
}

if (have_posts()) : while (have_posts()) : the_post();
$do_not_duplicate[] = $post->ID; ?>

				<div <?php post_class(); ?> id="post-main-<?php the_ID(); ?>">

					<div class="entry clearfix">

						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "solostream"); ?>" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

						<?php get_template_part( 'postinfo' ); ?>

						<a href="<?php the_permalink() ?>" rel="nofollow" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php solostream_large_thumbnail(); ?></a>

						<?php solostream_excerpt(); ?>

						<div style="clear:both;"></div>

					</div>

				</div>

<?php endwhile; endif; ?>

				<?php get_template_part( 'bot-nav' ); ?>