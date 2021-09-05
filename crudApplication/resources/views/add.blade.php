<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>CRUD Application</title>
  </head>
  <body class="bg-light">
    <div class="p-3 mb-2 bg-dark text-white">
        <div class="container">
            <div class="h3"> Laravel CRUD Application </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <a href=" {{ route('articles') }} " class="btn btn-secondary">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5> Articles/List </h5></div>
                    <div class="card-body">
                        <form action="{{route('articles.add')}}" method="post" id="addArticle">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" id="title" class="form-control {{($errors->any() && $errors->first('title')) ? 'is-invalid' : ''}}" value="{{old('title')}}">

                                @if($errors->any())

                                    <p class="invalid-feedback"> {{$errors->first('title')}} </p>

                                @endif

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control {{($errors->any() && $errors->first('description')) ? 'is-invalid' : ''}}">{{old('description')}}</textarea>

                                @if($errors->any())

                                    <p class="invalid-feedback"> {{$errors->first('description')}} </p>

                                @endif

                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" name="author" id="author" class="form-control {{($errors->any() && $errors->first('author')) ? 'is-invalid' : ''}}" value="{{old('author')}}">

                                @if($errors->any())

                                    <p class="invalid-feedback"> {{$errors->first('author')}} </p>

                                @endif

                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-secondary" value="Save Article"/>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>