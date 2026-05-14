<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\LocalisationChauffeur;
use App\Models\Type_voitures;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'numero_phone', 'role', 'password', 'marque_voiture', 'type_voitures_id', 'electrique'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;




    protected $fillable = [
        'name',
        'numero_phone',
        'role',
        'email', // Même s'il est vide
        'password',
        'marque_voiture',
        'type_voitures_id',
        'electrique'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    

    // Un utilisateur appartient à un type de voiture
    public function typeVoiture()
    {
        // On précise 'type_voitures_id' car c'est le nom que tu as choisi dans ta migration
        return $this->belongsTo(Type_voitures::class, 'type_voitures_id');
    }

    public function localChauf()
    {
        return $this->belongsTo(LocalisationChauffeur::class, 'position_chauffeur_id');
    }
}

