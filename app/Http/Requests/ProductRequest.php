<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'slCate'        => 'numeric|min:1',
            'txtName'       => 'required|unique:categories,name',
            'txtUnitType'   => 'required|numeric',
            'txtPrice'      => 'required|numeric',
            'txtIntro'      => 'required',
            'txtContent'    => 'required',
            'txtKeyword'    => 'required'
        ];
    }

    public function messages(){
        return [
            'slCate.min'                => 'Xin vui lòng chọn loại',
            'txtName.required'          => 'Xin vui lòng nhập tên',
            'txtName.unique'            => 'Tên đã tồn tại',
            'txtUnitType.required'      => 'Xin vui chọn đơn vị tính',
            'txtUnitType.numeric'       => 'Xin vui chọn đơn vị tính',
            'txtPrice.required'         => 'Xin vui nhập giá',
            'txtPrice.numeric'          => 'Giá phải là một số',
            'txtIntro.required'         => 'Xin vui lòng nhập đoạn giới thiệu',
            'txtContent.required'       => 'Xin vui lòng nhập trang thông tin',
            'txtKeyword.required'       => 'Xin vui nhập từ khóa'
        ];
    }
}
