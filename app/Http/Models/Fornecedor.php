<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table ="fornecedores";
    protected $primaryKey = "t08_idFornecedor";

    protected $guarded   = ['_token'];


    public function categoria(){

        return $this->hasOne(CategoriaFornecedor::class, 't09_idCategoriaFornecedores', 't09_idCategoriaFornecedores');
    }

 
}
