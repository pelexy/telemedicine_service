<?php

namespace App\Http\Requests\ActivityRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class CreateActivityRequest extends FormRequest
{ 
   /** 
 *  @OA\Schema(
 *   schema="CreateActivityRequest",
 *   type="object",
 *   allOf={
 *       @OA\Schema(ref="#/components/schemas/CreateActivityRequest"),
 *       @OA\Schema(
 *         
 *           @OA\Property(property="user_id", format="integer", type="integer")
 *       ),
 *        @OA\Schema(
 *         
 *           @OA\Property(property="title", format="string", type="string")
 *       ),
 *    @OA\Schema(
 *         
 *           @OA\Property(property="description", format="string", type="string")
 *       ),
    * @OA\Schema(
    *         
    *           @OA\Property(property="iserror", format="string", type="boolean")
    *       ),
 * 
 *   }
 * )
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
            'user_id' => 'required|integer',
            'title'=>'required|string',
            'description'=>'required|string',
             ];
    }

    protected function failedValidation(Validator $validator)
    {



        $response = [
            'status' => 'failure',
            'status_code' => 400,
            'message' => 'Bad Request',
            'errors' => $validator->errors(),
        ];

        throw new HttpResponseException(response()->json($response, 400));
    }
}