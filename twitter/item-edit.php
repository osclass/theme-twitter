<?php $aLocales = osc_get_locales() ; ?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()) ; ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
        		  <script type="text/javascript">
            twitter_theme.text_select_subcategory = "<?php _e('Select a subcategory...', 'twitter') ; ?>" ;
            twitter_theme.category_selected_id    = "<?php echo item_selected_category_id() ; ?>" ;
            twitter_theme.subcategory_selected_id = "<?php echo item_selected_subcategory_id() ; ?>" ;
            twitter_theme.max_number_photos       = <?php echo osc_max_images_per_item() ; ?> ;
            twitter_theme.photo_remove_text       = "<?php _e('Remove', 'twitter') ; ?>" ;
            twitter_theme.max_images_fields_txt   = "<?php _e('Sorry, you have reached the maximum number of images per ad',  'twitter') ; ?>" ;
            twitter_theme.country_select_id       = "<?php echo get_country_id((osc_item() != null) ? osc_item() : array()) ; ?>" ;
            twitter_theme.region_select_id        = "<?php echo get_region_id((osc_item() != null) ? osc_item() : array()) ; ?>" ;
            twitter_theme.city_select_id          = "<?php echo get_city_id((osc_item() != null) ? osc_item() : array()) ; ?>" ;
            twitter_theme.ajax_url                = "<?php echo osc_base_url(true) . '?page=ajax' ; ?>" ;
            twitter_theme.text_select_country     = "<?php _e('Select a country...', 'twitter') ; ?>" ;
            twitter_theme.text_select_region      = "<?php _e('Select a region...', 'twitter') ; ?>" ;
            twitter_theme.text_select_city        = "<?php _e('Select a city...', 'twitter') ; ?>" ;
            twitter_theme.text_no_regions         = "<?php _e('No regions available', 'twitter') ; ?>" ;
            twitter_theme.text_no_cities          = "<?php _e('No cities available', 'twitter') ; ?>" ;
            twitter_theme.page                    = "edit" ;
            twitter_theme.item_id                 = "<?php echo osc_item_id() ; ?>" ;
            twitter_theme.delete_photo_txt        = "<?php _e('This action cannot be undone. Are you sure you want to continue?', 'twitter') ; ?>";
        </script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('item_form.js') ; ?>"></script>

        <?php item_category_select_js() ; ?>
    </head>
    <body>
        <?php twitter_show_flash_message() ; ?>
        <?php osc_current_web_theme_path('header.php') ; ?>
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                <h4><?php _e('Update your item', 'twitter') ; ?></h4>
                 <div class="well">
                    <form class="form-horizontal" name="item" action="<?php echo osc_base_url(true) ; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="item_edit_post" />
                        <input type="hidden" name="page" value="item" />
                        <input type="hidden" name="id" value="<?php echo osc_item_id() ; ?>" />
                        <input type="hidden" name="secret" value="<?php echo osc_item_secret() ; ?>" />
                            <!-- category input -->
                            <div class="form-group">
                             <label class="col-sm-1 control-label"><?php _e('Category', 'twitter') ; ?></label>
                              <div class="col-sm-10">
                                <?php item_category_select( __('Select a category...', 'twitter') ) ; ?>
                              </div>
                            </div>
                            <!-- category input end -->
                            <hr />
                            <!-- title and description -->
                                <?php if( count($aLocales) > 1 ) { ?>
                                    <?php item_title_description_multilanguage_box(__('Title', 'twitter'), __('Description', 'twitter'), $aLocales) ; ?>
                                <?php } else { ?>
                                    <?php item_title_description_box(__('Title', 'twitter'), __('Description', 'twitter'), $aLocales) ; ?>
                                <?php } ?>
                            <!-- title and description end -->
                            <hr />
                            <?php if( osc_price_enabled_at_items() ) { ?>
                                <!-- price -->
                                <div class="input-group">
                                    <label class="col-sm-1 control-label" for="price"><?php _e('Price', 'twitter') ; ?></label>
                                    <div class="col-sm-3">
                                        <?php item_price_input( ) ; ?>
                                        </div>
                                        <div class="col-sm-3">
                                        <?php item_currency_select( ) ; ?>
                                        </div>
                                        <div class="col-sm-5">
                                        <p class="bg-warning"><span class="glyphicon glyphicon-info-sign"> </span>
                                            <?php _e("<strong>Note:</strong> If you are giving away your item, enter a price of 0. If you don't want to publish the price, leave empty the field", 'twitter') ; ?>
                                        </p>
                                        </div>
                                </div>
                               <?php } ?> 
                                <!-- price end -->
                            <hr />
                            <?php if( osc_images_enabled_at_items() ) { ?>
                                <!-- photo -->
                                <h3><?php _e('Photos', 'twitter') ; ?></h3>
                                <div class="form-group">
                                    <?php
                                        $resources = osc_get_item_resources();
                                        if( $resources != null && is_array($resources) && count($resources) > 0) { ?>
                                            <ul class="list-unstyled media-grid">
                                            <?php foreach($resources as $r) { ?>
                                            <li id="<?php echo $r['pk_i_id'] ; ?>" fkid="<?php echo $r['fk_i_item_id'] ; ?>" name="<?php echo $r['s_name'] ; ?>">
                                                <a href="javascript://">
                                                    <img class="img-thumbnail" src="<?php echo osc_base_url() . $r['s_path'] . $r['pk_i_id'] . '_thumbnail.' . $r['s_extension'] ; ?>" />
                                                </a>
                                                    <a class="btn btn-danger" href="javascript:delete_image(<?php echo $r['pk_i_id'] . ", " . $r['fk_i_item_id'] . ", '" . $r['s_name'] . "', '" . Params::getParam('secret') . "'" ; ?>);"><?php _e('Delete', 'twitter') ; ?></a>
                                                
                                            </li>
                                            <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    <?php if(osc_max_images_per_item()==0 || (osc_max_images_per_item()!=0 && osc_count_item_resources()<  osc_max_images_per_item())) { ?>
                                    <div class="input-group">
                                        <input type="file" name="photos[]" />
                                    </div>
                                    <?php } ?>
                                    <div class="col-sm-12">
                                        <a href="javascript://" onclick="return add_photo_field();"><?php _e('Add new photo', 'twitter'); ?></a>
                                    </div>
                                </div>
                                <!-- photo end -->
                            <?php } ?>
                            <hr />
                            <!-- location -->
                            <h3><?php _e('Location', 'twitter') ?></h3>
                            <?php item_country_box(__("Country", "twitter"), __("Select a country...", "twitter")) ; ?>
                            <?php item_region_box(__("Region", "twitter"), __("Select a region...", "twitter")) ; ?>
                            <?php item_city_box(__("City", "twitter"), __("Select a city...", "twitter"), true) ; ?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="cityArea"><?php _e('Neighborhood', 'twitter') ; ?></label>
                                <div class="col-sm-10">
                                    <?php item_city_area( ) ; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="address"><?php _e('Address', 'twitter') ; ?></label>
                                <div class="col-sm-10">
                                    <?php item_address( ) ; ?>
                                </div>
                            </div>
                            <!-- location end -->
                            <div class="form-group">
                                <div id="plugin-hook"></div>
                            </div>
                            <div class="form-group">
                                <?php osc_show_recaptcha(); ?>
                            </div>  
                            <div class="actions">                         
                                <button class="btn btn-success" type="submit"><?php _e('Update', 'twitter') ; ?></button>
                                <a class="btn" href="javascript:history.back(-1)"><?php _e('Cancel', 'twitter') ; ?></a>
                            </div>
                    </form>
                  </div>  
               </div>
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>