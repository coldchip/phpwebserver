<?php

class WebServer {
    private $server;

    public $onPost = null;

    private $path;

    function __construct($ip, $port) {
        $this->ip = $ip;
        $this->port = $port;
        if (empty($this->onPost)) {
            $this->onPost = function () {};
        }
    }

    private function getMIME($ext) {
        $mime = array("323" => "text/h323", "acx" => "application/internet-property-stream", "ai" => "application/postscript", "aif" => "audio/x-aiff", "aifc" => "audio/x-aiff", "aiff" => "audio/x-aiff", 'apk' => "application/vnd.android.package-archive",
        "asf" => "video/x-ms-asf", "asr" => "video/x-ms-asf", "asx" => "video/x-ms-asf", "au" => "audio/basic", "avi" => "video/quicktime", "axs" => "application/olescript", "bas" => "text/plain", "bcpio" => "application/x-bcpio", "bin" => "application/octet-stream", "bmp" => "image/bmp",
        "c" => "text/plain", "cat" => "application/vnd.ms-pkiseccat", "cdf" => "application/x-cdf", "cer" => "application/x-x509-ca-cert", "class" => "application/octet-stream", "clp" => "application/x-msclip", "cmx" => "image/x-cmx", "cod" => "image/cis-cod", "cpio" => "application/x-cpio", "crd" => "application/x-mscardfile",
        "crl" => "application/pkix-crl", "crt" => "application/x-x509-ca-cert", "csh" => "application/x-csh", "css" => "text/css", "dcr" => "application/x-director", "der" => "application/x-x509-ca-cert", "dir" => "application/x-director", "dll" => "application/x-msdownload", "dms" => "application/octet-stream", "doc" => "application/msword",
        "dot" => "application/msword", "dvi" => "application/x-dvi", "dxr" => "application/x-director", "eps" => "application/postscript", "etx" => "text/x-setext", "evy" => "application/envoy", "exe" => "application/octet-stream", "fif" => "application/fractals", "flr" => "x-world/x-vrml", "gif" => "image/gif",
        "gtar" => "application/x-gtar", "gz" => "application/x-gzip", "h" => "text/plain", "hdf" => "application/x-hdf", "hlp" => "application/winhlp", "hqx" => "application/mac-binhex40", "hta" => "application/hta", "htc" => "text/x-component", "htm" => "text/html", "html" => "text/html",
        "htt" => "text/webviewhtml", "ico" => "image/x-icon", "ief" => "image/ief", "iii" => "application/x-iphone", "ins" => "application/x-internet-signup", "isp" => "application/x-internet-signup", "jfif" => "image/pipeg", "jpe" => "image/jpeg", "jpeg" => "image/jpeg", "jpg" => "image/jpeg",
        "js" => "application/x-javascript", "latex" => "application/x-latex", "lha" => "application/octet-stream", "lsf" => "video/x-la-asf", "lsx" => "video/x-la-asf", "lzh" => "application/octet-stream", "m13" => "application/x-msmediaview", "m14" => "application/x-msmediaview", "m3u" => "audio/x-mpegurl", "man" => "application/x-troff-man",
        "mdb" => "application/x-msaccess", "me" => "application/x-troff-me", "mht" => "message/rfc822", "mhtml" => "message/rfc822", "mid" => "audio/mid", "mny" => "application/x-msmoney", "mov" => "video/quicktime", "movie" => "video/x-sgi-movie", "mp2" => "video/mpeg", "mp3" => "audio/mpeg",
        'mp4' => 'video/mp4',
        "mpa" => "video/mpeg", "mpe" => "video/mpeg", "mpeg" => "video/mpeg", "mpg" => "video/mpeg", "mpp" => "application/vnd.ms-project", "mpv2" => "video/mpeg", "ms" => "application/x-troff-ms", "mvb" => "application/x-msmediaview", "nws" => "message/rfc822", "oda" => "application/oda",
        'ogg' => 'video/ogg',
        'ogv' => 'video/ogg',
        "p10" => "application/pkcs10", "p12" => "application/x-pkcs12", "p7b" => "application/x-pkcs7-certificates", "p7c" => "application/x-pkcs7-mime", "p7m" => "application/x-pkcs7-mime", "p7r" => "application/x-pkcs7-certreqresp", "p7s" => "application/x-pkcs7-signature", "pbm" => "image/x-portable-bitmap", "pdf" => "application/pdf", "pfx" => "application/x-pkcs12",
        "pgm" => "image/x-portable-graymap", "pko" => "application/ynd.ms-pkipko", "pma" => "application/x-perfmon", "pmc" => "application/x-perfmon", "pml" => "application/x-perfmon", "pmr" => "application/x-perfmon", "pmw" => "application/x-perfmon", "png" => "image/png", "pnm" => "image/x-portable-anymap", "pot" => "application/vnd.ms-powerpoint", "ppm" => "image/x-portable-pixmap",
        "pps" => "application/vnd.ms-powerpoint", "ppt" => "application/vnd.ms-powerpoint", "prf" => "application/pics-rules", "ps" => "application/postscript", "pub" => "application/x-mspublisher", "qt" => "video/quicktime", "ra" => "audio/x-pn-realaudio", "ram" => "audio/x-pn-realaudio", "ras" => "image/x-cmu-raster", "rgb" => "image/x-rgb",
        "rmi" => "audio/mid", "roff" => "application/x-troff", "rtf" => "application/rtf", "rtx" => "text/richtext", "scd" => "application/x-msschedule", "sct" => "text/scriptlet", "setpay" => "application/set-payment-initiation", "setreg" => "application/set-registration-initiation", "sh" => "application/x-sh", "shar" => "application/x-shar",
        "sit" => "application/x-stuffit", "snd" => "audio/basic", "spc" => "application/x-pkcs7-certificates", "spl" => "application/futuresplash", "src" => "application/x-wais-source", "sst" => "application/vnd.ms-pkicertstore", "stl" => "application/vnd.ms-pkistl", "stm" => "text/html", "svg" => "image/svg+xml", "sv4cpio" => "application/x-sv4cpio",
        "sv4crc" => "application/x-sv4crc", "t" => "application/x-troff", "tar" => "application/x-tar", "tcl" => "application/x-tcl", "tex" => "application/x-tex", "texi" => "application/x-texinfo", "texinfo" => "application/x-texinfo", "tgz" => "application/x-compressed", "tif" => "image/tiff", "tiff" => "image/tiff",
        "tr" => "application/x-troff", "trm" => "application/x-msterminal", "tsv" => "text/tab-separated-values", "txt" => "text/plain", "uls" => "text/iuls", "ustar" => "application/x-ustar", "vcf" => "text/x-vcard", "vrml" => "x-world/x-vrml", "wav" => "audio/x-wav", "wcm" => "application/vnd.ms-works",
        "wdb" => "application/vnd.ms-works",
        'webm' => 'video/webm',
        "wks" => "application/vnd.ms-works", "wmf" => "application/x-msmetafile", "wps" => "application/vnd.ms-works", "wri" => "application/x-mswrite", "wrl" => "x-world/x-vrml", "wrz" => "x-world/x-vrml", "xaf" => "x-world/x-vrml", "xbm" => "image/x-xbitmap", "xla" => "application/vnd.ms-excel",
        "xlc" => "application/vnd.ms-excel", "xlm" => "application/vnd.ms-excel", "xls" => "application/vnd.ms-excel", "xlt" => "application/vnd.ms-excel", "xlw" => "application/vnd.ms-excel", "xof" => "x-world/x-vrml", "xpm" => "image/x-xpixmap", "xwd" => "image/x-xwindowdump", "z" => "application/x-compress", "zip" => "application/zip", "php" => "text/html"); 
        return $mime[$ext];
    }

    private function createSSLContext($cert, $key) {
        $context = stream_context_create();
        stream_context_set_option($context, 'ssl', 'local_cert', $cert);
        stream_context_set_option($context, 'ssl', 'local_pk', $key);
        stream_context_set_option($context, 'ssl', 'allow_self_signed', true);
        stream_context_set_option($context, 'ssl', 'verify_peer', false);
        return $context;
    }

    public function createHTTPSServer($cert, $key) {
        $context = $this->createSSLContext($cert, $key);
        $this->server = stream_socket_server('ssl://' . $this->ip . ':' . $this->port, $errno, $errstr, STREAM_SERVER_BIND|STREAM_SERVER_LISTEN, $context);
    }

    public function createHTTPServer() {
        $this->server = stream_socket_server('tcp://' . $this->ip . ':' . $this->port, $errno, $errstr);
    }

    private function parseurl($string) {
        $result = array();
        parse_str($string, $result);
        return $result;
    }

    private function unpackHTTPRequestHeader($client, $data) {
        $dataArray = explode("\r\n\r\n", $data);
        $header = $dataArray[0];
        $result = array();
        $lines = explode("\r\n", $header);
        foreach($lines as $num => $line) {
            if($num == 0) {
                $requestLineArray = explode(" ", $line);
                $result["REQUEST_METHOD"] = $requestLineArray[0];
                $pathData = explode("?", $requestLineArray[1]);
                $result["PATH"] = $pathData[0];
                $result["GET"] = $this->parseurl($pathData[1]);
                $result["HTTP_VERSION"] = $requestLineArray[2];
            } else {
                $type = explode(":", $line);
                $result[strtolower($type[0])] = ltrim($type[1], " ");
            }
        }
        if(strlen($dataArray[1]) != $result["content-length"] && $result["content-length"] > 0) {
            $result["POST"] = $this->parseurl($this->HTTPFread($client, $result["content-length"]));
        } else {
            $result["POST"] = $this->parseurl($dataArray[1]);
        }
        return $result;
    }

    private function appendHeader($client, $peer) {
        $buffer = "";
        while(!preg_match('/\r?\n\r?\n/', $buffer)) {
            if($buf = $this->HTTPFread($client->stream, 65535)) {
                $buffer .= $buf;
            } else {
                return false;
            }
        }
        $client->data = $this->unpackHTTPRequestHeader($client->stream, $buffer);
        $client->data["REMOTE_ADDR"] = explode(":", $peer)[0];
    }

    private function HTTPFwrite($handler, $data) {
        if(!stream_get_meta_data($handler)['timed_out'] == true) {
            return @fwrite($handler, $data);
        }
        return false;
    }

    private function HTTPFread($handler, $length) {
        if(!stream_get_meta_data($handler)['timed_out'] == true) {
            return @fread($handler, $length);
        }
        return false;
    }

    public function send($client, $data, $code) {
        $this->HTTPFwrite($client->stream,  "HTTP/1.1 " . $code . " OK\r\nConnection: close\r\nContent-Type: text/html\r\nContent-Length: " . strlen($data) . "\r\n\r\n"
                                 . $data);
    }

    public function sendFile($client, $file) {
        if(file_exists($file)) {
            $type = $this->getMIME(pathinfo($file, PATHINFO_EXTENSION));
            $this->HTTPFwrite($client->stream,  "HTTP/1.1 200 OK\r\nConnection: close\r\nContent-Type: " . $type . "\r\nContent-Length: " . filesize($file) . "\r\n\r\n");
            $file = fopen($file, "rb");
            while(!feof($file)) {
                $this->HTTPFwrite($client->stream, fread($file, 8192));
            }
            fclose($file);
        }
    }

    public function redirect($client, $location) {
        $this->HTTPFwrite($client->stream,  "HTTP/1.1 301 Moved Permanently\r\nConnection: close\r\nContent-Type: text/html\r\nLocation: " . $location . "\r\n\r\n");
    }

    private function writeHTTPRedirect($client, $location) {
        $this->HTTPFwrite($client,  "HTTP/1.1 301 Moved Permanently\r\nConnection: close\r\nLocation: " . $location . "\r\n\r\n"
                                 . $data);
    }

    private function methodSupported($method) {
        if(in_array($method, array("GET", "POST"))) {
            return true;
        }
        return false;
    }

    private function pathNormalizer($path) {
        $path = str_replace("\\", "/", $path);
        foreach(explode("/", $path) as $index => $pieces) {
            if(strlen($pieces) > 0 && $pieces !== "." && $pieces !== "..") {
                $result[$index] = $pieces;
            }
        }
        return implode("/", $result);
    }

    private function adjustPath($path) {
        if(is_file($path . "/index.php")) {
            return $path . "/index.php";
        } else {
            return $path;
        }
    }

    private function setStreamTimeout($client, $timeout) {
        @stream_set_timeout($client, $timeout);
    }

    private function clientEventThread($client, $peer) {
        if($client->stream && !feof($client->stream)) {
            @$this->appendHeader($client, $peer);
            if($client->data) {
                if($this->methodSupported($client->data["REQUEST_METHOD"])) {
                    if(array_key_exists($client->data["PATH"], $this->path)) {
                        call_user_func($this->path[$client->data["PATH"]], $this, $client);
                    } else {
                        if(array_key_exists("*", $this->path)) {
                            call_user_func($this->path["*"], $this, $client);
                        } else {
                            $this->send($client, "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\"><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL /ddd was not found on this server.</p></body></html>", 404);
                        }
                    }
                } else {
                    $this->send($client, "<h1>Method Not Allowed</h1>", 405);
                }
            }
        }
        @fclose($client->stream);
    }

    public function on($req, $function) {
        $this->path[$req] = $function;
    }

    public function run() {
        if($this->server) {
            while(true) {
                $client = new ClientStruct();
                $client->stream = @stream_socket_accept($this->server, 10, $peer);
                $this->setStreamTimeout($client->stream, 10);
                $this->clientEventThread($client, $peer);
            }
        } else {
            die("Server undefined. ");
        }
    }
}

class ClientStruct {
    public $header;
    public $stream;
}

?>