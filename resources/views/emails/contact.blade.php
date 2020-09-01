@component('mail::message')
<p>Nom : {{ request('name')}}</p>
<p>Email : {{ request('email') }}</p>
<p>message : {{ request('message')}}</p>
@endcomponent
