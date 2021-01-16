@include('layouts.navbar')
<?php
    use Illuminate\Support\Facades\DB;
    
    $images = DB::table('users')
            ->join('images', 'users.id', '=', 'images.user_id')
            ->select('images.*')
            ->where('images.user_id', '=', $user->id)
            ->get();

    
        ?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Blog podróżniczy</title>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">

    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
</head>
<body>
    <main class="container">
        @auth
        <div class="row">
            <div class="col-md-8">
                <h1 class="text-center">Galeria użytkownika {{ $user->name }}:</h1>
                    <div class="row g-0 flex-md-row mb-4 shadow-sm h-md-1000 position-relative">
                        @foreach($images as $image)
                        <div class="gallery">
                            <a target="_blank" href="{{$image->url}}">
                            <img src="{{$image->url}}" alt="{{$image->title}}" width="200" height="150">
                            </a>
                            <div class="desc">{{$image->title}}</div>
                        </div>
                        @endforeach
                </div>
            </div>
            <div class="col-md-4">
      <div class="p-4 mb-3 bg-dark rounded">
        Dołączył: {{ $user->created_at }}
      </div>

      <div class="p-4 mb-3 bg-dark rounded">
        <h3>Posty użytkownika</h3>
        <ol class="list-unstyled text-lg">
            @foreach($posts as $post)
            @if($post->user_id == $user->id)
          <li><a href="{{ route('post', $post) }}">{{ $post->title }}</a></li>
          @endif
          @endforeach
        </ol>
      </div>
    </div>
        </div>
        
        <br>         
        @endauth
    </main>     
  
    @guest
    <div class="table-container">
        <b>Zaloguj się aby zobaczyć post.</b>
    </div>    
    @endguest       
</body>
</html>
