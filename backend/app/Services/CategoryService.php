<?php
namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        try {
            return $this->categoryRepository->getAll();
        } catch (\Exception $e) {
            throw new \Exception("Kategoriler alınırken bir hata oluştu: " . $e->getMessage());
        }
    }

    public function getCategoryById($id)
    {
        try {
            return $this->categoryRepository->findById($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException("Kategori bulunamadı: " . $e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception("Kategori alınırken bir hata oluştu: " . $e->getMessage());
        }
    }

    public function createCategory($request)
    {
        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->create($request->all());
            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Kategori oluşturulurken bir hata oluştu: " . $e->getMessage());
        }
    }

    public function updateCategory($request, $id)
    {
        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->findById($id);

            $category->update($request->all());

            DB::commit();

            return $category;
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            throw new ModelNotFoundException("Kategori bulunamadı: " . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Kategori güncellenirken bir hata oluştu: " . $e->getMessage());
        }
    }

    public function deleteCategory($id)
    {
        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->findById($id);

            $this->categoryRepository->delete($id);
            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            throw new ModelNotFoundException("Kategori bulunamadı: " . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Kategori silinirken bir hata oluştu: " . $e->getMessage());
        }
    }

    public function getTodosByCategory($id)
    {
        try {
            return $this->categoryRepository->getTodosByCategory($id);
        } catch (\Exception $e) {
            throw new \Exception("Kategoriye ait görevler alınırken bir hata oluştu: " . $e->getMessage());
        }
    }
}
