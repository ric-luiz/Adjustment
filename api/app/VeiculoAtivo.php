<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VeiculoAtivo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quilometragem', 'dias', 'veiculo_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'veiculos_ativos';

    /**
     * Associamos o Veiculos (e seus dados comuns) a esta instancia de Veiculo Ativo
     */
    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo');
    }

     /**
     * Relaciona Este Veiculo Ativo com suas Manutenções Diparadas
     */
    public function ajusteManutencao()
    {
        return $this->hasMany('App\AjusteManutencao', 'veiculo_ativo_id');
    }
}
