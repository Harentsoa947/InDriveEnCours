<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Type_voitures;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $typeV = Type_voitures::all();
        return view('auth.register', compact('typeV'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => [
                'required', 
                'string', 
                'min:5', 
                'max:13', 
                'unique:users,name',
                'regex:/^[a-zA-ZÀ-ÿ\s\-]+$/' // Uniquement lettres, accents, espaces et tirets
            ],
            'numero_phone' => [
                'required',
                'regex:/^\+?[0-9\s\-]{8,15}$/' // Entre 8 et 15 chiffres, accepte le + au début
            ],
            'role' => ['required', 'string', 'in:Chauffeur,Passager'], // "in" restreint les rôles valides
        
            'marque_voiture' => ['required_if:role,Chauffeur', 'nullable', 'string', 'max:50'],
            'typeV' => ['required_if:role,Chauffeur', 'nullable', 'string'],
            'electrique' => ['required_if:role,Chauffeur', 'nullable', 'boolean'], // 'boolean' car c'est souvent un oui/non (0 ou 1)
        
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()], // Plus sécurisé
        ], [
            'name.required' => 'Remplissez votre nom.',
            'name.string' => "Votre nom n'est pas valide.",
            'name.max' => 'Votre nom est trop long (maximum 13 caractères).',
            'name.min' => 'Votre nom est trop court (minimum 5 caractères).',
            'name.unique' => 'Ce nom existe déjà.',
            'name.regex' => 'Le nom ne doit contenir que des lettres, des espaces ou des tirets.',
        
            'role.required' => 'Vous devez choisir un rôle.',
            'role.in' => 'Le rôle sélectionné n’est pas valide.',
        
            'marque_voiture.required_if' => 'Veuillez entrer la marque de la voiture.',
            'typeV.required_if' => 'Sélectionnez le type de la voiture.',
            'electrique.required_if' => 'Votre voiture est-elle électrique ou pas ?',
        
            'numero_phone.required' => 'Vous devez entrer un numéro de téléphone.',
            'numero_phone.regex' => 'Le format du numéro de téléphone n\'est pas valide.',
        
            'password.required' => 'Créez votre mot de passe.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.letters' => 'Le mot de passe doit contenir au moins une lettre.',
            'password.numbers' => 'Le mot de passe doit contenir au moins un chiffre.',
        ]);
        
        if($request->electrique === 'true'){
            $elec = true;
        }else if($request->electrique === 'false'){
            $elec = false;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email ?? null,
            'numero_phone' => $request->numero_phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'marque_voiture' => $request->marque_voiture ?? null,
            'type_voitures_id' => $request->typeV ?? null,
            'electrique' => $elec ?? null
        ]);

        event(new Registered($user));

        Auth::login($user);

        // reidrection
        return redirect()->route('accueil')->with('inscrit', 'Compte crée');
        // return redirect(route('dashboard', absolute: false));
    }
}
