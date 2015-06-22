<?php
/*
Template Name: Blog (Home Page)
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'content', 'before' ); ?>
<!--
<div id="slidehp"><?php //do_action('slideshow_deploy', '3692'); ?></div>	
-->
<?php get_template_part( 'index4' ); ?>


				<?php the_post(); $content = get_the_content(); ?>

				<?php if ( ! empty( $content ) ) : ?>
					<div class="content">
                    
						<?php the_content(); ?>
					</div>
				<?php endif; ?>

			

<?php get_template_part( 'content', 'after' ); ?>