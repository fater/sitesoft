<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AddMessage
 *
 * Валидация добавления нового сообщения
 *
 * @package App\Http\Requests
 */
class AddMessage extends FormRequest
{
    protected $redirect = '';

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
     * Правило валидации форма добавления сообщения
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => [
                'required',
                'regex:/^.*\S.*$/u',
            ]
        ];
    }
}
