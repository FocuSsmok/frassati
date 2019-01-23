@extends('layouts.dashboard.app')
@section('content')
<div id="app-vue">
    <app />
</div>
<script src="{{ asset('js/dashboard/app.js') }}"></script>
@endsection
