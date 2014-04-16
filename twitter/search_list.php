<div class="row">
<?php if( osc_count_items() == 0) { ?>
    <div class="col-md-8">
        <h1><?php _e('Search results', 'twitter') ; ?></h1>
    </div>
    <div class="col-md-8">
        <?php if( osc_search_pattern() == '' ) { ?>
            <h5><?php _e('There are no results', 'twitter') ; ?></h5>
        <?php } else { ?>
            <h5><?php printf( __('There are no results matching "%s"', 'twitter'), osc_search_pattern() ) ; ?></h5>
        <?php } ?>
    </div>
<?php } else { ?>
<div class="col-md-12 well well-sm">
    <h1><?php _e('Search Results', 'twitter') ; ?></h1>
     <?php _e('Sort by', 'twitter'); ?>: 
		 <?php $i = 0 ; ?>
        <?php $orders = osc_list_orders();
        foreach($orders as $label => $params) {
            $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
            <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                <span class="label label-primary"><a href="<?php echo osc_update_search_url($params) ; ?>"><?php echo $label; ?></a></span>
            <?php } else { ?>
                <span class="label label-primary"><a href="<?php echo osc_update_search_url($params) ; ?>"><?php echo $label; ?></a></span>
            <?php } ?>
            <?php if ($i != count($orders)-1) { ?>
                
            <?php } ?>
            <?php $i++ ; ?>
        <?php } ?>
      
 </div>
</div>
<div class="col-md-12"><br /></div>
<div class="row">
<div class="col-md-12">
<?php
    osc_get_premiums() ;
    if( osc_count_premiums() > 0 ) {
?>
<div class="col-md-12 bg-warning">
<h6 class="text-right"><small><?php _e('Premium', 'twitter') ; ?></small></h6>
<?php while ( osc_has_premiums() ) { ?>
    <div class="panel panel-warning">
        <div class="media">
        <?php if( osc_count_premium_resources() ) { ?>
            <a class="pull-left" href="<?php echo osc_premium_url() ; ?>">
                <img class="media-object img-responsive" src="<?php echo osc_resource_thumbnail_url() ; ?>" width="100px" height="75px" title="<?php echo osc_premium_title(); ?>" alt="<?php echo osc_premium_title(); ?>" />
            </a>
        <?php } else { ?>
            <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="No Photo" title="No Photo" class="media-object img-responsive" />
        <?php } ?>
            <h4 class="media-heading"><?php if( osc_price_enabled_at_items() ) { ?> <small><strong><?php echo osc_premium_formated_price() ; ?></strong></small> &middot; <?php } ?><a href="<?php echo osc_premium_url() ; ?>"><?php echo osc_premium_title(); ?></a> <span class="label label-primary"><a href="<?php echo osc_item_category_url( osc_premium_category_id() ) ; ?>"><?php echo osc_premium_category() ; ?></a></span></h4><div class="media-body">
            <p><?php printf(__('<strong>Publish date</strong>: %s', 'twitter'), osc_format_date( osc_premium_pub_date() ) ) ; ?></p>
            <?php
                $location = array() ;
                if( osc_premium_country() != '' ) {
                    $location[] = sprintf( __('<strong>Country</strong>: %s', 'twitter'), osc_premium_country() ) ;
                }
                if( osc_premium_region() != '' ) {
                    $location[] = sprintf( __('<strong>Region</strong>: %s', 'twitter'), osc_premium_region() ) ;
                }
                if( osc_premium_city() != '' ) {
                    $location[] = sprintf( __('<strong>City</strong>: %s', 'twitter'), osc_premium_city() ) ;
                }

                if( count($location) > 0) { ?>
                    <p><?php echo implode(' &middot; ', $location) ; ?></p>
                <?php } ?>
            <p><?php echo osc_highlight( strip_tags( osc_premium_description() ) ) ; ?></p>
        </div>
    </div>
 </div>
    <?php } ?>
<?php } ?>
</div>
</div>
<div class="row">
    <?php while ( osc_has_items() ) { ?>
    <div class="col-md-12">
        <div class="media">
            <?php if( osc_count_item_resources() ) { ?>
            <a class="pull-left" href="<?php echo osc_item_url() ; ?>">
                <img class="media-object img-responsive" src="<?php echo osc_resource_thumbnail_url() ; ?>" width="100px" height="75px" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
            </a>
            <?php } else { ?>
            <img class="media-object img-responsive pull-left" src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" width="100px" height="75px" alt="No Photo" title="No Photo"/>
            <?php } ?>
        
        <h4 class="media-heading">
            <?php if( osc_price_enabled_at_items() ) { ?> <small><strong><?php echo osc_item_formated_price() ; ?></strong></small> &middot; <?php } ?><a href="<?php echo osc_item_url() ; ?>"><?php echo osc_item_title(); ?></a> <span class="label label-primary"><a href="<?php echo osc_item_category_url(osc_item_category_id()) ; ?>"><?php echo osc_item_category() ; ?></a></span> <?php if( osc_item_is_premium() ) { ?> <span class="label label-success"><?php _e('Premium', 'twitter');  ?></span><?php } ?></h4><div class="media-body">
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
            <p><?php echo osc_highlight ( osc_item_description() ) ; ?></p>
        </div>
     <hr />
    </div>
 </div>
    <?php } ?>
    </div>
<?php } ?>
<ul class="pagination"><?php echo twitter_search_pagination(); ?></ul>