<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucRequest extends FormRequest
{
 
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'tieuDe' => 'required|string|max:255',
            'tomTat' => 'required|string',
            'noiDung' => 'required|string',
            'hinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'idDm' => 'required|integer',
        ];
    }


    public function messages(): array
    {
        return [
            'tieuDe.required' => 'Tiêu đề là bắt buộc.',
            'tieuDe.string' => 'Tiêu đề phải là chuỗi ký tự.',
            'tieuDe.max' => 'Tiêu đề không được vượt quá :max ký tự.',
            
            'tomTat.required' => 'Tóm tắt là bắt buộc.',
            'tomTat.string' => 'Tóm tắt phải là chuỗi ký tự.',
            
            'noiDung.required' => 'Nội dung là bắt buộc.',
            'noiDung.string' => 'Nội dung phải là chuỗi ký tự.',
            
            'hinhAnh.required' => 'Hình ảnh là bắt buộc.',
            'hinhAnh.image' => 'Hình ảnh phải là một tệp ảnh.',
            'hinhAnh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
            'hinhAnh.max' => 'Hình ảnh không được vượt quá :max KB.',
            
            'idDm.required' => 'Danh mục là bắt buộc.',
            'idDm.integer' => 'Danh mục phải là số nguyên.',
        ];
    }

    public function attributes(): array
    {
        return [
            'tieuDe' => 'Tiêu đề',
            'tomTat' => 'Tóm tắt',
            'noiDung' => 'Nội dung',
            'hinhAnh' => 'Hình ảnh',
            'idDm' => 'Danh mục',
        ];
    }
}
