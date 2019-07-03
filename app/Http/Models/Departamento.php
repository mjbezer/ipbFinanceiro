<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 't10_idDepartamento';
    protected $fillable = ['t10_sigla','t10_nome', 't10_descricao'];
}
