	</div> <!-- End .page-border div -->

	</div> <!-- End #page div -->

	<?php get_template_part( 'banner728', 'bottom' ); ?>

	</div> <!-- End #wrap div -->
    </div> <!-- End #footer div -->

</div> <!-- End #outerwrap div -->
</div>
<?php wp_footer(); ?>
<div id="footerback">
	<?php /* footer widgets */ if ( is_active_sidebar('widget-5') || is_active_sidebar('widget-6') || is_active_sidebar('widget-7') || is_active_sidebar('widget-8') ) { ?>
	<div id="footer-widgets">
		<div class="limit clearfix">
			<div class="footer-widget1">
				<?php dynamic_sidebar('Footer Widget 1'); ?>
			</div>
			<div class="footer-widget2">
				<?php dynamic_sidebar('Footer Widget 2'); ?>
			</div>
			<div class="footer-widget3">
				<?php dynamic_sidebar('Footer Widget 3'); ?>
			</div>
			<div class="footer-widget4">
				<?php dynamic_sidebar('Footer Widget 4'); ?>
			</div>
		</div>
	</div> <!-- End #footer-widgets div -->
	<?php } ?>

	<div id="footer">
		<div class="limit clearfix">
			<?php if (has_nav_menu('footernav')) { ?>
		  <div id="footnav">
					<ul class="clearfix">
						<?php wp_nav_menu(array('container'=>false,'theme_location'=>'footernav','fallback_cb'=>'footnav_fallback','items_wrap'=>'%3$s')); ?>
					</ul>
				</div>
			<?php } ?>
		&copy;  <?php echo date('Y'); ?> Emergency Medicine Cases, All Rights Reserved  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/privacy-policy/">Privacy Policy</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/terms-conditions">Terms &amp; Conditions</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/feedback/">Contact</a></div>
        </div>
	
<script type="text/javascript">
    (function($){
        $('#iframe-img-div').click(function(){
            $("#iframe-img").hide('slow');
            $("#iframe-pdf").show('slow');
        });     
    })(jQuery);
</script>
<script type="text/javascript">
(function($){
	
	$('.ebook').each(function()
	{
		$(this).click(function()
		{
			var url = $(this).attr('href');
			var pos = url.lastIndexOf('/');
			var name = url.substr(pos);
			console.log("Name:" + name);
			ga('send', 'event', 'download', name);
		
		
		});
	});
})(jQuery);
	
</script>
    

    
</body>

</html>