<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagUpdateRequest extends FormRequest
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
        // dd($this->tag->id);
        return [
            'name' =>'required',
            'slug' => 'required|unique:tags,slug,'.$this->tag->id, //Requerido y unico en la tabla tags campo slug                                                      a excepcion del tag que se pasa por parametro                                                       (Ver ruta tags/{tag})
        ];
    }
}
