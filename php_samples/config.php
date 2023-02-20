<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define ('FQDN', 'your_FQDN');
define ('PROTOCOL', 'https');
define ('PORT', 12345);
define('PASSWORD', 'my_password');
define('USERNAME',  'my_username');

function httpGet($url, $token)
{
    try {
        $headers = [
            "Accept: application/json;charset=UTF-8",
            "Authorization: Bearer ". $token
        ];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($curl);
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        curl_close($curl);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        $curlResponse=json_decode($body);
        return $curlResponse;
    }
    catch (Exception $e) {
        echo("ERROR: " . $e->__toString());
    }
}

function httpPost($url, $data)
{
    try {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER,$data->headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data->postFields);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
    catch (Exception $e) {
        echo("ERROR: " . $e->__toString());
    }
}

function getUrl($endPoint)
{
    return PROTOCOL . '://'. FQDN . ':'. PORT . '/api/' . $endPoint;
}

function getToken()
{
    $headers = [
        "Content-Type: application/json",
        "Accept: application/json;charset=UTF-8"
    ];
    $jsonData = [
        'username' => USERNAME,
        'password' => PASSWORD
    ];
    $data = new stdClass();
    $data->headers = $headers;
    $data->postFields = json_encode((object)$jsonData);

    $curlResponse = httpPost(getUrl('token/refreshToken'), $data);
    return $curlResponse->results[0]->token;
}
?>
