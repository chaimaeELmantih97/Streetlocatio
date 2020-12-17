@component('mail::message')

{{$body}}
{{-- @component('mail::button', ['url' => $url])
{{$button}}
@endcomponent --}}

Merci,<br>
{{ config('app.name') }}
@endcomponent
