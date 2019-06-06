<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table =  'contasBancarias';
    protected $primaryKey = 't07_idContaBancaria';
    
    protected $fillable =  ['t07_tipoConta', 
                            't07_agencia',
                            't07_conta', 
                            't07_operacao',
                            't06_idBanco',
                            't07_saldoInicial'];

    public function bancos(){

        return $this->hasOne(Banco::class, 't06_idBanco', 't06_idBanco');
    }
}
