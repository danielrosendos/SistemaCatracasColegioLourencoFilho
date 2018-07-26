<?php

/*
Alguma explicações estão no arquivo da pasta Http->CatracaControler
Classe de acesso a tabela Passecatraca, do servidor sqlsrv
*/

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catraca extends Model
{
    //Definindo de qual banco de daos irá pegar os dados
    protected $connection = 'sqlsrv';

    protected $primaryKey = 'MATRICULA';

    protected $table = 'PASSECATRACAS';

    protected $fillable = array('NOME', 'DEPARTAMENTO', 'MATRICULA', 'OBSERVACAO', 'NUM_CARTAO', 'DATA PASSAGEM', 'HORA', 'DATA DA CONSULTA');

    protected $guarded = ['MATRICULA'];
    
}