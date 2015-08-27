<?php

namespace R3wald\ParseNames\Tests;

use PHPUnit_Framework_TestCase;
use R3wald\ParseNames\Parser;

class CompanyGuardTest extends PHPUnit_Framework_TestCase
{
    public function getListOfNames()
    {
        return array(
            array(
                'Michael Müller',
                array(
                    'firstName' => 'Michael',
                    'lastName' => 'Müller',
                )
            ),
            array(
                'Herr Markus Ungerer',
                array(
                    'firstName' => 'Markus',
                    'lastName' => 'Ungerer'
                )
            ),
            array(
                'Friedrich Reip',
                array(
                    'firstName' => 'Friedrich',
                    'lastName' => 'Reip',
                )
            ),
            array(
                'Christine Gericke',
                array(
                    'firstName' => 'Christine',
                    'lastName' => 'Gericke',
                )
            )
        );
    }

    /**
     * @var Parser
     */
    protected $parser;

    public function setUp()
    {
        $this->parser = new Parser();
    }

    /**
     * @dataProvider getListOfNames
     * @param string $nameToParse
     * @param array $expectedResult
     */
    public function testSimpleNames($nameToParse, $expectedResult)
    {
        $actualResult = $this->parser->parse($nameToParse);
        $this->assertEquals($expectedResult, $actualResult);
    }
}
