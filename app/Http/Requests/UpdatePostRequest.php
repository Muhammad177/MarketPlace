<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'slug' => 'nullable|unique:posts,slug,' . $this->post->id,
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
        ];
    }
}
