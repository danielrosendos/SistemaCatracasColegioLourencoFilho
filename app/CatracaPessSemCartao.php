<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatracaPessSemCartao extends Model
{
    protected $connection = 'sqlsrv';

    protected $primaryKey = 'MATRICULA';

    protected $table = 'FUNCIONARIOS';

    protected $fillable = array('MATRICULA','NOME', 'NUM_CARTAO');

    protected $guarded = ['MATRICULA'];
}
