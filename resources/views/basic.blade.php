@include('layouts.navbar')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Posty</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <style>
        body{
            background-color: #e8e8e8;
        }
        .title{
            text-align: center;
            background-color: transparent
        }
        .table-container{
            background-color: white;
            max-width: 900px;
            margin: 0 auto;
        }   
        .footer-button{
            background-color: transparent;
            float: right;
            margin-top: 3%;
        }
        table{
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <div class="title">
            <h3>Księga komentarzy</h3>
        </div>
        @auth
        <table data-toggle="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Użytkownik</th>
                    <th>Data dodania</th>
                    <th>Post</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->message}}
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
                        </td>
                    </tr>
                    @endforeach
                <div class="footer-button">
            <a href="{{ route('store') }}" class="btn btn-secondary">Dodaj</a>
        </div>
             </tbody>
        </table>
        <br>
        
        @endauth
    </div>     
  
    @guest
    <div class="table-container">
        <b>Zaloguj się aby przejrzeć komentarze.</b>
    </div>    
    @endguest       
</body>
</html>
