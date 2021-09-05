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
                <a href=" {{ route('articles.add') }} " class="btn btn-primary">ADD</a>
            </div>

            @if(Session::has('msg'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{Session::get('msg')}}
                    </div>
                </div>
            @endif

            @if(Session::has('errorMsg'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{Session::get('errorMsg')}}
                    </div>
                </div>
            @endif

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5> Articles/List </h5></div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Created</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($articles)
                                    @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->author}}</td>
                                    <td>{{$article->created_at}}</td>
                                    <td width="100"><a href="{{url('/articles/edit/' .$article->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td width="100"><a href="#" onclick="deleteArticle({{$article->id}});" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">Articles not added yet.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function deleteArticle(id) {
        if (confirm('Are you sure you want to delete?')) {
            window.location.href='{{url('articles/delete')}}/' +id;
        } 
    }
    </script>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

