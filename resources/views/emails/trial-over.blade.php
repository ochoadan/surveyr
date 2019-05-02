@component('mail::message')

This is a notice that your Surveyr 10 day free trial **ends today**.

**Team:** {{ $team->name }}

Once your free trial ends your schedule cron jobs will no longer be monitored. If you want to continue monitoring your schedule cron jobs, you need to upgrade to a paid plan.

@component('mail::button', ['url' => url('/settings/subscription')])
Upgrade Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
