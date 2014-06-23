<!-- footer -->
<?php osc_show_widgets('footer'); ?>
    <div class="row">
        <div class="col-md-9 col-md-offset-3">
            <a href="<?php echo osc_contact_url(); ?>"><?php _e('Contact', 'twitter') ; ?></a> &middot;
            This website is proudly using the open source classifieds software <a href="http://osclass.org/">Osclass</a> and <a href="http://twitter.github.com/bootstrap/">twitter bootstrap</a>
        </div>
    </div>
<!-- footer end -->
<!--container end-->
<?php osc_run_hook('footer') ; ?>