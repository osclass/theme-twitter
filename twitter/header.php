        <!-- header --> 
        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav class="navbar navbar-fixed-top" role="login">
            <div class="container-fluid">
                <ul class="list-unstyled navbar-right">
                    <li>
                    <?php if( osc_users_enabled() ) { ?>
                        <?php if( osc_is_web_user_logged_in() ) { ?>
                            <span class="glyphicon glyphicon-user"></span> <?php printf(__('Hi %s', 'twitter'), osc_logged_user_name() . '!'); ?>  
                            &nbsp;<span class="glyphicon glyphicon-edit"></span> <a href="<?php echo osc_user_dashboard_url() ; ?>"><?php _e('My account', 'twitter') ; ?></a>  
                            &nbsp;<span class="glyphicon glyphicon-log-out"></span> <a href="<?php echo osc_user_logout_url() ; ?>"><?php _e('Logout', 'twitter') ; ?></a>
                        <?php } else { ?>
                            &nbsp;<span class="glyphicon glyphicon-log-in"></span> <a href="<?php echo osc_user_login_url() ; ?>"><?php _e('Login', 'twitter') ; ?></a>&nbsp;
                            <span class="glyphicon glyphicon-check"></span> <a href="<?php echo osc_register_account_url() ; ?>"><?php _e('Register', 'twitter') ; ?></a>&nbsp;
                        <?php } ?>
                    <?php } ?>
                    </li>
                    <?php if ( osc_count_web_enabled_locales() > 1) { ?>
                    <?php osc_goto_first_locale() ; ?>
                    <li class="languages">
                         <span class="glyphicon glyphicon-flag"></span> 
                        <a class="active" href="#"><?php _e('Language', 'twitter'); ?> <?php while ( osc_has_web_enabled_locales() ) { if( osc_locale_code() == osc_current_user_locale()) { ?>(<?php echo osc_locale_field('s_short_name') ; ?>)<?php } } ?></a>
                        <ul>
                        <?php $i = 0 ;  ?>
                        <?php osc_goto_first_locale() ; ?>
                        <?php while ( osc_has_web_enabled_locales() ) { ?>
                            <li <?php if($i == 0) { echo "class='first'"; } ?>><a id="<?php echo osc_locale_code() ; ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ) ; ?>"><?php echo osc_locale_field('s_short_name') ; ?></a></li>
                        <?php $i++ ; } ?>
                        </ul>
                    </li>
                </ul>
                <?php } ?>
               </div>
            </nav>
           </div>
          </div>
          
            <div class="logo">
                <?php if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) { ?>
                    <a href="<?php echo osc_base_url() ; ?>">
                        <img src="<?php echo osc_current_web_theme_url('images/logo.jpg') ; ?>" alt="<?php echo osc_page_title() ; ?>" title="<?php echo osc_page_title() ; ?>" class="img-responsive"/>
                    </a>
                <?php } else { ?>
                <div class="row">
                    <div class="col-md-12">
                        <h3><a href="<?php echo osc_base_url() ; ?>"><?php echo osc_page_title() ; ?></a></h3>
                    </div>
                </div>
                <?php } ?>
            </div>
              <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                    <div class="navbar-header">
						      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1"> 
                            <span class="sr-only">
                            </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                       </button>
								<?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
                        <button type="button" class="btn btn-default navbar-btn"><a href="<?php echo osc_item_post_url_in_category() ; ?>"><span class="glyphicon glyphicon-pencil"></span> <?php _e("Publish your ad for free", 'twitter'); ?></a>
                        </button> 
								<?php } ?>
                       
                        </div>
                             <div class="collapse navbar-collapse" id="navbar-collapse-1">
                               <ul class="nav navbar-nav"><?php osc_goto_first_category() ; ?>
                            <?php if(osc_count_categories () > 0) { ?>
                                <?php while ( osc_has_categories() ) { ?>
                                <li class="dropdown <?php echo osc_category_slug() ; ?><?php if ( osc_count_subcategories() > 0 ) { ?> <?php } ?>">
                                    <a href="<?php echo osc_search_category_url() ; ?>" <?php if ( osc_count_subcategories() > 0 ) { ?>class="menu dropdown-toggle" data-toggle="dropdown" <?php } ?>><?php View::newInstance()->_erase('subcategories'); echo osc_category_name() ; ?></a>
                                    <?php if ( osc_count_subcategories() > 0 ) { ?>
                                    <ul class="dropdown-menu">
                                        <?php while ( osc_has_subcategories() ) { ?>
                                        <li class="<?php echo osc_category_slug() ; ?>"><a class="" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>
                                </li>
                                <?php } ?>
										  <?php } ?>
                            </ul>
                             
                        </div> 
                       </div>                        
                     </nav>
        <!-- header end -->
        <?php
        $breadcrumb = osc_breadcrumb('', false);
    if( $breadcrumb != '') { ?>
        <?php echo $breadcrumb; ?>
<?php } ?>