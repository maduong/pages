<?php namespace Edutalk\Base\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use Edutalk\Base\Pages\Models\Page;
use Edutalk\Base\Pages\Repositories\Contracts\PageRepositoryContract;
use Edutalk\Base\Pages\Repositories\PageRepository;
use Edutalk\Base\Pages\Repositories\PageRepositoryCacheDecorator;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PageRepositoryContract::class, function () {
            $repository = new PageRepository(new Page());

            if (config('edutalk-caching.repository.enabled')) {
                return new PageRepositoryCacheDecorator($repository);
            }

            return $repository;
        });
    }
}
