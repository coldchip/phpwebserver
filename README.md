# Simple HTTP/HTTPS Web Server on PHP

Tired of writing spagetti web server code in php? This PHP web server library will solve your hassle in minutes! It's so simple that it takes about 10 lines make a web server

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
