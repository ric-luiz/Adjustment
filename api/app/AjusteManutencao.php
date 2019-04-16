<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AjusteManutencao extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'revisado'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ajustes_manutencoes';

    /**
     * Relaciona Este Ajeste Manutenção com seu veiculo ativo correspondente
     */
    public function veiculoAtivo()
    {
        return $this->belongsTo('App\VeiculoAtivo', 'veiculo_ativo_id');
    }
}
