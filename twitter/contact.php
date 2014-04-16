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
        <div class="container">
           <div class="row">
            <div class="well">
              <h4><?php _e('Contact us', 'twitter') ; ?></h4>
                <form class="form-horizontal" role="form" action="<?php echo osc_base_url(true) ; ?>" method="post" name="contact" onsubmit="return doContact();">
                    <input type="hidden" name="page" value="contact" />
                    <input type="hidden" name="action" value="contact_post" />
                    <div class="form-group">                        
                            <label class="col-sm-2 control-label" for="subject"><?php _e('Subject', 'twitter') ; ?> *</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Subject" name="subject" id="subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="message"><?php _e('Message', 'twitter') ; ?> *</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="message" name="message" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="yourName"><?php _e('Your name', 'twitter') ; ?> *</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Full Name" name="yourName" id="yourName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="yourEmail"><?php _e('Your E-mail', 'twitter') ; ?> *</label>
                           <div class="col-sm-10">
                                <input class="form-control" type="email" placeholder="E-mail" name="yourEmail" id="yourEmail">
                            </div>
                        </div>
                        <div class="form-group">
                            <?php osc_run_hook('user_register_form') ; ?>
                        </div>
                            <div class="form-group">
                                <?php osc_show_recaptcha(); ?>
                            </div>
                        <div class="actions">                            
                            <button class="btn btn-success btn-sm" type="submit"><?php _e('Send', 'twitter') ; ?></button>
                        </div>
                </form>
            </div>
          </div>
        </div>
        <script type="text/javascript">
            var text_error_required = '<?php _e('This field is required', 'twitter') ; ?>' ;
            var text_valid_email    = '<?php _e('Enter a valid e-mail address', 'twitter') ; ?>' ;
        </script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('contact.js') ; ?>"></script>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>