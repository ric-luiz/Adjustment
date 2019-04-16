<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veiculo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'marca', 'cilindrada', 'descricao',
    ];

    use SoftDeletes;

    /**
     * Associa o Veiculo Ativo com seus dados comuns de Veiculos.
     * Como Marcas, Modelos e etc
     */
    public function veiculoAtivo()
    {
        return $this->hasOne('App\VeiculoAtivo');
    }

    /**
     * Relaciona esse Veiculo com sua Lista de Manutenções (basicamente o Manual
     * do proprietario do veiculo cedido pela fabricante)
     */
    public function listaManutencao()
    {
        return $this->hasMany('App\ListaManutencao');
    }
}
