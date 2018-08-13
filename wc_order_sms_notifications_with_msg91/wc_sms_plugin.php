<?php
/**
 * @package Order_SMS_Notifications_With_MSG91_For_WC
 * @version 1.0
 */
/*
Plugin Name: Order SMS Notifications With MSG91 For WooCommerce
Plugin URI: http://wordpress.org/plugins/order-sms-notifications-with-msg91-for-wc/
Description: This plugin send SMS depending upon different order status. It can send SMS to both buyers and admin's phone numbers. You can customize the SMS text easily from the option
Author: Faruque Ahamed Mollick
Version: 1.0
Author URI: https://www.onlinevirtue.com/
*/
add_action("admin_menu", "msg_options");
function msg_options() {
	add_submenu_page(
        'woocommerce',
        'WooCommerce Customizable SMS By Online Virtue',
        '<span style="color: #10de0f;">SMS Notifications</span>',
        'administrator',
        'wc-msg91-sms',
        'wc_sms_settings_page' );
}
add_action('admin_init', 'wc_sms_options');
function wc_sms_options() {
	register_setting('wc_sms_option_group', 'msg_api_key');
	register_setting('wc_sms_option_group', 'admin_phone_number');
	register_setting('wc_sms_option_group', 'sms_sender_id');
	
	register_setting('wc_sms_option_group', 'sms_to_admin');
	register_setting('wc_sms_option_group', 'sms_to_cust');
	//register_setting('wc_sms_option_group', 'sms_from');
	register_setting('wc_sms_option_group', 'check_admin_sms');
	register_setting('wc_sms_option_group', 'check_cust_sms');
	
	//ORDER Processing SMS
	register_setting('wc_sms_option_group', 'process_smsenable_check');
	register_setting('wc_sms_option_group', 'process_sendadmin_check');
	register_setting('wc_sms_option_group', 'process_sendcust_check');
	register_setting('wc_sms_option_group', 'process_msgtxt_admin');
	register_setting('wc_sms_option_group', 'process_msgtxt_cust');
	
	//ORDER complete SMS
	register_setting('wc_sms_option_group', 'complete_smsenable_check');
	register_setting('wc_sms_option_group', 'complete_sendadmin_check');
	register_setting('wc_sms_option_group', 'complete_sendcust_check');
	register_setting('wc_sms_option_group', 'complete_msgtxt_admin');
	register_setting('wc_sms_option_group', 'complete_msgtxt_cust');
	
	//ORDER pending Cancelled
	register_setting('wc_sms_option_group', 'cancelled_smsenable_check');
	register_setting('wc_sms_option_group', 'cancelled_sendadmin_check');
	register_setting('wc_sms_option_group', 'cancelled_sendcust_check');
	register_setting('wc_sms_option_group', 'cancelled_msgtxt_admin');
	register_setting('wc_sms_option_group', 'cancelled_msgtxt_cust');
	
	//ORDER failed SMS
	register_setting('wc_sms_option_group', 'failed_smsenable_check');
	register_setting('wc_sms_option_group', 'failed_sendadmin_check');
	register_setting('wc_sms_option_group', 'failed_sendcust_check');
	register_setting('wc_sms_option_group', 'failed_msgtxt_admin');
	register_setting('wc_sms_option_group', 'failed_msgtxt_cust');
	
}

function wc_sms_settings_page() { ?>

<div class="wrap">
   <div class="container" style="margin: 0;padding: 0;"><h2 style="font-size: 1.9em;"><img src="<?php echo plugin_dir_url( __FILE__ ) . '/assets/logo-small.png'; ?>" width="40px" style="margin-bottom: -8px;"> MSG91 WooCommerce SMS Integration</h2></div>


  <div class="navitems container" style="margin: 0;padding: 0;">
     <span class="nav-tab" id="msgconfig_link">Configure</span>
     <span class="nav-tab" id="payment_complete_link">Payment complete</span>
     <span class="nav-tab" id="order_processing_link">Order processing</span>
     <span class="nav-tab" id="order_completed_link">Order complete</span>
     <span class="nav-tab" id="order_failed_link">Order failed</span>
     <span class="nav-tab" id="order_cancelled_link">Order cancelled</span>
     <span class="nav-tab" id="order_refunded_link">Order refund</span>
     <span class="nav-tab" id="order_hold_link">Order hold</span>
     <span class="nav-tab" id="order_pending_link">Order pending</span>
     <!-- <span class="nav-tab" id="otp_verify_link">OTP</span> -->
     <!-- <span class="nav-tab" id="btn-clr">Button Color</span> -->
  </div>
 
   
	<div class="container" style="margin: 0;padding: 0;">
	<form class="smsform" action="options.php" method="post">

	<div class="seven columns">
	<?php settings_fields('wc_sms_option_group');
	do_settings_sections('wc_sms_option_group'); ?>

	<div id="msgconfig">
	<div class="option-item1">
	<h4>MSG91 Configure</h4><hr>

	<div class="form-group">
	<label>MSG91 API Key: </label>
	<input type="text" name="msg_api_key" class="form-control" value="<?php echo get_option('msg_api_key'); ?>">
	</div>
	
	<div class="form-group">
	<label>Admin phone number to get order notification: </label>
	<input type="number" name="admin_phone_number" class="form-control" value="<?php echo get_option('admin_phone_number'); ?>">
	</div>
	
	<div class="form-group">
	<label>Sender ID (6 characters long): </label>
	<input type="text" name="sms_sender_id" class="form-control" value="<?php echo get_option('sms_sender_id'); ?>"><br/>
	</div>
	</div>
	</div>
	
	
	
	<div id="payment_complete">
	<div class="option-item2">
	<h4>Send SMS FOR Payment Complete</h4><hr>
	SMS To Admin: <br/>
	<textarea name="sms_to_admin" rows="3"><?php echo get_option('sms_to_admin', 'You have got a payment of ORDER_TOTAL ORDER_CURRENCY for order ID ORDER_ID on SITE_NAME.'); ?></textarea><br/><br/>
    SMS To Customer: <br/>
	<textarea name="sms_to_cust" rows="3"> <?php echo get_option('sms_to_cust', 'You have made a payment of ORDER_TOTAL ORDER_CURRENCY for order ID ORDER_ID on SITE_NAME.'); ?></textarea><br/><br/>
	<input type="checkbox" name="check_admin_sms" value="checked" <?php echo get_option('check_admin_sms'); ?>> Send SMS to admin when successful payment made<br/><br/>
	<input type="checkbox" name="check_cust_sms" value="checked" <?php echo get_option('check_cust_sms'); ?>> Send SMS to customer for payment success<br/><br/>
	</div>
	</div>
	
	<div id="order_processing">
	<div class="option-item1">
	<!-- SEND SMS for Order Processing -->
	<h4>Send SMS FOR Order Processing</h4><hr>

	SMS Text To Admin For Order Processing: <br/>
	<textarea name="process_msgtxt_admin" rows="3"><?php echo get_option('process_msgtxt_admin', 'You have got an order of ORDER_TOTAL ORDER_CURRENCY is under processing on SITE_NAME. Order ID ORDER_ID.'); ?></textarea><br/><br/>
    SMS To Customer For Order Processing: <br/>
	<textarea name="process_msgtxt_cust" rows="3"> <?php echo get_option('process_msgtxt_cust', 'You have just order on SITE_NAME of ORDER_TOTAL ORDER_CURRENCY. Your Order ID ORDER_ID.'); ?></textarea><br/><br/>
	<input type="checkbox" name="process_sendadmin_check" value="checked" <?php echo get_option('process_sendadmin_check'); ?>> Send SMS to admin on order processing<br/><br/>
	<input type="checkbox" name="process_sendcust_check" value="checked" <?php echo get_option('process_sendcust_check'); ?>> Send SMS to customer on order processing<br/><br/>
	</div>
	</div>
	
	
	<div id="order_completed">
	<div class="option-item2">
	<!-- SEND SMS for Order Complete -->
	<h4>Send SMS FOR Order Complete</h4><hr>
	SMS Text To Admin For Order Complete: <br/>
	<textarea name="complete_msgtxt_admin" rows="3"><?php echo get_option('complete_msgtxt_admin', 'Order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY has been completed on SITE_NAME.'); ?></textarea><br/><br/>
    SMS To Customer For Order Complete: <br/>
	<textarea name="complete_msgtxt_cust" rows="3"> <?php echo get_option('complete_msgtxt_cust', 'Your order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY has been completed on SITE_NAME.'); ?></textarea><br/><br/>
	<input type="checkbox" name="complete_sendadmin_check" value="checked" <?php echo get_option('complete_sendadmin_check'); ?>> Send SMS to admin on order Complete<br/><br/>
	<input type="checkbox" name="complete_sendcust_check" value="checked" <?php echo get_option('complete_sendcust_check'); ?>> Send SMS to customer on order Complete<br/><br/>
	</div>
	</div>	
	
	<div id="order_failed">
	<div class="option-item1">
	<!-- SEND SMS for Order Failed -->
	<h4>Send SMS FOR Order Failed</h4><hr>
	SMS Text To Admin For Order Failed: <br/>
	<textarea name="failed_msgtxt_admin" rows="3"><?php echo get_option('failed_msgtxt_admin', 'Order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY on SITE_NAME has failed.'); ?></textarea><br/><br/>
    SMS To Customer For Order Failed: <br/>
	<textarea name="failed_msgtxt_cust" rows="3"><?php echo get_option('failed_msgtxt_cust', 'Your order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY on SITE_NAME has failed.'); ?></textarea><br/><br/>
	<input type="checkbox" name="failed_sendadmin_check" value="checked" <?php echo get_option('failed_sendadmin_check'); ?>> Send SMS to admin on order Failed<br/><br/>
	<input type="checkbox" name="failed_sendcust_check" value="checked" <?php echo get_option('failed_sendcust_check'); ?>> Send SMS to customer on order Failed<br/><br/>
	</div>
	</div>
	
	
		
		
	
	<div id="order_cancelled">
	<div class="option-item2">
	<!-- SEND SMS for Order Cancelled -->
	<h4>Send SMS FOR Order Cancelled</h4><hr>
	SMS Text To Admin For Order Cancelled: <br/>
	<textarea name="cancelled_msgtxt_admin" rows="3"><?php echo get_option('cancelled_msgtxt_admin', 'Order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY has been cancelled on SITE_NAME.'); ?></textarea><br/><br/>
    SMS To Customer For Order Cancelled: <br/>
	<textarea name="cancelled_msgtxt_cust" rows="3"> <?php echo get_option('cancelled_msgtxt_cust', 'Your order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY on SITE_NAME has cancelled.'); ?></textarea><br/><br/>
	<input type="checkbox" name="cancelled_sendadmin_check" value="checked" <?php echo get_option('cancelled_sendadmin_check'); ?>> Send SMS to admin on order Cancelled<br/><br/>
	<input type="checkbox" name="cancelled_sendcust_check" value="checked" <?php echo get_option('cancelled_sendcust_check'); ?>> Send SMS to customer on order Cancelled<br/><br/>
	</div>
	</div>
	
	
	<div id="order_refunded">
	<div class="option-item1">
	<div style="text-align: center;">
	  <h3 style="color: red;">This feature is available in our pro version of this plugin.</h3>
	  <a rel="nofollow" target="_blank" href="https://gum.co/yicLO" style="background-color: #ccc; color: #000;padding: 6px;text-decoration: none;font-size: 1.15em;border:solid 1px #000;"><strong>Buy Pro Version At $10</strong></a>
	</div>
	<!-- SEND SMS for Order Refunded -->
	<h4>Send SMS FOR Order Refund</h4><hr>
	SMS Text To Admin For Order Refund: <br/>
	<textarea name="refunded_msgtxt_admin" rows="3" style="cursor: not-allowed;" readonly><?php echo get_option('refunded_msgtxt_admin', 'Order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY on SITE_NAME has refunded.'); ?></textarea><br/><br/>
    SMS To Customer For Order Refunded: <br/>
	<textarea name="refunded_msgtxt_cust" rows="3" style="cursor: not-allowed;" readonly> <?php echo get_option('refunded_msgtxt_cust', 'Your order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY on SITE_NAME has refunded.'); ?></textarea><br/><br/>
	<input type="checkbox" name="refunded_sendadmin_check" value="checked" <?php echo get_option('refunded_sendadmin_check'); ?> style="cursor: not-allowed;opacity: 0.5;" onclick="return false"> Send SMS to admin on order Refund<br/><br/>
	<input type="checkbox" name="refunded_sendcust_check" value="checked" <?php echo get_option('refunded_sendcust_check'); ?> style="cursor: not-allowed;opacity: 0.5;" onclick="return false"> Send SMS to customer on order Refund<br/><br/>
	</div>
	</div>
	
	
	<div id="order_hold">
	<div class="option-item2">
	<div style="text-align: center;">
	  <h3 style="color: red;">This feature is available in our pro version of this plugin.</h3>
	  <a rel="nofollow" target="_blank" href="https://gum.co/yicLO" style="background-color: #ccc; color: #000;padding: 6px;text-decoration: none;font-size: 1.15em;border:solid 1px #000;"><strong>Buy Pro Version At $10</strong></a>
	</div>
	<!-- SEND SMS for Order on Hold -->
	<h4>Send SMS FOR Order On Hold</h4><hr>
	SMS Text To Admin For Order On Hold: <br/>
	<textarea name="hold_msgtxt_admin" rows="3" style="cursor: not-allowed;" readonly><?php echo get_option('hold_msgtxt_admin', 'Order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY on SITE_NAME is on hold.'); ?></textarea><br/><br/>
    SMS To Customer For Order On Hold: <br/>
	<textarea name="hold_msgtxt_cust" rows="3" style="cursor: not-allowed;" readonly> <?php echo get_option('hold_msgtxt_cust', 'Your order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY on SITE_NAME is on hold.'); ?></textarea><br/><br/>
	<input type="checkbox" name="hold_sendadmin_check" value="checked" <?php echo get_option('hold_sendadmin_check'); ?> style="cursor: not-allowed;opacity: 0.5;" onclick="return false"> Send SMS to admin on order on Hold<br/><br/>
	<input type="checkbox" name="hold_sendcust_check" value="checked" <?php echo get_option('hold_sendcust_check'); ?> style="cursor: not-allowed;opacity: 0.5;" onclick="return false"> Send SMS to customer on order on Hold<br/><br/>
	</div>
	</div>
	

	<div id="order_pending">
	<div class="option-item1">
	<div style="text-align: center;">
	  <h3 style="color: red;">This feature is available in our pro version of this plugin.</h3>
	  <a rel="nofollow" target="_blank" href="https://gum.co/yicLO" style="background-color: #ccc; color: #000;padding: 6px;text-decoration: none;font-size: 1.15em;border:solid 1px #000;"><strong>Buy Pro Version At $10</strong></a>
	</div>
	<!-- SEND SMS for Order Pending -->
	<h4>Send SMS FOR Order Pending</h4><hr>
	SMS Text To Admin For Order Pending: <br/>
	<textarea name="pending_msgtxt_admin" rows="3" style="cursor: not-allowed;" readonly><?php echo get_option('pending_msgtxt_admin', 'Order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY on SITE_NAME is pending payment.'); ?></textarea><br/><br/>
    SMS To Customer For Order Pending: <br/>
	<textarea name="pending_msgtxt_cust" rows="3" style="cursor: not-allowed;" readonly> <?php echo get_option('pending_msgtxt_cust', 'Your order ORDER_ID of ORDER_TOTAL ORDER_CURRENCY on SITE_NAME is pending payment.'); ?></textarea><br/><br/>
	<input type="checkbox" name="pending_sendadmin_check" value="checked" <?php echo get_option('pending_sendadmin_check'); ?> style="cursor: not-allowed;opacity: 0.5;" onclick="return false"> Send SMS to admin on order Pending<br/><br/>
	<input type="checkbox" name="pending_sendcust_check" value="checked" <?php echo get_option('pending_sendcust_check'); ?> style="cursor: not-allowed;opacity: 0.5;" onclick="return false"> Send SMS to customer on order Pending<br/><br/>
	</div>
	</div>



	
	</div> <!-- end col-sm-8-->
	<div class="three columns">
	<div id="msgsavebtn"><?php submit_button('Save Settings'); ?></div>

     <img width="190px" src="<?php echo plugin_dir_url( __FILE__ ) . '/assets/msg91-logo.png'; ?>"><br/>
     <p><b>To get the SMS API visit <a href="https://msg91.com/" target="blank">MSG91</a></b></p>
     
	  <a rel="nofollow" target="_blank" href="https://gum.co/yicLO" style="text-decoration: none;color: #953ac3;"><strong style="font-size: 1.2em;text-decoration: none;">Buy Pro Version At $10</strong></a>

	</div>
	
	</form>

   <div class="twelve columns">
    <p>This plugin work with transactional route to send order status SMS.</p>
     <p>Buy Transactional route SMS credit if you want to send order status in SMS</p>
     
    <h3>Text replacement</h3>
    <p><b>SITE_NAME</b> will show the name of your WordPress site</p>
    <p><b>ORDER_TOTAL</b> will show the total amount cost of the order</p>
    <p><b>ORDER_CURRENCY</b> will show the currency name</p>
    <p><b>ORDER_ID</b> will show the ID of the particular order</p>
    

   </div>


	</div><!-- end container-->
</div>
	
<?php
}

include "process_wc_payment.php";

//My TESTS ------------------
//Run after Order Status

//include 'order_status_processing/order_pending.php';
include 'order_status_processing/order_failed.php';
//include 'order_status_processing/order_hold.php';
include 'order_status_processing/order_processing.php';
include 'order_status_processing/order_completed.php';
// include 'order_status_processing/order_refunded.php';
include 'order_status_processing/order_cancelled.php';

//add_action( 'woocommerce_order_status_pending', 'wc_msg_order_pending', 10, 1);
add_action( 'woocommerce_order_status_failed', 'wc_msg_order_failed', 10, 1);
//add_action( 'woocommerce_order_status_on-hold', 'wc_msg_order_hold', 10, 1);
// Note that it's woocommerce_order_status_on-hold, and NOT on_hold.
add_action( 'woocommerce_order_status_processing', 'wc_msg_order_processing', 10, 1);
add_action( 'woocommerce_order_status_completed', 'wc_msg_order_completed', 10, 1);
// add_action( 'woocommerce_order_status_refunded', 'wc_msg_order_refunded', 10, 1);
add_action( 'woocommerce_order_status_cancelled', 'wc_msg_order_cancelled', 10, 1);

include "style.php";
