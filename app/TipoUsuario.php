<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    public const TIPO_FUNCIONARIO='funcionario';
    public const TIPO_EMPRESA='empresa';
    public const TIPO_FUNCIONARIO_ID='2';
    public const TIPO_EMPRESA_ID='1';

    public $table = 'tipo_usuario';

    protected $fillable=[
        'id',
        'tipo'
    ];
}
