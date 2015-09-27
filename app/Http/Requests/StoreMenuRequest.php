<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Notifications;
use Redirect;

class StoreMenuRequest extends Request
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
            'url'   => 'required',
        ];
    }

    public function response(array $errors)
    {
        return Redirect::back()->withInput();
    }

    public function formatErrors(Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            Notifications::add($error, 'danger');
        }

        return $validator->errors()->getMessages();
    }
}
