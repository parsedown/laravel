<?php

namespace Tests;

use Illuminate\Foundation\Application;
use Illuminate\View\Compilers\BladeCompiler;
use Parsedown\Providers\ParsedownServiceProvider;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @var BladeCompiler
     */
    protected $compiler;

    /**
     * @var string
     */
    protected $text = '**Parsedown** UnitTest';

    /**
     * @return BladeCompiler
     */
    protected function getCompiler()
    {
        if (!$this->compiler) {
            $this->compiler = $this->app->make(BladeCompiler::class);
        }

        return $this->compiler;
    }

    /**
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ParsedownServiceProvider::class
        ];
    }
}
