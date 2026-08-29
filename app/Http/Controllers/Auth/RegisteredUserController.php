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
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]
        ,
        [
        'name.required' => 'Le nom et prénom sont obligatoires.',
        'name.string' => 'Le nom doit être une chaîne de caractères.',
        'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',

        'email.required' => 'Le champ e-mail est obligatoire.',
        'email.string' => 'Le champ e-mail doit être une chaîne de caractères.',
        'email.email' => 'Veuillez saisir une adresse e-mail valide.',
        'email.max' => 'L’adresse e-mail ne doit pas dépasser 255 caractères.',
        'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
        'email.lowercase' => 'L’adresse e-mail doit être écrite en minuscules.',


        'password.required' => 'Le champ mot de passe est obligatoire.',
        'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
    ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        
        return to_route('theme.dashboard');
    }
}
