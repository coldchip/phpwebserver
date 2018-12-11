<?php

require(__DIR__ . "/../src/server.php");

// Make sure you turn off other web servers

$server = new WebServer("0.0.0.0", 80);
$server->createHTTPServer();

$server->on("/", function($server, $client){
    $server->send($client, "<h1>Hello</h1>", 404);
});

$server->on("/test", function($server, $client){
    $server->sendFile($client, "/var/www/test.jpg");
});

$server->on("*", function($server, $client){
    $server->redirect($client, "/test");
});

$server->run();

?>
