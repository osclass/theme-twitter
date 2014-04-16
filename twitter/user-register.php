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
                <form class="form-horizontal" name="register" id="register" action="<?php echo osc_base_url(true) ; ?>" method="post" onsubmit="return doUserRegister();" >
                    <input type="hidden" name="page" value="register" />
                    <input type="hidden" name="action" value="register_post" />
                        <h4><?php _e('Register an account for free', 'twitter') ; ?></h4>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="s_name"><?php _e('Name', 'twitter') ; ?> *</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" value="" name="s_name" id="s_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="s_password"><?php _e('Password', 'twitter') ; ?> *</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="" name="s_password" id="s_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="s_password2"><?php _e('Re-type password', 'twitter') ; ?> *</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="" name="s_password2" id="s_password2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="s_email"><?php _e('E-mail', 'twitter') ; ?> *</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" value="" name="s_email" id="s_email">
                            </div>
                        </div>
                        <div class="form-group">
                            <?php osc_run_hook('user_register_form') ; ?>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4">
									     <?php osc_show_recaptcha('register'); ?>
                               <button class="btn btn-success" type="submit"><?php _e('Register', 'twitter') ; ?></button>
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
        <script type="text/javascript">
            var text_error_required = '<?php _e('This field is required', 'twitter') ; ?>' ;
            var text_valid_email    = '<?php _e('Enter a valid e-mail address', 'twitter') ; ?>' ;
        </script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('register.js') ; ?>"></script>
        <nav class="navbar navbar-static-bottom">
            <div class="container">
             <?php osc_current_web_theme_path('footer.php') ; ?>
            </div>
          </nav>
    </body>
</html>