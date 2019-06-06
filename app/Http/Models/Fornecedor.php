<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table ="fornecedores";
    protected $primaryKey = "t08_idFornecedor";

    protected $guarded   = ['_token'];

}
