<?php
/**
 * Author: Mikael Brosset
 * Email: mikael.brosset@gmail.com
 * Date: 30/10/17
 */
require 'Debug.php';

/*$debug = new \MikaelBrosset\DebugBundle\Debug('enableAll');
$debug->enable('E_STRICT');
$level = $debug->getDebugLevel();
$levelConst = $debug->getDebugLevelConstant();
var_dump($level, ini_get('display_errors'));

$debug->disable();
$level = $debug->getDebugLevel();
var_dump($level, ini_get('display_errors'));*/

require 'test2.php';
require "test3.php";

$test2 = new test2();
//$action = $test2->test2Action("toto");
$calc = $test2->testCalcul(3, 6);

$refl = new ReflectionClass($test2);


