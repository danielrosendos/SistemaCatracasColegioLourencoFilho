<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CadastroGB extends Model
{
    protected $connection = 'mysql';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $table = 'gustavob';

    protected $fillable = array('id','name', 'email', 'curso', 'inicio', 'fim');

    protected $guarded = ['id'];
}
