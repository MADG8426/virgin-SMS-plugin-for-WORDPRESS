<?php

$curl = curl_init();
$SMSmessage='Hi '.Session::get('user_logged_in.name').'. your Ad is now live in
https://haripara.lk/viewPost/'.$item_id[0]->item_no.'. Thank you!';

$ad_phone=$request->ad_phone;
$phone_number='0'.substr($ad_phone,-9);

$data = json_encode(array("Authorization:"=>' Bearer 3|mAHndQiTBV6eSch9cvzDLVu3vBSQ15JPXUorvix7',"recipient" =>
$phone_number,"sender_id" => "Haripara.lk","message" => $SMSmessage));

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://sms.virgincareer.lk/api/v3/sms/send',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS => $data,
CURLOPT_HTTPHEADER => array(
'Authorization: Bearer 3|mAHndQiTBV6eSch9cvzDLVu3vBSQ15JPXUorvix7',
'Accept:application/json',
),
));

curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
$response = curl_exec($curl);
curl_close($curl);