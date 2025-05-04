# Todo ve Kategori Uygulaması

Bu proje, Todo ve Kategori yönetimi için bir uygulama yapısına sahip olup, kullanıcılara görevler ve kategoriler ile ilgili işlemleri gerçekleştirme imkanı sunar. Ayrıca, görevlerin durumlarına ve önceliklerine göre istatistikler almanızı sağlar.

## 1. Modeller (Models)

### Todo Modeli
Todo modeli, `todos` tablosu ile ilişkili olup aşağıdaki özellikleri taşır:

- `fillable`: `title`, `description`, `status`, `priority`, `due_date`
- `SoftDeletes`: Verilerin silindiğinde kaybolmaması için, veritabanından silindiğinde `deleted_at` sütununa tarih kaydedilir.

**İlişkiler:**
- `getCategories()`: Todo'nun kategorileriyle olan many-to-many ilişkisini yönetir. `todo_category` ara tablosu üzerinden `Category` modeline bağlanır.

### Category Modeli
Category modeli, `categories` tablosu ile ilişkili olup aşağıdaki özellikleri taşır:

- `fillable`: `name`, `color` (Kategorinin adı ve rengi)

**İlişkiler:**
- `getTodos()`: Bir kategorinin ait olduğu todosu many-to-many ilişkisi ile getirir.

---

## 2. Controller'lar (Controllers)

### TodoController
TodoController, tüm todo işlemlerini yöneten controller'dır. Aşağıdaki metotlara sahiptir:

- `index()`: Tüm todo öğelerini listeler. `TodoService` aracılığıyla filtreleme ve sayfalama işlemleri yapılır.
- `show($id)`: Verilen ID'ye sahip bir todo'yu gösterir.
- `store(StoreTodoRequest $request)`: Yeni bir todo oluşturur.
- `update(UpdateTodoRequest $request, $id)`: Var olan bir todo'yu günceller.
- `updateStatus($id)`: Bir todo'nun durumunu günceller.
- `destroy($id)`: Bir todo'yu siler.
- `search()`: Todo başlığı ya da açıklaması ile arama yapar.

### CategoryController
CategoryController, tüm kategori işlemlerini yöneten controller'dır. Aşağıdaki metotlara sahiptir:

- `index()`: Tüm kategorileri listeler.
- `show($id)`: Verilen ID'ye sahip bir kategoriyi gösterir.
- `store(StoreCategoryRequest $request)`: Yeni bir kategori oluşturur.
- `update(UpdateCategoryRequest $request, $id)`: Var olan bir kategoriyi günceller.
- `destroy($id)`: Bir kategoriyi siler.
- `todos($id)`: Belirli bir kategoriye ait tüm todo'ları listeler.

### StatsController
StatsController, istatistikleri yönetir. Aşağıdaki metotlara sahiptir:

- `getTodosStats()`: Todo öğelerinin durumlarına göre istatistik alır.
- `getPrioritiesStats()`: Todo öğelerinin önceliklerine göre istatistik alır.

---

## 3. Requests

### StoreTodoRequest ve UpdateTodoRequest
Todo ile ilgili istekler için doğrulama sağlar.

- **StoreTodoRequest**: Todo oluşturulurken gelen verilerin doğrulama kurallarını belirler.
- **UpdateTodoRequest**: Todo güncellenirken gelen verilerin doğrulama kurallarını belirler.

### StoreCategoryRequest ve UpdateCategoryRequest
Kategori ile ilgili istekler için doğrulama sağlar.

- **StoreCategoryRequest**: Kategori oluşturulurken gelen verilerin doğrulama kurallarını belirler.
- **UpdateCategoryRequest**: Kategori güncellenirken gelen verilerin doğrulama kurallarını belirler.

---

## 4. Enum'lar

### PriorityEnum ve StatusEnum

- **PriorityEnum**: Todo'nun önceliğini belirtir (`low`, `medium`, `high`).
- **StatusEnum**: Todo'nun durumunu belirtir (`pending`, `in_progress`, `completed`, `cancelled`).

---

## 5. Resources

### TodoResource ve CategoryResource

- **TodoResource**: Todo nesnesini JSON formatında döker.
- **CategoryResource**: Category nesnesini JSON formatında döker.

---

## 6. Repositories

### TodoRepository

- `getTodos()`: Verilen filtrelere göre todo öğelerini getirir (durum, öncelik, sıralama vb.).
- `getById($id)`: Verilen ID'ye sahip bir todo'yu getirir.
- `create()`: Yeni bir todo oluşturur.
- `update()`: Var olan bir todo'yu günceller.
- `updateStatus()`: Todo'nun durumunu günceller.
- `delete()`: Todo'yu siler.
- `search()`: Todo başlığı veya açıklaması ile arama yapar.

### CategoryRepository

- `getAll()`: Tüm kategorileri getirir.
- `findById($id)`: Verilen ID'ye sahip bir kategoriyi getirir.
- `create()`: Yeni bir kategori oluşturur.
- `update()`: Var olan bir kategoriyi günceller.
- `delete()`: Bir kategoriyi siler.
- `getTodosByCategory()`: Verilen kategoriye ait tüm todo'ları getirir.

---

## 7. Services

### TodoService

- `getTodos()`: Todo öğelerini getirir ve gerekli işlemleri yapar.
- `getTodoById()`: ID'ye göre bir todo'yu getirir.
- `createTodo()`: Yeni bir todo oluşturur.
- `updateTodo()`: Bir todo'yu günceller.
- `updateTodoStatus()`: Todo'nun durumunu günceller.
- `deleteTodo()`: Bir todo'yu siler.
- `searchTodos()`: Todo öğelerinde arama yapar.

### CategoryService

- `getAllCategories()`: Tüm kategorileri getirir.
- `getCategoryById()`: ID'ye göre bir kategoriyi getirir.
- `createCategory()`: Yeni bir kategori oluşturur.
- `updateCategory()`: Bir kategoriyi günceller.
- `deleteCategory()`: Bir kategoriyi siler.
- `getTodosByCategory()`: Bir kategoriye ait tüm todo'ları getirir.

### StatsService

- `getTodosStats()`: Todo öğelerinin durumlarına göre istatistik alır.
- `getPrioritiesStats()`: Todo öğelerinin önceliklerine göre istatistik alır.

---

## Sonuç

Bu yapı ile kullanıcılar Todo ve Category işlemleri yapabilir, istatistik alabilir ve kategori ile ilişkilendirilmiş Todo öğelerini görüntüleyebilir. Controller'lar, Service ve Repository'ler arasındaki katmanlı yapı, SOLID prensiplerine uygun olarak her bir bileşenin sorumluluğunu belirler ve yönetimi kolaylaştırır. Bu yapı, uygulamanın sürdürülebilirliğini ve genişletilebilirliğini artırır.
