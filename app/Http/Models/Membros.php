<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Eventos;

class Membros extends Model
{
    protected $table =  'membros';
    protected $primaryKey = 't03_idMembro';

    protected $fillable =  [
        "t03_nome",
        "t03_endereco",
        "t03_complemento",
        "t03_bairro",
        "t03_cidade",
        "t03_UF",
        "t03_cep",
        "t03_email",
        "t03_dtNascimento",
        "t03_naturalidade",
        "t03_foneResidencial",
        "t03_foneComercial",
        "t03_foneCelular",
        "t03_estadoCivil",
        "t03_cpf",
        "t03_rg",
        "t04_idStatus",
        "t03_genero",
        "t03_conjuge",
        "t03_dtCasamento",
        "t03_nomePai",
        "t03_nomeMae",
        "t03_situacao",
        "t03_dizimista"  
   ];

    public function eventos(){

      return $this->hasMany(Eventos::class);

    }
}
