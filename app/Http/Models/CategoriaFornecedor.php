<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaFornecedor extends Model
{
    protected $table = 'categoriaFornecedores';
    protected $primaryKey = 't09_idCategoriaFornecedores';
    protected $fillable = ['t09_nome', 
                           't09_descricao'];
}
