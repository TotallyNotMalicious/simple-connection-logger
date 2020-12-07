<?php

function getthegoodies() {
    $ip = $_SERVER['REMOTE_ADDR'];
    $hostname = gethostbyaddr($ip);
    return "New Host Connected: $hostname";
}

function main() {
    $webhook = "WEBHOOK HERE";
    $info = getthegoodies();
    $payload = array(
        "content" => $info
    );
    $options = array(
        "http" => array(
            "header" => "Content-Type: application/json\r\n",
            "method" => "POST",
            "content" => json_encode($payload)
        )
    );
    $context = stream_context_create($options);
    file_get_contents($webhook, false, $context);
}

main();
