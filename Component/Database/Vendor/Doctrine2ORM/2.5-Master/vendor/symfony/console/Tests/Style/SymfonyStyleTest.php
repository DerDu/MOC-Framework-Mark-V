<?php

namespace Symfony\Component\Console\Tests\Style;

use PHPUnit_Framework_TestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Tester\CommandTester;

class SymfonyStyleTest extends PHPUnit_Framework_TestCase
{

    /** @var Command */
    protected $command;
    /** @var CommandTester */
    protected $tester;

    /**
     * @dataProvider inputCommandToOutputFilesProvider
     */
    public function testOutputs($inputCommandFilepath, $outputFilepath)
    {

        $code = require $inputCommandFilepath;
        $this->command->setCode($code);
        $this->tester->execute(array(), array('interactive' => false, 'decorated' => false));
        $this->assertStringEqualsFile($outputFilepath, $this->tester->getDisplay(true));
    }

    public function inputCommandToOutputFilesProvider()
    {

        $baseDir = __DIR__.'/../Fixtures/Style/SymfonyStyle';

        return array_map(null, glob($baseDir.'/command/command_*.php'), glob($baseDir.'/output/output_*.txt'));
    }

    public function testLongWordsBlockWrapping()
    {

        $word = 'Lopadotemachoselachogaleokranioleipsanodrimhypotrimmatosilphioparaomelitokatakechymenokichlepikossyphophattoperisteralektryonoptekephalliokigklopeleiolagoiosiraiobaphetraganopterygon';
        $wordLength = strlen($word);
        $maxLineLength = SymfonyStyle::MAX_LINE_LENGTH - 3;

        $this->command->setCode(function (InputInterface $input, OutputInterface $output) use ($word) {

            $sfStyle = new SymfonyStyle($input, $output);
            $sfStyle->block($word, 'CUSTOM', 'fg=white;bg=blue', ' § ', false);
        });

        $this->tester->execute(array(), array('interactive' => false, 'decorated' => false));
        $expectedCount = (int)ceil($wordLength / ( $maxLineLength )) + (int)( $wordLength > $maxLineLength - 5 );
        $this->assertSame($expectedCount, substr_count($this->tester->getDisplay(true), ' § '));
    }

    protected function setUp()
    {

        $this->command = new Command('sfstyle');
        $this->tester = new CommandTester($this->command);
    }

    protected function tearDown()
    {

        $this->command = null;
        $this->tester = null;
    }
}
