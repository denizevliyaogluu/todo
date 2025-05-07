# 📝 PHP API ve React ile Todo Uygulaması - Case Çalışması

Bu proje, PHP tabanlı RESTful bir API ile React.js kullanılarak geliştirilmiş tam işlevsel bir Todo uygulamasıdır. Modern yazılım geliştirme prensipleri, temiz kod ve yapılandırılmış mimari ile hazırlanmıştır.

## 🚀 Proje Tanımı

Bu case çalışması, yazılım geliştirme becerilerimi değerlendirmek amacıyla PHP (Laravel) ve React ile geliştirilmiştir. Uygulama, todo yönetimi, kategori sistemi ve istatistiksel veriler sunma gibi temel özellikleri destekler.

---

API DOKUMANTASYON LİNKİ:
https://documenter.getpostman.com/view/15997080/2sB2j7eVos

## 🧰 Kullanılan Teknolojiler

### Back-end
- PHP 8.1+
- Laravel 10+
- MySQL 8.0+ / MariaDB 10.5+
- Eloquent ORM
- RESTful API mimarisi
- Composer

### Front-end
- React 18+
- Axios
- Tailwind CSS

---

## 🗄️ Veritabanı Tasarımı

### `todos` Tablosu
- `title`, `description`, `status`, `priority`, `due_date`, `timestamps`, `deleted_at`

### `categories` (Bonus)
- `name`, `color`, `timestamps`

### `todo_category` (Pivot Tablo)
- Many-to-Many ilişkiyi tanımlar

---

## 📡 API Uç Noktaları

### Todo İşlemleri
- `GET /api/todos` - Todo listele (filtreleme, sıralama, sayfalama)
- `GET /api/todos/{id}` - Tekil todo görüntüle
- `POST /api/todos` - Todo oluştur
- `PUT /api/todos/{id}` - Todo güncelle
- `PATCH /api/todos/{id}/status` - Durum güncelle
- `DELETE /api/todos/{id}` - Soft delete
- `GET /api/todos/search?q=...` - Arama

### Kategori İşlemleri (Bonus)
- `GET /api/categories`
- `POST /api/categories`
- `PUT /api/categories/{id}`
- `DELETE /api/categories/{id}`
- `GET /api/categories/{id}/todos`

### İstatistikler (Bonus)
- `GET /api/stats/todos`
- `GET /api/stats/priorities`

---

## ✅ API Doğrulama Kuralları

- **title**: zorunlu, 3–100 karakter
- **description**: opsiyonel, max 500 karakter
- **status**: enum değerlerinden biri
- **priority**: enum değerlerinden biri
- **due_date**: geçerli tarih ve ileri bir zaman olmalı

---

## 🛡️ Güvenlik

- CORS konfigürasyonu
- Input validation & sanitization
- CSRF & XSS koruması
- Rate Limiting

---

## 🧠 Kod Yapısı ve Mimarisi

- Repository Pattern
- Service Layer
- Dependency Injection
- Middleware kullanımı
- Exception handling
- Logging

---



## ⚙️ Kurulum

### Back-end (Laravel)
```bash
git clone <repo-url>
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve


### Front-end (React)
bash
cd frontend
npm install
npm start
