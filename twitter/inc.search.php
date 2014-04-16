        <!-- search bar -->        
            <div class="row">
             <div class="col-lg-12">
                    <form class="form-inline" role="form" action="<?php echo osc_base_url(true) ; ?>" method="get" >
                        <input type="hidden" name="page" value="search" />
                          <div class="form-group">  
                            <div class="col-md-3">
                            <input class="form-control" type="text" name="sPattern"></div>
                            <div class="col-md-4"><?php chosen_select_standard() ; ?></div>
                            <div class="col-md-3"><?php chosen_region_select() ; ?></div>
                            <div class="col-md-2"><button type="submit" class="btn btn-primary"><?php _e('Search', 'twitter') ; ?></button></div>
                          </div>
                    </form>
              </div>
            </div>
        <hr />
        <!-- search bar end -->