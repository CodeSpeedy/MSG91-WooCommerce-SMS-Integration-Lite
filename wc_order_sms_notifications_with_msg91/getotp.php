<?php
if(isset($_POST['phonenumber']))
{
	$phonenumber = $_POST['phonenumber'];
	$otpmsg = $_POST['msgpart'];
	$senderid = get_option('sms_sender_id');
    $rand_otp = rand(100000,999999);
    $otpmsg = str_replace("SITE_NAME",get_bloginfo('name'),get_option('otp_msg'));
    $otpmsgwithotp = str_replace("OTP_CODE",$rand_otp,$otpmsg);
    $otpmsgwithph = str_replace("BILLING_PHONE",$phonenumber,$otpmsgwithotp);
    $otp_expire_time = get_option('otp_expire_minutes', '15');
    $otpurl = "https://control.msg91.com/api/sendotp.php?authkey=". get_option('msg_api_key') ."&mobile=".$phonenumber."&message=".$otpmsgwithph."&sender=".$senderid."&otp=".$rand_otp."&otp_expiry=".$otp_expire_time."&otp_length=6";
	
	$otp_send_arr = @wp_remote_get($otpurl);
	$otpjsonfile = @$otp_send_arr['body'];

	//echo "<pre>"; print_r($otp_send_arr); echo "</pre>";
	//echo "Hello Bro";

  if (!is_array( $otp_send_arr )) {
  	    echo "<span style='color: #c00;'>error in connection</span>";
  } else {
	    $jsonotpdecode = json_decode($otpjsonfile);
	    if ($jsonotpdecode->type == "success") {
		    echo "<span style='color: green;'>OTP successfully sent to phone number ".$phonenumber."</span>";
	    } else {
		    echo $jsonotpdecode->message;
	    }

  }





}