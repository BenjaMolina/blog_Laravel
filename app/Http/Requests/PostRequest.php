<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $id = "";

        if($this->route('post'))
        {
            $id = $this->post->id;
        }
        return [
            'name' => 'required',
            'excerpt' => 'required',
            'slug' => 'required|unique:posts,slug,'.($this->post ? $this->post->id : ''),
            'body' => 'required',
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'status' => 'required|in:DRAFT,PUBLISHED',
            'file' => 'nullable|mimes:jpg,jpeg,png',
        ];
    }
}
