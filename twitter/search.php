<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <?php if(osc_count_items() == 0) { ?>
            <meta name="robots" content="noindex, nofollow" />
            <meta name="googlebot" content="noindex, nofollow" />
        <?php } else { ?>
            <meta name="robots" content="index, follow" />
            <meta name="googlebot" content="index, follow" />
        <?php } ?>
    </head>
    <body>
	 <?php osc_current_web_theme_path('header.php') ; ?>
    <?php twitter_show_flash_message() ; ?>
        <div class="content">
            <!-- sidebar -->
            <div class="col-md-3 pull-9">
            <div class="well well-sm">
                <form action="<?php echo osc_base_url(true); ?>" method="get">
                    <div class="input-group">
                    <input type="hidden" name="page" value="search" />
                        <h5><?php _e('Your search', 'twitter') ; ?></h5>
                            <input type="text" name="sPattern" id="query" value="<?php echo osc_search_pattern() ; ?>" />
                        <h5><?php _e('City', 'twitter') ; ?></h5>
                            <input type="text" name="sCity" id="sCity" value="<?php echo osc_search_city() ; ?>" />
                        </div>
                    <?php
                        View::newInstance()->_erase('subcategories') ;
                        View::newInstance()->_erase('categories') ;
                    ?>
                    <?php if ( osc_count_categories() ) { ?>
                       <div class="input-group">
                        <h5><?php _e('Categories', 'twitter') ; ?></h5>
                        <div class="checkbox">
                            <ul class="list-unstyled">
                            <?php // RESET CATEGORIES IF WE USED THEM IN THE HEADER ?>
                            <?php osc_goto_first_category() ; ?>
                                <?php while( osc_has_categories() ) { ?>
                                <li>
                                    <label>
                                        <?php
                                            $rootCategory = Category::newInstance()->findSubcategories(osc_category_id()) ;
                                            $isParent     = false ;
                                            foreach($rootCategory as $c) {
                                                if( in_array($c['pk_i_id'], osc_search_category()) ) {
                                                    $isParent = true ;
                                                }
                                                if( in_array($c['s_slug'], osc_search_category()) ) {
                                                    $isParent = true ;
                                                }
                                            }
                                        ?>
                                        <input type="checkbox" id="cat<?php echo osc_category_id(); ?>" name="sCategory[]" value="<?php echo osc_category_id(); ?>" <?php echo ( (in_array(osc_category_id(), osc_search_category()) || $isParent || in_array(osc_category_slug(), osc_search_category()) || count(osc_search_category()) == 0 )  ? 'checked' : '') ; ?> />
                                        <span><?php echo osc_category_name(); ?></span>
                                    </label>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                      </div>
                    <?php } ?>
                    <?php
                        if(osc_search_category_id()) {
                            osc_run_hook('search_form', osc_search_category_id()) ;
                        } else {
                            osc_run_hook('search_form') ;
                        }
                    ?>
                        <button class="btn btn-info" type="submit"><?php _e('Apply', 'twitter') ; ?></button>
                </form>
                <?php osc_alert_form() ; ?>
            </div>
            </div>
            <!-- sidebar end -->
            <div class="col-md-9">
                <?php require('search_list.php') ; ?>
            </div>  
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>