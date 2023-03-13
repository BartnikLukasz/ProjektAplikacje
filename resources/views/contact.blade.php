@include('layouts.navbar')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Blog podóżniczy</title>

<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
<link href="{{ asset('css/blog.css') }}" rel="stylesheet">
</head>
<body>
    <main class="container">
        <div class="title">
            <h1>Kontakt</h2>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="row g-0 flex-md-row mb-4 shadow-sm h-md-1000 position-relative">
                            <div class="card bg-dark" style="width: 34rem;">
                                <img class="card-img-top" src="{{asset('/images/used/osoba.png')}}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text p-4">Założyciel strony Podróżuję od moich najmłodszych lat, uwielbiam góry i wspinaczkę.
                                                         Email: bartnik.luk@gmail.com
                                                         Telefon: 123456789</p>
                                </div>
                                <div class="card-body">
                                    <a href="https://www.facebook.com/"><img src="{{asset('/images/used/facebook_icon.png')}}" alt="Facebook"/></a>
                                    <a href="https://twitter.com/"><img src="{{asset('/images/used/twitter_icon.png')}}" alt="Facebook"/></a>
                                    <a href="https://www.instagram.com/"><img src="{{asset('/images/used/instagram_icon.png')}}" alt="Facebook"/></a>
                                </div>
                            </div>
                        <div class="card bg-dark" style="width: 34rem;">
                                <img class="card-img-top" src="{{asset('/images/used/osoba.png')}}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text p-4">Administrator strony od 04.06.2020 Lubię długie podróże i medytacje, co łączę na dalekim wschodzie
                                                         Telefon: 123456789</p>
                                </div>
                                <div class="card-body">
                                    <a href="https://www.facebook.com/"><img src="{{asset('/images/used/facebook_icon.png')}}" alt="Facebook"/></a>
                                    <a href="https://twitter.com/"><img src="{{asset('/images/used/twitter_icon.png')}}" alt="Facebook"/></a>
                                    <a href="https://www.instagram.com/"><img src="{{asset('/images/used/instagram_icon.png')}}" alt="Facebook"/></a>
                                </div>
                            </div>
                    <p id="regulamin"><strong>Oficjalny email bloga: bp@email.com</strong></p>
                </div>
            </div>
            <div class="col-md-4">
      <div id="addPost" class="p-4 mb-3 rounded">
        <a href="{{ route('store') }}" id="addButton" class="btn btn-primary btn-dark btn-lg">Dodaj post</a>
      </div>

      <div class="p-4 mb-3 bg-dark rounded">
        <h3>Nowi użytkownicy</h3>
        <ol class="list-unstyled mb-0">
            @php($i = 0)
            @while($i<10 && $i<$users->count())
          <li><a href="{{ route('user', $users[$i]->id) }}">{{$users[$i]->name}}</a></li>
          @php($i++)
          @endwhile
        </ol>
      </div>

      <div class="p-4 mb-3 bg-dark rounded">
        <h3>Znajdziesz nas na:</h3>
        <ol class="list-unstyled">
            <li>
                <a href="https://www.facebook.com/"><img src="{{asset('/images/used/facebook_icon.png')}}" alt="Facebook"/></a>
                <a href="https://twitter.com/"><img src="{{asset('/images/used/twitter_icon.png')}}" alt="Facebook"/></a>
                <a href="https://www.instagram.com/"><img src="{{asset('/images/used/instagram_icon.png')}}" alt="Facebook"/></a>
            </li>
        </ol>
      </div>
    </div>
        </div>

    </main>
</body>
</html>
