<?php

namespace Tests;

use Illuminate\Support\Facades\Config;

/**
 * Class ConfigTest
 * @package Tests
 */
class ConfigTest extends TestCase
{
    /**
     * @var string
     */
    protected $url = 'http://parsedown.org/';

    /**
     * @return void
     */
    public function testCanDisableSafeMode(): void
    {
        Config::set('parsedown.safe_mode', false);

        $actual = parsedown(
            $expected = '<script />'
        );

        $this->assertSame($expected, $actual);
    }

    /**
     * @return void
     */
    public function testCanDisableUrlLinking(): void
    {
        Config::set('parsedown.urls_linked', false);

        $actual = parsedown($this->url);
        $expected = '<p>' . $this->url . '</p>';

        $this->assertSame($expected, $actual);
    }
    
    /**
     * @return void
     */
    public function testCanEnableBreaksParsing(): void
    {
        Config::set('parsedown.breaks_enabled', true);

        $actual = parsedown($this->text . PHP_EOL . $this->text);
        $expected = '<p><strong>Parsedown</strong> UnitTest<br />' . PHP_EOL . '<strong>Parsedown</strong> UnitTest</p>';

        $this->assertSame($expected, $actual);
    }

    /**
     * @return void
     */
    public function testCanEnableInlineParsing(): void
    {
        Config::set('parsedown.inline', true);

        $actual = parsedown($this->text);
        $expected = '<strong>Parsedown</strong> UnitTest';

        $this->assertSame($expected, $actual);
    }

    /**
     * @return void
     */
    public function testCanEnableMarkupEscaping(): void
    {
        Config::set('parsedown.markup_escaped', true);

        $actual = parsedown('<span>' . $this->text . '</span>');
        $expected = '<p>' . htmlentities('<span>') . '<strong>Parsedown</strong> UnitTest' . htmlentities('</span>') . '</p>';

        $this->assertSame($expected, $actual);
    }
}
