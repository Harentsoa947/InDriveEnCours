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
            // $request->validate([
            'name' => ['required', 'string', 'max:25', 'min:5', 'unique:users,name'],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'numero_phone' => ['required'],
            'role' => ['required', 'string'],

            'marque_voiture' => ['required_if:role,Chauffeur'],
            'typeV' => ['required_if:role,Chauffeur'],
            'electrique' => ['required_if:role,Chauffeur'],

            'password' => ['required', 'confirmed'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'Remplissez votre nom',
            'name.string' => 'Votre nom n\'est pas valide',
            'name.max' => 'Votre nom est trop long',
            'name.min' => 'Votre nom est trop court',
            'name.unique' => 'Ce nom existe déja',
            'role.required' => 'Vous devez avoir une rôle',

            'marque_voiture.required_if' => 'Veuillez entré le marque du voiture',
            'typeV.required_if' => 'Selectionnez le type du voiture',
            'electrique.required_if' => 'Votre voiture est électrique ou pas?',

            'numero_phone.required' => 'Vous devez entre une numéro de téléphone',
            // 'email.required' => 'Champ email obligatoire',
            'password.required' => 'Créer votre propre de mots de passe',
            'password.confirmed' => 'Le mots de passe est différent'
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
