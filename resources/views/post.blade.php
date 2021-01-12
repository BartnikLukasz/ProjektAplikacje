@include('layouts.navbar')
<?php
    use Illuminate\Support\Facades\DB;
    
    $comments = DB::table('posts')
        ->join('comments', 'posts.id', '=', 'comments.post_id')
        ->select('comments.*')
        ->where('comments.post_id', '=', $post->id)
        ->get();
    
    $images = DB::table('posts')
            ->join('images', 'posts.id', '=', 'images.post_id')
            ->select('images.*')
            ->where('images.post_id', '=', $post->id)
            ->get();
    $i=0;
    $j=0;
        ?>
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
   
</head>
<body>
    <main class="container">
        <div class="title">
            <h2>{{$post->title}}</h2>
        </div>
        @auth
        <div class="row">
            <div class="col-md-8">
                    <div class="row g-0 flex-md-row mb-4 shadow-sm h-md-1000 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                                <div class="mb-1 text-muted">{{$post->created_at}}</div>
                                by {{ $post->user->name }}
                                
                                <div id="karuzela" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">

      </ol>
  <div class="carousel-inner">
      @foreach($images as $image)
      <?php
      if($j==0) { echo '<div class="carousel-item active">
      <img class="d-block" src="'.asset($image->url).'" style="height: 400px; width: 800px" alt="Slajd">
      <div class="carousel-caption">
        <h5>'.$image->title.'</h5>
        <p>'.$image->description.'</p>
      </div>
    </div>';}
    else{ echo '<div class="carousel-item">
      <img class="d-block w-100" src="'.asset($image->url).'" style="height: 400px; width: 400px" alt="Kolejny slajd">
      <div class="carousel-caption">
        <h5>'.$image->title.'</h5>
        <p>'.$image->description.'</p>
      </div>
    </div>';}
    $j++;
      ?>
      @endforeach
  </div>
  <a class="carousel-control-prev" href="#karuzela" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Poprzedni</span>
  </a>
  <a class="carousel-control-next" href="#karuzela" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Następny</span>
  </a>
</div>
                                <table>
                                    <tr>
                                        <td>          

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>{{$post->content}}</p>  
                                        </td>    
                                    </tr>
                                </table>
                                </div>
                </div>
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
        @if($post->user_id == \Auth::user()->id)
                        <br />
                        <a href="{{ route('edit', $post) }}" class="btn btn-success btn-xs" title="Edytuj"> Edytuj
                        </a>
            <a href="{{ route('delete', $post) }}" 
               class="btn btn-danger btn-xs" 
               onclick="return confirm('Jesteś pewien?')" 
               title="Skasuj"><i class="fa fa-trash-o"></i> Usuń
            </a>
            @endif
            
            <form class="form" role="form"  action="{{ route('storeComment', $post) }}" id="comment-form" 
                   method="post" enctype="multipart/form-data" >
               {{ csrf_field() }}
               <div class="box">
                 <div class="box-body">
                   <div class="form-group{{ $errors->has('message')?'has-error':'' }}" id="roles_box">
                    <label id="commentLabel"><b>Dodaj komentarz</b></label> <br>
                    <textarea class="bg-dark" name="message" id="message" cols="100" rows="4" required></textarea>
                   </div>
                     <input type="hidden" id="postId" name="postId" value="{{$post->id}}">
                 </div>
                </div>
              <div class="box-footer"><button type="submit" class="btn btn-success">Dodaj</button> 
              </div>
             </form>
            <table data-toggle="table" class="table table-dark table-borderless">
            <thead>
                <tr>
                    <th>Komentarze</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <?php $userName = DB::table('users')
                                ->join('comments', 'users.id', '=', 'comments.user_id')
                                ->select('users.name')
                                ->where('comments.user_id', '=', $comment->user_id)
                                ->get() ?>
                <tr>
                    <td><div id="commentInfo">{{$userName[0]->name}} at <div class="mb-1 text-muted">{{$comment->created_at}}</div></div></td>
                </tr>
                <tr>
                    <td>{{$comment->message}}</td>
                    
                </tr>
            
                    @endforeach
             </tbody>
        </table>
            {{var_dump($comments) }}
        @endauth
    </main>     
  
    @guest
    <div class="table-container">
        <b>Zaloguj się aby zobaczyć post.</b>
    </div>    
    @endguest       
</body>
</html>
