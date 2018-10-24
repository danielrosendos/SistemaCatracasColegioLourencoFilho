<?php

/*
Algumas explicações estão no arquivo da pasta Http->CatracaControler
Classe de acesso a tabela Passecatraca, do servidor sqlsrv
*/

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{

    protected $primaryKey = 'id';

    //Definindo de qual banco de daos irá pegar os dados
    protected $connection = 'mysql';

    protected $table = 'contato';

    protected $fillable = array('name', 'problema', 'menssagem', 'status');

    protected $guarded = ['id'];

}