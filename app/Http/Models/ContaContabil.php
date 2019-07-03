<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ContaContabil extends Model
{
    protected $table = "contasContabeis";
    protected $primaryKey ="t13_idContaContabil";
    protected $fillable = ['t13_nome','t13_tipo','t13_descricao'];
}
