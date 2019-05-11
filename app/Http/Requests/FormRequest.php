<?php

namespace App\Http\Requests;

 
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;
abstract class FormRequest extends LaravelFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $contents = $this->validation_message($errors);
        $first_value = reset($contents); 
        throw new HttpResponseException(response()->json([
            'code'=>400,
            'descriptions'=>$first_value,
            'contents' => $contents
        ], JsonResponse::HTTP_BAD_REQUEST));
    }

    function validation_message($validasi){
    $error = array();
    foreach ($validasi as $key => $value) {
            $error[$key]=$value[0];
    }
    return $error;
}
}
