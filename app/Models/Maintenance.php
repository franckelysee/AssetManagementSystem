<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maintenance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'maintenance_id',
        'id_equipement',
        'date',
        'description',
        'cout',
        'etat',
        'equipement_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'maintenance_id' => 'integer',
        'date' => 'datetime',
        'cout' => 'float',
        'equipement_id' => 'integer',
    ];

    public function equipement(): BelongsTo
    {
        return $this->belongsTo(Equipement::class);
    }
}