<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class TipoFornecedor extends Model
{
    protected $table ="tipo_fornecedor";
    protected $primaryKey = "t08_idTipoFornecedor";

    protected $guarded   = ['_token'];}
