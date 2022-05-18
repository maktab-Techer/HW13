<?php

namespace Core;

class Response{
    public function Status(int $code)
    {
        http_response_code($code);
    }
    public function putHeader(string $path)
    {
        header("location:".$path);
    }
}