<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    /*
    Retornar todos os modulos do fabricante
    */
    public function modulos() {
        $this->hasMany(Modulo::class);
    }

    /*
    Retornar todos os inversores do fabricante
    */
    public function inversores() {
        $this->hasMany(Inversor::class);
    }

}
