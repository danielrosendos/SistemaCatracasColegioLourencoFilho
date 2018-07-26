<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catraca extends Model
{
    protected $connection = 'sqlsrv';

    protected $primaryKey = 'MATRICULA';

    protected $table = 'PASSECATRACAS';

    protected $fillable = array('NOME', 'DEPARTAMENTO', 'MATRICULA', 'OBSERVACAO', 'NUM_CARTAO', 'DATA PASSAGEM', 'HORA', 'DATA DA CONSULTA');

    protected $guarded = ['MATRICULA'];
    
}