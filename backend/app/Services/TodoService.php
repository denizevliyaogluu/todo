<?php

namespace App\Services;

use App\Models\Todo;
use App\Repositories\TodoRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TodoService
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function getTodos($filters)
    {
        return $this->todoRepository->getTodos($filters);
    }

    public function getTodoById($id)
    {
        $todo = $this->todoRepository->getById($id);

        if (!$todo) {
            throw new ModelNotFoundException('Todo bulunamadı');
        }

        return $todo;
    }

    public function createTodo($data)
    {
        return $this->todoRepository->create($data);
    }

    public function updateTodo($id, $data)
    {
        $todo = $this->todoRepository->getById($id);

        if (!$todo) {
            throw new ModelNotFoundException('Todo bulunamadı');
        }

        return $this->todoRepository->update($id, $data);
    }

    public function updateTodoStatus($id, $status)
    {
        $todo = $this->todoRepository->getById($id);

        if (!$todo) {
            throw new ModelNotFoundException('Todo bulunamadı');
        }

        return $this->todoRepository->updateStatus($id, $status);
    }

    public function deleteTodo($id): bool
    {
        $todo = $this->todoRepository->getById($id);

        if (!$todo) {
            return false;
        }

        $this->todoRepository->delete($id);
        return true;
    }

    public function searchTodos($query)
    {
        return $this->todoRepository->search($query);
    }
}
