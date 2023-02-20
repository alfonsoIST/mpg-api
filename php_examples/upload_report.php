<?php

require __DIR__ .'/config.php';

function uploadReport($token, $filePath)
{
    $headers = [
        "Content-Type: multipart/form-data",
        "Accept: */*",
        "Authorization: Bearer ".$token
    ];
    $data = new stdClass();
    $data->headers = $headers;
    //Sample Data
    $jsonData = (object)[
        'IdFusion' => '12436679',
        'episode' => '12436679',
        'patientID' => '1239189',
        'patientName' => 'MARTIN FELISA',
        'description' => 'InformeEco',
    ];


    $data->postFields = [
        'data' => json_encode($jsonData),
        'file' => new CURLFile($filePath, 'application/pdf', basename($filePath))
    ];



    $curlResponse = httpPost(getUrl('extractor/uploadDocument'), $data);
    echo json_encode($curlResponse);
}

$filePath = '/absolute/path/to/file.pdf';
uploadReport(getToken(), $filePath );
?>
