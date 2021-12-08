<?php

namespace App\Http\Requests\Discussion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscussion extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'discussion_image' => 'nullable',
            'channel_id' => 'required',
        ];
    }
}
