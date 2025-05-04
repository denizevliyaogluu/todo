<?php
namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class TodoRepository
{
    public function getTodos($filters)
    {
        $query = Todo::query();

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['priority'])) {
            $query->where('priority', $filters['priority']);
        }

        if (isset($filters['sort']) && in_array($filters['sort'], ['created_at', 'due_date', 'priority'])) {
            $query->orderBy($filters['sort'], $filters['order'] ?? 'asc');
        }
        return $query->paginate(
            $filters['limit'] ?? 10,
            ['*'],
            'page',
            $filters['page'] ?? 1
        );
    }

    public function getById($id)
    {
        return Todo::findOrFail($id);
    }

    public function create($data)
    {
        return Todo::create($data);
    }

    public function update($id, $data)
    {
        $todo = Todo::findOrFail($id);
        $todo->update($data);
        return $todo;
    }

    public function updateStatus($id, $status)
    {
        $todo = Todo::findOrFail($id);
        $todo->status = $status;
        $todo->save();
        return $todo;
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
    }

    public function search($query)
    {
        return Todo::where('title', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%")
                    ->get();
    }
}
