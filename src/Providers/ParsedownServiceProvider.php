<?php

namespace Parsedown\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Parsedown;
use UnexpectedValueException;

/**
 * Class ParsedownServiceProvider
 * @package App\Providers
 */
class ParsedownServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->compiler()->directive('parsedown', function (string $expression = '') {
            return "<?php echo parsedown($expression); ?>";
        });

        $this->publishes([
            __DIR__ . '/../Support/parsedown.php' => config_path('parsedown.php'),
        ]);
    }

    /**
     * @return BladeCompiler
     */
    protected function compiler(): BladeCompiler
    {
        return app('view')
            ->getEngineResolver()
            ->resolve('blade')
            ->getCompiler();
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('parsedown', function () {
            $parsedownClass = Config::get('parsedown.parsedown_class');
            $parsedown = new $parsedownClass;
            
            if (!is_a($parsedown, Parsedown::class, true)) {
                throw new UnexpectedValueException($parsedownClass . ' does not extend the Parsedown class');
            }

            $parsedown->setBreaksEnabled(
                Config::get('parsedown.breaks_enabled')
            );

            $parsedown->setMarkupEscaped(
                Config::get('parsedown.markup_escaped')
            );

            $parsedown->setSafeMode(
                Config::get('parsedown.safe_mode')
            );

            $parsedown->setUrlsLinked(
                Config::get('parsedown.urls_linked')
            );

            return $parsedown;
        });

        $this->mergeConfigFrom(__DIR__ . '/../Support/parsedown.php', 'parsedown');
    }
}
