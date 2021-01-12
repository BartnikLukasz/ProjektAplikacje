@include('layouts.navbar')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <title>Posty</title>
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
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
</head>
<body>
    <main class="container">
        <div class="title">
            <h2>Posty</h2>
        </div>
        @auth
        
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                <?php 
                    $path = DB::table('posts')
                                ->join('images', 'posts.id', '=', 'images.post_id')
                                ->select('images.url')
                                ->where('images.post_id', '=', $post->id)
                                ->get();
                    ?>
                <div class="row flex-md-row mb-4 shadow-sm h-md-450 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{$post->title}}</h3>
                            
                                <div class="mb-1 text-muted">{{$post->created_at}}</div>
                                
                                <table>
                                    <tr>
                                        <td>
                                            <img src="{{ asset($path[0]->url) }}" id="headerImage" alt="Zdjęcie postu"/>
                                            
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td>
                                            <p class="mb-auto">{{$post->content}}</p>
                                            <a href="{{ route('post', $post) }}" class="stretched-link">Czytaj dalej</a>
                                        </td>    
                                    </tr>
                                </table>
                                </div>
                </div>
                @endforeach
                
            </div>
            <div class="col-md-4">
      <div class="p-4 mb-3 bg-dark rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>

      <div class="p-4 mb-3 bg-dark rounded">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
          <li><a href="#">March 2014</a></li>
          <li><a href="#">February 2014</a></li>
          <li><a href="#">January 2014</a></li>
          <li><a href="#">December 2013</a></li>
          <li><a href="#">November 2013</a></li>
          <li><a href="#">October 2013</a></li>
          <li><a href="#">September 2013</a></li>
          <li><a href="#">August 2013</a></li>
          <li><a href="#">July 2013</a></li>
          <li><a href="#">June 2013</a></li>
          <li><a href="#">May 2013</a></li>
          <li><a href="#">April 2013</a></li>
        </ol>
      </div>

      <div class="p-4 mb-3 bg-dark rounded">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="#">GitHub</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
        </ol>
      </div>
    </div>
        </div>
        
        <br>
        <div class="footer-button">
            <a href="{{ route('store') }}" class="btn btn-secondary">Dodaj</a>
        </div>
        @endauth
    </main>     
  
    @guest
    <div class="table-container">
        <b>Zaloguj się aby przejrzeć komentarze.</b>
    </div>    
    @endguest       
</body>
</html>
