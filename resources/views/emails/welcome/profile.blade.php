@component('mail::message')
# Introduction

Welcome {{$user->first_name}} {{$user->last_name}}

Please visit this link to change your password
@component('mail::button', ['url' => url('/users/changepassword/'.$user->id)])
Change Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
