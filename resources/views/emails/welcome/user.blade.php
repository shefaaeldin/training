@component('mail::message')
# Introduction

Welcome {{$user->first_name}} {{$user->last_name}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
