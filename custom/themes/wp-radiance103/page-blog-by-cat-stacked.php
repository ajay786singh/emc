<?php
/*
Template Name: Blog (Home Page)
*/
?>

<?php get_header(); ?>

<!-- Sidebar -->
<?php get_template_part( 'content', 'before' ); ?>

<!-- Put search at top for mobile -->
<div class="search-mobile">
	<div class="widget-wrap">
		<h3 class="widgettitle"><span>Search EM Cases</span></h3>			
	</div>
	<div class="widget-wrap">			
		<div id="search-2" class="widget widget_search">
			<form id="searchform" method="get" action="http://emergencymedicinecases.com/">
				<input type="text" placeholder="Enter Keywords" size="18" maxlength="50" name="s" id="searchfield">
			</form>
		</div>
	</div>
</div>

<!-- Get 8 most recent posts regardless of category, done by Hypenotic -->
<?php //Set params
	$args = array(
		'posts_per_page' => 8,
		'paged' => $paged

		
	);
	$loop = new WP_Query($args); 
?>

<?php // Start loop
	if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

<?php // Get Post image and set to variable
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
	$url = $thumb['0'];
?>

	<article class="blog-home">
		<img src="<?php echo $url; ?>">
		<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		<?php echo wp_trim_words( get_the_content(), 40, '<a href="'. get_permalink() .'"> ... Read More</a>' );?>
	</article>

<?php endwhile; else : ?>

 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

 	<!-- REALLY stop The Loop. -->
 
<?php endif; ?>

<?php get_template_part( 'bot-nav' ); ?>



<!-- BELOW COMMENTED OUT BY HYPENOTIC 

<?php //get_template_part( 'index4' ); ?>

	<?php the_post(); $content = get_the_content(); ?>
	<?php //if ( ! empty( $content ) ) : ?>
		<div class="content">
            <?php //the_content(); ?>
		</div>
	<?php //endif; ?>
-->

<!-- Sidebar -->
<?php get_template_part( 'content', 'after' ); ?>