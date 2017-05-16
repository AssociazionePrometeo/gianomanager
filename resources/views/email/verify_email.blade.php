@component('mail::message')
# Verify your email address

Please click on the link below to verify your email address.

@component('mail::button', ['url' => url(route('email_verify', ['token' => $token, 'email' => $email]))])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
