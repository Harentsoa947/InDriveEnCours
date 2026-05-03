<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:25', 'min:5'],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'numero_phone' => ['required'],
            'role' => ['required', 'string'],
            'password' => ['required', 'confirmed'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'Remplissez votre nom',
            'name.string' => 'Votre nom n\'est pas valide',
            'name.max' => 'Votre nom est trop long',
            'name.min' => 'Votre nom est trop court',
            'role.required' => 'Vous devez avoir une rôle',
            // 'email.required' => 'Champ email obligatoire',
            'password.required' => 'Créer votre propre de mots de passe',
            'password.confirmed' => 'Le mots de passe est différent'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email ?? null,
            'numero_phone' => $request->numero_phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
