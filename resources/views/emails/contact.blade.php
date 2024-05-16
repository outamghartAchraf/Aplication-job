<x-mail::message>
# Introduction

The message client

<p>Email : {{$data['email']}}</p>
<p>Message : {{$data['message']}}</p>
 

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
