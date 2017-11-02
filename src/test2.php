<?php
/**
 * Author: Mikael Brosset
 * Email: mikael.brosset@gmail.com
 * Date: 31/10/17
 */
class test2
{
    function test2Action($arg)
    {




        $test3 = new test3();

        return 'un argument : '.$test3->test3Action($arg);
    }

    function testCalcul($nb1, $nb2)
    {
        return $nb1 . $nb2 . $this->test2Action("toto");
    }
}
