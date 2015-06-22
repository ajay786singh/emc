<?php
if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
} else {
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
}
?>
<div class="wrap">
<div id="poststuff">
    <div id="post-body">
        <?php screen_icon(); ?>
        <div class="tnc-upload-container">
        	<h1>Upload PDF File & get the link below</h1>

            <a href="#" class="tnc_pdf_upload button button-primary">Click here to upload PDF file & get url below</a><br />
            <h4 class="">Find the url of pdf file below:</h4><br>
            <input class="uploaded_file_url" type="text" name="tnc_pdf_file" value="" onclick="this.select();" />
        </div>
        
         <div class="tnc-instructions">
         	<h3>Instructions</h3>
         	<ol>
         		<li>Click on the Big Blue Button to Upload PDF File</li>
         		<li>A popup will appear, select the file you want to upload & click on Get Link</li>
         		<li>A link will appear in the input field below button.</li>
         		<li>Copy the link (Press ctrl+c to copy) & use in any shortcode as file url</li>
         		<li>All Done....</li>
         	</ol>
         </div>
        </div> <!-- postbody -->
    </div><!--poststuff-->
</div><!--/.wrap-->
<script type="text/javascript">
jQuery(document).ready(function(jQuery){
	// Upload File
    jQuery('.tnc_pdf_upload').click(function(e) {

        e.preventDefault();

        var pdf_uploader = wp.media({

            title: 'Upload PDF File',

            button: {

                text: 'Get Link'

            },

            multiple: false  // Set this to true to allow multiple files to be selected

        })

        .on('select', function() {

            var attachment = pdf_uploader.state().get('selection').first().toJSON();

            //jQuery('.header_logo').attr('src', attachment.url);

            jQuery('.uploaded_file_url').val(attachment.url);

        })

        .open();

    });
});
</script>