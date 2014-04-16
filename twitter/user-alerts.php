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
            <?php if(osc_count_alerts() == 0) { ?>
                <div class="col-md-9">
                  <h2><?php _e('Your alerts', 'twitter') ; ?></h2>
                    <h4><?php _e("You do not have any alerts yet", 'twitter') ; ?></h4>
                </div>
            <?php } else { ?>
                <?php while(osc_has_alerts()) { ?>
                    <div class="col-md-9">
                        <h4><?php _e("Alert", 'twitter') ; ?><small> &middot; <a onclick="javascript:return confirm('<?php _e("This action can\'t be undone. Are you sure you want to continue?", 'twitter') ; ?>');" href="<?php echo osc_user_unsubscribe_alert_url() ; ?>"><?php _e('Delete this alert', 'twitter') ; ?></a></small></h4>
                    </div>
                    <?php while(osc_has_items()) { ?>
                        <div class="col-md-9">
                            <h6><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title() ; ?></a></h6>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
      </div>
      <nav class="navbar navbar-static-bottom">
        <div class="container">
         <?php osc_current_web_theme_path('footer.php') ; ?>
        </div>
      </nav>
    </body>
</html>