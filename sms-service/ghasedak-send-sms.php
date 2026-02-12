<?php

# this is a function for send sms with ghasedak sms panel
# this example is for a template with 1 param
# if your template has more params, easily you can add

function send_sms($phone, $first_name)
{
    $api_key = 'type_your_api_key_here';
    $template_name = 'type_your_template_name_here';

    $url = 'https://gateway.ghasedak.me/rest/api/v1/WebService/SendOtpWithParams';

    $headers = [
        'accept: text/plain',
        'ApiKey: ' . $api_key,
        'Content-Type: application/json'
    ];

    $post_fields = [
        "receptors" => [
            [
                "mobile" => $phone,
                "clientReferenceId" => uniqid()
            ]
        ],
        "templateName" => $template_name,
        "param1" => $first_name,
        "isVoice" => false,
        "udh" => false
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_fields));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'status_code' => $http_code,
        'response' => $response
    ];
}