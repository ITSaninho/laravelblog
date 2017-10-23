<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input as Input;


use Illuminate\Http\Request;
use HttpRequest;

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
    protected $redirectTo = '/';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:6|confirmed',
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


        if(Input::hasFile('avatar')){
            $avatar = Input::file('avatar');
            //User::create(['avatar' => $file->getClientOriginalName()]);
            mkdir("data/user/".$data['email'], 0755);
            mkdir("data/user/".$data['email']."/images", 0755);
            $avatar->move('data/user/'.$data['email'].'/images', $avatar->getClientOriginalName());

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'avatar' => $avatar->getClientOriginalName(),
                'password' => bcrypt($data['password']),
            ]);
        }else{

            mkdir("data/user/".$data['email']."images", 0755);

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'avatar' => 'default.jpg',
                'password' => bcrypt($data['password']),
            ]);
        }


        //return view('home' );
    }
}
