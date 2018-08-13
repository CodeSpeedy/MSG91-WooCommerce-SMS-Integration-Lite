<?php
add_action( 'woocommerce_payment_complete', 'wc_sms_after_payment' );
function wc_sms_after_payment( $order_id ){
   $order = new WC_Order($order_id);
   $order_phone = $order->get_billing_phone();
   $total_order = $order->get_total();
   $order_currency = $order->get_currency();
   $site_name = get_bloginfo( 'name' );
   $checkadminsms = get_option('check_admin_sms');
   $checkcustsms = get_option('check_cust_sms');
   	//Message to Customer
	if ($checkcustsms == "checked") {
    //$msgtocustomer = str_replace("ORDER_ID",$order_id,get_option('sms_to_cust'));
	 $orderid_rep_cust = str_replace("ORDER_ID",$order_id,get_option('sms_to_cust'));
	 $ordertotal_rep_cust = str_replace("ORDER_TOTAL",$total_order,$orderid_rep_cust);
	 $sitename_rep_cust = str_replace("SITE_NAME",$site_name,$ordertotal_rep_cust);
	 $msgtocustomer = str_replace("ORDER_CURRENCY",$order_currency,$sitename_rep_cust);
	 // $customerfile = fopen("https://control.msg91.com/api/sendhttp.php?authkey=". get_option('msg_api_key') ."&mobiles=$order_phone&message=".urlencode($msgtocustomer)."&sender=". get_option('sms_sender_id') ."&route=4&country=0", "r")or die("Unable to open file!");
   $customerfile = @wp_remote_get("https://control.msg91.com/api/sendhttp.php?authkey=". get_option('msg_api_key') ."&mobiles=$order_phone&message=".urlencode($msgtocustomer)."&sender=". get_option('sms_sender_id') ."&route=4&country=0")['body'];
    $output = fgets($customerfile);
    fclose($customerfile);
	}
   //Message to admin
   if ($checkadminsms == "checked") {
	 $orderid_rep_admin = str_replace("ORDER_ID",$order_id,get_option('sms_to_admin'));
	 $ordertotal_rep_admin = str_replace("ORDER_TOTAL",$total_order,$orderid_rep_admin);
	 $sitename_rep_admin = str_replace("SITE_NAME",$site_name,$ordertotal_rep_admin);
	 $msgtoadmin = str_replace("ORDER_CURRENCY",$order_currency,$sitename_rep_admin);
	// $adminfile = fopen("https://control.msg91.com/api/sendhttp.php?authkey=". get_option('msg_api_key') ."&mobiles=". get_option('admin_phone_number') ."&message=".urlencode($msgtoadmin)."&sender=". get_option('sms_sender_id') ."&route=4&country=0", "r")or die("Unable to open file!");
   $adminfile = @wp_remote_get("https://control.msg91.com/api/sendhttp.php?authkey=". get_option('msg_api_key') ."&mobiles=". get_option('admin_phone_number') ."&message=".urlencode($msgtoadmin)."&sender=". get_option('sms_sender_id') ."&route=4&country=0")['body'];
    $output = fgets($adminfile);
    fclose($adminfile);
   }
  }
?>