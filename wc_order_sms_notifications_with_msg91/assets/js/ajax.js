jQuery(document).ready(function($) {
$(document).ajaxStart(function(){
      $("#loadotp").css("display", "block");
        $("#loadotp").html("Sending OTP to phone number");
    $("#otpreport").css("display", "none");
    
    });
    $(document).ajaxComplete(function(){
        $("#loadotp").css("display", "none");
    $("#otpreport").css("display", "block");
    });
  

$("#getotplink").click(function() {
   var billingphone = $('#billing_phone').val();
   $("#getotplink").html("Resend OTP");


    if (billingphone == "") {
    $("#otpreport").css("color", "indigo");
    $("#otpreport").html("Please provide a billing phone number");
    }
    else {

  var data = {
    action: 'my_action',
    security : MyAjax.security,
    phonenumber:billingphone
  };
  $.post(MyAjax.ajaxurl, data, function(data) {
    $("#otpreport").html(data);
  });

}


});
});