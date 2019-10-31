@component('mail::message')
# Introduction

Welcome {{$profile->user->first_name}} {{$profile->user->last_name}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
