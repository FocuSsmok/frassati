@extends('layouts.dashboard.app') 
@section('content')
<h2 class="title is-2">Edytuj post</h2>
<div class="post">
    <form action="">
        <div class="field">
            <label class="label" for="post_id">ID</label>
            <div class="control">
                <input class="input" name="post_id" type="number" placeholder="Text input" value="{{$post->id}}" disabled>
            </div>
            {{--
            <p class="help">This is a help text</p> --}}
        </div>
        <div class="field">
            <label class="label" for="post_user">Autor</label>
            <div class="control">
                <input class="input" name="post_id" type="text" placeholder="Nowa wartość..." value="{{$post->user->name}}" disabled>
            </div>
            {{--
            <p class="help">This is a help text</p> --}}
        </div>
        <div class="field">
            <label class="label" for="post_title">Tytuł</label>
            <div class="control">
                <input class="input " name="post_title " type="text " placeholder="Nowa wartość... " value="{{$post->title}}">
            </div>
            {{--
            <p class="help">This is a help text</p> --}}
        </div>
        <div class="field">
            <label class="label" for="post_content">Treść</label>
            <div class="control">
                <textarea class="textarea" name="post_content" placeholder="e.g. Hello world">{{$post->content}}</textarea>
            </div>
            {{--
            <p class="help">This is a help text</p> --}}
        </div>
        <div class="field">
            <label class="label" for="post_content">Obrazek</label>
            <div class="control">
                <img width="150px" src="{{ asset($post->image) }}" alt="">
            </div>
            {{--
            <p class="help">This is a help text</p> --}}
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-link">Zapisz</button>
            </div>
        </div>
</div>
</form>
</div>
    @include('vendor.editor.tinymce')
@endsection