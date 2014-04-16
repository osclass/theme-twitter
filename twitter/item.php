<?php
    $is_expired          = osc_item_is_expired () ;
    $is_user             = !( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) ;
    $is_can_contact      = osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ;

    $is_comments_enabled = osc_comments_enabled() ;
    $is_can_comment      = osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ;
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
        <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('fancybox/jquery.fancybox-1.3.4.js') ; ?>"></script>
        <link href="<?php echo osc_current_web_theme_js_url('fancybox/jquery.fancybox-1.3.4.css') ; ?>" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            $(document).ready(function(){
                $("a[rel=image_group]").fancybox();				 
            });
        </script>
        <?php if( osc_item_is_expired () ) { ?>
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
            <div class="panel panel-default">
              <div id="item_head" class="panel-heading">
             <div class="row">
              <div class="col-md-4">
                 <?php if( osc_price_enabled_at_items() ) { ?>
                  <h4 class="text-success"><span class="glyphicon glyphicon-tag small"> </span> <?php echo osc_item_formated_price() ; ?></h4>
                  <?php } ?>
               </div>
               <div class="col-md-2 pull-right">
						<?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
                  <p id="edit_item_view"> <span class="glyphicon glyphicon-pencil"> </span> <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow">
                    <?php _e('Edit item', 'twitter'); ?>
                    </a></p>
                  <?php } else { ?>
                  
                  <div class="btn-group">
                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php _e('Mark as', 'twitter'); ?>&nbsp;<span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                    <li><a id="item_spam" href="<?php echo osc_item_link_spam(); ?>" rel="nofollow"><?php _e('spam', 'twitter'); ?></a></li> 
                    <li><a id="item_bad_category" href="<?php echo osc_item_link_bad_category(); ?>" rel="nofollow"><?php _e('misclassified', 'twitter'); ?></a></li>
                    <li><a id="item_repeated" href="<?php echo osc_item_link_repeated(); ?>" rel="nofollow"><?php _e('duplicated', 'twitter'); ?></a></li>
                    <li><a id="item_expired" href="<?php echo osc_item_link_expired(); ?>" rel="nofollow"><?php _e('expired', 'twitter'); ?></a></li>
                    <li><a id="item_offensive" href="<?php echo osc_item_link_offensive(); ?>" rel="nofollow"><?php _e('offensive', 'twitter'); ?></a></li> </ul>
                    </div>
						  <?php }; ?>
                  </div>
                 </div>
               </div>
               <div class="row">
                  <div class="col-md-10 col-md-offset-1"><h3><?php echo osc_item_title(); ?></h3></div>
                </div>  
        <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <p><?php printf(__('<strong>Published date:</strong> %s %s', 'twitter'), osc_format_date( osc_item_pub_date() ), date(osc_time_format(), strtotime(osc_item_pub_date())) ) ; ?></p></div>
        <div class="col-md-10 col-md-offset-1">
        <?php if ( osc_item_mod_date() != '' ) { ?>
        <p><?php printf(__('<strong>Modified date:</strong> %s %s', 'twitter'), osc_format_date( osc_item_mod_date() ), date(osc_time_format(), strtotime(osc_item_mod_date())) ) ; ?></p>
        <?php } ?>
        </div>
      </div>

      <div class="panel-body">
      <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <?php $item_location = item_detail_location() ; ?>
        <?php if( count($item_location) > 0 ) { ?>
        <p><?php printf(__('<strong>Location:</strong> %s', 'twitter'), implode(', ', $item_location) ) ; ?></p>
        <?php } ?>
        </div>
      </div>
           <div class="row">
           <div class="col-md-8 col-md-offset-1">
            <?php echo osc_item_description() ; ?>
            <div class="custom_fields">
                <?php if( osc_count_item_meta() > 0 ) { ?>
                   <div class="meta_list">
                      <?php while ( osc_has_item_meta() ) { ?>
                        <p class="meta no-margin"> <strong><?php echo osc_item_meta_name() ; ?>:</strong> <?php echo osc_item_meta_value() ; ?> </p>
                      <?php } ?>
                   </div>
                <?php } ?>
             </div>
            </div>
          </div>
            <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <?php osc_run_hook('item_detail', osc_item() ) ; ?>
              <?php if( osc_images_enabled_at_items() && (osc_count_item_resources() > 0) ) { ?>
              <div class="photos">
                <ul class="list-unstyled list-inline media-grid">
                  <?php while( osc_has_item_resources() ) { ?>
                  <li><a rel="image_group" href="<?php echo osc_resource_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" width="150" alt="<?php echo osc_item_title() ; ?>" title="<?php echo osc_item_title() ; ?>" class="shadow thumbnail img-responsive"/></a> </li>
                  <?php } ?>
                </ul>
             </div>
              <?php } ?>
              </div>
              </div>
              <?php osc_run_hook('location') ; ?>
              </div>
              <div class="panel-footer">
              <div class="row">
          <div class="col-md-10 col-md-offset-1">
          <!-- item detail end -->
          <?php if ( !$is_expired && $is_user && $is_can_contact ) { ?>
          <button class="btn btn-default" data-toggle="modal" data-target="#contact-publisher"><span class="glyphicon glyphicon-envelope">&nbsp;</span>
            <?php _e('contact ', 'twitter'); ?>
            </button>
                <div class="modal fade" id="contact-publisher" tabindex="-1" role="dialog" aria-labelledby="contactPublisher" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><?php _e('Contact us', 'twitter') ; ?></h4>
                      </div>
                      <div class="modal-body">
                     <form <?php if( osc_item_attachment() ) { ?>enctype="multipart/form-data"<?php } ?> class="form-horizontal" action="<?php echo osc_base_url(true) ; ?>" method="post" name="contact_form" id="contact_form" onsubmit="return doItemContact() ;">
                      <input type="hidden" name="action" value="contact_post" />
                      <input type="hidden" name="page" value="item" />
                      <input type="hidden" name="id" value="<?php echo osc_item_id() ; ?>" />
                      <h3>
                                <?php _e('Contact publisher', 'twitter') ; ?>
                              </h3>
                      <?php osc_prepare_user_info() ; ?>
                      <div class="form-group">
                                <label class="col-sm-2 control-label" for="contact-yourName">
                          <?php _e('Your name *', 'twitter') ; ?>
                        </label>
                                <div class="col-sm-10">
                          <input class="form-control" id="contact-yourName" name="yourName" type="text" value="<?php echo osc_logged_user_name(); ?>">
                        </div>
                              </div>
                      <div class="form-group">
                                <label class="col-sm-2 control-label" for="contact-yourEmail">
                          <?php _e('Your e-mail *', 'twitter') ; ?>
                        </label>
                                <div class="col-sm-10">
                          <input class="form-control" id="contact-yourEmail" name="yourEmail" type="text" value="<?php echo osc_logged_user_email();?>">
                        </div>
                              </div>
                      <div class="form-group">
                                <label class="col-sm-2 control-label" for="contact-phoneNumber">
                          <?php _e('Phone number', 'twitter') ; ?>
                        </label>
                                <div class="col-sm-10">
                          <input class="form-control" id="contact-phoneNumber" name="phoneNumber" type="text" value="">
                        </div>
                              </div>
                      <?php if( osc_item_attachment() ) { ?>
                      <div class="form-group">
                                <label class="col-sm-2 control-label" for="contact-attachment">
                          <?php _e('Attachments', 'twitter') ; ?>
                        </label>
                                <div class="col-sm-10">
                          <?php ContactForm::your_attachment() ; ?>
                        </div>
                              </div>
                      <?php } ?>
                      <div class="form-group">
                                <label class="col-sm-2 control-label" for="contact-message">
                          <?php _e('Message', 'twitter') ; ?>
                        </label>
                                <div class="col-sm-10">
                          <textarea class="form-control" id="contact-message" name="message" rows="6"></textarea>
                        </div>
                              </div>
                      <div class="form-group">
                                <div class="recaptcha_container">
                          <?php osc_show_recaptcha(); ?>
                        </div>
                              </div>
                      <button class="btn btn-success btn-sm" type="submit">
                              <?php _e('Send', 'twitter') ; ?>
                              </button>
                    </form>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
       <?php } ?>         
            <a href="<?php echo osc_item_send_friend_url(); ?>" rel="nofollow" class="btn btn-default"><span class="glyphicon glyphicon-share">&nbsp;</span>
					 <?php _e('Share ', 'twitter'); ?>
            </a> 
        </div>
       </div>
          <br />
          <?php if( $is_comments_enabled ) { ?>
          <!-- comments -->
         <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="well well-sm shadow">
              <?php if( $is_can_comment && (osc_item_total_comments() > 0) ) { ?>
              <h2><?php _e('Comments', 'twitter'); ?> </h2>
              <!-- list comments -->
              <div class="list-comments">
						<?php while ( osc_has_item_comments() ) { ?>
                  <div class="comment">
                  <h3><?php echo osc_comment_title() ; ?> <small><em>
                  <?php _e("by", 'twitter') ; ?>
                  <?php echo osc_comment_author_name() ; ?></em></small></h3>
                  <p><?php echo osc_comment_body() ; ?> </p>
                  <?php if ( osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()) ) { ?>
                  <p> <a rel="nofollow" href="<?php echo osc_delete_comment_url() ; ?>" title="<?php _e('Delete your comment', 'twitter') ; ?>">
                    <?php _e('Delete', 'twitter') ; ?>
                    </a> </p>
                  <?php } ?>
                </div>
               <?php } ?>
                <?php if( ( !( osc_comments_per_page() == 0 ) || (osc_item_comments_page() === 'all') ) && ( osc_item_total_comments() >= osc_comments_per_page() ) ) { ?>
                <div class="pagination">
                  <ul><?php echo twitter_comments_item_pagination() ; ?></ul>
             </div>
           <?php } ?>
       </div>
              <!-- list comments end -->
              <?php } ?>
              <h4><?php _e('Leave your comment', 'twitter') ; ?></h4>
              <!-- comment form -->
              <form class="form-horizontal" role="form" action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" onsubmit="return doComment();" >
                <input type="hidden" name="action" value="add_comment" />
                <input type="hidden" name="page" value="item" />
                <input type="hidden" name="id" value="<?php echo osc_item_id() ; ?>" />
             <div class="form-group">
                  <label class="col-sm-2 control-label" for="comment-authorName">
						  <?php _e('Your name *', 'twitter') ; ?>
                  </label>
                  <div class="col-sm-10">
                  <input class="form-control" type="text" value="<?php echo osc_logged_user_name() ; ?>" name="authorName" id="comment-authorName">
                  </div>
             </div>
             <div class="form-group">
                  <label class="col-sm-2 control-label" for="comment-authorEmail">
						  <?php _e('Your e-mail *', 'twitter') ; ?>
                  </label>
                  <div class="col-sm-10">
                  <input class="form-control" type="email" value="<?php echo osc_logged_user_email() ; ?>" name="authorEmail" id="comment-authorEmail">
                </div>
              </div>
            <div class="form-group">
                  <label class="col-sm-2 control-label" for="comment-title">
						  <?php _e('Title', 'twitter') ; ?>
                  </label>
                  <div class="col-sm-10">
                  <input class="form-control" type="text" value="" name="title" id="comment-title">
                </div>
             </div>
           <div class="form-group">
                  <label class="col-sm-2 control-label" for="comment-body">
						  <?php _e('Comment', 'twitter') ; ?>
                  </label>
                  <div class="col-sm-10">
                  <textarea class="form-control" id="comment-body" name="body" rows="6"></textarea>
                </div>
            </div>
          <div class="actions">
                  <button class="btn btn-success btn-sm" type="submit">
						  <?php _e('Post comment', 'twitter') ; ?>
                  </button>
           </div>
      </form>
              <!-- comment form end --> 
            </div>
         </div>
       </div>
          <!-- comments end -->
          <?php } ?>
         </div>
        </div>
       </div> 
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('item_comment.js') ; ?>"></script>
        <script type="text/javascript">
            var text_error_required = '<?php _e('This field is required', 'twitter') ; ?>' ;
            var text_valid_email    = '<?php _e('Enter a valid e-mail address', 'twitter') ; ?>' ;
        </script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('contact.js') ; ?>"></script>
<?php osc_current_web_theme_path('footer.php') ; ?>
</body>
</html>