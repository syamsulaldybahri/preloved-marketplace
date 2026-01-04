<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Tambahkan baris ini

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Tambahkan kode ini agar semua link aset menggunakan HTTPS
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}