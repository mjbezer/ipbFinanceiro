<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $table =  'historico';
    protected $primaryKey = 't05_idHistorico';
    
    protected $fillable =  ['t05_nome', 
                            't05_descricao',
                            't03_idMembro', 
                            't05_data'];
}
