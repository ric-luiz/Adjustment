<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaManutencao extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'descricao', 'quilometragem', 'dias', 'veiculo_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lista_manutencoes';

    /**
     * Relaciona esta manutenção com seu veiculo correspondente
     */
    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo');
    }
}
