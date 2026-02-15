<?php

function send_sms($phone, $name)
{
    $apiKey = 'TYPE_YOUR_API_KEY_HERE';
    $sender = 'SENDER_PHONE_NUMBER_FROM_SMS_PANEL';
    $message = $name . 'YOUR_MESSAGE';
    $url = "https://api.kavenegar.com/v1/{$apiKey}/sms/send.json";

    $postData = [
        'receptor' => $phone,
        'sender' => $sender,
        'message' => $message,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

print_r(send_sms('TEST_PHOE_NUMBER', 'TEST_NAME'));