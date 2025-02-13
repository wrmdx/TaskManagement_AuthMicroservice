<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required",
            "status"=> ["required",Rule::in(["completed","pending","in_progress"])],
            "priority"=> ["required",Rule::in(["low","medium","high"])],
            "description"=>"required",
            "due_date"=>"required",
            "project_id"=>"required",
            "assigned_user_id"=>"required",
        ];
    }
}
