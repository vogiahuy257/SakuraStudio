<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ExcelRepositoryInterface;
use App\Repositories\ExcelRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Đăng ký ExcelRepositoryInterface với ExcelRepository
        $this->app->singleton(ExcelRepositoryInterface::class, ExcelRepository::class);
    }

    public function boot()
    {
        // Các thiết lập khác
    }
}
