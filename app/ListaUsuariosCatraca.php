<?php

/*
Algumas explicações estão no arquivo da pasta Http->CatracaControler
Classe de acesso a tabela Passecatraca, do servidor sqlsrv
*/

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaUsuariosCatraca extends Model
{
    //Definindo de qual banco de daos irá pegar os dados
    protected $connection = 'sqlsrv';

    protected $primaryKey = 'MATRICULA';

    protected $table = 'LISTAUSUARIOSCATRACA';

    protected $fillable = array('NOME', 'DEPARTAMENTO', 'MATRICULA', 'OBSERVACAO', 'NUM_CARTAO');

    protected $guarded = ['MATRICULA'];
    
}