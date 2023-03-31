<?php
namespace Test2\Task2\Logger;
use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

class Handler extends Base
{
    protected $loggerType = Logger::INFO;
 
    protected $fileName = '/var/log/custom.log';
}
