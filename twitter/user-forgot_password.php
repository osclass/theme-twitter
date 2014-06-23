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
            <div class="well">
                 <form class="form-horizontal" action="<?php echo osc_base_url(true); ?>" method="post" onsubmit="return doUserForgotPassword() ;">
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="forgot_post" />
                    <input type="hidden" name="userId" value="<?php echo Params::getParam('userId'); ?>" />
                    <input type="hidden" name="code" value="<?php echo Params::getParam('code'); ?>" />
                        <h4><?php _e('Recover your password', 'twitter') ; ?></h4>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="new_password"><?php _e('New pasword', 'twitter') ; ?></label>
                            <div class="col-sm-4">
                                <input class="form-control" type="password" value="" name="new_password" id="new_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="new_password2"><?php _e('Repeat new pasword', 'twitter') ; ?></label>
                            <div class="col-sm-4">
                                <input class="form-control" type="password" value="" name="new_password2" id="new_password2">
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn btn-success" type="submit"><?php _e('Change password', 'twitter') ; ?></button>
                        </div>
                 </form>
            </div>
        </div>
        <script type="text/javascript">
            var text_error_required = '<?php _e('This field is required', 'twitter') ; ?>' ;
        </script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('forgot_password.js') ; ?>"></script>
      <nav class="navbar navbar-static-bottom">
        <div class="container">
         <?php osc_current_web_theme_path('footer.php') ; ?>
        </div>
      </nav>
    </body>
</html>