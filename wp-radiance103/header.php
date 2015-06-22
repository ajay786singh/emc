<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php bloginfo('language'); ?>">





<head>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800,300' rel='stylesheet' type='text/css'/>



<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />



<meta http-equiv="X-UA-Compatible" content="IE=edge" />



<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />



<title><?php wp_title(' '); ?> <?php if(wp_title(' ', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>



<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />



<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style-font.css" type="text/css" media="screen" />



<?php if ( get_option('solostream_responsive_off') != 'Yes'  ) { ?>



<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style-responsive.css" type="text/css" media="screen" />



<meta name="viewport" content="width=device-width,initial-scale=1" />



<?php } ?>



<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



<?php wp_head(); ?>



<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>



<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-1813633-28', 'emergencymedicinecases.com');

  ga('send', 'pageview');



</script>



</head>







<body <?php body_class(); ?>>







<div id="outer-wrap">







	<div id="wrap">







		<div id="header">



			<div id="head-content" class="clearfix">



				<?php if ( get_option('solostream_site_title_option') == 'Image/Logo-Type Title' && get_option('solostream_site_logo_url') ) { ?>



					<div id="logo">



						<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_option('solostream_site_logo_url'); ?>" alt="Emergency Medicine Cases" /></a>



<div id="signup-2"><a href="/newsletter-sign/"><span class="signuptext">Sign up for our Newsletter</a></span>
</div>



</div>



                    



				<?php } else { ?>



					<div id="sitetitle">



						<div class="title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>



						<div class="description"><?php bloginfo('description'); ?></div>



					</div>



				<?php } ?>



				<?php get_template_part( 'banner468head' ); ?>



			</div>







			<?php if ( get_option('solostream_header_contact_on') == 'Yes' ) { ?>



			<div class="header-contact-info">



				<?php if ( get_option('solostream_header_contact_email') ) { ?>



					<span class="head-email">



						<strong><?php echo get_option('solostream_header_contact_intro'); ?></strong> <a href="mailto:<?php echo antispambot(get_option('solostream_header_contact_email')); ?>"><?php echo antispambot(get_option('solostream_header_contact_email')); ?></a>



					</span>



				<?php } ?>



				<?php if ( get_option('solostream_header_contact_phone') ) { ?>



					<span class="head-phone<?php if ( get_option('solostream_header_contact_email') ) { ?> sep<?php } ?>">



						<?php echo get_option('solostream_header_contact_phone'); ?>



					</span>



				<?php } ?>



			</div>



			<?php } ?>



		</div>







		<?php if ( get_option('solostream_show_topnav') != 'no' ) { ?>



		



        <div id="topnav">



			<?php if (has_nav_menu('topnav')) { ?>



				<ul class="nav clearfix">



					<?php wp_nav_menu(array('container'=>false,'theme_location'=>'topnav','fallback_cb'=>'nav_fallback','items_wrap'=>'%3$s')); ?>



                 



				</ul>



			<?php } else { ?>



				<ul class="nav clearfix">



					<li id="home"<?php if (is_front_page()) { echo " class=\"current_page_item\""; } ?>><a href="<?php bloginfo('url'); ?>"><?php _e("Home", "solostream"); ?></a></li>



					<?php wp_list_pages('title_li='); ?>



                   



                </ul>



               



			<?php } ?>



           



		</div>



		<?php } ?>











		<?php if ( get_option('solostream_show_catnav') == 'yes' ) { ?>



		<div id="catnav">



			<?php if (has_nav_menu('catnav')) { ?>



				<ul class="catnav clearfix">



					<?php wp_nav_menu(array('container'=>false,'theme_location'=>'catnav','fallback_cb'=>'catnav_fallback','items_wrap'=>'%3$s')); ?>



				</ul>



			<?php } else { ?>



				<ul class="catnav clearfix">



					<?php wp_list_categories('title_li='); ?>



				</ul>



               



			<?php } ?>



             



</div>



		<?php } ?>







		