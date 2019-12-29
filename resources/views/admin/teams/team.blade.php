@extends('layouts.dashboard.app')
@section('content')
<div id="app-vue">
    <app />
</div>
<script src="{{ asset('js/dashboard/teams/app.js') }}"></script>
@endsection
