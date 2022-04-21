
Virgin SMS plugin installation STEP1

copy the files to plugins directory PATH >>> " wordpress > wp-content > plugins "



adding the function STEP 2

add function path   woocommerce > templates > checkout thankyou.php   

add below "woocommerce_thankyou_order_received_text" find the phrase then 


copy this and paste in the above mentioned location  -->  send_sms($order->get_billing_phone(),$order->get_order_number());
