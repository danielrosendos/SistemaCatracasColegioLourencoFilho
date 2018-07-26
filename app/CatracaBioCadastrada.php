<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatracaBioCadastrada extends Model
{
    protected $connection = 'sqlsrv';

    protected $primaryKey = 'MATRICULA';

    protected $table = 'BIOMETRIACATRACA';

    protected $fillable = array('COD_PESSOA','NOME', 'NUM_CARTAO', 'MATRICULA', 'OBSERVACAO');

    protected $guarded = ['MATRICULA'];
}
