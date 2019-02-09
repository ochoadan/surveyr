@extends('spark::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <schedule-monitor :schedule-monitor="{{ json_encode($scheduleMonitor) }}"></schedule-monitor>
        </div>
    </div>
</div>
@endsection
