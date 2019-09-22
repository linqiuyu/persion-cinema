<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovie extends FormRequest
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
            'name' => 'required|unique:movies|max:200',
            'cover' => 'max:255',
            'video_link' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '电影名是必须的',
            'name.unique' => '电影名已存在',
            'name.max' => '电影名太长了',
            'cover.max' => '图片名称太长了',
            'video_link.required' => '你需要上传视屏',
            'video_link.max' => '电影链接太长了',
        ];
    }
}
