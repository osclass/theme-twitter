<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<?php 
if( Params::getParam("action_specific") != '' ) {
        switch( Params::getParam("action_specific") ) {
            case('upload_logo'):
                $package = Params::getFiles("logo") ;
                if ($package['error'] == UPLOAD_ERR_OK) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                        osc_add_flash_ok_message( __('The logo image has been uploaded correctly', 'twitter'), 'admin') ;
                    } else {
                        osc_add_flash_error_message( __("An error has occurred, please try again", 'twitter'), 'admin') ;
                    }
                } else {
                    osc_add_flash_error_message( __("An error has occurred, please try again", 'twitter'), 'admin') ;
                }
            break ;
            case('remove'):
                if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                    unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ;
                    osc_add_flash_ok_message( __('The logo image has been removed', 'twitter'), 'admin') ;
                } else {
                    osc_add_flash_error_message( __("Image not found", 'twitter'), 'admin') ;
                }
            break ;
        }
    }

    osc_show_flash_message('admin') ;
?>
<div class="row" style="margin:10px">
<?php if( !osc_get_preference('donation', 'twitter_theme') ) { ?>
<form name="_xclick" action="https://www.paypal.com/in/cgi-bin/webscr" method="post" class="nocsrf">
    <input type="hidden" name="cmd" value="_donations">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="business" value="info@osclass.org">
    <input type="hidden" name="item_name" value="Osclass project">
    <input type="hidden" name="return" value="http://osclass.org/paypal/">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="lc" value="US" />
    <input type="hidden" name="custom" value="<?php echo osc_admin_render_theme_url('oc-content/themes/twitter/admin/admin_settings.php'); ?>&donation=successful&source=twitter">
    <div id="flashmessage" class="flashmessage flashmessage-inline flashmessage-warning" style="color: #505050; display: block; ">
        <p><?php _e('I would like to contribute to the development of Osclass with a donation of', 'twitter'); ?></p>
            <select name="amount" class="form-control">
            <option value="50">50$</option>
            <option value="25">25$</option>
            <option value="10" selected>10$</option>
            <option value="5">5$</option>
            <option value=""><?php _e('Custom', 'twitter'); ?></option>
        </select>
        <button class="btn btn-success" type="submit" value="<?php echo osc_esc_html(__('Donate', 'twitter')); ?>"><?php _e('donate', 'twitter') ; ?></button>
    </div>
</form>
<?php } ?>
</div>

    <div class="row" style="margin:10px">
          <div id="settings_form" class="well">
              <div style="padding: 20px;">
                  <?php if( is_writable( WebThemes::newInstance()->getCurrentThemePath() . "images/") )  { ?>
                  <p style="border-bottom: 1px black solid;padding-bottom: 10px;">
                      <img style="padding-right: 10px;"src="<?php echo osc_current_admin_theme_url('images/info-icon.png') ; ?>"/>
                      <?php _e('The preferred size of the logo is 600x100', 'twitter') ; ?>.
                      <?php if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) { ?>
                      <strong><?php _e('Note: Uploading another logo will overwrite current logo', 'twitter') ; ?>.</strong>
                      <?php } ?>
                  </p>
                  <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/twitter/admin/admin_settings.php') ; ?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="action_specific" value="upload_logo" />
                      <p>
                          <label for="package"><?php _e('Logo image', 'twitter') ; ?> (png,gif,jpg)</label>
                          <input type="file" name="logo" id="package" />
                      </p>
                      <input id="button_save" type="submit" value="<?php _e('Upload', 'twitter') ; ?>" />
                  </form>
                  <div>
                      <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {?>
                      <p>
                          <?php _e('Preview', 'twitter') ; ?>:<br>
                          <img alt="<?php echo osc_page_title() ; ?>" src="<?php echo osc_current_web_theme_url('images/logo.jpg') ; ?>"/>
                          <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/twitter/admin/admin_settings.php') ; ?>" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="action_specific" value="remove" />
                              <input id="button_remove" type="submit" value="<?php _e('Remove logo', 'twitter') ; ?>" />
                          </form>
                      </p>
                      <?php } else { ?>
                          <p><?php _e('Has not uploaded any logo image', 'twitter') ; ?></p>
                      <?php } ?>
                  </div>
                  <div style="clr"></div>
                  <?php } else { ?>
                  <div id="flash_message">
                      <p>
                          <?php
                              $msg  = sprintf(__('The images folder %s is not writable on your server', 'twitter'), WebThemes::newInstance()->getCurrentThemePath() ."images/" ) . ", " ;
                              $msg .= __('OSClass can\'t upload logo image from the administration panel', 'twitter') . '. ' ;
                              $msg .= __('Please make the mentioned images folder writable', 'twitter') . '.' ;
                              echo $msg;
                          ?>
                      </p>
                      <p>
                          <?php _e('To make a directory writable under UNIX execute this command from the shell', 'twitter') ; ?>:
                      </p>
                      <p style="background-color: white; border: 1px solid black; padding: 8px;">
                          chmod a+w <?php echo WebThemes::newInstance()->getCurrentThemePath() . "images/" ; ?>
                      </p>
                  </div>
                  <?php } ?>
              </div>
          </div>
        </div>  