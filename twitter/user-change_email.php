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
                    <form class="form-horizontal" action="<?php echo osc_base_url(true) ; ?>" method="post" onsubmit="return doUserChangeEmail() ;">
                        <input type="hidden" name="page" value="user" />
                        <input type="hidden" name="action" value="change_email_post" />
                            <h4><?php _e('Change your e-mail', 'twitter') ; ?></h4>
                           <div class="form-group">
                               <div class="col-sm-4 control-label">
                                   <strong><?php _e('Current e-mail', 'twitter') ; ?>: </strong></div>
                                   <div class="col-sm-4">
                                   <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo osc_logged_user_email() ; ?>" disabled>
                                   </div>
                               </div>
                            <div class="form-group">
                                  <label class="col-sm-4 control-label" for="new_email"><?php _e('New e-mail', 'twitter') ; ?></label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="email" value="" name="new_email" id="new_email">
                                </div>
                            </div>
                            <div class="actions">
                                <button class="btn btn-success" type="submit"><?php _e('Update', 'twitter') ; ?></button>
                            </div>                          
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var text_error_required = '<?php _e('This field is required', 'twitter') ; ?>' ;
            var text_valid_email    = '<?php _e('Enter a valid e-mail address', 'twitter') ; ?>' ;
        </script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('change_email.js') ; ?>"></script>
         <nav class="navbar navbar-static-bottom">
          <div class="container">
           <?php osc_current_web_theme_path('footer.php') ; ?>
          </div>
        </nav>
    </body>
</html>