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
    <main class="container">
        <div class="main-panel w-75 text-center" id="gallery">
            <h3 class="mb-4 text-center">{{ $gallery->title }}</h3>
            <div class="categories-container mb-2">
                <div id="image_preview" class="row">

                    @foreach($gallery->image()->get() as $image)
                    <div class="col-4 col-lg-3 col-xl-2 mb-2">
                        <div class="add-category-img" style="background-image: url('{{$image->url}}')"></div>
                        <p class="category-title text-center mt-2 text-uppercase">{{$image->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div id="add_image">
                    <input class="custom_file_input" type="file">
                </div>
            </div>
        </div>
    @guest
    <div class="col-md-12 text-center">
        <h1>Zaloguj się aby przejrzeć posty.</h1>
    </div>
    @endguest
</body>
</html>
