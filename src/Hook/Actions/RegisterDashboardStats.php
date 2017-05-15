<?php namespace Edutalk\Base\Pages\Hook\Actions;

use Edutalk\Base\Pages\Repositories\Contracts\PageRepositoryContract;
use Edutalk\Base\Pages\Repositories\PageRepository;

class RegisterDashboardStats
{
    /**
     * @var PageRepository
     */
    protected $repository;

    public function __construct(PageRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function handle()
    {
        $count = $this->repository->count();
        echo view('edutalk-pages::admin.dashboard-stats.stat-box', [
            'count' => $count
        ]);
    }
}
