<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- CSS FILE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}" />

    <title>Laraval CRUD</title>
</head>
<body>
    <section>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            @endif

        <h1 class="text-center">Laravel CRUD Operation</h1>
        <div class="container">
            <form action="{{url('/insert')}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}"/>
                </div>
                <div class="form-group">
                    <label for="email">E-mail :</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" />
                </div>
                <div class="form-group">
                    <label for="number">Number :</label>
                    <input type="text" name="number" id="number" class="form-control" value="{{old('number')}}" />
                </div>
                <div class="form-group">
                    <label for="image">Upload File :</label>
                    <input type="file" name="image" />
                </div>
                <button class="btn btn-success">Submit</button>
                <a href="{{url('/fetch')}}" class="btn btn-info">View Data</a>
            </form>
        </div>
    </section>
</body>
</html>