<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table =  'bancos';
    protected $primaryKey = 't06_idBanco';
    
    protected $fillable =  ['t06_nome', 
                            't06_codigo',
                           ];
                           
}
