<?php

require __DIR__ .'/config.php';

function getDocuments($token, $patientId)
{
    $response = httpGet(getUrl('documents/list?PID=' . $patientId), $token);
    // var_dump($response->results[1]);
    return $response->results[1]->DocumentList;
}

$documents = getDocuments(getToken(), '1234567890');
foreach ($documents as $item) {
    echo('ID:' . $item->IDDOC . " - Size: " . $item->DocumentSize . " - Description: " . $item->StudyDescription . "\n");
}
?>
