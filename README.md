# Simple HTTP/HTTPS Web Server on PHP
function list:
  class WebServer(string $address, int $port);
  
  function createHTTPServer(void);
  
  function createHTTPSServer(string $crtPath, string $keyPath);
  
  function on(string $requestedPath, function $callback(class $server, class $client));
  
  function send(class $client, string $data, $int $httpcode);
  
  function sendFile(class $client, string $file);
  
  function redirect(class $client, string $location);
  
  function run(void);
