<?php

namespace Tests;

/**
 * Class DirectiveTest
 * @package Tests
 */
class DirectiveTest extends TestCase
{
    public function testCanCastString()
    {
        $compiler = $this->getCompiler();

        $actual = $compiler->compileString('@parsedown("' . $this->text . '")');
        $expected = '<?php echo parsedown("' . $this->text . '"); ?>';

        $this->assertSame($expected, $actual);
    }
}
