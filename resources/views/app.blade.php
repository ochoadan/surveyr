@extends('spark::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <app :app="{{ json_encode($app) }}"></app>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        Surveyr.timezones = {!! json_encode(\DateTimeZone::listIdentifiers(\DateTimeZone::ALL)) !!};
    </script>
@endpush
