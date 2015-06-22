<?php
$scriptPath = dirname(__FILE__);
$path = realpath($scriptPath . '/./');
$filepath = explode("wp-content",$path);
define('WP_USE_THEMES', false);
require(''.$filepath[0].'/wp-blog-header.php');
//retrieve options
$download        = $_REQUEST['download'];
$print           = $_REQUEST['print'];
$zoom            = $_REQUEST['zoom'];
$fullscreen      = $_REQUEST['fullscreen'];
$share           = $_REQUEST['share'];
$open            = $_REQUEST['open'];
$logo            = $_REQUEST['logo'];
$pagenav         = $_REQUEST['pagenav'];
$logo_image_url  = get_option('logo_image');
$custom_css      = get_option('pdf_viewer_custom_css');
$viewer_bg_color = get_option('viewer_bg_color');
$topbar_bg_color = get_option('topbar_bg_color');

function display_share(){
  global $share;
  if($share == 'false'){
    echo "display: none";
  } 
}
function display_download(){
  global $download;
  if($download == 'false'){
    echo "display: none";
  } 
}
function display_print(){
  global $print;
  if($print == 'false'){
    echo "display: none";
  } 
}
function display_zoom(){
  global $zoom;
  if($zoom == 'false'){
    echo "display: none";
  } 
}
function display_fullscreen(){
  global $fullscreen;
  if($fullscreen == 'false'){
    echo "display: none";
  } 
}
function display_open(){
  global $open;
  if($open == 'false'){
    echo "display: none";
  } 
}
function display_logo(){
  global $logo;
  if($logo !== 'true'){
    echo "display: none";
  } 
}
function display_pagenav(){
  global $pagenav;
  if($pagenav == 'false'){
    echo "display: none";
  } 
}
function display_find(){
  global $find;
  if($find == 'false'){
    echo "display: none";
  } 
}
?>
<!DOCTYPE html>
<html dir="ltr" mozdisallowselectionprint moznomarginboxes>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="google" content="notranslate">
    <title><?php bloginfo('name'); ?></title>
    <script type="text/javascript" src="../tnc-resources/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../tnc-resources/jquery.popup.min.js"></script>
    <link rel="stylesheet" href="../tnc_pdf_style.css" />
    <link rel="stylesheet" href="../tnc-resources/popup.css" />
    <link rel="stylesheet" href="viewer.css"/>
    <script type="text/javascript" src="compatibility.js"></script>
    <link rel="resource" type="application/l10n" href="locale/locale.properties"/>
    <script type="text/javascript" src="l10n.js"></script>
    <script type="text/javascript" src="../build/pdf.js"></script>
    <script type="text/javascript" src="debugger.js"></script>
    <script type="text/javascript" src="viewer.js"></script>
    <style type="text/css">
        body{
          background-color: <?php echo $viewer_bg_color; ?>;
        }
        #toolbarContainer, .findbar, .secondaryToolbar, #tnc-share{
          background-color: <?php echo $topbar_bg_color; ?>;
          background-image: none;
        }
        <?php echo $custom_css; ?>
    </style>
  </head>
  <body tabindex="1">
  <!-- Display Functions by ThemeNcode -->
    <div id="outerContainer" class="loadingInProgress">
      <div id="sidebarContainer">
        <div id="toolbarSidebar">
          <div class="splitToolbarButton toggled">
            <button id="viewThumbnail" class="toolbarButton group toggled" title="Show Thumbnails" tabindex="2" data-l10n-id="thumbs">
               <span data-l10n-id="thumbs_label">Thumbnails</span>
            </button>
            <button id="viewOutline" class="toolbarButton group" title="Show Document Outline" tabindex="3" data-l10n-id="outline">
               <span data-l10n-id="outline_label">Document Outline</span>
            </button>
            <button id="viewAttachments" class="toolbarButton group" title="Show Attachments" tabindex="4" data-l10n-id="attachments">
               <span data-l10n-id="attachments_label">Attachments</span>
            </button>
          </div>
        </div>
        <div id="sidebarContent">
          <div id="thumbnailView">
          </div>
          <div id="outlineView" class="hidden">
          </div>
          <div id="attachmentsView" class="hidden">
          </div>
        </div>
      </div>  <!-- sidebarContainer -->
      <div id="mainContainer">
        <div style="<?php display_find(); ?>" class="findbar hidden doorHanger hiddenSmallView" id="findbar">
          <label for="findInput" class="toolbarLabel" data-l10n-id="find_label">Find:</label>
          <input id="findInput" class="toolbarField" tabindex="41">
          <div class="splitToolbarButton">
            <button class="toolbarButton findPrevious" title="" id="findPrevious" tabindex="42" data-l10n-id="find_previous">
              <span data-l10n-id="find_previous_label">Previous</span>
            </button>
            <div class="splitToolbarButtonSeparator"></div>
            <button class="toolbarButton findNext" title="" id="findNext" tabindex="43" data-l10n-id="find_next">
              <span data-l10n-id="find_next_label">Next</span>
            </button>
          </div>
          <input type="checkbox" id="findHighlightAll" class="toolbarField">
          <label for="findHighlightAll" class="toolbarLabel" tabindex="44" data-l10n-id="find_highlight">Highlight all</label>
          <input type="checkbox" id="findMatchCase" class="toolbarField">
          <label for="findMatchCase" class="toolbarLabel" tabindex="45" data-l10n-id="find_match_case_label">Match case</label>
          <span id="findMsg" class="toolbarLabel"></span>
        </div>  <!-- findbar -->
        <div id="secondaryToolbar" class="secondaryToolbar hidden doorHangerRight">
          <div id="secondaryToolbarButtonContainer">
            <button style="<?php display_fullscreen(); ?>" id="secondaryPresentationMode" class="secondaryToolbarButton presentationMode visibleLargeView" title="Switch to Presentation Mode" tabindex="19" data-l10n-id="presentation_mode">
              <span data-l10n-id="presentation_mode_label">Presentation Mode</span>
            </button>
            <button style="<?php display_open(); ?>" id="secondaryOpenFile" class="secondaryToolbarButton openFile visibleLargeView" title="Open File" tabindex="20" data-l10n-id="open_file">
              <span data-l10n-id="open_file_label">Open</span>
            </button>
            <button style="<?php display_print(); ?>" id="secondaryPrint" class="secondaryToolbarButton print visibleMediumView" title="Print" tabindex="21" data-l10n-id="print">
              <span data-l10n-id="print_label">Print</span>
            </button>
            <button style="<?php display_download(); ?>" id="secondaryDownload" class="secondaryToolbarButton download visibleMediumView" title="Download" tabindex="22" data-l10n-id="download">
              <span data-l10n-id="download_label">Download</span>
            </button>
            <a href="#" id="secondaryViewBookmark" class="secondaryToolbarButton bookmark visibleSmallView" title="Current view (copy or open in new window)" tabindex="23" data-l10n-id="bookmark">
              <span data-l10n-id="bookmark_label">Current View</span>
            </a>
            <div class="horizontalToolbarSeparator visibleLargeView"></div>
            <button style="<?php display_pagenav(); ?>" id="firstPage" class="secondaryToolbarButton firstPage" title="Go to First Page" tabindex="24" data-l10n-id="first_page">
              <span data-l10n-id="first_page_label">Go to First Page</span>
            </button>
            <button style="<?php display_pagenav(); ?>" id="lastPage" class="secondaryToolbarButton lastPage" title="Go to Last Page" tabindex="25" data-l10n-id="last_page">
              <span data-l10n-id="last_page_label">Go to Last Page</span>
            </button>
            <div class="horizontalToolbarSeparator"></div>
            <button id="pageRotateCw" class="secondaryToolbarButton rotateCw" title="Rotate Clockwise" tabindex="26" data-l10n-id="page_rotate_cw">
              <span data-l10n-id="page_rotate_cw_label">Rotate Clockwise</span>
            </button>
            <button id="pageRotateCcw" class="secondaryToolbarButton rotateCcw" title="Rotate Counterclockwise" tabindex="27" data-l10n-id="page_rotate_ccw">
              <span data-l10n-id="page_rotate_ccw_label">Rotate Counterclockwise</span>
            </button>
            <div class="horizontalToolbarSeparator"></div>
            <button id="toggleHandTool" class="secondaryToolbarButton handTool" title="Enable hand tool" tabindex="28" data-l10n-id="hand_tool_enable">
              <span data-l10n-id="hand_tool_enable_label">Enable hand tool</span>
            </button>
            <div class="horizontalToolbarSeparator"></div>
            <button id="documentProperties" class="secondaryToolbarButton documentProperties" title="Document Properties…" tabindex="29" data-l10n-id="document_properties">
              <span data-l10n-id="document_properties_label">Document Properties…</span>
            </button>
          </div>
        </div>  <!-- secondaryToolbar -->
        <div class="toolbar">
          <div id="toolbarContainer">
            <div id="toolbarViewer">
              <div id="toolbarViewerLeft">
                <button id="sidebarToggle" class="toolbarButton" title="Toggle Sidebar" tabindex="5" data-l10n-id="toggle_sidebar">
                  <span data-l10n-id="toggle_sidebar_label">Toggle Sidebar</span>
                </button>
                <div class="toolbarButtonSpacer"></div>
                <button style="<?php display_find(); ?>" id="viewFind" class="toolbarButton group hiddenSmallView" title="Find in Document" tabindex="6" data-l10n-id="findbar">
                   <span data-l10n-id="findbar_label">Find</span>
                </button>
                <div style="<?php display_pagenav(); ?>" class="splitToolbarButton">
                  <button class="toolbarButton pageUp" title="Previous Page" id="previous" tabindex="7" data-l10n-id="previous">
                    <span data-l10n-id="previous_label">Previous</span>
                  </button>
                  <div class="splitToolbarButtonSeparator"></div>
                  <button class="toolbarButton pageDown" title="Next Page" id="next" tabindex="8" data-l10n-id="next">
                    <span data-l10n-id="next_label">Next</span>
                  </button>
                </div>
                <label style="<?php display_pagenav(); ?>" id="pageNumberLabel" class="toolbarLabel" for="pageNumber" data-l10n-id="page_label">Page: </label>
                <input style="<?php display_pagenav(); ?>" type="number" id="pageNumber" class="toolbarField pageNumber" value="1" size="4" min="1" tabindex="9">
                <span style="<?php display_pagenav(); ?>" id="numPages" class="toolbarLabel"></span>
                <span class="social_icon_d" id="open_slink" style="<?php display_share(); ?>"><img src="../images/share.png" title="Share Now!"></span>
                  <div class="tnc_social_share" id="tnc-share" style="display: none;">
                  <?php
                    function pagelink(){
                      $pageURL = 'http';
                      if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
                        $pageURL .= "s";
                      }
                      $pageURL .= "://";
                      if ($_SERVER["SERVER_PORT"] != "80") {
                        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
                      } else {
                      $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                      }
                      return $pageURL;
                    }
                  //define('WEB_DIR', 'pdf-viewer-for-wordpress/web');
                  $file_url = $_REQUEST['file'];
                  $share_url = pagelink();
                  ?>
                    <ul>
                     <!--  <li><a href="#" class="tnc_share">Share: </a></li> -->
                      <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" class="tnc_fb">Facebook</a></li>
                      <li><a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=I Liked this pdf" target="_blank" class="tnc_tw">Twitter</a></li>
                      <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>" target="_blank" class="tnc_lin">Linkedin</a></li>
                      <li><a href="https://plus.google.com/share?url=<?php echo $share_url; ?>" target="_blank" class="tnc_gp">Google Plus</a></li>
                      <li><a href="#" class="tnc_email">Email</a></li>
                    </ul>
                  </div>
              </div>
              <div id="toolbarViewerRight">
              <div style="<?php display_logo(); ?>" class="logo_block"><h3 class="logo_text"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $logo_image_url; ?>" class="tnc_logo_image" /></a></h3></div>
                <button style="<?php display_fullscreen(); ?>" id="presentationMode" class="toolbarButton presentationMode hiddenLargeView" title="Switch to Presentation Mode" tabindex="13" data-l10n-id="presentation_mode">
                  <span data-l10n-id="presentation_mode_label">Presentation Mode</span>
                </button>
                <button style="<?php display_open(); ?>" id="openFile" class="toolbarButton openFile hiddenLargeView" title="Open File" tabindex="14" data-l10n-id="open_file">
                  <span data-l10n-id="open_file_label">Open</span>
                </button>
                <button style="<?php display_print(); ?>" id="print" class="toolbarButton print hiddenMediumView" title="Print" tabindex="15" data-l10n-id="print">
                  <span data-l10n-id="print_label">Print</span>
                </button>
                <button style="<?php display_download(); ?>" id="download" class="toolbarButton download hiddenMediumView" title="Download" tabindex="16" data-l10n-id="download">
                  <span data-l10n-id="download_label">Download</span>
                </button>
                <a href="#" id="viewBookmark" class="toolbarButton bookmark hiddenSmallView" title="Current view (copy or open in new window)" tabindex="17" data-l10n-id="bookmark">
                  <span data-l10n-id="bookmark_label">Current View</span>
                </a>
                <div class="verticalToolbarSeparator hiddenSmallView"></div>
                <button id="secondaryToolbarToggle" class="toolbarButton" title="Tools" tabindex="18" data-l10n-id="tools">
                  <span data-l10n-id="tools_label">Tools</span>
                </button> 
              </div>
              <div style="<?php display_zoom(); ?>" class="outerCenter">
                <div class="innerCenter" id="toolbarViewerMiddle">
                  <div class="splitToolbarButton">
                    <button id="zoomOut" class="toolbarButton zoomOut" title="Zoom Out" tabindex="10" data-l10n-id="zoom_out">
                      <span data-l10n-id="zoom_out_label">Zoom Out</span>
                    </button>
                    <div class="splitToolbarButtonSeparator"></div>
                    <button id="zoomIn" class="toolbarButton zoomIn" title="Zoom In" tabindex="11" data-l10n-id="zoom_in">
                      <span data-l10n-id="zoom_in_label">Zoom In</span>
                     </button>
                  </div>
                  <span id="scaleSelectContainer" class="dropdownToolbarButton">
                     <select id="scaleSelect" title="Zoom" tabindex="12" data-l10n-id="zoom">
                      <option id="pageAutoOption" title="" value="auto" data-l10n-id="page_scale_auto">Automatic Zoom</option>
                      <option id="pageActualOption" title="" value="page-actual" data-l10n-id="page_scale_actual">Actual Size</option>
                      <option id="pageFitOption" title="" value="page-fit" data-l10n-id="page_scale_fit">Fit Page</option>
                      <option id="pageWidthOption" title="" value="page-width" data-l10n-id="page_scale_width">Full Width</option>
                      <option id="customScaleOption" title="" value="custom"></option>
                      <option title="" value="0.5">50%</option>
                      <option title="" value="0.75">75%</option>
                      <option title="" value="1">100%</option>
                      <option title="" value="1.25">125%</option>
                      <option title="" value="1.5" selected="selected">150%</option>
                      <option title="" value="2">200%</option>
                    </select>
                  </span>
                </div>
              </div>
            </div>
            <div id="loadingBar">
              <div class="progress">
                <div class="glimmer">
                </div>
              </div>
            </div>
          </div>
        </div>
        <menu type="context" id="viewerContextMenu">
          <menuitem id="contextFirstPage" label="First Page"
                    data-l10n-id="first_page"></menuitem>
          <menuitem id="contextLastPage" label="Last Page"
                    data-l10n-id="last_page"></menuitem>
          <menuitem id="contextPageRotateCw" label="Rotate Clockwise"
                    data-l10n-id="page_rotate_cw"></menuitem>
          <menuitem id="contextPageRotateCcw" label="Rotate Counter-Clockwise"
                    data-l10n-id="page_rotate_ccw"></menuitem>
        </menu>
        <div id="viewerContainer" tabindex="0">
          <div id="viewer"></div>
        </div>
        <div id="errorWrapper" hidden='true'>
          <div id="errorMessageLeft">
            <span id="errorMessage"></span>
            <button id="errorShowMore" data-l10n-id="error_more_info">
              More Information
            </button>
            <button id="errorShowLess" data-l10n-id="error_less_info" hidden='true'>
              Less Information
            </button>
          </div>
          <div id="errorMessageRight">
            <button id="errorClose" data-l10n-id="error_close">
              Close
            </button>
          </div>
          <div class="clearBoth"></div>
          <textarea id="errorMoreInfo" hidden='true' readonly="readonly"></textarea>
        </div>
      </div> <!-- mainContainer -->
      <div id="overlayContainer" class="hidden">
        <div id="promptContainer" class="hidden">
          <div id="passwordContainer" class="prompt doorHanger">
            <div class="row">
              <p id="passwordText" data-l10n-id="password_label">Enter the password to open this PDF file:</p>
            </div>
            <div class="row">
              <input type="password" id="password" class="toolbarField" />
            </div>
            <div class="buttonRow">
              <button id="passwordCancel" class="overlayButton"><span data-l10n-id="password_cancel">Cancel</span></button>
              <button id="passwordSubmit" class="overlayButton"><span data-l10n-id="password_ok">OK</span></button>
            </div>
          </div>
        </div>
        <div id="documentPropertiesContainer" class="hidden">
          <div class="doorHanger">
            <div class="row">
              <span data-l10n-id="document_properties_file_name">File name:</span> <p id="fileNameField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_file_size">File size:</span> <p id="fileSizeField">-</p>
            </div>
            <div class="separator"></div>
            <div class="row">
              <span data-l10n-id="document_properties_title">Title:</span> <p id="titleField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_author">Author:</span> <p id="authorField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_subject">Subject:</span> <p id="subjectField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_keywords">Keywords:</span> <p id="keywordsField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_creation_date">Creation Date:</span> <p id="creationDateField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_modification_date">Modification Date:</span> <p id="modificationDateField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_creator">Creator:</span> <p id="creatorField">-</p>
            </div>
            <div class="separator"></div>
            <div class="row">
              <span data-l10n-id="document_properties_producer">PDF Producer:</span> <p id="producerField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_version">PDF Version:</span> <p id="versionField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_page_count">Page Count:</span> <p id="pageCountField">-</p>
            </div>
            <div class="buttonRow">
            <button id="documentPropertiesClose" class="overlayButton"><span data-l10n-id="document_properties_close">Close</span></button>
            </div>
          </div>
        </div>
      </div>  <!-- overlayContainer -->
    </div> <!-- outerContainer -->
    <div id="printContainer"></div>
<div id="mozPrintCallback-shim" hidden>
  <style scoped>
#mozPrintCallback-shim {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: 9999999;
  display: block;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.5);
}
#mozPrintCallback-shim[hidden] {
  display: none;
}
@media print {
  #mozPrintCallback-shim {
    display: none;
  }
}
#mozPrintCallback-shim .mozPrintCallback-dialog-box {
  display: inline-block;
  margin: -50px auto 0;
  position: relative;
  top: 45%;
  left: 0;
  min-width: 220px;
  max-width: 400px;
  padding: 9px;
  border: 1px solid hsla(0, 0%, 0%, .5);
  border-radius: 2px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
  background-color: #474747;
  color: hsl(0, 0%, 85%);
  font-size: 16px;
  line-height: 20px;
}
#mozPrintCallback-shim .progress-row {
  clear: both;
  padding: 1em 0;
}
#mozPrintCallback-shim progress {
  width: 100%;
}
#mozPrintCallback-shim .relative-progress {
  clear: both;
  float: right;
}
#mozPrintCallback-shim .progress-actions {
  clear: both;
}
#tnc-share{
  display: none;
  background: <?php echo $topbar_bg_color; ?>;
  padding: 0px;
  position: relative;
  top: 30px;
  left: -35px;
  padding: 4px 2px;
}
.logo_text a img {
  max-width: 120px;
}
@media only screen and (max-width: 600px){
  #sidebarToggle{
    display: none;
  }
}
@media only screen and (max-width: 380px){
  #tnc-share{
    left: 0px;
    top:0px;
  }
}
@media only screen and (max-width: 900px){
  .logo_text {
    display: none;
  }
}
  </style>
  <div class="mozPrintCallback-dialog-box">
    <!-- TODO: Localise the following strings -->
    Preparing document for printing...
    <div class="progress-row">
      <progress value="0" max="100"></progress>
      <span class="relative-progress">0%</span>
    </div>
    <div class="progress-actions">
      <input type="button" value="Cancel" class="mozPrintCallback-cancel">
    </div>
  </div>
</div>
<div id="sendtofriend" class="send-to-friend" style="display: none;">
<h3>Send This Link to a friend</h3>
        <form action="" method="post">
        <table>
        <tr> 
        <td>
        Your Name<br>
        <input name="yourname" type="text" size="40">
        <br>
        Friends Name<br>
        <input name="friendsname" type="text" size="40">
        <br>
        Your Email Address<br>
        <input name="youremailaddress" type="text" size="40">
        <br> 
        Friends Email Address<br>
        <input name="friendsemailaddress" type="text" size="40">
        <br>
        <!-- Subject<br />
        <input name="emailsubject" type="text" size="40">
        <br /> -->
        Message<br>
        <textarea name="message" cols="37" rows= "3"wrap="PHYSICAL"></textarea>
        <br>
        <input class="s-btn-style" type="submit" name="Submit" value="Submit">
        <input class="r-btn-style" type="reset" name="reset" value="Reset">
        </td>
        </tr>
        </table>
        </form>
        <?php
        if(isset($_POST['submit'])){
          $uname = $_POST["yourname"]; 
          $fname = $_POST["friendsname"]; 
          $uemail = $_POST["youremailaddress"]; 
          $femail = $_POST["friendsemailaddress"];
          $message = $_POST["message"]; 
          $link = $share_url;
          $to = "$femail";
          //$subject = $_POST['emailsubject'];
          $subject = $_POST['yourname'] . " Recommended a File for you";
          $headers = "From: $uemail\n";
          $message = "Hi $fname., . $message
          $link
          ";
          $sendmail = mail($to,$subject,$message,$headers);
          if($sendmail){
            echo "Congratulations! You've successfully sent this link to your friend";
          }
        }
        ?>
    </div>
    <script type="text/javascript">
      $('.tnc_email').popup({
      content : $('#sendtofriend')
    });
    </script>
<script type="text/javascript">
$('#open_slink').click(function() {
  $('#tnc-share').fadeToggle(300)
})
</script>
  </body>
</html>