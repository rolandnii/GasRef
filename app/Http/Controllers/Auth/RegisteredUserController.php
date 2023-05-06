<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        // $request->validate(
        //     [
        //         'fname' => ['required', 'string', 'max:255'],
        //         'lname' => ['required', 'string', 'max:255'],
        //         'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        //         'gps_location' => ['required', 'string', 'max:255'],
        //         'street_name' => ['string', 'max:255'],
        //         'house_no' => ['string', 'max:255'],
        //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     ],
        //     []
        // );
        $validator = Validator::make(
            $request->all(),
            [
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'phone' => ['required'],
                'gps_location' => ['required', 'string', 'max:255'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                "fname.required" => "First name is required",
                "fname.string" => "First name should be a string type",
                "fname.max" => "First name should not exceed 255 letters",
                "lname.required" => "Last name is required",
                "lname.string" => "Last name should be a string type",
                "lname.max" => "Last name should not exceed 255 letters",
                "email.required" => "Email is required",
                "email.unique" => "Email already exists",
                'email.email' => "Email is invalid",
                'phone.required' => 'Phone  number is required',
                'password.required' => "Password is required"
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //generating user code 
        $user_code = uniqid("USR");
        $user = User::create([
            'user_code' => $user_code,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'gps_location' => $request->gps_location,
            'street_name' => $request->street_name,
            'house_no' => $request->house_no,
            'user_type' => 'customer',
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
            'deleted' => 0,
            'createdate' =>  date('Y-m-d'),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
