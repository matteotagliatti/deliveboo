<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\TypeUser;
use App\User;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nome' => ['required', 'string', 'max:100'],
            'indirizzo' => ['required', 'string', 'max:255'],
            'P_IVA' => ['unique:users', 'required', 'string', 'min:13', 'max:13'],
            'immagine' => ['nullable', 'image'],
            'type' => ['required'],
        ], [
            'email.unique' => 'L\'email inserita è già in uso',
            'password.confirmed' => 'Le password non corrispondono',
            'password.min' => 'Le password deve essere di almeno 8 caratteri',
            'P_IVA.unique' => 'La Partita IVA inserità è già in uso',
            'P_IVA.min' => 'La Partita IVA deve essere di 13 caratteri',
            'P_IVA.max' => 'La Partita IVA deve essere di 13 caratteri',
            'type.required' => 'Devi selezionare almeno una tipologia',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nome' => $data['nome'],
            'indirizzo' => $data['indirizzo'],
            'P_IVA' => $data['P_IVA'],
            'immagine' => Storage::put('uploads', $data['immagine']),
        ]);

        $type = $data['type'];
        $user->types()->attach($type);

        return $user;
    }

    public function chooseType(User $user){

        $types = Type::all();

        return view('auth.register', compact('types', 'user'));
    }

}
