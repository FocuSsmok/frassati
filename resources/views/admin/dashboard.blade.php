@extends('layouts.dashboard.app')
@section('content')
<div class="content dashboard">
    <h2 class="dashboard__title title is-2">Witaj w panelu administracyjnym</h2>
    <div class="is-divider" data-content=""></div>
    <div class="details">
        <div class="details__card posts mycard">
            <div class="mycard__content">
                <span class="mycard__icon">
                    <i class="far fa-newspaper"></i>
                </span>
                <span class="mycard__total">{{ App\Models\Posts\Post::count() }}</span>
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
                    <i class="fas fa-users"></i>
                </span>
            </div>
            <footer class="mycard__footer">
                <a href="/admin/teams/seniorzy">
                    <span> Wyświetl drużyny </span>
                    <span>
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            </footer>
        </div>
        <div class="details__card posts mycard">
            <div class="mycard__content">
                <span class="mycard__icon">
                    <i class="fas fa-futbol"></i>
                </span>
            </div>
            <footer class="mycard__footer">
                <a href="/admin/games/seniorzy">
                    <span> Wyświetl rozgrywki </span>
                    <span>
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            </footer>
        </div>
    </div>
</div>
@endsection
