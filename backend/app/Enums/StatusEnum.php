<?php
namespace App\Enums;
enum StatusEnum: string {
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}
