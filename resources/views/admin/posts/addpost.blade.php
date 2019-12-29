@extends('layouts.dashboard.app') 
@section('content')
<h2 class="title is-2">Edytuj post</h2>
<div class="post">
    <form method="post" action="{{action('Admin\Posts\PostController@createPost')}}" enctype="multipart/form-data">
        @csrf
        <div class="field">
            <label class="label" for="post_title">Tytuł</label>
            <div class="control">
                <input class="input " name="post_title" type="text " placeholder="Nowa wartość... " value="">
            </div>
            {{--
            <p class="help">This is a help text</p> --}}
        </div>
        <div class="field">
            <label class="label" for="post_content">Treść</label>
            <div class="control">
                <textarea class="textarea" name="post_content" placeholder="e.g. Hello world"></textarea>
            </div>
            {{--
            <p class="help">This is a help text</p> --}}
        </div>
        <div class="field">
            <label class="label" for="post_img">Obrazek</label>
            <div class="control">
                <input type="file" name="post_img" id="post_img" accept="image/*">
                <img id="show__img" width="150px" src="" alt="">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Zapisz</button>
            </div>
        </div>
</div>
</form>
</div>
    @include('vendor.editor.tinymce') {{--
<script>
    var file = document.querySelector("#post_img");
    var showImg = document.querySelector("#show__img");
    file.addEventListener("change", function () {
        // showImg.attributes.src.value = file.value;
        renderImage(this.files[0])
    });

    function renderImage(file) {

        var reader = new FileReader();

        reader.onload = function (event) {
            var the_url = event.target.result
            showImg.attributes.src.value = the_url;
        }

        reader.readAsDataURL(file);
    }

</script> --}}
@endsection