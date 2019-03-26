@component('mail::message')

Success! We just recieved the first ping from your scheduled cron job and it is now being monitored by Surveyr.

@if ($monitor->name)
**Name:** {{ $monitor->name }}<br>
@endif
**Command:** `{{ $monitor->command }}`<br>
**Schedule:** {{ str_replace('*', '\*', $monitor->schedule) }}<br>
@if ($monitor->last_run_at)
**Last run at:** {{ $monitor->last_run_at->toDateTimeString() }} {{ $monitor->timezone }}<br>
@endif

@component('mail::button', ['url' => url("schedule-monitor/{$monitor->id}")])
View Schedule Monitor
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
