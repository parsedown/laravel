<?php

namespace Tests;

/**
 * Class HelperTest
 * @package Tests
 */
class HelperTest extends TestCase
{
    public function testCanCastString()
    {
        $actual = parsedown($this->text);
        $expected = '<p><strong>Parsedown</strong> UnitTest</p>';

        $this->assertSame($expected, $actual);
    }
}
