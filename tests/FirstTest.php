<?php
namespace Test;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase{
	//vendor\bin\phpunit
	
    public function testEmpty(){
        $this->assertEquals(1,1);
    }

    public function testDirectoryAndFile(){
        //dirname(__DIR__)
        $this->assertDirectoryExists(dirname(__DIR__).'/app');
        $this->assertFileExists(dirname(__DIR__).'/app/hero.php');
    }
}
