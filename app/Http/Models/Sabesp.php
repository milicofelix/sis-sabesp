<?php

namespace MILICO\Models;

use Illuminate\Database\Eloquent\Model;

class Sabesp extends Model
{
    protected $table = 'consumo';

    protected $fillable = ['leitura1','leitura2','data_conta','vlr_consumo','vlr_final','tarifa','consumo_atual','data_vencimento','status'];

}
