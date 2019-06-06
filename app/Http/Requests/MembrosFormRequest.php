<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembrosFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
        "t03_nome" => "required|min:3|max:60",
        "t03_endereco" =>"min:10|max:60",
        "t03_bairro"=>"min:5|max:30",
        "t03_UF" =>"required",
        "t03_dtNascimento"=>"required|date",
        "t03_estadoCivil"=>"required",
        "t04_idStatus"=>"required",
        "t03_genero"=>"required",
             ];
    }

    public function messages(){
        return [
            "t03_nome.required"=> "O campo Nome é de preeenchimento obrigatório!",
            "t03_nome.min" =>"O campo Nome deve ter no mínimo 03 caractéres",
            "t03_nome.max" =>"O campo Nome deve ter no maximo 60 caractéres",
            "t03_endereco.min" =>"O campo Endereço deve ter no mínimo 10 caractéres",
            "t03_endereco.max" =>"O campo Endereço deve ter no maximo 60 caractéres",
            "t03_bairro.min" =>"O campo Bairro deve ter no mínimo 5 caractéres",
            "t03_bairro.max" =>"O campo Bairro deve ter no máximo 30 caractéres",
            "t03_cep.min" =>"O campo CEP deve ter no mínimo 9 caractéres",
            "t03_cep.max" =>"O campo CEP deve ter no máximo 10 caractéres",
            "t03_UF.required"=> "O campo Estado é de seleção obrigatória!",
            "t03_dtNascimento.required"=> "O campo Data de Nascimento é de preeenchimento obrigatório!",
            "t03_estadoCivil.required"=> "O campo Estado Civíl é de seleção obrigatória!",
            "t03_genero.required"=> "O campo Genero é de seleção obrigatória!",
            "t04_idStatus.required"=> "O campo Situação é de seleção obrigatória!",
        ];
    }
    
}
