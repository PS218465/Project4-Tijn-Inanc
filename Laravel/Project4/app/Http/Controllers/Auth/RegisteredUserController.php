<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\bezoeker;
use App\Models\medewerker;
use App\Models\User;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        // **********************************************************************
        // $user->id gebruiken om role klant (id=1) toe te voegen in user_role table
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => 1,
        ]);
        // **********************************************************************

        // **********************************************************************
        // $user->id gebruiken om klant aan te maken (one to one relation)
        bezoeker::create([
            'id' => $user->id,
            'voornaam' => $request->first_name,
            'achternaam' => $request->last_name,
            'telefoon_nummer' => $request->phone,
            'adres' => $request->address,
            'postcode' => $request->zipcode,
            'stad' => $request->city,
            // Bij aanmaken klant krijgt hij/zij 10 pizza_points
            'points' => 10,
        ]);
        // **********************************************************************

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
