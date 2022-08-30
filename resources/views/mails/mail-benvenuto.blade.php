@component('mail::message')
Benvenuto {{ $user }}

Grazie per esserti registrato sul nostro blog



<br>
{{ config('app.name') }}
@endcomponent
