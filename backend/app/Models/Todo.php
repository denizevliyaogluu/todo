<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'todos';

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'due_date',
    ];

    protected $dates = ['deleted_at'];

    public function getCategories()
    {
        return $this->belongsToMany(Category::class, 'todo_category');
    }
}
