@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @guest
                    <li class="list-unstyled"><p class="welcomeText">Witaj na naszym wspólnym blogu podróżniczym, gdzie każdy może opisać swoją wyprawę!<br>Jesteś już członkiem? Zaloguj się!</p></li>
                            @if (Route::has('login'))
                                <li class="nav-item list-unstyled">
                                    <a id="authButton" class="btn btn-primary btn-lg btn-dark active" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                                </li>
                            @endif
                            <li class="list-unstyled"><p class="regText"><br>Jesteś tu nowy? Zarejestruj się aby dołączyć do naszej społeczności</p></li>
                            @if (Route::has('register'))
                                <li class="nav-item list-unstyled">
                                    <a id="authButton" class="btn btn-primary btn-lg btn-dark active" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                                </li>
                            @endif
                    @else
                    <h1 id="aboutTitle">O nas</h1>
                    <p id="about">Jesteśmy grupą pasjonatów podróży dzielącą się naszymi przeżyciami na tym blogu. 
                       Możesz czytać o podróżach innych, bądź zamieścić swój post wraz ze zdjęciami. Czekamy na twoje przeżycia!</p>
                    <a class="btn btn-primary btn-dark btn-lg" href="{{ route('posts') }}">Przejdź do postów!</a>
                     @endguest
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
