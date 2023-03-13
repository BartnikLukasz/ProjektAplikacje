@include('layouts.navbar')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Blog podróżniczy</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="row g-0 flex-md-row mb-4 shadow-sm h-md-1000 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                                <form role="form" class="form" role="form" id="comment-form" method="post" enctype="multipart/form-data"
      action="{{ route('update', $post) }}">{{ csrf_field() }}
    <input name="_method" type="hidden" value="PUT">
    <div class="box">
        <div class="box-body">
            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}" id="roles_box">
                <label>
                    <h1>Treść</h1>
                </label>
                <br>
                <textarea name="content" id="summernote" name="editordata" class="custom-toolbar" required>{{ $post->content}}</textarea>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Zapisz</button>
    </div>
</form>
                                </div>
                </div>
            </div>
        </div>

    </main>
    <script>
        $('#summernote').summernote({
          placeholder: 'Treść postu',
          tabsize: 2,
          height: 300,
          width: 1000,
          toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ]
        });
      </script>
</html>

