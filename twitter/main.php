<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php') ; ?>
        <?php osc_current_web_theme_path('inc.search.php') ; ?>
        <?php twitter_show_flash_message() ; ?>
        <!-- content -->
        <div class="content">
            <div class="col-md-3 pull-9">
               <div class="row">
                        <h3><?php _e('Pages', 'twitter') ; ?></h3>
                        <ul class="list-group">
                            <?php while( osc_has_static_pages() ) { ?>
                            <li class="list-group-item"><a href="<?php echo osc_static_page_url() ; ?>"><?php echo osc_static_page_title() ; ?></a></li>
                            <?php } ?>
                            <li class="list-group-item"><a href="<?php echo osc_contact_url(); ?>"><?php _e('Contact', 'twitter') ; ?></a></li>
                        </ul>
                
                <?php if ( !View::newInstance()->_exists('list_contries') ) {
                            View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=', 'region_name ASC') ) ;
                      }
                      if( osc_count_list_regions() ) { ?>
                        <h3><?php _e('Regions', 'twitter') ; ?></h3>
                        <ul class="list-group">
                            <?php while( osc_has_list_regions() ) { ?>
                            <li class="list-group-item">
                                <a href="<?php echo osc_search_url( array( 'sRegion' => osc_list_region_id() ) ) ; ?>"><?php echo osc_list_region_name() ; ?></a><span class="badge"><?php echo osc_list_region_items() ; ?></span>
                            </li>
                            <?php } ?>
                        </ul>
                <?php } ?>
                </div>
            </div>
            <div class="col-md-9">
                <h1><?php _e('Latest Items', 'twitter') ; ?></h1>
                <?php if( osc_count_latest_items() == 0) { ?>
                <p>
                    <?php _e('No Latest Items', 'twitter') ; ?>
                </p>
                <?php } else { ?>
                    <?php while ( osc_has_latest_items() ) { ?>
                    <div class="media">
                            <?php if( osc_count_item_resources() ) { ?>
                            <a class="pull-left" href="<?php echo osc_item_url() ; ?>">
                                <img class="media-object img-responsive" src="<?php echo osc_resource_thumbnail_url() ; ?>" width="100px" height="75px" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                            </a>
                            <?php } else { ?>
                            <img class="media-object img-responsive pull-left" src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" width="100px" height="75px" alt="No Photo" title="No Photo"/>
                            <?php } ?>
                        
                            <h3 class="media-heading"><?php if( osc_price_enabled_at_items() ) { ?> <small><strong><?php echo osc_item_formated_price() ; ?></strong></small> &middot; <?php } ?><a href="<?php echo osc_item_url() ; ?>"><?php echo osc_item_title(); ?></a></h3><h4><span class="label label-primary"><a href="<?php echo osc_item_category_url(osc_item_category_id()) ; ?>"><?php echo osc_item_category() ; ?></a></span> <?php if( osc_item_is_premium() ) { ?> <span class="label label-success"><?php _e('Premium', 'twitter');  ?></span><?php } ?></h4><div class="media-body">
                            <p><?php printf(__('<strong>Publish date</strong>: %s', 'twitter'), osc_format_date( osc_item_pub_date() ) ) ; ?></p>
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
                            <p><?php echo implode(' &middot; ', $location) ; ?></p>
                            <?php } ?>
                            <p><?php echo osc_highlight( osc_item_description() ) ; ?></p>
                        </div>
                        <hr />
                    </div>
                    <?php } ?>
                    <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
                    <div class="row">
                        <div class="col col-md-12">
                            <button class="btn btn-default"><a href="<?php echo osc_search_show_all_url();?>"><?php _e("See all offers", 'twitter') ; ?> &raquo;</a></button>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>