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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <script>
        bootstrapTable({
    formatNoMatches: function () {
        return 'No data found';
    }
});
    </script>
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.navbar')
    <main class="container">
        @php
            $i=0;
            $j=0;
        @endphp

        @auth
        <div class="title">
            <h2>{{$post->title}}</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <div class="row g-0 flex-md-row mb-4 shadow-sm h-md-1000 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                                <div class="mb-1 text-muted">{{$post->created_at}}</div>
                                by <a href="{{ route('user', $post->user->id) }}">{{$post->user->name}}</a>
                                @if(empty($images[0])==false)
                                <div id="karuzela" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">

      </ol>
  <div class="carousel-inner">
      @foreach($images as $image)
      @php
      if($j==0) { echo '<div class="carousel-item active">
      <img class="d-block" src="'.asset($image->url).'" style="height: 600px; width: 1200px" alt="Slajd">
      <div class="carousel-caption">
        <h5>'.$image->title.'</h5>
        <p>'.$image->description.'</p>
      </div>
    </div>';}
    else{ echo '<div class="carousel-item">
      <img class="d-block w-100" src="'.asset($image->url).'" style="height: 600px; width: 400px" alt="Kolejny slajd">
      <div class="carousel-caption">
        <h5>'.$image->title.'</h5>
        <p>'.$image->description.'</p>
      </div>
    </div>';}
    $j++;
      @endphp
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
                                @endif
                                <table>
                                    <tr>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="mb-auto blog-post-content">
                                            {!! $post->content !!}
                                        </td>
                                    </tr>
                                </table>
                                </div>
                </div>
            </div>
        </div>

        @if($post->user_id == \Auth::user()->id)
                        <a href="{{ route('edit', $post) }}" class="btn btn-success btn-xs" title="Edytuj"> Edytuj
                        </a>
            <a href="{{ route('delete', $post) }}"
               class="btn btn-danger btn-xs"
               onclick="return confirm('Jesteś pewien?')"
               title="Skasuj"><i class="fa fa-trash-o"></i> Usuń
            </a>
            @endif

            <form class="form" action="{{ route('storeComment', $post) }}" id="comment-form"
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
            <table class="table table-dark table-borderless">
            <thead>
                <tr>
                    <th>Komentarze</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                @php
                    $username = "";
                    foreach($users as $user) {
                        if($user->id == $comment->user_id) {
                            $username = $user->name;
                        }
                    }
                @endphp
                <tr>
                    <td><div id="commentInfo">{{$username}} at <div class="mb-1 text-muted">{{$comment->created_at}}</div></div>
                        {{$comment->message}}
                    </td>
                </tr>

                    @endforeach
             </tbody>
        </table>
        @endauth
    </main>

    @guest
    <div class="col-md-12 text-center">
        <h1>Zaloguj się aby przejrzeć posty.</h1>
    </div>
    @endguest
</body>
</html>
