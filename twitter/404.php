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
                <div class="col-md-8">
                    <h1><?php _e('Page not found', 'twitter') ; ?></h1>
                </div>
            </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>