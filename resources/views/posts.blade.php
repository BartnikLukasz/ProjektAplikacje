@include('layouts.navbar')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <?php
    use Illuminate\Support\Facades\DB;
    $users = DB::table('users')
            ->select('users.*')
            ->orderByDesc('created_at')
            ->get();
    $i=0;
    
    ?>
<head>
    <title>Blog podróżniczy</title>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
</head>
<body id="posty">
    <main class="container">
        
        @auth
        <div class="title">
            <h1>Posty</h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                <?php 
                    $path = DB::table('posts')
                                ->join('images', 'posts.id', '=', 'images.post_id')
                                ->select('images.url')
                                ->where('images.post_id', '=', $post->id)
                                ->get();
                    
                    if(strlen($post->content)>100){
                        $contentPreview = substr($post->content, 0, 100);
                        $contentPreview = substr_replace($contentPreview, "...", -3);
                    }
                    
                    ?>
                
                <div class="row flex-md-row mb-4 shadow-sm h-md-450 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{$post->title}}</h3>
                            
                                <div class="mb-1 ">{{$post->created_at}}</div>
                                by <a class="user" href="{{ route('user', $post->user->id) }}">{{$post->user->name}}</a>
                                <table style="transform: rotate(0);">
                                    <tr>
                                        <td>
                                            @if(empty($path[0])==false)
                                            <img src="{{ asset($path[0]->url) }}" class="headerImage"  alt="Zdjęcie postu"/>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td>
                                            <p class="mb-auto"><?php if(strlen($post->content)>100){ echo $contentPreview; } else{echo $post->content;}?></p>
                                            <a href="{{ route('post', $post) }}" class="stretched-link">Czytaj dalej</a>
                                        </td>    
                                    </tr>
                                </table>
                                </div>
                </div>
                @endforeach
                
            </div>
            <div class="col-md-4">
      <div id="addPost" class="p-4 mb-3 rounded">
        <a href="{{ route('store') }}" id="addButton" class="btn btn-primary btn-dark btn-lg">Dodaj post</a>
      </div>

      <div class="p-4 mb-3 bg-dark rounded">
        <h3>Nowi użytkownicy</h3>
        <ol class="list-unstyled mb-0">
            @while($i<10 && $i<$users->count())
          <li><a href="{{ route('user', $users[$i]->id) }}">{{$users[$i]->name}}</a></li>
          <?php $i++ ?>
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
        @endauth
    </main>     
  
    @guest
    <div class="col-md-12 text-center">
        <h1>Zaloguj się aby przejrzeć posty.</h1>
    </div>    
    @endguest       
</body>
</html>
