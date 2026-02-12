<?php
function send_sms($phone, $token)
{
    $api_key = 'type_your_api_key_here';
    $url = "https://api.kavenegar.com/v1/$api_key/verify/lookup.json";

    $template_name = 'type_your_template_name_here';

    $postData = [
        'receptor' => $phone,
        'token' => $token,
        'template' => $template_name,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

# test of the code
$result = send_sms('test_number', 'example');
print_r(json_decode($result, true));