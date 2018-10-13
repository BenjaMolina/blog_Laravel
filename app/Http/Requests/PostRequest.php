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
            'slug' => 'required|unique:posts,slug,'.$id,
            'body' => 'required',
        ];
    }
}
