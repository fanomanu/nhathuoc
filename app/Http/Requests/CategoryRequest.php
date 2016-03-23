<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
            'txtName'           => 'required|unique:categories,name',
            'txtOrder'          => 'required',
            'txtKeyword'        => 'required'
        ];
    }

    public function messages(){
        return [
            'txtName.required'          => 'Xin vui lòng nhập tên loại',
            'txtName.unique'            => 'Tên loại đã tồn tại',
            'txtOrder.required'         => 'Xin vui lòng nhập thứ tự',
            'txtKeyword.required'       => 'Xin vui lòng nhập từ khóa'
        ];
    }
}
