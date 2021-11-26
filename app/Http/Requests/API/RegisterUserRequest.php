<?php

namespace App\Http\Requests\API;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            
            'email'    => 'unique:users|required',
            'password' => 'required',
        ];
    
        $input     = $request->only('email','password');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
    }
}
