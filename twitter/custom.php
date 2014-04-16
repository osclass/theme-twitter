<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php') ; ?>
        <?php twitter_show_flash_message() ; ?>
        <div class="content">
            <?php osc_render_file(); ?>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>