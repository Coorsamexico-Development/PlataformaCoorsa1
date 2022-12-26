<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'ubicaciones';


    protected $fillable = [
        'name'
    ];

    public function plantillasAutorizadas(): HasMany
    {
        return $this->hasMany(PlantillasAutorizada::class, 'ubicacione_id');
    }
}
