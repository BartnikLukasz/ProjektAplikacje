@include('layouts.navbar')
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
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
</head>
<body>
    <main class="container">
        <div class="title">
            <h1>Regulamin</h2>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="row g-0 flex-md-row mb-4 shadow-sm h-md-1000 position-relative">
                    <div id="regulamin" class="col p-4 d-flex flex-column position-static">
                            <p>
                                <strong>1.Zabronione jest kopiowanie wpisów z innych blogów lub forum.</strong><br>
                                Każdy użytkownik może opisywać jedynie swoje, lub innej osoby za jej pozwoleniem, podróże, jeżeli jeszcze nie przeżyłeś żadnej wyjątkowej przygody, 
                                to nie musisz tworzyć postów, możesz czytać i reagować na wpisy innych użytkowników i wszyscy będą zadowoleni. Kopiowane posty będą usuwane.
                            </p>
                            <p>
                                <strong>2.Zabronione jest wstawianie nieprawdziwych historii.</strong><br>
                                Tak samo jak w punkcie pierwszym  jeżeli jeszcze nie przeżyłeś żadnej wyjątkowej przygody, 
                                to nie musisz tworzyć postów, a wymyślone historie łatwo jest zauważyć i będą one usuwane.
                            </p>
                            <p>
                                <strong>3.Zabronione jest umieszczanie wpisów obraźliwych lub wulgarnych.</strong><br>
                                Starajmy się być kulturalni. Posty będące spamem, reklamami innych stron, lub mało związane z tematyką bloga będą usuwane.
                            </p>
                            <p>
                                <strong>4.Zabronione jest pisanie niewłaściwych komentarzy.</strong><br>
                                Za takie uznawane są komentarze obraźliwe, wulgarne, będące spamem, reklamami, lub niezwiązane z postem, który komentują.
                                Komentarze takie będą usuwane    
                            </p>
                            <p>
                                <strong>Złamanie regulaminu grozi usunięciem konta.</strong>
                            </p>
                    </div>
                </div>
            </div>
        </div>
        
    </main>     
</body>
</html>
