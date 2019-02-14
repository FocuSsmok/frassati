@extends('layouts.dashboard.app')
@section('content')
<div class="content">
    <h2 class="title is-2">Posty</h2>
    <div class="posts">
        <table class="posts__table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Edytuj</th>
                    <th>Usuń</th>
                </tr>
            </thead>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->image }}</td>
                    <td>{{ $post->date }}</td>
                    <td><a href="{{ '/admin/post/'.$post->id.'/edit' }}">Edytuj</a></td>
                    <td><a href="">Usuń</a></td>
                </tr>
            @endforeach
        </table>
        {{ $posts->links('vendor.pagination.default') }}
    </div>
</div>
@endsection
