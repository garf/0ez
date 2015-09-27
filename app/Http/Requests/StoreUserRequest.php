<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;
use Notifications;
use Redirect;

class StoreUserRequest extends Request
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
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
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
