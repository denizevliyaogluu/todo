<?php

namespace App\Services;

use App\Models\Todo;
use Illuminate\Support\Facades\DB;
use App\Enums\PriorityEnum;
use App\Enums\StatusEnum;

class StatsService
{
    public function getTodosStats()
    {
        $allStatuses = array_map(fn($case) => $case->value, StatusEnum::cases());

        $rawStats = Todo::select(DB::raw('status, COUNT(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $finalStats = [];
        foreach ($allStatuses as $status) {
            $finalStats[$status] = $rawStats[$status] ?? 0;
        }

        return $finalStats;
    }

    public function getPrioritiesStats()
    {
        $allPriorities = array_map(fn($case) => $case->value, PriorityEnum::cases());

        $rawStats = Todo::select(DB::raw('priority, COUNT(*) as count'))
            ->groupBy('priority')
            ->pluck('count', 'priority')
            ->toArray();

        $finalStats = [];
        foreach ($allPriorities as $priority) {
            $finalStats[$priority] = $rawStats[$priority] ?? 0;
        }

        return $finalStats;
    }
}
