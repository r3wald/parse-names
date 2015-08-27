<?php

namespace R3wald\ParseNames\Tests;

use PHPUnit_Framework_TestCase;
use R3wald\ParseNames\Parser;

class ExtendedTest extends PHPUnit_Framework_TestCase
{
    public function getListOfNames()
    {
        return array(
            array(
                'Frank D. A. Stolt',
                array(
                    'firstName' => 'Frank',
                    'middleName' => 'D. A.',
                    'lastName' => 'Stolt'
                )
            ),
            array(
                'Prof. Dr. Dr. h. c. mult. Péter Horváth',
                array(
                    'academicPrefix' => 'Prof. Dr. Dr. h. c. mult.',
                    'firstName' => 'Péter',
                    'lastName' => 'Horváth',
                )
            ),
            array(
                'Dipl.-Ökonom Dipl.-Soz.wiss. Marcus Roso',
                array(
                    'academicPrefix' => 'Dipl.-Ökonom Dipl.-Soz.wiss.',
                    'firstName' => 'Marcus',
                    'lastName' => 'Roso'
                )
            ),
            array(
                'Dipl.-Kffr. Andrea Kamp',
                array(
                    'academicPrefix' => 'Dipl.-Kffr.',
                    'firstName' => 'Andrea',
                    'lastName' => 'Kamp'
                )
            ),
            array(
                'Dipl.-Kfm. Oliver Obermann',
                array(
                    'academicPrefix' => 'Dipl.-Kfm.',
                    'firstName' => 'Oliver',
                    'lastName' => 'Obermann',
                )
            ),
            array(
                'Nils Hullen, Master of Law & IT (LL.M.)',
                array(
                    'firstName' => 'Nils',
                    'lastName' => 'Hullen',
                    'academicSuffix' => 'Master of Law & IT (LL.M.)'
                )
            ),
            array(
                'apl. Prof. Dr. Ralf Pieper',
                array(
                    'academicPrefix' => 'apl. Prof. Dr.',
                    'firstName' => 'Ralf',
                    'lastName' => 'Pieper',
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
    public function testExtendedNames($nameToParse, $expectedResult)
    {
        $actualResult = $this->parser->parse($nameToParse);
        $this->assertEquals($expectedResult, $actualResult);
    }
}
