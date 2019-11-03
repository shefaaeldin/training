@component('mail::message')
# Introduction

Welcome {{$profile->user->first_name}} {{$profile->user->last_name}}

Please visit this link to change your password
@component('mail::button', ['url' => url('/users/changepassword/'.$profile->user->id)])
Change Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
