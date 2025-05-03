<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Todo::create([
            'title' => 'Laravel Projesi Oluşturmak',
            'description' => 'Todo Case için Laravel backend projesi oluşturuldu.',
            'status' => 'completed',
            'priority' => 'high',
            'due_date' => now()->addDays(5),
        ]);

        Todo::create([
            'title' => 'Veritabanı Bağlantısı Kurmak',
            'description' => 'Laravel ile MySQL veritabanı bağlantısını yap.',
            'status' => 'in_progress',
            'priority' => 'medium',
            'due_date' => now()->addDays(2),
        ]);

        Todo::create([
            'title' => 'Admin Paneli Tasarımı',
            'description' => 'Admin paneli için arayüz tasarımını bitir.',
            'status' => 'pending',
            'priority' => 'high',
            'due_date' => now()->addDays(7),
        ]);

        Todo::create([
            'title' => 'Kullanıcı Girişi Özelliği Eklemek',
            'description' => 'Kullanıcılar için giriş ve kayıt sistemini entegre et.',
            'status' => 'pending',
            'priority' => 'medium',
            'due_date' => now()->addDays(10),
        ]);

        Todo::create([
            'title' => 'REST API Endpoints Oluşturmak',
            'description' => 'API için GET, POST, PUT, DELETE işlemleri yapan endpoint’ler oluştur.',
            'status' => 'in_progress',
            'priority' => 'high',
            'due_date' => now()->addDays(3),
        ]);

        Todo::create([
            'title' => 'Form Doğrulama Sistemi Kurmak',
            'description' => 'Laravel form doğrulama sistemi ile input alanlarını kontrol et.',
            'status' => 'completed',
            'priority' => 'low',
            'due_date' => now()->addDays(1),
        ]);

        Todo::create([
            'title' => 'Veri Gösterimi ve Listeleme',
            'description' => 'Veri listelerini düzgün şekilde kullanıcıya göster.',
            'status' => 'in_progress',
            'priority' => 'medium',
            'due_date' => now()->addDays(4),
        ]);

        Todo::create([
            'title' => 'Kullanıcı Profili Oluşturmak',
            'description' => 'Kullanıcılar için profil sayfası tasarımı ve özellikleri ekle.',
            'status' => 'pending',
            'priority' => 'medium',
            'due_date' => now()->addDays(14),
        ]);

        Todo::create([
            'title' => 'Test Yazmak ve Hata Ayıklamak',
            'description' => 'Projeyi test et, oluşabilecek hataları düzelt.',
            'status' => 'pending',
            'priority' => 'low',
            'due_date' => now()->addDays(12),
        ]);

        Todo::create([
            'title' => 'Dokümantasyon Hazırlamak',
            'description' => 'Projede yapılan işlemleri ve kullanılan teknolojileri açıklayan bir dokümantasyon oluştur.',
            'status' => 'completed',
            'priority' => 'low',
            'due_date' => now()->addDays(6),
        ]);
    }
}
