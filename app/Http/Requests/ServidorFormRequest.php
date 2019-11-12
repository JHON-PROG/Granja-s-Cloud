<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServidorFormRequest extends FormRequest
{
  /** Determine if the user is authorized to make this request.
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
       'nombreServidor'=>'required',
       'ipInterna'=>'required',
       'ipExterna'=>'required',
       'esCluster'=>'required',
       'categoria'=>'required',
       'esCluster'=>'required',
       
       


   ];

 }
}
