<?php

namespace App\Http\Requests\Admin\CourseSubCategories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $name=request()->name;
        $category=request()->category;
        return [
            'name' => [
                'required',
                Rule::unique('course_sub_categories')
                    ->where(function ($query) use ($name, $category) {
                        return $query->where('name', $name)
                        ->where('category_id', $category);
                    }),

            ],
            'category'=>'required'
        ];
    }
}
