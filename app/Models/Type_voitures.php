<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_voitures extends Model
{
    // Un type de voiture peut être possédé par plusieurs utilisateur
    public function users()
    {
        return $this->hasMany(User::class, 'type_voitures_id');
    }
}
