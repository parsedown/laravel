<?php

namespace Parsedown\Providers;

use Illuminate\Support\Facades\Config;
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
            $parsedown = Parsedown::instance();

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

            $parsedown->setDisabledBlockTypes(
                Config::get('parsedown.disabled_block_types')
            );

            $parsedown->setDisabledInlineTypes(
                Config::get('parsedown.disabled_inline_types')
            );

            return $parsedown;
        });

        $this->mergeConfigFrom(__DIR__ . '/../Support/parsedown.php', 'parsedown');
    }
}
