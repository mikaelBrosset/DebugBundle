<?php
/**
 * Author: Mikael Brosset
 * Email: mikael.brosset@gmail.com
 * Date: 26/10/17
 */
namespace MikaelBrosset\DebugBundle;

class Debug
{
    protected const ERRORLEVELS = [
            'E_ALL',
            'E_PARSE',
            'E_ERROR',
            'E_WARNING',
            'E_STRICT',
            'E_NOTICE',
            'E_DEPRECATED',
            'E_USER_DEPRECATED',
            'E_USER_ERROR',
            'E_USER_WARNING',
            'E_USER_NOTICE',
            'E_CORE_ERROR',
            'E_CORE_WARNING',
            'E_COMPILE_ERROR',
            'E_COMPILE_WARNING',
            'E_RECOVERABLE_ERROR',
        ];

    private $isDebugActive = 0;
    private $debugLevel = '';
    private $debugLevelConstant = 0;

    public function enable($level = 'E_ALL') : string
    {
        if (!in_array($level = strtoupper($level), $this::ERRORLEVELS)) {
            throw new UnexpectedErrorLevelException("There is no such error level as $level");
        }

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        $this->isDebugActive = 1;
        $this->debugLevel = $level;
        $this->debugLevelConstant = constant($level);
        return error_reporting(constant($level));
    }

    public function enableAndLog($level = 'E_ALL', $log = 1, $logFile = '/var/log/php-erros.log', $errorMaxLength =  1024, $ignoreRepeatedErrors = 1, $syslog = 0) : string
    {
        if ($log) {
            ini_set('log_errors', $log);

            if ($syslog) {
                ini_set('error_log', 'syslog');

            } else {
                if (!file_exists($logFile)) {
                    touch($logFile);
                }
                ini_set('error_log', $logFile);
                ini_set('log_errors_max_len', $errorMaxLength);
            }
        }

        return $this->enable($level);

    }

    public function disable() : void
    {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        $this->isDebugActive = 0;
        $this->debugLevel = '';
    }

    public function getDebugLevel() : string
    {
        return $this->debugLevel;
    }

    public function getDebugLevelConstant() : int
    {
        return $this->debugLevelConstant;
    }

    public function isDebugActive() : bool
    {
        return $this->isDebugActive;
    }
}