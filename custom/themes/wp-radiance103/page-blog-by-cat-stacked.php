<?php
/*
Template Name: Blog (Home Page)
*/
?>

<?php get_header(); ?>

<!-- Sidebar -->
<?php get_template_part( 'content', 'before' ); ?>

<!-- Get 8 most recent posts regardless of category, done by Hypenotic -->
<?php //Set params
	$args = array(
		'posts_per_page' => 8
	);
	$loop = new WP_Query($args); 
?>

<?php // Start loop
	if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

<?php // Get Post image and set to variable
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
	$url = $thumb['0'];
?>

	<article style="clear: both; padding-bottom: 5em;">
	
		<img style ="float: left; padding-right: 2em;" src="<?php echo $url; ?>">
		<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		<?php echo wp_trim_words( get_the_content(), 40, '<a href="'. get_permalink() .'"> ... Read More</a>' );?>
	</article>

<?php endwhile; else : ?>

 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

 	<!-- REALLY stop The Loop. -->
 	
<?php endif; ?>


<!-- BELOW COMMENTED OUT BY HYPENOTIC -->
<?php //get_template_part( 'index4' ); ?>

	<?php the_post(); $content = get_the_content(); ?>
	<?php if ( ! empty( $content ) ) : ?>
		<div class="content">
            <?php //the_content(); ?>
		</div>
	<?php endif; ?>


<!-- Sidebar -->
<?php get_template_part( 'content', 'after' ); ?>