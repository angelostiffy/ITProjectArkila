@component('mail::message')
# Hello

You are receiving this email because we received a password reset request for your account.

@component('mail::button', ['url' => '/password/reset/'])
Reset Password
@endcomponent

@component('mail::subcopy')
If you did not request a password reset, no further action is required.
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
