@component('mail::message')

Our schedule monitor has not recieved a ping:

**Command:** `{{ $monitor->command }}`<br>
**Schedule:** {{ str_replace('*', '\*', $monitor->schedule) }}<br>
**Expected at:** {{ $checkTime->toDateTimeString() }} {{ $monitor->timezone }}<br>
@if ($monitor->last_run_at)
**Last run at:** {{ $monitor->last_run_at->toDateTimeString() }} {{ $monitor->timezone }}<br>
@endif

[{{ url("monitors/{$monitor->id}") }}]({{ url("monitors/{$monitor->id}") }})

Thanks,<br>
{{ config('app.name') }}
@endcomponent
