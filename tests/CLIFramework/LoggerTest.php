<?php
/*
 * This file is part of the {{ }} package.
 *
 * (c) Yo-An Lin <cornelius.howl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

class LoggerTest extends PHPUnit_Framework_TestCase 
{
    private $logger;
    function setUp()
    {
        $this->logger = new \CLIFramework\Logger;
    }

    function testColoredOutput()
    {
        $this->logger->info('test');
        $this->logger->debug('test');

        $this->expectOutputString("\033[2mtest\033[0m\n");
    }

    function testRawOutput()
    {
        $this->logger->getFormatter()->preferRawOutput();
        $this->logger->info('test');
        $this->logger->debug('test');

        $this->expectOutputString("test\n");
    }


    function testLogException()
    {
        $this->logger->logException(new \Exception('exception'));
        $this->expectOutputString("exception\n");
    }
}
