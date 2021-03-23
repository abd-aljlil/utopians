<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Pics Uploading SYS</title>
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <form action="{{route('picUpload')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Pics Uploading SYS</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
            
            
            <div> <input name="id" value="{{ $volunteer->id }}" hidden /> </div>
            
            <div>
                
            <h6>Name:  {{ $volunteer->First_Name }} {{ $volunteer->Family_Name }}</h6><br><br>
            
            </div>
            
            <div>
                <input type="file" name="file">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Start Uploading
            </button>
        </form>
    </div>

</body>
</html>