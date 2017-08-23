<?php

namespace Parsedown\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Parsedown;

/**
 * Class ParsedownServiceProvider
 * @package App\Providers
 */
class ParsedownServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->compiler()->directive('parsedown', function ($expression) {
            return "<?php echo parsedown($expression); ?>";
        });
    }

    /**
     * @return BladeCompiler
     */
    protected function compiler()
    {
        return app('view')->getEngineResolver()->resolve('blade')->getCompiler();
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton('parsedown', function () {
            return Parsedown::instance();
        });
    }
}
