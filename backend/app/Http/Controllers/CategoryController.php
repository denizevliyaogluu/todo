<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use App\Http\Resources\CategoryResource;
use App\Helpers\ApiResponseHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        try {
            $categories = $this->categoryService->getAllCategories();
            return ApiResponseHelper::success(CategoryResource::collection($categories), 'Kategoriler başarıyla listelendi');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Kategoriler alınırken bir hata oluştu', 500, $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $category = $this->categoryService->getCategoryById($id);
            return ApiResponseHelper::success(new CategoryResource($category), 'Kategori başarıyla getirildi');
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::error('Kategori bulunamadı', 404);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Kategori alınırken bir hata oluştu', 500, $e->getMessage());
        }
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = $this->categoryService->createCategory($request);
            return ApiResponseHelper::success(new CategoryResource($category), 'Kategori başarıyla oluşturuldu', 201);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Kategori oluşturulurken bir hata oluştu', 500, $e->getMessage());
        }
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            $category = $this->categoryService->updateCategory($request, $id);
            return ApiResponseHelper::success(new CategoryResource($category), 'Kategori başarıyla güncellendi');
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::error('Kategori bulunamadı', 404);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Kategori güncellenirken bir hata oluştu', 500, $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->categoryService->deleteCategory($id);
            return ApiResponseHelper::deleted('Kategori başarıyla silindi');
        } catch (ModelNotFoundException $e) {
            return ApiResponseHelper::error('Kategori bulunamadı', 404);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Kategori silinirken bir hata oluştu', 500, $e->getMessage());
        }
    }

    public function todos($id)
    {
        try {
            $todos = $this->categoryService->getTodosByCategory($id);
            return ApiResponseHelper::success($todos, 'Başarılı');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Bir hata oluştu', 500, $e->getMessage());
        }
    }
}
