<?php
$sh_opt_name                = "auto_add_link";
$ss_opt_name                = "hide_share";
$print_opt_name             = "hide_print";
$download_opt_name          = "hide_download";
$open_opt_name              = "hide_open";
$zoom_opt_name              = "hide_zoom";
$fullscreen_opt_name        = "hide_fullscreen";
$logo_image_opt_name        = "logo_image";
$logo_display_opt_name      = "hide_logo";
$find_opt_name              = "hide_find";
$pagenav_opt_name           = "hide_pagenav";
$link_opt_name              = "tnc_link_target";
$tnc_pdf_custom_css         = "pdf_viewer_custom_css";
$auto_iframe_width_name     = "auto_iframe_width";
$auto_iframe_height_name    = "auto_iframe_height";

if(isset($_POST["submit"])){ 
    $auto_add      = $_POST[$sh_opt_name];
    update_option($sh_opt_name, $auto_add);

    $show_print    = $_POST[$print_opt_name];
    update_option($print_opt_name, $show_print);
    
    $show_download = $_POST[$download_opt_name];
    update_option($download_opt_name, $show_download);
    
    $show_open     = $_POST[$open_opt_name];
    update_option($open_opt_name, $show_open);
    
    $show_zoom     = $_POST[$zoom_opt_name];
    update_option($zoom_opt_name, $show_zoom);
    
    $show_full     = $_POST[$fullscreen_opt_name];
    update_option($fullscreen_opt_name, $show_full);
    
    $show_social   = $_POST[$ss_opt_name];
    update_option($ss_opt_name, $show_social);
    
    $show_logo_image   = $_POST[$logo_image_opt_name];
    update_option($logo_image_opt_name, $show_logo_image);
    
    $show_logo      = $_POST[$logo_display_opt_name];
    update_option($logo_display_opt_name, $show_logo);
    
    $show_find      = $_POST[$find_opt_name];
    update_option($find_opt_name, $show_find);
    
    $show_pagenav   = $_POST[$pagenav_opt_name];
    update_option($pagenav_opt_name, $show_pagenav);
    
    $custom_css   = $_POST[$tnc_pdf_custom_css];
    update_option($tnc_pdf_custom_css, $custom_css);
    
    $link_target   = $_POST[$link_opt_name];
    update_option($link_opt_name, $link_target);

    $auto_iframe_width   = $_POST[$auto_iframe_width_name];
    update_option($auto_iframe_width_name, $auto_iframe_width);

    $auto_iframe_height   = $_POST[$auto_iframe_height_name];
    update_option($auto_iframe_height_name, $auto_iframe_height);
    
    echo '<div id="message" class="updated fade"><p>Options Updated</p></div>';
} else {
    $auto_add           = get_option($sh_opt_name);
    $show_social        = get_option($ss_opt_name);
    $show_print         = get_option($print_opt_name);
    $show_download      = get_option($download_opt_name);
    $show_open          = get_option($open_opt_name);
    $show_zoom          = get_option($zoom_opt_name);
    $show_full          = get_option($fullscreen_opt_name);
    $show_logo_image    = get_option($logo_image_opt_name);
    $show_logo          = get_option($logo_display_opt_name);
    $show_find          = get_option($find_opt_name);
    $show_pagenav       = get_option($pagenav_opt_name);
    $custom_css         = get_option($tnc_pdf_custom_css);
    $link_target        = get_option($link_opt_name);
    $auto_iframe_width  = get_option($auto_iframe_width_name);
    $auto_iframe_height = get_option($auto_iframe_height_name);
} 

//media uploader

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
        <div class="tnc-pdf-column-left">
            <div class="postbox">
                <h3>PDF viewer for WordPress Options</h3>
                <div class="inside">
                    <p>Developed by <a href="http://themencode.com" title="ThemeNcode" target="_blank">ThemeNcode</a></p>
                </div> <!--/.inside--> 
            </div><!--/.postbox-->
            <div class="postbox">
                <fieldset>
                    <h3>General Settings</h3>
                    <div class="inside">
                        <form method="post" action="">
                            <strong>Automatic Display Options (Iframe/Link)</strong><br>
                            <span>If you enable any of these automatic options, the plugin will find all pdf links on your website frontend & replace with either viewer link or viewer iframe.</span><br><br />
                            
                            <select name="<?php echo $sh_opt_name; ?>" id="">
                                <option value="none" <?php if($auto_add == "auto_link"){ echo "selected='selected'";} ?>>Do nothing Automatically</option>
                                <option value="auto_iframe" <?php if($auto_add == "auto_iframe"){ echo "selected='selected'";} ?>>Automatic Iframe</option>
                                <option value="auto_link" <?php if($auto_add == "auto_link"){ echo "selected='selected'";} ?>>Automatic Link</option>
                            </select> <br><br />
                            
                            <strong>Logo Image</strong><br><br />
                            <img class="logo_image" src="<?php echo $show_logo_image ?>" /><br><br />
                            
                            <input class="header_logo_url" type="text" name="<?php echo $logo_image_opt_name; ?>" size="60" value="<?php echo $show_logo_image; ?>">
                            <a href="#" class="tnc_logo_upload button button-primary">Upload</a><br /><br /> 

                            <strong>Toolbars on Viewer</strong><br /><br />
                            <input type="checkbox" name="<?php echo $ss_opt_name; ?>"<?php echo $show_social?"checked='checked'":""; ?>/> &nbsp;<span>Hide Social Share Buttons</span><br /><br />
                            <input type="checkbox" name="<?php echo $print_opt_name; ?>"<?php echo $show_print?"checked='checked'":""; ?>/> &nbsp;<span>Hide Print Button</span><br /><br />
                            <input type="checkbox" name="<?php echo $download_opt_name; ?>"<?php echo $show_download?"checked='checked'":""; ?>/> &nbsp;<span>Hide Download Button</span><br /><br />
                            <input type="checkbox" name="<?php echo $open_opt_name; ?>"<?php echo $show_open?"checked='checked'":""; ?>/> &nbsp;<span>Hide Open Button</span><br /><br />
                            <input type="checkbox" name="<?php echo $zoom_opt_name; ?>"<?php echo $show_zoom?"checked='checked'":""; ?>/> &nbsp;<span>Hide Zoom Option</span><br /><br />
                            <input type="checkbox" name="<?php echo $fullscreen_opt_name; ?>"<?php echo $show_full?"checked='checked'":""; ?>/> &nbsp;<span>Hide FullScreen Button</span><br /><br />
                            <input type="checkbox" name="<?php echo $logo_display_opt_name; ?>"<?php echo $show_logo?"checked='checked'":""; ?>/> &nbsp;<span>Hide Logo</span><br /><br />
                            <input type="checkbox" name="<?php echo $find_opt_name; ?>"<?php echo $show_find?"checked='checked'":""; ?>/> &nbsp;<span>Hide Find Button</span><br /><br />
                            <input type="checkbox" name="<?php echo $pagenav_opt_name; ?>"<?php echo $show_pagenav?"checked='checked'":""; ?>/> &nbsp;<span>Hide Page Navigation on Top</span><br><br />
                            
                            <strong>Custom Css</strong><br />
                            Put your custom css codes here. This css codes will be only used for viewer.<br><br />

                            <textarea name="<?php echo $tnc_pdf_custom_css; ?>" rows="10" cols="50" ><?php echo $custom_css; ?></textarea><br><br />
                            
                            <h3>Auto Link Settings <br><span style="font-size: 70%;">Only Applicable if you select Auto Link in Automatic Display Option.</span></h3>

                            <strong>Link Target</strong><br >_parent / _blank<br><br />
                            <input type="text" name="<?php echo $link_opt_name; ?>" size="70" value="<?php echo $link_target; ?>" /><br><br />


                            <h3>Auto Iframe Settings <br><span style="font-size: 70%;">Only Applicable if you select Auto Iframe in Automatic Display Option.</span></h3>
                            
                            <strong>Iframe Width</strong><br><br />
                            <input type="text" name="<?php echo $auto_iframe_width_name; ?>" size="70" value="<?php echo $auto_iframe_width; ?>" /><br><br />

                            <strong>Iframe Height</strong><br ><br />
                            <input type="text" name="<?php echo $auto_iframe_height_name; ?>" size="70" value="<?php echo $auto_iframe_height; ?>" /><br><br />
                            
                            <p><input type="submit" value="Save PDF Viewer Settings" class="button button-primary" name="submit" /></p>
                        </form>
                    </div><!--/.inside--> 
                </fieldset>
            </div>
        </div> <!-- tnc-column-left  -->
        
        <div class="tnc-pdf-column-right">
                <div class="postbox">
                    <h3>Useful Resources</h3>
                    <div class="inside">
                        <ul>
                            <li><a href="http://goo.gl/v0B6gA">Codecanyon Plugin Page</a></li>
                            <li><a href="http://themencode.com/live-preview/pdf-viewer-for-wordpress/">Plugin Live Demo</a></li>
                            <li><a href="http://themencode.com/documentation/pdf-viewer-for-wordpress-documentation/">Plugin Documentation</a></li>
                            <li><a href="http://youtube.com/channel/UC0mkhMK6fTx1BCovV6M_E4w">Video Documentations</a></li>
                            <li><a href="http://support.themencode.com">Support Portal</a></li>
                        </ul>
                    </div><!--/inside--> 
                </div><!--/.postbox-->

                <div class="postbox">
                    <h3>Latest updates from ThemeNcode</h3>
                    <div class="inside">
                        <iframe src="http://themencode.com/updates/" frameborder="0" width="325" height="400"></iframe>
                    </div><!--/.inside--> 
                </div><!--/.postbox other_plugins -->

                <!-- Subscribe -->
                <div class="postbox">
                    <h3>Stay Updated with Latest Products and News from ThemeNcode</h3>
                    <div class="inside">
                        <div class="newsletter newsletter-subscription">
                            <form method="post" action="http://themencode.com/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
                                <table cellspacing="0" cellpadding="3" border="0">
                                    <!-- first name -->
                                    <tr>
                                        <th>Name</th>
                                        <td>
                                            <input class="newsletter-firstname" type="text" name="nn" size="30"required></td>
                                    </tr>
                                    <!-- email -->
                                    <tr>
                                        <th>Email</th>
                                        <td align="left">
                                            <input class="newsletter-email" type="email" name="ne" size="30" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="newsletter-td-submit">
                                            <input class="newsletter-submit button button-primary" type="submit" value="Subscribe"/>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div><!--/.newsletter--> 
                    </div><!--/.inside --> 
                </div><!-- /.postbox Subscribe End -->
            </div> <!-- tnc-pdf-column-right -->
        </div> <!-- postbody -->
    </div><!--poststuff-->
</div><!--/.wrap-->
<style type="text/css">
    a{
        text-decoration: none;
    }
    #poststuff h3{
        border-bottom: 1px solid #f4f4f4;
    }
</style>
<script type="text/javascript">
    //<![CDATA[
    if (typeof newsletter_check !== "function") {
    window.newsletter_check = function (f) {
        var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
        if (!re.test(f.elements["ne"].value)) {
            alert("The email is not correct");
            return false;
        }
        if (f.elements["nn"] && (f.elements["nn"].value == "" || f.elements["nn"].value == f.elements["nn"].defaultValue)) {
            alert("The name is not correct");
            return false;
        }
        if (f.elements["ny"] && !f.elements["ny"].checked) {
            alert("You must accept the privacy statement");
            return false;
        }
        return true;
    }
    }
    //]]>
</script>