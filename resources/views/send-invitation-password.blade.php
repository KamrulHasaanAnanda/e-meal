@component('mail::message')
# Hello {{$data['name']}},

Your login email is <b>{{$data['email']}}</b>.<br>
Your login password is <b>{{$data['password']}}</br>.
{{-- 
@component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thank you,<br>
for being with us.
@endcomponent
