<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productAddRequest extends FormRequest
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
        return [
            'name' => 'required|unique:products|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required'

        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm không được trùng',
            'name.max' => 'Tên sản phẩm không quá 255 kí tự',
            'price.required' => 'Giá không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'contents.required' => 'Nội dung không được để trống'

        ];
    }
}
