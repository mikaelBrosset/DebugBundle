<?php
/**
 * Author: Mikael Brosset
 * Email: mikael.brosset@gmail.com
 * Date: 26/10/17
 */
namespace MikaelBrosset\DebugBundle;

class Debug
{
    const ERRORLEVELS = [
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

    public function enableAll() : string
    {
        $level = 'E_ALL';
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        $this->isDebugActive = 1;
        $this->debugLevel = $level;
        $this->debugLevelConstant = constant($level);
        return error_reporting(constant($level));
    }

    public function enable($level = 'E_ALL', $excludes = [], $log = null) : string
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        $this->isDebugActive = 1;
        $this->debugLevel = $level;
        $this->debugLevelConstant = constant($level);
        return error_reporting(constant($level));
    }

    public function disableAll() : void
    {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        $this->isDebugActive = 0;
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