<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo meta_title(); ?></title>
<meta name="title" content="<?php echo osc_esc_html(meta_title()); ?>" />
<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if( function_exists('meta_keywords') ) { ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?>
<link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
<?php } ?>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />
<!-- js -->
<?php
osc_enqueue_style('bootstrap', osc_current_web_theme_styles_url('bootstrap.css') );
osc_enqueue_style('custom', osc_current_web_theme_styles_url('custom.css') );
osc_enqueue_style('jquery-ui-datepicker', osc_assets_url('css/jquery-ui/jquery-ui.css'));
osc_enqueue_style('chosen-css', osc_current_web_theme_js_url('chosen/chosen.css') );
osc_register_script('global-theme-js', osc_current_web_theme_js_url('global.js'),'jquery');
osc_register_script('bootstrap-js', osc_current_web_theme_js_url('bootstrap.js'),'jquery');
osc_register_script('chosen-js', osc_current_web_theme_js_url('chosen/chosen.jquery.min.js'),'jquery');
osc_enqueue_script('jquery');
osc_enqueue_script('bootstrap-js');
osc_enqueue_script('jquery-ui');
osc_enqueue_script('chosen-js');
osc_enqueue_script('global-theme-js');
osc_enqueue_script('php-date');

osc_run_hook('header') ; ?>