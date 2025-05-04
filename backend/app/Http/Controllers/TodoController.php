<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\TodoResource;
use App\Services\TodoService;
use App\Helpers\ApiResponseHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TodoController extends Controller
{
    protected $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function index()
    {
        $filters = request()->all();
        $todos = $this->todoService->getTodos($filters);

        if ($todos->isEmpty()) {
            return ApiResponseHelper::error('Todo bulunamadı', 404);
        }

        return ApiResponseHelper::success(TodoResource::collection($todos), 'Başarıyla listelendi' );
    }

    public function show($id)
    {
        try {
            $todo = $this->todoService->getTodoById($id);

            if (!$todo) {
                return ApiResponseHelper::error('Todo bulunamadı', 404);
            }

            return ApiResponseHelper::success(new TodoResource($todo), 'Todo başarıyla getirildi');
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::error('Todo bulunamadı', 404, $e->getMessage());
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Todo alınırken bir hata oluştu', 500, $e->getMessage());
        }
    }

    public function store(StoreTodoRequest $request)
    {
        try {
            $todo = $this->todoService->createTodo($request->validated());
            return ApiResponseHelper::success(new TodoResource($todo), 'Todo başarıyla oluşturuldu', 201);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Todo oluşturulamadı', 500, $e->getMessage());
        }
    }

    public function update(UpdateTodoRequest $request, $id)
    {
        try {
            $todo = $this->todoService->updateTodo($id, $request->validated());

            if (!$todo) {
                return ApiResponseHelper::error('Todo bulunamadı', 404);
            }

            return ApiResponseHelper::success(new TodoResource($todo), 'Todo başarıyla güncellendi');
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::error('Todo bulunamadı', 404);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Todo güncellenemedi', 500, $e->getMessage());
        }
    }

    public function updateStatus($id)
    {
        try {
            $todo = $this->todoService->updateTodoStatus($id, request()->status);

            if (!$todo) {
                return ApiResponseHelper::error('Todo bulunamadı', 404);
            }

            return ApiResponseHelper::success(new TodoResource($todo), 'Todo durumu başarıyla güncellendi');
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::error('Todo bulunamadı', 404);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Todo durumu güncellenemedi', 500, $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->todoService->deleteTodo($id);
            return ApiResponseHelper::deleted('Todo başarıyla silindi');
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::error('Todo bulunamadı', 404);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Todo silinirken bir hata oluştu', 500, $e->getMessage());
        }
    }

    public function search()
    {
        $todos = $this->todoService->searchTodos(request()->q);

        if ($todos->isEmpty()) {
            return ApiResponseHelper::error('Arama sorgusuna göre Todo bulunamadı', 404);
        }

        return ApiResponseHelper::success(TodoResource::collection($todos), 'Arama sonuçları');
    }
}

