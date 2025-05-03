<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    // Hangi sütunların doldurulabileceğini belirler
    protected $fillable = [
        'name',
        'color',
    ];

    // İlişkiler
    public function getTodos()
    {
        return $this->belongsToMany(Todo::class, 'todo_category');
    }
}
