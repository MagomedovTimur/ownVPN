<?php
$value = $_POST['IP'];

if (preg_match("/^((25[0-5]|(2[0-4]|1\d|[1-9]|)\d)\.?\b){4}$/", $value)) {
    $jsonString = file_get_contents('/opt/ownVPN/config.json');
    $data = json_decode($jsonString, true);

    $data['externalIP'] = $value;

    $newJsonString = json_encode($data);
    file_put_contents('/opt/ownVPN/config.json', $newJsonString);
}
?>