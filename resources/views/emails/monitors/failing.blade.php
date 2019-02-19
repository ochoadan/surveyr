@component('mail::message')

Our schedule monitor has not recieved a ping:

@if ($monitor->name)
**Name:** {{ $monitor->name }}<br>
@endif
**Command:** `{{ $monitor->command }}`<br>
**Schedule:** {{ str_replace('*', '\*', $monitor->schedule) }}<br>
**Expected at:** {{ $checkTime->toDateTimeString() }} {{ $monitor->timezone }}<br>
@if ($monitor->last_run_at)
**Last run at:** {{ $monitor->last_run_at->toDateTimeString() }} {{ $monitor->timezone }}<br>
@endif

@component('mail::button', ['url' => url("schedule-monitor/{$monitor->id}")])
View Schedule Monitor
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
