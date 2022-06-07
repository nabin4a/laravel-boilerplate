<?php

namespace App\Domains\Auth\Http\Requests\Frontend\Auth;

use App\Domains\Auth\Rules\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
use Illuminate\Validation\Rules\Password;

/**
 * Class UpdatePasswordRequest.
 */
class UpdatePasswordRequest extends FormRequest
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
        $rules = [
            'required',
            'string',
            'different:current_password',
            Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            new UnusedPassword($this->user()),
            'confirmed',
        ];
        return [
            'current_password' => ['required', 'max:100'],
            'password' => $rules
            // array_merge(
            //     $rules,
            //     PasswordRules::changePassword(
            //         $this->email,
            //         config('boilerplate.access.user.password_history') ? 'current_password' : null
            //     )
            // ),
        ];
    }
}
