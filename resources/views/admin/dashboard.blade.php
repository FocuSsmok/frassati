@extends('layouts.dashboard.app') 
@section('content')
<div class="content">
    <h2 class="title is-2">Witaj w panelu administracyjnym</h2>
    <div class="is-divider" data-content=""></div>
    <div class="details">
        <div class="details__card posts mycard">
            <div class="mycard__content">
                <span class="mycard__icon">
                    <i class="far fa-newspaper"></i>
                </span>
                <span class="mycard__total">{{App\Models\Posts\Post::count()}}</span>
            </div>
            <footer class="mycard__footer">
                <a href="/admin/posts">
                    <span> Wyświetl posty </span>
                    <span>
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            </footer>
        </div>
        <div class="details__card posts mycard">
            <div class="mycard__content">
                <span class="mycard__icon">
                    <i class="far fa-newspaper"></i>
                </span>
                <span class="mycard__total">5</span>
            </div>
            <footer class="mycard__footer">
                <a href="">
                    <span> Wyświetl posty </span>
                    <span>
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            </footer>
        </div>
        <div class="details__card posts mycard">
            <div class="mycard__content">
                <span class="mycard__icon">
                    <i class="far fa-newspaper"></i>
                </span>
                <span class="mycard__total">5</span>
            </div>
            <footer class="mycard__footer">
                <a href="">
                    <span> Wyświetl posty </span>
                    <span>
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            </footer>
        </div>
    </div>
</div>
@endsection