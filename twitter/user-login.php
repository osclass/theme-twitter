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
                <form class="form-horizontal" action="<?php echo osc_base_url(true); ?>" method="post" >
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="login_post" />
                       <?php _e('Access to your account', 'twitter') ; ?>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="email"><?php _e('E-mail', 'twitter') ; ?> *</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="email" value="" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-sm-4 control-label" for="password"><?php _e('Password', 'twitter') ; ?> *</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="password" value="" name="password" id="password">
                            </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-4 control-label"><?php _e('Remember me', 'twitter') ; ?></label>
                            <div class="col-sm-4">
                              <input class="form-control" type="checkbox" name="remember" value="remember">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4">
                               <button class="btn btn-success" type="submit"><?php _e('Log in', 'twitter') ; ?></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-7">
                                <a href="<?php echo osc_register_account_url() ; ?>"><?php _e("Register for a free account", 'twitter') ; ?></a> &middot; <a href="<?php echo osc_recover_user_password_url() ; ?>"><?php _e("Forgot password?", 'twitter') ; ?></a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>