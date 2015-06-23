<?php 

namespace App;

class ConsoleMessage
{
    public function __construct()
    {
        # code...
    }

    public function printMessage($message, $code = "\033[0m") 
    {
        fwrite(STDOUT, $code.$message."\033[0m".PHP_EOL);
    }

    public function printError($message)
    {
        $this->printMessage($message, "\033[31m");
        exit();
    }

    public function printSuccess($message)
    {
        return $this->printMessage($message, "\033[32m");
    }

    public function printInfo($message)
    {
        return $this->printMessage($message, "\033[34m");
    }

    public function printWarning($message)
    {
        return $this->printMessage($message, "\033[33m");
    }

    public static function __callStatic($method, $args)
    {
        $method = 'print'.ucfirst($method);
        $instance = new static;
        
        if (method_exists($instance, $method)) {
            return $instance->$method($args[0]);
        }
    }
}