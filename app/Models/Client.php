<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table =  'tb_clientes';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'cpf', 'birth_day', 'gender'
    ];

    protected $connection = 'mysql';

    protected function serializeDate( $date ) {
        return $date->format( 'd-m-Y H:i:s' );
    }
}
