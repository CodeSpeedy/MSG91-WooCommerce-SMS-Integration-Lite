<?php
function pw_load_scripts($hook) {
       // Get the hook name from this code - wp_die($hook);
       if($hook != 'woocommerce_page_wc-msg91-sms') {
                return;
        }
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style('custom_css', ''. plugin_dir_url( __FILE__ ) .'/assets/css/custom.css');
    wp_enqueue_script('custom_js', ''. plugin_dir_url( __FILE__ ) .'/assets/js/custom.js');
    wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    //wp_enqueue_script('custom_js', ''. plugin_dir_url( __FILE__ ) .'/assets/js/jscolor.min.js');
   }
add_action('admin_enqueue_scripts', 'pw_load_scripts');

// Color picker
/*add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    //wp_enqueue_style( 'wp-color-picker' );
    //wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}*/