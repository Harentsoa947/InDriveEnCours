<?php

namespace App\Models;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RequetTrip extends Model
{
    //
    public function trajet()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }

    public function chauffeur()
    {
        return $this->belongsTo(User::class, 'chauffeur_id');
    }

    protected $casts = [
        'reponse_chauffeur' => 'boolean',
    ];

}
