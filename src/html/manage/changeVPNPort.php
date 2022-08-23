<?php
$value = $_POST['port'];

if (preg_match("/^[0-9]+$/", $value) && $value>=0 && $value <= 65535) {
    $jsonString = file_get_contents('/opt/ownVPN/config.json');
    $data = json_decode($jsonString, true);

    $data['vpnPort'] = $value;

    $newJsonString = json_encode($data);
    file_put_contents('/opt/ownVPN/config.json', $newJsonString);
}
?>