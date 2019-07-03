<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $table = "orcamentos";
    protected $primaryKey = "t11_idOrcamento";
    protected $fillable = ['t11_exercicio', 't10_idDepartamento','t11_valor', 't11_descricao'];


    public function departamento(){

        $this->hasOne(Departamento::class, 't10_idDepartamento', 't10_idDepartamento');
    }

    public function orcamento($t10_idDepartamento,$t11_exercicio){

        return $this->Departamento::where('t10_idDepartamento','=',$t10_idDepartamento)->where('t11_exercicio','=',$t11_exercicio);
    }
}
