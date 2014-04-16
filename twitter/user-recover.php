<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()) ; ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php') ; ?>
        <?php twitter_show_flash_message() ; ?>
        <div class="content">
              <div class="row">
                <div class="col-md-3">
                    <?php twitter_user_menu() ; ?>
                 </div>
                <div class="col-md-9">
                 <form class="form-horizontal" action="<?php echo osc_base_url(true); ?>" method="post" >
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="recover_post" />
                      <h4><?php _e('Recover your password', 'twitter') ; ?></h4>
                        <div class="form-group">
                             <label class="col-sm-4 control-label" for="s_email"><?php _e('E-mail', 'twitter') ; ?> *</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value="" name="s_email" id="s_email">
                            </div>
                        </div>
                        <div class="form-group">
                            <?php osc_show_recaptcha('recover_password'); ?>
                        </div>
                        <div class="actions">
                            <button class="btn btn-success" type="submit"><?php _e('Send me a new password', 'twitter') ; ?></button>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-7">
                                <a href="<?php echo osc_register_account_url() ; ?>"><?php _e("Register for a free account", 'twitter') ; ?></a> &middot; <a href="<?php echo osc_recover_user_password_url() ; ?>"><?php _e("Forgot password?", 'twitter') ; ?></a>
                            </div>
                        </div>
                 </form>
            </div>
        </div>
      </div>
        <nav class="navbar navbar-static-bottom">
            <div class="container">
             <?php osc_current_web_theme_path('footer.php') ; ?>
            </div>
          </nav>
    </body>
</html>