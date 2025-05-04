<?php

namespace App\Http\Controllers;

use App\Services\StatsService;
use App\Helpers\ApiResponseHelper;

class StatsController extends Controller
{
    protected StatsService $statsService;

    public function __construct(StatsService $statsService)
    {
        $this->statsService = $statsService;
    }

    public function getTodosStats()
    {
        $stats = $this->statsService->getTodosStats();
        return ApiResponseHelper::success($stats, 'İstatistikler başarıyla getirildi.');
    }

    public function getPrioritiesStats()
    {
        $stats = $this->statsService->getPrioritiesStats();
        return ApiResponseHelper::success($stats, 'İstatistikler başarıyla getirildi.');
    }
}
