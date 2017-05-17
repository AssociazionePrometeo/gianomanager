<?php

namespace App\Services;

use App\User;
use App\Mail\VerifyEmail;
use Illuminate\Mail\Mailer;
use App\Mail\EmailVerification;
use Illuminate\Contracts\Hashing\Hasher;

class EmailVerifier
{
    /**
     * Instance of Mailer.
     *
     * @var Mailer
     */
    protected $mail;

    /**
     * The hasher used to encrypt the tokens.
     *
     * @var string
     */
    protected $hasher;

    /**
     * The application secret key used to generate the tokens.
     *
     * @var string
     */
    protected $hashKey;

    public function __construct(Mailer $mail, Hasher $hasher, $hashKey)
    {
        $this->mail = $mail;
        $this->hasher = $hasher;
        $this->hashKey = $hashKey;
    }

    /**
     * Attempts verification of the user email.
     *
     * @param $email
     * @param $token
     * @return bool
     */
    public function attemptVerification($email, $token)
    {
        $user = User::where('email', $email)->orWhere('new_email', $email)->first();

        if (!is_null($user) && $this->hasher->check($token, $user->email_token)) {
          if (is_null($user->new_email)){
            $user->email_verified = true;
            $user->email_token = null;
            return $user->save();
          }else{
            $user->email_verified = true;
            $user->email_token = null;
            $user->email = $user->new_email;
            $user->new_email = null;
            return $user->save();
          }
        }


        return false;
    }

    /**
     * Generates a verification tokens and sends the verification email.
     *
     * @param User $user
     */
    public function sendVerification(User $user)
    {
        $token = $this->createToken();

        $user->email_token = $this->hasher->make($token);

      if(is_null($user->new_email)){
        $user->email_verified = false;
        $user->save();

        // Send the verification email.
        $this->mail->to($user)->send(new VerifyEmail($user->email, $token));
      }else{
        //$user->email_verified = false;
        $user->save();

        // Send the verification email.
        $this->mail->to($user)->send(new VerifyEmail($user->new_email, $token));
      }
    }

    protected function createToken()
    {
        return hash_hmac('sha256', str_random(40), $this->hashKey);
    }
}
