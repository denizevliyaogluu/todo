<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\StatusEnum;
use App\Enums\PriorityEnum;
use Illuminate\Validation\Rules\Enum;

class UpdateTodoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'nullable|string|min:3|max:100',
            'description' => 'nullable|string|max:500',
            'status' => ['nullable', new Enum(StatusEnum::class)],
            'priority' => ['nullable', new Enum(PriorityEnum::class)],
            'due_date' => 'nullable|date|after:today',
        ];
    }
}
