<?php

require __DIR__ .'/config.php';

function getDocuments($token, $patientId)
{
    echo($token);
    echo($patientId);
    httpGet(getUrl('documents/list?PID=' . $patientId), $token);
}

getDocuments(getToken(), '1234567890');
?>
