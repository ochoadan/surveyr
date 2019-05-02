@component('mail::message')

This is a reminder that your Surveyr 10 day free trial is almost over.

**Team:** {{ $team->name }}

If you don't upgrade to a paid plan before your free trial ends on<br>**{{ $team->trial_ends_at->toFormattedDateString() }}** your schedule cron jobs will no longer be monitored.

@component('mail::button', ['url' => url('/settings/subscription')])
Upgrade Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
