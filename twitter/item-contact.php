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
        <div class="row">
            <div class="well">
				<h4><?php _e('Contact seller', 'twitter') ; ?></h4>
                    <form class="form-horizontal" role="form" <?php if( osc_item_attachment() ) { ?>enctype="multipart/form-data"<?php } ?> action="<?php echo osc_base_url(true) ; ?>" method="post" name="contact_form" id="contact_form" onsubmit="return doItemContact();">
                    <?php ContactForm::primary_input_hidden() ; ?>
                    <?php ContactForm::action_hidden() ; ?>
                    <?php ContactForm::page_hidden() ; ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?php _e('To', 'twitter') ; ?></label>
                            <div class="col-sm-10">
                              <?php echo osc_item_contact_name() ; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label"><?php _e('Item', 'twitter') ; ?></label>
                            <div class="col-sm-10">
                              <a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title() ; ?></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label" for="contact-yourName"><?php _e('Your name', 'twitter') ; ?> *</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?php echo osc_logged_user_name() ; ?>" name="yourName" id="contact-yourName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label" for="contact-yourEmail"><?php _e('Your e-mail', 'twitter') ; ?> *</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" value="<?php echo osc_logged_user_email() ; ?>" name="yourEmail" id="contact-yourEmail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label" for="contact-phoneNumber"><?php _e('Phone number', 'twitter') ; ?> *</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="phone" value="" name="phoneNumber" id="contact-phoneNumber">
                            </div>
                        </div>
                        <?php if( osc_item_attachment() ) { ?>
                        <div class="form-group">
                            <label class="col-sm-9 control-label" for="contact-attachment"><?php _e('Attachments', 'twitter') ; ?></label>
                            <div class="form-group">
                                <?php ContactForm::your_attachment() ; ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-sm-9 control-label" for="contact-message"><?php _e('Message', 'twitter') ; ?> *</label>
                            <div class="form-group">
                                <textarea class="form-control" id="contact-message" name="message" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php osc_show_recaptcha(); ?>
                        </div>
                            <button class="btn btn-success btn-sm" type="submit"><?php _e('Send message', 'twitter') ; ?></button>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            var text_error_required = '<?php _e('This field is required', 'twitter') ; ?>' ;
            var text_valid_email    = '<?php _e('Enter a valid e-mail address', 'twitter') ; ?>' ;
        </script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('item_contact.js') ; ?>"></script>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>