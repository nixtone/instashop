<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // <input type="file" @accept('image, document')>
        Blade::directive('accept', function ($expression) {
            $keys = explode(',', trim($expression, "() '\""));
            $formats = [
                'image' => '.jpg, .jpeg, .png, .webp',
                'document' => '.pdf, .doc, .docx',
                'xls' => '.xls, .xlsx, .csv',
            ];
            $result = [];
            foreach ($keys as $key) {
                $key = trim($key);
                if (isset($formats[$key])) {
                    $result[] = $formats[$key];
                }
            }

            return empty($result) ? '' : "<?php echo 'accept=\"".implode(', ', $result)."\"'; ?>";
        });
    }
}
