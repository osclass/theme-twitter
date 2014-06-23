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
                    <h2><?php _e('Your items', 'twitter') ; ?></h2>
            
            <?php if(osc_count_items() == 0) { ?>
                <div class="col-md-9">
                    <h4><?php _e("You don't have any items yet", 'twitter') ; ?></h4>
                    </div>
            <?php } else { ?>
                <?php while( osc_has_items() ) { ?>
                <div class="col-md-9 col-md-offset-3">
                        <h4><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></h4>
                        <p class="text-muted"><?php printf(__('<strong>Publish date</strong>: %s', 'twitter'), osc_format_date( osc_item_pub_date() ) ) ; ?></p>
                        <?php
                            $location = array() ;
                            if( osc_item_country() != '' ) {
                                $location[] = sprintf( __('<strong>Country</strong>: %s', 'twitter'), osc_item_country() ) ;
                            }
                            if( osc_item_region() != '' ) {
                                $location[] = sprintf( __('<strong>Region</strong>: %s', 'twitter'), osc_item_region() ) ;
                            }
                            if( osc_item_city() != '' ) {
                                $location[] = sprintf( __('<strong>City</strong>: %s', 'twitter'), osc_item_city() ) ;
                            }
                            if( count($location) > 0) {
                        ?>
                        <p class="text-muted"><?php echo implode(' &middot; ', $location) ; ?></p>
                        <?php } ?>
                        <p><?php echo osc_highlight( osc_item_description() ) ; ?></p>
                        <p>
                            <strong><a href="<?php echo osc_item_edit_url(); ?>"><?php _e('Edit', 'twitter') ; ?></a></strong>
                            &middot;
                            <a class="delete" onclick="javascript:return confirm('<?php _e('This action can not be undone. Are you sure you want to continue?', 'twitter') ; ?>')" href="<?php echo osc_item_delete_url() ; ?>" ><?php _e('Delete', 'twitter') ; ?></a>
                            <?php if( osc_item_is_inactive() ) { ?>
                            &middot;
                            <a href="<?php echo osc_item_activate_url() ; ?>" ><?php _e('Activate', 'twitter') ; ?></a>
                            <?php } ?>
                        </p>
                    </div>
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