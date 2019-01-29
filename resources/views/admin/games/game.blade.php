@extends('layouts.dashboard.app')
@section('content')
<div id="app-vue">
    <app />
</div>
<script src="{{ asset('js/dashboard/games/app.js') }}"></script>
@endsection
