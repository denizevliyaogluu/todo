<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name' => 'Backend Geliştirme',
            'color' => '#FF6347',
        ]);

        Category::create([
            'name' => 'Frontend Geliştirme',
            'color' => '#32CD32',
        ]);

        Category::create([
            'name' => 'Veritabanı Yönetimi',
            'color' => '#FFD700',
        ]);

        Category::create([
            'name' => 'Yapay Zeka ve Makine Öğrenmesi',
            'color' => '#8A2BE2',
        ]);

        Category::create([
            'name' => 'Mobil Uygulama Geliştirme',
            'color' => '#FF4500',
        ]);

        Category::create([
            'name' => 'Siber Güvenlik',
            'color' => '#0000FF',
        ]);

        Category::create([
            'name' => 'Test ve Kalite Güvencesi',
            'color' => '#FF1493',
        ]);

        Category::create([
            'name' => 'UI/UX Tasarımı',
            'color' => '#20B2AA',
        ]);

        Category::create([
            'name' => 'Sistem Yönetimi ve DevOps',
            'color' => '#A52A2A',
        ]);

        Category::create([
            'name' => 'Proje Yönetimi',
            'color' => '#2E8B57',
        ]);
    }
}
