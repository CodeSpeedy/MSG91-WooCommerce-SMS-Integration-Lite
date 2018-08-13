 jQuery(document).ready(function($) {
      
      $("#msgconfig").css("display", "block");
      $("#msgconfig_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });


    $("#msgconfig_link").click(function() {
       $("#msgconfig").css("display", "block");
       $("#payment_complete, #order_completed, #order_failed, #order_cancelled, #order_refunded, #order_pending, #order_processing, #order_hold, #otp_verify").css("display", "none");

       $("#payment_complete_link, #order_completed_link, #order_failed_link, #order_cancelled_link, #order_refunded_link, #order_pending_link, #order_processing_link, #order_hold_link, #otp_verify_link").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#msgconfig_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });



    $("#payment_complete_link").click(function() {
       $("#payment_complete").css("display", "block");
       $("#msgconfig, #order_completed, #order_failed, #order_cancelled, #order_refunded, #order_pending, #order_processing, #order_hold, #otp_verify").css("display", "none");

        $("#msgconfig_link, #order_completed_link, #order_failed_link, #order_cancelled_link, #order_refunded_link, #order_pending_link, #order_processing_link, #order_hold_link, #otp_verify_link").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#payment_complete_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });
   

    $("#order_processing_link").click(function() {
       $("#order_processing").css("display", "block");
       $("#msgconfig, #payment_complete, #order_completed, #order_failed, #order_cancelled, #order_refunded, #order_pending, #order_hold, #otp_verify").css("display", "none");

        $("#msgconfig_link, #order_completed_link, #order_failed_link, #order_cancelled_link, #order_refunded_link, #order_pending_link, #payment_complete_link, #order_hold_link, #otp_verify_link").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#order_processing_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });



    $("#order_completed_link").click(function() {
       $("#order_completed").css("display", "block");
       $("#msgconfig, #payment_complete, #order_failed, #order_cancelled, #order_refunded, #order_pending, #order_processing, #order_hold, #otp_verify").css("display", "none");

        $("#msgconfig_link, #payment_complete_link, #order_failed_link, #order_cancelled_link, #order_refunded_link, #order_pending_link, #order_processing_link, #order_hold_link, #otp_verify_link").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#order_completed_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });



    $("#order_failed_link").click(function() {
       $("#order_failed").css("display", "block");
       $("#msgconfig, #payment_complete, #order_completed, #order_cancelled, #order_refunded, #order_pending, #order_processing, #order_hold, #otp_verify").css("display", "none");

        $("#msgconfig_link, #payment_complete_link, #order_completed_link, #order_cancelled_link, #order_refunded_link, #order_pending_link, #order_processing_link, #order_hold_link, #otp_verify_link").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#order_failed_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });


   
   $("#order_cancelled_link").click(function() {
       $("#order_cancelled").css("display", "block");
       $("#msgconfig, #payment_complete, #order_completed, #order_failed, #order_refunded, #order_pending, #order_processing, #order_hold, #otp_verify").css("display", "none");

        $("#msgconfig_link, #payment_complete_link, #order_completed_link, #order_failed_link, #order_refunded_link, #order_pending_link, #order_processing_link, #order_hold_link, #otp_verify_link").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#order_cancelled_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });


   $("#order_refunded_link").click(function() {
       $("#order_refunded").css("display", "block");
       $("#msgconfig, #payment_complete, #order_completed, #order_failed, #order_cancelled, #order_pending, #order_processing, #order_hold, #otp_verify").css("display", "none");

        $("#msgconfig_link, #payment_complete_link, #order_completed_link, #order_failed_link, #order_cancelled_link, #order_pending_link, #order_processing_link, #order_hold_link, #otp_verify_link").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#order_refunded_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });



   $("#order_hold_link").click(function() {
       $("#order_hold").css("display", "block");
       $("#msgconfig, #payment_complete, #order_completed, #order_failed, #order_cancelled, #order_pending, #order_processing, #order_refunded, #otp_verify").css("display", "none");

        $("#msgconfig_link, #payment_complete_link, #order_completed_link, #order_failed_link, #order_cancelled_link, #order_pending_link, #order_processing_link, #order_refunded_link, #otp_verify_link").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#order_hold_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });


   $("#order_pending_link").click(function() {
       $("#order_pending").css("display", "block");
       $("#msgconfig, #payment_complete, #order_completed, #order_failed, #order_cancelled, #order_hold, #order_processing, #order_refunded, #otp_verify").css("display", "none");

        $("#msgconfig_link, #payment_complete_link, #order_completed_link, #order_failed_link, #order_cancelled_link, #order_hold_link, #order_processing_link, #order_refunded_link, #otp_verify_link").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#order_pending_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });


   $("#otp_verify_link").click(function() {
       $("#otp_verify").css("display", "block");
       $("#msgconfig, #payment_complete, #order_completed, #order_failed, #order_cancelled, #order_hold, #order_processing, #order_refunded, #order_pending").css("display", "none");

        $("#msgconfig_link, #payment_complete_link, #order_completed_link, #order_failed_link, #order_cancelled_link, #order_hold_link, #order_processing_link, #order_refunded_link, #order_pending_link").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#otp_verify_link").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });

       $("#btn-clr").click(function() {
       $("#btn-clr-option").css("display", "block");
       $("#msgconfig, #payment_complete, #order_completed, #order_failed, #order_cancelled, #order_refunded, #order_pending, #order_processing, #order_hold, #otp_verify").css("display", "none");

       $("#msgconfig_link, #payment_complete_link, #order_completed_link, #order_failed_link, #order_cancelled_link, #order_refunded_link, #order_pending_link, #order_processing_link, #order_hold_link, #otp_verify_link, #btn-clr").css({
           background: '#c3e4f1',
           color: '#555'
       });

       $("#btn-clr").css({
         background: 'rgb(35, 115, 187)',
         color: '#fff'
       });
    });

    //  $('.my-color-field').wpColorPicker();


  });

 // JS Color Start
jQuery(document).ready(function($){
    $('.my-color-field').wpColorPicker();
});