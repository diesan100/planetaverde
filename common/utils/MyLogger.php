<?php

namespace common\utils;

use Yii;


/**
 * Description of FileDebugger
 *
 * @author Diego
 */
class MyLogger {
    //put your code here
    private $logFile;
    
    public static function getInstance($logFile) {
        $logger = new MyLogger();
        $logger->logFile = $logFile;
        return $logger;
    }
    
    public function logInfo($message) {
        
        if(!is_string($message)) {            
            ob_start();
            var_dump($message);
            $message = ob_get_clean();
        }
        
        error_log(date('[d/m/Y H:i] '). $message . PHP_EOL, 3, $this->logFile);
    }
}
