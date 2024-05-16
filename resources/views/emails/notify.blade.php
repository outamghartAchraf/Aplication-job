<x-mail::message>
# Introduction

Congratulation! your are a premium 

<p>Purchase Details</p>
<p>plan : {{$plan}}</p>
<p>Your billing ends : {{$billing_ends}}</p>

<x-mail::button :url="'/jobs/create'">
post a job
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
