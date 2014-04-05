<?php

require_once 'src/HelloWorld.php';

class HelloWorldTest extends \PHPUnit_Framework_TestCase
{
    public function testMessageSaysHelloWorld()
    {
        $helloWorld = new HelloWorld();
        $this->assertEquals("Hello World!", $helloWorld->getMessage());
    }
}