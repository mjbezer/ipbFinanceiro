<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $table =  'status';
    protected $primaryKey = 't04_idStatus';
    protected $fillable =  ['t04_nome', 't04_descricao','t04_secao'];
}

