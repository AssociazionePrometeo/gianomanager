<?php

namespace App\Http\Controllers\Auth;

use App\Services\EmailVerifier;
use Mail;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
    protected $redirectTo = '/home';

    protected $verifier;

    /**
     * Create a new controller instance.
     *
     * @param EmailVerifier $verifier
     */
    public function __construct(EmailVerifier $verifier)
    {
        $this->verifier = $verifier;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|min:10',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
        ]);
        $user->password = bcrypt($data['password']);
        $user->validated = false;
        $user->email_verified = false;
        $user->save();

        $user->roles()->sync(['default']);

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->verifier->sendVerification($user);
        flash(__('auth.verification_email_sent'), 'success');

        return redirect()->route('login');
    }

    public function verify($email, $token)
    {
        if ($this->verifier->attemptVerification($email, $token)) {
            flash(__('auth.verification_email_complete'), 'success');

            return redirect('login');
        }

        abort(404);
    }
}
