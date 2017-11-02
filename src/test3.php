<?php
/**
 * Author: Mikael Brosset
 * Email: mikael.brosset@gmail.com
 * Date: 31/10/17
 */
class test3{
    function test3Action($arg){

        $traces = debug_backtrace();
        $tracesObject = new RecursiveArrayIterator(array_reverse(debug_backtrace()));

        //var_dump($tracesObject);

        foreach ($tracesObject as $trace)
        {
            $file  = $trace['file'];
            $line  = $trace['line'];
            $class = $trace['class'];
            $funct = $trace['function'];
            $obj   = $trace['object'];
            $type  = $trace['type'];
            $args  = $trace['args'];

            var_dump($trace->next());

            echo sprintf("\n%s:%s %s%s::%s", $file, $line, $type, $class, $funct);
        }

        return "<<<<< $arg >>>>>";
    }
}