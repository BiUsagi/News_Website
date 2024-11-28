<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tenDm' => 'required|string|max:255',
            'hinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'tenDm.required' => 'Tên danh mục là bắt buộc.',
            'tenDm.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'tenDm.max' => 'Tên danh mục không được vượt quá :max ký tự.',

            'hinhAnh.required' => 'Hình ảnh là bắt buộc.',
            'hinhAnh.image' => 'Hình ảnh phải là một tệp ảnh.',
            'hinhAnh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
            'hinhAnh.max' => 'Hình ảnh không được vượt quá :max KB.',
        ];
    }

    public function attributes(): array
    {
        return [
            'tenDm' => 'Tên danh mục',
            'hinhAnh' => 'Hình ảnh',
        ];
    }
}
