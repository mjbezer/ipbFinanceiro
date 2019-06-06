<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembresiaFormRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules(){
        return [
            "t04_nome" => "required|min:5|max:60",
            "t04_descricao" =>"required|min:5|max:1000",
            "t04_secao" => "required"
        ];
    }
    
    public function messages(){
        return [
            "t04_nome.required" =>"O campo Status é de preenchimento obrigatório ",
            "t04_nome.min" => "O campo Stats deve ter no mínimo 05 caractéres",
            "t04_nome.max" => "O campo Stats deve ter no mínimo 60 caractéres",
            "t04_descricao.required"=>"O campo descrição é de preencimento obrigatório",
            "t04_descricao.min" => "O campo Statos deve ter no mínimo 05 caractéres",
            "t04_descricao.max" => "O campo Statos deve ter no mínimo 60 caractéres",
            "t04_secao.required" => "O campo Seção é de seleção obrigatória"
        ];
    }
}