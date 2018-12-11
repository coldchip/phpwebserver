# Simple HTTP/HTTPS Web Server on PHP

Tired of writing spagetti web server code in php? This PHP web server library will solve your hassle in minutes! It's so simple that it takes about 6 lines create a web server. 

You could also implement pcntl to make a multi-threaded web server! 

Check /example if you need example/demo. 

If you have any improvements you want to add to this library, please feel free to write it down in the issues tab!

# Example

```
$server = new WebServer("0.0.0.0", 80);
$server->createHTTPServer();
$server->on("/", function($server, $client) {
    $server->send($client, "<h1>Hello World!</h1>", 200);
});
$server->run();

```

# Enjoy!

function list:
  ```class WebServer(string $address, int $port);
  
  function createHTTPServer(void);
  
  function createHTTPSServer(string $crtPath, string $keyPath);
  
  function on(string $requestedPath, function $callback(class $server, class $client));
  
  function send(class $client, string $data, $int $httpcode);
  
  function sendFile(class $client, string $file);
  
  function redirect(class $client, string $location);
  
  function run(void);
  
  ```
  
