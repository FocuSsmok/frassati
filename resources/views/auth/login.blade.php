<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/dashboard/app.css') }}">
    <title>Document</title>
</head>
{{-- is-danger --}}

<body>
    <section class="hero is-dark is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-white">Zaloguj</h3>
                    <p class="subtitle has-text-white">Zaloguj się aby przejść do panelu administratora</p>
                    <div class="box">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="field">
                                <div class="control">
                                    <input id="email" class="input is-large {{ $errors->has('email') ? ' is-danger' : '' }}"
                                        type="email" name="email" placeholder="Your Email" autofocus="" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <p class="help is-danger" role="alert">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large {{ $errors->has('password') ? ' is-danger' : '' }}"
                                        type="password" placeholder="Your Password" name="password" id="password ">
                                    @if($errors->has('password'))
                                        <p class="help is-danger" role="alert">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="field ">
                                <label class="checkbox" for="remember ">
                                    <input type="checkbox" name="remember " id="remember "
                                        {{ old( 'remember') ? 'checked' : '' }}>
                                    Remember me
                                </label>
                            </div>
                            <button type="submit " class="button is-dark is-block is-large is-fullwidth ">Login</button>
                        </form>
                    </div>
                    {{-- <p class="has-text-grey ">
                        @if(Route::has('password.request'))
                            <a class=" " href="{{ route( 'password.request') }} ">
                                {{ __('Zapomniałeś hasła?') }}
                            </a>
                        @endif
                    </p> --}}
                </div>
            </div>
        </div>
    </section>
</body>

</html>
