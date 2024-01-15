<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        //
        Schema::defaultStringLength(191);
        // レンサバの設定と相性が悪く、https でアクセスしているにも関わらず $_SERVER['HTTPS] が設定されず、
        // Laravel, Symfony 側の処理で http 始まりの URL で処理されてしまう。
        // config('app.url') が https 始まりか？http 始まりか？ をもとに強制的に scheme を設定する
        URL::forceScheme(\Str::startsWith(config('app.url'), 'https') ? 'https' : 'http');
    }
}
